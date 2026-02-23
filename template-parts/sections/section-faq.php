<?php
/**
 * FAQ Section — Full FAQ Page
 *
 * Bootstrap Accordion with all 10 questions from CONTENT.md Section 7.2.
 * Q8 uses dynamic bmg_phone variable.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variable for Q8.
$phone_display = get_theme_mod( 'bmg_phone', '(000) 000-0000' );

// FAQ data — CONTENT.md Section 7.2.
$faq_items = array(
	array(
		'question' => __( '[FAQ question 1]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 1]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 2]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 2]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 3]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 3]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 4]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 4]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 5]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 5]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 6]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 6]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 7]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 7]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 8]', 'bmg-theme' ),
		'answer'   => sprintf(
			/* translators: %s: phone number */
			__( '[FAQ answer 8 — enrollment process. Phone: %s.]', 'bmg-theme' ),
			$phone_display
		),
	),
	array(
		'question' => __( '[FAQ question 9]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 9 — privacy and compliance information.]', 'bmg-theme' ),
	),
	array(
		'question' => __( '[FAQ question 10]', 'bmg-theme' ),
		'answer'   => __( '[FAQ answer 10]', 'bmg-theme' ),
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
