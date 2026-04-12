# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Identity

- **Theme:** Rhino Custom Builds Theme
- **Client:** Rhino Custom Builds
- **Type:** WordPress website — truck/off-road services + accessories (V1 uses content arrays, WooCommerce is V2 scope)
- **Compliance:** Standard (no HIPAA/PHI)
- **Base:** Understrap child theme (Bootstrap 5 + SCSS)
- **Parent Theme:** Understrap
- **Build Tool:** Rollup (JS) + Sass CLI + PostCSS + CleanCSS (SCSS)
- **Dev Tool:** Claude Code (CLI in VS Code terminal)
- **Local Dev:** Local by Flywheel — `rhino-custom-builds-websitev2.local`
- **Runtime:** PHP 8.1, MySQL 8.0, Nginx 1.26
- **Node:** >= 18, npm >= 8.6.0
- **Repo:** https://github.com/Gregerl01/rhino-custom-builds.git
- **Testing/CI/Linting:** None configured
- **Text Domain:** `bmg-theme` (do not rename — `bmg_*` prefix retained on all keys/functions by convention)

---

## What This Project Is

Rhino Custom Builds is a one-stop truck, Jeep, SUV, and off-road shop. The site sells:

1. **Services** — Spray-on bedliners, protective coatings, truck accessories & upfitting, off-road & overland builds, fleet services
2. **Custom builds** — Full-build project showcase via a `project` CPT
3. **Parts & gear (V1: content arrays / V2: WooCommerce)** — Bumpers, lighting, lifts, wheels, winches, cargo systems, overland kits, from brands like ARB, Fox, Warn, Rigid, Method, Baja Designs. V1 uses a category-first discovery experience with content arrays (same pattern as the service detail pages). WooCommerce is V2 scope — the V1 content model (category names, brand names, product fields, vehicle type labels) is kept disciplined so migration is clean.

**Primary conversion:** Quote requests + phone calls (general line for consumer, dedicated line for fleet).
**Secondary conversion:** Ecommerce purchases, with in-bay install cross-sell on every product.

**Target audience:**
- Truck owners needing permanent bedliners, coatings, or accessory upfitting
- Off-road and overland enthusiasts building Jeeps, Broncos, Gladiators
- Fleet managers needing consistent upfitting, Net-30 billing, and scheduled install windows

**Design aesthetic:** "Rhino Red meets asphalt" — rugged, premium, industrial.
- Warm white (`#F5F2EE`) backgrounds and deep black (`#1A1A1A`) dark sections
- Red (`#C41E2A`) as the single action color — CTAs and links only
- Amber (`#E8913A`) for phone CTAs and stat badge accents only
- Barlow Condensed uppercase display type, Barlow body, JetBrains Mono for data
- 4% noise overlay on dark sections to kill the flat-digital look
- Square-edged buttons. No gradients. No scale transforms on hover.

---

## Commands

| Command | Purpose |
|---------|---------|
| `npm run build` | Full compile (CSS + JS) |
| `npm run css` | Compile + prefix + minify SCSS |
| `npm run js` | Bundle + minify JS |
| `npm run watch` | Watch SCSS + JS for changes |
| `npm run watch-bs` | Watch + BrowserSync on `rhino-custom-build.local` |

---

## Deployment Pipeline

| Environment | Domain | Branch | Notes |
|-------------|--------|--------|-------|
| Local | `rhino-custom-builds-websitev2.local` | any | Local by Flywheel |
| Staging | TBD | `staging` | Set up once hosting is provisioned |
| Production | TBD (rhinocustombuilds.com) | `main` | Set up once hosting is provisioned |

Staging and production domains are TBD until the hosting provider is chosen and BAA (if applicable) is not required for this project.

---

## Site Map

29 pages total. New CPT: `project` (replaces starter `portfolio`).

