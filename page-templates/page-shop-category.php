<?php
/**
 * Template Name: Shop Category
 *
 * Slug-based category page at /shop/{slug}/. Reads the current page
 * slug, loads its content via bmg_get_shop_category_content(), and
 * renders: dark header + brand strip + product grid + quote callout +
 * CTA band. V1 uses content arrays (no WooCommerce).
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$slug     = get_post_field( 'post_name', get_the_ID() );
$category = function_exists( 'bmg_get_shop_category_content' ) ? bmg_get_shop_category_content( $slug ) : null;

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

// Brand display-name lookup for the logo strip.
$brand_display = array(
	'arb'                => 'ARB',
	'fox'                => 'Fox',
	'warn'               => 'Warn',
	'rigid-industries'   => 'Rigid Industries',
	'method-race-wheels' => 'Method Race Wheels',
	'bfgoodrich'         => 'BFGoodrich',
	'rough-country'      => 'Rough Country',
	'baja-designs'       => 'Baja Designs',
	'smittybilt'         => 'Smittybilt',
	'rhino-rack'         => 'Rhino-Rack',
);

// Vehicle type display names for product pills.
$vehicle_display = array(
	'truck'     => __( 'Truck', 'bmg-theme' ),
	'jeep'      => __( 'Jeep', 'bmg-theme' ),
	'suv'       => __( 'SUV', 'bmg-theme' ),
	'van'       => __( 'Van', 'bmg-theme' ),
	'universal' => __( 'Universal', 'bmg-theme' ),
);

// Fallback when the slug has no entry in the registry.
if ( ! $category ) {
	?>
	<main id="main" class="site-main">
		<?php
		get_template_part(
			'template-parts/sections/section',
			'page-header',
			array(
				'overline' => __( 'SHOP', 'bmg-theme' ),
				'headline' => get_the_title(),
				'subline'  => __( '[CONTENT TBD — category not yet registered.]', 'bmg-theme' ),
			)
		);
		?>
	</main>
	<?php
	get_footer();
	return;
}

$products = $category['products'] ?? array();
$brands   = $category['brands'] ?? array();
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header with breadcrumb ================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'service-hero',
		array(
			'hero' => array(
				'breadcrumb' => array(
					array( 'label' => __( 'Home', 'bmg-theme' ),  'url' => '/' ),
					array( 'label' => __( 'Shop', 'bmg-theme' ),  'url' => '/shop/' ),
					array( 'label' => $category['name'],           'url' => '' ),
				),
				'overline'      => $category['overline'],
				'headline'      => $category['headline'],
				'subline'       => $category['description'],
				'cta_primary'   => array( 'label' => __( 'Request a Quote', 'bmg-theme' ), 'url' => '/quote/' ),
				'cta_secondary' => array( 'label' => __( 'Call Us', 'bmg-theme' ), 'url' => 'tel:' ),
				'trust_strip'   => array(
					__( 'OEM-GRADE PARTS', 'bmg-theme' ),
					__( 'CERTIFIED INSTALLERS', 'bmg-theme' ),
					__( 'INSTALLED IN-BAY', 'bmg-theme' ),
				),
			),
		)
	);
	?>

	<?php // ===== 2. Brand strip ================================================ ?>
	<?php if ( ! empty( $brands ) ) : ?>
		<section class="section-shop-brand-strip" data-section="shop-brand-strip">
			<div class="container">
				<span class="section-shop-brand-strip__label bmg-reveal">
					<?php esc_html_e( 'BRANDS IN THIS CATEGORY', 'bmg-theme' ); ?>
				</span>
				<ul class="section-shop-brand-strip__list bmg-reveal" role="list">
					<?php foreach ( $brands as $brand_slug ) :
						$name = isset( $brand_display[ $brand_slug ] ) ? $brand_display[ $brand_slug ] : strtoupper( $brand_slug );
						?>
						<li class="section-shop-brand-strip__item">
							<?php echo esc_html( $name ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 3. Product grid =============================================== ?>
	<?php if ( ! empty( $products ) ) : ?>
		<section class="section-shop-products" data-section="shop-products">
			<div class="container">
				<header class="section-shop-products__header">
					<span class="section-shop-products__overline bmg-reveal">
						<?php esc_html_e( 'FEATURED PRODUCTS', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-shop-products__headline bmg-reveal">
						<?php
						printf(
							/* translators: %s: category name */
							esc_html__( '%s WE CARRY AND INSTALL.', 'bmg-theme' ),
							esc_html( strtoupper( $category['name'] ) )
						);
						?>
					</h2>
				</header>

				<div class="section-shop-products__grid bmg-reveal-stagger" role="list">
					<?php foreach ( $products as $product ) :
						$brand_name = isset( $brand_display[ $product['brand'] ] ) ? $brand_display[ $product['brand'] ] : strtoupper( $product['brand'] );
						$quote_url  = add_query_arg(
							array(
								'category' => $category['slug'],
								'product'  => sanitize_title( $product['name'] ),
							),
							home_url( '/quote/' )
						);
						?>
						<article class="product-card bmg-reveal" role="listitem">

							<div class="product-card__media">
								<?php if ( ! empty( $product['image'] ) ) : ?>
									<img src="<?php echo esc_url( $product['image'] ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" loading="lazy" decoding="async">
								<?php else : ?>
									<div class="product-card__placeholder" aria-hidden="true">
										<span class="product-card__placeholder-label"><?php echo esc_html( $brand_name ); ?></span>
									</div>
								<?php endif; ?>
								<span class="product-card__brand-badge"><?php echo esc_html( $brand_name ); ?></span>
							</div>

							<div class="product-card__body">
								<h3 class="product-card__title"><?php echo esc_html( $product['name'] ); ?></h3>
								<p class="product-card__description"><?php echo esc_html( $product['description'] ); ?></p>

								<div class="product-card__meta">
									<span class="product-card__price">
										<?php
										if ( ! empty( $product['price'] ) && 'quote' !== strtolower( $product['price'] ) ) {
											echo esc_html( $product['price'] );
										} else {
											esc_html_e( 'Quote for pricing', 'bmg-theme' );
										}
										?>
									</span>

									<?php if ( ! empty( $product['vehicle_types'] ) ) : ?>
										<ul class="product-card__vehicle-pills" role="list">
											<?php foreach ( $product['vehicle_types'] as $vt ) :
												$vt_label = isset( $vehicle_display[ $vt ] ) ? $vehicle_display[ $vt ] : ucfirst( $vt );
												?>
												<li class="product-card__vehicle-pill"><?php echo esc_html( $vt_label ); ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>

								<a href="<?php echo esc_url( $quote_url ); ?>" class="btn-rhino btn-rhino--primary product-card__cta">
									<span><?php esc_html_e( 'Request Quote', 'bmg-theme' ); ?></span>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
								</a>
							</div>

						</article>
					<?php endforeach; ?>
				</div>

				<div class="section-shop-products__callout bmg-reveal">
					<h3 class="section-shop-products__callout-headline">
						<?php esc_html_e( "Don't see what you need?", 'bmg-theme' ); ?>
					</h3>
					<p class="section-shop-products__callout-body">
						<?php esc_html_e( "We carry more than what's listed here. Tell us what you're looking for and we'll source it.", 'bmg-theme' ); ?>
					</p>
					<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
						<span><?php esc_html_e( 'Request a Quote', 'bmg-theme' ); ?></span>
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
						</svg>
					</a>
				</div>

			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 4. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal"><?php esc_html_e( 'READY WHEN YOU ARE', 'bmg-theme' ); ?></span>
					<h2 class="section-cta__headline bmg-reveal"><?php esc_html_e( 'BUILD IT RIGHT. BUILD IT HERE.', 'bmg-theme' ); ?></h2>
					<p class="section-cta__subline bmg-reveal"><?php esc_html_e( 'Free quotes. OEM-grade parts. Installed by certified builders.', 'bmg-theme' ); ?></p>
					<div class="section-cta__actions bmg-reveal">
						<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
							<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/></svg>
						</a>
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/></svg>
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
