<?php
/**
 * Hero Section - BMG Homepage
 *
 * Full-viewport dark section with animated headline and ghost-button CTAs.
 * Refined luxury editorial aesthetic.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Get Customizer settings.
$headline         = get_theme_mod( 'hero_headline', __( 'Healthcare Designed for How You Live', 'bmg-theme' ) );
$subtitle         = get_theme_mod( 'hero_subtitle', __( 'A physician who knows you personally, available when it matters — with the time to do it right.', 'bmg-theme' ) );
$background_image = get_theme_mod( 'hero_background_image', '' );
$overlay_opacity  = get_theme_mod( 'hero_overlay_opacity', 70 );

// CTA settings.
$cta_primary_text   = get_theme_mod( 'hero_cta_primary_text', __( 'Explore Membership Plans', 'bmg-theme' ) );
$cta_primary_url    = get_theme_mod( 'hero_cta_primary_url', '#plans' );
$cta_secondary_text = get_theme_mod( 'hero_cta_secondary_text', __( 'Learn How It Works', 'bmg-theme' ) );
$cta_secondary_url  = get_theme_mod( 'hero_cta_secondary_url', '#explainer' );

// Build inline style for background div if image is set.
$bg_style = '';
if ( $background_image ) {
	$bg_style = sprintf(
		'background-image: url(%s);',
		esc_url( $background_image )
	);
}
?>

<section id="hero" class="section-hero">
	<?php if ( $background_image ) : ?>
		<div class="section-hero__background" style="<?php echo esc_attr( $bg_style ); ?>"></div>
		<div class="section-hero__overlay section-hero__overlay--image" style="opacity: <?php echo esc_attr( $overlay_opacity / 100 ); ?>;"></div>
	<?php else : ?>
		<div class="section-hero__overlay"></div>
	<?php endif; ?>
	<div class="container position-relative">
		<div class="row justify-content-center">
			<div class="col-lg-10 col-xl-8 text-center">

				<?php if ( $headline ) : ?>
					<h1 class="section-hero__headline hero-animate">
						<?php echo esc_html( $headline ); ?>
					</h1>
				<?php endif; ?>

				<div class="silver-rule hero-animate hero-animate--delay-1"></div>

				<?php if ( $subtitle ) : ?>
					<p class="section-hero__subtitle hero-animate hero-animate--delay-2">
						<?php echo esc_html( $subtitle ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $cta_primary_text || $cta_secondary_text ) : ?>
					<div class="section-hero__ctas hero-animate hero-animate--delay-3">

						<?php if ( $cta_primary_text ) : ?>
							<a href="<?php echo esc_url( $cta_primary_url ); ?>" class="section-hero__btn">
								<?php echo esc_html( $cta_primary_text ); ?>
							</a>
						<?php endif; ?>

						<?php if ( $cta_secondary_text ) : ?>
							<a href="<?php echo esc_url( $cta_secondary_url ); ?>" class="section-hero__btn section-hero__btn--secondary">
								<?php echo esc_html( $cta_secondary_text ); ?>
							</a>
						<?php endif; ?>

					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
