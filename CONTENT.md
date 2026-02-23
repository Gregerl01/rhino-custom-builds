# GSL Starter Theme — Content Blueprint

**Document type:** Placeholder content architecture, mapped to template files
**Brand voice:** Calm, Confident, Professional, Clear, Restrained
**Target audience:** [Define target audience — demographics, location, psychographics]
**Conversion goal:** [Define primary conversion action — e.g., enrollment, booking, purchase]
**Physician:** [Provider Name], [Provider Credentials]

---

### Brand Voice Quick Reference

**Personality:** [Define 5-7 brand personality traits — e.g., calm, confident, grounded, warm, trustworthy, refined]
**Voice:** [Define voice characteristics — e.g., clear and conversational, empathetic, educational, reassuring]
**Messaging pillars:** [Define 3-5 messaging pillars — the core value propositions the brand communicates]
**Emphasize:** [List 5-8 words/concepts to lean into across all copy]
**Avoid:** [List words/concepts to avoid — superlatives, urgency tactics, specific banned phrases]

---
---

## DYNAMIC VARIABLES — `inc/customizer-practice-info.php`

All reusable practice information is stored in WordPress Customizer under a "Practice Information" panel. Templates pull values with `get_theme_mod()`. The second argument is the fallback shown until the field is updated in the Customizer.

### Implementation

**Register in:** `inc/customizer-practice-info.php`
**Include from:** `functions.php` — `require get_stylesheet_directory() . '/inc/customizer-practice-info.php';`
**Customizer panel:** "Practice Information" (`bmg_practice_info`)
**Customizer sections within panel:**
- Physician (`bmg_section_physician`)
- Contact (`bmg_section_contact`)
- Hours (`bmg_section_hours`)

### Variable Reference

| Theme Mod Key | Default Value | Used In |
|---|---|---|
| `bmg_physician_name` | `[Provider Name]` | Physician Preview, Physician Bio, About, FAQ, CTA |
| `bmg_physician_last_name` | `[Provider Last Name]` | FAQ, Contact after-hours note, throughout |
| `bmg_physician_credentials` | `[Provider Credentials]` | Physician Preview, Physician Bio, About |
| `bmg_physician_specialty` | `[Specialty]` | Physician Bio |
| `bmg_physician_bio_short` | *(see Section 1.5)* | Physician Preview (homepage) |
| `bmg_physician_bio_full` | *(see Section 2.3)* | Physician Bio (About page) |
| `bmg_physician_med_school` | `[Medical School]` | Physician Bio credentials sidebar |
| `bmg_physician_residency` | `[Residency Program]` | Physician Bio credentials sidebar |
| `bmg_physician_fellowship` | *(empty string — hidden if blank)* | Physician Bio credentials sidebar |
| `bmg_physician_board_cert` | `[Board Certification]` | Physician Bio credentials sidebar |
| `bmg_physician_memberships` | `[Professional Organizations]` | Physician Bio credentials sidebar |
| `bmg_physician_years` | `10` | Physician Preview, Physician Bio |
| `bmg_phone` | `(000) 000-0000` | CTA, Contact, Footer, FAQ, forms |
| `bmg_email` | `info@example.com` | Contact, Footer, Privacy Policy |
| `bmg_address_street` | `[Street Address]` | Contact, Footer, Privacy Policy |
| `bmg_address_city` | `[City, State ZIP]` | Contact, Footer, Privacy Policy |
| `bmg_office_hours` | `Monday – Friday: 8:00 AM – 5:00 PM` | Contact, Footer |
| `bmg_office_hours_sat` | `By appointment` | Contact, Footer |
| `bmg_office_hours_sun` | `Closed` | Contact, Footer |
| `bmg_privacy_effective_date` | `[Effective Date]` | Privacy Policy |

### Template Usage

```php
<?php echo esc_html( get_theme_mod( 'bmg_physician_name', '[Provider Name]' ) ); ?>
<?php echo esc_html( get_theme_mod( 'bmg_phone', '(000) 000-0000' ) ); ?>
```

For conditional display (e.g., fellowship field that may not apply):

```php
<?php
$fellowship = get_theme_mod( 'bmg_physician_fellowship', '' );
if ( ! empty( $fellowship ) ) : ?>
    <li>Fellowship: <?php echo esc_html( $fellowship ); ?></li>
<?php endif; ?>
```

### Claude Code Instructions

When implementing content from this document into templates:
1. Never hardcode physician name, phone, email, address, or credentials
2. Always use `get_theme_mod( 'bmg_[key]', '[fallback]' )` with the keys above
3. Always wrap output in `esc_html()` or `esc_attr()` as appropriate
4. Use the exact fallback strings from the table above so placeholders are consistent
5. Build `inc/customizer-practice-info.php` first, before populating templates

