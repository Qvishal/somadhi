<?php

declare(strict_types=1);

function site_data(): array
{
    return [
        'company' => [
            'name' => 'SOMADI LIFESCIENCE',
            'short' => 'SL',
            'tagline' => 'India\'s trusted scientific and laboratory supply partner since 1966.',
            'founding_year' => '1966',
            'phone' => '+91 98100 24567',
            'whatsapp' => '+91 98100 24567',
            'email' => 'sales@somadilifescience.com',
            'address' => '3481 Nicholson Road, Mori Gate, Delhi 110006, India',
            'street_address' => '3481 Nicholson Road, Mori Gate',
            'locality' => 'Delhi',
            'region' => 'Delhi',
            'postal_code' => '110006',
            'country' => 'IN',
            'gst' => '07AABCA1966Q1Z4',
            'map' => 'https://www.google.com/maps?q=3481+Nicholson+Road+Mori+Gate+Delhi&output=embed',
        ],
        'meta' => [
            'default_title' => 'SOMADI LIFESCIENCE | Scientific Equipment Supplier India',
            'default_description' => 'Premium B2B scientific ecommerce platform for laboratory chemicals, instruments, consumables, ethanol, glassware and procurement solutions across India.',
            'keywords' => 'scientific equipment supplier India, laboratory chemicals supplier, ethanol supplier India, scientific instruments Delhi, lab consumables distributor, scientific hypermarket India',
            'base_url' => 'https://www.somadilifescience.com',
            'logo' => '/assets/brand/logo-badge.svg',
            'og_image' => '/assets/brand/og-card.svg',
            'favicon' => '/assets/brand/favicon.svg',
        ],
        'metrics' => [
            ['value' => 60, 'suffix' => '+', 'label' => 'Years of Experience'],
            ['value' => 10000, 'suffix' => '+', 'label' => 'Products Ready for Procurement'],
            ['value' => 5000, 'suffix' => '+', 'label' => 'Institutions and Industrial Clients'],
            ['value' => 100, 'suffix' => '+', 'label' => 'Scientific Brand Partnerships'],
            ['value' => 28, 'suffix' => ' States', 'label' => 'Pan India Distribution Reach'],
        ],
        'categories' => [
            ['slug' => 'laboratory-chemicals', 'name' => 'Laboratory Chemicals', 'summary' => 'AR, LR, HPLC and specialty reagents for daily lab workflows.', 'accent' => 'Cyan Flux', 'icon' => 'flask'],
            ['slug' => 'ethanol-solvents', 'name' => 'Ethanol & Solvents', 'summary' => 'High-purity solvents for pharma, research and QA environments.', 'accent' => 'Polar Grade', 'icon' => 'droplet'],
            ['slug' => 'glassware', 'name' => 'Glassware', 'summary' => 'Beakers, burettes, volumetric glassware and custom lab setups.', 'accent' => 'Precision Form', 'icon' => 'beaker'],
            ['slug' => 'pipettes', 'name' => 'Pipettes', 'summary' => 'Micropipettes, dispensers and liquid handling essentials.', 'accent' => 'Microliter Control', 'icon' => 'pipette'],
            ['slug' => 'safety-products', 'name' => 'Safety Products', 'summary' => 'PPE, spill handling and compliant storage solutions.', 'accent' => 'LabSafe', 'icon' => 'shield'],
            ['slug' => 'analytical-instruments', 'name' => 'Analytical Instruments', 'summary' => 'Bench instruments and QA systems for high-trust measurement.', 'accent' => 'Signal Accuracy', 'icon' => 'wave'],
            ['slug' => 'chromatography', 'name' => 'Chromatography', 'summary' => 'Columns, filters and accessories for analytical separation.', 'accent' => 'Separation Grade', 'icon' => 'columns'],
            ['slug' => 'consumables', 'name' => 'Consumables', 'summary' => 'Daily-use plasticware, filter media and sample prep items.', 'accent' => 'High Rotation', 'icon' => 'box'],
            ['slug' => 'balances', 'name' => 'Balances', 'summary' => 'Analytical and precision balances for compliant weighing.', 'accent' => 'Calibrated Mass', 'icon' => 'scale'],
            ['slug' => 'water-testing', 'name' => 'Water Testing', 'summary' => 'Field and laboratory solutions for water quality analytics.', 'accent' => 'Purity Insight', 'icon' => 'water'],
        ],
        'products' => [
            [
                'slug' => 'hplc-acetonitrile',
                'name' => 'HPLC Acetonitrile',
                'brand' => 'Merck',
                'category' => 'Laboratory Chemicals',
                'availability' => 'In Stock',
                'specs' => ['Pack' => '2.5 L', 'Grade' => 'HPLC', 'Purity' => '99.9%'],
                'summary' => 'Low UV absorbance solvent for chromatography and analytical workflows.',
                'badge' => 'Fast Dispatch',
            ],
            [
                'slug' => 'absolute-ethanol',
                'name' => 'Absolute Ethanol',
                'brand' => 'Somadi Supply',
                'category' => 'Ethanol & Solvents',
                'availability' => 'Ready Stock',
                'specs' => ['Pack' => '500 mL / 2.5 L', 'Grade' => 'AR', 'Assay' => '99.9%'],
                'summary' => 'High-purity ethanol for pharma labs, universities and industrial QC.',
                'badge' => 'Bulk Orders',
            ],
            [
                'slug' => 'volumetric-flask-set',
                'name' => 'Class A Volumetric Flask Set',
                'brand' => 'Borosil',
                'category' => 'Glassware',
                'availability' => 'In Stock',
                'specs' => ['Range' => '10-1000 mL', 'Class' => 'A', 'Material' => 'Boro 3.3'],
                'summary' => 'Calibrated laboratory glassware with serialized certification support.',
                'badge' => 'Certified',
            ],
            [
                'slug' => 'single-channel-pipette',
                'name' => 'Variable Volume Pipette',
                'brand' => 'Thermo Fisher',
                'category' => 'Pipettes',
                'availability' => '2 Day Lead',
                'specs' => ['Range' => '0.5-10 uL', 'Accuracy' => '+/-0.8%', 'Warranty' => '1 Year'],
                'summary' => 'Ergonomic single-channel pipette for precise liquid handling.',
                'badge' => 'Calibration Ready',
            ],
            [
                'slug' => 'nitrile-gloves',
                'name' => 'Powder-Free Nitrile Gloves',
                'brand' => 'Ansell',
                'category' => 'Safety Products',
                'availability' => 'In Stock',
                'specs' => ['Box' => '100 pcs', 'Color' => 'Blue', 'Use' => 'Chemical Handling'],
                'summary' => 'Reliable hand protection for research, QA and production floors.',
                'badge' => 'High Rotation',
            ],
            [
                'slug' => 'uv-vis-spectrophotometer',
                'name' => 'UV-Vis Spectrophotometer',
                'brand' => 'Shimadzu',
                'category' => 'Analytical Instruments',
                'availability' => 'On Request',
                'specs' => ['Range' => '190-1100 nm', 'Mode' => 'Scan & Quant', 'Interface' => 'USB'],
                'summary' => 'Enterprise-grade spectral analysis for regulated laboratory use.',
                'badge' => 'Installation Support',
            ],
            [
                'slug' => 'hplc-column-c18',
                'name' => 'C18 HPLC Column',
                'brand' => 'Avantor',
                'category' => 'Chromatography',
                'availability' => 'Ready Stock',
                'specs' => ['Size' => '250 x 4.6 mm', 'Particle' => '5 um', 'pH' => '2-8'],
                'summary' => 'Stable reversed-phase column for routine and high-throughput methods.',
                'badge' => 'Method Ready',
            ],
            [
                'slug' => 'syringe-filters',
                'name' => 'Sterile Syringe Filters',
                'brand' => 'Pall',
                'category' => 'Consumables',
                'availability' => 'In Stock',
                'specs' => ['Pore' => '0.22 um', 'Dia' => '25 mm', 'Pack' => '100 pcs'],
                'summary' => 'High-flow sterile filters for sample prep and membrane clarification.',
                'badge' => 'Sterile',
            ],
            [
                'slug' => 'analytical-balance',
                'name' => 'Analytical Balance 0.1 mg',
                'brand' => 'Mettler Toledo',
                'category' => 'Balances',
                'availability' => '5 Day Lead',
                'specs' => ['Capacity' => '220 g', 'Readability' => '0.1 mg', 'Calibration' => 'Internal'],
                'summary' => 'Audit-ready weighing performance for QC, R&D and regulated settings.',
                'badge' => 'IQ/OQ Support',
            ],
            [
                'slug' => 'tds-meter-kit',
                'name' => 'Water Quality Test Kit',
                'brand' => 'Hach',
                'category' => 'Water Testing',
                'availability' => 'In Stock',
                'specs' => ['Tests' => 'pH/TDS/Conductivity', 'Format' => 'Portable', 'Users' => 'Field + Lab'],
                'summary' => 'Portable water analysis kit built for environmental and utility teams.',
                'badge' => 'Field Ready',
            ],
        ],
        'brands' => ['Thermo Fisher', 'Merck', 'Avantor', 'Qiagen', 'Whatman', 'Borosil', 'Pall Corporation', 'Shimadzu', 'Mettler Toledo', 'Hach'],
        'industries' => [
            ['name' => 'Pharma', 'summary' => 'Validated sourcing for QA, QC and formulation teams.'],
            ['name' => 'Universities', 'summary' => 'Fast-moving laboratory essentials for teaching and research.'],
            ['name' => 'Research Labs', 'summary' => 'Technical product access for advanced scientific workflows.'],
            ['name' => 'Biotechnology', 'summary' => 'Sample handling, filtration and analytical readiness at scale.'],
            ['name' => 'Food Testing', 'summary' => 'Reliable consumables and instrumentation for compliance-heavy analysis.'],
            ['name' => 'Chemical Industries', 'summary' => 'Bulk procurement support for plants, pilot labs and process teams.'],
            ['name' => 'Water Testing', 'summary' => 'Environmental and municipal testing solutions with quick dispatch.'],
            ['name' => 'Educational Institutions', 'summary' => 'Cost-aware procurement with service continuity and stock depth.'],
        ],
        'differentiators' => [
            ['title' => 'Authorized Distributor Network', 'summary' => 'Source global brands with documentation-backed confidence.'],
            ['title' => 'Huge Ready Stock', 'summary' => 'Critical SKUs available for fast dispatch and urgent replenishment.'],
            ['title' => 'Fast Procurement', 'summary' => 'Structured RFQ handling with quick turnaround and bulk support.'],
            ['title' => 'Technical Support', 'summary' => 'Product selection assistance for research, QA and industrial teams.'],
            ['title' => 'Bulk Orders', 'summary' => 'Enterprise pricing paths for tenders, annual contracts and repeat demand.'],
            ['title' => 'Pan India Delivery', 'summary' => 'Reliable delivery coordination across institutional and industrial sites.'],
            ['title' => 'Trusted Since 1966', 'summary' => 'Legacy credibility modernized for the next generation of procurement.'],
        ],
        'catalogues' => [
            ['title' => 'Analytical & QA Instruments', 'category' => 'Instruments', 'pages' => 48, 'size' => '12.4 MB'],
            ['title' => 'Laboratory Chemicals & Solvents', 'category' => 'Chemicals', 'pages' => 76, 'size' => '18.1 MB'],
            ['title' => 'Glassware & Volumetric Essentials', 'category' => 'Glassware', 'pages' => 34, 'size' => '9.7 MB'],
            ['title' => 'Safety, PPE & Storage', 'category' => 'Safety', 'pages' => 26, 'size' => '8.3 MB'],
            ['title' => 'Filtration, Consumables & Sample Prep', 'category' => 'Consumables', 'pages' => 44, 'size' => '11.6 MB'],
            ['title' => 'Water Testing & Field Analytics', 'category' => 'Water Testing', 'pages' => 22, 'size' => '7.8 MB'],
        ],
        'faqs' => [
            ['question' => 'Can we request a quote for multiple products in one inquiry?', 'answer' => 'Yes. The quote drawer and inquiry forms are designed for multi-item RFQs with quantities, notes and delivery requirements.'],
            ['question' => 'Do you support institutional and tender-based procurement?', 'answer' => 'Yes. We support universities, laboratories, industrial teams and organizations managing recurring or tender-based procurement.'],
            ['question' => 'How quickly can you dispatch fast-moving products?', 'answer' => 'Many daily-use chemicals, consumables and glassware items are available from ready stock for rapid dispatch.'],
            ['question' => 'Can catalogues and brochures be shared digitally?', 'answer' => 'Yes. Product brochures, category catalogues and brand-specific resources can be shared through the catalogue center or by request.'],
        ],
    ];
}

