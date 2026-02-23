# GSL Starter Theme — Animation & Interaction Specification

**Document type:** Motion design system, mapped to template files
**Design principle:** Restrained confidence. Every animation serves comprehension or wayfinding. Nothing moves for decoration. The brand is calm — the motion language should feel like a slow exhale, not a performance.
**Performance target:** 60fps on all interactions. No layout thrash. No animation on mobile that drains battery.

---
---

## DESIGN TOKENS — Motion

Add these to `src/sass/theme/_theme_variables.scss` as CSS custom properties, so both SCSS and JS can reference them.

```scss
// ============================================
// Motion Tokens
// ============================================

// Durations
$motion-instant:    100ms;   // Hover states, toggles
$motion-fast:       200ms;   // Micro-interactions, button feedback
$motion-moderate:   400ms;   // Section reveals, nav transitions
$motion-slow:       600ms;   // Hero entrance, page-level transitions
$motion-deliberate: 1000ms;  // Staggered sequences, hero headline

// Easing
// "Calm deceleration" — enters with energy, settles gently
$ease-out-smooth:   cubic-bezier(0.25, 0.46, 0.45, 0.94);

// "Confident entrance" — purposeful, no bounce
$ease-out-expo:     cubic-bezier(0.16, 1, 0.3, 1);

// "Restrained spring" — subtle overshoot for interactive feedback
$ease-spring:       cubic-bezier(0.34, 1.56, 0.64, 1);

// "Linear fade" — opacity-only transitions
$ease-linear:       linear;

// Stagger
$stagger-unit:      80ms;    // Delay between sequential items

// Distances
$reveal-distance:   24px;    // How far elements travel on scroll-reveal
$hover-lift:        -2px;    // Subtle lift on interactive cards
$nav-shrink-from:   80px;    // Navbar full height
$nav-shrink-to:     60px;    // Navbar scrolled height

// CSS Custom Properties (for JS access)
:root {
  --motion-instant: #{$motion-instant};
  --motion-fast: #{$motion-fast};
  --motion-moderate: #{$motion-moderate};
  --motion-slow: #{$motion-slow};
  --motion-deliberate: #{$motion-deliberate};
  --ease-out-smooth: #{$ease-out-smooth};
  --ease-out-expo: #{$ease-out-expo};
  --ease-spring: #{$ease-spring};
  --reveal-distance: #{$reveal-distance};
}
```

---
---

## GLOBAL BEHAVIORS

### Scroll Reveal System

All sections below the fold use a shared reveal pattern. No external libraries — use `IntersectionObserver` in `src/js/theme.js`.

**Pattern:**
```
Initial state:  opacity: 0; transform: translateY(var(--reveal-distance));
Revealed state: opacity: 1; transform: translateY(0);
Transition:     duration: $motion-slow; easing: $ease-out-expo;
Trigger:        When element enters viewport at 15% threshold
Direction:      One-way — once revealed, stays revealed (no re-hide)
```

**Stagger rule:** When a section contains multiple sibling elements (pillar cards, plan cards, FAQ items), each child staggers by `$stagger-unit` (80ms). Maximum total stagger: 320ms (4 items). Beyond 4 items, batch in groups.

**CSS class convention:**
```css
.bmg-reveal {
  opacity: 0;
  transform: translateY(24px);
  transition: opacity 600ms cubic-bezier(0.16, 1, 0.3, 1),
              transform 600ms cubic-bezier(0.16, 1, 0.3, 1);
  will-change: opacity, transform;
}

.bmg-reveal.is-visible {
  opacity: 1;
  transform: translateY(0);
}

/* Stagger children */
.bmg-reveal-stagger > .bmg-reveal:nth-child(1) { transition-delay: 0ms; }
.bmg-reveal-stagger > .bmg-reveal:nth-child(2) { transition-delay: 80ms; }
.bmg-reveal-stagger > .bmg-reveal:nth-child(3) { transition-delay: 160ms; }
.bmg-reveal-stagger > .bmg-reveal:nth-child(4) { transition-delay: 240ms; }
```

