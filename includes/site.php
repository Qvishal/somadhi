<?php

declare(strict_types=1);

function catalogue_asset_path(string $filename): string
{
    return dirname(__DIR__) . '/storage/cataloges/' . $filename;
}

function catalogue_asset_url(string $filename): string
{
    return '/storage/cataloges/' . rawurlencode($filename);
}

function product_asset_url(string $filename): string
{
    return '/storage/extracted_doc_products/images/' . rawurlencode($filename);
}

function brand_logo_asset_url(string $filename): string
{
    return '/storage/brand_logos/' . rawurlencode($filename);
}

function format_file_size_label(int $bytes): string
{
    if ($bytes >= 1024 * 1024) {
        return number_format($bytes / (1024 * 1024), 1) . ' MB';
    }

    if ($bytes >= 1024) {
        return number_format($bytes / 1024, 1) . ' KB';
    }

    return $bytes . ' B';
}

function catalogue_document(string $filename, ?string $label = null, ?string $brand = null): array
{
    $path = catalogue_asset_path($filename);
    $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    return [
        'label' => $label ?? pathinfo($filename, PATHINFO_FILENAME),
        'brand' => $brand,
        'filename' => $filename,
        'url' => catalogue_asset_url($filename),
        'extension' => strtoupper($extension),
        'size' => is_file($path) ? format_file_size_label((int) filesize($path)) : 'File unavailable',
        'previewable' => $extension === 'pdf',
    ];
}

