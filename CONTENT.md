# CONTENT.md — Rhino Custom Builds

**Document type:** Production website copy reference. Source of truth for all text on the site.
**Brand voice:** Rugged, confident, expert, no-bullshit, premium. Tradesman-to-customer, not marketer-to-consumer.
**Target audience:** Truck owners, off-road and overland enthusiasts, and fleet managers in the surrounding region.
**Conversion goal:** Primary — quote requests + phone calls. Secondary — ecommerce purchases with in-bay install cross-sell.

Read `CLAUDE.md` before editing templates. Read `references/rhino-build-spec.md` for interaction and design detail.

---

## Brand Voice Quick Reference

### Personality (5 adjectives)

1. **Rugged** — Built for real work, not showroom photos.
2. **Confident** — States what it does and backs it up. No hedging.
3. **Expert** — Speaks with hands-on authority. Tradesman, not marketer.
4. **No-bullshit** — Short sentences. Clear terms. No upsell theater.
5. **Premium** — Holds a standard. Won't cut corners even when it's cheaper.

### Voice Style

- **Sentence structure:** Short. Active voice. Direct. Average under 15 words. Headlines under 6 words.
- **Person:** First-person plural ("we build," "we warranty," "we stand behind"). Second-person for the customer ("your rig," "your truck").
- **Formality:** Professional but not corporate. Tradesman-to-customer. Speaks up, never down. Treats the customer as someone who respects the work.
- **Rhythm:** Uses fragments for emphasis. Starts sentences with verbs. Ends paragraphs with a line that lands like a hammer.
- **Punctuation:** Em dashes for emphasis. Periods, not exclamation points. No ellipses.

### Messaging Pillars (3 core value propositions)

1. **Built by builders.**
   We work on trucks because we drive trucks. Every install comes off our own floor. No subcontractors. No guesswork. Walk in and the person who talks to you is the person who builds it.

2. **One shop. Every system.**
   From spray-on liners to full off-road builds — one install bay, one warranty, one team accountable. You don't chase invoices across three vendors. You don't rebuild someone else's mistakes.

3. **Backed for the long haul.**
   Lifetime warranty on every coating. Manufacturer-backed on every part. Fully insured, bonded, certified. If we installed it, we stand behind it. That's not a slogan — it's the business model.

### 15 Power Words

1. **Built** — Past tense commitment. Something finished and standing.
2. **Forged** — Heat, pressure, deliberate making.
3. **Bolted** — Mechanical certainty.
4. **Backed** — Warranty, insurance, accountability.
5. **Guaranteed** — Contractual, not promotional.
6. **Certified** — Verified by an outside authority.
7. **Professional** — Distinguishes from DIY and driveway shops.
8. **Tested** — Proven under real conditions.
9. **Dialed** — Fine-tuned, in spec, running right.
10. **Rugged** — Built for abuse.
11. **Serious** — No toy trucks.
12. **Real** — Authentic, not staged.
13. **Outfit** — Verb — to equip for a purpose.
14. **Upgrade** — Clear improvement over baseline.
15. **Proven** — Track record, not claim.

### Words & Phrases to Avoid

**Banned superlatives:**
- "Premier," "Leading," "Best-in-class," "World-class," "Cutting-edge," "Industry-leading," "Top-rated" (unless verified and sourced), "#1 in [anything]"

**Banned corporate-speak:**
- "Solutions" (unless modifying a specific noun like "fleet solutions"), "Synergy," "Empower," "Unleash," "Partner with" (as verb — use "work with"), "Value proposition," "End-to-end" (overused and vague), "Turnkey" (fine in trade context, avoid in marketing copy)

**Banned filler:**
- "Awesome," "Amazing," "Game-changer," "Next-level," "Take it to the next level," "You deserve," "Treat yourself," "Unleash your inner off-roader"

**Banned hedging:**
- "May," "might," "could," "perhaps," "potentially," "We try to," "In most cases," "Typically," "Generally speaking"

**Banned punctuation & style:**
- Exclamation points in headlines (ever)
- Exclamation points in body copy (almost never — save for 1–2 per site max)
- Ellipses (`...`) as stylistic device
- All caps mid-sentence for emphasis
- Emoji in copy
- Rhetorical questions that sound like a sales letter ("Tired of cheap bedliners?")
- "Click here" as link text

**Banned tonal moves:**
- Addressing the customer as "buddy," "friend," or "pal"
- Faux-rugged slang ("let's roll," "buckle up," "strap in")
- Urgency manipulation ("Act now," "Limited time," "Don't miss out")
- Gendered appeals ("guys who know trucks")
- Nostalgia pandering ("back when trucks were built right")
- Competitor disparagement by name