**JavaScript (IntersectionObserver):**
```javascript
const reveals = document.querySelectorAll('.bmg-reveal');
if (reveals.length) {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  reveals.forEach(el => observer.observe(el));
}
```

**Reduced motion:** Respect `prefers-reduced-motion`. When active, all reveals are instant (no transform, no delay, opacity snaps to 1).

```css
@media (prefers-reduced-motion: reduce) {
  .bmg-reveal {
    opacity: 1;
    transform: none;
    transition: none;
  }
}
```

---

### Smart Sticky Header

The navbar uses a hide/show pattern based on scroll direction rather than a permanently visible sticky bar. This reclaims viewport space while keeping navigation instantly accessible.

**States:**

| State | Trigger | Height | Background | Logo | Transform |
|-------|---------|--------|------------|------|-----------|
| Full | In hero viewport | 80px | `transparent` | 100% scale | `translateY(0)` |
| Hidden | Scrolled past hero, scrolling DOWN | 60px | — | — | `translateY(-100%)` |
| Condensed | Scrolled past hero, scrolling UP | 60px | `rgba(10, 10, 10, 0.98)` | 85% scale | `translateY(0)` |
| Full (return) | Scrolled back into hero | 80px | `transparent` | 100% scale | `translateY(0)` |

**Behavior logic:**

```
1. Track scroll direction by comparing current scrollY to previous scrollY
2. Track hero boundary (bottom of hero section element)
3. If within hero viewport → State: Full
4. If past hero + scrolling DOWN → State: Hidden
5. If past hero + scrolling UP → State: Condensed
6. Debounce at 10px threshold — ignore scroll deltas smaller than 10px to prevent flicker
```

**Transitions:**

```
Hide:       transform: translateY(-100%)
            transition: transform 400ms cubic-bezier(0.16, 1, 0.3, 1)

Reveal:     transform: translateY(0)
            transition: transform 400ms cubic-bezier(0.16, 1, 0.3, 1)

Background: transition: background-color 400ms cubic-bezier(0.25, 0.46, 0.45, 0.94)

Logo scale: transition: transform 400ms cubic-bezier(0.25, 0.46, 0.45, 0.94)
```

**Condensed state styling:**

```css
.navbar.is-condensed {
  height: 60px;
  background-color: rgba(10, 10, 10, 0.98);
  box-shadow: 0 1px 0 rgba(168, 169, 173, 0.1);
  transform: translateY(0);
  transition: transform 400ms cubic-bezier(0.16, 1, 0.3, 1),
              background-color 400ms cubic-bezier(0.25, 0.46, 0.45, 0.94),
              height 400ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.navbar.is-condensed .navbar-brand img {
  transform: scale(0.85);
  transition: transform 400ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.navbar.is-hidden {
  transform: translateY(-100%);
  transition: transform 400ms cubic-bezier(0.16, 1, 0.3, 1);
}
```

**JavaScript structure:**

```javascript
// In src/js/theme.js
let lastScrollY = 0;
const SCROLL_THRESHOLD = 10;
const navbar = document.querySelector('.navbar');
const heroSection = document.querySelector('.hero-section');

function getHeroBottom() {
  return heroSection ? heroSection.offsetTop + heroSection.offsetHeight : 0;
}

function handleScroll() {
  const currentScrollY = window.scrollY;
  const delta = currentScrollY - lastScrollY;
  const pastHero = currentScrollY > getHeroBottom();

  // Ignore tiny scroll movements
  if (Math.abs(delta) < SCROLL_THRESHOLD) return;

  if (!pastHero) {
    // In hero — full transparent navbar
    navbar.classList.remove('is-hidden', 'is-condensed');
  } else if (delta > 0) {
    // Scrolling DOWN past hero — hide
    navbar.classList.add('is-hidden');
    navbar.classList.remove('is-condensed');
  } else {
    // Scrolling UP past hero — show condensed
    navbar.classList.remove('is-hidden');
    navbar.classList.add('is-condensed');
  }

  lastScrollY = currentScrollY;
}

window.addEventListener('scroll', handleScroll, { passive: true });
```

