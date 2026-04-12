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
$email          = get_theme_mod( 'bmg_email', 'hello@rhinocustombuilds.com' );
$rating         = get_theme_mod( 'bmg_google_rating', '4.9' );

// Hours (with Rhino defaults).
$hours_weekday  = get_theme_mod( 'bmg_office_hours', 'Mon–Fri: 8:00 AM – 5:00 PM PST' );
$hours_weekend  = get_theme_mod( 'bmg_office_hours_sun', 'Weekends: Closed' );

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
							<a class="site-footer__phone" href="tel:<?php echo esc_attr( $phone_link ); ?>">
								<?php echo esc_html( $phone_display ); ?>
							</a>
						</li>
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

				<?php // ---------- Column 4 — Hours + Social ---------- ?>
				<div class="col-lg-3 col-md-6 site-footer__col">
					<h4 class="site-footer__heading"><?php esc_html_e( 'Hours', 'bmg-theme' ); ?></h4>
					<ul class="site-footer__hours" role="list">
						<li><?php echo esc_html( $hours_weekday ); ?></li>
						<li><?php echo esc_html( $hours_weekend ); ?></li>
					</ul>

					<div class="site-footer__social">
						<span class="site-footer__social-label"><?php esc_html_e( 'Follow Us', 'bmg-theme' ); ?></span>
						<ul class="site-footer__social-list" role="list">
							<li>
								<a class="site-footer__social-link" href="https://instagram.com/" aria-label="<?php esc_attr_e( 'Rhino Custom Builds on Instagram', 'bmg-theme' ); ?>" target="_blank" rel="noopener noreferrer">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
										<rect x="2" y="2" width="20" height="20" rx="5"/>
										<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
										<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
									</svg>
								</a>
							</li>
							<li>
								<a class="site-footer__social-link" href="https://facebook.com/" aria-label="<?php esc_attr_e( 'Rhino Custom Builds on Facebook', 'bmg-theme' ); ?>" target="_blank" rel="noopener noreferrer">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
										<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
									</svg>
								</a>
							</li>
							<li>
								<a class="site-footer__social-link" href="https://youtube.com/" aria-label="<?php esc_attr_e( 'Rhino Custom Builds on YouTube', 'bmg-theme' ); ?>" target="_blank" rel="noopener noreferrer">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
										<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
									<polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="currentColor" stroke="none"/>
									</svg>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<?php // ---------- Bottom bar ---------- ?>
			<div class="site-footer__bottom">
				<p class="site-footer__copyright">
					&copy; <?php echo esc_html( date( 'Y' ) ); ?>
					<?php esc_html_e( 'Rhino Custom Builds', 'bmg-theme' ); ?>
				</p>
				<p class="site-footer__credit">
					<?php
					printf(
						/* translators: %s: "GSL Design" linked */
						esc_html__( 'Website design and maintained by %s', 'bmg-theme' ),
						'<a href="https://gsldesign.net" target="_blank" rel="noopener noreferrer">GSL Design</a>'
					);
					?>
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
