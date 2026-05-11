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
                <span class="eyebrow">Premium scientific ecommerce platform</span>
                <h1>India's Trusted Scientific &amp; Laboratory Supply Partner Since 1966</h1>
                <p class="hero__lead">Chemicals, instruments, consumables and laboratory solutions from global brands, reimagined through a modern enterprise procurement experience.</p>
                <div class="hero__actions">
                    <a class="button button--primary" href="/products.php">Explore Products <?= icon('arrow') ?></a>
                    <a class="button button--secondary" href="/contact.php#rfq-form">Request Quotation</a>
                    <a class="button button--ghost" href="/catalogues.php">Download Catalogues</a>
                </div>
                <div class="hero__trust">
                    <div class="trust-pill">
                        <span><?= icon('check') ?></span>
                        <strong>Authorized brand sourcing</strong>
                    </div>
                    <div class="trust-pill">
                        <span><?= icon('spark') ?></span>
                        <strong>Fast RFQ turnaround</strong>
                    </div>
                    <div class="trust-pill">
                        <span><?= icon('map') ?></span>
                        <strong>Pan India delivery</strong>
                    </div>
                </div>
            </div>
            <div class="hero__visual reveal reveal--delay">
                <div class="science-scene">
                    <div class="science-scene__orb science-scene__orb--one"></div>
                    <div class="science-scene__orb science-scene__orb--two"></div>
                    <div class="science-scene__grid"></div>
                    <div class="science-scene__glass science-scene__glass--tall">
                        <span>Advanced lab supply network</span>
                        <strong>10,000+ procurement-ready SKUs</strong>
                    </div>
                    <div class="science-scene__glass science-scene__glass--wide">
                        <span>Enterprise procurement</span>
                        <strong>Quote, compare, source and scale</strong>
                    </div>
                    <div class="science-scene__molecule science-scene__molecule--one"></div>
                    <div class="science-scene__molecule science-scene__molecule--two"></div>
                    <div class="science-scene__panel">
                        <span class="eyebrow">Scientific sourcing dashboard</span>
                        <div class="signal-card">
                            <div>
                                <small>Global brands</small>
                                <strong>Merck, Thermo Fisher, Avantor</strong>
                            </div>
                            <span class="signal-card__status">Live Stock Visibility</span>
                        </div>
                        <div class="signal-columns">
                            <div>
                                <small>Ready stock</small>
                                <strong>2,400+</strong>
                            </div>
                            <div>
                                <small>Pending RFQs</small>
                                <strong>24h response</strong>
                            </div>
                            <div>
                                <small>Logistics</small>
                                <strong>India-wide</strong>
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
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container metrics-grid">
            <?php foreach ($data['metrics'] as $metric): ?>
                <article class="metric-card reveal">
                    <strong data-counter="<?= h((string) $metric['value']) ?>" data-suffix="<?= h($metric['suffix']) ?>">0</strong>
                    <p><?= h($metric['label']) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Featured products</span>
                <h2>Products are now the first thing buyers can properly scan</h2>
            </div>
            <p>Instead of oversized marketing treatment, the home experience now moves faster into practical product visibility with cleaner spacing, RFQ actions and more consistent product presentation.</p>
        </div>
        <div class="container product-grid product-grid--featured">
            <?php foreach (array_slice($data['products'], 0, 8) as $product): ?>
                <article class="product-card reveal" data-product-card data-name="<?= h($product['name']) ?>" data-brand="<?= h($product['brand']) ?>" data-category="<?= h($product['category']) ?>" data-availability="<?= h($product['availability']) ?>">
                    <div class="product-card__visual">
                        <span class="product-badge"><?= h($product['badge']) ?></span>
                        <div class="product-art product-art--<?= h(strtolower(str_replace([' ', '&'], ['-', 'and'], $product['category']))) ?>">
                            <span><?= h($product['brand']) ?></span>
                        </div>
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
                            <button class="button button--primary button--small" type="button" data-add-quote data-product='<?= h(json_encode($product, JSON_UNESCAPED_SLASHES)) ?>'>Add to Quotation</button>
                            <a class="button button--ghost button--small" href="/catalogues.php">Download Brochure</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Category architecture</span>
                <h2>Featured product categories designed for faster discovery</h2>
            </div>
            <p>Category access stays prominent, but no longer overpowers actual products. Buyers can move from broad browsing into card-level product review much faster.</p>
        </div>
        <div class="container category-grid">
            <?php foreach ($data['categories'] as $category): ?>
                <article class="category-card reveal" id="<?= h($category['slug']) ?>">
                    <div class="category-card__icon"><?= icon($category['icon']) ?></div>
                    <span class="category-card__accent"><?= h($category['accent']) ?></span>
                    <h3><?= h($category['name']) ?></h3>
                    <p><?= h($category['summary']) ?></p>
                    <a href="/products.php#products-grid">Quick navigation <?= icon('arrow') ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="section">
        <div class="container brand-strip reveal">
            <div class="section-heading section-heading--compact">
                <div>
                    <span class="eyebrow">Brand ecosystem</span>
                    <h2>Trusted by teams that source from global scientific leaders</h2>
                </div>
            </div>
            <div class="marquee">
                <div class="marquee__track">
                    <?php foreach (array_merge($data['brands'], $data['brands']) as $brand): ?>
                        <span class="brand-chip"><?= h($brand) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Why choose us</span>
                <h2>Industrial trust, elevated through an enterprise-grade customer experience</h2>
            </div>
            <p>The redesign turns legacy credibility into modern conversion power through clearer hierarchy, stronger proof signals and a cleaner path from discovery to inquiry.</p>
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
                    <h2>Scientific supply infrastructure for regulated, research-driven and high-throughput environments</h2>
                </div>
                <p>From universities and biotech labs to process industries and water testing teams, the platform is structured around how real buyers search, validate and procure.</p>
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
                <h2>Digital product resources, reimagined as a modern dashboard</h2>
            </div>
            <p>Searchable catalogue previews, filtered downloads and cleaner visual packaging reduce the friction that usually slows internal product evaluation and approvals.</p>
        </div>
        <div class="container catalogue-grid">
            <?php foreach ($data['catalogues'] as $catalogue): ?>
                <article class="catalogue-card reveal">
                    <div class="catalogue-card__preview">
                        <div class="preview-sheet"></div>
                        <div class="preview-sheet preview-sheet--offset"></div>
                    </div>
                    <span class="catalogue-card__tag"><?= h($catalogue['category']) ?></span>
                    <h3><?= h($catalogue['title']) ?></h3>
                    <div class="catalogue-card__meta">
                        <span><?= h((string) $catalogue['pages']) ?> pages</span>
                        <span><?= h($catalogue['size']) ?></span>
                    </div>
                    <div class="catalogue-card__actions">
                        <a class="button button--secondary button--small" href="/catalogues.php">Preview</a>
                        <a class="button button--ghost button--small" href="/catalogues.php"><?= icon('download') ?> Download</a>
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
                <p>For urgent requirements, bulk sourcing, recurring supply needs or technical product matching, connect directly with the SOMADI LIFESCIENCE team.</p>
                <div class="contact-list">
                    <a href="tel:<?= h(str_replace(' ', '', $company['phone'])) ?>"><span><?= icon('phone') ?></span><?= h($company['phone']) ?></a>
                    <a href="https://wa.me/919810024567" target="_blank" rel="noreferrer"><span><?= icon('whatsapp') ?></span><?= h($company['whatsapp']) ?></a>
                    <a href="mailto:<?= h($company['email']) ?>"><span><?= icon('mail') ?></span><?= h($company['email']) ?></a>
                    <p><span><?= icon('map') ?></span><?= h($company['address']) ?></p>
                </div>
            </div>
            <form class="form-card reveal reveal--delay" data-inquiry-form>
                <input type="hidden" name="form_type" value="Homepage Inquiry">
                <span class="eyebrow">Quick RFQ</span>
                <h3>Start an inquiry in under two minutes</h3>
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
                <h2>Built to reduce procurement friction</h2>
            </div>
            <p>Clear answers, modular content and collapsible sections replace text-heavy pages with cleaner decision support.</p>
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