**Mobile:** Same behavior, same breakpoints. The condensed header is especially valuable on mobile where viewport height is limited.

**Inner pages (no hero):** On pages without a hero section (About, Plans, Services, FAQ, etc.), the navbar starts in the condensed state immediately. The full/transparent state only applies to the homepage hero.

---

### Page Transitions

**No full page transitions.** This is a WordPress site, not an SPA. Each page load is a server request. Instead, use a consistent entrance sequence per page:

```
1. Page loads → body has class .bmg-page-enter
2. After DOMContentLoaded:
   - Hero content fades in (see per-section specs below)
   - .bmg-page-enter removed
3. Sections below fold use scroll-reveal system
```

---

### Anchor / CTA Smooth Scroll

Any in-page anchor link (`#section-id`) smooth-scrolls with an offset for the fixed navbar.

```css
html {
  scroll-behavior: smooth;
  scroll-padding-top: 80px; /* matches $nav-shrink-from */
}
```

**JS fallback** for browsers that don't support `scroll-padding-top` with sticky navs — not needed for the target browser matrix.

---
---

## PER-SECTION ANIMATIONS

### 1.1 Hero — `section-hero.php`

The hero is the only section with a deliberate, sequenced entrance. Everything else uses the shared reveal system.

**Load sequence (stagger from top):**

| Step | Element | Animation | Duration | Delay | Easing |
|------|---------|-----------|----------|-------|--------|
| 1 | Background | Fade in from black overlay | 800ms | 0ms | $ease-out-smooth |
| 2 | H1 headline | Fade up from 32px below | 800ms | 200ms | $ease-out-expo |
| 3 | Divider line | Scale X from 0 to 1 (center origin) | 600ms | 500ms | $ease-out-expo |
| 4 | Subhead | Fade up from 24px below | 600ms | 650ms | $ease-out-expo |
| 5 | Primary CTA | Fade up from 24px below | 600ms | 800ms | $ease-out-expo |
| 6 | Secondary CTA | Fade up from 24px below | 600ms | 880ms | $ease-out-expo |

**Total sequence duration:** ~1.5s from page load to all elements visible.

**Hero background:** Two layers of subtle motion. First, a slow zoom (Ken Burns) via CSS animation. Second, a parallax scroll effect where the background moves at 30% of scroll speed, adding depth as the user scrolls past.

**Structure requirement:** The hero needs a separate background element (not `background-image` on the section) so transforms can be applied independently of the content.

```html
<section class="hero-section">
  <div class="hero-background"></div>
  <div class="hero-content">
    <!-- H1, subhead, CTAs -->
  </div>
</section>
```

```css
.hero-section {
  position: relative;
  overflow: hidden;
}

.hero-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 120%; /* extra height to prevent gap during parallax translate */
  background-size: cover;
  background-position: center;
  animation: heroZoom 20s linear infinite alternate;
  will-change: transform;
  z-index: 0;
}

.hero-content {
  position: relative;
  z-index: 1;
}

@keyframes heroZoom {
  from { transform: scale(1); }
  to   { transform: scale(1.05); }
}

@media (prefers-reduced-motion: reduce) {
  .hero-background {
    animation: none;
    transform: none !important; /* Disable JS parallax too */
  }
}
```

**Parallax JS** (add to existing scroll handler in `src/js/theme.js`):

```javascript
const heroBg = document.querySelector('.hero-background');
const heroSection = document.querySelector('.hero-section');
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function updateHeroParallax() {
  if (!heroBg || !heroSection || prefersReducedMotion) return;

  const scrolled = window.scrollY;
  const heroHeight = heroSection.offsetHeight;

  // Only calculate while hero is in view
  if (scrolled < heroHeight) {
    heroBg.style.transform = `translateY(${scrolled * 0.3}px) scale(1.05)`;
  }
}

// Call inside existing rAF scroll handler or attach to scroll listener
window.addEventListener('scroll', () => {
  requestAnimationFrame(updateHeroParallax);
}, { passive: true });
```

