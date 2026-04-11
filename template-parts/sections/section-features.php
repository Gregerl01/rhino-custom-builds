<?php
/**
 * Homepage Features Section — Rhino Custom Builds
 *
 * White section introducing the six service lines as Service Category
 * Cards (XL variant). Each card is a full-clickable <a> with a 4:3
 * image, mono overline, Barlow Condensed title, body copy, arrow,
 * and a red underline sweep on hover.
 *
 * Content:  CONTENT.md → Homepage → Section 4 — Features
 * Design:   CLAUDE.md → GSL Section Mapping → Features + Component #2
 * Motion:   references/rhino-build-spec.md → #8 Service Category Card (XL)
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline = get_theme_mod( 'bmg_features_overline', __( 'WHAT WE BUILD', 'bmg-theme' ) );
$headline = get_theme_mod( 'bmg_features_headline', __( 'EVERYTHING YOUR RIG NEEDS. UNDER ONE ROOF.', 'bmg-theme' ) );
$subline  = get_theme_mod( 'bmg_features_subline', __( 'Six service lines. One shop. One warranty.', 'bmg-theme' ) );

$cta_text = get_theme_mod( 'bmg_features_cta_text', __( 'View All Services', 'bmg-theme' ) );
$cta_url  = get_theme_mod( 'bmg_features_cta_url', '/services/' );

// Six service cards — flat fields, one default set per slot.
// Core Customizer doesn't support repeaters; we model each card with
// a fixed set of keys so it's editable without an extra framework.
$card_defaults = array(
	1 => array(
		'overline' => 'SERVICE 01',
		'title'    => 'Spray-On Bedliners',
		'body'     => 'Permanent coatings bonded to bare metal. Standard, Premium, and off-road-grade finishes — all lifetime warranty.',
		'url'      => '/services/spray-on-bedliners/',
	),
	2 => array(
		'overline' => 'SERVICE 02',
		'title'    => 'Protective Coatings',
		'body'     => 'Undercoating, rocker panels, wheel wells, and frames sealed against rust, salt, and trail abuse.',
		'url'      => '/services/protective-coatings/',
	),
	3 => array(
		'overline' => 'SERVICE 03',
		'title'    => 'Truck Accessories',
		'body'     => 'Tonneau covers, running boards, toolboxes, racks, tow packages — installed clean and torqued to spec.',
		'url'      => '/services/truck-accessories/',
	),
	4 => array(
		'overline' => 'SERVICE 04',
		'title'    => 'Off-Road & Overland',
		'body'     => 'Lifts, bumpers, winches, armor, lighting, and full overland kits. Built to survive the trail.',
		'url'      => '/services/off-road-overland/',
	),
	5 => array(
		'overline' => 'SERVICE 05',
		'title'    => 'Fleet Services',
		'body'     => 'Volume pricing, dedicated project management, scheduled install windows, Net-30 billing.',
		'url'      => '/services/fleet/',
	),
	6 => array(
		'overline' => 'SHOP',
		'title'    => 'Shop Parts & Gear',
		'body'     => 'Browse thousands of parts from the brands we install. Ship to your door or install in-bay.',
		'url'      => '/shop/',
	),
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
?>

<section id="features" class="section-features" data-section="features">
	<div class="container">

		<header class="section-features__header">
			<?php if ( $overline ) : ?>
				<span class="section-features__overline bmg-reveal">
					<?php echo esc_html( $overline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $headline ) : ?>
				<h2 class="section-features__headline bmg-reveal">
					<?php echo esc_html( $headline ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $subline ) : ?>
				<p class="section-features__subline bmg-reveal">
					<?php echo esc_html( $subline ); ?>
				</p>
			<?php endif; ?>
		</header>

		<div class="section-features__grid bmg-reveal-stagger" role="list">
			<?php foreach ( $cards as $i => $card ) :
				if ( empty( $card['title'] ) ) {
					continue;
				}
				?>
				<a href="<?php echo esc_url( $card['url'] ); ?>" class="service-card-xl bmg-reveal" role="listitem">

					<div class="service-card-xl__media">
						<?php if ( $card['image'] ) : ?>
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
						<?php if ( $card['overline'] ) : ?>
							<span class="service-card-xl__overline">
								<?php echo esc_html( $card['overline'] ); ?>
							</span>
						<?php endif; ?>

						<h3 class="service-card-xl__title">
							<?php echo esc_html( $card['title'] ); ?>
						</h3>

						<?php if ( $card['body'] ) : ?>
							<p class="service-card-xl__description">
								<?php echo esc_html( $card['body'] ); ?>
							</p>
						<?php endif; ?>

						<span class="service-card-xl__arrow" aria-hidden="true">
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
						</span>
					</div>

				</a>
			<?php endforeach; ?>
		</div>

		<?php if ( $cta_text ) : ?>
			<div class="section-features__footer bmg-reveal">
				<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-rhino btn-rhino--ghost-light section-features__cta">
					<span><?php echo esc_html( $cta_text ); ?></span>
					<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
					</svg>
				</a>
			</div>
		<?php endif; ?>

	</div>
</section>
