# Rhino Custom Builds — Build Specification

Detailed build spec for Rhino Custom Builds. This file complements `CLAUDE.md` and `CONTENT.md`. Read `CLAUDE.md` first for architecture and rules, then this file for interaction, design, and WooCommerce detail.

---

## 1. User Flows

### Flow 1 — Truck Owner Looking for a Bedliner Quote

**Persona:** Mike, 42, owns a 2022 F-150, wants a permanent bedliner before winter. Mobile-first, moderate research mode.

```
ENTRY: Google search "spray on bedliner [city]"
  ↓
LANDING: Homepage (/)
  · Hero: dark section, "BUILT FOR WHERE THE ROAD ENDS." headline
  · Trust strip: LIFETIME WARRANTY · 35+ YEARS · 4,200+ INSTALLS · 4.9★ GOOGLE
  · Dual CTA: "Get a Quote" (red) + "Explore Services" (ghost)
  · Vehicle selector pills visible — does not tap, keeps scrolling
  ↓
SCROLLS: Problem section
  · "CHEAP UPGRADES DON'T SURVIVE REAL WORK"
  · "Bed liners trap moisture" block lands — remembers his last drop-in rusted
  ↓
SCROLLS: Features grid
  · Spots "Spray-On Bedliners" as first card, taps
  ↓
LANDS: /services/spray-on-bedliners/
  · Service Hero: "BONDED. PERMANENT. BACKED FOR LIFE."
  · Trust strip: LIFETIME WARRANTY · CERTIFIED INSTALLERS · 1-DAY TURNAROUND
  · Sticky mobile quote bar appears after scrolling past 400px
  ↓
SCROLLS: Problem → Coating Tiers → Before/After Slider
  · Drags the slider on a Ford project, sees the bond depth
  · Scrolls 3-tier comparison, notes "Premium" fits his use case
  ↓
SCROLLS: Process (4 steps) → Pricing Table
  · Sees starting price for 6.5' bed Premium tier
  · Price in range — confidence moment
  ↓
SCROLLS: Proof (3 testimonials + stats) → FAQ
  · Reads 2–3 FAQs (turnaround, warranty, cure time)
  ↓
CONVERSION TRIGGER: Taps "Get a Quote" in sticky mobile bar
  ↓
LANDS: /quote/
  · Step 1: Year, Make, Model (pre-fills Truck category)
  · Step 2: Taps "Spray-On Bedliners" → selects "Premium Tier"
  · Step 3: Phone, email, preferred contact
  · Submits
  ↓
CONVERSION: Quote request submitted
  · "What happens next" 3-step explainer
  · Amber phone CTA fallback: "Or call (555) 555-0123"
```

**CTAs encountered (in order):** Hero primary → Features card → Service hero primary → Sticky mobile bar phone/quote → FAQ accordion → Sticky mobile bar quote → Multi-step form submit.

**Trust signals encountered:** Hero trust strip → 3 loss-aversion blocks → Before/after proof → Pricing transparency → 3 testimonials → Warranty badge → FAQ reassurance → "What happens next" explainer → Phone fallback.

---

### Flow 2 — Off-Road Enthusiast Browsing and Buying Accessories

**Persona:** Jen, 34, runs a 2023 Jeep Gladiator, planning an overland trip. Desktop, high research, compares brands.

```
ENTRY: Instagram ad → /services/off-road-overland/
  ↓
LANDS: Off-Road & Overland page
  · Hero: "BUILT FOR WHERE THE ROAD ENDS." + dual CTA
  · Capability Selector pills: MILD / MODERATE / EXTREME
  · Taps "MODERATE" — content grid crossfades
  ↓
SCROLLS: Features grid (Lifts, Bumpers, Winches, Lighting, Armor, Recovery, Wheels & Tires, Overland Kit)
  · Taps "Bumpers" — lands in Shop category
  ↓
LANDS: /shop/category/bumpers-armor/
  · Vehicle Fitment Filter at top — enters 2023 Jeep Gladiator
  · Grid filters to Gladiator-compatible products
  · Pill: "Showing products that fit: 2023 Jeep Gladiator"
  · Branded WC cards (ARB, Rough Country, Smittybilt)
  ↓
BROWSES: Filters by brand (ARB), sorts by price
  · Clicks ARB Deluxe Front Bumper
  ↓
LANDS: /shop/arb-deluxe-front-bumper/
  · Product gallery, specs, fitment confirmation, price, Add to Cart
  · BELOW CART: Install Cross-Sell Banner
    "Need this installed? Our certified builders can install in-bay with warranty coverage."
    [Add Installation to Quote →]
  ↓
DECISION POINT:

PATH A — BUY PARTS ONLINE
  · Add to Cart → header badge updates
  · Mini-cart shows product
  · Continues browsing — adds Warn winch, Rigid light pods (cart: 3)
  · Cart icon → /cart/ → Checkout → Order placed
  · Post-purchase install cross-sell email + thank-you CTA

PATH B — REQUEST INSTALLATION QUOTE
  · "Add Installation to Quote →" on product page
  · /quote/ pre-filled: Vehicle (from session), Service, Product
  · Adds more services in Step 2 (winch, lighting)
  · Submits → Quote request for parts + labor
```