**How it works:** The background translates downward at 30% of scroll speed while the content scrolls at full speed. This creates a subtle separation between layers. The `scale(1.05)` prevents any gaps from appearing at the bottom edge during translation. The `height: 120%` on the background element provides additional buffer.

**Performance:** `transform: translateY()` is GPU-accelerated. The calculation only runs while the hero is visible (early exit when `scrolled > heroHeight`). This piggybacks on the scroll listener already in use for the sticky header — no additional event binding needed if combined.

**Mobile:** Parallax runs on mobile since transforms are cheap. The Ken Burns zoom is disabled on mobile (battery concern), but the parallax scroll is lightweight enough to keep. If testing reveals jank on low-end devices, disable with:

```css
@media (max-width: 767.98px) {
  .hero-background {
    animation: none;
    /* JS should also skip parallax at this breakpoint */
  }
}
```

---

### 1.2 Explainer — `section-explainer.php`

**Reveal:** Standard `.bmg-reveal` on the content block. Single element, no stagger.

**No additional animation.** This is a text-heavy reading section. Motion would compete with comprehension.

---

### 1.3 Pillars — `section-pillars.php`

**Reveal:** `.bmg-reveal-stagger` on the row container, `.bmg-reveal` on each of the 4 pillar cards.

**Stagger:** 80ms between cards (0, 80, 160, 240ms).

**Icon treatment:** Icons fade in with the card. No separate icon animation. The Brushed Silver color is enough visual distinction.

**Hover (desktop only):**
```
Property:   transform: translateY($hover-lift) — subtle 2px lift
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2)
Duration:   $motion-fast (200ms)
Easing:     $ease-spring
```

**Mobile:** No hover effects. Cards are static after reveal.

---

### 1.4 Plans Overview — `section-plans-overview.php`

**Reveal:** `.bmg-reveal-stagger` on the card row, `.bmg-reveal` on each of the 3 plan cards.

**Stagger:** 80ms between cards (0, 80, 160ms).

**Featured card entrance:** Same stagger timing, but the featured card (center) has an additional subtle scale: starts at `scale(0.98)`, reveals to `scale(1)`. This reinforces its visual prominence without a dramatic difference.

**Hover (desktop only):**
```
All cards:
  Property:   transform: translateY($hover-lift)
              border-color transition to Brushed Silver at 20% opacity
  Duration:   $motion-fast (200ms)
  Easing:     $ease-spring

Featured card (additional):
  Property:   box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15)
  Duration:   $motion-fast (200ms)
```

---

### 1.5 Physician Preview — `section-physician-preview.php`

**Reveal:** Two-part stagger:
- Photo: `.bmg-reveal` (fade up)
- Text block: `.bmg-reveal` with 120ms delay

**Photo:** No hover effect, no parallax. The physician portrait should feel grounded and stable — not an interactive element.

**"Read Full Profile →" link:**
```
Hover:
  Property:   Arrow translates right 4px
              Text color transition to Brushed Silver
  Duration:   $motion-fast (200ms)
  Easing:     $ease-out-smooth
```

---

### 1.6 FAQ Preview — `section-faq-preview.php`

**Reveal:** `.bmg-reveal` on the heading, `.bmg-reveal-stagger` on the accordion.

**Accordion open/close:**
```
Property:   max-height: 0 → measured height
            opacity: 0 → 1
Duration:   $motion-moderate (400ms)
Easing:     $ease-out-expo
```

**Accordion icon rotation:**
```
Property:   transform: rotate(0deg) → rotate(180deg)
Duration:   $motion-moderate (400ms)
Easing:     $ease-out-smooth
```

Bootstrap 5's default accordion animation is acceptable. Override only the duration and easing to match the motion tokens. Do not rebuild the accordion component.

