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

echo json_encode([
    'ok' => true,
    'message' => 'Inquiry received. Our team will connect with you shortly.',
]);
