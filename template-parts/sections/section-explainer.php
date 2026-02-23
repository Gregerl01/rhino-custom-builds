<?php
/**
 * Explainer Section
 *
 * Educational section explaining the business or service model.
 * Clean, minimal — let the text breathe.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="explainer" class="section section-light reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center bmg-reveal">

				<h2 class="explainer__heading display-text">
					<?php esc_html_e( '[Explainer Section Headline]', 'bmg-theme' ); ?>
				</h2>

				<div class="silver-rule"></div>

				<div class="explainer__text content-narrow">
					<p>
						<?php esc_html_e( '[Explainer paragraph 1 — describe the problem or gap in the industry.]', 'bmg-theme' ); ?>
					</p>
					<p>
						<?php esc_html_e( '[Explainer paragraph 2 — describe how this business or service model addresses it.]', 'bmg-theme' ); ?>
					</p>
					<p>
						<?php esc_html_e( '[Explainer paragraph 3 — connect the model to the practice/business founding conviction.]', 'bmg-theme' ); ?>
					</p>
				</div>

			</div>
		</div>
	</div>
</section>