function document_product_catalog(): array
{
    return [
        [
            'slug' => 'agar-powder-bacteriological-grade',
            'name' => 'Agar Powder, Bacteriological Grade',
            'brand' => 'HiMedia',
            'category' => 'Dehydrated Culture Media',
            'availability' => 'Ready Stock',
            'specs' => ['Grade' => 'Bacteriological', 'Format' => 'Powder', 'Use' => 'Microbiology media prep'],
            'summary' => 'Bacteriological agar for microbiology, media preparation and routine culture work.',
            'badge' => 'Culture Media',
            'image' => product_asset_url('02-agar-powder-bacteriological-grade.png'),
        ],
        [
            'slug' => 'fetal-bovine-sera',
            'name' => 'Fetal Bovine Sera',
            'brand' => 'Life Science Range',
            'category' => 'Biochemicals & Immunochemicals',
            'availability' => 'On Request',
            'specs' => ['Type' => 'Sera', 'Workflow' => 'Cell biology', 'Handling' => 'Temperature sensitive'],
            'summary' => 'Cell culture serum solutions suited for life science and cell biology workflows.',
            'badge' => 'Cold Chain',
            'image' => product_asset_url('03-fetal-bovine-sera-sera-cell-biology.jpeg'),
        ],
        [
            'slug' => 'dmem-high-glucose-medium',
            'name' => 'DMEM High Glucose Medium',
            'brand' => 'Life Science Range',
            'category' => 'Molecular Biology Reagents',
            'availability' => 'On Request',
            'specs' => ['Glucose' => '4.5 g/L', 'Additives' => 'L-Glutamine + Sodium Pyruvate', 'Use' => 'Cell culture'],
            'summary' => 'Dulbecco’s Modified Eagle Medium configured for cell culture applications and research support.',
            'badge' => 'Cell Culture',
            'image' => product_asset_url('04-dulbecco-s-modified-eagle-medium-dmem-high-glucose-w-4-5gms-glucose-per-litre-l-.jpeg'),
        ],
        [
            'slug' => 'silver-nitrate-extrapure-ar',
            'name' => 'Silver Nitrate Extrapure AR',
            'brand' => 'Research Chemicals',
            'category' => 'Research Chemicals',
            'availability' => 'Ready Stock',
            'specs' => ['Purity' => '99.9%', 'Grade' => 'Extrapure AR', 'Use' => 'Analytical reagents'],
            'summary' => 'High-purity silver nitrate for analytical chemistry, inorganic salt requirements and research use.',
            'badge' => 'High Purity',
            'image' => product_asset_url('05-silver-nitrate-extrapure-ar-99-9-inorganic-salts-reagents-for-analysis-extrapure.jpeg'),
        ],
        [
            'slug' => 'acetone-extrapure',
            'name' => 'Acetone Extrapure',
            'brand' => 'Solvent Range',
            'category' => 'Indian & Imported Chemicals',
            'availability' => 'In Stock',
            'specs' => ['Purity' => '99%', 'Type' => 'Liquid solvent', 'Grade' => 'Extrapure'],
            'summary' => 'Extrapure acetone suitable for laboratory solvent use, cleaning, dilution and routine analytical work.',
            'badge' => 'Solvent Supply',
            'image' => product_asset_url('06-acetone-extrapure-99-solvents-liquids-pure-extrapure-grade-solvents.jpeg'),
        ],
        [
            'slug' => 'potassium-iodate-emsure',
            'name' => 'Potassium Iodate EMSURE',
            'brand' => 'Merck',
            'category' => 'Research Chemicals',
            'availability' => 'On Request',
            'specs' => ['Grade' => 'ACS / ISO / Ph Eur', 'Type' => 'Analytical reagent', 'CAS' => '7758-05-6'],
            'summary' => 'Analytical-grade potassium iodate for regulated testing, reagent preparation and research laboratories.',
            'badge' => 'EMSURE Grade',
            'image' => product_asset_url('07-potassium-iodate-for-analysis-emsure-acs-iso-reag-ph-eur-7758-05-6.jpeg'),
        ],
        [
            'slug' => 'single-channel-plastic-micropipette',
            'name' => 'Single Channel Plastic Micropipette',
            'brand' => 'Microlit',
            'category' => 'Liquid Handling Products',
            'availability' => 'In Stock',
            'specs' => ['Type' => 'Single channel', 'Capacity' => '10.0 mL', 'Use' => 'Laboratory dispensing'],
            'summary' => 'Microlit single-channel micropipette for routine laboratory liquid handling and measured dispensing.',
            'badge' => 'Microlit',
            'image' => product_asset_url('09-single-channel-plastic-micropipette-microlit-for-laboratory-capacity-10-0-millil.jpeg'),
        ],
        [
            'slug' => 'microlit-lab-micropipette',
            'name' => 'Microlit Lab Micropipette',
            'brand' => 'Microlit',
            'category' => 'Liquid Handling Products',
            'availability' => 'In Stock',
            'specs' => ['Range' => '100-1000 uL', 'Type' => 'Adjustable volume', 'Feature' => 'Autoclavable'],
            'summary' => 'Adjustable-volume Microlit micropipette designed for accurate daily liquid transfer in lab workflows.',
            'badge' => 'Autoclavable',
            'image' => product_asset_url('11-microlit-lab-micropipette-single-channel-adjustable-volume-micro-pipette-fully-a.jpeg'),
        ],
        [
            'slug' => 'microlit-beatus-dispenser',
            'name' => 'Microlit Beatus Dispenser',
            'brand' => 'Microlit',
            'category' => 'Liquid Handling Products',
            'availability' => 'On Request',
            'specs' => ['Technology' => 'Springless valve', 'Valve' => 'Recirculation ready', 'Use' => 'Bottle-top dispensing'],
            'summary' => 'Bottle-top liquid handling solution from Microlit for repeat dispensing and controlled reagent transfer.',
            'badge' => 'Precision Dispensing',
            'image' => product_asset_url('13-microlit-beatus-with-recirculation-valve-and-springless-valvetm-technology-manuf.png'),
        ],
        [
            'slug' => '100bp-dna-ladder-h3',
            'name' => '100bp DNA Ladder H3',
            'brand' => 'Universal Biotechnology',
            'category' => 'Molecular Biology Reagents',
            'availability' => 'On Request',
            'specs' => ['Type' => 'DNA ladder', 'Use' => 'Fragment sizing', 'Workflow' => 'Electrophoresis'],
            'summary' => 'DNA ladder reference for fragment sizing in molecular biology and gel electrophoresis workflows.',
            'badge' => 'Electrophoresis',
            'image' => product_asset_url('15-100bp-dna-ladder-h3-universal-biotechnology-accurate-dna-fragment-sizing.jpeg'),
        ],
        [
            'slug' => '100bp-dna-ladder-rtu',
            'name' => '100bp DNA Ladder RTU',
            'brand' => 'Universal Biotechnology',
            'category' => 'Molecular Biology Reagents',
            'availability' => 'On Request',
            'specs' => ['Format' => 'Ready-to-use', 'Type' => 'DNA ladder', 'Workflow' => 'Gel electrophoresis'],
            'summary' => 'Ready-to-use DNA ladder for quick electrophoresis setup and dependable fragment estimation.',
            'badge' => 'Ready To Use',
            'image' => product_asset_url('17-100bp-dna-ladder-rtu-ready-to-use-molecular-biology-products-universal-biotechno.jpeg'),
        ],
        [
            'slug' => 'corning-15ml-centrifuge-tubes',
            'name' => 'Corning 15 mL Centrifuge Tubes',
            'brand' => 'Corning',
            'category' => 'Laboratory Glassware & Plasticware',
            'availability' => 'In Stock',
            'specs' => ['Capacity' => '15 mL', 'Material' => 'Polypropylene', 'Pack' => 'Sterile rack packed'],
            'summary' => 'Sterile centrifuge tubes with conical bottoms for sample handling, storage and centrifugation tasks.',
            'badge' => 'Sterile Labware',
            'image' => product_asset_url('18-corning-15-ml-centrifuge-tubes-15-ml-centrifuge-tubes-polypropylene-conical-bott.jpeg'),
        ],
        [
            'slug' => 'tarsons-petri-dishes',
            'name' => 'Tarsons Petri Dishes',
            'brand' => 'Tarsons',
            'category' => 'Laboratory Glassware & Plasticware',
            'availability' => 'In Stock',
            'specs' => ['Size' => '90 x 14 mm', 'Sterility' => 'Radiation sterile', 'Pack' => '480 pcs'],
            'summary' => 'Tarsons sterile petri dishes for culture work, microbiology setups and daily laboratory use.',
            'badge' => 'Tarsons',
            'image' => product_asset_url('19-tarsons-petri-dishes-non-vented-radiation-sterile-packing-480-packed-in-sleeve-o.jpeg'),
        ],
        [
            'slug' => 'wellvian-3ply-face-mask',
            'name' => 'Wellvian 3 Ply Face Mask',
            'brand' => 'Wellvian',
            'category' => 'Laboratory Safety Products',
            'availability' => 'In Stock',
            'specs' => ['Layers' => '3 Ply', 'Type' => 'Disposable', 'Use' => 'Laboratory hygiene'],
            'summary' => 'Disposable spunbond face masks for lab hygiene, visitor control and routine protective use.',
            'badge' => 'Safety Stock',
            'image' => product_asset_url('20-wellvian-3-ply-disposable-spunbond-face-mask-at-2-piece-in-bhiwani-id-2259503929.jpeg'),
        ],
        [
            'slug' => 'kimtech-purple-nitrile-gloves',
            'name' => 'Kimtech KC 500 Nitrile Exam Gloves',
            'brand' => 'Kimberly-Clark',
            'category' => 'Laboratory Safety Products',
            'availability' => 'In Stock',
            'specs' => ['Material' => 'Purple nitrile', 'Type' => 'Exam gloves', 'Use' => 'Chemical handling'],
            'summary' => 'Protective nitrile gloves for examination, sample handling and laboratory safety compliance.',
            'badge' => 'Protective Wear',
            'image' => product_asset_url('21-kimberly-clark-kimtech-kc-500-purple-nitrile-exam-gloves.jpeg'),
        ],
        [
            'slug' => 'disposable-head-cover',
            'name' => 'Disposable Head Cover',
            'brand' => 'Golden Ar',
            'category' => 'Laboratory Safety Products',
            'availability' => 'In Stock',
            'specs' => ['Type' => 'Head cover', 'Use' => 'Clean handling', 'Format' => 'Disposable'],
            'summary' => 'Head covers for controlled environments, hygiene-sensitive areas and routine protective use.',
            'badge' => 'Hygiene Supply',
            'image' => product_asset_url('23-head-cover-golden-ar.jpeg'),
        ],
        [
            'slug' => 'laboratory-gowns',
            'name' => 'Laboratory Gowns',
            'brand' => 'Protective Apparel',
            'category' => 'Laboratory Safety Products',
            'availability' => 'On Request',
            'specs' => ['Use' => 'Lab personnel', 'Type' => 'Protective apparel', 'Application' => 'Routine lab wear'],
            'summary' => 'Laboratory gown options for personnel protection in academic, research and quality-control environments.',
            'badge' => 'Protective Apparel',
            'image' => product_asset_url('24-laboratory-gowns-for-use-by-lab-personnel-knowledge-base.png'),
        ],
        [
            'slug' => 'labcare-microscope-slides-cover-slips',
            'name' => 'LABCARE Microscope Slides & Cover Slips',
            'brand' => 'LABCARE',
            'category' => 'Laboratory Glassware & Plasticware',
            'availability' => 'In Stock',
            'specs' => ['Pack' => '100 set', 'Finish' => 'Pre-cleaned', 'Use' => 'Microscopy prep'],
            'summary' => 'Microscope slides and cover slips for microscopy labs, educational use and clinic sample prep.',
            'badge' => 'Microscopy',
            'image' => product_asset_url('26-labcare-microscope-glass-slides-and-cover-slips-set-pack-of-100-pre-cleaned-clea.jpeg'),
        ],
        [
            'slug' => 'parafilm-m',
            'name' => 'Parafilm M',
            'brand' => 'Abdos Lifescience',
            'category' => 'Scientific Consumables',
            'availability' => 'In Stock',
            'specs' => ['Type' => 'Sealing film', 'Use' => 'Sample sealing', 'Range' => 'Laboratory consumable'],
            'summary' => 'Flexible sealing film for temporary closure, sample protection and everyday laboratory handling.',
            'badge' => 'Consumable',
            'image' => product_asset_url('27-parafilm-m-abdos-lifescience.jpeg'),
        ],
        [
            'slug' => 'magnus-led-binocular-microscope',
            'name' => 'Magnus LED Binocular Microscope',
            'brand' => 'Magnus',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'On Request',
            'specs' => ['Model' => 'CH-20i LED', 'Type' => 'Binocular microscope', 'Use' => 'Lab observation'],
            'summary' => 'LED binocular microscope for teaching labs, diagnostics support and routine microscopic analysis.',
            'badge' => 'Instrument',
            'image' => product_asset_url('28-magnus-led-binocular-microscope-model-ch-20i-led-amazon-in-electronics.jpeg'),
        ],
        [
            'slug' => 'ifuge-uc02r-refrigerated-centrifuge',
            'name' => 'iFuge UC02R Refrigerated Centrifuge',
            'brand' => 'Neuation',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'On Request',
            'specs' => ['Type' => 'Refrigerated centrifuge', 'Use' => 'Sample separation', 'Format' => 'Laboratory model'],
            'summary' => 'Refrigerated centrifuge solution for controlled sample separation and temperature-sensitive lab workflows.',
            'badge' => 'Cold Spin',
            'image' => product_asset_url('29-ifuge-uc02r-refrigerated-centrifuge-machine-for-laboratory-at-239000-in-jaipur.png'),
        ],
        [
            'slug' => 'labman-digital-water-bath',
            'name' => 'Labman Digital Water Bath',
            'brand' => 'Labman',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'On Request',
            'specs' => ['Model' => 'LMWB8H', 'Range' => 'RT to 100 C', 'Control' => 'PID with LED display'],
            'summary' => 'Digital water bath for incubation, controlled heating and routine laboratory temperature management.',
            'badge' => 'Temperature Control',
            'image' => product_asset_url('30-labman-digital-water-bath-lmwb8h-2-8-holes-led-display-pid-temperature-control-r.jpeg'),
        ],
        [
            'slug' => 'tarsons-spinix-vortex-shaker',
            'name' => 'Tarsons SPINIX Vortex Shaker',
            'brand' => 'Tarsons',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'On Request',
            'specs' => ['Code' => '3020', 'Type' => 'Vortex shaker', 'Control' => 'Speed control'],
            'summary' => 'Bench-top vortex shaker for fast tube mixing, resuspension and routine sample preparation.',
            'badge' => 'Mixing System',
            'image' => product_asset_url('31-tarsons-spinix-vortex-shaker-qty-1-code-3020-spinix-mc-01-with-speed-control-ama.jpeg'),
        ],
        [
            'slug' => 'mini-centrifuge-6000-rpm',
            'name' => 'Mini Centrifuge 6000 RPM',
            'brand' => 'BR Biochem',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'In Stock',
            'specs' => ['Speed' => '6000 RPM', 'Type' => 'Mini centrifuge', 'Use' => 'Routine spin down'],
            'summary' => 'Compact mini centrifuge for quick spin-down tasks in molecular biology and bench-top workflows.',
            'badge' => 'Compact Instrument',
            'image' => product_asset_url('32-mini-centrifuge-6000-rpm-br-biochem-at-9500-laboratory-centrifuge-in-new-delhi-i.jpeg'),
        ],
        [
            'slug' => 'electrophoresis-power-supply',
            'name' => 'Electrophoresis Power Supply',
            'brand' => 'BR Biochem',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'On Request',
            'specs' => ['Use' => 'Electrophoresis setup', 'Type' => 'Power supply', 'Application' => 'Molecular biology'],
            'summary' => 'Power supply unit for electrophoresis systems and gel-based molecular biology workflows.',
            'badge' => 'Electrophoresis',
            'image' => product_asset_url('33-br-biochem-power-supply-for-electrophoresis-at-40000-new-delhi-id-2855886938662.jpeg'),
        ],
        [
            'slug' => 'magnetic-hotplate-stirrer',
            'name' => 'Magnetic Hotplate Stirrer',
            'brand' => 'Drawell',
            'category' => 'Scientific Instruments & Laboratory Equipment',
            'availability' => 'On Request',
            'specs' => ['Type' => 'Hotplate stirrer', 'Use' => 'Heating and stirring', 'Application' => 'Routine lab prep'],
            'summary' => 'Magnetic hotplate stirrer for heating, solution preparation and controlled bench-top mixing.',
            'badge' => 'Bench Instrument',
            'image' => product_asset_url('34-how-to-use-a-magnetic-hotplate-stirrer-drawell.jpeg'),
        ],
    ];
}

