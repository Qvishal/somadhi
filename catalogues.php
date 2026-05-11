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
                    <h1>Digital brochures and category resources with a cleaner, dashboard-style experience</h1>
                    <p>Replace dense PDF link lists with searchable catalogue cards, category filters and a more premium product resource center.</p>
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
                    <p>Built for fast technical review, category discovery and internal procurement approvals.</p>
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
                <h2>Designed to support complex B2B evaluation journeys</h2>
            </div>
            <p>Catalogues are treated as part of the conversion experience, not an afterthought. This improves trust, simplifies internal sharing and gives buyers more confidence to move forward.</p>
        </div>
        <div class="container info-grid">
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('search') ?></span>
                <h3>Searchable structure</h3>
                <p>Users can search by product family, resource type or category rather than scanning long legacy lists.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('download') ?></span>
                <h3>Conversion-aware downloads</h3>
                <p>Catalogue interactions can connect to analytics, lead capture and asset management workflows.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('spark') ?></span>
                <h3>CMS-ready content blocks</h3>
                <p>Each card is ready to be sourced from a headless CMS when backend integration is added.</p>
            </article>
        </div>
    </section>
</main>
<?php render_footer(); ?>