| # | Page Name | URL Slug | Template File | Purpose |
|---|-----------|----------|---------------|---------|
| 1 | Homepage | `/` | `front-page.php` | Convert cold traffic → quote or phone via 7-section CRO flow |
| 2 | Services Hub | `/services/` | `page-services-hub.php` (NEW) | Gateway to all 5 service lines with vehicle type filter |
| 3 | Spray-On Bedliners | `/services/spray-on-bedliners/` | `page-service-detail.php` (NEW) | Flagship service conversion — tiers, pricing, before/after, FAQ |
| 4 | Protective Coatings | `/services/protective-coatings/` | `page-service-detail.php` (NEW) | Undercoating, rocker panels, frame protection |
| 5 | Truck Accessories & Upfitting | `/services/truck-accessories/` | `page-service-detail.php` (NEW) | Tonneau, running boards, toolboxes, upfitting — Shop cross-sell |
| 6 | Off-Road & Overland | `/services/off-road-overland/` | `page-service-detail.php` (NEW) | Lifts, bumpers, winches, overland kits — capability selector |
| 7 | Fleet Services | `/services/fleet/` | `page-service-detail.php` (NEW, B2B variant) | Commercial conversion — matrix, case study, Net-30 billing |
| 8 | Gallery | `/gallery/` | `page-gallery.php` (NEW, replaces `page-portfolio.php`) | Filterable project showcase |
| 9 | Single Project | `/gallery/[slug]/` | `single-project.php` (NEW CPT single) | Build detail — images, parts list, vehicle info, cross-sell |
| 10 | Shop | `/shop/` | `archive-product.php` (WC override) | WooCommerce storefront |
| 11 | Product Category | `/shop/category/[slug]/` | `taxonomy-product_cat.php` (WC override) | Category archive |
| 12 | Single Product | `/shop/[product-slug]/` | `single-product.php` (WC override) | Product detail + install cross-sell banner |
| 13 | Cart | `/cart/` | `cart.php` (WC override) | WooCommerce cart, brand-styled |
| 14 | Checkout | `/checkout/` | `checkout.php` (WC override) | WooCommerce checkout, brand-styled |
| 15 | Order Received | `/checkout/order-received/` | `thankyou.php` (WC override) | Post-purchase confirmation + install cross-sell |
| 16 | My Account | `/my-account/` | `myaccount.php` (WC override) | Customer order history, addresses |
| 17 | About | `/about/` | `page-about.php` | Shop origin story, credentials, team |
| 18 | Contact | `/contact/` | `page-contact.php` | Location, map, hours, phone, short form |
| 19 | Request a Quote | `/quote/` | `page-quote.php` (NEW) | Multi-step quote form — primary conversion destination |
| 20 | FAQ | `/faq/` | `page-faq.php` | Full accordion — general business questions |
| 21 | Financing | `/financing/` | `page-financing.php` (NEW, simple) | Payment partner info, how to apply, examples |
| 22 | Warranty | `/warranty/` | `page-warranty.php` (NEW, simple) | Coverage details, claim process |
| 23 | Blog | `/blog/` | `home.php` | Build guides, product education, install spotlights |
| 24 | Single Post | `/blog/[slug]/` | `single.php` | Blog article detail |
| 25 | Blog Category | `/blog/category/[slug]/` | `archive.php` | Blog taxonomy archive |
| 26 | Privacy Policy | `/privacy-policy/` | `page-privacy.php` | Legal |
| 27 | Terms of Use | `/terms-of-use/` | `page-terms.php` | Legal |
| 28 | Search Results | `/?s=[query]` | `search.php` | Site search |
| 29 | 404 | — | `404.php` | Fallback with top services + search |

Simple pages (`page-financing.php`, `page-warranty.php`) use a shared `page-standard.php` layout: page header + content + CTA section.

### Homepage Section Load Order (`front-page.php`)

Standard 7-section CRO sequence — no deviations:

```php
get_template_part('template-parts/sections/section', 'hero');
get_template_part('template-parts/sections/section', 'problem');
get_template_part('template-parts/sections/section', 'founder');
get_template_part('template-parts/sections/section', 'features');
get_template_part('template-parts/sections/section', 'proof');
get_template_part('template-parts/sections/section', 'process');
get_template_part('template-parts/sections/section', 'cta');
```

---

## Navigation

### Header (Desktop)

```
[LOGO]   Services ▾   Shop ▾   Gallery   About   Contact   [🛒 Cart(2)]   [GET A QUOTE →]
```

- **Logo:** Links to `/`. White "RHINO CUSTOM BUILDS" on transparent background over dark hero, dark version on white pages.
- **Services ▾:** Megamenu — 5 service cards + "View All Services →"
- **Shop ▾:** Megamenu — top-level product categories (Bumpers & Armor, Lighting, Suspension & Lifts, Wheels & Tires, Recovery & Winches, Bed & Cargo, Overland Gear) + "Browse Full Shop →"
- **Gallery, About, Contact:** Flat links
- **Cart icon:** Shopping bag SVG + red count badge (hidden when empty). Hover: mini-cart dropdown with line items + Checkout CTA.
- **Get a Quote:** Red primary CTA, always visible → `/quote/`
- **Sticky behavior:** Scroll threshold 120px, dark background at 95% opacity + backdrop-blur

### Mobile (Drawer)

```
[LOGO]                              [🛒 Cart(2)]   [☰]

[MOBILE DRAWER — slide from right, dark background]
├─ Home
├─ Services ▾
│   ├─ Spray-On Bedliners
│   ├─ Protective Coatings
│   ├─ Truck Accessories
│   ├─ Off-Road & Overland
│   ├─ Fleet Services
│   └─ View All Services →
├─ Shop ▾
│   ├─ Bumpers & Armor
│   ├─ Lighting
│   ├─ Suspension & Lifts
│   ├─ Wheels & Tires
│   ├─ Recovery & Winches
│   ├─ Bed & Cargo
│   ├─ Overland Gear
│   └─ Browse Full Shop →
├─ Gallery
├─ About
├─ FAQ
├─ Contact
├─────────────
├─ [RED BUTTON]     Get a Quote →
└─ [AMBER BLOCK]    Call (555) 555-0123
```

- Two-tier expandable accordion (no second screen)
- CTAs pinned to drawer bottom, always visible
- Cart icon lives outside the drawer (fixed top bar) so checkout is always one tap away

