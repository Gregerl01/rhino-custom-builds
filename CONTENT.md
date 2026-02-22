# Baig Medical Group — Website Content Architecture

**Document type:** Production copy, mapped to template files
**Brand voice:** Calm, Confident, Professional, Clear, Restrained
**Target audience:** High-net-worth individuals, C-suite executives, professionals, families in Yuma, AZ
**Conversion goal:** Enrollment in concierge medical plans
**Physician:** Dr. Adil Baig, Board-Certified Family Medicine

---

### Brand Voice Quick Reference

**Personality:** Calm, confident, grounded, warm, trustworthy, refined, premium but never cold
**Voice:** Clear and conversational, empathetic, educational without overwhelming, reassuring, intentional
**Messaging pillars:** Time as the most valuable resource. Quality over quantity. Personalized, relationship-based care. Prevention and long-term health. Partnership between patient and physician.
**Emphasize:** Intentional, personalized, preventive, thoughtful, holistic, accessible, relationship-driven
**Avoid:** Rushed, high-volume, transactional, impersonal, one-size-fits-all. No superlatives, no urgency tactics, no "best/leading/premier/redefining/reimagined."

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
| `bmg_physician_name` | `Dr. Adil Baig` | Physician Preview, Physician Bio, About, FAQ, CTA |
| `bmg_physician_last_name` | `Baig` | FAQ, Contact after-hours note, throughout |
| `bmg_physician_credentials` | `Board-Certified Family Medicine Physician` | Physician Preview, Physician Bio, About |
| `bmg_physician_specialty` | `Family Medicine` | Physician Bio |
| `bmg_physician_bio_short` | *(see Section 1.5)* | Physician Preview (homepage) |
| `bmg_physician_bio_full` | *(see Section 2.3)* | Physician Bio (About page) |
| `bmg_physician_med_school` | `[Medical School]` | Physician Bio credentials sidebar |
| `bmg_physician_residency` | `[Residency Program]` | Physician Bio credentials sidebar |
| `bmg_physician_fellowship` | *(empty string — hidden if blank)* | Physician Bio credentials sidebar |
| `bmg_physician_board_cert` | `American Board of Family Medicine` | Physician Bio credentials sidebar |
| `bmg_physician_memberships` | `[Professional Organizations]` | Physician Bio credentials sidebar |
| `bmg_physician_years` | `10` | Physician Preview, Physician Bio |
| `bmg_phone` | `(000) 000-0000` | CTA, Contact, Footer, FAQ, forms |
| `bmg_email` | `info@baigmedicalgroup.com` | Contact, Footer, Privacy Policy |
| `bmg_address_street` | `[Street Address]` | Contact, Footer, Privacy Policy |
| `bmg_address_city` | `Yuma, AZ [ZIP]` | Contact, Footer, Privacy Policy |
| `bmg_office_hours` | `Monday – Friday: 8:00 AM – 5:00 PM` | Contact, Footer |
| `bmg_office_hours_sat` | `By appointment` | Contact, Footer |
| `bmg_office_hours_sun` | `Closed` | Contact, Footer |
| `bmg_privacy_effective_date` | `[Effective Date]` | Privacy Policy |

### Template Usage