**Rule of thumb:** If it sounds like a mall kiosk, a Fiverr tagline, or a monster-truck commercial, cut it. Rhino speaks the way a senior installer explains a build to a repeat customer — not the way a dealership salesman pitches a lease.

---

# PAGE: Homepage

**Template file:** `front-page.php`

## Section 1 — Hero

**Template part:** `template-parts/sections/section-hero.php`

- **Overline:** CUSTOM TRUCK & OFF-ROAD SHOP
- **H1:** BUILT FOR WHERE THE ROAD ENDS.
- **Subline:** Spray-on bedliners, protective coatings, off-road gear, and full upfitting — installed in-house by certified builders.
- **Proof snippet:** 12+ YEARS · 4,200+ INSTALLS · 4.9★ GOOGLE
- **CTA Primary:** Get a Quote →
- **CTA Secondary:** Explore Services ↓
- **Trust strip items:** LIFETIME WARRANTY · 4,200+ INSTALLS · CERTIFIED INSTALLERS · 4.9★ GOOGLE
- **Vehicle selector pills:** Trucks · Jeeps · SUVs · Fleet

**Alternate H1 options (held):**
1. OUTFIT. ARMOR. UPGRADE.
2. YOUR RIG. OUR SHOP. NO SHORTCUTS.
3. SERIOUS BUILDS. BACKED FOR LIFE.

**Customizer keys:**
- `bmg_hero_overline`
- `bmg_hero_headline`
- `bmg_hero_subline`
- `bmg_hero_cta_primary_text` / `bmg_hero_cta_primary_url`
- `bmg_hero_cta_secondary_text` / `bmg_hero_cta_secondary_url`
- `bmg_hero_trust_strip_items` (repeater — 4 items)
- `bmg_hero_background_image`
- `bmg_hero_vehicle_selector_enabled` (checkbox)

---

## Section 2 — Problem

**Template part:** `template-parts/sections/section-problem.php`

- **Overline:** THE WRONG BUILD COSTS YOU TWICE
- **H2:** CHEAP UPGRADES DON'T SURVIVE REAL WORK.
- **Intro:** Drop-in liners crack. Bolt-on parts rattle loose. DIY installs void factory warranty. We see it every week — and we've fixed it every way.

**Pain Block 1**
- Overline: `01 / RUST NEVER SLEEPS`
- Title: Factory undercoating fails fast.
- Body: Every salted road, wet jobsite, and winter rainstorm thins the thin coating your truck came with. By year three, rust is eating frame rails you can't see. By year five, it's structural.

**Pain Block 2**
- Overline: `02 / DROP-INS TRAP WATER`
- Title: Plastic liners rust your bed.
- Body: Bolt-in liners flex every time you load the bed. Water works underneath. You pull the liner out in year four and find a rusted truck bed you can't sell.

**Pain Block 3**
- Overline: `03 / DIY VOIDS WARRANTY`
- Title: Bad installs kill coverage.
- Body: Wrong torque. Cut harnesses. Drilled mounts in the wrong spot. Every one is a reason a manufacturer denies a warranty claim — and you pay out of pocket.

- **Bridge:** Do it once. Do it right. Do it here.
- **CTA:** See How We Build It →

---

## Section 3 — Founder / Shop

**Template part:** `template-parts/sections/section-founder.php`

- **Overline:** THE SHOP
- **H2:** RUN BY BUILDERS. NOT SALESPEOPLE.

**Paragraph 1:**
Rhino Custom Builds started in 2014 with one spray gun, a two-bay garage, and a beat-up F-150 that needed a bedliner. The liner held. Friends asked. Friends of friends asked. Twelve years later, we run three install bays, a full parts inventory built for trucks, and a team that only hires installers with manufacturer certifications on the products they touch.

**Paragraph 2:**
We don't subcontract. We don't outsource. Every coating, every bumper, every winch, every wiring harness — it all comes off our floor. If we installed it, we stand behind it. If we didn't, we'll still fix it. Walk into the shop any day and the person who'll work on your truck is the person who'll talk to you about it.

**Credential badges:**
- 12+ / YEARS IN BUSINESS
- 4,200+ / INSTALLS COMPLETED
- [CITY, ST] / LOCALLY OWNED