function site_data(): array
{
    $products = document_product_catalog();
    $productBrands = array_values(array_unique(array_map(static fn(array $product): string => $product['brand'], $products)));

    return [
        'company' => [
            'name' => 'Somadi Lifesciences',
            'short' => 'SL',
            'tagline' => 'Trusted distributor and supplier of laboratory products, scientific instruments, research chemicals and healthcare solutions across India.',
            'founding_year' => '2015',
            'phone' => '+91 97178 44841',
            'phone_secondary' => '+91 70424 54067',
            'phones' => ['+91 97178 44841', '+91 70424 54067'],
            'whatsapp' => '+91 97178 44841',
            'email' => 'Info.somadilifesciences@gmail.com',
            'email_secondary' => 'somadilifesciences@gmail.com',
            'emails' => ['Info.somadilifesciences@gmail.com', 'somadilifesciences@gmail.com'],
            'address' => 'I-1870, Jahangir Puri, Delhi 110033, India',
            'street_address' => 'I-1870, Jahangir Puri',
            'locality' => 'Delhi',
            'region' => 'Delhi',
            'postal_code' => '110033',
            'country' => 'IN',
            'gst' => '07CVNPK5540B1ZO',
            'map' => 'https://www.google.com/maps?q=I-1870+Jahangir+Puri+Delhi+110033&output=embed',
            'intro' => 'Established in 2015, Somadi Lifesciences is a trusted distributor and supplier of laboratory products, scientific instruments, research chemicals and healthcare solutions for customers across India.',
            'commitment' => 'We are committed to delivering reliable laboratory and healthcare solutions with a strong focus on quality, efficiency and customer satisfaction, especially for temperature-sensitive and research-critical requirements.',
            'closing' => 'Our team works closely with customers to provide dependable support, smooth coordination and complete laboratory solutions tailored to their requirements.',
        ],
        'meta' => [
            'default_title' => 'Somadi Lifesciences | Scientific Equipment Supplier India',
            'default_description' => 'Trusted supplier of laboratory products, scientific instruments, research chemicals, consumables and healthcare solutions across India.',
            'keywords' => 'scientific equipment supplier India, laboratory chemicals supplier, scientific instruments Delhi, lab consumables distributor, research chemicals supplier India, laboratory products supplier',
            'base_url' => 'https://www.somadilifescience.com',
            'logo' => '/assets/brand/logo-badge.svg',
            'og_image' => '/assets/brand/og-card.svg',
            'favicon' => '/assets/brand/favicon.svg',
        ],
        'metrics' => [
            ['value' => 2015, 'suffix' => '', 'label' => 'Established', 'format' => 'plain'],
            ['value' => 50, 'suffix' => '+', 'label' => 'Product Segments', 'format' => 'localized'],
            ['value' => 20, 'suffix' => '+', 'label' => 'Core Customer Sectors', 'format' => 'localized'],
            ['value' => 100, 'suffix' => '%', 'label' => 'Quality-Focused Supply', 'format' => 'localized'],
        ],
        'categories' => [
            ['slug' => 'research-chemicals', 'name' => 'Research Chemicals', 'summary' => 'Reliable chemicals for research, analytical work and routine laboratory operations.', 'accent' => 'Research Grade', 'icon' => 'flask'],
            ['slug' => 'molecular-biology-reagents', 'name' => 'Molecular Biology Reagents', 'summary' => 'Reagents and supporting supplies for molecular and life science workflows.', 'accent' => 'Life Science', 'icon' => 'spark'],
            ['slug' => 'biochemicals-immunochemicals', 'name' => 'Biochemicals & Immunochemicals', 'summary' => 'Specialized products for advanced biological and immunological applications.', 'accent' => 'Biochemical Range', 'icon' => 'droplet'],
            ['slug' => 'indian-imported-chemicals', 'name' => 'Indian & Imported Chemicals', 'summary' => 'Authentic products sourced from leading national and international brands.', 'accent' => 'Authentic Sourcing', 'icon' => 'beaker'],
            ['slug' => 'glassware-plasticware', 'name' => 'Laboratory Glassware & Plasticware', 'summary' => 'Daily-use essentials for handling, measuring, storage and sample preparation.', 'accent' => 'Core Labware', 'icon' => 'beaker'],
            ['slug' => 'liquid-handling', 'name' => 'Liquid Handling Products', 'summary' => 'Pipettes, dispensers and accessories for controlled, repeatable handling.', 'accent' => 'Precision Handling', 'icon' => 'pipette'],
            ['slug' => 'culture-media', 'name' => 'Dehydrated Culture Media', 'summary' => 'Microbiology media solutions for research, diagnostics and quality testing.', 'accent' => 'Microbiology', 'icon' => 'wave'],
            ['slug' => 'safety-products', 'name' => 'Laboratory Safety Products', 'summary' => 'Protective gear and safety-focused products for compliant lab environments.', 'accent' => 'Safe Operations', 'icon' => 'shield'],
            ['slug' => 'scientific-instruments', 'name' => 'Scientific Instruments & Laboratory Equipment', 'summary' => 'Instruments and equipment for research, diagnostics and laboratory setup.', 'accent' => 'Equipment Supply', 'icon' => 'scale'],
            ['slug' => 'scientific-consumables', 'name' => 'Scientific Consumables', 'summary' => 'Fast-moving consumables that keep routine lab operations running smoothly.', 'accent' => 'Daily Supply', 'icon' => 'box'],
        ],
        'products' => $products,
        'authorized_brands' => ['HiMedia', 'Titan Media', 'SRL', 'CDH', 'Biohall', 'Microlit', 'BLD Pharm', 'Spectrochem', 'Labman', 'Wensar', 'Ammatron Instruments'],
        'dealing_brands' => ['HiMedia', 'Titan Media', 'Borosil', 'Biohall', 'Tarsons', 'Polylab', 'Abdos', 'Avantor', 'Whatman', 'Merck', 'Qualigens', 'Thermo Fisher Scientific', 'Thomas Baker', 'CDH', 'Loba Chemie', 'Otto Chemie', 'TCI', 'NEB', 'Fermentas', 'SRL Chemicals', 'Sigma Aldrich', 'Elabscience', 'Cayman', 'MedChem Express', 'Abbkine', 'Santa Cruz', 'Addgene', 'Zymo', 'Sartorius', 'Ohaus', 'DLAB', 'Eppendorf', 'Magnus', 'Remi', 'Labman', 'Wensar', 'Microlit', 'Neuation', 'Ammatron'],
        'brands' => $productBrands,
        'brand_logos' => [
            ['name' => 'HiMedia', 'image' => brand_logo_asset_url('himedia.png')],
            ['name' => 'Titan Media', 'image' => brand_logo_asset_url('tm-media.jpeg')],
            ['name' => 'SRL', 'image' => brand_logo_asset_url('srl.png')],
            ['name' => 'CDH', 'image' => brand_logo_asset_url('cdh.png')],
            ['name' => 'Biohall', 'image' => brand_logo_asset_url('biohall.png')],
            ['name' => 'Microlit', 'image' => brand_logo_asset_url('microlit.png')],
            ['name' => 'BLD Pharm', 'image' => brand_logo_asset_url('bld-pharm.png')],
            ['name' => 'Spectrochem', 'image' => brand_logo_asset_url('spectrochem.png')],
            ['name' => 'Labman', 'image' => brand_logo_asset_url('labman.jpeg')],
            ['name' => 'Wensar', 'image' => brand_logo_asset_url('wensar.jpeg')],
        ],
        'industries' => [
            ['name' => 'Research Laboratories', 'summary' => 'Dependable products for day-to-day research workflows and technical studies.'],
            ['name' => 'Educational Institutions', 'summary' => 'Laboratory essentials and instruments for teaching, training and academic research.'],
            ['name' => 'Pharmaceutical Companies', 'summary' => 'Quality-focused supply support for analytical, QC and production-linked teams.'],
            ['name' => 'Hospitals', 'summary' => 'Selected laboratory and healthcare requirements supported through reliable sourcing.'],
            ['name' => 'Diagnostic Centers', 'summary' => 'Consumables, reagents and support products for testing and diagnostics environments.'],
            ['name' => 'Industrial Organizations', 'summary' => 'Scientific supply support for plant labs, QA teams and industrial testing functions.'],
            ['name' => 'Biotechnology', 'summary' => 'Life science-aligned products for biology, reagent handling and filtration needs.'],
            ['name' => 'Healthcare', 'summary' => 'Practical healthcare solution support with careful handling and timely coordination.'],
        ],
        'differentiators' => [
            ['title' => 'Trusted Since 2015', 'summary' => 'A growing reputation for professionalism, authenticity and service excellence.'],
            ['title' => 'Genuine & High-Quality Products', 'summary' => 'Products sourced from leading national and international brands with a focus on reliability.'],
            ['title' => 'Competitive Pricing', 'summary' => 'Practical commercial support for institutions, laboratories and industrial buyers.'],
            ['title' => 'Prompt Delivery Across India', 'summary' => 'Reliable coordination for urgent, routine and recurring supply requirements.'],
            ['title' => 'Temperature-Controlled Handling', 'summary' => 'Careful storage and transportation for sensitive research and healthcare products.'],
            ['title' => 'Dedicated Customer Support', 'summary' => 'Dependable support, smooth coordination and responsive follow-up for every inquiry.'],
            ['title' => 'Customized Laboratory Solutions', 'summary' => 'Product combinations and sourcing support tailored to customer requirements.'],
        ],
        'catalogues' => [
            [
                'title' => 'Life Science',
                'category' => 'Life Science',
                'brands' => ['HiMedia', 'Titan', 'Takara'],
                'documents' => [
                    catalogue_document('HIMEDIA PRICE LIST 2026-27.pdf', 'HiMedia Price List', 'HiMedia'),
                    catalogue_document('Titan Price List 2026-27.pdf', 'Titan Price List', 'Titan'),
                    catalogue_document('Takara price list 2026.pdf', 'Takara Price List', 'Takara'),
                ],
            ],
            [
                'title' => 'Chemicals',
                'category' => 'Chemicals',
                'brands' => ['Qualigens', 'SRL', 'CDH', 'Merck', 'Loba', 'Rankem'],
                'documents' => [
                    catalogue_document('QUALIGENS revised price list 2026.xlsx', 'Qualigens Price List', 'Qualigens'),
                    catalogue_document('SRL E CATALOGUE 2026-27.pdf', 'SRL E-Catalogue', 'SRL'),
                    catalogue_document('CDH PRICE LIST 2026-27.pdf', 'CDH Price List', 'CDH'),
                    catalogue_document('Merck Price List April 2026.pdf', 'Merck Price List', 'Merck'),
                    catalogue_document('Loba price list 2026-27.pdf', 'Loba Price List', 'Loba'),
                    catalogue_document('RANKEM PRICE LIST 2026-27.pdf', 'Rankem Price List', 'Rankem'),
                ],
            ],
            [
                'title' => 'Plasticware',
                'category' => 'Plasticware',
                'brands' => ['Tarsons', 'Abdos', 'Polylab'],
                'documents' => [
                    catalogue_document('Tarsons Price List 2026.xlsx', 'Tarsons Price List', 'Tarsons'),
                    catalogue_document('Abdos Price List 2026-27.xlsx', 'Abdos Price List', 'Abdos'),
                    catalogue_document('Polylab Price List 2026 (Effective from 01.04.2026).pdf', 'Polylab Price List', 'Polylab'),
                ],
            ],
            [
                'title' => 'Glassware',
                'category' => 'Glassware',
                'brands' => ['Borosil', 'Biohall', 'Riviera', 'Blue Star'],
                'documents' => [
                    catalogue_document('Borosil Price List 2026-27.pdf', 'Borosil Price List', 'Borosil'),
                    catalogue_document('Biohall Germany Glassware Price List-2026-27.pdf', 'Biohall Glassware Price List', 'Biohall'),
                    catalogue_document('RIVIERA PRICE LIST for 2026-2027 Dt. 08-04-26.pdf', 'Riviera Price List', 'Riviera'),
                    catalogue_document('Blue star price list 2026.pdf', 'Blue Star Price List', 'Blue Star'),
                ],
            ],
            [
                'title' => 'Laboratory Filtration',
                'category' => 'Laboratory Filtration',
                'brands' => ['Whatman', 'Axiva', 'Borosil', 'Merck'],
                'documents' => [
                    catalogue_document('Whatman Price List 2026.pdf', 'Whatman Price List', 'Whatman'),
                    catalogue_document('AXIVA PRICE LIST 2026.xlsx', 'Axiva Price List', 'Axiva'),
                    catalogue_document('Borosil Price List 2026-27.pdf', 'Borosil Price List', 'Borosil'),
                    catalogue_document('Merck Price List April 2026.pdf', 'Merck Price List', 'Merck'),
                ],
            ],
            [
                'title' => 'Liquid Handling Instruments',
                'category' => 'Liquid Handling Instruments',
                'brands' => ['Microlit', 'Thermo', 'Tarsons', 'HiMedia'],
                'documents' => [
                    catalogue_document('MICROLIT INR Price List_FY 2026-27.pdf', 'Microlit Price List', 'Microlit'),
                    catalogue_document('Thermo Pipette Price List 2026-27.pdf', 'Thermo Pipette Price List', 'Thermo'),
                    catalogue_document('Tarsons Price List 2026.xlsx', 'Tarsons Price List', 'Tarsons'),
                    catalogue_document('HIMEDIA PRICE LIST 2026-27.pdf', 'HiMedia Price List', 'HiMedia'),
                ],
            ],
            [
                'title' => 'Instrument',
                'category' => 'Instrument',
                'brands' => ['Neuation', 'Labman', 'DLAB'],
                'documents' => [
                    catalogue_document('Neuation price list 2026-27.pdf', 'Neuation Price List', 'Neuation'),
                    catalogue_document('DLAB price list 2026-27.pdf', 'DLAB Price List', 'DLAB'),
                ],
            ],
        ],
        'faqs' => [
            ['question' => 'What types of products does Somadi Lifescience supply?', 'answer' => 'We supply laboratory products, scientific instruments, research chemicals, consumables, liquid handling products, HPLC supplies, safety products, medical equipment and diagnostics solutions.'],
            ['question' => 'Which customer segments do you support?', 'answer' => 'We work with research laboratories, educational institutions, pharmaceutical companies, hospitals, diagnostic centers and industrial organizations across India.'],
            ['question' => 'Do you handle temperature-sensitive products carefully?', 'answer' => 'Yes. Proper handling, storage and transportation are a key part of our supply process for temperature-sensitive products used in research, diagnostics and healthcare applications.'],
            ['question' => 'Can we request customized laboratory solutions or bulk supply support?', 'answer' => 'Yes. We provide customized laboratory solutions, dependable coordination and support for bulk, recurring and application-specific requirements.'],
        ],
        'overview_blocks' => [
            ['icon' => 'spark', 'title' => 'Who We Are', 'summary' => 'Established in 2015, Somadi Lifesciences serves scientific, research and healthcare customers with dependable sourcing and responsive service.'],
            ['icon' => 'box', 'title' => 'What We Supply', 'summary' => 'Our portfolio covers laboratory products, scientific instruments, research chemicals, consumables and healthcare-oriented product requirements.'],
            ['icon' => 'check', 'title' => 'Our Commitment', 'summary' => 'We focus on quality, efficiency, careful handling and customer satisfaction for every inquiry, order and delivery.'],
        ],
    ];
}