### Footer (4-column)

| IDENTITY | SERVICES | COMPANY | HOURS |
|----------|----------|---------|-------|
| [Logo] | Spray-On Bedliners | About | Mon–Fri 7AM – 6PM |
| [Street Address] | Protective Coatings | Gallery | Saturday 8AM – 2PM |
| [City, ST ZIP] | Truck Accessories | Blog | Sunday Closed |
| (555) 555-0123 general | Off-Road & Overland | FAQ | [Map thumbnail →] |
| | Fleet Services | | |
| hello@rhinocustombuilds.com | Custom Builds | Warranty | |
| ★★★★★ 4.9 Google Rating | Shop Parts & Gear | Contact | |
| | | Request a Quote | |

- Dark background (`$brand-dark-lighter`)
- Column headings in JetBrains Mono uppercase
- Links in Barlow 400, hover to red
- Bottom bar: © 2026 Rhino Custom Builds · Privacy Policy · Terms of Use

---

## Custom Post Types

### `project` (replaces starter `portfolio`)

Archive: `/gallery/`. Single: `/gallery/[slug]/`.

**Taxonomies:**
- `project_category` — Bedliner · Coatings · Accessories · Off-Road · Overland · Fleet · Custom Build
- `vehicle_type` — Truck · Jeep · SUV · Van
- `capability_level` — Mild · Moderate · Extreme (off-road filtering)

**Custom fields:** Vehicle year/make/model, services performed, parts list, gallery, related service.

### WooCommerce Product Taxonomies

- `product_cat` — Standard WC taxonomy (see category list below)
- `product_vehicle_type` — Custom taxonomy (Truck / Jeep / SUV / Van / Universal)
- `product_brand` — Custom taxonomy (ARB, Fox, Warn, Rigid Industries, Method Race Wheels, BFGoodrich, Rough Country, Baja Designs, Smittybilt, Rhino-Rack)

---

## Shop / Product Discovery (V1 Strategy)

> **V1 does not use WooCommerce.** The shop section uses content arrays (same pattern as the service detail pages in `inc/service-content.php`). WooCommerce is V2 scope — when the time comes, the V1 content model migrates cleanly because category names, brand names, product fields, and vehicle type labels are kept consistent with the WooCommerce taxonomy conventions.

### V1 Shop Architecture

- **Category-first discovery** at `/shop/` — 9 category tiles on the landing page, each linking to a category page
- **Category pages** show: category description, relevant brand logos, 3–5 featured/example products, "Request a Quote" CTA
- **Content source:** Content arrays in a shop content registry (like `inc/service-content.php` but for shop categories + products)
- **Quote flow:** Gravity Forms powers the existing `/quote/` form. Product interest carries into the form as hidden fields or pre-selected service categories
- **Vehicle selector pills** (Truck / Jeep / SUV / Van) optionally filter which categories are highlighted on the shop landing page
- **Brands** shown as logo strips and trust signals on category pages — not browsable catalog pages in V1
- **No Build List** — that's V2 scope (sessionStorage-based product collection → quote submission)
- **No vehicle fitment filter** — that's V3 scope (Year → Make → Model → Trim cascading selects)

### Top-Level Product Categories (V1 — consistent naming for V2 migration)

1. Bumpers & Armor — Front bumpers, rear bumpers, skid plates, rock sliders, grille guards
2. Lighting — Light bars, pods, fog lights, rock lights, auxiliary headlights
3. Suspension & Lifts — Lift kits, leveling kits, shocks, struts, control arms
4. Wheels & Tires — Off-road wheels, all-terrain tires, mud tires, beadlocks
5. Recovery & Winches — Winches, straps, shackles, recovery boards, D-rings
6. Bed & Cargo — Tonneau covers, bed racks, toolboxes, cargo management, tie-downs
7. Overland Gear — Roof tents, awnings, roof racks, fridges, water storage
8. Interior & Electrical — Switch panels, dash mounts, USB kits, radio mounts
9. Exterior Accessories — Running boards, fender flares, mud flaps, grilles

### V1 Content Discipline (for clean V2 WooCommerce migration)

When building V1 content arrays, use these exact names and conventions so V2 migration to WooCommerce taxonomies is a 1:1 map:

- **Category slugs:** `bumpers-armor`, `lighting`, `suspension-lifts`, `wheels-tires`, `recovery-winches`, `bed-cargo`, `overland-gear`, `interior-electrical`, `exterior-accessories`
- **Brand slugs:** `arb`, `fox`, `warn`, `rigid-industries`, `method-race-wheels`, `bfgoodrich`, `rough-country`, `baja-designs`, `smittybilt`, `rhino-rack`
- **Vehicle types:** `truck`, `jeep`, `suv`, `van`, `universal`
- **Product fields:** `title`, `description`, `short_description`, `price` (starting-at, optional), `sku` (optional), `brand`, `categories` (array), `vehicle_types` (array), `gallery` (array of URLs), `install_available` (boolean)

### Service ↔ Shop Cross-Sell Strategy (V1)