---
---

## 1. HOMEPAGE — `front-page.php`

Seven sections loaded in order. Each maps to a template partial.

---

### 1.1 Hero — `section-hero.php`

**H1 Headline** (6 words, ~40 chars)
> [Headline placeholder — primary value proposition, 6 words max]

**Subhead** (~90 chars)
> [Subhead placeholder — expand on headline, ~90 chars, one sentence]

**Primary CTA Button**
> [Primary CTA label — action-oriented, links to plans or services]

**Secondary CTA (optional)**
> [Secondary CTA label — links to explainer or about section]

**Design notes:** Full-viewport background. Animated headline on load. Off-white text on dark overlay. Both CTAs use ghost-button style (outlined, not filled) per brand restraint.

---

### 1.2 Explainer — `section-explainer.php`

**H2 Headline** (~50 chars)
> [Section 1.2 — headline describing the industry/service type differentiator]

**Body Copy** (~130 words)
> [Section 1.2a — first paragraph: describe the problem with the traditional/conventional model in the industry. ~45 words]

> [Section 1.2b — second paragraph: describe how the alternative model (your service) corrects the problem. ~45 words]

> [Section 1.2c — third paragraph: connect to [Business Name] and [Provider Name] specifically. State the founding conviction and what every membership/service is designed around. ~45 words]

**Design notes:** Light section. Content-width container (680px max). No icons or imagery — copy does the work here.

---

### 1.3 Value Pillars — `section-pillars.php`

**H2 Headline** (~35 chars)
> [Section 1.3 — headline describing what membership/service provides]

**Pillar 1 — [Pillar 1 Name]**
Icon: [Icon description]
**H3:** [Pillar 1 heading — ~3 words]
**Body** (~30 words): [Pillar 1 body — describe the first key benefit of membership/service. ~30 words]

**Pillar 2 — [Pillar 2 Name]**
Icon: [Icon description]
**H3:** [Pillar 2 heading — ~3 words]
**Body** (~30 words): [Pillar 2 body — describe the second key benefit. ~30 words]

**Pillar 3 — [Pillar 3 Name]**
Icon: [Icon description]
**H3:** [Pillar 3 heading — ~3 words]
**Body** (~30 words): [Pillar 3 body — describe the third key benefit. ~30 words]

**Pillar 4 — [Pillar 4 Name]**
Icon: [Icon description]
**H3:** [Pillar 4 heading — ~3 words]
**Body** (~30 words): [Pillar 4 body — describe the fourth key benefit. ~30 words]

**Design notes:** Dark section (Obsidian background). 4-column grid on desktop, 2x2 on tablet, stacked on mobile. Icons in Brushed Silver. H3s in Cormorant Garamond, body in Montserrat.

---

### 1.4 Plans Overview — `section-plans-overview.php`

**H2 Headline** (~30 chars)
> [Section 1.4 — headline for plan/pricing tiers]

**H2 Subhead** (~65 chars)
> [Section 1.4 subhead — briefly describe the tiers and what differentiates them]

---

**[PLAN TIER 1]**
**H3:** [Plan Tier 1]
**Tagline** (~40 chars): [Plan Tier 1 tagline — who this tier is for]
**Features:**
- [Plan Tier 1 feature 1]
- [Plan Tier 1 feature 2]
- [Plan Tier 1 feature 3]
- [Plan Tier 1 feature 4]
- [Plan Tier 1 feature 5]

**CTA:** View Plan Details

---

**[PLAN TIER 2]** (featured/recommended)
**H3:** [Plan Tier 2]
**Tagline** (~45 chars): [Plan Tier 2 tagline — who this tier is for]
**Features:**
- Everything in [Plan Tier 1], plus:
- [Plan Tier 2 feature 1]
- [Plan Tier 2 feature 2]
- [Plan Tier 2 feature 3]
- [Plan Tier 2 feature 4]
- [Plan Tier 2 feature 5]

**CTA:** View Plan Details

---

**[PLAN TIER 3]**
**H3:** [Plan Tier 3]
**Tagline** (~50 chars): [Plan Tier 3 tagline — who this tier is for]
**Features:**
- Everything in [Plan Tier 2], plus:
- [Plan Tier 3 feature 1]
- [Plan Tier 3 feature 2]
- [Plan Tier 3 feature 3]
- [Plan Tier 3 feature 4]
- [Plan Tier 3 feature 5]
- [Plan Tier 3 feature 6]

**CTA:** View Plan Details

**Section CTA:**
> [Section 1.4 CTA — prompt for undecided visitors to schedule a consultation. Include link and no-obligation note.]

