<?php
/**
 * FAQ Preview Section - Homepage
 *
 * Light section with 4 common questions in Bootstrap accordion.
 * Clean borders, smooth animations, restrained design.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// FAQ content — matches CONTENT.md Section 1.6 + answers from Section 7.2.
$faqs = array(
	array(
		'question' => __( '[FAQ question 1]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 1 — detailed response.]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 2]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 2 — detailed response.]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 3]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 3 — detailed response.]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 4]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 4 — detailed response.]', 'bmg-theme' ),
	),
);
?>

<section id="faq-preview" class="section section-light reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="text-center mb-5 bmg-reveal">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( 'Common Questions', 'bmg-theme' ); ?>
					</h2>
					<div class="silver-rule"></div>
				</div>

				<div class="accordion faq-accordion bmg-reveal-stagger" id="faqPreviewAccordion">
					<?php foreach ( $faqs as $index => $faq ) : ?>
						<div class="accordion-item bmg-reveal">
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