**Feature bullets (4):**
1. **Certified Installers** — Manufacturer-trained on every product we touch.
2. **OEM-Grade Parts** — Authorized dealer for ARB, Fox, Warn, Rigid, Method, and more.
3. **Lifetime Warranty** — Every spray-on coating backed for life. No asterisks.
4. **In-Bay Accountability** — Three install bays. One team. No subcontractors.

- **CTA:** Meet the Team →

**Customizer keys:**
- `bmg_founder_overline`
- `bmg_founder_headline`
- `bmg_founder_paragraph_1`
- `bmg_founder_paragraph_2`
- `bmg_founder_badges` (repeater — number + label)
- `bmg_founder_features` (repeater — title + body)
- `bmg_founder_image_main`
- `bmg_founder_image_collage_1`
- `bmg_founder_image_collage_2`

---

## Section 4 — Features

**Template part:** `template-parts/sections/section-features.php`

- **Overline:** WHAT WE BUILD
- **H2:** EVERYTHING YOUR RIG NEEDS. UNDER ONE ROOF.
- **Subline:** Six service lines. One shop. One warranty.

| # | Card Title | Body | Link |
|---|-----------|------|------|
| 1 | Spray-On Bedliners | Permanent coatings bonded to bare metal. Standard, Premium, and off-road-grade finishes — all lifetime warranty. | `/services/spray-on-bedliners/` |
| 2 | Protective Coatings | Undercoating, rocker panels, wheel wells, and frames sealed against rust, salt, and trail abuse. | `/services/protective-coatings/` |
| 3 | Truck Accessories | Tonneau covers, running boards, toolboxes, racks, tow packages — installed clean and torqued to spec. | `/services/truck-accessories/` |
| 4 | Off-Road & Overland | Lifts, bumpers, winches, armor, lighting, and full overland kits. Built to survive the trail. | `/services/off-road-overland/` |
| 5 | Fleet Services | Volume pricing, dedicated project management, scheduled install windows, Net-30 billing. | `/services/fleet/` |
| 6 | Shop Parts & Gear | Browse thousands of parts from the brands we install. Ship to your door or install in-bay. | `/shop/` |

- **CTA:** View All Services →

**Customizer keys:**
- `bmg_features_overline`
- `bmg_features_headline`
- `bmg_features_subline`
- `bmg_service_categories` (repeater — image, title, body, url)

---

## Section 5 — Proof

**Template part:** `template-parts/sections/section-proof.php`

- **Overline:** REAL BUILDS. REAL TRUCKS.
- **H2:** SEE THE WORK.
- **Subline:** Every project below came off our floor.

**Project Cards (3 featured — from `project` CPT):**

| # | Title | Vehicle | Service | Result |
|---|-------|---------|---------|--------|
| 1 | [Project 01 — Full Off-Road Build] | 2022 Ford F-250 Super Duty | Lift · Bumpers · Winch · Lighting · Bedliner | Trail-ready in 8 days |
| 2 | [Project 02 — Overland Build] | 2023 Jeep Gladiator Rubicon | Roof Tent · Armor · Recovery Kit · Coatings | 3,000-mile expedition tested |
| 3 | [Project 03 — Work Truck Upfit] | 2021 RAM 1500 | Spray-On Bedliner · Tonneau · Running Boards · Toolbox | Delivered in 2 days |

- **CTA under grid:** View the Full Gallery →

**Testimonials (3):**

> "Dropped off my F-150 on a Monday, picked it up Wednesday with a spray liner that's held up through two winters of hauling firewood. You can tell it's bonded — no flex, no cracks, no trapped water."
> — MIKE R. · 2022 F-150 · BEDLINER

> "Rhino built out my Gladiator for a 3,000-mile overland trip. Bumper, winch, lights, recovery, the whole kit. Clean wiring, no rattles, every bolt torqued. The difference between a shop build and a driveway build is obvious."
> — JEN K. · 2023 GLADIATOR · OVERLAND

> "We run 14 service trucks. Rhino coats every new one on intake and refreshes the old ones on a rotation we scheduled with them. Net-30 billing, one invoice per cycle, no downtime surprises."
> — CARLOS D. · FLEET MANAGER · 14 TRUCKS

**Stats (4):**

| Number | Label |
|--------|-------|
| 4,200+ | INSTALLS COMPLETED |
| 12 YRS | IN BUSINESS |
| 4.9★ | GOOGLE RATING |
| LIFETIME | COATING WARRANTY |

**Brand Logos (marquee, 10):**
ARB · Fox · Warn · Rigid Industries · Method Race Wheels · BFGoodrich · Rough Country · Baja Designs · Smittybilt · Rhino-Rack