**Product discovery paths:**
1. Service page → Shop category (top-down)
2. Vehicle fitment filter narrows to her Gladiator
3. Brand filter for known-quality products
4. Capability selector on service page influences shop expectations
5. "Products we install" cross-sell on service page → product cards directly

**Install cross-sell placements:**
- Single product page (primary) — below price/Add to Cart
- Shop archive header bar (secondary)
- Cart page (tertiary) — below line items, before checkout
- Post-purchase thank-you page (retention)

**CTAs encountered:** Service hero primary → Capability selector → Feature grid card → Shop category card → Vehicle fitment filter → Product card → Add to Cart OR Add Installation to Quote → Cart icon → Checkout OR quote form.

**Trust signals encountered:** Brand logo marquee → Project gallery (real Jeep builds) → Certified installer badges → Brand partner logos on product pages → Warranty coverage callouts → Fitment guarantee.

---

### Flow 3 — Fleet Manager Evaluating Services

**Persona:** Carlos, 52, manages 14 service trucks for a regional contractor. Desktop, high intent, decision-maker.

```
ENTRY: Google search "fleet truck upfitter [region]" OR trade network referral
  ↓
LANDS: /services/fleet/
  · Hero: "BUILT FOR THE JOB. BACKED BY WARRANTY."
  · Dual CTA: "Request Fleet Quote" (red) + "Call Us" (ghost)
  · Trust strip: 1,800+ TRUCKS SERVICED · 47 ACTIVE FLEET ACCOUNTS · NET 30 BILLING · INSURED & BONDED
  ↓
SCROLLS: Problem section
  · "DOWNTIME IS THE REAL COST" — reads all 3 pain blocks
  · "Inconsistent Quality" resonates
  ↓
SCROLLS: Capabilities Matrix
  · Standard vs. Fleet Program columns
  · Volume Pricing ✓, Dedicated PM ✓, Scheduled Windows ✓, Net-30 ✓
  ↓
SCROLLS: Services Offered
  · Confirms: bedliners, undercoating, upfitting, scheduled maintenance
  ↓
SCROLLS: Case Study — "14 TRUCKS. ONE ROTATION. ZERO SURPRISES."
  · Similar fleet size — strong proof
  ↓
SCROLLS: Stats strip
  · 1,800+ trucks · 24 HRS turnaround · 47 accounts · NET 30
  ↓
SCROLLS: Fleet Inquiry Card
  · 2-column: pitch on left, form on right
  · Fills out: company, fleet size, services, contact
  · OR calls the main number
  ↓
SCROLLS: FAQ (6 B2B questions)
  · Checks: insurance, terms, scheduling, COI requirements
  ↓
CONVERSION: Submits fleet inquiry form OR calls directly
```

**What he needs to see before converting:**
1. Capabilities matrix with explicit B2B terms (Net-30, PM, scheduling)
3. Insurance/bonding mention (COI requirements)
4. Case study with a similar fleet size
5. Stats proving scale (trucks serviced, active accounts)
6. Dedicated fleet form (not the consumer quote form)

**CTAs encountered:** Hero "Request Fleet Quote" + "Call Us" → Capabilities matrix (implicit) → Case study → Fleet inquiry form OR phone call.

**Trust signals encountered:** Fleet-specific trust strip → Problem acknowledgment → Capabilities matrix → Case study with measurable outcomes → Stats strip → Insurance/bonding callout → B2B-specific FAQ.

---

## 2. Interaction Priorities

The GSL starter already handles: scroll reveal, sticky header, parallax hero, hover states, accordion, contact drawer, stats counter, back-to-top. Do not redefine these. The following are additions scoped to this brand.

### 2.1 New Interactions (10)