function page_meta(string $page): array
{
    $data = site_data();
    $meta = $data['meta'];

    $pages = [
        'home' => [
            'title' => 'SOMADI LIFESCIENCE | Scientific Equipment Supplier India',
            'description' => 'Scientific equipment supplier India with enterprise-grade discovery, RFQ workflows, catalogue center and modern B2B procurement for laboratory chemicals, instruments and consumables.',
            'keywords' => 'scientific equipment supplier India, laboratory chemicals supplier, lab consumables distributor, scientific instruments Delhi, scientific hypermarket India',
        ],
        'products' => [
            'title' => 'Laboratory Products & Scientific Equipment | SOMADI LIFESCIENCE',
            'description' => 'Browse laboratory chemicals, ethanol, instruments, consumables, glassware, balances and water testing products with RFQ-ready product discovery for labs across India.',
            'keywords' => 'laboratory chemicals supplier, ethanol supplier India, scientific equipment supplier India, lab consumables distributor, scientific instruments Delhi',
        ],
        'catalogues' => [
            'title' => 'Scientific Catalogues & Brochures | SOMADI LIFESCIENCE',
            'description' => 'Explore scientific product catalogues, brochures and downloadable procurement resources for chemicals, glassware, consumables and instruments.',
            'keywords' => 'scientific catalogue India, laboratory product brochures, lab consumables distributor, scientific equipment supplier India, laboratory chemicals supplier',
        ],
        'contact' => [
            'title' => 'Contact & RFQ | SOMADI LIFESCIENCE',
            'description' => 'Contact SOMADI LIFESCIENCE for laboratory procurement, technical product support, bulk orders, catalogue requests and fast quotation workflows.',
            'keywords' => 'contact laboratory chemicals supplier, scientific equipment supplier India contact, RFQ lab consumables distributor, scientific instruments Delhi contact',
        ],
    ];

    return array_merge($meta, $pages[$page] ?? []);
}