- **Service detail pages:** "Products We Install" section with 3–5 featured products from the relevant category + "Request a Quote" CTAs (V1 renders from content arrays, not WooCommerce queries)
- **Homepage:** 6th service card in features grid = "Shop Parts & Gear" → `/shop/`
- **Shop landing header:** Persistent callout "All products include optional in-bay installation. Ask about installation →"

See `references/rhino-build-spec.md` §4 for the full shop spec including V2/V3 scope.

---

## Customizer Panels

All fields use the `bmg_` prefix. Merge of Document A field map + Document B homepage Customizer keys.

| Panel | Field | Type | Purpose |
|-------|-------|------|---------|
| **Site Identity** | logo | image | Site logo |
| **Site Identity** | tagline | text | Site tagline |
| **Business Information** | `bmg_phone` | text | General phone line — (555) 555-0123 |
| **Business Information** | `bmg_email` | email | `hello@rhinocustombuilds.com` (public-facing display email — NOT for form notifications) |
| **Business Information** | `bmg_address_street` | text | Street address |
| **Business Information** | `bmg_address_city` | text | City, state, ZIP |
| **Business Information** | `bmg_office_hours` | textarea | Mon–Fri 7AM–6PM |
| **Business Information** | `bmg_office_hours_sat` | text | Saturday 8AM–2PM |
| **Business Information** | `bmg_office_hours_sun` | text | Sunday Closed |
| **Business Information** | `bmg_years_in_business` | number | Stats counter — 12 |
| **Business Information** | `bmg_installs_completed` | number | Stats counter — 4,200+ |
| **Business Information** | `bmg_google_rating` | text | Stats badge — 4.9★ |
| **Business Information** | `bmg_bbb_url` | URL | BBB profile link |
| **Hero** | `bmg_hero_overline` | text | Hero label |
| **Hero** | `bmg_hero_headline` | text | Hero H1 |
| **Hero** | `bmg_hero_subline` | textarea | Hero subline |
| **Hero** | `bmg_hero_cta_primary_text` | text | Primary CTA label |
| **Hero** | `bmg_hero_cta_primary_url` | URL | Primary CTA link |
| **Hero** | `bmg_hero_cta_secondary_text` | text | Secondary CTA label |
| **Hero** | `bmg_hero_cta_secondary_url` | URL | Secondary CTA link |
| **Hero** | `bmg_hero_trust_strip_items` | repeater (4 items) | Trust strip content |
| **Hero** | `bmg_hero_background_image` | image | Hero background |
| **Hero** | `bmg_hero_vehicle_selector_enabled` | checkbox | Toggle vehicle selector overlay |
| **Founder / Shop** | `bmg_founder_overline` | text | Section label |
| **Founder / Shop** | `bmg_founder_headline` | text | Section H2 |
| **Founder / Shop** | `bmg_founder_paragraph_1` | textarea | First paragraph |
| **Founder / Shop** | `bmg_founder_paragraph_2` | textarea | Second paragraph |
| **Founder / Shop** | `bmg_founder_badges` | repeater (number + label) | Credential badges |
| **Founder / Shop** | `bmg_founder_features` | repeater (title + body) | Feature bullets |
| **Founder / Shop** | `bmg_founder_image_main` | image | Main shop photo |
| **Founder / Shop** | `bmg_founder_image_collage_1` | image | Collage image 1 |
| **Founder / Shop** | `bmg_founder_image_collage_2` | image | Collage image 2 |
| **Features** | `bmg_features_overline` | text | Section label |
| **Features** | `bmg_features_headline` | text | Section H2 |
| **Features** | `bmg_features_subline` | textarea | Section subline |
| **Features** | `bmg_service_categories` | repeater (image, title, body, url) | 6 homepage service cards |
| **Proof** | `bmg_proof_overline` | text | Section label |
| **Proof** | `bmg_proof_headline` | text | Section H2 |
| **Proof** | `bmg_proof_subline` | textarea | Section subline |
| **Proof** | `bmg_proof_featured_projects` | relationship field | 3 featured projects (from `project` CPT) |
| **Proof** | `bmg_testimonials` | repeater (quote, name, vehicle, service) | Testimonials |
| **Proof** | `bmg_stats` | repeater (number, label) | Stats strip |
| **Proof** | `bmg_brand_logos` | repeater (logo image, name) | Brand marquee |
| **CTA** | `bmg_cta_overline` | text | Section label |
| **CTA** | `bmg_cta_headline` | text | Section H2 |
| **CTA** | `bmg_cta_subline` | textarea | Section subline |
| **CTA** | `bmg_cta_microcopy` | textarea | Risk-removal line |
| **CTA** | `bmg_cta_button_text` | text | Primary CTA label |
| **CTA** | `bmg_cta_button_url` | URL | Primary CTA link |
| **Fleet** | `bmg_fleet_case_study` | group (title, body, outcome, image) | Fleet case study block |
| **Footer** | `bmg_footer_menu_services` | nav menu | Services column menu |
| **Footer** | `bmg_footer_menu_company` | nav menu | Company column menu |