function catalogue_items(): array
{
    $items = [];

    foreach (site_data()['catalogues'] as $catalogue) {
        foreach ($catalogue['documents'] as $document) {
            $slug = slugify($catalogue['category'] . '-' . $document['brand'] . '-' . $document['label']);

            $items[] = [
                'slug' => $slug,
                'title' => $document['label'],
                'category' => $catalogue['category'],
                'brand' => $document['brand'] ?? $catalogue['title'],
                'url' => $document['url'],
                'extension' => $document['extension'],
                'size' => $document['size'],
                'previewable' => $document['previewable'],
                'filename' => $document['filename'],
                'search_terms' => implode(' ', array_filter([
                    $document['label'],
                    $document['brand'] ?? '',
                    $catalogue['category'],
                    $catalogue['title'],
                    implode(' ', $catalogue['brands']),
                ])),
            ];
        }
    }

    return $items;
}

function page_meta(string $page): array
{
    $data = site_data();
    $meta = $data['meta'];
    $companyName = $data['company']['name'];
    $categoryNames = array_map(static fn(array $category): string => $category['name'], $data['categories']);
    $catalogueItems = catalogue_items();

    $pages = [
        'home' => [
            'title' => $companyName . ' | Scientific Equipment Supplier India',
            'description' => $companyName . ' supplies laboratory products, research chemicals, scientific instruments, labware and consumables across India with RFQ support.',
            'keywords' => implode(', ', [
                'scientific equipment supplier India',
                'laboratory products supplier Delhi',
                'research chemicals supplier India',
                'lab consumables distributor',
                'scientific instruments supplier',
                'laboratory procurement support',
            ]),
        ],
        'products' => [
            'title' => 'Laboratory Products & Scientific Equipment | ' . $companyName,
            'description' => 'Browse ' . count($data['products']) . ' representative products across ' . count($data['categories']) . ' lab supply categories including chemicals, liquid handling, safety and instruments.',
            'keywords' => implode(', ', array_merge([
                'laboratory products India',
                'scientific equipment supplier India',
                'research chemicals supplier',
            ], $categoryNames)),
        ],
        'catalogues' => [
            'title' => 'Scientific Catalogues & Brochures | ' . $companyName,
            'description' => 'Download ' . count($catalogueItems) . ' searchable scientific catalogues for life science, chemicals, plasticware, glassware, filtration, liquid handling and instruments.',
            'keywords' => 'scientific catalogue India, laboratory product brochures, chemical price list, labware catalogue, liquid handling catalogue, instrument catalogue',
        ],
        'contact' => [
            'title' => 'Contact & RFQ | ' . $companyName,
            'description' => 'Contact ' . $companyName . ' in Delhi for laboratory product quotations, catalogue requests, stock confirmation and scientific procurement support.',
            'keywords' => 'contact laboratory supplier Delhi, lab products RFQ India, scientific equipment quotation, research chemicals supplier contact',
        ],
    ];

    return array_merge($meta, $pages[$page] ?? []);
}

