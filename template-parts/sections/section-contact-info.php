<?php
/**
 * Contact Info Section — Contact Page
 *
 * Business contact details, hours, after-hours note, and map.
 * All values from Customizer (bmg_* keys).
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variables from Customizer.
$phone          = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
$phone_link     = preg_replace( '/[^0-9+]/', '', $phone );
$email          = get_theme_mod( 'bmg_email', 'info@example.com' );
$address_street = get_theme_mod( 'bmg_address_street', '[Street Address]' );
$address_city   = get_theme_mod( 'bmg_address_city', '[City, State ZIP]' );
$hours_weekday  = get_theme_mod( 'bmg_office_hours', 'Monday – Friday: 8:00 AM – 5:00 PM' );
$hours_sat      = get_theme_mod( 'bmg_office_hours_sat', 'By appointment' );
$hours_sun      = get_theme_mod( 'bmg_office_hours_sun', 'Closed' );
$physician_last = get_theme_mod( 'bmg_physician_last_name', '[Last Name]' );
?>

<section id="contact-info" class="section section-light contact-info-section">
	<div class="container">
		<div class="row g-5">

			<!-- Contact Details -->
			<div class="col-lg-6">
				<div class="contact-details">

					<div class="contact-item">
						<div class="contact-item__icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
							</svg>
						</div>
						<div class="contact-item__content">
							<h3 class="contact-item__label"><?php esc_html_e( 'Phone', 'bmg-theme' ); ?></h3>
							<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="contact-item__value">
								<?php echo esc_html( $phone ); ?>
							</a>
						</div>
					</div>

					<div class="contact-item">
						<div class="contact-item__icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
								<polyline points="22,6 12,13 2,6"/>
							</svg>
						</div>
						<div class="contact-item__content">
							<h3 class="contact-item__label"><?php esc_html_e( 'Email', 'bmg-theme' ); ?></h3>
							<a href="mailto:<?php echo esc_attr( $email ); ?>" class="contact-item__value">
								<?php echo esc_html( $email ); ?>
							</a>
						</div>
					</div>

					<div class="contact-item">
						<div class="contact-item__icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
								<circle cx="12" cy="10" r="3"/>
							</svg>
						</div>
						<div class="contact-item__content">
							<h3 class="contact-item__label"><?php esc_html_e( 'Address', 'bmg-theme' ); ?></h3>
							<address class="contact-item__value">
								<?php echo esc_html( $address_street ); ?><br>
								<?php echo esc_html( $address_city ); ?>
							</address>
						</div>
					</div>

					<div class="contact-item">
						<div class="contact-item__icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
								<circle cx="12" cy="12" r="10"/>
								<polyline points="12 6 12 12 16 14"/>
							</svg>
						</div>
						<div class="contact-item__content">
							<h3 class="contact-item__label"><?php esc_html_e( 'Business Hours', 'bmg-theme' ); ?></h3>
							<div class="contact-item__value">
								<?php echo esc_html( $hours_weekday ); ?><br>
								<?php
								echo esc_html(
									sprintf(
										/* translators: %s: Saturday hours */
										__( 'Saturday: %s', 'bmg-theme' ),
										$hours_sat
									)
								);
								?><br>
								<?php
								echo esc_html(
									sprintf(
										/* translators: %s: Sunday hours */
										__( 'Sunday: %s', 'bmg-theme' ),
										$hours_sun
									)
								);
								?>
							</div>
						</div>
					</div>

					<!-- After-hours note -->
					<div class="contact-after-hours">
						<p>
							<?php
							echo esc_html(
								sprintf(
									/* translators: %s: physician last name */
									__( '[After-hours access note referencing Dr. %s.]', 'bmg-theme' ),
									$physician_last
								)
							);
							?>
						</p>
					</div>

				</div>
			</div>

			<!-- Map Placeholder -->
			<div class="col-lg-6">
				<div class="contact-map">
					<div class="contact-map__placeholder">
						<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
							<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
						</svg>
						<span><?php esc_html_e( 'Google Map — [City, State]', 'bmg-theme' ); ?></span>
						<span class="contact-map__note"><?php esc_html_e( 'Embedded map will display once street address is confirmed.', 'bmg-theme' ); ?></span>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
