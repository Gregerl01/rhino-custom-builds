<?php
/**
 * CTA Section - Homepage
 *
 * Charcoal section with consultation prompt.
 * Generous spacing, refined typography, clear call-to-action.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic phone from Customizer.
$phone_display = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
$phone_link    = preg_replace( '/[^0-9+]/', '', $phone_display );

// CTA background image from Customizer.
$cta_bg = get_theme_mod( 'bmg_cta_background', '' );
if ( ! $cta_bg ) {
	// Fallback to placeholder image in media library.
	$cta_bg = home_url( '/wp-content/uploads/placeholder-cta-background.webp' );
}
?>

<section id="cta" class="section section-cta reveal-on-scroll">
	<div class="cta-background" style="background-image: url(<?php echo esc_url( $cta_bg ); ?>);"></div>
	<div class="container position-relative" style="z-index: 2;">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center bmg-reveal">

				<h2 class="cta__heading display-text">
					<?php esc_html_e( '[CTA Headline]', 'bmg-theme' ); ?>
				</h2>

				<p class="cta__text">
					<?php esc_html_e( '[CTA body copy — one to two sentences encouraging the visitor to take the next step.]', 'bmg-theme' ); ?>
				</p>

				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta__button">
					<?php esc_html_e( '[CTA Button Text]', 'bmg-theme' ); ?>
				</a>

				<p class="cta__phone">
					<a href="tel:<?php echo esc_attr( $phone_link ); ?>">
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: phone number */
								__( 'Call %s', 'bmg-theme' ),
								$phone_display
							)
						);
						?>
					</a>
				</p>

			</div>
		</div>
	</div>
</section>