- **CTA (below logos):** See More Builds →

**Customizer keys:**
- `bmg_proof_overline`
- `bmg_proof_headline`
- `bmg_proof_subline`
- `bmg_proof_featured_projects` (relationship field — 3 projects)
- `bmg_testimonials` (repeater — quote, name, vehicle, service)
- `bmg_stats` (repeater — number, label)
- `bmg_brand_logos` (repeater — logo image, name)

---

## Section 6 — Process + FAQ

**Template part:** `template-parts/sections/section-process.php` (with integrated `section-faq.php`)

- **Overline:** HOW IT WORKS
- **H2:** FROM QUOTE TO ROAD-READY IN 4 STEPS.

**4 Process Steps:**

| Step | Title | Body |
|------|-------|------|
| 01 | Quote | Tell us your vehicle and what you want done. We send a detailed written quote back within one business day. |
| 02 | Consultation | Drop in for a walk-around or send photos. We spec the build, confirm parts and fitment, and lock in a date. |
| 03 | Install | Your rig comes into our bay. Certified installers handle every step. You get progress photos along the way. |
| 04 | Road Test | We test-drive every build before pickup. You get a dialed truck, full documentation, and warranty registration. |

**FAQ (8 general questions):**

1. **How much does a typical build cost?**
   It depends on the vehicle and the scope. Spray-on bedliners start under $600. Accessory installs range from $300 to $3,000+ depending on parts. Full off-road builds can run $8,000–$25,000+. Every quote is free, written, and itemized — no surprises.

2. **How long will my truck be in the shop?**
   Most bedliner installs are a single day. Accessory work is one to three days. Full builds run one to two weeks depending on parts availability. We give you a firm timeline with your quote and update you if anything shifts.

3. **What vehicles do you work on?**
   Any truck, Jeep, SUV, or van — domestic or import, any year. We specialize in Ford, GM, RAM, Toyota, Jeep, and Nissan, but we work on everything.

4. **Do you warranty your work?**
   Every spray-on coating carries a lifetime warranty against peeling, cracking, and bubbling. Parts are covered under manufacturer warranty, and we handle any claims on your behalf. Installation labor is warrantied for one year.

5. **Do you offer financing?**
   Yes. We partner with a national financing provider for builds over $1,500. Application takes five minutes and most approvals come back instantly. See our financing page for details.

6. **Where do your parts come from?**
   We're an authorized dealer for ARB, Fox, Warn, Rigid, Method, Baja Designs, Smittybilt, Rough Country, and more. Every part is OEM-grade, sourced direct from the manufacturer — no gray market, no knock-offs.

7. **How do I book an install?**
   Start with the quote form on this site. A builder reviews your request within one business day, confirms parts and pricing, and schedules your install date. You can also call or stop by the shop to book directly.

8. **Can I walk in or do I need an appointment?**
   Walk-ins welcome for quotes and questions — we love talking trucks. Installs require scheduling so we can have your parts on-site and an install bay reserved.

---

## Section 7 — CTA

**Template part:** `template-parts/sections/section-cta.php`

- **Overline:** READY WHEN YOU ARE
- **H2:** BUILD IT RIGHT. BUILD IT HERE.
- **Subline:** Free quotes. No pressure. Lifetime warranty on every coating.
- **CTA Primary:** Get a Quote →
- **Phone fallback:** or call (555) 555-0123
- **Microcopy:** Free quote. No obligation. Same-week availability on most installs.
- **Hours reminder:** Open Mon–Fri 7AM–6PM · Sat 8AM–2PM

**Customizer keys:**
- `bmg_cta_overline`
- `bmg_cta_headline`
- `bmg_cta_subline`
- `bmg_cta_microcopy`
- `bmg_cta_button_text` / `bmg_cta_button_url`

---

# PAGE: Spray-On Bedliners

**Template file:** `page-service-detail.php` (service detail template, bedliner variant)

## Section — Service Hero

**Template part:** `section-service-hero.php`

- **Label:** SPRAY-ON BEDLINERS
- **H1:** BONDED. PERMANENT. BACKED FOR LIFE.
- **Subline:** Professional-grade polyurethane coating sprayed directly to bare metal. No drop-ins. No cracks. No trapped moisture.
- **CTA Primary:** Get a Quote →
- **CTA Secondary:** Call (555) 555-0123
- **Trust Strip:** LIFETIME WARRANTY · CERTIFIED INSTALLERS · 1-DAY TURNAROUND

## Section — Problem