function current_page(): string
{
    $script = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');

    return match ($script) {
        'products.php' => 'products',
        'catalogues.php' => 'catalogues',
        'contact.php' => 'contact',
        default => 'home',
    };
}

function is_active_page(string $page): bool
{
    return current_page() === $page;
}

function nav_items(): array
{
    return [
        ['label' => 'Home', 'href' => '/index.php', 'page' => 'home'],
        ['label' => 'Products', 'href' => '/products.php', 'page' => 'products'],
        ['label' => 'Catalogues', 'href' => '/catalogues.php', 'page' => 'catalogues'],
        ['label' => 'Contact', 'href' => '/contact.php', 'page' => 'contact'],
    ];
}

function h(?string $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function absolute_url(string $path = '/'): string
{
    $baseUrl = rtrim(site_data()['meta']['base_url'], '/');
    $normalizedPath = '/' . ltrim($path, '/');

    return $baseUrl . ($normalizedPath === '/' ? '/' : $normalizedPath);
}

function current_request_path(): string
{
    $requestUri = $_SERVER['REQUEST_URI'] ?? ($_SERVER['SCRIPT_NAME'] ?? '/');
    $path = (string) parse_url($requestUri, PHP_URL_PATH);

    if ($path === '' || $path === '/index.php') {
        return '/';
    }

    return $path;
}

function current_page_url(): string
{
    return absolute_url(current_request_path());
}

function page_slug(string $page): string
{
    return match ($page) {
        'products' => 'products.php',
        'catalogues' => 'catalogues.php',
        'contact' => 'contact.php',
        default => 'index.php',
    };
}

function breadcrumb_items(string $page): array
{
    $items = [
        [
            'name' => 'Home',
            'url' => absolute_url('/'),
        ],
    ];

    if ($page !== 'home') {
        $items[] = [
            'name' => match ($page) {
                'products' => 'Products',
                'catalogues' => 'Catalogues',
                'contact' => 'Contact',
                default => 'Home',
            },
            'url' => absolute_url('/' . page_slug($page)),
        ];
    }

    return $items;
}

function page_schema_type(string $page): string
{
    return match ($page) {
        'products' => 'CollectionPage',
        'catalogues' => 'CollectionPage',
        default => 'WebPage',
    };
}

function build_business_schema(): array
{
    $data = site_data();
    $company = $data['company'];
    $meta = $data['meta'];

    return [
        '@type' => ['Organization', 'LocalBusiness'],
        '@id' => absolute_url('/#organization'),
        'name' => $company['name'],
        'alternateName' => $company['short'],
        'url' => absolute_url('/'),
        'email' => $company['email'],
        'telephone' => $company['phone'],
        'description' => $company['tagline'],
        'logo' => absolute_url($meta['logo']),
        'image' => absolute_url($meta['og_image']),
        'foundingDate' => $company['founding_year'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $company['street_address'],
            'addressLocality' => $company['locality'],
            'addressRegion' => $company['region'],
            'postalCode' => $company['postal_code'],
            'addressCountry' => $company['country'],
        ],
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'contactType' => 'sales',
                'telephone' => $company['phone'],
                'email' => $company['email'],
                'areaServed' => 'IN',
                'availableLanguage' => ['en', 'hi'],
            ],
            [
                '@type' => 'ContactPoint',
                'contactType' => 'customer support',
                'telephone' => $company['whatsapp'],
                'areaServed' => 'IN',
                'availableLanguage' => ['en', 'hi'],
            ],
        ],
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'India',
        ],
        'identifier' => [
            '@type' => 'PropertyValue',
            'propertyID' => 'GSTIN',
            'value' => $company['gst'],
        ],
        'hasMap' => $company['map'],
    ];
}

