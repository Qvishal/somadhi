<?php

declare(strict_types=1);

require __DIR__ . '/includes/site.php';

$page = 'contact';
$data = site_data();
$company = $data['company'];

render_head($page);
render_header();
?>
<main>
    <section class="page-hero page-hero--compact page-hero--detail">
        <div class="container">
            <div class="breadcrumb reveal">
                <a href="/index.php">Home</a>
                <span class="breadcrumb__sep" aria-hidden="true">/</span>
                <span>Contact</span>
            </div>
            <div class="page-hero__grid">
                <div class="reveal">
                    <span class="eyebrow">Sales, support and RFQ intake</span>
                    <h1>Contact the team behind your next scientific procurement decision</h1>
                    <p>From urgent chemical requirements to multi-brand instrumentation sourcing, the contact experience is rebuilt to feel faster, clearer and more enterprise-grade.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container contact-split contact-split--page">
            <div class="contact-panel reveal">
                <span class="eyebrow">Office details</span>
                <h2>SOMADI LIFESCIENCE</h2>
                <p>Legacy scientific supply expertise, now paired with a cleaner digital procurement workflow for laboratories, institutions and industrial buyers.</p>
                <div class="contact-list contact-list--stacked">
                    <a href="tel:<?= h(str_replace(' ', '', $company['phone'])) ?>"><span><?= icon('phone') ?></span><?= h($company['phone']) ?></a>
                    <a href="https://wa.me/919810024567" target="_blank" rel="noreferrer"><span><?= icon('whatsapp') ?></span><?= h($company['whatsapp']) ?></a>
                    <a href="mailto:<?= h($company['email']) ?>"><span><?= icon('mail') ?></span><?= h($company['email']) ?></a>
                    <p><span><?= icon('map') ?></span><?= h($company['address']) ?></p>
                </div>
                <div class="contact-meta-card">
                    <span class="eyebrow">Compliance</span>
                    <strong>GST</strong>
                    <p><?= h($company['gst']) ?></p>
                </div>
                <div class="map-frame">
                    <iframe src="<?= h($company['map']) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="SOMADI LIFESCIENCE location"></iframe>
                </div>
            </div>

            <form class="form-card reveal reveal--delay" id="rfq-form" data-inquiry-form>
                <input type="hidden" name="form_type" value="Contact RFQ">
                <span class="eyebrow">Modern inquiry form</span>
                <h3>Request pricing, stock confirmation or sourcing support</h3>
                <div class="form-row">
                    <label>
                        Full name
                        <input type="text" name="name" required>
                    </label>
                    <label>
                        Organization
                        <input type="text" name="organization" required>
                    </label>
                </div>
                <div class="form-row">
                    <label>
                        Work email
                        <input type="email" name="email" required>
                    </label>
                    <label>
                        Phone / WhatsApp
                        <input type="tel" name="phone" required>
                    </label>
                </div>
                <div class="form-row">
                    <label>
                        Product category
                        <select name="category">
                            <option value="">Select a category</option>
                            <?php foreach ($data['categories'] as $category): ?>
                                <option value="<?= h($category['name']) ?>"><?= h($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label>
                        Requirement type
                        <select name="requirement_type">
                            <option value="Quotation">Quotation</option>
                            <option value="Bulk Order">Bulk Order</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Catalogue Request">Catalogue Request</option>
                        </select>
                    </label>
                </div>
                <label>
                    Requirement details
                    <textarea name="message" rows="6" placeholder="Share product names, quantities, preferred brands, delivery city and timeline." required></textarea>
                </label>
                <button class="button button--primary button--block" type="submit">Submit Inquiry</button>
                <p class="form-status" data-form-status></p>
            </form>
        </div>
    </section>

    <section class="section section--alt">
        <div class="container info-grid">
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('quote') ?></span>
                <h3>RFQ-ready intake</h3>
                <p>The form structure supports multi-item procurement and cleaner internal follow-up.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('whatsapp') ?></span>
                <h3>WhatsApp escalation path</h3>
                <p>Urgent buyers can move from web inquiry to rapid conversation without losing context.</p>
            </article>
            <article class="info-card reveal">
                <span class="info-card__icon"><?= icon('spark') ?></span>
                <h3>Enterprise trust cues</h3>
                <p>Address, GST and clear communications build confidence for first-time institutional buyers.</p>
            </article>
        </div>
    </section>
</main>
<?php render_footer(); ?>