function slugify(string $value): string
{
    $slug = strtolower(trim($value));
    $slug = preg_replace('/[^a-z0-9]+/', '-', $slug) ?? '';
    return trim($slug, '-') ?: 'item';
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

function site_modified_iso(): string
{
    $files = [
        __DIR__ . '/site.php',
        dirname(__DIR__) . '/index.php',
        dirname(__DIR__) . '/products.php',
        dirname(__DIR__) . '/catalogues.php',
        dirname(__DIR__) . '/contact.php',
        dirname(__DIR__) . '/assets/css/styles.css',
        dirname(__DIR__) . '/assets/js/site.js',
    ];

    $modified = max(array_map(
        static fn(string $file): int => is_file($file) ? (int) filemtime($file) : 0,
        $files
    ));

    return date(DATE_ATOM, $modified ?: time());
}

function product_page_url(array $product): string
{
    return absolute_url('/products.php#product-' . $product['slug']);
}

function catalogue_page_url(array $catalogue): string
{
    return absolute_url('/catalogues.php#catalogue-' . $catalogue['slug']);
}

function phone_href(string $phone): string
{
    return 'tel:' . preg_replace('/\D+/', '', $phone);
}

function whatsapp_href(string $phone): string
{
    return 'https://wa.me/' . preg_replace('/\D+/', '', $phone);
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
    $categoryNames = array_map(static fn(array $category): string => $category['name'], $data['categories']);
    $brandNodes = array_map(
        static fn(array $brand): array => [
            '@type' => 'Brand',
            '@id' => absolute_url('/#brand-' . slugify($brand['name'])),
            'name' => $brand['name'],
            'logo' => absolute_url($brand['image']),
        ],
        $data['brand_logos']
    );

    return [
        '@type' => ['Organization', 'LocalBusiness'],
        '@id' => absolute_url('/#organization'),
        'name' => $company['name'],
        'legalName' => $company['name'],
        'alternateName' => $company['short'],
        'url' => absolute_url('/'),
        'email' => $company['emails'],
        'telephone' => $company['phones'],
        'description' => $company['tagline'],
        'slogan' => $company['tagline'],
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
                'telephone' => $company['phone_secondary'],
                'email' => $company['email_secondary'],
                'areaServed' => 'IN',
                'availableLanguage' => ['en', 'hi'],
            ],
        ],
        'brand' => $brandNodes,
        'knowsAbout' => array_values(array_unique(array_merge($categoryNames, [
            'Laboratory products',
            'Scientific instruments',
            'Research chemicals',
            'Healthcare supply',
            'Laboratory consumables',
            'Scientific procurement',
        ]))),
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
        'priceRange' => 'RFQ',
        'currenciesAccepted' => 'INR',
        'paymentAccepted' => 'Bank transfer, UPI, cheque',
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
        'potentialAction' => [
            '@type' => 'ContactAction',
            'name' => 'Request a laboratory product quotation',
            'target' => absolute_url('/contact.php#rfq-form'),
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
    $mainEntity = match ($page) {
        'products' => ['@id' => absolute_url('/products.php#itemlist')],
        'catalogues' => ['@id' => absolute_url('/catalogues.php#itemlist')],
        'contact' => ['@id' => absolute_url('/contact.php#contact-page')],
        'home' => ['@id' => absolute_url('/#brand-list')],
        default => null,
    };

    return array_filter([
        '@type' => page_schema_type($page),
        '@id' => current_page_url() . '#webpage',
        'url' => current_page_url(),
        'name' => $meta['title'] ?? $meta['default_title'],
        'description' => $meta['description'] ?? $meta['default_description'],
        'keywords' => $meta['keywords'],
        'dateModified' => site_modified_iso(),
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
        'mainEntity' => $mainEntity,
        'inLanguage' => 'en-IN',
    ]);
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
        'name' => 'Laboratory products and scientific equipment',
        'description' => 'Representative laboratory products, research chemicals, life science reagents, safety products, consumables and scientific instruments available through RFQ.',
        'numberOfItems' => count($products),
        'itemListElement' => array_map(
            static fn(array $product, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'item' => [
                    '@type' => 'Product',
                    '@id' => product_page_url($product),
                    'name' => $product['name'],
                    'sku' => $product['slug'],
                    'image' => !empty($product['image']) ? absolute_url($product['image']) : null,
                    'brand' => [
                        '@type' => 'Brand',
                        '@id' => absolute_url('/#brand-' . slugify($product['brand'])),
                        'name' => $product['brand'],
                    ],
                    'category' => $product['category'],
                    'description' => $product['summary'],
                    'url' => product_page_url($product),
                    'additionalProperty' => array_map(
                        static fn(string $label, string $value): array => [
                            '@type' => 'PropertyValue',
                            'name' => $label,
                            'value' => $value,
                        ],
                        array_keys($product['specs']),
                        array_values($product['specs'])
                    ),
                    'potentialAction' => [
                        '@type' => 'ContactAction',
                        'target' => absolute_url('/contact.php#rfq-form'),
                    ],
                ],
            ],
            $products,
            array_keys($products)
        ),
    ];
}

