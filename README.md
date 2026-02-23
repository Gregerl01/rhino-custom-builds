# GSL Starter Theme

A reusable WordPress child theme (Understrap + Bootstrap 5) for service-based business websites. Built by [GSL Design](https://gsldesign.net).

Clone this theme for each new client project. All content uses `[placeholder]` markers ready to be filled with client-specific copy, branding, and photography.

## Quick Start

1. Clone this repo into `wp-content/themes/`
2. Rename the theme folder for your client
3. Update `style.css` metadata (Theme Name, Theme URI, Description, Author URI)
4. Run `npm install` then `npm run build`
5. Activate the theme in WordPress
6. Fill in Customizer fields (Appearance > Customize > Business Information)
7. Replace placeholder content in templates with client copy (see CONTENT.md)
8. Update design tokens in `src/sass/theme/_theme_variables.scss` for client brand

## Requirements

- WordPress 6.x
- PHP 8.1+
- Node.js >= 18, npm >= 8.6.0
- Parent theme: [Understrap](https://understrap.com)

## Build Commands

| Command | Purpose |
|---------|---------|
| `npm run build` | Full compile (CSS + JS) |
| `npm run css` | Compile + prefix + minify SCSS |
| `npm run js` | Bundle + minify JS |
| `npm run watch` | Watch SCSS + JS for changes |
| `npm run watch-bs` | Watch + BrowserSync (update proxy in `src/build/browser-sync.config.js`) |

## Theme Architecture

- **Design tokens:** `src/sass/theme/_theme_variables.scss` (single source of truth)
- **Section styles:** `src/sass/theme/_sections.scss`
- **Section templates:** `template-parts/sections/`
- **Page templates:** `page-templates/`
- **Customizer panels:** `inc/customizer-*.php`
- **Motion system:** See MOTION.md

## Key Files

| File | Purpose |
|------|---------|
| CLAUDE.md | Full project onboarding for Claude Code |
| CONTENT.md | Content blueprint with placeholder markers |
| MOTION.md | Animation and interaction specification |
| `inc/customizer-practice-info.php` | Business info Customizer panel (provider, contact, hours) |
| `inc/seo-metadata.php` | Fallback SEO titles and meta descriptions |

## Customizer Fields

All reusable business data is managed via **Appearance > Customize > Business Information**:

- **Provider:** Name, credentials, specialty, education, bio, photo
- **Contact:** Phone, email, street address, city/state
- **Hours:** Weekday, Saturday, Sunday

Theme mod keys use the `bmg_` prefix by convention. Do not rename them.

## Notes

- Text domain: `bmg-theme` (retained for DB/translation compatibility)
- All `bmg_*` keys, `$bmg-` SCSS variables, and `bmg_theme_*` PHP functions use the `bmg` prefix as a codebase convention — not a client reference
- Compiled output lives in `css/` and `js/` — edit only `src/` files
- Do not modify the parent theme (Understrap) or build configs (`src/build/`)

## License

Proprietary — GSL Design. Not for redistribution.
