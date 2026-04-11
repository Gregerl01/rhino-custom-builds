<?php
/**
 * Footer — Rhino Custom Builds
 *
 * 4-column dark footer:
 *   1. Identity  — logo, address, general + fleet phone, email, rating
 *   2. Services  — 7 service links
 *   3. Company   — 8 site links
 *   4. Hours     — business hours + map thumbnail placeholder
 *
 * Content source: CONTENT.md → Footer
 * Design:         CLAUDE.md → Navigation → Footer Structure
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

// Business Info Customizer values.
$address_street = get_theme_mod( 'bmg_address_street', '[Street Address]' );
$address_city   = get_theme_mod( 'bmg_address_city', '[City, ST ZIP]' );
$phone_display  = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link     = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
$phone_fleet    = get_theme_mod( 'bmg_phone_fleet', '(555) 555-0199' );
$phone_fleet_link = preg_replace( '/[^0-9+]/', '', (string) $phone_fleet );
$email          = get_theme_mod( 'bmg_email', 'hello@rhinocustombuilds.com' );
$rating         = get_theme_mod( 'bmg_google_rating', '4.9' );

// Hours (with Rhino defaults).
$hours_weekday  = get_theme_mod( 'bmg_office_hours', 'Mon–Fri: 7AM – 6PM' );
$hours_saturday = get_theme_mod( 'bmg_office_hours_sat', 'Saturday: 8AM – 2PM' );
$hours_sunday   = get_theme_mod( 'bmg_office_hours_sun', 'Sunday: Closed' );

// Column link lists.
$col_services = array(
	array( 'label' => __( 'Spray-On Bedliners', 'bmg-theme' ),  'url' => '/services/spray-on-bedliners/' ),
	array( 'label' => __( 'Protective Coatings', 'bmg-theme' ), 'url' => '/services/protective-coatings/' ),
	array( 'label' => __( 'Truck Accessories', 'bmg-theme' ),   'url' => '/services/truck-accessories/' ),
	array( 'label' => __( 'Off-Road & Overland', 'bmg-theme' ), 'url' => '/services/off-road-overland/' ),
	array( 'label' => __( 'Fleet Services', 'bmg-theme' ),      'url' => '/services/fleet/' ),
	array( 'label' => __( 'Custom Builds', 'bmg-theme' ),       'url' => '/gallery/' ),
	array( 'label' => __( 'Shop Parts & Gear', 'bmg-theme' ),   'url' => '/shop/' ),
);

$col_company = array(
	array( 'label' => __( 'About', 'bmg-theme' ),          'url' => '/about/' ),
	array( 'label' => __( 'Gallery', 'bmg-theme' ),        'url' => '/gallery/' ),
	array( 'label' => __( 'Blog', 'bmg-theme' ),           'url' => '/blog/' ),
	array( 'label' => __( 'FAQ', 'bmg-theme' ),            'url' => '/faq/' ),
	array( 'label' => __( 'Financing', 'bmg-theme' ),      'url' => '/financing/' ),
	array( 'label' => __( 'Warranty', 'bmg-theme' ),       'url' => '/warranty/' ),
	array( 'label' => __( 'Contact', 'bmg-theme' ),        'url' => '/contact/' ),
	array( 'label' => __( 'Request a Quote', 'bmg-theme' ), 'url' => '/quote/' ),
);
?>

	<footer id="site-footer" class="site-footer" role="contentinfo">
		<div class="container">

			<div class="row site-footer__grid">

				<?php // ---------- Column 1 — Identity ---------- ?>
				<div class="col-lg-4 col-md-6 site-footer__col site-footer__col--identity">

					<?php if ( has_custom_logo() ) : ?>
						<div class="site-footer__logo">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<p class="site-footer__brand">
							<?php esc_html_e( 'Rhino Custom Builds', 'bmg-theme' ); ?>
						</p>
					<?php endif; ?>

					<address class="site-footer__address">
						<?php echo esc_html( $address_street ); ?><br>
						<?php echo esc_html( $address_city ); ?>
					</address>

					<ul class="site-footer__contact" role="list">
						<li>
							<span class="site-footer__contact-label"><?php esc_html_e( 'General', 'bmg-theme' ); ?></span>
							<a class="site-footer__phone" href="tel:<?php echo esc_attr( $phone_link ); ?>">
								<?php echo esc_html( $phone_display ); ?>
							</a>
						</li>
						<?php if ( $phone_fleet ) : ?>
							<li>
								<span class="site-footer__contact-label"><?php esc_html_e( 'Fleet', 'bmg-theme' ); ?></span>
								<a class="site-footer__phone" href="tel:<?php echo esc_attr( $phone_fleet_link ); ?>">
									<?php echo esc_html( $phone_fleet ); ?>
								</a>
							</li>
						<?php endif; ?>
						<li>
							<a class="site-footer__email" href="mailto:<?php echo esc_attr( $email ); ?>">
								<?php echo esc_html( $email ); ?>
							</a>
						</li>
					</ul>

					<p class="site-footer__rating" aria-label="<?php /* translators: %s: Google rating value */ echo esc_attr( sprintf( __( '%s stars on Google', 'bmg-theme' ), $rating ) ); ?>">
						<span class="site-footer__rating-stars" aria-hidden="true">★★★★★</span>
						<span class="site-footer__rating-value"><?php echo esc_html( $rating ); ?></span>
						<span class="site-footer__rating-label"><?php esc_html_e( 'Google Rating', 'bmg-theme' ); ?></span>
					</p>

				</div>

				<?php // ---------- Column 2 — Services ---------- ?>
				<div class="col-lg-2 col-md-6 site-footer__col">
					<h4 class="site-footer__heading"><?php esc_html_e( 'Services', 'bmg-theme' ); ?></h4>
					<ul class="site-footer__list" role="list">
						<?php foreach ( $col_services as $link ) : ?>
							<li>
								<a href="<?php echo esc_url( home_url( $link['url'] ) ); ?>">
									<?php echo esc_html( $link['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php // ---------- Column 3 — Company ---------- ?>
				<div class="col-lg-3 col-md-6 site-footer__col">
					<h4 class="site-footer__heading"><?php esc_html_e( 'Company', 'bmg-theme' ); ?></h4>
					<ul class="site-footer__list" role="list">
						<?php foreach ( $col_company as $link ) : ?>
							<li>
								<a href="<?php echo esc_url( home_url( $link['url'] ) ); ?>">
									<?php echo esc_html( $link['label'] ); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php // ---------- Column 4 — Hours ---------- ?>
				<div class="col-lg-3 col-md-6 site-footer__col">
					<h4 class="site-footer__heading"><?php esc_html_e( 'Hours', 'bmg-theme' ); ?></h4>
					<ul class="site-footer__hours" role="list">
						<li><?php echo esc_html( $hours_weekday ); ?></li>
						<li><?php echo esc_html( $hours_saturday ); ?></li>
						<li><?php echo esc_html( $hours_sunday ); ?></li>
					</ul>

					<a class="site-footer__map" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" aria-label="<?php esc_attr_e( 'View location on map', 'bmg-theme' ); ?>">
						<span class="site-footer__map-placeholder" aria-hidden="true"></span>
						<span class="site-footer__map-label">
							<?php esc_html_e( 'View on Map', 'bmg-theme' ); ?>
							<svg width="12" height="12" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
						</span>
					</a>
				</div>

			</div>

			<?php // ---------- Bottom bar ---------- ?>
			<div class="site-footer__bottom">
				<p class="site-footer__copyright">
					&copy; <?php echo esc_html( date( 'Y' ) ); ?>
					<?php esc_html_e( 'Rhino Custom Builds', 'bmg-theme' ); ?>
				</p>
				<nav class="site-footer__legal" aria-label="<?php esc_attr_e( 'Legal', 'bmg-theme' ); ?>">
					<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">
						<?php esc_html_e( 'Privacy Policy', 'bmg-theme' ); ?>
					</a>
					<span class="site-footer__legal-sep" aria-hidden="true">·</span>
					<a href="<?php echo esc_url( home_url( '/terms-of-use/' ) ); ?>">
						<?php esc_html_e( 'Terms of Use', 'bmg-theme' ); ?>
					</a>
				</nav>
			</div>

		</div>
	</footer>

	<?php // Back to Top ?>
	<button class="bmg-back-to-top" aria-label="<?php esc_attr_e( 'Back to top', 'bmg-theme' ); ?>" type="button">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><polyline points="18 15 12 9 6 15"/></svg>
	</button>

<?php wp_footer(); ?>

</body>
</html>
