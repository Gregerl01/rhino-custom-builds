# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Identity

- **Client:** Baig Medical Group (BMG)
- **Type:** Production WordPress + WooCommerce website
- **Compliance:** HIPAA required (PHI handling)
- **Theme:** Understrap child theme (Bootstrap 5 + SCSS)
- **Parent Theme:** Understrap
- **Build Tool:** Rollup (JS) + Sass CLI + PostCSS + CleanCSS (SCSS)
- **Dev Tool:** Claude Code (CLI in VS Code terminal)
- **Local Dev:** Local by Flywheel — `baig-medical-group.local`
- **Runtime:** PHP 8.1, MySQL 8.0, Nginx 1.26
- **Node:** >= 18, npm >= 8.6.0
- **Testing/CI/Linting:** None configured
- **Target Launch:** April 1, 2026

---

## What This Project Is

A HIPAA-compliant concierge medical practice website where patients can:
1. Browse three tiered service plans (Essential / Premium / Concierge Elite)
2. Enroll online via secure form with HIPAA consent
3. Pay via Authorize.net (one-time and recurring subscriptions)
4. Manage their account through a client portal (WooCommerce My Account)
5. Receive automated onboarding communications

The brand position is premium, restrained luxury — "Black Card" aesthetic.
Dark accent sections, silver highlights, generous whitespace, zero flashiness.
Light-mode primary (off-white backgrounds) with dark hero/feature sections.

---

## Current Theme Architecture

### Parent: Understrap
Provides: Bootstrap 5 grid, nav walkers, WooCommerce base templates,
accessibility patterns, responsive foundation. **Do not modify parent files.**

### Child Theme Location
```
wp-content/themes/starter-theme/
```

### Build Pipeline (Keep As-Is)
| Tool | Purpose | Config Location |
|------|---------|-----------------|
| Sass CLI | SCSS → CSS compilation | npm script, loads from parent |
| PostCSS + Autoprefixer | Vendor prefixes | src/build/postcss.config.js |
| CleanCSS | CSS minification | npm script |
| Rollup | JS bundling | src/build/rollup.config.js |
| Terser | JS minification | src/build/terser.config.json |
| BrowserSync | Live reload | src/build/browser-sync.config.js |
| Nodemon | File watching | npm script |

### Commands
| Command | Purpose |
|---------|---------|
| `npm run build` | Full compile (CSS + JS) |
| `npm run css` | Compile + prefix + minify SCSS |
| `npm run js` | Bundle + minify JS |
| `npm run watch` | Watch SCSS + JS for changes |
| `npm run watch-bs` | Watch + BrowserSync on baig-medical-group.local |

### SCSS Load Path
SCSS resolves imports via parent theme:
```
--load-path=../understrap/src/sass
--load-path=../understrap/node_modules
```
This means `@import "assets/bootstrap5/bootstrap"` resolves from the parent.

---

## File Structure

```
starter-theme/
├── style.css                          # WP theme header (metadata only)
├── functions.php                      # Enqueues, WooCommerce setup, includes
├── front-page.php                     # Homepage (7 section templates)
├── footer.php                         # Custom footer (3-col, bmg_* variables)
├── 404.php                            # Page Not Found
├── package.json                       # NPM scripts + dependencies
│
├── src/
│   ├── build/                         # Build tool configs (DO NOT CHANGE)
│   │   ├── babel.config.js
│   │   ├── banner.js
│   │   ├── browser-sync.config.js
│   │   ├── postcss.config.js
│   │   ├── rollup.config.js
│   │   └── terser.config.json
│   ├── js/
│   │   └── theme.js                   # Source JS
│   └── sass/
│       ├── theme.scss                 # Main SCSS entry point
│       └── theme/
│           ├── _theme_variables.scss  # BMG design tokens (source of truth)
│           ├── _sections.scss         # Section component styles
│           ├── _woocommerce.scss      # WooCommerce styling
│           ├── _dark-mode.scss        # Dark mode system (active)
│           └── _theme.scss            # Custom styles
│
├── css/                               # Compiled output
│   ├── theme.css
│   ├── theme.min.css
│   └── (source maps)
│
├── js/                                # Compiled output
│   ├── theme.js
│   ├── theme.min.js
│   └── (source maps)
│
├── inc/
│   ├── custom-post-types.php          # CPT: "service" (homepage icons)
│   ├── customizer-site-identity.php   # Logo max-width control
│   ├── customizer-practice-info.php   # Practice Information panel (physician, contact, hours)
│   ├── customizer-hero.php            # Hero headline, subtitle, background
│   ├── customizer-about.php           # Philosophy + physician profile
│   ├── customizer-footer.php          # Footer menus + walker
│   ├── dark-mode.php                  # Dark mode FOUC prevention + toggle
│   └── seo-metadata.php              # SEO title tags + meta descriptions
│
├── global-templates/
│   ├── navbar-collapse-bootstrap5.php # Bootstrap 5 navbar
│   └── dark-mode-toggle.php           # Dark mode UI toggle
│
├── page-templates/
│   ├── page-about.php                 # About page (philosophy + physician bio)
│   ├── page-plans.php                 # Plans comparison page
│   ├── page-services.php              # Services page (5 service blocks)
│   ├── page-enroll.php                # Enrollment form page
│   ├── page-faq.php                   # FAQ page (10 questions)
│   ├── page-contact.php               # Contact page
│   └── page-privacy.php               # Privacy policy + HIPAA notice
│
└── template-parts/
    └── sections/
        ├── section-hero.php           # Full-viewport hero with animated headline
        ├── section-explainer.php      # What Is Concierge Medicine
        ├── section-pillars.php        # 4-column value pillars
        ├── section-plans-overview.php # Three-tier plan cards (Essential/Premium/Concierge Elite)
        ├── section-plans-comparison.php # Detailed plan comparison table
        ├── section-philosophy.php     # About page — philosophy of care
        ├── section-physician.php      # Full physician bio + credentials sidebar
        ├── section-physician-preview.php # Homepage physician intro
        ├── section-services.php       # Services page — 5 alternating service blocks
        ├── section-faq.php            # Full FAQ accordion (10 questions)
        ├── section-faq-preview.php    # Homepage FAQ preview (4 questions)
        ├── section-enroll-form.php    # Enrollment form (Gravity Forms or placeholder)
        ├── section-contact-info.php   # Contact details + hours + map
        ├── section-contact-form.php   # Contact form (Gravity Forms or placeholder)
        └── section-cta.php            # Consultation prompt CTA
```

