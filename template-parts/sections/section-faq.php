<?php
/**
 * FAQ Section
 *
 * Bootstrap Accordion-based FAQ section.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// FAQ data - placeholder content.
$faq_categories = array(
	'membership' => array(
		'title' => __( 'Membership & Enrollment', 'bmg-theme' ),
		'items' => array(
			array(
				'question' => __( 'What is concierge medicine?', 'bmg-theme' ),
				'answer'   => __( 'Concierge medicine is a healthcare model where patients pay an annual or monthly membership fee for enhanced access to their physician. This allows doctors to limit their patient panels, providing more time and attention to each patient, same-day appointments, and direct communication with your doctor.', 'bmg-theme' ),
			),
			array(
				'question' => __( 'How do I enroll in a membership plan?', 'bmg-theme' ),
				'answer'   => __( 'Enrollment is simple. Visit our Plans page to compare options, then complete our online enrollment form. You\'ll be contacted within 24 hours to schedule your initial consultation and complete the onboarding process.', 'bmg-theme' ),
			),
			array(
				'question' => __( 'Can I cancel my membership?', 'bmg-theme' ),
				'answer'   => __( 'Yes, you may cancel your membership at any time with 30 days written notice. We believe in the value of our care and don\'t require long-term contracts. Refunds are prorated for annual memberships.', 'bmg-theme' ),
			),
		),
	),
	'services' => array(
		'title' => __( 'Services & Access', 'bmg-theme' ),
		'items' => array(
			array(
				'question' => __( 'Does my membership replace health insurance?', 'bmg-theme' ),
				'answer'   => __( 'No. Your membership covers primary care services and enhanced physician access, but you should maintain health insurance for hospitalizations, specialists, prescriptions, and other medical services outside our practice.', 'bmg-theme' ),
			),
			array(
				'question' => __( 'What services are included in my membership?', 'bmg-theme' ),
				'answer'   => __( 'All memberships include comprehensive primary care, annual wellness exams, same-day/next-day appointments, extended visit times, and direct physician communication. Premium and VIP plans include additional benefits like after-hours access and priority specialist referrals.', 'bmg-theme' ),
			),
			array(
				'question' => __( 'How quickly can I get an appointment?', 'bmg-theme' ),
				'answer'   => __( 'Most appointments are available same-day or next-day. Because we limit our patient panel, we maintain appointment availability that traditional practices cannot offer.', 'bmg-theme' ),
			),
		),
	),
	'billing' => array(
		'title' => __( 'Billing & Insurance', 'bmg-theme' ),
		'items' => array(
			array(
				'question' => __( 'Do you accept insurance?', 'bmg-theme' ),
				'answer'   => __( 'We do not bill insurance for membership fees, as this is not typically a covered benefit. However, we can provide documentation for HSA/FSA accounts, and certain services may be submitted to your insurance for reimbursement.', 'bmg-theme' ),
			),
			array(
				'question' => __( 'What payment methods do you accept?', 'bmg-theme' ),
				'answer'   => __( 'We accept all major credit cards for monthly payments, as well as ACH bank transfers for annual memberships. HSA and FSA cards are also accepted.', 'bmg-theme' ),
			),
		),
	),
);

$accordion_id = 'faqAccordion';
$item_count   = 0;
?>

<section id="faq" class="section section-light faq-section">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<h2 class="display-text h1 mb-3">
					<?php esc_html_e( 'Frequently Asked Questions', 'bmg-theme' ); ?>
				</h2>
				<p class="lead text-muted">
					<?php esc_html_e( 'Find answers to common questions about our practice and membership plans.', 'bmg-theme' ); ?>
				</p>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-8">

				<?php foreach ( $faq_categories as $cat_key => $category ) : ?>
					<div class="faq-category mb-5">
						<h3 class="faq-category__title h5 mb-4">
							<?php echo esc_html( $category['title'] ); ?>
						</h3>

						<div class="accordion" id="<?php echo esc_attr( $accordion_id . '-' . $cat_key ); ?>">
							<?php foreach ( $category['items'] as $index => $item ) :
								$item_count++;
								$collapse_id = 'faq-collapse-' . $item_count;
								$heading_id  = 'faq-heading-' . $item_count;
							?>
								<div class="accordion-item">
									<h4 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
										<button class="accordion-button collapsed"
												type="button"
												data-bs-toggle="collapse"
												data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>"
												aria-expanded="false"
												aria-controls="<?php echo esc_attr( $collapse_id ); ?>">
											<?php echo esc_html( $item['question'] ); ?>
										</button>
									</h4>
									<div id="<?php echo esc_attr( $collapse_id ); ?>"
										 class="accordion-collapse collapse"
										 aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
										 data-bs-parent="#<?php echo esc_attr( $accordion_id . '-' . $cat_key ); ?>">
										<div class="accordion-body">
											<?php echo wp_kses_post( wpautop( $item['answer'] ) ); ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endforeach; ?>

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
