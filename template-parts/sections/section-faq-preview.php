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

// FAQ content.
$faqs = array(
	array(
		'question' => __( 'What is concierge medicine?', 'bmg-theme' ),
		'answer'   => __( 'Concierge medicine is a membership-based approach where your physician limits their patient panel to provide more personalized, accessible, and comprehensive care. Members pay an annual or monthly fee for enhanced services beyond what traditional insurance-based practices offer.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Will I still need health insurance?', 'bmg-theme' ),
		'answer'   => __( 'Yes. Concierge membership covers your primary care relationship and enhanced access. Health insurance remains important for hospitalizations, specialist care, prescriptions, and emergencies. Many of our members find their overall healthcare costs decrease due to better preventive care.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'What happens if I need to see a specialist?', 'bmg-theme' ),
		'answer'   => __( 'Your physician personally coordinates specialist referrals, ensuring the specialist has your complete medical history and context. You benefit from priority scheduling and a physician who follows up on every referral to ensure continuity of care.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'How do I get started?', 'bmg-theme' ),
		'answer'   => __( 'Begin with a private consultation — by phone or in person — where we discuss your health goals and determine if our practice is the right fit. There is no obligation, and we welcome your questions.', 'bmg-theme' ),
	),
);
?>

<section id="faq-preview" class="section section-light reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="text-center mb-5">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( 'Commonly Asked Questions', 'bmg-theme' ); ?>
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
						<?php esc_html_e( 'View all frequently asked questions', 'bmg-theme' ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