function build_website_schema(): array
{
    $data = site_data();

    return [
        '@type' => 'WebSite',
        '@id' => absolute_url('/#website'),
        'url' => absolute_url('/'),
        'name' => $data['company']['name'],
        'description' => $data['meta']['default_description'],
        'image' => absolute_url($data['meta']['og_image']),
        'publisher' => [
            '@id' => absolute_url('/#organization'),
        ],
        'inLanguage' => 'en-IN',
    ];
}

function build_breadcrumb_schema(string $page): array
{
    $items = breadcrumb_items($page);

    return [
        '@type' => 'BreadcrumbList',
        '@id' => current_page_url() . '#breadcrumb',
        'itemListElement' => array_map(
            static fn(array $item, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'],
            ],
            $items,
            array_keys($items)
        ),
    ];
}

function build_page_schema(string $page): array
{
    $meta = page_meta($page);

    return [
        '@type' => page_schema_type($page),
        '@id' => current_page_url() . '#webpage',
        'url' => current_page_url(),
        'name' => $meta['title'] ?? $meta['default_title'],
        'description' => $meta['description'] ?? $meta['default_description'],
        'keywords' => $meta['keywords'],
        'isPartOf' => [
            '@id' => absolute_url('/#website'),
        ],
        'breadcrumb' => [
            '@id' => current_page_url() . '#breadcrumb',
        ],
        'about' => [
            '@id' => absolute_url('/#organization'),
        ],
        'publisher' => [
            '@id' => absolute_url('/#organization'),
        ],
        'primaryImageOfPage' => absolute_url($meta['og_image']),
        'inLanguage' => 'en-IN',
    ];
}