**Gravity Forms (auto-created by `inc/quote-form-setup.php`):**
- Quote form ID stored in `bmg_quote_form_id` theme_mod
- Contact form ID stored in `bmg_gf_contact_form_id` theme_mod
- **All form notifications route to `info@rhinocustombuilds.com`** (internal notification address — separate from the public-facing `hello@rhinocustombuilds.com` displayed on the site)

**Page meta boxes:**
- Service detail page — hero background image, overline, tier table fields, before/after image pairs
- `project` CPT — vehicle year/make/model, services performed, parts list, gallery, related service

---

## Component Inventory

20 custom components specific to Rhino Custom Builds.

| # | Component | CSS Class | Purpose | Location | Behavioral Notes |
|---|-----------|-----------|---------|----------|-----------------|
| 1 | Vehicle Type Selector | `.vehicle-selector` | Filter content by Truck/Jeep/SUV/Fleet | Homepage hero overlay, Services hub, Shop header | **NEW.** Pill group, active state in red. Persists via sessionStorage + querystring. Content crossfades on change. Horizontally scrollable on mobile with snap points. |
| 2 | Service Category Card (XL) | `.service-card-xl` | Large image-led card for service lines | Homepage features grid, Services hub | **NEW.** 4:3 image top, full-bleed. 32px interior padding. JetBrains Mono overline, Barlow Condensed title. Red 3px bottom border sweeps in on hover. Entire card is `<a>`. |
| 3 | Project Card | `.project-card` | Showcase completed builds | Gallery, homepage proof, related projects on service pages | **MODIFIES** starter `.portfolio-card`. 4:5 aspect ratio. Tag pills (JetBrains Mono) overlaid bottom-left. Vehicle metadata below image. Hover: image `scale(1.02)` + red underline sweep on title. |
| 4 | Before/After Slider | `.before-after-slider` | Drag-to-reveal comparison | Bedliner page, Coatings page, single project pages | **NEW.** CSS `clip-path`-based — no canvas. 44×44 drag handle with red glow. Keyboard accessible (arrow keys). "BEFORE"/"AFTER" label pills anchored corners. Touch-optimized, prevents page scroll on drag. |
| 5 | Pricing Table (Starting-At) | `.pricing-table` | Tiered price comparison | Bedliner page, Fleet page | **NEW.** 3-column desktop, collapses to stacked cards on mobile. Recommended column highlighted with red top border. Each cell shows "Starting at $X". "Final pricing..." microcopy below in JetBrains Mono. |
| 6 | Capability Selector | `.capability-selector` | Filter by Mild/Moderate/Extreme | Off-Road page, Gallery filter | **NEW.** 3-pill toggle. Active pill red with white text. Grid below crossfades on change. Filter state in querystring for shareability. |
| 7 | Brand Logo Carousel | `.brand-carousel` | Infinite marquee of partner logos | Homepage proof, service detail pages, footer | **NEW.** CSS `@keyframes` linear animation, 40s loop desktop / 60s mobile. Grayscale 60% default → full color on hover. Track pauses on hover. Duplicated track for seamless wrap. Respects `prefers-reduced-motion`. |
| 8 | Fleet Capabilities Matrix | `.fleet-matrix` | Standard vs. Fleet Program comparison | Fleet services page | **NEW.** 2-column table with checkmarks/dashes. "Fleet Program" column highlighted with subtle red background. Mobile: collapses to card stack with color-coded rows. |
| 9 | Fleet Inquiry Card | `.fleet-inquiry-card` | B2B-specific contact block | Fleet page, contact page sidebar | **NEW.** Dark background, 2-column (pitch + form). Uses dedicated fleet phone. Different styling from consumer form — emphasizes PM, volume pricing, Net-30. |
| 10 | Sticky Mobile Quote Bar | `.sticky-quote-bar` | Persistent bottom CTA on mobile | All service pages, single product pages (mobile only) | **NEW.** Bottom-docked 60px bar. Amber phone icon + red "Get a Quote" button. Scroll-aware (hides on scroll-down). Hides when footer enters viewport (IntersectionObserver). |
| 11 | Multi-Step Quote Form | `.quote-form-multistep` | Guided 3-step quote request | Quote page, embedded in contact drawer | **NEW.** Progress bar fills left-to-right in red. Steps: Vehicle → Service → Contact. localStorage draft save on blur (V1.5). "Resume your quote" banner on return. Mobile: sticky "Next" button at bottom. |
| 12 | Phone CTA Block (Amber) | `.phone-cta` | Dedicated phone conversion block | Every service page, contact, CTA sections | **NEW.** Amber background (`$brand-accent`). JetBrains Mono phone number. Dark text (contrast 8.2:1). `tel:` link on mobile. Hover: background darkens subtly, icon rotates −8deg. |
| 13 | Trust Strip | `.trust-strip` | Inline proof row | Hero sections, CTA sections, sticky header variant | **NEW.** Horizontal row of 4 stat items with `·` separators. JetBrains Mono 10px uppercase, tracking 0.1em. Mobile wraps to 2×2 grid. Counters animate on viewport enter (IntersectionObserver, RAF-based). |
| 14 | Coating Tier Card | `.coating-tier-card` | Tiered service package card | Bedliner page, Coatings page | **NEW.** 3-card grid. Card header with tier name in Barlow Condensed. Feature checklist in Barlow body. "Recommended" badge on premium tier with red accent. "Get a Quote" CTA at card bottom. |
| 15 | Install Cross-Sell Banner | `.install-crosssell` | "Need this installed?" prompt | Single product pages, cart page, product archive header | **NEW.** Warm white background with 4px red left border. Short pitch + secondary CTA "Add Installation to Quote". Pre-populates quote form with product info via querystring (V1.5). |
| 16 | WC Product Card | `.product` (override) | Shop archive product tile | Shop archive, category archives | **MODIFIES** WC default. Matches brand card system: 4:3 image, Barlow Condensed title, JetBrains Mono price, red CTA button. Square edges, 4px radius, bottom red border on hover. |
| 17 | WC Category Card | `.product-cat` (override) | Shop archive category tile | `/shop/` landing | **MODIFIES** WC default. Square aspect image with dark overlay + title in Barlow Condensed uppercase. |
| 18 | Cart Icon Badge | `.cart-icon-badge` | Header cart counter | Site-wide header | **NEW.** Shopping bag SVG + circular red badge (JetBrains Mono 500, 11px) with count. Pulse animation on item add (`$motion-fast`). Hidden when cart is empty. |
| 19 | Vehicle Fitment Filter | `.fitment-filter` | Year/Make/Model/Trim shop filter | Shop header bar | **NEW.** Top-of-shop horizontal filter bar. Cascading selects. Persists via sessionStorage as `rhino_vehicle`. Active pill shows current vehicle + clear button. **V1.5 SCOPE.** |
| 20 | Mini Cart Dropdown | `.mini-cart` (override) | Header cart hover preview | Site-wide header | **MODIFIES** WC default. Dark dropdown panel showing line items + Checkout CTA. Matches header sticky style. |

