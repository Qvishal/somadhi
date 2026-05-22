<?php

declare(strict_types=1);

require __DIR__ . '/includes/site.php';

$page = 'catalogues';
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
                <span>Catalogues</span>
            </div>
            <div class="page-hero__grid">
                <div class="reveal">
                    <span class="eyebrow">Catalogue center</span>
                    <h1>Scientific brochures and category-wise resources organized for faster product review</h1>
                    <p>Explore catalogue resources for chemicals, life science products, labware, HPLC supplies, consumables and instruments in one cleaner resource center.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container catalogue-toolbar reveal">
            <label class="search-field search-field--light">
                <?= icon('search') ?>
                <input type="search" placeholder="Search catalogues by topic or category" data-catalogue-search>
            </label>
            <div class="toolbar-filters">
                <button class="chip chip--active" type="button" data-filter-catalogue="all">All</button>
                <?php foreach (array_unique(array_map(static fn(array $item): string => $item['category'], $data['catalogues'])) as $category): ?>
                    <button class="chip" type="button" data-filter-catalogue="<?= h($category) ?>"><?= h($category) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container catalogue-grid" data-catalogue-grid>
            <?php foreach ($data['catalogues'] as $catalogue): ?>
                <article class="catalogue-card reveal" data-catalogue-card data-category="<?= h($catalogue['category']) ?>" data-title="<?= h($catalogue['title']) ?>">
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
                    <p>Useful for product review, range discovery and internal laboratory procurement planning.</p>
                    <div class="catalogue-card__actions">
                        <button class="button button--secondary button--small" type="button" data-toast-message="Preview experiences can be connected to a document viewer or CMS asset URL.">Preview</button>
                        <button class="button button--ghost button--small" type="button" data-toast-message="Download actions can be wired to real PDF assets in your CMS."><?= icon('download') ?> Download</button>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="empty-state" data-catalogue-empty hidden>
            <h3>No catalogues match the current filters</h3>
            <p>Try another search term or contact the team for a brand-specific brochure package.</p>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container section-heading reveal">
            <div>
                <span class="eyebrow">Resource strategy</span>
                <h2>Built to make scientific product selection more practical and organized</h2>
            </div>
            <p>Catalogue access helps customers understand the broader product range and share relevant resources internally before moving ahead with quotations or discussions.</p>
        </div>
        <div class="container info-grid">
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('search') ?></span>
                <h3>Searchable structure</h3>
                <p>Search by product family or category instead of scanning long lists of static files.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('download') ?></span>
                <h3>Useful downloads</h3>
                <p>Brochures can be shared with internal teams to support product validation and planning.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('spark') ?></span>
                <h3>Organized content blocks</h3>
                <p>Each catalogue group is structured to reflect Somadi’s real supply categories and inquiry flow.</p>
            </article>
        </div>
    </section>
</main>
<?php render_footer(); ?>
