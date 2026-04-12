<?php
/**
 * Template Name: Services Hub
 *
 * Gateway page at /services/ linking to all 5 service detail pages.
 * Mostly reuses existing homepage components:
 *   - .section-page-header (dark)
 *   - .section-features grid + .service-card-xl cards
 *   - .section-proof__stats list (wrapped in a new .section-services-stats
 *     section for standalone layout)
 *   - .section-cta--dark band
 * Adds one new block: .section-install-callout (warm-white).
 *
 * No per-page Customizer — the 6 service cards live in this template
 * as a flat data array (the sitemap is fixed at V1).
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Phone for the CTA band.
$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

// Six service cards — reads from the SAME bmg_service_{1..6}_* Customizer
// fields as the homepage features section (section-features.php). One data
// source, two render locations. Images set in Customizer show on both.
$card_defaults = array(
	1 => array( 'overline' => 'SERVICE 01', 'title' => 'Spray-On Bedliners',  'body' => 'Permanent coatings bonded to bare metal. Standard, Premium, and off-road-grade finishes — all lifetime warranty.', 'url' => '/services/spray-on-bedliners/' ),
	2 => array( 'overline' => 'SERVICE 02', 'title' => 'Protective Coatings', 'body' => 'Undercoating, rocker panels, wheel wells, and frames sealed against rust, salt, and trail abuse.', 'url' => '/services/protective-coatings/' ),
	3 => array( 'overline' => 'SERVICE 03', 'title' => 'Truck Accessories',   'body' => 'Tonneau covers, running boards, toolboxes, racks, tow packages — installed clean and torqued to spec.', 'url' => '/services/truck-accessories/' ),
	4 => array( 'overline' => 'SERVICE 04', 'title' => 'Off-Road & Overland', 'body' => 'Lifts, bumpers, winches, armor, lighting, and full overland kits. Built to survive the trail.', 'url' => '/services/off-road-overland/' ),
	5 => array( 'overline' => 'SERVICE 05', 'title' => 'Fleet Services',      'body' => 'Volume pricing, dedicated project management, scheduled install windows, Net-30 billing.', 'url' => '/services/fleet/' ),
	6 => array( 'overline' => 'SHOP',       'title' => 'Shop Parts & Gear',   'body' => 'Browse thousands of parts from the brands we install. Ship to your door or install in-bay.', 'url' => '/shop/' ),
);

$cards = array();
foreach ( $card_defaults as $i => $defaults ) {
	$cards[] = array(
		'overline' => get_theme_mod( 'bmg_service_' . $i . '_overline', $defaults['overline'] ),
		'title'    => get_theme_mod( 'bmg_service_' . $i . '_title', $defaults['title'] ),
		'body'     => get_theme_mod( 'bmg_service_' . $i . '_body', $defaults['body'] ),
		'url'      => get_theme_mod( 'bmg_service_' . $i . '_url', $defaults['url'] ),
		'image'    => get_theme_mod( 'bmg_service_' . $i . '_image', '' ),
	);
}

// Stats — same as the homepage proof strip, rendered standalone here.
$stats = array(
	array( 'number' => '12+',      'label' => __( 'YEARS IN BUSINESS', 'bmg-theme' ) ),
	array( 'number' => '4,200+',   'label' => __( 'INSTALLS COMPLETED', 'bmg-theme' ) ),
	array( 'number' => '4.9★',     'label' => __( 'GOOGLE RATING', 'bmg-theme' ) ),
	array( 'number' => 'LIFETIME', 'label' => __( 'COATING WARRANTY', 'bmg-theme' ) ),
);
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'OUR SERVICES', 'bmg-theme' ),
			'headline' => __( 'ONE SHOP. EVERY SYSTEM.', 'bmg-theme' ),
			'subline'  => __( 'From spray-on bedliners to full off-road builds — one team, one warranty, one shop.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== Install callout bar =========================================== ?>
	<?php
	get_template_part(
		'template-parts/components/callout',
		'install-bar',
		array( 'text' => __( 'Every service backed by certified installers and a lifetime coating warranty.', 'bmg-theme' ) )
	);
	?>

	<?php // ===== 2. Service cards grid (reuses .section-features + .service-card-xl) ?>
	<section class="section-features" data-section="services-grid">
		<div class="container">

			<header class="section-features__header">
				<span class="section-features__overline bmg-reveal">
					<?php esc_html_e( 'WHAT WE BUILD', 'bmg-theme' ); ?>
				</span>
				<h2 class="section-features__headline bmg-reveal">
					<?php esc_html_e( 'SIX SERVICE LINES. ONE STANDARD.', 'bmg-theme' ); ?>
				</h2>
				<p class="section-features__subline bmg-reveal">
					<?php esc_html_e( 'Every line runs off the same floor, under the same team, with the same warranty.', 'bmg-theme' ); ?>
				</p>
			</header>

			<div class="section-features__grid bmg-reveal-stagger" role="list">
				<?php foreach ( $cards as $card ) : ?>
					<a href="<?php echo esc_url( home_url( $card['url'] ) ); ?>" class="service-card-xl bmg-reveal" role="listitem">

						<div class="service-card-xl__media">
							<?php if ( ! empty( $card['image'] ) ) : ?>
								<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" loading="lazy" decoding="async">
							<?php else : ?>
								<div class="service-card-xl__placeholder" aria-hidden="true">
									<span class="service-card-xl__placeholder-label">
										<?php echo esc_html( $card['overline'] ); ?>
									</span>
								</div>
							<?php endif; ?>
						</div>

						<div class="service-card-xl__body">
							<span class="service-card-xl__overline">
								<?php echo esc_html( $card['overline'] ); ?>
							</span>
							<h3 class="service-card-xl__title">
								<?php echo esc_html( $card['title'] ); ?>
							</h3>
							<p class="service-card-xl__description">
								<?php echo esc_html( $card['body'] ); ?>
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

	<?php // ===== 3. Installation callout ======================================= ?>
	<section class="section-install-callout" data-section="install-callout">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-9 mx-auto text-center">
					<span class="section-install-callout__overline bmg-reveal">
						<?php esc_html_e( 'WHY PROFESSIONAL INSTALL MATTERS', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-install-callout__headline bmg-reveal">
						<?php esc_html_e( 'DO IT ONCE. DO IT RIGHT.', 'bmg-theme' ); ?>
					</h2>
					<p class="section-install-callout__body bmg-reveal">
						<?php esc_html_e( 'Drilled holes in the wrong spot ruin panels. Cut harnesses void warranties. Over-torqued bolts crack aluminum. We do it right the first time.', 'bmg-theme' ); ?>
					</p>
					<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary section-install-callout__cta bmg-reveal">
						<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
						<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</section>

	<?php // ===== 4. Stats strip ================================================ ?>
	<section class="section-services-stats" data-section="services-stats">
		<div class="container">
			<ul class="section-proof__stats bmg-reveal" role="list">
				<?php foreach ( $stats as $stat ) :
					$parsed = function_exists( 'bmg_parse_trust_item' ) ? bmg_parse_trust_item( $stat['number'] ) : null;
					?>
					<li class="section-proof__stat">
						<span class="section-proof__stat-number">
							<?php if ( $parsed ) : ?>
								<?php if ( $parsed['prefix'] ) : ?><span class="section-proof__stat-prefix"><?php echo esc_html( $parsed['prefix'] ); ?></span><?php endif; ?>
								<span class="section-proof__stat-count" data-count-to="<?php echo esc_attr( $parsed['count'] ); ?>" data-count-format="<?php echo esc_attr( $parsed['format'] ); ?>"><?php echo esc_html( $parsed['format'] ); ?></span>
								<?php if ( $parsed['plus'] ) : ?><span class="section-proof__stat-plus">+</span><?php endif; ?>
								<?php if ( $parsed['suffix'] ) : ?><span class="section-proof__stat-suffix"><?php echo esc_html( $parsed['suffix'] ); ?></span><?php endif; ?>
							<?php else : ?>
								<?php echo esc_html( $stat['number'] ); ?>
							<?php endif; ?>
						</span>
						<span class="section-proof__stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php // ===== 5. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal">
						<?php esc_html_e( 'READY WHEN YOU ARE', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-cta__headline bmg-reveal">
						<?php esc_html_e( 'BUILD IT RIGHT. BUILD IT HERE.', 'bmg-theme' ); ?>
					</h2>
					<p class="section-cta__subline bmg-reveal">
						<?php esc_html_e( 'Free quotes. No pressure. Lifetime warranty on every coating.', 'bmg-theme' ); ?>
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
