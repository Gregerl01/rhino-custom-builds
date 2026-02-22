<?php
/**
 * Footer Template - BMG Theme
 *
 * Three-column footer matching CONTENT.md Section 9.
 * All contact info pulled from bmg_* Customizer variables.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variables from Customizer (Practice Information panel).
$address_street = get_theme_mod( 'bmg_address_street', '[Street Address]' );
$address_city   = get_theme_mod( 'bmg_address_city', 'Yuma, AZ [ZIP]' );
$phone_display  = get_theme_mod( 'bmg_phone', '(000) 000-0000' );
$phone_link     = preg_replace( '/[^0-9+]/', '', $phone_display );
$email          = get_theme_mod( 'bmg_email', 'info@baigmedicalgroup.com' );

// Office hours.
$hours_weekday  = get_theme_mod( 'bmg_office_hours', 'Monday – Friday: 8:00 AM – 5:00 PM' );
$hours_saturday = get_theme_mod( 'bmg_office_hours_sat', 'By appointment' );
$hours_sunday   = get_theme_mod( 'bmg_office_hours_sun', 'Closed' );
?>

	<footer id="site-footer" class="site-footer section-dark">
		<div class="container">

			<!-- Footer Main Content -->
			<div class="row gy-4 mb-5">

				<!-- Column 1: Practice Identity -->
				<div class="col-lg-4 col-md-6">
					<?php if ( has_custom_logo() ) : ?>
						<div class="footer-logo mb-3">
							<?php the_custom_logo(); ?>
						</div>
					<?php else : ?>
						<h4 class="footer-title h6 text-uppercase mb-3">
							<?php esc_html_e( 'Baig Medical Group', 'bmg-theme' ); ?>
						</h4>
					<?php endif; ?>

					<address class="footer-address mb-3">
						<?php echo esc_html( $address_street ); ?><br>
						<?php echo esc_html( $address_city ); ?>
					</address>

					<p class="footer-contact mb-2">
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>">
							<?php echo esc_html( $phone_display ); ?>
						</a>
					</p>

					<p class="footer-contact mb-0">
						<a href="mailto:<?php echo esc_attr( $email ); ?>">
							<?php echo esc_html( $email ); ?>
						</a>
					</p>
				</div>

				<!-- Column 2: Navigation -->
				<div class="col-lg-4 col-md-6">
					<h4 class="footer-title h6 text-uppercase mb-3">
						<?php esc_html_e( 'Navigation', 'bmg-theme' ); ?>
					</h4>
					<?php if ( has_nav_menu( 'footer-navigation' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-navigation',
								'container'      => false,
								'menu_class'     => 'footer-menu list-unstyled mb-0',
								'depth'          => 1,
								'walker'         => new BMG_Theme_Footer_Menu_Walker(),
							)
						);
						?>
					<?php else : ?>
						<ul class="footer-menu list-unstyled mb-0">
							<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/our-plans/' ) ); ?>"><?php esc_html_e( 'Our Plans', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/enroll/' ) ); ?>"><?php esc_html_e( 'Enroll', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php esc_html_e( 'FAQ', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'bmg-theme' ); ?></a></li>
						</ul>
					<?php endif; ?>
				</div>

				<!-- Column 3: Office Hours -->
				<div class="col-lg-4 col-md-6">
					<h4 class="footer-title h6 text-uppercase mb-3">
						<?php esc_html_e( 'Office Hours', 'bmg-theme' ); ?>
					</h4>
					<div class="footer-hours">
						<p class="mb-1"><?php echo esc_html( $hours_weekday ); ?></p>
						<p class="mb-1">
							<?php
							printf(
								/* translators: %s: Saturday hours */
								esc_html__( 'Saturday: %s', 'bmg-theme' ),
								esc_html( $hours_saturday )
							);
							?>
						</p>
						<p class="mb-0">
							<?php
							printf(
								/* translators: %s: Sunday hours */
								esc_html__( 'Sunday: %s', 'bmg-theme' ),
								esc_html( $hours_sunday )
							);
							?>
						</p>
					</div>
				</div>

			</div>

			<!-- Footer Bottom / Copyright -->
			<div class="footer-bottom pt-4">
				<div class="row align-items-center">
					<div class="col-md-12 text-center">
						<p class="footer-copyright mb-0 small">
							&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( 'Baig Medical Group. All rights reserved.', 'bmg-theme' ); ?>
						</p>
					</div>
				</div>
			</div>

		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
