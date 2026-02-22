<?php
/**
 * CTA Section - BMG Homepage
 *
 * Charcoal section with consultation prompt.
 * Generous spacing, refined typography, clear call-to-action.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Placeholder phone number (will come from Customizer later).
$phone_display = '(555) 123-4567';
$phone_link    = '+15551234567';
?>

<section id="cta" class="section section-charcoal reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">

				<h2 class="cta__heading display-text">
					<?php esc_html_e( 'Is Concierge Care Right for You?', 'bmg-theme' ); ?>
				</h2>

				<p class="cta__text">
					<?php esc_html_e( 'Schedule a private consultation to learn how Baig Medical Group can transform your healthcare experience. No obligation, no pressure — just a conversation.', 'bmg-theme' ); ?>
				</p>

				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-outline-light btn-lg cta__button">
					<?php esc_html_e( 'Request a Consultation', 'bmg-theme' ); ?>
				</a>

				<p class="cta__phone">
					<?php esc_html_e( 'Or call', 'bmg-theme' ); ?>
					<a href="tel:<?php echo esc_attr( $phone_link ); ?>">
						<?php echo esc_html( $phone_display ); ?>
					</a>
				</p>

			</div>
		</div>
	</div>
</section>
