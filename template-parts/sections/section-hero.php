<?php
/**
 * Homepage Hero — Rhino Custom Builds
 *
 * Full-viewport dark hero with parallax background, grain texture overlay,
 * overline + condensed display headline, dual CTA (red primary + ghost
 * secondary), trust strip with animated counters, and vehicle type selector.
 *
 * Content source: CONTENT.md → Homepage → Section 1 — Hero
 * Design spec:    CLAUDE.md → GSL Section Mapping → Hero
 * Interaction:    references/rhino-build-spec.md → #1 Vehicle Type Selector,
 *                 #9 Trust Strip Counter, parallax overlay changes
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

// Customizer fields (bmg_hero_* keys — see CONTENT.md).
$overline          = get_theme_mod( 'bmg_hero_overline', __( 'CUSTOM TRUCK & OFF-ROAD SHOP', 'bmg-theme' ) );
$headline          = get_theme_mod( 'bmg_hero_headline', __( 'BUILT FOR WHERE THE ROAD ENDS.', 'bmg-theme' ) );
$subline           = get_theme_mod( 'bmg_hero_subline', __( 'Spray-on bedliners, protective coatings, off-road gear, and full upfitting — installed in-house by certified builders.', 'bmg-theme' ) );
$cta_primary_text  = get_theme_mod( 'bmg_hero_cta_primary_text', __( 'Get a Quote', 'bmg-theme' ) );
$cta_primary_url   = get_theme_mod( 'bmg_hero_cta_primary_url', '/quote/' );
$cta_secondary_text = get_theme_mod( 'bmg_hero_cta_secondary_text', __( 'Explore Services', 'bmg-theme' ) );
$cta_secondary_url = get_theme_mod( 'bmg_hero_cta_secondary_url', '#features' );
$background_image  = get_theme_mod( 'bmg_hero_background_image', '' );

// Trust strip — 4 flat Customizer fields.
$trust_items = array(
	get_theme_mod( 'bmg_hero_trust_item_1', __( 'LIFETIME WARRANTY', 'bmg-theme' ) ),
	get_theme_mod( 'bmg_hero_trust_item_2', __( '4,200+ INSTALLS', 'bmg-theme' ) ),
	get_theme_mod( 'bmg_hero_trust_item_3', __( 'CERTIFIED INSTALLERS', 'bmg-theme' ) ),
	get_theme_mod( 'bmg_hero_trust_item_4', __( '4.9★ GOOGLE', 'bmg-theme' ) ),
);
$trust_items = array_filter( array_map( 'trim', $trust_items ) );

// Background inline style.
$bg_style = $background_image
	? sprintf( 'background-image: url(%s);', esc_url( $background_image ) )
	: '';

// bmg_parse_trust_item() lives in inc/template-helpers.php (loaded via functions.php)
?>

<section id="hero" class="section-hero section-hero--dark" data-section="hero">

	<div class="section-hero__background"<?php echo $bg_style ? ' style="' . esc_attr( $bg_style ) . '"' : ''; ?>></div>
	<div class="section-hero__overlay" aria-hidden="true"></div>
	<div class="section-hero__grain" aria-hidden="true"></div>

	<div class="container position-relative">
		<div class="row">
			<div class="col-lg-10 col-xl-9">

				<?php if ( $overline ) : ?>
					<span class="section-hero__overline hero-animate">
						<?php echo esc_html( $overline ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $headline ) : ?>
					<h1 class="section-hero__headline hero-animate hero-animate--delay-1">
						<?php echo esc_html( $headline ); ?>
					</h1>
				<?php endif; ?>

				<?php if ( $subline ) : ?>
					<p class="section-hero__subline hero-animate hero-animate--delay-2">
						<?php echo esc_html( $subline ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $cta_primary_text || $cta_secondary_text ) : ?>
					<div class="section-hero__ctas hero-animate hero-animate--delay-3">

						<?php if ( $cta_primary_text ) : ?>
							<a href="<?php echo esc_url( $cta_primary_url ); ?>" class="btn-rhino btn-rhino--primary section-hero__cta section-hero__cta--primary">
								<span><?php echo esc_html( $cta_primary_text ); ?></span>
								<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</a>
						<?php endif; ?>

						<?php if ( $cta_secondary_text ) : ?>
							<a href="<?php echo esc_url( $cta_secondary_url ); ?>" class="btn-rhino btn-rhino--ghost-dark section-hero__cta section-hero__cta--secondary">
								<span><?php echo esc_html( $cta_secondary_text ); ?></span>
								<svg class="btn-rhino__arrow btn-rhino__arrow--down" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M12 5v14M6 13l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</a>
						<?php endif; ?>

					</div>
				<?php endif; ?>

				<?php if ( ! empty( $trust_items ) ) : ?>
					<ul class="section-hero__trust-strip hero-animate hero-animate--delay-4" role="list">
						<?php foreach ( $trust_items as $item ) :
							$parsed = bmg_parse_trust_item( $item );
							?>
							<li class="section-hero__trust-item">
								<?php if ( $parsed ) : ?>
									<?php if ( $parsed['prefix'] ) : ?><span class="section-hero__trust-item-prefix"><?php echo esc_html( $parsed['prefix'] ); ?></span><?php endif; ?>
									<span class="section-hero__trust-item-count" data-count-to="<?php echo esc_attr( $parsed['count'] ); ?>" data-count-format="<?php echo esc_attr( $parsed['format'] ); ?>"><?php echo esc_html( $parsed['format'] ); ?></span>
									<?php if ( $parsed['plus'] ) : ?><span class="section-hero__trust-item-plus">+</span><?php endif; ?>
									<?php if ( $parsed['suffix'] ) : ?><span class="section-hero__trust-item-suffix"><?php echo esc_html( $parsed['suffix'] ); ?></span><?php endif; ?>
								<?php else : ?>
									<?php echo esc_html( $item ); ?>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

			</div>
		</div>

		<?php // Vehicle selector removed — available for future use on /shop/ if needed. ?>

	</div>

</section>