---

## New Section Templates

All new sections follow existing BEM convention: `.section-[name]__[element]`, `.section-[name]__[element]--[modifier]`, `.section-[name]--[variant]`. No deviations.

### `section-service-hero.php`

Variant of `section-hero.php` scoped for inner-page use. Shorter (70vh, not 100vh). Breadcrumb above overline. **Closest existing:** `section-hero.php`.

```html
<section class="section-service-hero">
  <div class="section-service-hero__background">
    <div class="section-service-hero__overlay"></div>
  </div>
  <div class="container">
    <nav class="section-service-hero__breadcrumb">...</nav>
    <div class="section-service-hero__content row">
      <div class="col-lg-8">
        <span class="section-service-hero__overline">...</span>
        <h1 class="section-service-hero__headline">...</h1>
        <p class="section-service-hero__subline">...</p>
        <div class="section-service-hero__cta-group">...</div>
      </div>
    </div>
    <div class="section-service-hero__trust-strip">...</div>
  </div>
</section>
```

### `section-before-after.php`

Container + slider component. **Closest existing:** none — net new.

```html
<section class="section-before-after">
  <div class="container">
    <header class="section-before-after__header">...</header>
    <div class="section-before-after__slider" data-before-after>
      <img class="section-before-after__image section-before-after__image--before">
      <img class="section-before-after__image section-before-after__image--after">
      <input type="range" class="section-before-after__handle">
      <span class="section-before-after__label section-before-after__label--before">BEFORE</span>
      <span class="section-before-after__label section-before-after__label--after">AFTER</span>
    </div>
  </div>
</section>
```

### `section-pricing-starting.php`

Table variant. **Closest existing:** `section-features.php` comparison grid.

```html
<section class="section-pricing-starting">
  <div class="container">
    <header class="section-pricing-starting__header">...</header>
    <div class="section-pricing-starting__table">
      <table class="section-pricing-starting__grid">...</table>
    </div>
    <p class="section-pricing-starting__microcopy">...</p>
  </div>
</section>
```

### `section-capability-selector.php` (Off-Road page)

```html
<section class="section-capability-selector">
  <div class="container">
    <header>...</header>
    <div class="section-capability-selector__pills" role="tablist">
      <button class="section-capability-selector__pill" data-capability="mild">MILD</button>
      <button class="section-capability-selector__pill" data-capability="moderate">MODERATE</button>
      <button class="section-capability-selector__pill" data-capability="extreme">EXTREME</button>
    </div>
    <div class="section-capability-selector__grid" data-capability-grid>...</div>
  </div>
</section>
```

### `section-fleet-inquiry.php`

```html
<section class="section-fleet-inquiry section-fleet-inquiry--dark">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 section-fleet-inquiry__pitch">...</div>
      <div class="col-lg-6 section-fleet-inquiry__form">[gravity_form]</div>
    </div>
  </div>
</section>
```

### `section-brand-carousel.php`

```html
<section class="section-brand-carousel">
  <div class="section-brand-carousel__marquee">
    <div class="section-brand-carousel__track">
      [logo items × 2 for infinite loop]
    </div>
  </div>
</section>
```

### `section-project-grid.php`

