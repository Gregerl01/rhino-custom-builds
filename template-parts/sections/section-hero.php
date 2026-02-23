<?php
/**
 * Hero Section - Homepage
 *
 * Full-viewport dark section with animated headline and ghost-button CTAs.
 * Refined luxury editorial aesthetic.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Get Customizer settings.
$headline         = get_theme_mod( 'hero_headline', __( '[Hero Headline]', 'bmg-theme' ) );
$subtitle         = get_theme_mod( 'hero_subtitle', __( '[Hero subtitle — one or two sentences describing the value proposition.]', 'bmg-theme' ) );
$background_image = get_theme_mod( 'hero_background_image', '' );
$overlay_opacity  = get_theme_mod( 'hero_overlay_opacity', 70 );

// CTA settings.
$cta_primary_text   = get_theme_mod( 'hero_cta_primary_text', __( '[Primary CTA Text]', 'bmg-theme' ) );
$cta_primary_url    = get_theme_mod( 'hero_cta_primary_url', '#plans' );
$cta_secondary_text = get_theme_mod( 'hero_cta_secondary_text', __( '[Secondary CTA Text]', 'bmg-theme' ) );
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
	<div class="section-hero__background"<?php echo $bg_style ? ' style="' . esc_attr( $bg_style ) . '"' : ''; ?>></div>
	<?php if ( $background_image ) : ?>
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