```php
<?php echo esc_html( get_theme_mod( 'bmg_physician_name', 'Dr. Adil Baig' ) ); ?>
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
> Healthcare Designed for How You Live

**Subhead** (~90 chars)
> A physician who knows you personally, available when it matters — with the time to do it right.

**Primary CTA Button**
> Explore Membership Plans

**Secondary CTA (optional)**
> Learn How It Works

**Design notes:** Full-viewport background. Animated headline on load. Off-white text on dark overlay. Both CTAs use ghost-button style (outlined, not filled) per brand restraint.

---

### 1.2 Explainer — `section-explainer.php`

**H2 Headline** (~50 chars)
> A Different Standard of Medical Care

**Body Copy** (~130 words)
> In traditional primary care, physicians manage panels of 2,000 patients or more. Appointments are compressed. Conversations are cut short. Medications are prescribed without always addressing root causes. The system rewards volume, and patients feel the difference.

> Concierge medicine corrects the structure. By maintaining a deliberately small patient panel, your physician has the capacity for thorough evaluations, unhurried conversations, and meaningful follow-up. You reach your doctor directly — not a call center, not a rotating roster.

> At Baig Medical Group, Dr. Adil Baig built this practice on a straightforward conviction: time is the most valuable resource in medicine. Every membership is designed to protect that time — for you, for your family, and for the physician-patient relationship that makes good care possible.

**Design notes:** Light section. Content-width container (680px max). No icons or imagery — copy does the work here.

---

### 1.3 Value Pillars — `section-pillars.php`

**H2 Headline** (~35 chars)
> What Membership Provides

**Pillar 1 — Direct Access**
Icon: Phone/connection
**H3:** Direct Physician Access
**Body** (~30 words): Reach Dr. Baig personally by phone, text, or secure message. Same-day and next-day appointments are standard, not exceptions. No gatekeeping, no hold queues.

**Pillar 2 — Unhurried Appointments**
Icon: Clock
**H3:** Unhurried Appointments
**Body** (~30 words): Visits are scheduled for 30 to 60 minutes. There is time to listen, investigate, discuss options, and answer every question — without watching the clock.

**Pillar 3 — Coordinated Care**
Icon: Network/nodes
**H3:** Coordinated Specialist Care
**Body** (~30 words): When referrals are needed, Dr. Baig personally coordinates with specialists, follows up on results, and ensures nothing falls between the cracks.

**Pillar 4 — Preventive Focus**
Icon: Shield/checkmark
**H3:** Prevention-First Approach
**Body** (~30 words): Comprehensive evaluations, advanced screenings, and personalized wellness planning built around nutrition, movement, and lifestyle — identifying risk early, not reacting after symptoms appear.

**Design notes:** Dark section (Obsidian background). 4-column grid on desktop, 2x2 on tablet, stacked on mobile. Icons in Brushed Silver. H3s in Cormorant Garamond, body in Montserrat.

---

### 1.4 Plans Overview — `section-plans-overview.php`

**H2 Headline** (~30 chars)
> Membership Tiers

**H2 Subhead** (~65 chars)
> Three levels of care, each built around access, attention, and coordination.

---

**ESSENTIAL PLAN**
**H3:** Essential
**Tagline** (~40 chars): Foundational concierge care for individuals.
**Features:**
- Annual comprehensive health evaluation
- Same-day and next-day appointments
- Direct physician phone and messaging access
- Standard specialist referral coordination
- Foundational wellness programming

**CTA:** View Plan Details

---

**PREMIUM PLAN** (featured/recommended)
**H3:** Premium
**Tagline** (~45 chars): Enhanced access with priority coordination.
**Features:**
- Everything in Essential, plus:
- Extended appointment availability, including evenings
- Priority specialist referrals and follow-up
- Health coaching with nutrition and lifestyle guidance
- Annual executive physical with advanced screenings
- Family member add-on available

**CTA:** View Plan Details

---

**CONCIERGE ELITE PLAN**
**H3:** Concierge Elite
**Tagline** (~50 chars): The full measure of personalized medicine.
**Features:**
- Everything in Premium, plus:
- 24/7 direct physician availability
- VIP specialist referral network with expedited scheduling
- Full-suite wellness, nutrition, and longevity programming
- In-home and on-site visit options
- Travel medicine and global care coordination
- Dedicated care coordinator

**CTA:** View Plan Details

**Section CTA:**
> Not sure which tier fits? [Schedule a Consultation] — we will walk through your needs with no obligation.

**Design notes:** Light section. Three equal-width cards. Premium card elevated (subtle shadow or border-top in Brushed Silver). Pricing TBD — display as "Contact for Pricing" until client provides.

---

### 1.5 Physician Preview — `section-physician-preview.php`

**H2 Headline** (~30 chars)
> Your Physician

**Body Copy** (~80 words)
> Dr. Adil Baig is a board-certified family medicine physician with over a decade of clinical experience. A second-generation physician and father of five, he founded Baig Medical Group on a conviction that guided his career: time is the most valuable resource in medicine — for patients and physicians alike.

> In Yuma, Dr. Baig maintains a limited patient panel, conducts extended appointments, and remains personally accessible to every member. The result is care built around attention, not volume.

**CTA:**
> Read Full Profile →

**Design notes:** Two-column layout. Portrait photo left, copy right. Dark section with light text. Photo placeholder until client provides.

---

### 1.6 FAQ Preview — `section-faq-preview.php`

**H2 Headline** (~35 chars)
> Common Questions

Display 4 questions from the full FAQ set (accordion style):

**Q1:** What is concierge medicine and how does it differ from traditional primary care?
**Q2:** Will my health insurance still apply?
**Q3:** How quickly can I reach Dr. Baig?
**Q4:** What happens if I need a specialist?

(Full answers provided in Section 7: FAQ Page below.)

**CTA:**
> View All Questions →

**Design notes:** Light section. Accordion UI — one item open by default. Consistent with Bootstrap 5 accordion component.

---

### 1.7 CTA — `section-cta.php`

**H2 Headline** (~40 chars)
> The First Step Is a Conversation

**Body** (~30 words)
> Schedule a private consultation to discuss your health priorities, ask questions about membership, and determine which tier aligns with your needs. There is no obligation and no pressure.

**Primary CTA:**
> Schedule a Consultation

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
> Medicine Practiced With Intention

**Body** (~60 words)
> Baig Medical Group exists because healthcare should not require patients to choose between access and quality, or between thoroughness and convenience. Dr. Adil Baig built this practice to provide the kind of care he believes medicine is meant to deliver — attentive, preventive, and personal — in a model structured around the physician-patient relationship.

---

### 2.2 Philosophy — Dr. Baig's Approach

**H2 Headline** (~30 chars)
> A Philosophy of Care

**Body** (~200 words)
> Dr. Adil Baig was born and raised in Chicago, Illinois, in a family where medicine was part of daily life. His father is a practicing family medicine physician. Though he did not initially plan to follow the same path, Dr. Baig ultimately found his calling in caring for others — and has spent over a decade doing so.

> As his practice grew, so did his awareness of the structural limitations within conventional healthcare. In a system where physicians are expected to see 30 or more patients a day, appointments shrink, conversations are cut short, and medications are prescribed without always addressing root causes. Quality gives way to quantity. The physician wants to do more. The system does not allow it.

> Becoming a father of five clarified what Dr. Baig already knew professionally: time is the most valuable resource. He could not practice medicine the way he believed it should be practiced — and be present for his family — within a model that treated both as secondary.

> Baig Medical Group is the result of that conviction. A concierge practice built around intentional care, shared decision-making, and the belief that prevention, nutrition, movement, and lifestyle are as important as any prescription.

---

### 2.3 Full Physician Bio — `section-physician.php`

**H2 Headline**
> Dr. Adil Baig, `bmg_physician_credentials`

**Bio** (~160 words)
> Dr. Baig is a board-certified family medicine physician with over a decade of clinical experience spanning hospital systems, health system networks, and private practice.

> After completing his medical training at `bmg_physician_med_school` and residency at `bmg_physician_residency`, Dr. Baig practiced within traditional healthcare settings before founding Baig Medical Group in Yuma, Arizona.

> The transition to concierge medicine was deliberate. Having experienced the constraints of volume-based practice firsthand — where patient panels routinely exceed 2,000 and appointments are compressed to minutes — Dr. Baig recognized that the model itself was the barrier to the care patients deserved.

> At Baig Medical Group, Dr. Baig maintains a limited patient panel, conducts extended appointments, and remains personally accessible to every member. His clinical approach emphasizes prevention, nutrition, movement, and evidence-based medicine, with care plans developed collaboratively through shared decision-making.

> Outside of practice, Dr. Baig is a devoted father of five and remains connected to his roots as a second-generation physician.

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
> Membership Plans

**Body** (~50 words)
> Every tier includes direct access to Dr. Baig, unhurried appointments, and coordinated care. The differences are in depth — how much access, how broad the wellness programming, and how extensive the coordination around your health. All plans are structured around prevention, partnership, and time.

---

### 3.2 Comparison Table — `section-plans-comparison.php`

| Feature | Essential | Premium | Concierge Elite |
|---|---|---|---|
| **Access & Availability** | | | |
| Direct physician phone/text | ✓ | ✓ | ✓ |
| Secure messaging | ✓ | ✓ | ✓ |
| Same-day/next-day appointments | ✓ | ✓ | ✓ |
| Extended hours (evenings) | — | ✓ | ✓ |
| 24/7 physician availability | — | — | ✓ |
| **Evaluations & Screenings** | | | |
| Annual comprehensive evaluation | ✓ | ✓ | ✓ |
| Executive physical with advanced panels | — | ✓ | ✓ |
| Quarterly health check-ins | — | — | ✓ |
| **Specialist Coordination** | | | |
| Referral coordination | Standard | Priority | VIP / Expedited |
| Post-referral follow-up | ✓ | ✓ | ✓ |
| Multi-specialist case management | — | — | ✓ |
| **Wellness & Prevention** | | | |
| Foundational wellness programming | ✓ | ✓ | ✓ |
| Health coaching (nutrition & lifestyle) | — | ✓ | ✓ |
| Longevity & optimization planning | — | — | ✓ |
| **Convenience** | | | |
| In-home/on-site visits | — | — | ✓ |
| Travel medicine & global coordination | — | — | ✓ |
| Dedicated care coordinator | — | — | ✓ |
| Family member add-on | — | ✓ | ✓ |
| **Monthly Investment** | [TBD] | [TBD] | [TBD] |
| **Annual Investment** | [TBD] | [TBD] | [TBD] |

**Below-table note:**
> All plans require an initial enrollment consultation. Annual commitments include a preferred rate. Pricing reflects physician access and care coordination — standard office visit copays and insurance billing for covered services remain separate.

---

### 3.3 CTA

**H2 Headline**
> Questions About Which Plan Fits?

**Body** (~25 words)
> Schedule a brief consultation with our team. We will review your health priorities and recommend the membership tier that aligns with your needs.

**Primary CTA:**
> Schedule a Consultation

**Secondary CTA:**
> Call `bmg_phone`

---
---

## 4. ENROLL PAGE — `page-templates/page-enroll.php`

Uses `section-enroll-form.php`.

---

### 4.1 Intro

**H1 Headline** (~25 chars)
> Begin Enrollment

**Body** (~50 words)
> Complete the form below to start your membership application. All information is transmitted securely and handled in accordance with HIPAA privacy requirements. After submission, a member of our team will contact you within one business day to schedule your enrollment consultation.

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
- Desired membership tier (Essential / Premium / Concierge Elite)
- Billing preference (Monthly / Annual)
- Number of family members to enroll (if applicable)

**Section 3: Insurance Information** *(optional)*
- Insurance carrier
- Member ID
- Note: "Insurance information is optional. Concierge membership fees are separate from insurance. We will discuss how your existing coverage coordinates with membership during your consultation."

**Section 4: HIPAA Acknowledgment**
- Checkbox (required):
> "I acknowledge that I have read and understand the Baig Medical Group Notice of Privacy Practices, and I consent to the collection, use, and transmission of my health information as described therein."
- Link to Privacy Policy page

**Section 5: Submission**
- Submit button: **Submit Enrollment Application**
- Below button: "You will not be charged at this step. A member of our team will contact you to finalize enrollment and payment."

---
---

## 5. CONTACT PAGE — `page-templates/page-contact.php`

Uses `section-contact-info.php` and `section-contact-form.php`.

---

### 5.1 Hero / Intro

**H1 Headline** (~20 chars)
> Get in Touch

**Body** (~30 words)
> Whether you are considering membership or have questions about our practice, we welcome the conversation. Reach us by phone, email, or the form below.

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
> Premium and Concierge Elite members have direct after-hours access to Dr. Baig via phone and secure messaging.

---

### 5.3 Contact Form — `section-contact-form.php`

**Fields:**
- Name (first, last)
- Email
- Phone (optional)
- Subject (dropdown: General Inquiry / Membership Question / Current Patient / Other)
- Message (textarea)

**Submit button:** Send Message

**Below form:**
> For urgent medical concerns, please call `bmg_phone` or visit your nearest emergency department. This form is not monitored for time-sensitive communications.

---

### 5.4 Map

Embedded Google Map to practice location in Yuma, AZ. Placeholder until street address confirmed.

---
---

## 6. SERVICES PAGE — `page-templates/page-services.php`

**Purpose:** Explains what BMG does for people still researching concierge medicine in Yuma. Earlier in the funnel than Plans. Targets search queries like "concierge doctor Yuma AZ," "executive physical Yuma," "same-day doctor appointment Yuma."

**New template files needed:**
- `page-templates/page-services.php`
- `template-parts/sections/section-services.php`

---

### 6.1 Hero / Intro

**H1 Headline** (~40 chars)
> What We Do for Our Members

**Body** (~50 words)
> Baig Medical Group provides comprehensive primary care, preventive medicine, and coordinated specialist access within a membership model built around availability, thoroughness, and continuity. Every service below is delivered personally by Dr. Baig — not a rotating roster of providers. The care is intentional, and the relationship is ongoing.

---

### 6.2 Service Categories — `section-services.php`

Five service blocks. Each is its own visual section within the page (alternating light/dark or with subtle dividers). Each block includes an H2, body copy (~60-80 words), and a contextual CTA.

---

**Service 1: Primary Care**
Icon: Stethoscope

**H2:** Primary & Internal Medicine

**Body** (~70 words)
> Your membership begins with a physician who knows your full medical history — not a chart summary. Appointments are 30 to 60 minutes, with time for thorough examination, conversation, and follow-up planning. Acute concerns — respiratory illness, musculoskeletal pain, infections, skin conditions — are addressed same-day or next-day. Chronic conditions such as hypertension, diabetes, and thyroid disorders are managed with consistent oversight and proactive adjustment, always with the goal of addressing root causes.

**CTA:** See Membership Plans →

---

**Service 2: Preventive & Executive Health**
Icon: Clipboard/chart

**H2:** Preventive Screenings & Executive Physicals

**Body** (~75 words)
> Every member receives an annual comprehensive evaluation: detailed health history, physical examination, and age-appropriate laboratory work. Premium and Concierge Elite members receive an executive-level physical with advanced diagnostics — cardiovascular risk panels, metabolic biomarkers, cancer screenings, and imaging tailored to age, sex, and family history. Results are reviewed in a dedicated follow-up appointment where Dr. Baig walks through findings, explains implications, and builds a plan grounded in prevention and long-term wellness.

**CTA:** Compare Plan Tiers →

---

**Service 3: Same-Day & Urgent Access**
Icon: Clock/lightning

**H2:** Same-Day and Urgent Appointments

**Body** (~65 words)
> When something comes up, you should not have to wait days or resort to urgent care. All members have same-day and next-day appointments for acute concerns. Premium members have extended evening availability. Concierge Elite members reach Dr. Baig directly at any hour. The principle is simple: when you need medical attention, your own physician is available — not a stranger at a walk-in clinic.

**CTA:** Learn About Access by Tier →

---

**Service 4: Specialist Coordination**
Icon: Network/connected nodes

**H2:** Specialist Referrals & Care Coordination

**Body** (~70 words)
> Referrals at Baig Medical Group are not a hand-off. Dr. Baig identifies the appropriate specialist, shares relevant records, and facilitates scheduling directly. After your specialist visit, he reviews findings, integrates them into your care plan, and ensures follow-up actions are completed. Concierge Elite members receive multi-specialist case management for complex or overlapping conditions, with Dr. Baig serving as the central coordinator across all providers.

**CTA:** Schedule a Consultation →

---

**Service 5: Wellness & Longevity**
Icon: Leaf/growth

**H2:** Wellness, Nutrition & Longevity Planning

**Body** (~75 words)
> Dr. Baig's approach to care extends well beyond diagnosis and prescription. His clinical philosophy emphasizes nutrition, movement, lifestyle habits, and prevention as foundational to long-term health. All members receive wellness guidance as part of their care. Premium and Concierge Elite members receive structured health coaching, personalized nutrition plans, and wellness strategies informed by their screening results and goals. Concierge Elite members access the full suite — longevity planning, fitness integration, sleep optimization, and stress management.

**CTA:** View the Full Plan Comparison →

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
> Frequently Asked Questions

**Body** (~20 words)
> Answers to common questions about concierge medicine, our membership plans, and how Baig Medical Group operates.

---

### 7.2 Full FAQ Set — `section-faq.php`

**Q1: What is concierge medicine and how does it differ from traditional primary care?**
Concierge medicine is a membership-based model where patients pay an annual or monthly fee for enhanced physician access, longer appointments, and comprehensive care coordination. The core difference is panel size. A traditional primary care physician manages 2,000 to 2,500 patients. A concierge physician maintains a deliberately small panel — typically a few hundred — which allows for longer visits, same-day access, and a deeper physician-patient relationship built on continuity.

**Q2: Will my health insurance still apply?**
Yes. Your existing health insurance continues to function as it does now. Insurance covers eligible services such as labs, imaging, specialist visits, hospitalizations, and prescriptions. The concierge membership fee covers enhanced access, coordination, and services that fall outside standard insurance billing — such as extended appointments, direct physician communication, and wellness programming.

**Q3: How quickly can I reach Dr. Baig?**
All members have direct phone and secure messaging access to Dr. Baig. Same-day and next-day appointments are standard across every membership tier. Premium and Concierge Elite members have extended-hours and after-hours access. Concierge Elite members have 24/7 direct physician availability.

**Q4: What happens if I need a specialist?**
Dr. Baig personally coordinates referrals, shares relevant records, and follows up on specialist findings. The level of coordination depends on your tier — Essential members receive standard coordination, Premium members receive priority scheduling and follow-up, and Concierge Elite members receive expedited scheduling and multi-specialist case management.

**Q5: What does the annual comprehensive evaluation include?**
Every member receives a thorough annual evaluation including a detailed health history review, physical examination, age-appropriate screenings, and laboratory work. Premium and Concierge Elite members receive an executive-level physical with advanced diagnostic panels, cardiovascular screening, and additional biomarkers. Results are reviewed in a dedicated follow-up appointment with Dr. Baig — not via a portal message.

**Q6: Can family members join my plan?**
Premium and Concierge Elite memberships include the option to add eligible family members. Each additional member receives full plan benefits. Family enrollment details and pricing are covered during your enrollment consultation.

**Q7: Is there a contract or long-term commitment?**
Memberships are offered on a month-to-month or annual basis. Annual memberships include a preferred rate. There are no multi-year contracts. We ask for 30 days' written notice for cancellation.

**Q8: How do I enroll?**
Start by submitting an enrollment application through our website or calling the office directly at `bmg_phone`. After submission, a member of our team will schedule an enrollment consultation where we discuss your health priorities, review plan options, and finalize your membership. You are not charged until enrollment is confirmed.

**Q9: Is my personal health information protected?**
Baig Medical Group operates in full compliance with HIPAA (Health Insurance Portability and Accountability Act) regulations. All patient data is encrypted, transmitted securely, and accessible only to authorized care team members. Our complete Notice of Privacy Practices is available on our Privacy Policy page.

**Q10: What if I'm traveling or away from the area?**
All members can reach Dr. Baig by phone or secure message regardless of location. Concierge Elite members receive dedicated travel medicine support, including pre-travel consultations, global care coordination, and assistance locating vetted providers in other cities or countries.

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

> **Notice of Privacy Practices — Baig Medical Group**

> This notice describes how medical information about you may be used and disclosed, and how you can access this information. Please review it carefully.

**Our Responsibilities**
We are required by law to maintain the privacy of your protected health information (PHI), provide you with this notice of our legal duties and privacy practices, and follow the terms of the notice currently in effect.

**How We Use and Disclose Your Health Information**
We may use and disclose your PHI for the following purposes:

*Treatment* — To provide, coordinate, and manage your medical care. This includes sharing information with specialists, laboratories, and other providers involved in your care.

*Payment* — To obtain reimbursement for services provided, including billing your insurance carrier and communicating with third-party payers.

*Healthcare Operations* — To support the business activities of the practice, including quality improvement, staff training, compliance auditing, and business management.

*With Your Authorization* — For purposes not described above, we will obtain your written authorization before using or disclosing your PHI. You may revoke authorization at any time in writing.

**Your Rights**
- Access and obtain a copy of your health records
- Request corrections to your health information
- Request restrictions on certain uses and disclosures
- Request confidential communications (e.g., contact at an alternate address or phone number)
- Receive an accounting of disclosures made for purposes other than treatment, payment, or operations
- Receive a paper copy of this notice upon request

**Breach Notification**
We will notify you promptly if a breach of your unsecured PHI occurs, as required by federal law.

**Contact**
To exercise any of these rights or to file a complaint, contact:

Privacy Officer
Baig Medical Group
`bmg_address_street`
`bmg_address_city`
`bmg_phone`
`bmg_email`

You may also file a complaint with the U.S. Department of Health and Human Services Office for Civil Rights.

---

### 8.3 Website Privacy Policy

**Information We Collect**
When you use this website, we may collect: your name, email address, phone number, and other information you voluntarily provide through forms. We also collect standard technical data such as browser type, IP address, and pages visited through cookies and server logs.

**How We Use This Information**
Information submitted through website forms is used to respond to your inquiry or process your enrollment application. Technical data is used to maintain site security, improve performance, and understand usage patterns.

**Third-Party Services**
This website uses the following third-party services that may collect data in accordance with their own privacy policies:
- Payment processing: Authorize.net (PCI-DSS compliant)
- Analytics: [ANALYTICS PROVIDER, if applicable]
- Form handling: Gravity Forms (data stored on-site)

**Data Security**
All data transmitted through this website is encrypted via TLS (HTTPS). Form submissions containing personal information are stored in encrypted databases with access restricted to authorized personnel.

**Your Choices**
You may decline to submit information through this website. If you have questions about data we have collected, contact us at `bmg_email` or `bmg_phone`.

**Changes to This Policy**
We may update this policy from time to time. The effective date at the top of this page reflects the most recent revision.

---
---

## 9. FOOTER — `footer.php`

Controlled via Customizer (`customizer-footer.php`). All contact info pulled from dynamic variables.

---

**Column 1 — Practice Identity**
Baig Medical Group logo (SVG)
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

**Bottom Bar**
© [YEAR — use PHP `date('Y')`] Baig Medical Group. All rights reserved.

---
---

## 10. SOCIAL PROOF FRAMEWORK

BMG does not yet have testimonials or published stats. Below is the framework for when they are available.

---

### 10.1 Testimonial Structure

**Format:** Quote + attribution (first name, last initial, membership tier, duration)
**Tone:** Factual, specific, not effusive. Describe a concrete experience, not a vague feeling.

**Template:**
> "[Specific experience — what changed, what access felt like, what coordination resolved]."
> — [First Name] [Last Initial]., [Tier] Member, [X] years

**Example (placeholder, not for production use):**
> "When I needed a cardiology referral, Dr. Baig had the appointment scheduled before I left the office. The specialist already had my records. That had never happened in primary care before."
> — James R., Premium Member, 2 years

---

### 10.2 Practice Stats (display when available)

These should be concrete, verifiable numbers. Avoid vanity metrics.

| Stat | Display Format |
|---|---|
| Average appointment length | "45-minute average appointments" |
| Patient panel size | "Fewer than [X] patients" |
| Same-day appointment rate | "[X]% same-day availability" |
| Response time | "Average response under [X] minutes" |
| Member retention | "[X]% annual retention" |

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
- Explore Membership Plans
- View Plan Details
- Schedule a Consultation
- Submit Enrollment Application
- Send Message
- Read Full Profile
- View All Questions
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
| Homepage | Baig Medical Group — Concierge Medicine in Yuma, AZ | Membership-based medical practice in Yuma offering direct physician access, extended appointments, and coordinated care for individuals and families. |
| About | About Dr. Adil Baig — Baig Medical Group | Meet Dr. Adil Baig, a board-certified family medicine physician offering concierge care in Yuma, Arizona. |
| Our Plans | Membership Plans — Baig Medical Group | Compare three concierge medicine membership tiers. Every plan includes direct physician access, same-day appointments, and care coordination. |
| Services | Our Services — Baig Medical Group, Yuma AZ | Primary care, preventive health, executive physicals, specialist coordination, and wellness planning delivered by your personal physician in Yuma. |
| Enroll | Enroll — Baig Medical Group | Begin your membership application. All information is transmitted securely in compliance with HIPAA privacy requirements. |
| FAQ | Frequently Asked Questions — Baig Medical Group | Answers about concierge medicine, membership plans, insurance coordination, physician access, and enrollment at Baig Medical Group. |
| Contact | Contact — Baig Medical Group, Yuma AZ | Reach Baig Medical Group by phone, email, or contact form. Office hours, location, and directions in Yuma, Arizona. |
| Privacy | Privacy Policy — Baig Medical Group | HIPAA Notice of Privacy Practices and website privacy policy for Baig Medical Group. |

---
---

## CONTENT STATUS TRACKER

| Section | Template File | Copy Status | Still Needs | Uses Dynamic Vars |
|---|---|---|---|---|
| Homepage Hero | section-hero.php | ✅ Final | — | No |
| Explainer | section-explainer.php | ✅ Final | — | No |
| Pillars | section-pillars.php | ✅ Final | — | No |
| Plans Overview | section-plans-overview.php | ✅ Final | Pricing | No |
| Plans Comparison | section-plans-comparison.php | ✅ Final | Pricing, final features | No |
| Physician Preview | section-physician-preview.php | ✅ Final | — | Yes: name, credentials, years, school |
| Physician Full Bio | section-physician.php | ✅ Final | Med school, residency | Yes: all physician fields |
| Philosophy | page-about.php | ✅ Final | — | No (name hardcoded in prose) |
| FAQ Preview | section-faq-preview.php | ✅ Final | — | No (name hardcoded in prose) |
| FAQ Full | section-faq.php | ✅ Final | — | Yes: phone |
| CTA | section-cta.php | ✅ Final | — | Yes: phone |
| About Page | page-about.php | ✅ Final | Med school, residency | Yes: physician credentials |
| Plans Page | page-plans.php | ✅ Final | Pricing | Yes: phone |
| Services Page | page-services.php | ✅ Final | — | No |
| Enroll Page | page-enroll.php | ✅ Final | — | No |
| Contact Page | page-contact.php | ✅ Final | Address, phone, email | Yes: all contact fields |
| Privacy Policy | page-privacy.php | ✅ Final | Address, phone, email, date | Yes: all contact fields, date |
| Footer | footer.php | ✅ Final | Logo, address, phone, email | Yes: all contact fields, hours |
| Social Proof | — | 🔲 Framework only | Testimonials, stats | Yes: physician last name |
| SEO Metadata | — | ✅ Final | — | Yes: physician name (About) |

---
---

## CLAUDE CODE IMPLEMENTATION NOTES

### Build Order
1. `inc/customizer-practice-info.php` — register all dynamic variables first
2. Include in `functions.php`
3. Homepage sections (1.1 through 1.7) — validate design system against real content
4. Inner pages: About → Plans → Services (new) → Enroll → Contact → FAQ → Privacy
5. Footer
6. 404 page
7. SEO metadata (Rank Math fields or Customizer, depending on plugin setup)

### New Files Needed for Services Page
- `page-templates/page-services.php` — page template (follow existing pattern from page-about.php)
- `template-parts/sections/section-services.php` — service category blocks

### Navigation Update
Header nav: About | Our Plans | Services | Contact
Footer nav: About | Our Plans | Services | Enroll | FAQ | Contact | Privacy Policy

### CLAUDE.md Updates Needed
After implementing, update CLAUDE.md to reflect:
- Add `customizer-practice-info.php` to inc/ file listing
- Add `page-services.php` to page-templates/ listing
- Add `section-services.php` to template-parts/sections/ listing
- Update Site Map table to include Services page
- Update Navigation section to include Services in header
- Update physician references from placeholder to Dr. Adil Baig
- Update location references to Yuma, AZ
- Note tier names: Essential / Premium / Concierge Elite (not Basic / Premium / VIP)
- Remove from "Open Items": Physician name, credentials, bio (resolved)
