# Agent Documentation - SOMADI LIFESCIENCE

This document serves as a reference for AI agents and developers working on the SOMADI LIFESCIENCE project.

## Project Overview
SOMADI LIFESCIENCE is a premium B2B scientific ecommerce and procurement platform. It connects laboratory managers, researchers, and industrial buyers with global scientific brands (Merck, Thermo Fisher, Borosil, etc.).

## Technology Stack
- **Languages**: PHP (8.0+), JavaScript (ES6+), CSS3
- **Frameworks**: None (Custom built for performance and control)
- **Design Pattern**: Data-driven rendering using a centralized PHP data store.

## Architecture & Directory Structure
- `/` : Root directory containing page entry points.
- `/includes/` : Core logic and data.
    - `site.php` : **CRITICAL FILE**. Contains `site_data()` (all product/company info), rendering helpers, and SEO/Schema logic.
- `/assets/` : Static assets.
    - `css/styles.css` : Main stylesheet. Uses modern CSS (CSS Variables, Flexbox/Grid, Animations).
    - `js/site.js` : Main interactivity (Global Search, RFQ Drawer, Form submission).
- `/storage/` : Placeholder for potential dynamic content or logs (currently minimal).

## Core Concepts

### 1. Data-Driven UI
The site is built around the `site_data()` function in `includes/site.php`. 
- To add a product, category, or brand, update the arrays in this function.
- All pages consume this data via `$data = site_data();`.

### 2. RFQ (Request for Quotation) Workflow
Instead of a standard "Add to Cart", the site uses an RFQ model.
- Users add products to a "shortlist" (handled in `site.js` via `localStorage`).
- The `Quote Drawer` allows users to submit their shortlist as an inquiry.
- Submissions are handled by `submit-inquiry.php`.

### 3. SEO & Schema.org
The project has heavy emphasis on SEO. 
- `render_head($page)` automatically generates meta tags, social cards, and JSON-LD schema based on the current page.
- Schema types supported: `Organization`, `LocalBusiness`, `WebSite`, `WebPage`, `CollectionPage`, `FAQPage`, `Product`, `CreativeWork`.

## Maintenance & Updates
- **Adding Products**: Update the `products` array in `includes/site.php`. Ensure unique slugs.
- **Updating Styles**: Use the CSS variables defined in `:root` inside `assets/css/styles.css` for brand consistency.
- **Form Handling**: Inquiry forms are processed via `fetch` to `submit-inquiry.php`. Ensure the `form_type` hidden input is correctly set for tracking.

## Design Aesthetics
The project follows a "Modern Enterprise" aesthetic:
- **Colors**: Deep greens (`#1f4f3e`), subtle grays, and high-contrast accents.
- **Typography**: Inter/Roboto (clean, industrial).
- **Interactions**: Subtle "reveal" animations on scroll, glassmorphism in the hero section, and smooth drawer transitions.

---
*Last Updated: 2026-05-16*