function build_catalogues_collection_schema(): array
{
    $catalogues = catalogue_items();

    return [
        '@type' => 'ItemList',
        '@id' => absolute_url('/catalogues.php#itemlist'),
        'name' => 'Scientific catalogues and price lists',
        'description' => 'Downloadable catalogue and price-list resources for laboratory chemicals, life science products, labware, filtration, liquid handling and instruments.',
        'numberOfItems' => count($catalogues),
        'itemListElement' => array_map(
            static fn(array $catalogue, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'item' => array_filter([
                    '@type' => 'CreativeWork',
                    '@id' => catalogue_page_url($catalogue),
                    'name' => $catalogue['title'],
                    'genre' => $catalogue['category'],
                    'description' => 'Scientific catalogue and brochure resource for ' . $catalogue['brand'] . ' in the ' . $catalogue['category'] . ' category.',
                    'url' => catalogue_page_url($catalogue),
                    'contentUrl' => absolute_url($catalogue['url']),
                    'fileFormat' => $catalogue['extension'],
                    'keywords' => implode(', ', array_filter([$catalogue['brand'], $catalogue['category'], $catalogue['extension']])),
                    'about' => [
                        '@type' => 'Brand',
                        '@id' => absolute_url('/#brand-' . slugify($catalogue['brand'])),
                        'name' => $catalogue['brand'],
                    ],
                    'encoding' => isset($catalogue['size']) ? [
                        '@type' => 'MediaObject',
                        'name' => $catalogue['title'],
                        'contentUrl' => absolute_url($catalogue['url']),
                        'encodingFormat' => $catalogue['extension'],
                        'fileSize' => $catalogue['size'],
                    ] : null,
                ]),
            ],
            $catalogues,
            array_keys($catalogues)
        ),
    ];
}