```html
<section class="section-project-grid">
  <div class="container">
    <header>...</header>
    <div class="section-project-grid__filters">[vehicle-type pills]</div>
    <div class="section-project-grid__grid">
      [project cards loop from CPT]
    </div>
    <div class="section-project-grid__cta">...</div>
  </div>
</section>
```

---

## GSL Section Mapping

### Homepage Section Map

| Section | GSL Template Part | Reuse or New | Modifications |
|---------|-------------------|---------------|---------------|
| Hero | `section-hero.php` | Reuse | Swap trust strip content from platform logos → warranty/years/installs/rating. Overlay Vehicle Type Selector pill group. Darker overlay (0.7 vs 0.5). Grunge texture layer. |
| Problem | `section-problem.php` | Reuse | Swap icons to rust/drop-in/warning SVGs. Monospace overline numbering (`01 /`, `02 /`). |
| Founder/Shop | `section-founder.php` | Reuse (re-skin) | Image collage swapped for shop-floor photos. Credential bullets in mono font. Heading treatment unchanged. |
| Features | `section-features.php` | Reuse | 6 cards instead of default count. Service Category Card (XL) variant — full-bleed image header, title over image, description below. Arrow icon bottom-right. |
| Proof | `section-proof.php` | Reuse (expanded) | Add Project Card grid row above testimonials. Add Brand Logo Carousel below stats. |
| Process | `section-process.php` | Reuse | 4 steps instead of default 3. Red connecting line. Integrate `section-faq` accordion below process steps (same section wrapper). |
| CTA | `section-cta.php` | Reuse | Dual-CTA: red primary + amber phone variant. Trust strip echo underneath. |

### Service Detail Page Section Map (e.g., Spray-On Bedliners)

| Section | Template Part | New/Reuse | Notes |
|---------|---------------|-----------|-------|
| Service Hero | `section-service-hero.php` | **NEW** | Variant of `section-hero.php` scoped for inner pages. 70vh. Breadcrumb above overline. |
| Problem | `section-problem.php` | Reuse | Same pattern as homepage |
| Features (Tiers) | `section-features.php` | Reuse | 3-card tier comparison variant |
| Before/After | `section-before-after.php` | **NEW** | Pure component section |
| Process | `section-process.php` | Reuse | 4-step variant |
| Pricing | `section-pricing-starting.php` | **NEW** | Table variant |
| Proof | `section-proof.php` | Reuse | Smaller variant — 3 testimonials + 4 stats |
| FAQ | `section-faq.php` | Reuse | 8 questions |
| CTA | `section-cta.php` | Reuse | Same pattern |

---

## Design Tokens

All token values live in `src/sass/theme/_theme_variables.scss` — that file is the source of truth. The values below are the target.

### Color Tokens

```scss
// Neutrals
$brand-warm-white:    #F5F2EE;   // primary light background
$brand-white:         #FFFFFF;   // secondary light background
$brand-surface:       #E8E4DE;   // subtle surface tone
$brand-dark:          #1A1A1A;   // primary dark background (not #000)
$brand-dark-lighter:  #242424;   // footer / dark surface lift

// Brand accents
$brand-primary:       #C41E2A;   // Rhino Red — CTAs & links only
$brand-accent:        #E8913A;   // Amber — phone CTAs & stat badges only

// Borders
$border-color:        #D1CCC5;
$border-light:        #E8E4DE;

// Text
$text-primary:        #1A1A1A;
$text-secondary:      #5A5651;
$text-on-dark:        #F5F2EE;
```

| Token | Value | Use |
|-------|-------|-----|
| `$brand-warm-white` | `#F5F2EE` | Primary light background |
| `$brand-white` | `#FFFFFF` | Secondary light background (Features, Process) |
| `$brand-surface` | `#E8E4DE` | Subtle surface tone for cards/inputs |
| `$brand-dark` | `#1A1A1A` | Primary dark background |
| `$brand-dark-lighter` | `#242424` | Footer background |
| `$brand-primary` | `#C41E2A` | Rhino Red — CTA + link only |
| `$brand-accent` | `#E8913A` | Amber — phone + stat accents only |
| `$border-color` | `#D1CCC5` | Card and section borders |
| `$border-light` | `#E8E4DE` | Hairlines and subtle dividers |
| `$text-primary` | `#1A1A1A` | Body text on light |
| `$text-secondary` | `#5A5651` | Muted body, metadata |
| `$text-on-dark` | `#F5F2EE` | Body text on dark sections |

### Typography Tokens

```scss
$font-family-base:    'Barlow', sans-serif;
$font-family-display: 'Barlow Condensed', sans-serif;
$font-family-mono:    'JetBrains Mono', monospace;
```

**Google Fonts URL** (for `functions.php` enqueue):

```
https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Barlow:wght@400;500;600&family=JetBrains+Mono:wght@400;500;700&display=swap
```

### Spacing Tokens (base-4 grid)

| Token / Use | Value |
|-------------|-------|
| Overline → headline | 16px |
| Headline → subline | 24px |
| Subline → CTA group | 40px |
| Section inner padding (desktop) | 120px |
| Section inner padding (mobile) | 80px |
| Dark → light section transition | 128px top on the light section |
| Component-to-component gap | 64px desktop / 48px mobile |
| Card grid gap | 24px desktop / 16px mobile |
| Card internal padding | 32px desktop / 24px mobile |