```css
.accordion-button::after {
  transition: transform 400ms cubic-bezier(0.16, 1, 0.3, 1);
}

.accordion-collapse {
  transition: max-height 400ms cubic-bezier(0.16, 1, 0.3, 1);
}
```

---

### 1.7 CTA — `section-cta.php`

**Reveal:** `.bmg-reveal` on the content block. Single element.

**Parallax background:** The CTA section uses a background image with a dark overlay, creating depth and visual warmth at the conversion point.

**Structure:**
```html
<section class="section-cta">
  <div class="cta-background"></div>
  <div class="cta-content">
    <!-- heading, subtext, button, phone link -->
  </div>
</section>
```

**Styling:**
```css
.section-cta {
  position: relative;
  overflow: hidden;
}

.cta-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 120%;
  background-image: url('...'); /* from Customizer or fallback image */
  background-size: cover;
  background-position: center;
  z-index: 0;
}

.cta-background::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(10, 10, 10, 0.82);
  z-index: 1;
}

.cta-content {
  position: relative;
  z-index: 2;
}
```

**Parallax JS** (add to existing scroll handler in `src/js/theme.js`):
```javascript
const ctaBg = document.querySelector('.cta-background');
const ctaSection = document.querySelector('.section-cta');

function updateCtaParallax() {
  if (!ctaBg || !ctaSection || prefersReducedMotion) return;

  const rect = ctaSection.getBoundingClientRect();
  const windowHeight = window.innerHeight;

  // Only calculate when section is near or in viewport
  if (rect.bottom > 0 && rect.top < windowHeight) {
    const scrollAmount = (windowHeight - rect.top) * 0.2;
    ctaBg.style.transform = `translateY(${scrollAmount}px)`;
  }
}

// Call inside existing rAF scroll handler alongside hero parallax
```

**Overlay opacity tuning:** `0.82` lets ambient tones bleed through subtly without competing with the white CTA text. Adjust between `0.75` (warmer, more visible) and `0.88` (darker, more subtle) based on the image.

**Reduced motion:** Disable parallax transform. Background image and overlay still display (static).

**Mobile:** Same behavior. The image provides ambient warmth even without parallax movement.

---
---

## GLOBAL INTERACTIVE ELEMENTS

### Buttons

**All buttons share this interaction pattern:**

```
Hover:
  Property:   background-color fill (ghost → filled)
              border-color: Brushed Silver at full opacity
  Duration:   $motion-fast (200ms)
  Easing:     $ease-out-smooth

Active/pressed:
  Property:   transform: scale(0.98)
  Duration:   $motion-instant (100ms)
  Easing:     $ease-out-smooth

Focus:
  Property:   outline: 2px solid Brushed Silver, offset 2px
              No transition — instant for accessibility
```

**Ghost buttons** (outlined, used in hero and CTAs):
```
Default:    border: 1px solid rgba(168, 169, 173, 0.4); background: transparent
Hover:      border: 1px solid #A8A9AD; background: rgba(168, 169, 173, 0.08)
Active:     scale(0.98)
```

**Filled buttons** (used in forms and primary actions):
```
Default:    background: #A8A9AD (Brushed Silver); color: #0A0A0A
Hover:      background: #BDBEC2 (lighter); transform: translateY(-1px)
Active:     scale(0.98); translateY(0)
```

---

### Links

**Inline text links:**
```
Default:    color: Brushed Silver; text-decoration: underline with offset
Hover:      color: #FFFFFF (on dark) or #0A0A0A (on light)
            underline-offset increases by 2px
Duration:   $motion-fast (200ms)
```

**Arrow links** ("Read Full Profile →", "View All Questions →"):
```
Hover:      Arrow character translates right 4px
            Underline appears (from left, scale-x 0 → 1)
Duration:   $motion-fast (200ms)
Easing:     $ease-out-smooth
```

