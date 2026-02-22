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

// Dynamic phone from Customizer.
$phone_display = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
$phone_link    = preg_replace( '/[^0-9+]/', '', $phone_display );
?>

<section id="cta" class="section section-charcoal reveal-on-scroll">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">

				<h2 class="cta__heading display-text">
					<?php esc_html_e( 'The First Step Is a Conversation', 'bmg-theme' ); ?>
				</h2>

				<p class="cta__text">
					<?php esc_html_e( 'Schedule a private consultation to discuss your health priorities, ask questions about membership, and determine which tier aligns with your needs. There is no obligation and no pressure.', 'bmg-theme' ); ?>
				</p>

				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta__button">
					<?php esc_html_e( 'Schedule a Consultation', 'bmg-theme' ); ?>
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