### Layout Tokens

| Token | Value |
|-------|-------|
| Container max | 1200px |
| Content max (text) | 680px |
| Card radius | 4px |
| Image radius | 4px |
| Button radius | 0 (square) |

### Motion Tokens

| Token | Value |
|-------|-------|
| `$motion-fast` | 150ms |
| `$motion-moderate` | 300ms |
| `$motion-slow` | 500ms |
| `$ease-out-expo` | `cubic-bezier(0.16, 1, 0.3, 1)` |

---

## Typography Usage Rules

- **H1 / H2** — Barlow Condensed 700–800, uppercase, tight tracking (0.02em max)
- **H3 / H4** — Barlow 600, sentence case or uppercase depending on context
- **Body** — Barlow 400, 15–16px, line-height 1.6
- **Buttons** — Barlow 600, 14px, uppercase, letter-spacing 0.05em
- **Overlines** — JetBrains Mono 500, 10–11px, uppercase, letter-spacing 0.1em
- **Stats / phone numbers / tags / metadata** — JetBrains Mono 500–700
- **No serifs anywhere**
- **H1 max 6 words**. Longer copy moves to the subline.

---

## AI (Claude Code) Rules

### Before Any Work

1. Read this `CLAUDE.md`
2. Read `CONTENT.md` for the page you're working on
3. State what you understand the task to be
4. Audit before refactoring

### During Work

- Use tokens from `_theme_variables.scss` — never hardcode values
- Prefer Bootstrap 5 utilities over custom CSS
- Override Bootstrap variables, don't fight compiled output
- Keep the section-based template pattern
- Run `npm run build` after changes

### Must Not

- Modify parent theme (Understrap) files
- Modify build configs (`src/build/*`) without explicit approval
- Introduce new design decisions
- Add plugins without discussion
- Rewrite large sections without approval
- Add JS animation libraries (Motion, GSAP, etc.) — use CSS-only
- Add emoji, decorative SVGs, or multi-color illustrated icons

### Rhino-Specific Rules (non-negotiable)

- **No serif fonts anywhere** on the site
- **Red is for CTAs and links only** — never a section background, never a large filled area
- **Amber is for phone CTAs and stat badges only** — never a primary button, never combined with red in the same component
- **All headlines in Barlow Condensed uppercase.** Max 6 words on H1. Longer copy goes in the subline.
- **Button hover:** no scale transforms. Use background darkening + 2px underline sweep (`::after` `scaleX 0 → 1`).
- **Dark section grain texture:** 4% opacity noise **PNG** overlay tiled background, not an SVG filter (performance).
- **Hero photography:** `filter: saturate(0.9) contrast(1.08)` — cinematic, never stock.
- **No gradients on buttons.** Square edges (`border-radius: 0`).
- **Card hover scale ceiling:** 1.02. Anything 1.05+ is AI-slop.
- **Monospace is for data, never body.** JetBrains Mono on stats, phones, overlines, tags, form labels — not paragraphs.
- **One red element per viewport fold** in any dark section. Red leads the eye to the conversion action; if red is decorative, remove it.

---

## Tone of Voice

Full brand voice reference lives in `CONTENT.md`. Quick summary:

**Personality (5):** Rugged · Confident · Expert · No-bullshit · Premium

**Voice style:** Short, active sentences (under 15 words average). Headlines under 6 words. First-person plural ("we build," "we warranty"). Tradesman-to-customer, not marketer-to-consumer. Em dashes for emphasis. Periods, not exclamation points. No ellipses.

**15 power words:** Built · Forged · Bolted · Backed · Guaranteed · Certified · Professional · Tested · Dialed · Rugged · Serious · Real · Outfit · Upgrade · Proven

**Do not use:**
- Superlatives: "premier," "leading," "best-in-class," "world-class," "#1"
- Corporate-speak: "solutions," "synergy," "empower," "unleash," "end-to-end," "turnkey"
- Filler: "awesome," "amazing," "game-changer," "next-level," "you deserve"
- Hedging: "may," "might," "could," "typically," "generally"
- Exclamation points in headlines. Ever.
- Ellipses as stylistic device
- All caps mid-sentence
- Emoji
- "Click here" as link text
- Faux-rugged slang ("let's roll," "buckle up")
- Urgency manipulation ("act now," "limited time")
- Nostalgia pandering ("back when trucks were built right")

**Rule of thumb:** If it sounds like a mall kiosk, a Fiverr tagline, or a monster-truck commercial, cut it. Rhino speaks the way a senior installer explains a build to a repeat customer.

---

## Content & Spec References

- **`CONTENT.md`** — Full production copy for every page, brand voice reference, Customizer variable table. Read this before editing any template.
- **`references/rhino-build-spec.md`** — Detailed interaction specs, design direction, user flows, WooCommerce detail, build priority notes. Read this before implementing any new interaction or component.
- **`src/sass/theme/_theme_variables.scss`** — Source of truth for all design tokens.
