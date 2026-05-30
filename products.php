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
                <a href="/">Home</a>
                <span class="breadcrumb__sep" aria-hidden="true">/</span>
                <span>Products</span>
            </div>
            <div class="page-hero__grid">
                <div class="reveal">
                    <span class="eyebrow">Product range</span>
                    <h1>Laboratory products, research chemicals and scientific equipment organized for easier sourcing</h1>
                    <p>Browse representative products across our wider supply range, including chemicals, labware, HPLC supplies, consumables, instruments and healthcare-oriented categories.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container catalogue-toolbar catalogue-toolbar--products reveal">
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
                        <li><?= icon('check') ?> Add multiple products to one inquiry</li>
                        <li><?= icon('check') ?> Compare key specifications quickly</li>
                        <li><?= icon('check') ?> Request category-wise catalogue support</li>
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
                        <article class="product-card reveal" id="product-<?= h($product['slug']) ?>" data-product-card data-name="<?= h($product['name']) ?>" data-brand="<?= h($product['brand']) ?>" data-category="<?= h($product['category']) ?>" data-availability="<?= h($product['availability']) ?>">
                            <div class="product-card__visual">
                                <span class="product-badge"><?= h($product['badge']) ?></span>
                                <?php if (!empty($product['image'])): ?>
                                    <div class="product-art product-art--image">
                                        <?= picture(h($product['image']), h($product['name']), 'product-card__image', 'width="400" height="300" loading="lazy"') ?>
                                    </div>
                                <?php else: ?>
                                    <div class="product-art product-art--<?= h(strtolower(str_replace([' ', '&'], ['-', 'and'], $product['category']))) ?>">
                                        <span><?= h($product['category']) ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-card__copy">
                                <div class="product-card__meta">
                                    <span><?= h($product['category']) ?></span>
                                    <?php if (strcasecmp($product['brand'], $product['category']) !== 0): ?>
                                        <strong><?= h($product['brand']) ?></strong>
                                    <?php endif; ?>
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
                <h2>Structured to support practical laboratory and institutional buying</h2>
            </div>
            <p>From product browsing to quotation requests, the page is designed to help customers move from requirement identification to clear communication with the Somadi team.</p>
        </div>
        <div class="container info-grid">
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('spark') ?></span>
                <h3>Quick technical preview</h3>
                <p>Core specifications are visible early so laboratories can assess fit before reaching out.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('quote') ?></span>
                <h3>Multi-product inquiry flow</h3>
                <p>Collect multiple SKUs across categories and submit one cleaner RFQ with notes and quantities.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('download') ?></span>
                <h3>Catalogue-backed decisions</h3>
                <p>Use downloadable resources to support internal approvals, comparisons and requirement planning.</p>
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
