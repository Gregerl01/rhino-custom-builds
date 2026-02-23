<?php
/**
 * Enrollment Form Section
 *
 * Displays Gravity Forms enrollment form when available, otherwise
 * shows a structured placeholder matching CONTENT.md Section 4.2.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="enrollment-form" class="section section-light enroll-form-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<div class="enroll-form-wrapper">
					<?php
					// Check if Gravity Forms is active.
					if ( class_exists( 'GFAPI' ) ) {
						// Replace '2' with your actual Gravity Forms enrollment form ID.
						echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' );
					} else {
						// Structured placeholder matching CONTENT.md Section 4.2.
						?>
						<div class="enroll-placeholder">
							<div class="enroll-placeholder__icon">
								<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
									<path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l4.59-4.58L18 11l-6 6z"/>
								</svg>
							</div>
							<h3><?php esc_html_e( 'Enrollment Application', 'bmg-theme' ); ?></h3>
							<p><?php esc_html_e( 'This form will be powered by Gravity Forms. The following sections and fields are required:', 'bmg-theme' ); ?></p>

							<div class="enroll-placeholder__sections">
								<div class="enroll-placeholder__section">
									<h4><?php esc_html_e( 'Section 1: Personal Information', 'bmg-theme' ); ?></h4>
									<ul>
										<li><?php esc_html_e( 'Full legal name (first, last)', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Date of birth', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Phone number (primary)', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Email address', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Preferred method of contact (phone / email / text)', 'bmg-theme' ); ?></li>
									</ul>
								</div>

								<div class="enroll-placeholder__section">
									<h4><?php esc_html_e( 'Section 2: Plan Selection', 'bmg-theme' ); ?></h4>
									<ul>
										<li><?php esc_html_e( 'Desired membership tier ([Plan Tier 1] / [Plan Tier 2] / [Plan Tier 3])', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Billing preference (Monthly / Annual)', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Number of family members to enroll (if applicable)', 'bmg-theme' ); ?></li>
									</ul>
								</div>

								<div class="enroll-placeholder__section">
									<h4><?php esc_html_e( 'Section 3: Insurance Information (optional)', 'bmg-theme' ); ?></h4>
									<ul>
										<li><?php esc_html_e( 'Insurance carrier', 'bmg-theme' ); ?></li>
										<li><?php esc_html_e( 'Member ID', 'bmg-theme' ); ?></li>
									</ul>
									<p class="enroll-placeholder__note">
										<?php esc_html_e( 'Insurance information is optional. Membership fees are separate from insurance. We will discuss how your existing coverage coordinates with membership during your consultation.', 'bmg-theme' ); ?>
									</p>
								</div>

								<div class="enroll-placeholder__section">
									<h4><?php esc_html_e( 'Section 4: HIPAA Acknowledgment', 'bmg-theme' ); ?></h4>
									<p class="enroll-placeholder__note">
										<?php
										printf(
											/* translators: %s: link to privacy policy */
											esc_html__( 'Required checkbox: "I acknowledge that I have read and understand the [Business Name] Notice of Privacy Practices, and I consent to the collection, use, and transmission of my health information as described therein." Links to %s.', 'bmg-theme' ),
											'<a href="' . esc_url( home_url( '/privacy-policy/' ) ) . '">' . esc_html__( 'Privacy Policy', 'bmg-theme' ) . '</a>'
										);
										?>
									</p>
								</div>

								<div class="enroll-placeholder__section">
									<h4><?php esc_html_e( 'Section 5: Submission', 'bmg-theme' ); ?></h4>
									<p class="enroll-placeholder__note">
										<?php esc_html_e( 'Submit button: "Submit Enrollment Application"', 'bmg-theme' ); ?>
									</p>
									<p class="enroll-placeholder__note">
										<?php esc_html_e( 'Below button: "You will not be charged at this step. A member of our team will contact you to finalize enrollment and payment."', 'bmg-theme' ); ?>
									</p>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>

				<div class="enroll-notice mt-5">
					<div class="enroll-notice__content">
						<svg class="enroll-notice__icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
							<path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2z"/>
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