#### 1. Vehicle Type Selector (Hero overlay + Services hub)
- **Trigger:** Tap/click a vehicle pill (Trucks / Jeeps / SUVs / Fleet)
- **User sees:** Active pill fills with `$brand-primary`, others dim to 60% opacity. Below-fold content filters to vehicle-relevant projects/services. Persists via sessionStorage + `?vehicle=truck` querystring.
- **Motion:** Pill fill `$motion-fast` (150ms) with `$ease-out-expo`. Content swap crossfade `$motion-moderate` (300ms) with opacity + 8px translateY.
- **Mobile:** Pills scroll horizontally with snap points. Tap feedback uses fill, no scale.
- **Performance:** DOM-based filter (show/hide via `hidden` attribute), not re-fetch.

#### 2. Before/After Slider
- **Trigger:** Drag handle, click anywhere on image, or keyboard arrow keys
- **User sees:** Vertical divider with circular red handle, "BEFORE" pill top-left, "AFTER" pill top-right. Divider moves with cursor/touch. Handle has subtle red glow on hover.
- **Motion:** No easing on drag (1:1 tracking). On release/keyboard, `$motion-fast` tween to snapped value.
- **Mobile:** Full touch support, 44×44 handle, prevents page scroll during drag.
- **Performance:** CSS `clip-path: inset(0 X% 0 0)` on the after image — no canvas. Both images `loading="lazy"`, `decoding="async"`, preloaded at same dimensions.

#### 3. Multi-Step Quote Form
- **Trigger:** User advances step
- **User sees:** Progress bar fills left-to-right with red. Current step slides out 16px + fades, next slides in 16px + fades. JetBrains Mono step numbering. "Next" disabled until required fields validate — disabled 40% opacity, enabled with red underline sweep on hover.
- **Motion:** Step transition `$motion-moderate` (300ms), `$ease-out-expo`. Progress bar fill `$motion-slow` (500ms).
- **Mobile:** Full-width steps, 48×48 inputs, numeric keyboard for phone/year, sticky "Next" at bottom.
- **Draft save:** localStorage on every field blur, restore on reload with a "Resume your quote" banner.

#### 4. Sticky Mobile Quote Bar
- **Trigger:** Scroll position > 400px on service/product pages, mobile only (<768px)
- **User sees:** Bottom-docked 60px bar with amber phone icon (left) and red "Get a Quote" button (right). Slides up on first trigger with `$motion-moderate`.
- **Scroll-aware:** Hides on scroll-down, reappears on scroll-up or at rest. Uses `translateY`, not `display`.
- **Never covers footer:** IntersectionObserver on footer — hide bar when footer enters viewport.
- **Reduced motion:** Appears without initial slide, no scroll-hide behavior.

#### 5. Brand Logo Carousel
- **Trigger:** Auto on load
- **User sees:** Infinite horizontal marquee, logos grayscale at 60% opacity. On hover: full color, 100% opacity, 200ms. Marquee pauses on hover over track.
- **Motion:** CSS `@keyframes` linear animation, 40s per loop, duplicated track for seamless wrap. Respects `prefers-reduced-motion` (static flex row).
- **Mobile:** Continues auto-scrolling at reduced speed (60s).
- **Performance:** `will-change: transform` on the track.

#### 6. Project Card Reveal + Hover
- **Trigger:** Card enters viewport / hover
- **User sees:** On reveal, cards stagger in with 60ms delay, fading from opacity 0 / translateY(16px). On hover: image scales to 1.03 (not 1.05), tag pills slide up 4px, red 2px underline sweeps under title left-to-right in 250ms.
- **Motion:** Reveal `$motion-moderate` + `$ease-out-expo`. Hover `$motion-fast`.
- **Mobile:** No hover — pills/title always visible. Tap goes directly to project page.

#### 7. Capability Selector (Off-Road page)
- **Trigger:** Tap Mild / Moderate / Extreme pill
- **User sees:** Active pill red with white text. Grid crossfades (300ms) to matching builds. Non-matching cards fade out via opacity 0 + scale 0.98, re-layout via FLIP or simple fade out/in.
- **Motion:** `$motion-moderate`, `$ease-out-expo`.
- **Mobile:** Pills scroll horizontally. 44×44 tap targets minimum.

#### 8. Service Category Card (XL) — Hover
- **Trigger:** Hover
- **User sees:** Image zooms 1.02, 3px red bottom border grows from 0 to full width, arrow icon shifts right 4px.
- **Motion:** `$motion-fast` for all three simultaneously. Transform-only (no width animation).
- **Mobile:** Tap state shows border instantly, arrow shifts on active.

