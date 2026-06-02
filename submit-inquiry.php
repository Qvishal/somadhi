<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
    exit;
}

$required = ['name', 'organization', 'email', 'phone', 'message'];
$payload = [];

foreach ($_POST as $key => $value) {
    $payload[$key] = trim((string) $value);
}

foreach ($required as $field) {
    if (($payload[$field] ?? '') === '') {
        http_response_code(422);
        echo json_encode(['ok' => false, 'message' => 'Please complete all required fields.']);
        exit;
    }
}

if (!filter_var($payload['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'message' => 'Enter a valid email address.']);
    exit;
}

$payload['submitted_at'] = gmdate(DATE_ATOM);
$payload['ip'] = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$payload['user_agent'] = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';

$storageDir = __DIR__ . '/storage';
$storageFile = $storageDir . '/inquiries.ndjson';

if (!is_dir($storageDir)) {
    mkdir($storageDir, 0775, true);
}

$result = file_put_contents($storageFile, json_encode($payload, JSON_UNESCAPED_SLASHES) . PHP_EOL, FILE_APPEND | LOCK_EX);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Unable to save your inquiry right now.']);
    exit;
}

// Send email notification to info.somadilifesciences@gmail.com
$to = 'info.somadilifesciences@gmail.com';
$subject = 'New Inquiry: ' . $payload['name'] . ' (' . ($payload['form_type'] ?? 'Website Inquiry') . ')';

$body = "Dear Somadi Lifescience Team,\n\n";
$body .= "You have received a new inquiry from the website.\n\n";
$body .= "--- CUSTOMER DETAILS ---\n";
$body .= "Name: " . $payload['name'] . "\n";
$body .= "Organization: " . $payload['organization'] . "\n";
$body .= "Email: " . $payload['email'] . "\n";
$body .= "Phone: " . $payload['phone'] . "\n";

if (!empty($payload['category'])) {
    $body .= "Interested Category: " . $payload['category'] . "\n";
}
if (!empty($payload['requirement_type'])) {
    $body .= "Requirement Type: " . $payload['requirement_type'] . "\n";
}
$body .= "\n";

$body .= "--- MESSAGE / REQUIREMENTS ---\n";
$body .= $payload['message'] . "\n\n";

if (!empty($payload['quote_items'])) {
    $items = json_decode($payload['quote_items'], true);
    if (is_array($items) && !empty($items)) {
        $body .= "--- REQUESTED PRODUCT SHORTLIST ---\n";
        foreach ($items as $idx => $item) {
            $num = $idx + 1;
            $body .= "{$num}. " . ($item['name'] ?? 'Unknown Product') . "\n";
            $body .= "   Brand: " . ($item['brand'] ?? 'N/A') . "\n";
            $body .= "   Category: " . ($item['category'] ?? 'N/A') . "\n";
            if (!empty($item['note'])) {
                $body .= "   Quantity/Note: " . $item['note'] . "\n";
            }
            $body .= "\n";
        }
    }
}

$body .= "--- METADATA ---\n";
$body .= "Submitted At: " . $payload['submitted_at'] . "\n";
$body .= "IP Address: " . $payload['ip'] . "\n";
$body .= "User Agent: " . $payload['user_agent'] . "\n";

$headers = "From: Somadi Lifescience <no-reply@somadilifesciences.com>\r\n" .
           "Reply-To: " . $payload['name'] . " <" . $payload['email'] . ">\r\n" .
           "MIME-Version: 1.0\r\n" .
           "Content-Type: text/plain; charset=UTF-8\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Send email using PHP's built-in mail function (suppress warning if server has no local MTA)
@mail($to, $subject, $body, $headers);

echo json_encode([
    'ok' => true,
    'message' => 'Inquiry received. Our team will connect with you shortly.',
]);