### Homepage Section Load Order (front-page.php)
1. Hero — full viewport, animated headline
2. Explainer — what is concierge medicine
3. Pillars — 4-column benefits
4. Plans Overview — three-tier cards
5. Physician Preview — doctor introduction
6. FAQ Preview — common questions accordion
7. CTA — consultation prompt

---

## Architecture Rules (Non-Negotiable)

### Three Principles
1. **Systems over pages** — Visual decisions centralized in tokens
2. **Tokens over values** — No hardcoded colors, spacing, or typography
3. **Reuse over reinvention** — Components enforce rules, pages assemble

### Layered Architecture

**Layer 1: Design System** — `_theme_variables.scss`
All design tokens. Single source of truth.

**Layer 2: Components** — `_sections.scss` + individual section files
Token-based styles. No hardcoded values.

**Layer 3: Templates** — `template-parts/sections/*.php`
Assembly only. Use Bootstrap grid + utilities. No new styles.

### Styling Rules

**Allowed:**
- SCSS variables from `_theme_variables.scss`
- Bootstrap utilities
- Token-based component styles

**Forbidden:**
- Hex colors outside `_theme_variables.scss`
- One-off spacing values
- Inline styles
- Page-specific CSS
- Recreating Bootstrap features

---

## BMG Brand Design Tokens

All token values are defined in `src/sass/theme/_theme_variables.scss` — that file is the source of truth. Below are the key principles for reference; always check the SCSS file for exact values.

### Color Principles
- **70%** Dark tones (Obsidian `#0A0A0A`, Charcoal `#1C1C1C`)
- **20%** Neutrals (Platinum, Warm Gray, White)
- **10%** Silver accents (`#A8A9AD` — use sparingly)
- **Never** bright or saturated accent colors
- Error state uses muted rust (`#8B4049`), not bright red

### Typography
- **Display:** Cormorant Garamond (serif) — headlines, display text
- **Body:** Montserrat (sans-serif) — body text, UI
- Loaded via Google Fonts in `functions.php`

### Spacing
- 8px base grid: 8, 16, 24, 32, 48, 64, 96, 128, 160px
- Section padding: 128px desktop / 80px mobile
- Component gap: 32px

### Layout
- Container max: 1200px
- Content max (text): 680px
- Button border-radius: 0 (square edges)

---

## Site Map

| Page | Template | Slug | Purpose |
|------|----------|------|---------|
| Homepage | `front-page.php` | `/` | Hero, explainer, pillars, plans, physician, FAQ, CTA |
| About | `page-templates/page-about.php` | `/about/` | Philosophy, physician bio + credentials |
| Our Plans | `page-templates/page-plans.php` | `/our-plans/` | Feature comparison table (Essential/Premium/Concierge Elite) |
| Services | `page-templates/page-services.php` | `/services/` | 5 service blocks with alternating sections |
| Enroll | `page-templates/page-enroll.php` | `/enroll/` | Enrollment form + HIPAA consent |
| FAQ | `page-templates/page-faq.php` | `/faq/` | 10 questions, flat accordion |
| Contact | `page-templates/page-contact.php` | `/contact/` | Form, phone, address, map, hours |
| Privacy Policy | `page-templates/page-privacy.php` | `/privacy-policy/` | HIPAA Notice + website privacy |
| 404 | `404.php` | — | Page Not Found |
| My Account | WooCommerce override | `/my-account/` | Client portal |

### Navigation
- **Header (flat):** About, Our Plans, Services, Contact
- **My Account link:** Appears when logged in
- **Footer (3-col):** Practice identity (logo, address, phone, email) | Navigation (About, Our Plans, Services, Enroll, FAQ, Contact, Privacy Policy) | Office Hours