function build_home_faq_schema(): array
{
    $faqs = site_data()['faqs'];

    return [
        '@type' => 'FAQPage',
        '@id' => absolute_url('/index.php#faq'),
        'mainEntity' => array_map(
            static fn(array $faq): array => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ],
            $faqs
        ),
    ];
}

function build_products_collection_schema(): array
{
    $products = site_data()['products'];

    return [
        '@type' => 'ItemList',
        '@id' => absolute_url('/products.php#itemlist'),
        'name' => 'Scientific products',
        'numberOfItems' => count($products),
        'itemListElement' => array_map(
            static fn(array $product, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'item' => [
                    '@type' => 'Product',
                    'name' => $product['name'],
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => $product['brand'],
                    ],
                    'category' => $product['category'],
                    'description' => $product['summary'],
                    'url' => absolute_url('/products.php#products-grid'),
                    'additionalProperty' => array_map(
                        static fn(string $label, string $value): array => [
                            '@type' => 'PropertyValue',
                            'name' => $label,
                            'value' => $value,
                        ],
                        array_keys($product['specs']),
                        array_values($product['specs'])
                    ),
                ],
            ],
            $products,
            array_keys($products)
        ),
    ];
}

function build_catalogues_collection_schema(): array
{
    $catalogues = site_data()['catalogues'];

    return [
        '@type' => 'ItemList',
        '@id' => absolute_url('/catalogues.php#itemlist'),
        'name' => 'Scientific catalogues',
        'numberOfItems' => count($catalogues),
        'itemListElement' => array_map(
            static fn(array $catalogue, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'item' => [
                    '@type' => 'CreativeWork',
                    'name' => $catalogue['title'],
                    'genre' => $catalogue['category'],
                    'description' => 'Scientific catalogue and brochure resource for technical review and procurement support.',
                    'url' => absolute_url('/catalogues.php'),
                    'encoding' => [
                        '@type' => 'MediaObject',
                        'fileSize' => $catalogue['size'],
                    ],
                ],
            ],
            $catalogues,
            array_keys($catalogues)
        ),
    ];
}

function build_contact_page_schema(): array
{
    $company = site_data()['company'];

    return [
        '@type' => 'ContactPage',
        '@id' => absolute_url('/contact.php#contact-page'),
        'url' => absolute_url('/contact.php'),
        'name' => 'Contact SOMADI LIFESCIENCE',
        'description' => 'Contact SOMADI LIFESCIENCE for laboratory procurement, quotations, bulk sourcing and technical product support.',
        'mainEntity' => [
            '@type' => 'ContactPoint',
            'contactType' => 'sales',
            'telephone' => $company['phone'],
            'email' => $company['email'],
            'areaServed' => 'IN',
            'availableLanguage' => ['en', 'hi'],
        ],
    ];
}

