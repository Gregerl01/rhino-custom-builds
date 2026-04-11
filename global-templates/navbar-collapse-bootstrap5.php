<?php
/**
 * Header Navbar — Rhino Custom Builds
 *
 * Static nav structure (sitemap is fixed at V1 so there is no benefit
 * to routing through wp_nav_menu + the WP menu admin). Desktop uses
 * CSS-only hover dropdowns (no Bootstrap dropdown JS). Mobile collapses
 * into a full-height drawer with expandable Services + Shop groups and
 * a pinned CTA block at the bottom.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type', 'container' );

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

/**
 * Nav items rendered twice (desktop inline + mobile drawer). Define
 * once at the top so both surfaces stay in sync.
 */
$nav_services = array(
	array( 'label' => __( 'Spray-On Bedliners', 'bmg-theme' ),  'url' => '/services/spray-on-bedliners/' ),
	array( 'label' => __( 'Protective Coatings', 'bmg-theme' ), 'url' => '/services/protective-coatings/' ),
	array( 'label' => __( 'Truck Accessories', 'bmg-theme' ),   'url' => '/services/truck-accessories/' ),
	array( 'label' => __( 'Off-Road & Overland', 'bmg-theme' ), 'url' => '/services/off-road-overland/' ),
	array( 'label' => __( 'Fleet Services', 'bmg-theme' ),      'url' => '/services/fleet/' ),
);

$nav_shop = array(
	array( 'label' => __( 'Bumpers & Armor', 'bmg-theme' ),    'url' => '/shop/category/bumpers-armor/' ),
	array( 'label' => __( 'Lighting', 'bmg-theme' ),           'url' => '/shop/category/lighting/' ),
	array( 'label' => __( 'Suspension & Lifts', 'bmg-theme' ), 'url' => '/shop/category/suspension-lifts/' ),
	array( 'label' => __( 'Wheels & Tires', 'bmg-theme' ),     'url' => '/shop/category/wheels-tires/' ),
	array( 'label' => __( 'Recovery & Winches', 'bmg-theme' ), 'url' => '/shop/category/recovery-winches/' ),
	array( 'label' => __( 'Bed & Cargo', 'bmg-theme' ),        'url' => '/shop/category/bed-cargo/' ),
	array( 'label' => __( 'Overland Gear', 'bmg-theme' ),      'url' => '/shop/category/overland-gear/' ),
);
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-dark" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'bmg-theme' ); ?>
	</h2>

	<div class="<?php echo esc_attr( $container ); ?>">

		<?php // Branding ?>
		<?php get_template_part( 'global-templates/navbar-branding' ); ?>

		<?php // Hamburger — mobile only, anchored right ?>
		<button
			class="navbar-toggler order-md-last"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'bmg-theme' ); ?>"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<?php // Nav collapse — desktop row / mobile drawer ?>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav ms-auto align-items-md-center" id="primary-menu">

				<?php // ---- Services (dropdown) ---- ?>
				<li class="nav-item has-dropdown">
					<a class="nav-link dropdown-toggle" href="<?php echo esc_url( home_url( '/services/' ) ); ?>" aria-haspopup="true" aria-expanded="false">
						<?php esc_html_e( 'Services', 'bmg-theme' ); ?>
					</a>
					<ul class="nav-dropdown" aria-label="<?php esc_attr_e( 'Services menu', 'bmg-theme' ); ?>">
						<?php foreach ( $nav_services as $item ) : ?>
							<li>
								<a class="nav-dropdown__link" href="<?php echo esc_url( home_url( $item['url'] ) ); ?>">
									<?php echo esc_html( $item['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
						<li class="nav-dropdown__footer">
							<a class="nav-dropdown__footer-link" href="<?php echo esc_url( home_url( '/services/' ) ); ?>">
								<?php esc_html_e( 'View All Services', 'bmg-theme' ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</a>
						</li>
					</ul>
				</li>

				<?php // ---- Shop (dropdown) ---- ?>
				<li class="nav-item has-dropdown">
					<a class="nav-link dropdown-toggle" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" aria-haspopup="true" aria-expanded="false">
						<?php esc_html_e( 'Shop', 'bmg-theme' ); ?>
					</a>
					<ul class="nav-dropdown" aria-label="<?php esc_attr_e( 'Shop menu', 'bmg-theme' ); ?>">
						<?php foreach ( $nav_shop as $item ) : ?>
							<li>
								<a class="nav-dropdown__link" href="<?php echo esc_url( home_url( $item['url'] ) ); ?>">
									<?php echo esc_html( $item['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
						<li class="nav-dropdown__footer">
							<a class="nav-dropdown__footer-link" href="<?php echo esc_url( home_url( '/shop/' ) ); ?>">
								<?php esc_html_e( 'Browse Full Shop', 'bmg-theme' ); ?>
								<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</a>
						</li>
					</ul>
				</li>

				<?php // ---- Flat links ---- ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo esc_url( home_url( '/gallery/' ) ); ?>">
						<?php esc_html_e( 'Gallery', 'bmg-theme' ); ?>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo esc_url( home_url( '/about/' ) ); ?>">
						<?php esc_html_e( 'About', 'bmg-theme' ); ?>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
						<?php esc_html_e( 'Contact', 'bmg-theme' ); ?>
					</a>
				</li>

				<?php // ---- Desktop CTA — hidden inside mobile drawer (handled below) ---- ?>
				<li class="nav-item nav-cta d-none d-md-flex">
					<a class="btn-rhino btn-rhino--primary btn-rhino--nav" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">
						<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
						<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
						</svg>
					</a>
				</li>

			</ul>

			<?php // ---- Mobile drawer CTA block (pinned to bottom) ---- ?>
			<div class="mobile-nav-cta d-md-none">
				<a class="btn-rhino btn-rhino--primary mobile-nav-cta__quote" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">
					<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
					<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
					</svg>
				</a>
				<?php if ( $phone_display && $phone_link ) : ?>
					<a class="mobile-nav-cta__phone" href="tel:<?php echo esc_attr( $phone_link ); ?>">
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
						</svg>
						<span class="mobile-nav-cta__phone-label"><?php esc_html_e( 'Call', 'bmg-theme' ); ?></span>
						<span class="mobile-nav-cta__phone-number"><?php echo esc_html( $phone_display ); ?></span>
					</a>
				<?php endif; ?>
			</div>

		</div><!-- .navbar-collapse -->

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->