- **Label:** WHY DROP-INS FAIL
- **H2:** PLASTIC LINERS HIDE DAMAGE. SPRAY-ON PREVENTS IT.

- `01 / Trapped Moisture` — Drop-ins flex. Water gets underneath. Rust spreads invisibly.
- `02 / Slipping Cargo` — Smooth plastic offers zero grip. Your load shifts every corner.
- `03 / Cracked & Faded` — UV and abrasion break down plastic liners in 2–3 years.

## Section — Features (Coating Tiers)

- **Label:** CHOOSE YOUR COATING
- **H2:** THREE TIERS. ONE STANDARD.

| Tier | Best For | Highlights |
|------|----------|------------|
| **STANDARD** | Daily drivers, light loads | UV-stable · Textured grip · 1-day install · Lifetime warranty |
| **PREMIUM** | Work trucks, heavy use | Thicker build · High-impact resistant · Chemical-resistant · Lifetime warranty |
| **OFF-ROAD GRADE** | Overlanding, extreme use | Maximum thickness · Anti-slip aggressive texture · Color-matched options · Lifetime warranty |

## Section — Before/After

**Template part:** `section-before-after.php`

- **Label:** SEE THE DIFFERENCE
- **H2:** BEFORE. AFTER. PERMANENT.
- **Body:** Drag the slider on any project below.

## Section — Process

- **Label:** OUR INSTALL PROCESS
- **H2:** ONE DAY. FOUR STEPS. DIALED.

- `01` — **Prep & Mask** — Bed cleaned, sanded, degreased. Every edge masked with precision.
- `02` — **Surface Bond** — Bare metal primed for chemical bond. No shortcuts, no skipped panels.
- `03` — **Spray Application** — Multi-pass spray in a controlled bay. Consistent thickness, consistent texture.
- `04` — **Cure & QC** — Full cure, edge inspection, photo documentation, warranty registration.

## Section — Pricing

**Template part:** `section-pricing-starting.php`

- **Label:** STARTING AT
- **H2:** STRAIGHTFORWARD PRICING.

| Bed Size | Standard | Premium | Off-Road |
|----------|----------|---------|----------|
| 5.5' Short Bed | $[TBD] | $[TBD] | $[TBD] |
| 6.5' Standard | $[TBD] | $[TBD] | $[TBD] |
| 8' Long Bed | $[TBD] | $[TBD] | $[TBD] |
| Cargo Van / Custom | Quote | Quote | Quote |

- **Microcopy:** Final pricing depends on prep condition and coverage area. Free written quotes — no obligation.

## Section — Proof

Stat strip + 3 testimonials specific to bedliners. `[TESTIMONIAL CONTENT TBD — source from existing customers]`

## Section — FAQ (8 Questions)

1. **How long does a spray-on bedliner take to install?**
   Most installs are done in a single day. You drop off in the morning and pick up in the afternoon after full cure.

2. **What's the warranty?**
   Lifetime. If it peels, cracks, or bubbles — ever — we re-coat it at no charge.

3. **Can I drive my truck right after?**
   Yes. Coatings are cured before you pick up. Load the bed the same day.

4. **How thick is the coating?**
   Standard is ~1/8". Premium runs ~3/16". Off-road grade builds heavier with aggressive texture.

5. **Can you color-match my truck?**
   Yes — we offer custom color matching on Premium and Off-Road Grade tiers. Black is standard.

6. **Will UV break down the finish?**
   No. Our coatings are UV-stable and formulated to hold color and texture for the life of the vehicle.

7. **What if I trade in the truck later?**
   A professional spray-on liner typically adds resale value. We provide documentation you can show the dealer.

8. **Do I need to do anything before I bring it in?**
   Just clean out the bed. We handle every surface prep step ourselves.

## Section — CTA

- **H2:** STOP PUTTING IT OFF.
- **Subline:** One day. Lifetime warranty. Done.
- **CTA:** Get a Quote → / Call (555) 555-0123

---

# PAGE: Protective Coatings

**Template file:** `page-service-detail.php` (coatings variant)

## Section — Service Hero

- **Label:** PROTECTIVE COATINGS
- **H1:** STOP RUST BEFORE IT STARTS.
- **Subline:** Undercoating, rocker panels, frames, and wheel wells sealed with the same professional-grade polyurea we spray on beds.
- **CTA:** Get a Quote → / Call Us

## Section — Problem

- **H2:** EVERY SALTED ROAD IS A TAX ON YOUR TRUCK.