function build_brand_collection_schema(): array
{
    $brands = site_data()['brand_logos'];

    return [
        '@type' => 'ItemList',
        '@id' => absolute_url('/#brand-list'),
        'name' => 'Featured scientific brands',
        'numberOfItems' => count($brands),
        'itemListElement' => array_map(
            static fn(array $brand, int $index): array => [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'item' => [
                    '@type' => 'Brand',
                    '@id' => absolute_url('/#brand-' . slugify($brand['name'])),
                    'name' => $brand['name'],
                    'logo' => absolute_url($brand['image']),
                ],
            ],
            $brands,
            array_keys($brands)
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
        'name' => 'Contact ' . $company['name'],
        'description' => 'Contact ' . $company['name'] . ' for laboratory procurement, quotations, bulk sourcing and technical product support.',
        'mainEntity' => [
            '@type' => 'ContactPoint',
            'contactType' => 'sales',
            'telephone' => $company['phones'],
            'email' => $company['emails'],
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
        $schemas[] = build_brand_collection_schema();
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
    $company = site_data()['company'];
    $title = $meta['title'] ?? $meta['default_title'];
    $description = $meta['description'] ?? $meta['default_description'];
    $canonicalUrl = current_page_url();
    $imageUrl = absolute_url($meta['og_image']);
    $imageAlt = 'Social preview for ' . $title;
    $modifiedAt = site_modified_iso();
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
    <meta name="author" content="<?= h($company['name']) ?>">
    <meta name="geo.region" content="IN-DL">
    <meta name="geo.placename" content="Delhi">
    <meta name="ICBM" content="28.7256,77.1624">
    <meta name="referrer" content="strict-origin-when-cross-origin">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#1f4f3e">
    <meta property="og:locale" content="en_IN">
    <meta property="og:site_name" content="<?= h($company['name']) ?>">
    <meta property="og:title" content="<?= h($title) ?>">
    <meta property="og:description" content="<?= h($description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= h($canonicalUrl) ?>">
    <meta property="og:image" content="<?= h($imageUrl) ?>">
    <meta property="og:image:secure_url" content="<?= h($imageUrl) ?>">
    <meta property="og:image:alt" content="<?= h($imageAlt) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:updated_time" content="<?= h($modifiedAt) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= h($title) ?>">
    <meta name="twitter:description" content="<?= h($description) ?>">
    <meta name="twitter:image" content="<?= h($imageUrl) ?>">
    <meta name="twitter:image:alt" content="<?= h($imageAlt) ?>">
    <link rel="canonical" href="<?= h($canonicalUrl) ?>">
    <link rel="icon" type="image/svg+xml" href="<?= h($meta['favicon']) ?>">
    <link rel="stylesheet" href="/assets/css/styles.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">    
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
            <p>Laboratory products, research chemicals, scientific instruments and healthcare solutions supplied across India.</p>
            <div class="topbar__links">
                <?php foreach ($data['company']['phones'] as $phone): ?>
                    <a href="<?= h(phone_href($phone)) ?>"><?= h($phone) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <header class="site-header" data-header>
        <div class="container site-header__inner">
            <a href="/index.php" class="brand-mark" aria-label="<?= h($data['company']['name']) ?> home">
                <span class="brand-mark__logo">SL</span>
                <span class="brand-mark__copy">
                    <strong><?= h($data['company']['name']) ?></strong>
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
                        <strong><?= h($data['company']['name']) ?></strong>
                        <small>Established 2015</small>
                    </span>
                </a>
                <p><?= h($data['company']['tagline']) ?></p>
                <div class="footer-badges">
                    <img src="/assets/brand/msme-logo.png" alt="MSME Registered Enterprise" class="footer-badge-img">
                    <img src="/assets/brand/gem-logo.png" alt="GeM Registered Seller" class="footer-badge-img">
                </div>
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
                <?php foreach ($data['company']['phones'] as $phone): ?>
                    <a href="<?= h(phone_href($phone)) ?>"><?= h($phone) ?></a>
                <?php endforeach; ?>
                <?php foreach ($data['company']['emails'] as $email): ?>
                    <a href="mailto:<?= h($email) ?>"><?= h($email) ?></a>
                <?php endforeach; ?>
                <p><?= h($data['company']['address']) ?></p>
            </div>
        </div>
        <div class="container site-footer__meta">
            <p>&copy; <span data-year></span> <?= h($data['company']['name']) ?>. All rights reserved.</p>
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
            'catalogues' => catalogue_items(),
            'brands' => array_values(array_unique(array_merge($data['brands'], $data['authorized_brands'], $data['dealing_brands']))),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
    </script>
    <script src="/assets/js/site.js"></script>
</body>
</html>
    <?php
}