function schemas_for_page(string $page): array
{
    $schemas = [
        build_business_schema(),
        build_website_schema(),
        build_page_schema($page),
        build_breadcrumb_schema($page),
    ];

    if ($page === 'home') {
        $schemas[] = build_home_faq_schema();
    }

    if ($page === 'products') {
        $schemas[] = build_products_collection_schema();
    }

    if ($page === 'catalogues') {
        $schemas[] = build_catalogues_collection_schema();
    }

    if ($page === 'contact') {
        $schemas[] = build_contact_page_schema();
    }

    return $schemas;
}

function render_schema_markup(string $page): void
{
    $graph = schemas_for_page($page);
    ?>
    <script type="application/ld+json">
<?= json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>
    </script>
    <?php
}

function icon(string $name): string
{
    $icons = [
        'atom' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 12m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0-5 0"/><path d="M4 12c0 2.9 3.6 5.2 8 5.2s8-2.3 8-5.2s-3.6-5.2-8-5.2S4 9.1 4 12Z"/><path d="M7.2 6.5c-1.4 2.5.3 6.3 3.8 8.8s7.3 2.8 8.7.3-.3-6.3-3.8-8.8S8.6 4 7.2 6.5Z"/><path d="M7.2 17.5c1.4 2.5 5.2 2.2 8.7-.3s5.2-6.3 3.8-8.8S14.5 6.2 11 8.7s-5.2 6.3-3.8 8.8Z"/></svg>',
        'search' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M11 18a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z"/><path d="m20 20-3.5-3.5"/></svg>',
        'quote' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="M4 10h16"/><path d="M8 4v4"/><path d="M16 4v4"/></svg>',
        'arrow' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14"/><path d="m13 5 7 7-7 7"/></svg>',
        'download' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4v10"/><path d="m8 10 4 4 4-4"/><path d="M4 18h16"/></svg>',
        'menu' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16"/><path d="M4 12h16"/><path d="M4 17h16"/></svg>',
        'close' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 6 12 12"/><path d="m18 6-12 12"/></svg>',
        'flask' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M10 3h4"/><path d="M10 3v5l-5 8a4 4 0 0 0 3.4 6h7.2A4 4 0 0 0 19 16l-5-8V3"/></svg>',
        'droplet' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3c3 4 6 7.3 6 11a6 6 0 0 1-12 0c0-3.7 3-7 6-11Z"/></svg>',
        'beaker' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M9 3h6"/><path d="M10 3v5l-5 9a3 3 0 0 0 2.6 4.5h8.8A3 3 0 0 0 19 17l-5-9V3"/><path d="M8 14h8"/></svg>',
        'pipette' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m14 4 6 6"/><path d="m12 6 6 6"/><path d="m3 21 8-8"/><path d="m10 11 3 3"/></svg>',
        'shield' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v5c0 5 3 8 7 10 4-2 7-5 7-10V6l-7-3Z"/></svg>',
        'wave' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 12h3l2-5 4 10 2-5h7"/></svg>',
        'columns' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 4h4v16H6z"/><path d="M14 4h4v16h-4z"/><path d="M4 8h16"/><path d="M4 16h16"/></svg>',
        'box' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"/><path d="M12 12 4 7.5"/><path d="M12 12l8-4.5"/><path d="M12 12v9"/></svg>',
        'scale' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4v16"/><path d="M7 7h10"/><path d="m7 7-4 6h8l-4-6Z"/><path d="m17 7-4 6h8l-4-6Z"/><path d="M8 20h8"/></svg>',
        'water' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 14a6 6 0 0 0 12 0c0-3-3-6.8-6-10-3 3.2-6 7-6 10Z"/><path d="M8 14c1 1.7 2.4 2.6 4 2.6"/></svg>',
        'whatsapp' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4a8 8 0 0 0-6.8 12.2L4 20l4-1.1A8 8 0 1 0 12 4Z"/><path d="M9 9c.3 2 2 3.7 4 4"/><path d="M9.8 8.5c-.3 0-.8.8-.8 1.1 0 .4.6 1.8 2 3.1 1.4 1.4 2.8 2 3.1 2 .3 0 1.1-.5 1.1-.8"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="m4 8 8 6 8-6"/></svg>',
        'phone' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 4h4l2 5-2 2c1 2 3 4 5 5l2-2 5 2v4c0 1-1 2-2 2C11 22 2 13 2 6c0-1 1-2 2-2Z"/></svg>',
        'map' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s6-5.3 6-11a6 6 0 0 0-12 0c0 5.7 6 11 6 11Z"/><path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4Z"/></svg>',
        'check' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m5 13 4 4L19 7"/></svg>',
        'filter' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>',
        'spark' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2v5"/><path d="M12 17v5"/><path d="M2 12h5"/><path d="M17 12h5"/><path d="m5 5 3 3"/><path d="m16 16 3 3"/><path d="m16 8 3-3"/><path d="m5 19 3-3"/></svg>',
    ];

    return $icons[$name] ?? $icons['spark'];
}