**Design notes:** Light section. Three equal-width cards. [Plan Tier 2] card elevated (subtle shadow or border-top in Brushed Silver). Pricing TBD — display as "Contact for Pricing" until client provides.

---

### 1.5 Physician Preview — `section-physician-preview.php`

**H2 Headline** (~30 chars)
> [Section 1.5 — headline introducing the provider, e.g., "Your Physician"]

**Body Copy** (~80 words)
> [Section 1.5a — first paragraph: introduce [Provider Name] with credentials, experience, and founding story. ~40 words]

> [Section 1.5b — second paragraph: describe practice approach in [City, State] — limited panel, extended appointments, personal accessibility. ~40 words]

**CTA:**
> [Section 1.5 CTA — link to full profile, e.g., "Read Full Profile"]

**Design notes:** Two-column layout. Portrait photo left, copy right. Dark section with light text. Photo placeholder until client provides.

---

### 1.6 FAQ Preview — `section-faq-preview.php`

**H2 Headline** (~35 chars)
> [Section 1.6 — headline, e.g., "Common Questions"]

Display 4 questions from the full FAQ set (accordion style):

**Q1:** [FAQ question 1 — about the industry/service type and how it differs from conventional]
**Q2:** [FAQ question 2 — about insurance/payment coordination]
**Q3:** [FAQ question 3 — about access/availability to the provider]
**Q4:** [FAQ question 4 — about specialist/referral coordination]

(Full answers provided in Section 7: FAQ Page below.)

**CTA:**
> [Section 1.6 CTA — link to full FAQ page, e.g., "View All Questions"]

**Design notes:** Light section. Accordion UI — one item open by default. Consistent with Bootstrap 5 accordion component.

---

### 1.7 CTA — `section-cta.php`

**H2 Headline** (~40 chars)
> [Section 1.7 — headline prompting consultation/contact]

**Body** (~30 words)
> [Section 1.7 body — invite the visitor to schedule a consultation, describe what happens, emphasize no obligation. ~30 words]

**Primary CTA:**
> [Primary CTA label — e.g., "Schedule a Consultation"]

**Secondary CTA:**
> Call `bmg_phone`

**Design notes:** Dark section (Deep Charcoal). Centered text. Generous vertical padding (128px desktop). CTA buttons in Brushed Silver outline.

---
---

## 2. ABOUT PAGE — `page-templates/page-about.php`

Uses `section-physician.php` for the full bio section.

---

### 2.1 Hero / Intro

**H1 Headline** (~45 chars)
> [Section 2.1 — headline conveying the practice philosophy]

**Body** (~60 words)
> [Section 2.1 body — describe why [Business Name] exists, the problem it solves, and how [Provider Name] built the practice to deliver the kind of care they believe in. ~60 words]

---

### 2.2 Philosophy — [Provider Name]'s Approach

**H2 Headline** (~30 chars)
> [Section 2.2 — headline, e.g., "A Philosophy of Care"]