```css
.bmg-arrow-link {
  display: inline-flex;
  align-items: center;
  gap: 4px;
  text-decoration: none;
  position: relative;
}

.bmg-arrow-link::after {
  content: '→';
  display: inline-block;
  transition: transform 200ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.bmg-arrow-link:hover::after {
  transform: translateX(4px);
}

.bmg-arrow-link::before {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 100%;
  height: 1px;
  background: currentColor;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 200ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.bmg-arrow-link:hover::before {
  transform: scaleX(1);
}
```

---

### Form Inputs

**Focus state:**
```
Property:   border-color: transparent → Brushed Silver
            box-shadow: 0 0 0 1px #A8A9AD
Duration:   $motion-fast (200ms)
Easing:     $ease-out-smooth
```

**Validation error:**
```
Property:   border-color → $bmg-error (#8B4049)
            Subtle shake: translateX(-4px, 4px, -2px, 0)
Duration:   shake 300ms, color $motion-fast
```

```css
@keyframes inputShake {
  0%   { transform: translateX(0); }
  25%  { transform: translateX(-4px); }
  50%  { transform: translateX(4px); }
  75%  { transform: translateX(-2px); }
  100% { transform: translateX(0); }
}

.gform_validation_error input:invalid {
  animation: inputShake 300ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
  border-color: #8B4049;
}
```

**Submit button loading state:**
```
Property:   Button text fades to 0
            Spinner (CSS-only) fades in at center
            Button width stays fixed (no layout shift)
Duration:   $motion-fast (200ms) for swap
Spinner:    16px, 2px border, Brushed Silver, rotating 800ms linear infinite
```

---

### Dark Mode Toggle

**Toggle transition:**
```
Property:   Icon rotation (sun ↔ moon): rotate(0 → 360deg)
            Body background-color, color, all surface colors
Duration:   Icon: $motion-moderate (400ms)
            Colors: $motion-slow (600ms) — slower so it feels like a gradual shift, not a flash
Easing:     Icon: $ease-spring
            Colors: $ease-out-smooth
```

**Important:** The `dark-mode.php` FOUC prevention script should still apply the theme instantly on load. The 600ms transition only applies to user-initiated toggles, not page load.

```css
/* Only animate when user toggles, not on page load */
body.bmg-dm-transition,
body.bmg-dm-transition *,
body.bmg-dm-transition *::before,
body.bmg-dm-transition *::after {
  transition: background-color 600ms cubic-bezier(0.25, 0.46, 0.45, 0.94),
              color 600ms cubic-bezier(0.25, 0.46, 0.45, 0.94),
              border-color 600ms cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
}
```

JS adds `bmg-dm-transition` on toggle click, removes it after 600ms. This prevents the transition from firing on page load.

---

### Mobile Navigation

**Hamburger → X transition:**
```
Property:   Top/bottom bars rotate to form X
            Middle bar fades out
Duration:   $motion-moderate (400ms)
Easing:     $ease-out-expo
```

Bootstrap 5's default toggler animation is adequate. Override only if the current implementation feels sluggish.

**Nav collapse (mobile menu open):**
```
Property:   Menu slides down from 0 height
            Each nav item staggers in (fade + translateY)
Duration:   Collapse: $motion-moderate (400ms)
            Item stagger: $stagger-unit (80ms) per item
Easing:     $ease-out-expo
```

---

### Scroll Progress (Optional, CTA enhancement)

A thin 1px line at the very top of the viewport that fills from left to right as the user scrolls. Brushed Silver color, 100% opacity. Disappears on scroll-to-top.

```css
.bmg-scroll-progress {
  position: fixed;
  top: 0;
  left: 0;
  height: 1px;
  background: #A8A9AD;
  z-index: 9999;
  transform-origin: left;
  will-change: transform;
}
```

Update `scaleX()` via JS on `requestAnimationFrame`. Keep it passive — no forced layouts.

**Decision:** This is optional. Only add if the site feels like it needs a subtle polish layer. Skip it for launch if timeline is tight.

---

### Back to Top Button