function render_head(string $page): void
{
    $meta = page_meta($page);
    $title = $meta['title'] ?? $meta['default_title'];
    $description = $meta['description'] ?? $meta['default_description'];
    $canonicalUrl = current_page_url();
    $imageUrl = absolute_url($meta['og_image']);
    $imageAlt = 'Social preview for ' . $title;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($title) ?></title>
    <meta name="description" content="<?= h($description) ?>">
    <meta name="keywords" content="<?= h($meta['keywords']) ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="SOMADI LIFESCIENCE">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#1f4f3e">
    <meta property="og:locale" content="en_IN">
    <meta property="og:site_name" content="SOMADI LIFESCIENCE">
    <meta property="og:title" content="<?= h($title) ?>">
    <meta property="og:description" content="<?= h($description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= h($canonicalUrl) ?>">
    <meta property="og:image" content="<?= h($imageUrl) ?>">
    <meta property="og:image:alt" content="<?= h($imageAlt) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= h($title) ?>">
    <meta name="twitter:description" content="<?= h($description) ?>">
    <meta name="twitter:image" content="<?= h($imageUrl) ?>">
    <link rel="canonical" href="<?= h($canonicalUrl) ?>">
    <link rel="icon" type="image/svg+xml" href="<?= h($meta['favicon']) ?>">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <?php render_schema_markup($page); ?>
</head>
<body data-page="<?= h($page) ?>">
    <?php
}