#### 9. Trust Strip Counter Animation
- **Trigger:** Hero visible (IntersectionObserver)
- **User sees:** Number counts 0 → target (e.g., 0 → 4,200) over 1.2s, eases slow-at-end. Mono font. Fires once per page load.
- **Performance:** RAF-based, not setInterval.
- **Reduced motion:** Shows final value immediately.

#### 10. Phone CTA Block (Amber)
- **Trigger:** Hover (desktop), tap (mobile)
- **User sees:** Amber block with mono phone number. On hover: background shifts slightly darker amber, icon rotates −8deg, `tel:` link active. On mobile: tap triggers `tel:` directly.
- **Motion:** `$motion-fast`.
- **Accessibility:** Amber + dark text = 8.2:1 contrast.

### 2.2 Existing Starter Parameter Changes

| Interaction | Change | Why |
|-------------|--------|-----|
| Hero parallax | Overlay darkness 0.5 → 0.7. Add subtle grain/grunge texture at 8% opacity. Parallax rate unchanged. | Rugged, industrial feel. Text legibility over action photography. |
| Scroll reveal stagger | Default 40ms → 60ms; distance 12px → 16px | Heavier, more deliberate. Matches condensed display typography weight. |
| Hover easing | Default `ease-out` → `cubic-bezier(0.16, 1, 0.3, 1)` (`$ease-out-expo`) | Snappier, more mechanical — matches automotive brand feel. |
| Accordion expand | 300ms → 250ms; add 3px red left-border on active question | Faster feels more confident. Red rail reinforces brand accent. |
| Sticky header | Scroll threshold 80px → 120px; background on activation `$brand-dark` at 95% opacity + backdrop-blur | Navigation feels weightier, like a dashboard locking in. |
| Stats counter | Font family → JetBrains Mono. Count duration 1.5s → 1.2s. | Mono is the brand's "data" voice. |
| CTA button hover | Remove scale transform entirely. Use background darkening + 2px red underline sweep L→R (`::after` scaleX 0 → 1). | Scale on hover is AI-slop. Underline sweep is directional and confident. |

---

## 3. Design Direction

### 3.1 Visual Hierarchy

#### Spacing Rhythm

Use the standard base-4 grid — no overrides.

| Use | Spacing |
|-----|---------|
| Micro gap (overline → headline) | 16px |
| Headline → subline | 24px |
| Subline → CTA group | 40px |
| Section inner padding top/bottom (desktop) | 120px |
| Section inner padding top/bottom (mobile) | 80px |
| Component-to-component gap | 64px desktop / 48px mobile |
| Card grid gap | 24px desktop / 16px mobile |
| Card internal padding | 32px desktop / 24px mobile |

**One adjustment:** Dark-to-light section transitions use 128px top padding on the light section (16px breathing room over base) — prevents the adjacent dark block feeling cramped.

#### Image Treatment

- **Aspect ratios:**
  - Hero: full-viewport 16:9 cropped to 100vh desktop / 85vh mobile
  - Service category cards: 4:3
  - Project cards: 4:5 (portrait favors rugged vehicles)
  - Before/after: 16:9 fixed
  - Founder/shop collage: asymmetric (large 4:5 + two 1:1 stacked)
- **Border-radius:** 4px on cards and images. Zero radius on buttons (square edges match condensed display font).
- **Overlays:** All hero/feature photos get `linear-gradient(180deg, rgba(26,26,26,0.3) 0%, rgba(26,26,26,0.85) 100%)` for text legibility.
- **Grain/texture:** Subtle 4% opacity tiled noise PNG on all dark sections — prevents flat digital look. Tiled PNG background, not SVG filter (performance).
- **Desaturation:** Hero photography `saturate(0.9) contrast(1.08)` — cinematic rather than stock.
- **Crops:** Always action-oriented. Never centered product shots for hero. Product category cards use three-quarter angle, never pure profile.

#### Card Design Direction

**Service Category Card (XL) — homepage + services hub:**
- White background (`$brand-white`)
- 4:3 image top, full-bleed
- 32px interior padding
- JetBrains Mono overline (10px, uppercase, `$brand-primary`)
- Barlow Condensed 700 uppercase title (24px desktop)
- Barlow body description (15px, `$text-secondary`)
- Bottom-right arrow icon (16×16)
- Hover: 3px red bottom border sweeps in, image `scale(1.02)`, card `box-shadow 0 8px 32px rgba(26,26,26,0.08)`
- Border: 1px solid `$border-color` default → transparent on hover

