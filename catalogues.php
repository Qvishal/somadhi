<?php

declare(strict_types=1);

require __DIR__ . '/includes/site.php';

$page = 'catalogues';
$data = site_data();
$catalogueItems = catalogue_items();

render_head($page);
render_header();
?>
<main>
    <section class="page-hero page-hero--compact page-hero--detail">
        <div class="container">
            <div class="breadcrumb reveal">
                <a href="/">Home</a>
                <span class="breadcrumb__sep" aria-hidden="true">/</span>
                <span>Catalogues</span>
            </div>
            <div class="page-hero__grid">
                <div class="reveal">
                    <span class="eyebrow">Catalogue center</span>
                    <h1>Scientific brochures and category-wise resources organized for faster product review</h1>
                    <p>Explore catalogue resources organized by category and brand across life science, chemicals, plasticware, glassware, laboratory filtration, liquid handling instruments and instruments.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section--tight">
        <div class="container catalogue-toolbar reveal">
            <label class="search-field search-field--light">
                <?= icon('search') ?>
                <input type="search" placeholder="Search catalogues by category or brand" data-catalogue-search>
            </label>
            <div class="toolbar-filters">
                <button class="chip chip--active" type="button" data-filter-catalogue="all">All</button>
                <?php foreach (array_unique(array_map(static fn(array $item): string => $item['category'], $catalogueItems)) as $category): ?>
                    <button class="chip" type="button" data-filter-catalogue="<?= h($category) ?>"><?= h($category) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container catalogue-grid" data-catalogue-grid>
            <?php foreach ($catalogueItems as $catalogue): ?>
                <article
                    class="catalogue-card reveal"
                    id="catalogue-<?= h($catalogue['slug']) ?>"
                    data-catalogue-card
                    data-category="<?= h($catalogue['category']) ?>"
                    data-title="<?= h($catalogue['title']) ?>"
                    data-search="<?= h($catalogue['search_terms']) ?>">
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
                    <p class="catalogue-card__brands"><?= h($catalogue['brand']) ?></p>
                    <p>Useful for category-wise review, internal sharing and faster procurement coordination.</p>
                    <div class="product-card__actions mt-4">
                        <?php if ($catalogue['previewable']): ?>
                            <a class="button button--secondary button--small" href="<?= h($catalogue['url']) ?>" target="_blank" rel="noopener noreferrer">View</a>
                        <?php endif; ?>
                        <a class="button button--ghost button--small" href="<?= h($catalogue['url']) ?>" download><?= icon('download') ?> Download</a>
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