**Body** (~200 words)
> [Section 2.2a — first paragraph: [Provider Name]'s background, origin story, and path to the profession. ~80 words]

> [Section 2.2b — second paragraph: describe the structural limitations of the conventional model in the industry that [Provider Name] experienced. ~60 words]

> [Section 2.2c — third paragraph: the personal turning point or conviction that led to founding the practice. ~30 words]

> [Section 2.2d — fourth paragraph: describe what [Business Name] is — the result of that conviction. State the practice model and core beliefs. ~30 words]

---

### 2.3 Full Physician Bio — `section-physician.php`

**H2 Headline**
> [Provider Name], `bmg_physician_credentials`

**Bio** (~160 words)
> [Section 2.3a — first paragraph: introduce [Provider Name] with credentials and experience summary. ~25 words]

> [Section 2.3b — second paragraph: education at `bmg_physician_med_school` and residency at `bmg_physician_residency`, career path before founding [Business Name] in [City, State]. ~30 words]

> [Section 2.3c — third paragraph: describe the transition to the current practice model and why it was deliberate. ~40 words]

> [Section 2.3d — fourth paragraph: describe what [Provider Name] does at [Business Name] — limited panel, extended appointments, personal accessibility, clinical approach. ~40 words]

> [Section 2.3e — fifth paragraph: personal detail about [Provider Name] outside of practice. ~20 words]

**Credentials sidebar (dynamic, conditional display):**
- Board Certification: `bmg_physician_board_cert`
- Medical School: `bmg_physician_med_school`
- Residency: `bmg_physician_residency`
- Fellowship: `bmg_physician_fellowship` *(hidden if empty)*
- Professional Memberships: `bmg_physician_memberships`

---

### 2.4 CTA

Reuse homepage CTA section content (section-cta.php).

---
---

## 3. PLANS PAGE — `page-templates/page-plans.php`

Uses `section-plans-comparison.php` for the detailed comparison.

---

### 3.1 Hero / Intro

**H1 Headline** (~35 chars)
> [Section 3.1 — headline, e.g., "Membership Plans"]

**Body** (~50 words)
> [Section 3.1 body — describe what all tiers include, what differentiates them, and the principles they are structured around. ~50 words]

---

### 3.2 Comparison Table — `section-plans-comparison.php`

| Feature | [Plan Tier 1] | [Plan Tier 2] | [Plan Tier 3] |
|---|---|---|---|
| **[Category 1]** | | | |
| [Feature 1.1] | [value] | [value] | [value] |
| [Feature 1.2] | [value] | [value] | [value] |
| [Feature 1.3] | [value] | [value] | [value] |
| [Feature 1.4] | [value] | [value] | [value] |
| [Feature 1.5] | [value] | [value] | [value] |
| **[Category 2]** | | | |
| [Feature 2.1] | [value] | [value] | [value] |
| [Feature 2.2] | [value] | [value] | [value] |
| [Feature 2.3] | [value] | [value] | [value] |
| **[Category 3]** | | | |
| [Feature 3.1] | [value] | [value] | [value] |
| [Feature 3.2] | [value] | [value] | [value] |
| [Feature 3.3] | [value] | [value] | [value] |
| **[Category 4]** | | | |
| [Feature 4.1] | [value] | [value] | [value] |
| [Feature 4.2] | [value] | [value] | [value] |
| [Feature 4.3] | [value] | [value] | [value] |
| **[Category 5]** | | | |
| [Feature 5.1] | [value] | [value] | [value] |
| [Feature 5.2] | [value] | [value] | [value] |
| [Feature 5.3] | [value] | [value] | [value] |
| [Feature 5.4] | [value] | [value] | [value] |
| **Monthly Investment** | [TBD] | [TBD] | [TBD] |
| **Annual Investment** | [TBD] | [TBD] | [TBD] |

**Below-table note:**
> [Section 3.2 note — explain enrollment process, annual discount, and how pricing relates to the service. ~30 words]

---

### 3.3 CTA

**H2 Headline**
> [Section 3.3 — headline prompting visitors who are unsure about which plan fits]

**Body** (~25 words)
> [Section 3.3 body — invite to schedule a consultation, describe the process, emphasize no obligation. ~25 words]

**Primary CTA:**
> [Primary CTA label — e.g., "Schedule a Consultation"]

**Secondary CTA:**
> Call `bmg_phone`

---
---

## 4. ENROLL PAGE — `page-templates/page-enroll.php`

Uses `section-enroll-form.php`.

---

### 4.1 Intro

**H1 Headline** (~25 chars)
> [Section 4.1 — headline, e.g., "Begin Enrollment"]

**Body** (~50 words)
> [Section 4.1 body — explain the enrollment process, security/privacy assurance, and next steps after submission. ~50 words]

---

### 4.2 Form Guidance — `section-enroll-form.php`

**Form sections and fields** (for Gravity Forms build):

**Section 1: Personal Information**
- Full legal name (first, last)
- Date of birth
- Phone number (primary)
- Email address
- Preferred method of contact (phone / email / text)

**Section 2: Plan Selection**
- Desired membership tier ([Plan Tier 1] / [Plan Tier 2] / [Plan Tier 3])
- Billing preference (Monthly / Annual)
- Number of family members to enroll (if applicable)

**Section 3: Insurance Information** *(optional)*
- Insurance carrier
- Member ID
- Note: "[Insurance note — explain that membership fees are separate from insurance and coordination will be discussed during consultation.]"

**Section 4: HIPAA Acknowledgment**
- Checkbox (required):
> "[HIPAA consent text — acknowledge reading the Notice of Privacy Practices and consent to collection, use, and transmission of health information.]"
- Link to Privacy Policy page

**Section 5: Submission**
- Submit button: **Submit Enrollment Application**
- Below button: "[Post-submit note — reassure that no charges occur at this step and describe next steps.]"

---
---

## 5. CONTACT PAGE — `page-templates/page-contact.php`

Uses `section-contact-info.php` and `section-contact-form.php`.

---

### 5.1 Hero / Intro

**H1 Headline** (~20 chars)
> [Section 5.1 — headline, e.g., "Get in Touch"]

**Body** (~30 words)
> [Section 5.1 body — invite visitors to reach out, mention available contact methods. ~30 words]

---

### 5.2 Contact Details — `section-contact-info.php`

All values pulled from dynamic variables:

**Phone:** `bmg_phone`
**Email:** `bmg_email`
**Address:** `bmg_address_street` / `bmg_address_city`

**Office Hours:**
`bmg_office_hours`
Saturday: `bmg_office_hours_sat`
Sunday: `bmg_office_hours_sun`

**After-hours note:**
> [After-hours note — describe which tiers have after-hours access to [Provider Name] and through what channels.]

---

### 5.3 Contact Form — `section-contact-form.php`

**Fields:**
- Name (first, last)
- Email
- Phone (optional)
- Subject (dropdown: [Subject option 1] / [Subject option 2] / [Subject option 3] / Other)
- Message (textarea)

**Submit button:** Send Message

**Below form:**
> [Urgent contact note — direct urgent concerns to `bmg_phone` or emergency services. Note that the form is not monitored for time-sensitive communications.]

---

### 5.4 Map

Embedded Google Map to practice location in [City, State]. Placeholder until street address confirmed.

---
---

## 6. SERVICES PAGE — `page-templates/page-services.php`

**Purpose:** [Describe the purpose of the services page — who it targets, where they are in the funnel, what search queries it targets.]

**New template files needed:**
- `page-templates/page-services.php`
- `template-parts/sections/section-services.php`

---

### 6.1 Hero / Intro

**H1 Headline** (~40 chars)
> [Section 6.1 — headline describing what the practice does for members]

**Body** (~50 words)
> [Section 6.1 body — summarize the services offered, the model they are delivered within, and emphasize that care is delivered personally by [Provider Name]. ~50 words]

---

### 6.2 Service Categories — `section-services.php`

Five service blocks. Each is its own visual section within the page (alternating light/dark or with subtle dividers). Each block includes an H2, body copy (~60-80 words), and a contextual CTA.

---

**Service 1: [Service 1 Name]**
Icon: [Icon description]

**H2:** [Service 1 headline]

**Body** (~70 words)
> [Service 1 body — describe the first core service offering. Include what it covers, how it is delivered, and what makes it different. ~70 words]

**CTA:** [Service 1 CTA label] →

---

**Service 2: [Service 2 Name]**
Icon: [Icon description]

**H2:** [Service 2 headline]

**Body** (~75 words)
> [Service 2 body — describe the second core service offering. Detail what each tier receives and how results are communicated. ~75 words]

**CTA:** [Service 2 CTA label] →

---

**Service 3: [Service 3 Name]**
Icon: [Icon description]

**H2:** [Service 3 headline]

**Body** (~65 words)
> [Service 3 body — describe the third core service offering. Explain access by tier and the principle behind it. ~65 words]

**CTA:** [Service 3 CTA label] →

---

**Service 4: [Service 4 Name]**
Icon: [Icon description]

**H2:** [Service 4 headline]

**Body** (~70 words)
> [Service 4 body — describe the fourth core service offering. Detail coordination process and tier differences. ~70 words]

**CTA:** [Service 4 CTA label] →

---

**Service 5: [Service 5 Name]**
Icon: [Icon description]

**H2:** [Service 5 headline]

**Body** (~75 words)
> [Service 5 body — describe the fifth core service offering. Explain the philosophy behind this service and what each tier receives. ~75 words]

**CTA:** [Service 5 CTA label] →

---

### 6.3 CTA

Reuse homepage CTA section content (section-cta.php).

---
---

## 7. FAQ PAGE — `page-templates/page-faq.php`

Uses `section-faq.php`. Full accordion, all questions.

---

### 7.1 Hero

**H1 Headline** (~30 chars)
> [Section 7.1 — headline, e.g., "Frequently Asked Questions"]

**Body** (~20 words)
> [Section 7.1 body — briefly describe what questions are covered. ~20 words]

---

### 7.2 Full FAQ Set — `section-faq.php`

**Q1: [FAQ question 1 — about the industry/service type and how it differs from conventional]**
[FAQ answer 1 — define the service model, explain the structural difference (e.g., panel size, appointment length), and describe the resulting benefit. ~60 words]

**Q2: [FAQ question 2 — about insurance/payment coordination]**
[FAQ answer 2 — explain how existing insurance works alongside the membership fee, what each covers, and reassure the visitor. ~50 words]

**Q3: [FAQ question 3 — about access/availability to the provider]**
[FAQ answer 3 — describe access methods, appointment availability, and how access varies by tier. ~40 words]

**Q4: [FAQ question 4 — about specialist/referral coordination]**
[FAQ answer 4 — describe the referral process, how records are shared, follow-up procedures, and tier differences. ~50 words]

**Q5: [FAQ question 5 — about annual evaluations/screenings]**
[FAQ answer 5 — describe what the annual evaluation includes, how it differs by tier, and how results are communicated. ~50 words]

**Q6: [FAQ question 6 — about family member enrollment]**
[FAQ answer 6 — explain which tiers allow family add-ons and how enrollment works. ~30 words]

**Q7: [FAQ question 7 — about contracts/commitment length]**
[FAQ answer 7 — describe billing options (monthly/annual), cancellation policy, and that there are no multi-year contracts. ~30 words]

**Q8: [FAQ question 8 — about how to enroll]**
[FAQ answer 8 — describe the enrollment process from application to consultation to confirmation. Reference `bmg_phone`. ~40 words]

**Q9: [FAQ question 9 — about data privacy/security]**
[FAQ answer 9 — describe HIPAA compliance, data encryption, and link to the Privacy Policy page. ~35 words]

**Q10: [FAQ question 10 — about remote/travel access]**
[FAQ answer 10 — describe remote access capabilities and what additional services higher tiers receive for travel. ~35 words]

---
---

## 8. PRIVACY POLICY PAGE — `page-templates/page-privacy.php`

---

### 8.1 Hero

**H1 Headline**
> Privacy Policy & HIPAA Notice

**Effective date:** `bmg_privacy_effective_date`

---

### 8.2 HIPAA Notice of Privacy Practices

> **Notice of Privacy Practices — [Business Name]**

> [HIPAA intro — standard notice about how medical information may be used and disclosed, and how the patient can access it.]

**Our Responsibilities**
[Legal section — describe legal obligations to maintain privacy of PHI, provide notice, and follow terms.]

**How We Use and Disclose Your Health Information**
[Legal section — describe permitted uses and disclosures of PHI:]

*Treatment* — [Legal section — describe use of PHI for providing, coordinating, and managing care.]

*Payment* — [Legal section — describe use of PHI for reimbursement and billing.]

*Healthcare Operations* — [Legal section — describe use of PHI for quality improvement, training, compliance, and business management.]

*With Your Authorization* — [Legal section — describe that other uses require written authorization, which can be revoked.]

**Your Rights**
- [Patient right 1 — access and copy health records]
- [Patient right 2 — request corrections]
- [Patient right 3 — request restrictions on uses and disclosures]
- [Patient right 4 — request confidential communications]
- [Patient right 5 — receive accounting of disclosures]
- [Patient right 6 — receive paper copy of notice]

**Breach Notification**
[Legal section — describe obligation to notify patients of PHI breaches as required by federal law.]

**Contact**
[Legal section — how to exercise rights or file a complaint:]

Privacy Officer
[Business Name]
`bmg_address_street`
`bmg_address_city`
`bmg_phone`
`bmg_email`

[Note about filing complaints with U.S. Department of Health and Human Services Office for Civil Rights.]

---

### 8.3 Website Privacy Policy

**Information We Collect**
[Legal section — describe what information is collected through the website: form submissions and technical data (browser, IP, cookies, server logs).]

**How We Use This Information**
[Legal section — describe how form submissions and technical data are used.]

**Third-Party Services**
[Legal section — list third-party services that may collect data:]
- Payment processing: [Payment processor] ([compliance standard])
- Analytics: [Analytics provider, if applicable]
- Form handling: [Form plugin] (data stored on-site)

**Data Security**
[Legal section — describe encryption (TLS/HTTPS), secure storage, and access restrictions.]

**Your Choices**
[Legal section — describe visitor's right to decline submission and how to inquire about collected data. Reference `bmg_email` and `bmg_phone`.]

**Changes to This Policy**
[Legal section — describe that the policy may be updated and the effective date reflects the most recent revision.]

---
---

## 8B. TERMS OF USE PAGE — `page-templates/page-terms.php`

---

### 8B.1 Hero

**H1 Headline**
> Terms of Use

**Effective date:** `bmg_privacy_effective_date` (shared with Privacy Policy)

---

### 8B.2 Agreement to Terms

[Legal section — state that by accessing or using the [Business Name] website, the user agrees to be bound by these Terms of Use.]

---

### 8B.3 Website Purpose and Medical Disclaimer

[Legal section — state that the website is for informational purposes only, not a substitute for professional medical advice. Clarify that no physician-patient relationship is established through the website. Include emergency disclaimer directing users to call 911.]

---

### 8B.4 Intellectual Property

[Legal section — state that all website content is the property of [Business Name] and protected by copyright and trademark laws. Prohibit reproduction without written consent.]

---

### 8B.5 Use of This Website

[Legal section — describe acceptable use terms: lawful purposes only, no infringing or objectionable behavior.]

---

### 8B.6 Third-Party Links

[Legal section — disclaim responsibility for external linked websites.]

---

### 8B.7 Limitation of Liability

[Legal section — disclaim warranties and limit liability for damages arising from website use.]

---

### 8B.8 Governing Law

[Legal section — specify governing state law and jurisdiction for disputes. Use `[State]` and `[County, State]` as placeholders.]

---

### 8B.9 Changes to These Terms

[Legal section — reserve the right to modify terms, describe how changes take effect, and reference the effective date.]

---

### 8B.10 Contact

[Legal section — provide contact information for questions about terms:]

[Business Name]
`bmg_address_street`
`bmg_address_city`
`bmg_phone`
`bmg_email`

---
---

## 9. FOOTER — `footer.php`

Controlled via Customizer (`customizer-footer.php`). All contact info pulled from dynamic variables.

---

**Column 1 — Practice Identity**
[Business Name] logo (SVG)
`bmg_address_street`
`bmg_address_city`
`bmg_phone`
`bmg_email`

**Column 2 — Navigation**
- About
- Our Plans
- Services
- Enroll
- FAQ
- Contact
- Privacy Policy

**Column 3 — Office Hours**
`bmg_office_hours`
Saturday: `bmg_office_hours_sat`
Sunday: `bmg_office_hours_sun`

**Bottom Bar — Row 1**
Left: (c) [YEAR — use PHP `date('Y')`] [Business Name]. All rights reserved.
Right: Privacy Policy | Terms of Use (links to `/privacy-policy/` and `/terms/`)

**Bottom Bar — Row 2**
Centered: Website designed and maintained by [GSL Design](https://gsldesign.net) — `target="_blank" rel="noopener"`

---
---

## 10. SOCIAL PROOF FRAMEWORK

[Business Name] does not yet have testimonials or published stats. Below is the framework for when they are available.

---

### 10.1 Testimonial Structure

**Format:** Quote + attribution (first name, last initial, membership tier, duration)
**Tone:** Factual, specific, not effusive. Describe a concrete experience, not a vague feeling.

**Template:**
> "[Specific experience — what changed, what access felt like, what coordination resolved]."
> — [First Name] [Last Initial]., [Tier] Member, [X] years

**Example (placeholder, not for production use):**
> "[Testimonial placeholder — describe a concrete experience with the practice that illustrates a specific benefit.]"
> — [First Name] [Last Initial]., [Plan Tier 2] Member, [X] years

---

### 10.2 Practice Stats (display when available)

These should be concrete, verifiable numbers. Avoid vanity metrics.

| Stat | Display Format |
|---|---|
| [Stat 1 label] | "[Stat 1 value and unit]" |
| [Stat 2 label] | "[Stat 2 value and unit]" |
| [Stat 3 label] | "[Stat 3 value and unit]" |
| [Stat 4 label] | "[Stat 4 value and unit]" |
| [Stat 5 label] | "[Stat 5 value and unit]" |

**Design notes:** Stats displayed as a horizontal row of 3-4 large numbers with labels. Cormorant Garamond for the number, Montserrat for the label. Dark section, Brushed Silver numbers.

---
---

## 11. GLOBAL UI COPY

Microcopy used across the site in buttons, navigation, and system messages.

---

**Navigation labels:**
Header: About | Our Plans | Services | Contact
Footer: About | Our Plans | Services | Enroll | FAQ | Contact | Privacy Policy
Logged-in addition: My Account

**Button labels:**
- [Primary CTA label — e.g., "Explore Membership Plans"]
- [Plan detail CTA — e.g., "View Plan Details"]
- [Consultation CTA — e.g., "Schedule a Consultation"]
- [Enrollment submit — e.g., "Submit Enrollment Application"]
- [Contact submit — e.g., "Send Message"]
- [Profile CTA — e.g., "Read Full Profile"]
- [FAQ CTA — e.g., "View All Questions"]
- Call `bmg_phone`

**Form validation messages:**
- Required field: "This field is required."
- Invalid email: "Please enter a valid email address."
- Invalid phone: "Please enter a valid phone number."
- Submission success: "Thank you. Your submission has been received. We will be in touch within one business day."
- Submission error: "Something went wrong. Please try again or call us directly at `bmg_phone`."

**404 Page:**
- H1: "Page Not Found"
- Body: "The page you are looking for does not exist or has been moved. Return to the homepage or contact us if you need assistance."
- CTA: "Return to Homepage"

**My Account (WooCommerce):**
- Dashboard greeting: "Welcome back, [FIRST NAME]."
- No orders: "You do not have any active orders."
- Subscription active: "Your [TIER] membership is active. Next billing date: [DATE]."

---
---

## 12. SEO METADATA

Title tags and meta descriptions for each page. Location-specific where it helps search visibility.

| Page | Title Tag (~60 chars) | Meta Description (~155 chars) |
|---|---|---|
| Homepage | [Business Name] — [Industry/Service Type] in [City, State] | [Homepage meta — describe the practice model and key benefits in ~155 chars] |
| About | About [Provider Name] — [Business Name] | [About meta — introduce the provider with credentials and location in ~155 chars] |
| Our Plans | Membership Plans — [Business Name] | [Plans meta — describe the plan tiers and what they include in ~155 chars] |
| Services | Our Services — [Business Name], [City State] | [Services meta — list key services and location in ~155 chars] |
| Enroll | Enroll — [Business Name] | [Enroll meta — describe the enrollment process and security/privacy in ~155 chars] |
| FAQ | Frequently Asked Questions — [Business Name] | [FAQ meta — describe the topics covered in the FAQ in ~155 chars] |
| Contact | Contact — [Business Name], [City State] | [Contact meta — describe contact methods and location in ~155 chars] |
| Privacy | Privacy Policy — [Business Name] | [Privacy meta — describe the privacy policy and HIPAA notice in ~155 chars] |
| Terms | Terms of Use — [Business Name] | [Terms meta — describe the terms of use and governing law in ~155 chars] |

---
---

## CONTENT STATUS TRACKER

| Section | Template File | Copy Status | Still Needs | Uses Dynamic Vars |
|---|---|---|---|---|
| Homepage Hero | section-hero.php | 🔲 Placeholder | Client copy needed | No |
| Explainer | section-explainer.php | 🔲 Placeholder | Client copy needed | No |
| Pillars | section-pillars.php | 🔲 Placeholder | Client copy needed | No |
| Plans Overview | section-plans-overview.php | 🔲 Placeholder | Client copy needed, pricing | No |
| Plans Comparison | section-plans-comparison.php | 🔲 Placeholder | Client copy needed, pricing, features | No |
| Physician Preview | section-physician-preview.php | 🔲 Placeholder | Client copy needed | Yes: name, credentials, years, school |
| Physician Full Bio | section-physician.php | 🔲 Placeholder | Client copy needed, med school, residency | Yes: all physician fields |
| Philosophy | page-about.php | 🔲 Placeholder | Client copy needed | No (name hardcoded in prose) |
| FAQ Preview | section-faq-preview.php | 🔲 Placeholder | Client copy needed | No (name hardcoded in prose) |
| FAQ Full | section-faq.php | 🔲 Placeholder | Client copy needed | Yes: phone |
| CTA | section-cta.php | 🔲 Placeholder | Client copy needed | Yes: phone |
| About Page | page-about.php | 🔲 Placeholder | Client copy needed, med school, residency | Yes: physician credentials |
| Plans Page | page-plans.php | 🔲 Placeholder | Client copy needed, pricing | Yes: phone |
| Services Page | page-services.php | 🔲 Placeholder | Client copy needed | No |
| Enroll Page | page-enroll.php | 🔲 Placeholder | Client copy needed | No |
| Contact Page | page-contact.php | 🔲 Placeholder | Client copy needed, address, phone, email | Yes: all contact fields |
| Privacy Policy | page-privacy.php | 🔲 Placeholder | Client copy needed, address, phone, email, date | Yes: all contact fields, date |
| Terms of Use | page-terms.php | 🔲 Placeholder | Client copy needed, address, phone, email | Yes: all contact fields |
| Footer | footer.php | 🔲 Placeholder | Client copy needed, logo, address, phone, email | Yes: all contact fields, hours |
| Social Proof | — | 🔲 Framework only | Testimonials, stats | Yes: physician last name |
| SEO Metadata | — | 🔲 Placeholder | Client copy needed | Yes: physician name (About) |

---
---

## CLAUDE CODE IMPLEMENTATION NOTES

### Build Order
1. `inc/customizer-practice-info.php` — register all dynamic variables first
2. Include in `functions.php`
3. Homepage sections (1.1 through 1.7) — validate design system against real content
4. Inner pages: About → Plans → Services → Enroll → Contact → FAQ → Privacy → Terms
5. Footer
6. 404 page
7. SEO metadata (Rank Math fields or Customizer, depending on plugin setup)

### Template Files
- `page-templates/page-services.php` — page template (follow existing pattern from page-about.php)
- `template-parts/sections/section-services.php` — service category blocks

### Navigation
Header nav: About | Our Plans | Services | Contact
Footer nav: About | Our Plans | Services | Enroll | FAQ | Contact | Privacy Policy | Terms of Use

### Per-Client Setup
When cloning this starter theme for a new client:
1. Update `CONTENT.md` — replace all `[placeholder]` markers with client-approved copy
2. Update `inc/customizer-practice-info.php` — change default fallback values to match the client
3. Update `_theme_variables.scss` — adjust design tokens to match client brand
4. Update `functions.php` — change Google Fonts if needed
5. Update `style.css` — change theme name and metadata
6. Populate Customizer fields via WordPress admin
7. Run `npm run build` to compile