- `01 / Salt & Brine` — Winter deicer chemicals accelerate corrosion faster than any factory undercoating can handle.
- `02 / Factory Coatings Wear Out` — OEM protection is a minimum, not a maximum. It wears through in 2–4 years.
- `03 / Hidden Damage` — Rust spreads inside frame rails and behind panels where you can't see it until it's structural.

## Section — Features (Coverage Areas)

- **H2:** FULL COVERAGE. NO SHORTCUTS.

- **Undercoating** — frame rails, floor pans, inner fenders
- **Rocker Panels** — high-impact zones sealed
- **Wheel Wells** — sprayed inside and out
- **Frame Protection** — bare-metal bond on new builds
- **Fleet Rotation Programs** — scheduled re-applications

## Section — Process

4-step, similar format to bedliner process. `[STEP CONTENT TBD — adapt bedliner process for coatings]`

## Section — Proof

Stats + 2 consumer testimonials + 1 fleet testimonial. `[TESTIMONIAL CONTENT TBD]`

## Section — FAQ

8 questions focused on rust chemistry, reapplication, and fleet rotation. `[FAQ CONTENT TBD]`

## Section — CTA

`[CTA CONTENT TBD — match bedliner CTA pattern, adapted for coatings]`

---

# PAGE: Truck Accessories & Upfitting

**Template file:** `page-service-detail.php` (accessories variant)

## Section — Service Hero

- **Label:** TRUCK ACCESSORIES & UPFITTING
- **H1:** OUTFIT YOUR WORK TRUCK.
- **Subline:** Tonneau covers, running boards, toolboxes, headache racks, tow packages — installed clean, wired right, torqued to spec.
- **CTA:** Get a Quote →

## Section — Vehicle Type Selector

Pill group filtering featured accessories by vehicle.

## Section — Features Grid

6 product categories with Shop cross-sell links. `[CATEGORY CONTENT TBD — source from WooCommerce categories]`

## Section — Installation Callout

- **Label:** WHY PROFESSIONAL INSTALL MATTERS
- **Body:** Drilled holes in the wrong spot ruin panels. Cut harnesses void warranties. Over-torqued bolts crack aluminum. We do it right the first time.

## Section — Project Gallery

Filtered to work trucks from `project` CPT.

## Section — FAQ

6 questions. `[FAQ CONTENT TBD]`

## Section — CTA

`[CTA CONTENT TBD]`

---

# PAGE: Off-Road & Overland

**Template file:** `page-service-detail.php` (off-road variant)

## Section — Service Hero

- **Label:** OFF-ROAD & OVERLAND
- **H1:** BUILT FOR WHERE THE ROAD ENDS.
- **Subline:** Lifts, bumpers, winches, armor, recovery gear, and full overland kits. Assembled by builders who run the same gear.
- **CTA:** Get a Quote → / Explore Builds ↓

## Section — Capability Selector

**Template part:** `section-capability-selector.php`

- **Label:** PICK YOUR CAPABILITY

- **Mild** — Daily driver + weekend trails
- **Moderate** — Overlanding, forest roads, recovery-ready
- **Extreme** — Rock crawling, expedition builds

## Section — Features Grid

Lifts · Bumpers & Armor · Winches & Recovery · Lighting · Wheels & Tires · Overland Kit · Roof Racks & Tents · Suspension Tuning

## Section — Project Gallery

Filtered to off-road projects from `project` CPT.

## Section — Brand Logo Carousel

**Template part:** `section-brand-carousel.php`

ARB · Fox · Warn · Rigid Industries · Method Race Wheels · BFGoodrich · Rough Country · Baja Designs · Smittybilt · Rhino-Rack

## Section — Testimonials

3 off-road specific testimonials. `[TESTIMONIAL CONTENT TBD]`

## Section — FAQ

8 questions covering lift legality, warranty, tire sizing, daily drivability, weight distribution, shipping parts, install time, and financing. `[FAQ CONTENT TBD]`

## Section — CTA

`[CTA CONTENT TBD]`

---

# PAGE: Fleet Services

**Template file:** `page-service-detail.php` (fleet B2B variant)

## Section — Service Hero

- **Label:** FLEET SERVICES
- **H1:** BUILT FOR THE JOB. BACKED BY WARRANTY.
- **Subline:** Volume pricing. Dedicated project management. Scheduled install windows. Net-30 billing. One shop for every truck in your fleet.
- **CTA Primary:** Request Fleet Quote →
- **CTA Secondary:** Call Fleet Line: (555) 555-0199

## Section — Problem

- **H2:** DOWNTIME IS THE REAL COST.

