<?php
/**
 * Hero Section - BMG Homepage
 *
 * Full-viewport dark section with animated headline and decorative elements.
 * Refined luxury editorial aesthetic.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Get Customizer settings.
$headline         = get_theme_mod( 'hero_headline', __( 'Medicine the Way It Should Be', 'bmg-theme' ) );
$subtitle         = get_theme_mod( 'hero_subtitle', __( 'Personalized, unhurried care for patients who expect more.', 'bmg-theme' ) );
$background_image = get_theme_mod( 'hero_background_image', '' );
$overlay_opacity  = get_theme_mod( 'hero_overlay_opacity', 70 );

// Build inline style for background image if set.
$hero_style = '';
if ( $background_image ) {
	$hero_style = sprintf(
		'background-image: linear-gradient(rgba(10, 10, 10, %s), rgba(10, 10, 10, %s)), url(%s); background-size: cover; background-position: center;',
		$overlay_opacity / 100,
		$overlay_opacity / 100,
		esc_url( $background_image )
	);
}
?>

<section id="hero" class="section-hero"<?php echo $hero_style ? ' style="' . esc_attr( $hero_style ) . '"' : ''; ?>>
	<div class="section-hero__overlay"></div>
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

			</div>
		</div>
	</div>
</section>