**Project Card:**
- Warm white background (`$brand-warm-white`)
- 4:5 image, full-bleed
- 24px interior padding
- Tag pills (JetBrains Mono, 10px, uppercase) overlaid image bottom-left
- Title (Barlow Condensed 700, 20px)
- Vehicle line (Barlow, 14px, `$text-secondary`)
- Hover: image `scale(1.02)` + red underline sweep on title (see Phase 4 #6)

**Product Category Card (Shop):**
- White background
- Square 1:1 image
- Title + count below
- Minimal — let product imagery do the work

**Stat Badge:**
- No card border — inline
- Number: JetBrains Mono 700, 36px desktop / 28px mobile, `$brand-primary` or `$brand-accent` depending on context
- Label: JetBrains Mono 500, 11px uppercase, `letter-spacing: 0.1em`, `$text-secondary`
- 16px gap between number and label

#### CTA Button System

**Primary (Red):**
```scss
background: $brand-primary;
color: $brand-white;
font: 600 14px/1 "Barlow", sans-serif;
text-transform: uppercase;
letter-spacing: 0.05em;
padding: 18px 32px;
border: none;
border-radius: 0;
position: relative;
transition: background $motion-fast $ease-out-expo;

&:hover { background: darken($brand-primary, 8%); }
&::after {
  content: '';
  position: absolute;
  left: 0; bottom: 0;
  height: 2px;
  width: 100%;
  background: $brand-white;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 300ms $ease-out-expo;
}
&:hover::after { transform: scaleX(1); }
```

**Secondary (Ghost on Dark):**
- Transparent background, 1px border `rgba(245, 242, 238, 0.3)`, text `$text-on-dark`
- Hover: border to full `$text-on-dark`, background `rgba(245,242,238,0.08)`
- Same sweep underline

**Secondary (Ghost on Light):**
- Transparent background, 1px border `$brand-dark`, text `$brand-dark`
- Hover: background `$brand-dark`, text `$brand-white`

**Urgency / Phone (Amber):**
- Background `$brand-accent`
- Text `$brand-dark` (not white — contrast)
- Phone icon leading the text
- Same square edges
- Used only for phone CTAs and scarcity/urgency

**Button sizing:**
- Standard: 18px vertical / 32px horizontal, 14px text
- Small (navbar, inline): 12px / 24px, 13px text
- Large (hero, CTA): 22px / 40px, 15px text

**Active state:** All buttons compress on `:active` with `transform: translateY(1px)`. Not a scale — a press.

### 3.2 Section Contrast Strategy

**Homepage alternation — confirmed:**

| Section | Background |
|---------|-----------|
| Hero | Dark (`$brand-dark`) |
| Problem | Warm White (`$brand-warm-white`) |
| Founder/Shop | Dark (`$brand-dark`) |
| Features | White (`$brand-white`) |
| Proof | Warm White (`$brand-warm-white`) |
| Process + FAQ | White (`$brand-white`) |
| CTA | Dark (`$brand-dark`) |

**Red on dark sections:**
- Red is an accent line, icon color, and CTA — never a background fill on large areas
- Small red elements: top border accent lines (3px), icon fills, card borders on hover, active pill backgrounds, button fills
- Use red as the single eye-magnet in any dark section — one red element per fold, at most

**Amber on dark sections:**
- Amber is for stat badge numbers, phone CTA blocks, and urgency microcopy only
- Never combine amber and red in the same component — they compete

**Inner page header strategy:**

| Page | Header |
|------|--------|
| Services Hub | Dark |
| Spray-On Bedliners | Dark |
| Protective Coatings | Dark |
| Truck Accessories | Dark |
| Off-Road / Overland | Dark |
| Fleet Services | Dark |
| Gallery | Dark |
| About | Dark |
| Contact | Dark |
| Quote | Dark (minimal — no photography, flat color + red accent line) |
| FAQ | Dark |
| Blog | Warm White (editorial feel) |
| Shop | Warm White |

**Rule:** Every service and sales page uses a dark hero. Content-forward pages (blog, shop archives, legal) use warm white headers. Consistency = conversion; inconsistency = doubt.

### 3.3 Mobile-First Layout

**Grid adaptation:**

| Component | Desktop | Tablet | Mobile |
|-----------|---------|--------|--------|
| Service Category Cards | 3 col | 2 col | 1 col |
| Project Grid | 3 col | 2 col | 1 col (stacked) |
| Product Categories | 4 col | 3 col | 2 col |
| Stats | 4 inline | 4 inline | 2×2 grid |
| Testimonials | 3 col | 1 col carousel | 1 col carousel (swipe) |
| Brand Logos | marquee | marquee | marquee (slower) |

**Touch target sizing:**
- All cards: minimum 56px tap height on any interactive element
- Category / filter pills: 44×44 minimum
- Service Category Cards — entire card tappable (`<a>` wrapping)
- Form inputs: 52px minimum height
- Accordion headers: 64px minimum height

**Mobile navigation:**

```
HAMBURGER MENU (full-screen drawer, dark background)
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
├─ [divider]
├─ [RED BUTTON] Get a Quote
└─ [AMBER BLOCK] Call (555) 555-0123
```

- Dark drawer (`$brand-dark`) slides in from right
- Condensed font for nav links (24px)
- Expandable "Services" row with chevron — taps to expand inline, no new screen
- Primary CTAs pinned to drawer bottom — always visible even if menu is scrolled
- Hamburger → X animation on open, no rotation gimmicks

**Persistent quote CTA on mobile:** Sticky Quote Bar (Phase 4 #4) — bottom-docked, 60px tall, dual action.

### 3.4 Premium & Rugged — 15 Guidelines

1. **Photography is the entire first impression — treat it like the product.** Use action photography shot on-location with real vehicles, dirt on tires, light falling on metal. Every hero and feature image should look like a photographer was hired, not a Shutterstock search. If real photography isn't available, reserve image slots and use a dark placeholder with overline text — never fill with stock.

2. **Headlines are short, condensed, uppercase. No exceptions.** Barlow Condensed 700–800 uppercase, max 6 words on H1. Long headlines in condensed fonts become visual clutter. Move the rest to the subline.

3. **No gradients on buttons. No fake-depth shadows. No rounded pill CTAs.** Square edges. Solid color. One hover state. Premium brands commit to a single visual language per element — cheap sites mix flat, gradient, outline, and pill styles on the same page.

4. **Monospace for data, always. Never for body.** JetBrains Mono on stats, phone numbers, overlines, tags, metadata, form field labels. Creates immediate separation between "brand voice" (Barlow) and "information" (Mono). This one move alone adds 80% of the premium feeling.

5. **One accent color per fold.** Red is the eye-magnet. Two red elements fighting in the same viewport means one is wrong. Audit every section: where is the red? Is it leading the eye to the conversion action? If red is decorative, remove it. Amber is for phone CTAs only — it should feel rare.

6. **Generous dark sections. No gray sections.** Gray backgrounds are the telltale sign of a cheap site. Three backgrounds only: warm white, white, and dark. Any "neutral" section is warm white (`#F5F2EE`). Pure black `$brand-dark` (`#1A1A1A`) is used for dark blocks — never `#000`.

7. **Subtle noise texture on dark sections.** 4% opacity tiled noise PNG on every dark section background. Eye doesn't consciously see it, but it prevents the flat-digital look. Same logic as film grain on a premium ad.

8. **Zero inline CSS. Zero hardcoded colors. Zero one-off spacings.** Every color from `_theme_variables.scss`. Every spacing from the base-4 scale. The moment a component breaks the token system, the premium feel erodes. Enforce at code review.

9. **Buttons don't scale on hover.** The single biggest AI-slop tell is buttons that scale up on hover. Real premium sites use color shifts, underline sweeps, or background darkening — never scale transforms. Same for cards: 1.02 is the ceiling; 1.05+ is cheap.

10. **Trust elements live inline, not in a "Reviews" section.** Stars, ratings, years-in-business, warranty badges appear within hero strips and section transitions — not siloed to a "Trust" section. Premium brands weave proof throughout.

11. **Footer is dark, dense, useful.** A cheap auto site has a footer with three links and a "© 2026." A premium one has a full sitemap, business hours, address, two phone numbers (general and fleet), and contact email — all in a dark block with the logo prominent. The footer is a last-chance conversion tool.

12. **Every click feels instant.** `$motion-fast` (150ms) on everything interactive. No 500ms hover transitions. No delays. The site should feel like a mechanical tool — responsive, precise, built to work.

13. **No emoji. No decorative SVGs. No illustrated icons.** Monochrome line icons (Heroicons, Lucide) at consistent stroke width (1.5–2px). Every icon is the same family. If an icon needs a gradient or multiple colors, it's wrong for this brand.

14. **Controlled whitespace is a premium signal.** The 120px section padding and 32px card padding exist for a reason: they signal "we can afford to leave this empty." Cheap sites jam content edge-to-edge. Don't fight the whitespace.

15. **Consistency > novelty.** Every page uses the same hero treatment, card style, CTA pattern. Premium brands are boring across pages — the novelty lives in photography and headlines, not layout. Every time you're tempted to "make this page different," resist.

---

## 4. Shop / Product Discovery

> **V1 does not use WooCommerce.** The shop section uses content arrays (same pattern as the service detail pages). WooCommerce is V2 scope. The V1 content model is kept disciplined (consistent category slugs, brand slugs, product fields, vehicle type labels) so V2 migration to WooCommerce taxonomies is a clean 1:1 map.

### 4.1 V1 Shop Architecture

- **Category-first discovery** at `/shop/` — 9 category tiles on the landing page
- **Category pages** at `/shop/{category-slug}/` — category description, relevant brand logos, 3–5 featured/example products, "Request a Quote" CTA
- **Content source:** Content arrays in a shop content registry file (like `inc/service-content.php` but for shop categories + products)
- **Quote flow:** Gravity Forms powers the existing `/quote/` form. Product interest carries into the form as hidden fields or pre-selected service categories
- **Vehicle selector pills** (Truck / Jeep / SUV / Van) optionally filter which categories are highlighted on the shop landing page — reuses the existing `rhino:vehicle-change` JS event from the homepage hero
- **Brands** shown as logo strips and trust signals on category pages — not browsable catalog pages in V1
- **No Build List in V1** — V2 scope (sessionStorage-based product collection → quote submission)
- **No vehicle fitment filter in V1** — V3 scope (Year → Make → Model → Trim cascading selects)

### 4.2 Top-Level Product Categories (9 categories — naming locked for V2 migration)

1. **Bumpers & Armor** (`bumpers-armor`) — Front bumpers, rear bumpers, skid plates, rock sliders, grille guards
2. **Lighting** (`lighting`) — Light bars, pods, fog lights, rock lights, auxiliary headlights
3. **Suspension & Lifts** (`suspension-lifts`) — Lift kits, leveling kits, shocks, struts, control arms
4. **Wheels & Tires** (`wheels-tires`) — Off-road wheels, all-terrain tires, mud tires, beadlocks
5. **Recovery & Winches** (`recovery-winches`) — Winches, straps, shackles, recovery boards, D-rings
6. **Bed & Cargo** (`bed-cargo`) — Tonneau covers, bed racks, toolboxes, cargo management, tie-downs
7. **Overland Gear** (`overland-gear`) — Roof tents, awnings, roof racks, fridges, water storage
8. **Interior & Electrical** (`interior-electrical`) — Switch panels, dash mounts, USB kits, radio mounts
9. **Exterior Accessories** (`exterior-accessories`) — Running boards, fender flares, mud flaps, grilles

### 4.3 V1 Product Data Shape (content arrays)

Each featured product in the V1 content array uses this structure so the data migrates 1:1 to WooCommerce in V2:

```php
array(
    'title'             => 'ARB Deluxe Front Bumper',
    'short_description' => 'Bull-bar style bumper with winch mount and fog light provisions.',
    'price'             => '$1,895',             // "Starting at" — optional, blank = "Quote for pricing"
    'sku'               => 'ARB-3462020',        // optional
    'brand'             => 'arb',                // slug — matches V2 product_brand taxonomy
    'categories'        => array( 'bumpers-armor' ), // slugs — match V2 product_cat taxonomy
    'vehicle_types'     => array( 'truck', 'suv' ),  // slugs — match V2 product_vehicle_type taxonomy
    'image'             => '/wp-content/uploads/...', // featured image URL
    'install_available' => true,
)
```

### 4.4 Brand List (slugs locked for V2 migration)

| Display Name | Slug |
|---|---|
| ARB | `arb` |
| Fox | `fox` |
| Warn | `warn` |
| Rigid Industries | `rigid-industries` |
| Method Race Wheels | `method-race-wheels` |
| BFGoodrich | `bfgoodrich` |
| Rough Country | `rough-country` |
| Baja Designs | `baja-designs` |
| Smittybilt | `smittybilt` |
| Rhino-Rack | `rhino-rack` |

### 4.5 Service ↔ Shop Cross-Sell Strategy (V1)

**On service detail pages:**
- "Products We Install" section with 3–5 featured products from the relevant category + "Request a Quote" CTAs (rendered from content arrays, not WooCommerce queries)

**On the homepage:**
- 6th service card in features grid = "Shop Parts & Gear" → `/shop/`

**On shop landing page:**
- Persistent callout bar: "All products include optional in-bay installation. Ask about installation →"

### 4.6 V2 WooCommerce Migration Plan

When the business is ready for a richer product catalog (100+ products, build lists, eventual online sales), migrate to WooCommerce:

1. Install WooCommerce in catalog-only mode (disable cart/checkout/payments/shipping/tax)
2. Dequeue all WC front-end assets (CSS, JS, cart fragments) — Rhino's custom front-end handles everything
3. Register `product_brand` and `product_vehicle_type` as custom taxonomies on the `product` post type
4. Migrate content-array products → WC products (1:1 field map)
5. Replace content-array queries with `wc_get_products()` or `WP_Query` against the `product` post type
6. Keep the existing custom front-end templates — do NOT fall back to WooCommerce's template hierarchy
7. Build the sessionStorage-based "Build List" (replaces the traditional WC cart)
8. Build the Build List → quote form submission flow

### 4.7 V3 Vehicle Fitment Filter

Year → Make → Model → Trim cascading selects. Stored in sessionStorage as `rhino_vehicle`. Shop header shows "Showing products that fit: 2023 Ford F-150 Lariat · [Change] · [Clear]". Non-fitment-tagged products still display, labeled "Universal Fit." Implementation: custom post meta on products with fitment arrays; progressive enhancement — shop still works without JS.

---

## 5. Build Priority Notes

### V1 Core — COMPLETE

- ✅ Homepage (8 sections: hero, problem, founder, features, proof, process+FAQ, blog preview, CTA)
- ✅ 5 service detail pages (Spray-On Bedliners, Protective Coatings, Truck Accessories, Off-Road & Overland, Fleet Services)
- ✅ Services Hub page (/services/)
- ✅ About page (/about/)
- ✅ Contact page (/contact/) — Gravity Forms contact form
- ✅ Quote page (/quote/) — 3-step Gravity Forms multi-page form + sticky sidebar
- ✅ Gallery page (/gallery/) — 12 projects, 6 category filters, lightbox
- ✅ FAQ page (/faq/) — 15 questions across 4 topic groups
- ✅ Blog — homepage preview (3 latest), archive (/blog/), single post template, 3 sample posts
- ✅ Footer (4-column + social icons + GSL Design credit)
- ✅ Global nav (header desktop hover dropdowns + mobile drawer with accordion)
- ✅ Sticky header (frosted glass → condensed on scroll, 120px threshold)
- ✅ Red install callout bar (reusable component across services, shop, and service detail pages)
- ✅ Rank Math SEO configured (local schema, per-page titles + descriptions)
- ⬜ Sticky mobile quote bar (deferred)
- ⬜ 404 page (uses parent Understrap 404 currently)

### V1 Shop — COMPLETE

- ✅ Shop content registry (`inc/shop-content.php` — 9 categories, 33 products with real data + images)
- ✅ Shop landing page (`/shop/`) — 9 category tiles with featured images, brand carousel, install callout, CTA
- ✅ 9 category pages (`/shop/{slug}/`) — header with breadcrumb, brand strip, product grid, "Don't see what you need?" callout, CTA
- ✅ Product cards with brand badges, vehicle type pills, prices, and "Request Quote" CTAs linking to /quote/ with querystrings
- ✅ Brand logo strips on category pages
- ✅ Install callout bar on all shop pages
- ✅ Nav Shop dropdown updated to V1 child-page paths
- **No Build List** — V2 scope
- **No single product pages** — V2 scope
- **No vehicle fitment filter** — V3 scope

### V2 (post-launch — WooCommerce migration)

- Install WooCommerce as headless catalog engine (catalog-only mode, all front-end assets dequeued)
- Migrate V1 content-array products → WooCommerce `product` post type (1:1 field map)
- Register `product_brand` + `product_vehicle_type` as WooCommerce taxonomies
- Build sessionStorage-based "Build List" (replaces the traditional WC cart concept)
- Build List → quote form submission flow
- Single product pages with install cross-sell banner
- Brand archive pages
- Category + brand + price filtering
- Header build-list icon with count badge
- Quote form pre-population from product pages

### V3 (future)

- Vehicle Fitment Filter (Year → Make → Model → Trim cascading selects)
- localStorage draft save on quote form ("Resume your quote" banner)
- Sticky mobile quote bar
- Custom 404 page
- Financing page
- Warranty page