- `01 / Inconsistent Quality` — Different shops, different standards. Your fleet shouldn't look like ten different trucks.
- `02 / Unpredictable Scheduling` — Every day a truck is out of service is a day it isn't billing.
- `03 / Buried Invoicing` — Separate invoices, different terms, no accountability.

## Section — Capabilities Matrix

- **H2:** BUILT FOR FLEETS FROM 5 TO 500.

| Capability | Standard | Fleet Program |
|-----------|----------|---------------|
| Volume Pricing | — | ✓ |
| Dedicated Project Manager | — | ✓ |
| Scheduled Install Windows | — | ✓ |
| Consolidated Invoicing | — | ✓ |
| Net-30 Billing | — | ✓ |
| Lifetime Coating Warranty | ✓ | ✓ |
| OEM-Compliant Installs | ✓ | ✓ |

## Section — Services Offered

Bedliners · Undercoating · Rocker Protection · Upfitting · Scheduled Maintenance · Multi-Vehicle Consistency Programs

## Section — Case Study

- **Label:** FLEET CASE STUDY
- **H2:** 14 TRUCKS. ONE ROTATION. ZERO SURPRISES.
- **Body:** [Fleet client] runs 14 service trucks across [region]. We coat every new truck on intake and rotate the older fleet through refresh cycles scheduled two weeks in advance. One project manager, one invoice per cycle, documented coverage on every unit.
- **Outcome:** Consistent fleet appearance. Zero downtime surprises. Net-30 terms.

**Customizer key:** `bmg_fleet_case_study` (group — title, body, outcome, image)

## Section — Stats Strip

1,800+ TRUCKS SERVICED · 24 HRS AVG TURNAROUND · 47 ACTIVE FLEET ACCOUNTS · NET 30 BILLING TERMS

## Section — Fleet Inquiry Card

**Template part:** `section-fleet-inquiry.php`

- **Label:** START A FLEET CONVERSATION
- **Body:** Tell us about your fleet. A dedicated PM will follow up within one business day with pricing and scheduling.
- **CTA:** Request Fleet Quote → / Phone: (555) 555-0199

## Section — FAQ

6 questions with B2B focus (insurance, terms, scheduling, COI requirements). `[FAQ CONTENT TBD]`

---

# PAGE: About

**Template file:** `page-about.php`

## Section — Page Header

- **Label:** ABOUT RHINO
- **H1:** WE BUILD THE TRUCKS WE'D DRIVE.

## Section — Founder Story

**Paragraph 1:**
Rhino Custom Builds started in 2014 with one spray gun, a two-bay garage, and a beat-up F-150 that needed a bedliner. The liner held. Friends asked. Friends of friends asked. Twelve years later, we run three bays, a dedicated parts program, and a team that only hires installers with manufacturer certifications on the products they touch.

**Paragraph 2:**
We didn't get here by outsourcing. Every coating, every bumper, every winch, every wiring harness — it all comes off our floor. If we installed it, we stand behind it. If we didn't, we'll fix it anyway.

## Section — Shop Tour

Image gallery of the shop floor, bays, and team. `[IMAGE CONTENT TBD]`

## Section — Credentials

- Manufacturer-certified coating installers
- Authorized dealer: ARB · Fox · Warn · Rigid · Method · BFGoodrich · Rough Country
- Fully insured + bonded
- Fleet-qualified / W-9 on file
- BBB Accredited

## Section — Stats

Shared with homepage proof stats.

## Section — CTA

Same pattern as homepage CTA section.

---

# PAGE: Contact

**Template file:** `page-contact.php`

- **Label:** CONTACT
- **H1:** STOP BY. CALL. OR SEND IT.
- **Subline:** Open six days a week. Free quotes. No pressure.

## Info Block

- [Street Address]
- [City, ST ZIP]
- **(555) 555-0123** — General
- **(555) 555-0199** — Fleet
- `hello@rhinocustombuilds.com`
- Hours: Mon–Fri 7AM–6PM · Sat 8AM–2PM · Sun Closed

## Short Contact Form

Fields: Name · Email · Phone · Vehicle · Message · Submit

---

# PAGE: Request a Quote

**Template file:** `page-quote.php`

- **Label:** REQUEST A QUOTE
- **H1:** GET A REAL NUMBER. FAST.
- **Subline:** Three steps. One business day. Free and no-obligation.

## Multi-Step Form Structure

**Step 1 — Your Vehicle**
- Year
- Make
- Model
- Trim
- VIN (optional)

**Step 2 — What You Want**
- Service category (select)
  → Specific services (multi-select)