---

## WooCommerce Requirements

### Planned Plugin Stack
These plugins are required for production but **not all are installed yet**. Plugins currently installed in local dev are marked.

| Plugin | Purpose | Status |
|--------|---------|--------|
| WooCommerce | Products, cart, checkout | Planned |
| WooCommerce Subscriptions | Recurring billing | Planned |
| Authorize.net Gateway | PCI-compliant payments | Planned |
| Gravity Forms | Enrollment form | Planned |
| GF Google Sheets Add-On | Sync (non-PHI only) | Planned |
| Wordfence | Security | Planned |
| WP Activity Log | Audit trail (HIPAA) | Planned |

### Currently Installed Plugins (Local Dev)
| Plugin | Purpose |
|--------|---------|
| WPForms Lite | Form builder |
| Rank Math SEO | SEO management |
| WP Mail SMTP | Email routing |
| Query Monitor | Debugging |
| Classic Editor / Classic Widgets | Legacy editor support |
| All-in-One WP Migration | Backup/restore |

### Service Plans (WooCommerce Subscription Products)
| | Essential | Premium | Concierge Elite |
|---|-----------|---------|-----------------|
| Monthly | TBD | TBD | TBD |
| Annual | TBD (discount) | TBD (discount) | TBD (discount) |
| 24/7 Access | No | Extended hours | Yes |
| Specialist Referrals | Standard | Priority | VIP / Expedited |
| Wellness Programs | Basic | Enhanced | Full Suite |

---

## HIPAA Requirements (Critical)

- Hosting BAA signed before collecting any patient data
- HTTPS enforced sitewide (TLS 1.2+)
- Database encrypted at rest
- Never email PHI in plain text
- Google Sheets: non-PHI fields only
- 2FA for all admin accounts
- WP Activity Log for access tracking
- Every plugin touching PHI vetted
- Data retention policy documented

---

## AI (Claude Code) Rules

### Before Any Work
1. Read this CLAUDE.md
2. State what you understand the task to be
3. Audit before refactoring

### During Work
- Use tokens from `_theme_variables.scss` — never hardcode values
- Prefer Bootstrap utilities over custom CSS
- Override Bootstrap variables, not compiled output
- Keep section-based template pattern
- Test `npm run build` after changes

### Must Not
- Modify parent theme (Understrap) files
- Modify build configs (src/build/*) without explicit approval
- Introduce new design decisions
- Add plugins without discussion
- Touch HIPAA config without explicit approval
- Rewrite large sections without approval

## Content Reference
All approved website copy and dynamic variable definitions live in CONTENT.md in the theme root.
- **Before editing any template file**, read CONTENT.md first
- Use it as the source of truth for all text content, `get_theme_mod()` keys, fallback strings, and implementation order
- Do not write placeholder copy — if content exists in CONTENT.md, use it exactly
- All CONTENT.md sections (1–12) have been implemented in templates
- Dynamic variables are centralized in `inc/customizer-practice-info.php` (Customizer → Practice Information panel)
- SEO metadata is handled by `inc/seo-metadata.php` (yields to Rank Math when active)

---

## Tone of Voice (Generated Content)

- **Calm:** Composed, never anxious
- **Confident:** Authoritative, no hedging
- **Professional:** Warm precision
- **Clear:** Accessible, no jargon
- **Restrained:** No superlatives, no urgency, no "best/leading/premier"

---

## Customizer Dynamic Variables

All reusable practice data is managed via Customizer → Practice Information (`inc/customizer-practice-info.php`):

**Physician:** `bmg_physician_name`, `bmg_physician_last_name`, `bmg_physician_credentials`, `bmg_physician_specialty`, `bmg_physician_years`, `bmg_physician_med_school`, `bmg_physician_residency`, `bmg_physician_fellowship`, `bmg_physician_board_cert`, `bmg_physician_memberships`, `bmg_physician_photo_portrait`, `bmg_physician_photo_full`, `bmg_physician_bio_short`, `bmg_physician_bio_full`

**Contact:** `bmg_phone`, `bmg_email`, `bmg_address_street`, `bmg_address_city`, `bmg_privacy_effective_date`

**Hours:** `bmg_office_hours`, `bmg_office_hours_sat`, `bmg_office_hours_sun`

The footer uses these `bmg_*` keys directly (not the legacy `footer_*` keys from `customizer-footer.php`).

---

## Open Items (Need Client Input)

> Review this list periodically — remove items as they are resolved.

1. Plan pricing (Essential/Premium/Concierge Elite monthly + annual)
2. Physician medical school and residency (currently using placeholder defaults)
3. Practice street address + ZIP code
4. Photography (physician portrait, office photos)
5. Logo files (SVG, PNG)
6. Hosting provider (must sign BAA)
7. Authorize.net credentials
8. Google Workspace BAA status
9. Domain name
10. Gravity Forms license (enrollment + contact forms currently use placeholder HTML)
11. Analytics provider (privacy policy references TBD)
