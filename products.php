<?php

declare(strict_types=1);

require __DIR__ . '/includes/site.php';

$page = 'products';
$data = site_data();

render_head($page);
render_header();
?>
<main>
    <section class="page-hero page-hero--compact page-hero--detail">
        <div class="container">
            <div class="breadcrumb reveal">
                <a href="/index.php">Home</a>
                <span class="breadcrumb__sep" aria-hidden="true">/</span>
                <span>Products</span>
            </div>
            <div class="page-hero__grid">
                <div class="reveal">
                    <span class="eyebrow">Search-first product discovery</span>
                    <h1>Scientific products organized for faster evaluation and cleaner procurement workflows</h1>
                    <p>Browse enterprise-style product cards with filters, availability signals, compare actions and RFQ-ready details across chemicals, instruments, consumables and more.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container catalogue-toolbar reveal">
            <label class="search-field search-field--light">
                <?= icon('search') ?>
                <input type="search" placeholder="Search product name, category or brand" data-product-search>
            </label>
            <div class="toolbar-filters">
                <button class="chip chip--active" type="button" data-filter-category="all">All Categories</button>
                <?php foreach ($data['categories'] as $category): ?>
                    <button class="chip" type="button" data-filter-category="<?= h($category['name']) ?>"><?= h($category['name']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container products-layout">
            <aside class="filter-panel reveal">
                <div class="filter-panel__section">
                    <span class="eyebrow">Filter products</span>
                    <h3>Category, brand and availability</h3>
                </div>
                <div class="filter-panel__section">
                    <label>
                        Brand
                        <select data-brand-filter>
                            <option value="all">All brands</option>
                            <?php foreach ($data['brands'] as $brand): ?>
                                <option value="<?= h($brand) ?>"><?= h($brand) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
                <div class="filter-panel__section">
                    <span class="filter-label">Availability</span>
                    <button class="chip chip--active" type="button" data-filter-availability="all">All</button>
                    <button class="chip" type="button" data-filter-availability="In Stock">In Stock</button>
                    <button class="chip" type="button" data-filter-availability="Ready Stock">Ready Stock</button>
                    <button class="chip" type="button" data-filter-availability="On Request">On Request</button>
                </div>
                <div class="filter-panel__section">
                    <span class="eyebrow">Conversion tools</span>
                    <ul class="feature-list">
                        <li><?= icon('check') ?> Add multiple products to an RFQ</li>
                        <li><?= icon('check') ?> Compare key specifications quickly</li>
                        <li><?= icon('check') ?> Download brochure-oriented resources</li>
                    </ul>
                </div>
            </aside>

            <div>
                <div class="compare-bar reveal" data-compare-bar hidden>
                    <div>
                        <span class="eyebrow">Product comparison</span>
                        <strong data-compare-count>0 products selected</strong>
                    </div>
                    <div class="compare-bar__actions">
                        <button class="button button--secondary button--small" type="button" data-compare-open>Compare now</button>
                        <button class="link-button" type="button" data-compare-clear>Clear</button>
                    </div>
                </div>

                <div class="product-grid" id="products-grid" data-products-grid>
                    <?php foreach ($data['products'] as $product): ?>
                        <article class="product-card reveal" data-product-card data-name="<?= h($product['name']) ?>" data-brand="<?= h($product['brand']) ?>" data-category="<?= h($product['category']) ?>" data-availability="<?= h($product['availability']) ?>">
                            <div class="product-card__visual">
                                <span class="product-badge"><?= h($product['badge']) ?></span>
                                <div class="product-art product-art--<?= h(strtolower(str_replace([' ', '&'], ['-', 'and'], $product['category']))) ?>">
                                    <span><?= h($product['category']) ?></span>
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
                <div class="empty-state" data-empty-state hidden>
                    <h3>No products match the current filters</h3>
                    <p>Try another category, clear availability filters or use the RFQ form so the team can assist manually.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Procurement support</span>
                <h2>Built for B2B buying, not just browsing</h2>
            </div>
            <p>Every page is optimized to reduce evaluation time, improve trust and move complex requirements toward a structured inquiry rather than a dead-end product list.</p>
        </div>
        <div class="container info-grid">
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('spark') ?></span>
                <h3>Quick technical preview</h3>
                <p>Core specs surface above the fold so buyers can assess fit before requesting details.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('quote') ?></span>
                <h3>Quote list workflow</h3>
                <p>Collect multiple SKUs across brands and submit one cleaner RFQ with notes and quantities.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('download') ?></span>
                <h3>Brochure-led validation</h3>
                <p>Download catalogue resources to support internal approvals, lab comparisons and budget planning.</p>
            </article>
        </div>
    </section>

    <div class="compare-modal" data-compare-modal aria-hidden="true" inert hidden>
        <div class="compare-modal__dialog">
            <div class="compare-modal__header">
                <div>
                    <span class="eyebrow">Specification comparison</span>
                    <h3>Shortlist products side by side</h3>
                </div>
                <button class="icon-button" type="button" data-compare-close><?= icon('close') ?></button>
            </div>
            <div class="compare-table" data-compare-table></div>
        </div>
    </div>
</main>
<?php render_footer(); ?>