- Notes (textarea)

**Step 3 — Your Info**
- Name
- Phone
- Email
- Preferred contact method
- Preferred drop-off window

## Post-Submit "What Happens Next"

1. We review your request within one business day.
2. A builder calls or emails with a detailed written quote.
3. Schedule your install — free reschedule up to 24 hours before.

---

# PAGE: Services Hub

**Template file:** `page-services-hub.php`

`[CONTENT TBD — write before building this page]`

Structure: Gateway page linking to all 5 service lines. Hero + filterable vehicle type selector + service category grid (5 large cards) + cross-sell to shop.

---

# PAGE: Gallery

**Template file:** `page-gallery.php`

`[CONTENT TBD — write before building this page]`

Structure: Filterable grid of projects from the `project` CPT. Filters: `vehicle_type`, `project_category`, `capability_level`. Uses Project Card component. Links to single project pages (`single-project.php`).

---

# PAGE: FAQ (standalone)

**Template file:** `page-faq.php`

`[CONTENT TBD — write before building this page. Expand the homepage 8-question FAQ and add categories: General, Bedliners, Coatings, Accessories, Off-Road, Fleet, Financing, Warranty.]`

---

# PAGE: Financing

**Template file:** `page-financing.php` (uses shared `page-standard.php` layout)

`[CONTENT TBD — write before building this page]`

Structure: Payment partner info, how to apply, monthly payment examples.

---

# PAGE: Warranty

**Template file:** `page-warranty.php` (uses shared `page-standard.php` layout)

`[CONTENT TBD — write before building this page]`

Structure: Coverage details, how to file a claim, lifetime coating warranty terms.

---

# PAGE: Blog

**Template files:** `home.php`, `single.php`, `archive.php`

`[CONTENT TBD — V1.5 scope]`

Structure: Build guides, product education, install spotlights. Warm white header (editorial feel).

---

# PAGE: Privacy Policy

**Template file:** `page-privacy.php`

`[CONTENT TBD — standard privacy policy, adapted from starter template]`

---

# PAGE: Terms of Use

**Template file:** `page-terms.php`

`[CONTENT TBD — standard terms of use]`

---

# Footer

**Template file:** `footer.php`

## Column 1 — Identity

- Logo (white on dark)
- Rhino Custom Builds
- [Street Address]
- [City, ST ZIP]
- (555) 555-0123 (general)
- (555) 555-0199 (fleet)
- `hello@rhinocustombuilds.com`
- ★★★★★ 4.9 Google Rating

## Column 2 — Services

- Spray-On Bedliners
- Protective Coatings
- Truck Accessories
- Off-Road & Overland
- Fleet Services
- Custom Builds
- Shop Parts & Gear

## Column 3 — Company

- About
- Gallery
- Blog
- FAQ
- Financing
- Warranty
- Contact
- Request a Quote

## Column 4 — Hours

- Mon–Fri: 7AM – 6PM
- Saturday: 8AM – 2PM
- Sunday: Closed
- [Map thumbnail →]

## Bottom Bar

© 2026 Rhino Custom Builds · Privacy Policy · Terms of Use

**Styling notes:** Dark background (`$brand-dark-lighter`). Column headings in JetBrains Mono uppercase. Links in Barlow 400 with hover to red.

---

# Dynamic Variables (Customizer)

All business data managed via Customizer > Business Information (`inc/customizer-practice-info.php`). Keep the `bmg_` prefix.

| Key | Type | Value |
|-----|------|-------|
| `bmg_phone` | text | (555) 555-0123 |
| `bmg_phone_fleet` | text | (555) 555-0199 |
| `bmg_email` | email | hello@rhinocustombuilds.com (public-facing display email) |
| `bmg_address_street` | text | [Street Address TBD] |
| `bmg_address_city` | text | [City, ST ZIP TBD] |
| `bmg_office_hours` | textarea | Mon–Fri 7AM – 6PM |
| `bmg_office_hours_sat` | text | Saturday 8AM – 2PM |
| `bmg_office_hours_sun` | text | Sunday Closed |
| `bmg_years_in_business` | number | 12 |
| `bmg_installs_completed` | number | 4200 |
| `bmg_google_rating` | text | 4.9★ |
| `bmg_bbb_url` | URL | [BBB profile URL TBD] |

The footer uses these `bmg_*` keys directly. Legacy `footer_*` keys from `customizer-footer.php` are not used on this project.

> **Note:** All `bmg_*` keys, CSS classes, and PHP variable/function names retain the `bmg` prefix by convention. Do not rename them.
