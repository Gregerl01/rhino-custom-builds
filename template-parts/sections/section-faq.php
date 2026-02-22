<?php
/**
 * FAQ Section — Full FAQ Page
 *
 * Bootstrap Accordion with all 10 questions from CONTENT.md Section 7.2.
 * Q8 uses dynamic bmg_phone variable.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variable for Q8.
$phone_display = get_theme_mod( 'bmg_phone', '(000) 000-0000' );

// FAQ data — CONTENT.md Section 7.2.
$faq_items = array(
	array(
		'question' => __( 'What is concierge medicine and how does it differ from traditional primary care?', 'bmg-theme' ),
		'answer'   => __( 'Concierge medicine is a membership-based model where patients pay an annual or monthly fee for enhanced physician access, longer appointments, and comprehensive care coordination. The core difference is panel size. A traditional primary care physician manages 2,000 to 2,500 patients. A concierge physician maintains a deliberately small panel — typically a few hundred — which allows for longer visits, same-day access, and a deeper physician-patient relationship built on continuity.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Will my health insurance still apply?', 'bmg-theme' ),
		'answer'   => __( 'Yes. Your existing health insurance continues to function as it does now. Insurance covers eligible services such as labs, imaging, specialist visits, hospitalizations, and prescriptions. The concierge membership fee covers enhanced access, coordination, and services that fall outside standard insurance billing — such as extended appointments, direct physician communication, and wellness programming.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'How quickly can I reach Dr. Baig?', 'bmg-theme' ),
		'answer'   => __( 'All members have direct phone and secure messaging access to Dr. Baig. Same-day and next-day appointments are standard across every membership tier. Premium and Concierge Elite members have extended-hours and after-hours access. Concierge Elite members have 24/7 direct physician availability.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'What happens if I need a specialist?', 'bmg-theme' ),
		'answer'   => __( 'Dr. Baig personally coordinates referrals, shares relevant records, and follows up on specialist findings. The level of coordination depends on your tier — Essential members receive standard coordination, Premium members receive priority scheduling and follow-up, and Concierge Elite members receive expedited scheduling and multi-specialist case management.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'What does the annual comprehensive evaluation include?', 'bmg-theme' ),
		'answer'   => __( 'Every member receives a thorough annual evaluation including a detailed health history review, physical examination, age-appropriate screenings, and laboratory work. Premium and Concierge Elite members receive an executive-level physical with advanced diagnostic panels, cardiovascular screening, and additional biomarkers. Results are reviewed in a dedicated follow-up appointment with Dr. Baig — not via a portal message.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Can family members join my plan?', 'bmg-theme' ),
		'answer'   => __( 'Premium and Concierge Elite memberships include the option to add eligible family members. Each additional member receives full plan benefits. Family enrollment details and pricing are covered during your enrollment consultation.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Is there a contract or long-term commitment?', 'bmg-theme' ),
		'answer'   => __( 'Memberships are offered on a month-to-month or annual basis. Annual memberships include a preferred rate. There are no multi-year contracts. We ask for 30 days\' written notice for cancellation.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'How do I enroll?', 'bmg-theme' ),
		'answer'   => sprintf(
			/* translators: %s: phone number */
			__( 'Start by submitting an enrollment application through our website or calling the office directly at %s. After submission, a member of our team will schedule an enrollment consultation where we discuss your health priorities, review plan options, and finalize your membership. You are not charged until enrollment is confirmed.', 'bmg-theme' ),
			$phone_display
		),
	),
	array(
		'question' => __( 'Is my personal health information protected?', 'bmg-theme' ),
		'answer'   => __( 'Baig Medical Group operates in full compliance with HIPAA (Health Insurance Portability and Accountability Act) regulations. All patient data is encrypted, transmitted securely, and accessible only to authorized care team members. Our complete Notice of Privacy Practices is available on our Privacy Policy page.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'What if I\'m traveling or away from the area?', 'bmg-theme' ),
		'answer'   => __( 'All members can reach Dr. Baig by phone or secure message regardless of location. Concierge Elite members receive dedicated travel medicine support, including pre-travel consultations, global care coordination, and assistance locating vetted providers in other cities or countries.', 'bmg-theme' ),
	),
);

$accordion_id = 'faqAccordion';
?>

<section id="faq" class="section section-light faq-section reveal-on-scroll">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="accordion" id="<?php echo esc_attr( $accordion_id ); ?>">
					<?php foreach ( $faq_items as $index => $item ) :
						$item_num    = $index + 1;
						$collapse_id = 'faq-collapse-' . $item_num;
						$heading_id  = 'faq-heading-' . $item_num;
					?>
						<div class="accordion-item">
							<h3 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
								<button class="accordion-button collapsed"
										type="button"
										data-bs-toggle="collapse"
										data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>"
										aria-expanded="false"
										aria-controls="<?php echo esc_attr( $collapse_id ); ?>">
									<?php echo esc_html( $item['question'] ); ?>
								</button>
							</h3>
							<div id="<?php echo esc_attr( $collapse_id ); ?>"
								 class="accordion-collapse collapse"
								 aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
								 data-bs-parent="#<?php echo esc_attr( $accordion_id ); ?>">
								<div class="accordion-body">
									<?php echo wp_kses_post( wpautop( $item['answer'] ) ); ?>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="faq-contact text-center mt-5 pt-4">
					<p class="mb-3">
						<?php esc_html_e( 'Have a question not answered here?', 'bmg-theme' ); ?>
					</p>
					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-dark">
						<?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?>
					</a>
				</div>

			</div>
		</div>

	</div>
</section>
