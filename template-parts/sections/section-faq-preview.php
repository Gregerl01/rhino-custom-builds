<?php
/**
 * FAQ Preview Section - BMG Homepage
 *
 * Light section with 4 common questions in Bootstrap accordion.
 * Clean borders, smooth animations, restrained design.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// FAQ content — matches CONTENT.md Section 1.6 + answers from Section 7.2.
$faqs = array(
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
);
?>

<section id="faq-preview" class="section section-light reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="text-center mb-5">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( 'Common Questions', 'bmg-theme' ); ?>
					</h2>
					<div class="silver-rule"></div>
				</div>

				<div class="accordion faq-accordion" id="faqPreviewAccordion">
					<?php foreach ( $faqs as $index => $faq ) : ?>
						<div class="accordion-item">
							<h3 class="accordion-header">
								<button class="accordion-button<?php echo 0 !== $index ? ' collapsed' : ''; ?>"
										type="button"
										data-bs-toggle="collapse"
										data-bs-target="#faqPreview<?php echo esc_attr( $index ); ?>"
										aria-expanded="<?php echo 0 === $index ? 'true' : 'false'; ?>"
										aria-controls="faqPreview<?php echo esc_attr( $index ); ?>">
									<?php echo esc_html( $faq['question'] ); ?>
								</button>
							</h3>
							<div id="faqPreview<?php echo esc_attr( $index ); ?>"
								 class="accordion-collapse collapse<?php echo 0 === $index ? ' show' : ''; ?>"
								 data-bs-parent="#faqPreviewAccordion">
								<div class="accordion-body">
									<p><?php echo esc_html( $faq['answer'] ); ?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="text-center mt-4">
					<a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>" class="text-link">
						<?php esc_html_e( 'View All Questions', 'bmg-theme' ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