A small fixed button that appears after extended scrolling, providing a quick way to return to the top of the page. Especially useful on long inner pages (FAQ, Plans comparison, Services).

**Appearance:**
```
Shape:      Circle, 40px diameter
Border:     1px solid rgba(168, 169, 173, 0.4)
Background: transparent
Icon:       Chevron-up, 16px, Brushed Silver (#A8A9AD)
Position:   fixed, bottom: 24px, right: 24px
z-index:    900 (below modals, above page content)
```

**Show/hide behavior:**
```
Hidden:     opacity: 0; pointer-events: none
Visible:    opacity: 1; pointer-events: auto
Trigger:    Appears when scrollY > 2x viewport height
            Hides when scrollY < 2x viewport height
Transition: opacity 400ms $ease-out-smooth
```

**Hover:**
```
Property:   background: rgba(168, 169, 173, 0.08)
            border-color: #A8A9AD at full opacity
Duration:   $motion-fast (200ms)
Easing:     $ease-out-smooth
```

**Click:**
```
Action:     window.scrollTo({ top: 0, behavior: 'smooth' })
Active:     transform: scale(0.95) for 100ms
```

**CSS:**
```css
.bmg-back-to-top {
  position: fixed;
  bottom: 24px;
  right: 24px;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 1px solid rgba(168, 169, 173, 0.4);
  background: transparent;
  color: #A8A9AD;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  pointer-events: none;
  transition: opacity 400ms cubic-bezier(0.25, 0.46, 0.45, 0.94),
              background-color 200ms cubic-bezier(0.25, 0.46, 0.45, 0.94),
              border-color 200ms cubic-bezier(0.25, 0.46, 0.45, 0.94);
  z-index: 900;
}

.bmg-back-to-top.is-visible {
  opacity: 1;
  pointer-events: auto;
}

.bmg-back-to-top:hover {
  background: rgba(168, 169, 173, 0.08);
  border-color: #A8A9AD;
}

.bmg-back-to-top:active {
  transform: scale(0.95);
}

.bmg-back-to-top svg {
  width: 16px;
  height: 16px;
  stroke: currentColor;
  stroke-width: 2;
  fill: none;
}
```

**JavaScript:**
```javascript
const backToTop = document.querySelector('.bmg-back-to-top');
if (backToTop) {
  const threshold = window.innerHeight * 2;

  window.addEventListener('scroll', () => {
    if (window.scrollY > threshold) {
      backToTop.classList.add('is-visible');
    } else {
      backToTop.classList.remove('is-visible');
    }
  }, { passive: true });

  backToTop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}
```

**Reduced motion:**
```css
@media (prefers-reduced-motion: reduce) {
  .bmg-back-to-top {
    transition: none;
  }
  /* JS should use behavior: 'auto' instead of 'smooth' */
}
```

**Mobile:** Same position, same size. Touch target is 40px which meets minimum accessibility requirements (44px recommended — consider 44px on mobile via media query if testing reveals tap issues).

---
---

## PERFORMANCE RULES

1. **GPU-accelerated properties only.** Animate `transform` and `opacity`. Never animate `width`, `height`, `top`, `left`, `margin`, or `padding`.

2. **`will-change` sparingly.** Only on elements that are about to animate (`.bmg-reveal` elements). Remove after animation completes if possible. Never apply to more than 10 elements simultaneously.

3. **Passive scroll listeners.** All scroll-based JS (navbar shrink, scroll progress) must use `{ passive: true }` on the event listener.

4. **`IntersectionObserver` over scroll events** for reveal animations. No `getBoundingClientRect()` in scroll handlers.

5. **Debounce resize handlers** at 150ms. Recalculate only what's necessary.

6. **No animation libraries.** No GSAP, no Animate.css, no AOS. The motion system is small enough to implement with CSS transitions + one IntersectionObserver. Libraries add weight for capability this site won't use.

