<?php
/**
 * Contact Form Section
 *
 * Placeholder section for Gravity Forms contact form.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="contact-form" class="section section-charcoal contact-form-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="text-center mb-5">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( 'Send Us a Message', 'bmg-theme' ); ?>
					</h2>
					<p class="lead">
						<?php esc_html_e( 'Have a question or ready to learn more? We\'d love to hear from you.', 'bmg-theme' ); ?>
					</p>
				</div>

				<div class="contact-form-wrapper">
					<?php
					// Check if Gravity Forms is active and a form exists.
					if ( class_exists( 'GFAPI' ) ) {
						// Replace '1' with your actual Gravity Forms form ID.
						echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' );
					} else {
						// Placeholder form for development.
						?>
						<form class="contact-form" action="#" method="post">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="contact-name" class="form-label"><?php esc_html_e( 'Name', 'bmg-theme' ); ?></label>
									<input type="text" class="form-control" id="contact-name" name="name" required>
								</div>
								<div class="col-md-6">
									<label for="contact-email" class="form-label"><?php esc_html_e( 'Email', 'bmg-theme' ); ?></label>
									<input type="email" class="form-control" id="contact-email" name="email" required>
								</div>
								<div class="col-12">
									<label for="contact-phone" class="form-label"><?php esc_html_e( 'Phone (optional)', 'bmg-theme' ); ?></label>
									<input type="tel" class="form-control" id="contact-phone" name="phone">
								</div>
								<div class="col-12">
									<label for="contact-message" class="form-label"><?php esc_html_e( 'Message', 'bmg-theme' ); ?></label>
									<textarea class="form-control" id="contact-message" name="message" rows="5" required></textarea>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-light w-100">
										<?php esc_html_e( 'Send Message', 'bmg-theme' ); ?>
									</button>
								</div>
							</div>
							<p class="form-note text-center mt-3">
								<?php esc_html_e( 'Gravity Forms will replace this placeholder form.', 'bmg-theme' ); ?>
							</p>
						</form>
						<?php
					}
					?>
				</div>

			</div>
		</div>
	</div>
</section>
