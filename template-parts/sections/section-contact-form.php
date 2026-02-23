<?php
/**
 * Contact Form Section — Contact Page
 *
 * Displays Gravity Forms contact form when available, otherwise a
 * placeholder form matching CONTENT.md Section 5.3 fields.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

$phone_display = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
$phone_link    = preg_replace( '/[^0-9+]/', '', $phone_display );
?>

<section id="contact-form" class="section section-charcoal contact-form-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="text-center mb-5">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( 'Send Us a Message', 'bmg-theme' ); ?>
					</h2>
				</div>

				<div class="contact-form-wrapper">
					<?php
					// Check if Gravity Forms is active.
					if ( class_exists( 'GFAPI' ) ) {
						// Replace '1' with your actual Gravity Forms contact form ID.
						echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' );
					} else {
						// Placeholder form matching CONTENT.md Section 5.3.
						?>
						<form class="contact-form" action="#" method="post">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="contact-first-name" class="form-label"><?php esc_html_e( 'First Name', 'bmg-theme' ); ?></label>
									<input type="text" class="form-control" id="contact-first-name" name="first_name" required>
								</div>
								<div class="col-md-6">
									<label for="contact-last-name" class="form-label"><?php esc_html_e( 'Last Name', 'bmg-theme' ); ?></label>
									<input type="text" class="form-control" id="contact-last-name" name="last_name" required>
								</div>
								<div class="col-md-6">
									<label for="contact-email" class="form-label"><?php esc_html_e( 'Email', 'bmg-theme' ); ?></label>
									<input type="email" class="form-control" id="contact-email" name="email" required>
								</div>
								<div class="col-md-6">
									<label for="contact-phone" class="form-label"><?php esc_html_e( 'Phone (optional)', 'bmg-theme' ); ?></label>
									<input type="tel" class="form-control" id="contact-phone" name="phone">
								</div>
								<div class="col-12">
									<label for="contact-subject" class="form-label"><?php esc_html_e( 'Subject', 'bmg-theme' ); ?></label>
									<select class="form-select" id="contact-subject" name="subject" required>
										<option value=""><?php esc_html_e( 'Select a subject', 'bmg-theme' ); ?></option>
										<option value="general"><?php esc_html_e( 'General Inquiry', 'bmg-theme' ); ?></option>
										<option value="membership"><?php esc_html_e( 'Membership Question', 'bmg-theme' ); ?></option>
										<option value="patient"><?php esc_html_e( 'Current Patient', 'bmg-theme' ); ?></option>
										<option value="other"><?php esc_html_e( 'Other', 'bmg-theme' ); ?></option>
									</select>
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
						</form>
						<?php
					}
					?>
				</div>

				<div class="contact-urgent-note mt-4 text-center">
					<p>
						<?php
						printf(
							/* translators: %s: phone link */
							esc_html__( '[Urgent contact note. Call %s for time-sensitive matters. This form is not monitored in real time.]', 'bmg-theme' ),
							'<a href="tel:' . esc_attr( $phone_link ) . '">' . esc_html( $phone_display ) . '</a>'
						);
						?>
					</p>
				</div>

			</div>
		</div>
	</div>
</section>
