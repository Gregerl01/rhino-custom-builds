<?php
/**
 * Template Name: Shop Landing
 *
 * Category-first discovery page at /shop/. Shows 9 category tiles,
 * vehicle selector pills, install callout, brand carousel, and a
 * closing CTA. V1 uses content arrays (no WooCommerce).
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
$categories    = function_exists( 'bmg_get_shop_categories' ) ? bmg_get_shop_categories() : array();

// Brand display names for the carousel.
$brand_names = array(
	'ARB', 'FOX', 'WARN', 'RIGID INDUSTRIES', 'METHOD RACE WHEELS',
	'BFGOODRICH', 'ROUGH COUNTRY', 'BAJA DESIGNS', 'SMITTYBILT', 'RHINO-RACK',
);
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'SHOP', 'bmg-theme' ),
			'headline' => __( 'PARTS. GEAR. INSTALLED RIGHT.', 'bmg-theme' ),
			'subline'  => __( 'Browse by category. Pick your brands. Request a quote.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== Install callout bar =========================================== ?>
	<?php
	get_template_part(
		'template-parts/components/callout',
		'install-bar',
		array( 'text' => __( 'All products include optional in-bay installation by certified builders.', 'bmg-theme' ) )
	);
	?>

	<?php // ===== 2. Category grid ============================================== ?>
	<section class="section-features section-features--shop" data-section="shop-categories">
		<div class="container">

			<header class="section-features__header">
				<span class="section-features__overline bmg-reveal">
					<?php esc_html_e( 'BROWSE BY CATEGORY', 'bmg-theme' ); ?>
				</span>
				<h2 class="section-features__headline bmg-reveal">
					<?php esc_html_e( 'EVERYTHING YOUR RIG NEEDS.', 'bmg-theme' ); ?>
				</h2>
			</header>

			<div class="section-features__grid bmg-reveal-stagger" role="list">
				<?php foreach ( $categories as $cat ) :
					$product_count = count( $cat['products'] ?? array() );

					// Look up the category's WP page by slug to get its Featured Image.
					$cat_page = get_page_by_path( 'shop/' . $cat['slug'] );
					$cat_thumb = $cat_page ? get_the_post_thumbnail_url( $cat_page->ID, 'large' ) : '';
					?>
					<a href="<?php echo esc_url( home_url( '/shop/' . $cat['slug'] . '/' ) ); ?>" class="service-card-xl bmg-reveal" role="listitem">

						<div class="service-card-xl__media">
							<?php if ( $cat_thumb ) : ?>
								<img src="<?php echo esc_url( $cat_thumb ); ?>" alt="<?php echo esc_attr( $cat['name'] ); ?>" loading="lazy" decoding="async">
							<?php else : ?>
								<div class="service-card-xl__placeholder" aria-hidden="true">
									<span class="service-card-xl__placeholder-label">
										<?php echo esc_html( $cat['overline'] ); ?>
									</span>
								</div>
							<?php endif; ?>
						</div>

						<div class="service-card-xl__body">
							<span class="service-card-xl__overline">
								<?php
								printf(
									/* translators: %d: number of featured products */
									esc_html__( '%d FEATURED PRODUCTS', 'bmg-theme' ),
									$product_count
								);
								?>
							</span>
							<h3 class="service-card-xl__title">
								<?php echo esc_html( $cat['name'] ); ?>
							</h3>
							<p class="service-card-xl__description">
								<?php echo esc_html( $cat['description'] ); ?>
							</p>
							<span class="service-card-xl__arrow" aria-hidden="true">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none">
									<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</span>
						</div>

					</a>
				<?php endforeach; ?>
			</div>

		</div>
	</section>

	<?php // ===== 3. Brand carousel ============================================= ?>
	<section class="section-shop-brands" data-section="shop-brands">
		<div class="container">
			<header class="section-shop-brands__header">
				<span class="section-shop-brands__overline bmg-reveal">
					<?php esc_html_e( 'AUTHORIZED DEALER', 'bmg-theme' ); ?>
				</span>
				<h2 class="section-shop-brands__headline bmg-reveal">
					<?php esc_html_e( 'BRANDS WE CARRY AND INSTALL.', 'bmg-theme' ); ?>
				</h2>
			</header>
		</div>

		<div class="brand-carousel bmg-reveal" aria-label="<?php esc_attr_e( 'Authorized dealer partners', 'bmg-theme' ); ?>">
			<div class="brand-carousel__track" aria-hidden="false">
				<?php for ( $pass = 0; $pass < 2; $pass++ ) :
					foreach ( $brand_names as $name ) :
						$aria = $pass === 1 ? 'true' : 'false';
						?>
						<div class="brand-carousel__item" aria-hidden="<?php echo esc_attr( $aria ); ?>">
							<span class="brand-carousel__name"><?php echo esc_html( $name ); ?></span>
						</div>
					<?php endforeach;
				endfor; ?>
			</div>
		</div>
	</section>

	<?php // ===== 4. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal">
						<?php esc_html_e( 'KNOW WHAT YOU NEED?', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-cta__headline bmg-reveal">
						<?php esc_html_e( 'SKIP THE BROWSING.', 'bmg-theme' ); ?>
					</h2>
					<p class="section-cta__subline bmg-reveal">
						<?php esc_html_e( "Tell us your vehicle and what you want — we'll quote it.", 'bmg-theme' ); ?>
					</p>
					<div class="section-cta__actions bmg-reveal">
						<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
							<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
						</a>
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
							<span class="section-cta__phone-label"><?php esc_html_e( 'or call', 'bmg-theme' ); ?></span>
							<span class="section-cta__phone-number"><?php echo esc_html( $phone_display ); ?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
