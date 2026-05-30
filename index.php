<?php

declare(strict_types=1);

require __DIR__ . '/includes/site.php';

$page = 'home';
$data = site_data();
$company = $data['company'];

render_head($page);
render_header();
?>
<main>
    <section class="hero">
        <div class="hero__backdrop"></div>
        <div class="container hero__grid">
            <div class="hero__content reveal">
                <span class="eyebrow">Welcome to Somadi Lifesciences</span>
                <h1>Trusted Laboratory Products and Scientific Supplies Across India</h1>
                <p class="hero__lead">Laboratory products, scientific instruments and research chemicals for customers across India. <?= h($company['intro']) ?></p>
                <div class="hero__actions">
                    <a class="button button--primary" href="/products">Explore Products <?= icon('arrow') ?></a>
                    <a class="button button--secondary" href="/contact#rfq-form">Request Quotation</a>
                    <a class="button button--ghost" href="/catalogues">Download Catalogues</a>
                </div>
            </div>
            <div class="hero__visual reveal reveal--delay">
                <div class="science-scene">
                    <div class="science-scene__glass science-scene__glass--tall">
                        <span>Trusted supplier since 2015</span>
                        <strong>Laboratory and healthcare solutions</strong>
                    </div>
                    <div class="science-scene__glass science-scene__glass--wide">
                        <span>Pan India support</span>
                        <strong>Supply, coordinate and deliver with care</strong>
                    </div>
                    <div class="science-scene__molecule science-scene__molecule--one"></div>
                    <div class="science-scene__molecule science-scene__molecule--two"></div>
                    <div class="science-scene__panel">
                        <span class="eyebrow">Somadi supply overview</span>
                        <div class="signal-card">
                            <div>
                                <small>Core strengths</small>
                                <strong>Chemicals, instruments, consumables</strong>
                            </div>
                            <span class="signal-card__status">Responsive RFQ Support</span>
                        </div>
                        <div class="signal-columns">
                            <div>
                                <small>Established</small>
                                <strong>2015</strong>
                            </div>
                            <div>
                                <small>Coverage</small>
                                <strong>Pan India</strong>
                            </div>
                            <div>
                                <small>Handling</small>
                                <strong>Temperature aware</strong>
                            </div>
                        </div>
                        <div class="science-bars">
                            <span style="--bar: 84%"></span>
                            <span style="--bar: 68%"></span>
                            <span style="--bar: 91%"></span>
                            <span style="--bar: 73%"></span>
                            <span style="--bar: 88%"></span>
                        </div>
                    </div>
                </div>
                <div class="hero__trust">
                    <div class="trust-pill">
                        <span><?= icon('check') ?></span>
                        <strong>Genuine quality products</strong>
                    </div>
                    <div class="trust-pill">
                        <span><?= icon('spark') ?></span>
                        <strong>Dedicated customer support</strong>
                    </div>
                    <div class="trust-pill">
                        <span><?= icon('map') ?></span>
                        <strong>Prompt delivery across India</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container metrics-grid">
            <?php foreach ($data['metrics'] as $metric): ?>
                <article class="metric-card reveal">
                    <strong
                        data-counter="<?= h((string) $metric['value']) ?>"
                        data-suffix="<?= h($metric['suffix']) ?>"
                        data-format="<?= h($metric['format'] ?? 'localized') ?>"
                    >0</strong>
                    <p><?= h($metric['label']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Company profile</span>
                <h2>Reliable scientific supply with practical support for laboratories and healthcare buyers</h2>
            </div>
            <p><?= h($company['commitment']) ?></p>
        </div>
        <div class="container info-grid">
            <?php foreach ($data['overview_blocks'] as $block): ?>
                <article class="info-card reveal">
                    <span class="info-card__icon"><?= icon($block['icon']) ?></span>
                    <h3><?= h($block['title']) ?></h3>
                    <p><?= h($block['summary']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Featured products</span>
                <h2>Representative products from our broader scientific supply portfolio</h2>
            </div>
            <p>These RFQ-ready cards make it easier to review practical product examples while the broader product range remains available through category discovery and direct inquiry.</p>
        </div>
        <div class="container product-grid product-grid--featured">
            <?php foreach (array_slice($data['products'], 0, 8) as $product): ?>
                <article class="product-card reveal" data-product-card data-name="<?= h($product['name']) ?>" data-brand="<?= h($product['brand']) ?>" data-category="<?= h($product['category']) ?>" data-availability="<?= h($product['availability']) ?>">
                    <div class="product-card__visual">
                        <span class="product-badge"><?= h($product['badge']) ?></span>
                        <?php if (!empty($product['image'])): ?>
                            <div class="product-art product-art--image">
                                <img class="product-card__image" src="<?= h($product['image']) ?>" alt="<?= h($product['name']) ?>" width="400" height="300" loading="lazy">
                            </div>
                        <?php else: ?>
                            <div class="product-art product-art--<?= h(strtolower(str_replace([' ', '&'], ['-', 'and'], $product['category']))) ?>">
                                <span><?= h($product['brand']) ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="product-card__copy">
                        <div class="product-card__meta">
                            <span><?= h($product['category']) ?></span>
                            <strong><?= h($product['brand']) ?></strong>
                        </div>
                        <h3><?= h($product['name']) ?></h3>
                        <p><?= h($product['summary']) ?></p>
                        <ul class="spec-list">
                            <?php foreach ($product['specs'] as $label => $value): ?>
                                <li><span><?= h($label) ?></span><strong><?= h($value) ?></strong></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="availability-row">
                            <span class="availability-pill"><?= h($product['availability']) ?></span>
                            <button type="button" class="link-button" data-compare-trigger data-product='<?= h(json_encode($product, JSON_UNESCAPED_SLASHES)) ?>'>Compare</button>
                        </div>
                        <div class="product-card__actions">
                            <button class="button button--primary button--small" type="button" data-add-quote data-product='<?= h(json_encode($product, JSON_UNESCAPED_SLASHES)) ?>'>Quotation</button>
                            <a class="button button--ghost button--small" href="/catalogues">Brochure</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Our product range</span>
                <h2>Core laboratory, life science and healthcare-focused supply categories</h2>
            </div>
            <p>Our supply range covers routine laboratory essentials as well as specialized product lines used in research, diagnostics, education and industrial testing.</p>
        </div>
        <div class="container category-grid">
            <?php foreach ($data['categories'] as $category): ?>
                <article class="category-card reveal" id="<?= h($category['slug']) ?>">
                    <div class="category-card__icon"><?= icon($category['icon']) ?></div>
                    <span class="category-card__accent"><?= h($category['accent']) ?></span>
                    <h3><?= h($category['name']) ?></h3>
                    <p><?= h($category['summary']) ?></p>
                    <a href="/products#products-grid">Quick navigation <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container brand-strip reveal">
            <div class="section-heading section-heading--compact">
                <div>
                    <span class="eyebrow">Brand ecosystem</span>
                    <h2>Featured scientific brands from our current supply and sourcing portfolio</h2>
                </div>
            </div>
            <div class="marquee">
                <div class="marquee__track">
                    <?php foreach (array_merge($data['brand_logos'], $data['brand_logos']) as $brand): ?>
                        <span class="brand-chip brand-chip--logo">
                            <img src="<?= h($brand['image']) ?>" alt="<?= h($brand['name']) ?> logo" loading="lazy" width="120" height="60">
                            <span><?= h($brand['name']) ?></span>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Authorized network</span>
                <h2>Authorized brands and wider dealing portfolio from the Somadi brand file</h2>
            </div>
            <p>The latest Somadi website document has been applied here as a clearer trust section, showing both authorized brands and the broader dealing portfolio buyers can inquire against.</p>
        </div>
        <div class="container brand-directory">
            <article class="brand-directory__card reveal">
                <span class="eyebrow">Authorized brands</span>
                <h3>Selected authorization-backed partners</h3>
                <p>These brands are surfaced as direct authorization and core trust signals for the business.</p>
                <div class="brand-cloud">
                    <?php foreach ($data['authorized_brands'] as $brand): ?>
                        <span class="brand-chip"><?= h($brand) ?></span>
                    <?php endforeach; ?>
                </div>
            </article>
            <article class="brand-directory__card reveal reveal--delay">
                <span class="eyebrow">Dealing brands</span>
                <h3>Broader scientific and laboratory sourcing coverage</h3>
                <p>This extended brand list reflects the wider product ecosystem available for enquiries, catalogues and sourcing discussions.</p>
                <div class="brand-cloud" data-brand-cloud="dealing">
                    <?php foreach ($data['dealing_brands'] as $index => $brand): ?>
                        <span class="brand-chip" <?= $index >= 12 ? 'data-brand-extra hidden' : '' ?>><?= h($brand) ?></span>
                    <?php endforeach; ?>
                </div>
                <?php if (count($data['dealing_brands']) > 12): ?>
                    <button class="button button--secondary button--small" style="align-self: flex-start; margin-top: 18px;" type="button" data-brand-toggle>
                        Show all brands (+<?= count($data['dealing_brands']) - 12 ?>)
                    </button>
                <?php endif; ?>
            </article>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Why choose us</span>
                <h2>Built on dependable service, careful handling and customer-focused support</h2>
            </div>
            <p><?= h($company['closing']) ?></p>
        </div>
        <div class="container info-grid">
            <?php foreach ($data['differentiators'] as $item): ?>
                <article class="info-card reveal">
                    <span class="info-card__icon"><?= icon('check') ?></span>
                    <h3><?= h($item['title']) ?></h3>
                    <p><?= h($item['summary']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container industries-panel">
            <div class="section-heading reveal">
                <div>
                    <span class="eyebrow">Industries served</span>
                    <h2>Supporting research, education, diagnostics, healthcare and industrial buyers</h2>
                </div>
                <p>We serve diverse scientific and healthcare environments with products selected for reliability, authenticity and practical day-to-day use.</p>
            </div>
            <div class="industries-grid">
                <?php foreach ($data['industries'] as $industry): ?>
                    <article class="industry-card reveal">
                        <h3><?= h($industry['name']) ?></h3>
                        <p><?= h($industry['summary']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Catalogue center</span>
                <h2>Product brochures and reference resources organized for quicker review</h2>
            </div>
            <p>Use the catalogue center to review category-wise resources for chemicals, labware, consumables, life science products and instruments before placing an inquiry.</p>
        </div>
        <div class="container catalogue-grid">
            <?php foreach (array_slice(catalogue_items(), 0, 4) as $catalogue): ?>
                <article class="catalogue-card reveal">
                    <div class="catalogue-card__preview">
                        <div class="preview-sheet"></div>
                        <div class="preview-sheet preview-sheet--offset"></div>
                    </div>
                    <span class="catalogue-card__tag"><?= h($catalogue['category']) ?></span>
                    <h3><?= h($catalogue['title']) ?></h3>
                    <div class="catalogue-card__meta">
                        <span><?= h($catalogue['brand']) ?></span>
                        <span><?= h($catalogue['extension']) ?></span>
                        <span><?= h($catalogue['size']) ?></span>
                    </div>
                    <div class="catalogue-card__actions">
                        <?php if ($catalogue['previewable']): ?>
                            <a class="button button--secondary button--small" href="<?= h($catalogue['url']) ?>" target="_blank" rel="noopener noreferrer">View</a>
                        <?php endif; ?>
                        <a class="button button--ghost button--small" href="<?= h($catalogue['url']) ?>" download><?= icon('download') ?> Download</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container contact-split">
            <div class="contact-panel reveal">
                <span class="eyebrow">Direct access</span>
                <h2>Talk to the scientific procurement team</h2>
                <p>For urgent requirements, recurring supply needs, diagnostics support or product sourcing assistance, connect directly with the <?= h($company['name']) ?> team.</p>
                <div class="contact-list">
                    <?php foreach ($company['phones'] as $phone): ?>
                        <a href="<?= h(phone_href($phone)) ?>"><span><?= icon('phone') ?></span><?= h($phone) ?></a>
                    <?php endforeach; ?>
                    <a href="<?= h(whatsapp_href($company['whatsapp'])) ?>" target="_blank" rel="noreferrer"><span><?= icon('whatsapp') ?></span><?= h($company['whatsapp']) ?></a>
                    <?php foreach ($company['emails'] as $email): ?>
                        <a href="mailto:<?= h($email) ?>"><span><?= icon('mail') ?></span><?= h($email) ?></a>
                    <?php endforeach; ?>
                    <p><span><?= icon('map') ?></span><?= h($company['address']) ?></p>
                </div>
            </div>
            <form class="form-card reveal reveal--delay" data-inquiry-form>
                <input type="hidden" name="form_type" value="Homepage Inquiry">
                <span class="eyebrow">Quick RFQ</span>
                <h3>Request support for products, quotations or customized laboratory solutions</h3>
                <div class="form-row">
                    <label>
                        Name
                        <input type="text" name="name" required>
                    </label>
                    <label>
                        Organization
                        <input type="text" name="organization" required>
                    </label>
                </div>
                <div class="form-row">
                    <label>
                        Email
                        <input type="email" name="email" required>
                    </label>
                    <label>
                        Phone
                        <input type="tel" name="phone" required>
                    </label>
                </div>
                <label>
                    Requirement
                    <textarea name="message" rows="4" placeholder="Tell us the products, brands, pack sizes or delivery city you need." required></textarea>
                </label>
                <button class="button button--primary button--block" type="submit">Submit Inquiry</button>
                <p class="form-status" data-form-status></p>
            </form>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">FAQs</span>
                <h2>Answers to common supply and sourcing questions</h2>
            </div>
            <p>These quick answers reflect the core information from our company profile, support scope and handling commitments.</p>
        </div>
        <div class="container faq-list">
            <?php foreach ($data['faqs'] as $faq): ?>
                <article class="faq-item reveal" data-accordion>
                    <button type="button" data-accordion-trigger>
                        <span><?= h($faq['question']) ?></span>
                        <?= icon('arrow') ?>
                    </button>
                    <div data-accordion-content>
                        <p><?= h($faq['answer']) ?></p>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php render_footer(); ?>