function render_header(): void
{
    $data = site_data();
    ?>
    <div class="topbar">
        <div class="container topbar__inner">
            <p>Scientific equipment, chemicals and consumables for laboratories, institutions and industrial buyers.</p>
            <a href="tel:+919810024567">Delhi Sales Desk: +91 98100 24567</a>
        </div>
    </div>

    <header class="site-header" data-header>
        <div class="container site-header__inner">
            <a href="/index.php" class="brand-mark" aria-label="SOMADI LIFESCIENCE home">
                <span class="brand-mark__logo">SL</span>
                <span class="brand-mark__copy">
                    <strong>SOMADI LIFESCIENCE</strong>
                    <small>Scientific Procurement Platform</small>
                </span>
            </a>

            <nav class="site-nav" aria-label="Primary navigation">
                <?php foreach (nav_items() as $item): ?>
                    <a class="site-nav__link<?= is_active_page($item['page']) ? ' is-active' : '' ?>" href="<?= h($item['href']) ?>">
                        <?= h($item['label']) ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="site-actions">
                <button class="icon-button icon-button--search" type="button" aria-label="Search products" data-search-open><?= icon('search') ?></button>
                <button class="button button--ghost" type="button" data-quote-open>
                    <?= icon('quote') ?>
                    <span>RFQ</span>
                    <span class="quote-count" data-quote-count>0</span>
                </button>
                <a class="button button--primary" href="/contact.php#rfq-form">Request Quotation</a>
                <button class="icon-button mobile-only" type="button" aria-label="Open menu" data-menu-open><?= icon('menu') ?></button>
            </div>
        </div>
    </header>

    <div class="mobile-menu" data-mobile-menu aria-hidden="true" inert>
        <div class="mobile-menu__panel">
            <div class="mobile-menu__header">
                <span>Navigation</span>
                <button class="icon-button" type="button" aria-label="Close menu" data-menu-close><?= icon('close') ?></button>
            </div>
            <nav class="mobile-menu__nav">
                <?php foreach (nav_items() as $item): ?>
                    <a href="<?= h($item['href']) ?>"><?= h($item['label']) ?></a>
                <?php endforeach; ?>
                <a href="/products.php">Browse Categories</a>
                <a href="/contact.php#rfq-form">Request Quotation</a>
            </nav>
        </div>
    </div>

    <div class="search-overlay" data-search-overlay aria-hidden="true" inert>
        <div class="search-overlay__panel">
            <div class="search-overlay__header">
                <div>
                    <span class="eyebrow">Search-first procurement</span>
                    <h3>Find products, catalogues and categories instantly</h3>
                    <p>Search by brand, chemical, instrument, glassware, category or brochure topic.</p>
                </div>
                <button class="icon-button" type="button" aria-label="Close search" data-search-close><?= icon('close') ?></button>
            </div>
            <label class="search-field">
                <?= icon('search') ?>
                <input type="search" placeholder="Search ethanol, pipettes, chromatography, Merck..." data-global-search>
            </label>
            <div class="search-overlay__chips">
                <button class="chip chip--active" type="button">Products</button>
                <button class="chip" type="button">Catalogues</button>
                <button class="chip" type="button">Brands</button>
            </div>
            <div class="search-results" data-search-results></div>
        </div>
    </div>

    <aside class="quote-drawer" data-quote-drawer aria-hidden="true" inert>
        <div class="quote-drawer__header">
            <div>
                <span class="eyebrow">Request for quotation</span>
                <h3>Your procurement shortlist</h3>
            </div>
            <button class="icon-button" type="button" aria-label="Close quote list" data-quote-close><?= icon('close') ?></button>
        </div>
        <div class="quote-drawer__body" data-quote-items></div>
        <form class="quote-drawer__form form-card" data-inquiry-form>
            <input type="hidden" name="form_type" value="Quote Drawer">
            <input type="hidden" name="quote_items" data-quote-field value="">
            <div class="form-row">
                <label>
                    Name
                    <input type="text" name="name" placeholder="Procurement manager" required>
                </label>
                <label>
                    Organization
                    <input type="text" name="organization" placeholder="Lab / company" required>
                </label>
            </div>
            <div class="form-row">
                <label>
                    Email
                    <input type="email" name="email" placeholder="you@company.com" required>
                </label>
                <label>
                    Phone
                    <input type="tel" name="phone" placeholder="+91" required>
                </label>
            </div>
            <label>
                Requirement notes
                <textarea name="message" rows="4" placeholder="Share pack sizes, quantities, delivery location or preferred brands." required></textarea>
            </label>
            <button class="button button--primary button--block" type="submit">Submit RFQ</button>
            <p class="form-status" data-form-status></p>
        </form>
    </aside>
    <div class="page-dim" data-page-dim></div>
    <?php
}

function render_footer(): void
{
    $data = site_data();
    ?>
    <section class="mobile-rfq">
        <a href="/contact.php#rfq-form" class="button button--primary button--block">Request Quotation</a>
    </section>

    <footer class="site-footer">
        <div class="container site-footer__grid">
            <div>
                <a href="/index.php" class="brand-mark brand-mark--footer">
                    <span class="brand-mark__logo">SL</span>
                    <span class="brand-mark__copy">
                        <strong>SOMADI LIFESCIENCE</strong>
                        <small>Since 1966</small>
                    </span>
                </a>
                <p><?= h($data['company']['tagline']) ?></p>
            </div>
            <div>
                <span class="eyebrow">Platform</span>
                <a href="/products.php">Products</a>
                <a href="/catalogues.php">Catalogues</a>
                <a href="/contact.php#rfq-form">Request Quotation</a>
            </div>
            <div>
                <span class="eyebrow">Industries</span>
                <a href="/products.php">Pharma</a>
                <a href="/products.php">Research Labs</a>
                <a href="/products.php">Universities</a>
            </div>
            <div>
                <span class="eyebrow">Contact</span>
                <a href="tel:<?= h(str_replace(' ', '', $data['company']['phone'])) ?>"><?= h($data['company']['phone']) ?></a>
                <a href="mailto:<?= h($data['company']['email']) ?>"><?= h($data['company']['email']) ?></a>
                <p><?= h($data['company']['address']) ?></p>
            </div>
        </div>
        <div class="container site-footer__meta">
            <p>&copy; <span data-year></span> SOMADI LIFESCIENCE. All rights reserved.</p>
            <div>
                <a href="/sitemap.xml">Sitemap</a>
                <a href="/robots.txt">Robots</a>
            </div>
        </div>
    </footer>

    <div class="toast-stack" data-toast-stack></div>

    <script>
        window.siteSearch = <?= json_encode([
            'products' => $data['products'],
            'categories' => $data['categories'],
            'catalogues' => $data['catalogues'],
            'brands' => $data['brands'],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    </script>
    <script src="/assets/js/site.js"></script>
</body>
</html>
    <?php
}
