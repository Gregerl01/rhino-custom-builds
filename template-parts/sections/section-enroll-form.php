<?php
/**
 * Enrollment Form Section
 *
 * Placeholder section for Gravity Forms enrollment form with HIPAA consent.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="enrollment-form" class="section section-light enroll-form-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="enroll-intro text-center mb-5">
					<h2 class="display-text h2 mb-3">
						<?php esc_html_e( 'Begin Your Enrollment', 'bmg-theme' ); ?>
					</h2>
					<p class="lead text-muted">
						<?php esc_html_e( 'Complete the form below to start your membership application. We\'ll contact you within 24 hours to schedule your initial consultation.', 'bmg-theme' ); ?>
					</p>
				</div>

				<div class="enroll-form-wrapper">
					<?php
					// Check if Gravity Forms is active.
					if ( class_exists( 'GFAPI' ) ) {
						// Replace '2' with your actual Gravity Forms enrollment form ID.
						echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' );
					} else {
						// Placeholder notice for development.
						?>
						<div class="enroll-placeholder">
							<div class="enroll-placeholder__icon">
								<svg viewBox="0 0 24 24" fill="currentColor">
									<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l4.59-4.58L18 11l-6 6z"/>
								</svg>
							</div>
							<h3><?php esc_html_e( 'Enrollment Form', 'bmg-theme' ); ?></h3>
							<p><?php esc_html_e( 'The Gravity Forms enrollment form will be displayed here. The form will include:', 'bmg-theme' ); ?></p>
							<ul class="enroll-placeholder__list">
								<li><?php esc_html_e( 'Personal information', 'bmg-theme' ); ?></li>
								<li><?php esc_html_e( 'Contact details', 'bmg-theme' ); ?></li>
								<li><?php esc_html_e( 'Plan selection', 'bmg-theme' ); ?></li>
								<li><?php esc_html_e( 'HIPAA consent acknowledgment', 'bmg-theme' ); ?></li>
								<li><?php esc_html_e( 'Payment information (via Authorize.net)', 'bmg-theme' ); ?></li>
							</ul>
						</div>
						<?php
					}
					?>
				</div>

				<div class="enroll-notice mt-5">
					<div class="enroll-notice__content">
						<svg class="enroll-notice__icon" viewBox="0 0 24 24" fill="currentColor">
							<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15h2v2h-2v-2zm0-10h2v8h-2V7z"/>
						</svg>
						<div>
							<strong><?php esc_html_e( 'Your privacy is protected.', 'bmg-theme' ); ?></strong>
							<p class="mb-0">
								<?php
								printf(
									/* translators: %s: link to privacy policy */
									esc_html__( 'All information submitted is encrypted and handled in accordance with HIPAA regulations. View our %s for details.', 'bmg-theme' ),
									'<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'bmg-theme' ) . '</a>'
								);
								?>
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
