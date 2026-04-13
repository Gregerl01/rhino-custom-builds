<?php
/**
 * 404 — Page Not Found — Rhino Custom Builds
 *
 * On-brand 404 with helpful navigation, search, and a quote CTA.
 * Not a dead end — routes the visitor to the most useful pages.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$links = array(
	array( 'label' => __( 'Homepage', 'bmg-theme' ),        'url' => '/',          'desc' => __( 'Start from the beginning', 'bmg-theme' ) ),
	array( 'label' => __( 'Our Services', 'bmg-theme' ),    'url' => '/services/', 'desc' => __( 'Browse all service lines', 'bmg-theme' ) ),
	array( 'label' => __( 'Shop Parts', 'bmg-theme' ),      'url' => '/shop/',     'desc' => __( 'Parts, gear, and accessories', 'bmg-theme' ) ),
	array( 'label' => __( 'Request a Quote', 'bmg-theme' ), 'url' => '/quote/',    'desc' => __( 'Free, no-obligation quote', 'bmg-theme' ) ),
	array( 'label' => __( 'Contact Us', 'bmg-theme' ),      'url' => '/contact/',  'desc' => __( 'Call, visit, or send a message', 'bmg-theme' ) ),
);
?>

<main id="main" class="site-main">

	<?php // ===== Dark hero area ================================================ ?>
	<section class="section-404" data-section="404">
		<div class="section-404__background"></div>
		<div class="section-404__overlay" aria-hidden="true"></div>
		<div class="section-404__grain" aria-hidden="true"></div>

		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-8 text-center">

					<span class="section-404__code" aria-hidden="true">404</span>

					<h1 class="section-404__headline">
						<?php esc_html_e( 'WRONG TRAIL.', 'bmg-theme' ); ?>
					</h1>

					<p class="section-404__subline">
						<?php esc_html_e( "The page you're looking for doesn't exist or has moved. Let's get you back on track.", 'bmg-theme' ); ?>
					</p>

				</div>
			</div>
		</div>
	</section>

	<?php // ===== Callout bar =================================================== ?>
	<?php
	get_template_part(
		'template-parts/components/callout',
		'install-bar',
		array( 'text' => __( 'Know what you need? Skip the search.', 'bmg-theme' ) )
	);
	?>

	<?php // ===== Helpful links + search ======================================== ?>
	<section class="section-404-nav" data-section="404-nav">
		<div class="container">
			<div class="row g-5">

				<?php // Link grid ?>
				<div class="col-lg-7">
					<span class="section-404-nav__overline">
						<?php esc_html_e( 'TRY ONE OF THESE', 'bmg-theme' ); ?>
					</span>
					<ul class="section-404-nav__links" role="list">
						<?php foreach ( $links as $link ) : ?>
							<li>
								<a class="section-404-nav__link" href="<?php echo esc_url( home_url( $link['url'] ) ); ?>">
									<span class="section-404-nav__link-label"><?php echo esc_html( $link['label'] ); ?></span>
									<span class="section-404-nav__link-desc"><?php echo esc_html( $link['desc'] ); ?></span>
									<svg class="section-404-nav__link-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php // Search ?>
				<div class="col-lg-5">
					<span class="section-404-nav__overline">
						<?php esc_html_e( 'OR SEARCH THE SITE', 'bmg-theme' ); ?>
					</span>
					<form class="section-404-nav__search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<label for="search-404" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'bmg-theme' ); ?></label>
						<input
							class="section-404-nav__search-input"
							type="search"
							id="search-404"
							name="s"
							placeholder="<?php esc_attr_e( 'Search...', 'bmg-theme' ); ?>"
						>
						<button class="section-404-nav__search-btn" type="submit" aria-label="<?php esc_attr_e( 'Search', 'bmg-theme' ); ?>">
							<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
								<path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="square"/>
							</svg>
						</button>
					</form>

					<p class="section-404-nav__phone-hint">
						<?php esc_html_e( 'Or call us — we can help.', 'bmg-theme' ); ?>
						<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', get_theme_mod( 'bmg_phone', '(555) 555-0123' ) ) ); ?>">
							<?php echo esc_html( get_theme_mod( 'bmg_phone', '(555) 555-0123' ) ); ?>
						</a>
					</p>
				</div>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