7. **Mobile reduction:**
   - No hero background zoom
   - No card hover effects (they don't exist on touch)
   - No scroll progress bar
   - Reveal animations still fire but with `$motion-moderate` (400ms) instead of `$motion-slow` (600ms)

8. **Reduced motion preference:**
   - All transforms disabled
   - All durations set to 0ms
   - Opacity still allowed (instant snap)
   - Scroll behavior: auto (not smooth)

```css
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
```

---
---

## WHAT NOT TO ANIMATE

The brand is restrained. These are explicit "do not animate" rules:

- **Provider photo.** No parallax, no hover zoom, no reveal-on-scroll crop. Static. Grounded. Trustworthy.
- **Plan pricing.** When pricing is added, no counting-up number animation. Display the number. The audience does not need to be entertained by their bill.
- **HIPAA/privacy content.** No animation on the privacy policy page. No reveals, no staggers. Legal content should be immediately readable.
- **Form fields.** No animated labels (floating label pattern). Labels stay above inputs, always visible. Accessibility and clarity over polish.
- **Logo.** No loading animation, no entrance animation. The logo appears instantly. It's the first thing that establishes trust.
- **Text content.** No typewriter effects, no word-by-word reveals, no character animation. The hero headline fades up as a complete block. Everything else reveals as complete paragraphs.
- **Colors.** No gradient animations, no color cycling, no pulsing elements. Colors are static unless responding to user interaction (hover, focus, dark mode toggle).
- **Parallax.** No parallax scrolling on any section except the homepage hero and the CTA section. The hero uses a subtle background parallax (30% scroll speed) for depth. The CTA uses a slower parallax (20% scroll speed) on the office lobby image. All other sections remain static. Full-page parallax, section-over-section sliding, and decorative parallax layers are not permitted.

---
---

## CLAUDE CODE IMPLEMENTATION NOTES

### Build Order
1. Add motion tokens to `_theme_variables.scss`
2. Add `.bmg-reveal` system CSS to `_sections.scss`
3. Add IntersectionObserver JS to `src/js/theme.js`
4. Add `.bmg-reveal` classes to homepage section templates
5. Implement hero entrance sequence
6. Implement smart sticky header (hide/show on scroll direction)
7. Style button/link hover states
8. Add back-to-top button (markup in `footer.php`, styles in `_theme.scss`, JS in `theme.js`)
9. Test with `prefers-reduced-motion`
10. Run `npm run build`

### File Mapping
| Animation | CSS File | JS File |
|---|---|---|
| Motion tokens | `_theme_variables.scss` | — |
| Reveal system | `_sections.scss` | `src/js/theme.js` |
| Hero sequence | `_sections.scss` | `src/js/theme.js` |
| Smart sticky header | `_sections.scss` | `src/js/theme.js` |
| Back to top button | `_theme.scss` | `src/js/theme.js` |
| Button hovers | `_theme.scss` | — |
| Link hovers | `_theme.scss` | — |
| Accordion | `_sections.scss` | — (Bootstrap handles) |
| Dark mode transition | `_dark-mode.scss` | `inc/dark-mode.php` (existing) |
| Form interactions | `_woocommerce.scss` or `_theme.scss` | — |
| Reduced motion | `_theme.scss` | — |

### Classes to Add to Templates
| Template | Class(es) |
|---|---|
| `section-explainer.php` | `.bmg-reveal` on content wrapper |
| `section-pillars.php` | `.bmg-reveal-stagger` on row, `.bmg-reveal` on each pillar |
| `section-plans-overview.php` | `.bmg-reveal-stagger` on row, `.bmg-reveal` on each card |
| `section-physician-preview.php` | `.bmg-reveal` on photo, `.bmg-reveal` (120ms delay) on text |
| `section-faq-preview.php` | `.bmg-reveal` on heading, `.bmg-reveal-stagger` on accordion |
| `section-cta.php` | `.bmg-reveal` on content wrapper |
| All inner page heroes | `.bmg-reveal` on content wrapper |
| All arrow links | `.bmg-arrow-link` |
