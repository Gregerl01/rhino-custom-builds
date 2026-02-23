<?php
/**
 * Template Name: Plans Page
 *
 * Template for the Plans/Pricing comparison page.
 *
 * @package starter-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<!-- 3.1 Hero / Intro -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'Membership Plans', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( '[Plans page intro — describe what all tiers include and how they differ.]', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// 3.2 Comparison Table.
	get_template_part( 'template-parts/sections/section', 'plans-comparison' );
	?>

	<!-- 3.3 Plans CTA -->
	<?php
	$plans_phone_display = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
	$plans_phone_link    = preg_replace( '/[^0-9+]/', '', $plans_phone_display );
	?>
	<section class="section section-charcoal reveal-on-scroll">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">

					<h2 class="cta__heading display-text">
						<?php esc_html_e( '[Plans Page CTA Headline]', 'bmg-theme' ); ?>
					</h2>

					<p class="cta__text">
						<?php esc_html_e( '[Plans page CTA body copy.]', 'bmg-theme' ); ?>
					</p>

					<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cta__button">
						<?php esc_html_e( '[Plans Page CTA Button Text]', 'bmg-theme' ); ?>
					</a>

					<p class="cta__phone">
						<a href="tel:<?php echo esc_attr( $plans_phone_link ); ?>">
							<?php
							echo esc_html(
								sprintf(
									/* translators: %s: phone number */
									__( 'Call %s', 'bmg-theme' ),
									$plans_phone_display
								)
							);
							?>
						</a>
					</p>

				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
