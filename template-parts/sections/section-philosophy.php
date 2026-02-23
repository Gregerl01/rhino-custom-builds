<?php
/**
 * Philosophy Section — About Page
 *
 * Business philosophy, background, and founding conviction.
 * Four paragraphs, light section, centered narrow column.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="philosophy" class="section section-light reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="text-center mb-5">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( '[Philosophy Section Headline]', 'bmg-theme' ); ?>
					</h2>
					<div class="silver-rule"></div>
				</div>

				<div class="philosophy__text content-narrow">
					<p>
						<?php esc_html_e( '[Philosophy paragraph 1 — founder background and early career.]', 'bmg-theme' ); ?>
					</p>
					<p>
						<?php esc_html_e( '[Philosophy paragraph 2 — industry problems that motivated the founding.]', 'bmg-theme' ); ?>
					</p>
					<p>
						<?php esc_html_e( '[Philosophy paragraph 3 — personal turning point or conviction.]', 'bmg-theme' ); ?>
					</p>
					<p>
						<?php esc_html_e( '[Philosophy paragraph 4 — what the business stands for today.]', 'bmg-theme' ); ?>
					</p>
				</div>

			</div>
		</div>
	</div>
</section>
