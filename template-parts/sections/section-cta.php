<?php
/**
 * Homepage CTA Section — Rhino Custom Builds
 *
 * Dark closing band with dual CTA (red primary + amber phone fallback),
 * microcopy, hours reminder, and a trust-strip echo from the hero.
 *
 * Content:  CONTENT.md → Homepage → Section 7 — CTA
 * Design:   CLAUDE.md → GSL Section Mapping → CTA + Design Tokens
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline  = get_theme_mod( 'bmg_cta_overline', __( 'READY WHEN YOU ARE', 'bmg-theme' ) );
$headline  = get_theme_mod( 'bmg_cta_headline', __( 'BUILD IT RIGHT. BUILD IT HERE.', 'bmg-theme' ) );
$subline   = get_theme_mod( 'bmg_cta_subline', __( 'Free quotes. No pressure. Lifetime warranty on every coating.', 'bmg-theme' ) );
$microcopy = get_theme_mod( 'bmg_cta_microcopy', __( 'Free quote. No obligation. Same-week availability on most installs.', 'bmg-theme' ) );
$hours     = get_theme_mod( 'bmg_cta_hours_reminder', __( 'Open Mon–Fri 7AM–6PM · Sat 8AM–2PM', 'bmg-theme' ) );

$cta_text = get_theme_mod( 'bmg_cta_button_text', __( 'Get a Quote', 'bmg-theme' ) );
$cta_url  = get_theme_mod( 'bmg_cta_button_url', '/quote/' );

// Phone fallback — pulls from Business Information panel so it stays
// consistent with the header, footer, and contact page.
$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

// Trust strip echo — reuse the hero values so editing the hero updates
// the echo automatically. Four flat keys, same defaults as hero.
$trust_echo = array_filter(
	array(
		get_theme_mod( 'bmg_hero_trust_item_1', __( 'LIFETIME WARRANTY', 'bmg-theme' ) ),
		get_theme_mod( 'bmg_hero_trust_item_2', __( '4,200+ INSTALLS', 'bmg-theme' ) ),
		get_theme_mod( 'bmg_hero_trust_item_3', __( 'CERTIFIED INSTALLERS', 'bmg-theme' ) ),
		get_theme_mod( 'bmg_hero_trust_item_4', __( '4.9★ GOOGLE', 'bmg-theme' ) ),
	)
);
?>

<section id="cta" class="section-cta section-cta--dark" data-section="cta">
	<div class="section-cta__grain" aria-hidden="true"></div>

	<div class="container position-relative">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-xl-9 text-center">

				<?php if ( $overline ) : ?>
					<span class="section-cta__overline bmg-reveal">
						<?php echo esc_html( $overline ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $headline ) : ?>
					<h2 class="section-cta__headline bmg-reveal">
						<?php echo esc_html( $headline ); ?>
					</h2>
				<?php endif; ?>

				<?php if ( $subline ) : ?>
					<p class="section-cta__subline bmg-reveal">
						<?php echo esc_html( $subline ); ?>
					</p>
				<?php endif; ?>

				<div class="section-cta__actions bmg-reveal">

					<?php if ( $cta_text ) : ?>
						<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-rhino btn-rhino--primary section-cta__primary">
							<span><?php echo esc_html( $cta_text ); ?></span>
							<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
						</a>
					<?php endif; ?>

					<?php if ( $phone_display && $phone_link ) : ?>
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone section-cta__phone">
							<svg class="section-cta__phone-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
							<span class="section-cta__phone-label"><?php esc_html_e( 'or call', 'bmg-theme' ); ?></span>
							<span class="section-cta__phone-number"><?php echo esc_html( $phone_display ); ?></span>
						</a>
					<?php endif; ?>

				</div>

				<?php if ( $microcopy ) : ?>
					<p class="section-cta__microcopy bmg-reveal">
						<?php echo esc_html( $microcopy ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $hours ) : ?>
					<p class="section-cta__hours bmg-reveal">
						<?php echo esc_html( $hours ); ?>
					</p>
				<?php endif; ?>

				<?php if ( ! empty( $trust_echo ) ) : ?>
					<ul class="section-cta__trust bmg-reveal" role="list">
						<?php foreach ( $trust_echo as $item ) : ?>
							<li class="section-cta__trust-item">
								<?php echo esc_html( $item ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
