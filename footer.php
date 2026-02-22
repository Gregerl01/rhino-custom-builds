<?php
/**
 * Footer Template - BMG Theme
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Get Customizer settings - Practice Info.
$practice_name = get_theme_mod( 'footer_practice_name', __( 'Baig Medical Group', 'bmg-theme' ) );
$phone         = get_theme_mod( 'footer_phone', '' );
$email         = get_theme_mod( 'footer_email', '' );
$address       = get_theme_mod( 'footer_address', '' );

// Hours settings.
$show_hours = get_theme_mod( 'footer_hours_show', true );
$hours_text = get_theme_mod( 'footer_hours', __( "Monday - Friday: 9:00 AM - 5:00 PM\nSaturday: By Appointment\nSunday: Closed", 'bmg-theme' ) );

// Column titles.
$nav_title   = get_theme_mod( 'footer_nav_title', __( 'Quick Links', 'bmg-theme' ) );
$legal_title = get_theme_mod( 'footer_legal_title', __( 'Legal', 'bmg-theme' ) );

// Copyright settings.
$show_privacy = get_theme_mod( 'footer_show_privacy', true );
$hipaa_page   = get_theme_mod( 'footer_hipaa_page', 0 );
$terms_page   = get_theme_mod( 'footer_terms_page', 0 );
?>

	<footer id="site-footer" class="site-footer section-dark">
		<div class="container">

			<!-- Footer Main Content -->
			<div class="row gy-4 mb-5">

				<!-- Practice Info Column -->
				<div class="col-lg-3 col-md-6">
					<h4 class="footer-title h6 text-uppercase mb-3"><?php echo esc_html( $practice_name ); ?></h4>

					<?php if ( $address ) : ?>
						<address class="footer-address mb-3">
							<?php echo nl2br( esc_html( $address ) ); ?>
						</address>
					<?php endif; ?>

					<?php if ( $phone ) : ?>
						<p class="footer-contact mb-2">
							<a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $phone ) ); ?>">
								<?php echo esc_html( $phone ); ?>
							</a>
						</p>
					<?php endif; ?>

					<?php if ( $email ) : ?>
						<p class="footer-contact mb-0">
							<a href="mailto:<?php echo esc_attr( $email ); ?>">
								<?php echo esc_html( $email ); ?>
							</a>
						</p>
					<?php endif; ?>
				</div>

				<!-- Hours Column -->
				<?php if ( $show_hours && $hours_text ) : ?>
					<div class="col-lg-3 col-md-6">
						<h4 class="footer-title h6 text-uppercase mb-3"><?php esc_html_e( 'Hours', 'bmg-theme' ); ?></h4>
						<div class="footer-hours">
							<?php echo nl2br( esc_html( $hours_text ) ); ?>
						</div>
					</div>
				<?php endif; ?>

				<!-- Navigation Column -->
				<div class="col-lg-3 col-md-6">
					<h4 class="footer-title h6 text-uppercase mb-3"><?php echo esc_html( $nav_title ); ?></h4>
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
							<li><a href="<?php echo esc_url( home_url( '/plans/' ) ); ?>"><?php esc_html_e( 'Our Plans', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact', 'bmg-theme' ); ?></a></li>
							<li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>"><?php esc_html_e( 'FAQ', 'bmg-theme' ); ?></a></li>
						</ul>
					<?php endif; ?>
				</div>

				<!-- Legal Column -->
				<div class="col-lg-3 col-md-6">
					<h4 class="footer-title h6 text-uppercase mb-3"><?php echo esc_html( $legal_title ); ?></h4>
					<?php if ( has_nav_menu( 'footer-legal' ) ) : ?>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-legal',
								'container'      => false,
								'menu_class'     => 'footer-menu list-unstyled mb-0',
								'depth'          => 1,
								'walker'         => new BMG_Theme_Footer_Menu_Walker(),
							)
						);
						?>
					<?php else : ?>
						<ul class="footer-menu list-unstyled mb-0">
							<?php if ( $show_privacy && function_exists( 'get_privacy_policy_url' ) && get_privacy_policy_url() ) : ?>
								<li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>"><?php esc_html_e( 'Privacy Policy', 'bmg-theme' ); ?></a></li>
							<?php endif; ?>
							<?php if ( $hipaa_page ) : ?>
								<li><a href="<?php echo esc_url( get_permalink( $hipaa_page ) ); ?>"><?php esc_html_e( 'HIPAA Notice', 'bmg-theme' ); ?></a></li>
							<?php endif; ?>
							<?php if ( $terms_page ) : ?>
								<li><a href="<?php echo esc_url( get_permalink( $terms_page ) ); ?>"><?php esc_html_e( 'Terms of Service', 'bmg-theme' ); ?></a></li>
							<?php endif; ?>
						</ul>
					<?php endif; ?>
				</div>

			</div>

			<!-- Footer Bottom / Copyright -->
			<div class="footer-bottom pt-4 border-top border-secondary">
				<div class="row align-items-center">
					<div class="col-md-12 text-center">
						<p class="footer-copyright mb-0 small">
							&copy; <?php echo wp_kses_post( bmg_theme_get_copyright_text() ); ?>
						</p>
					</div>
				</div>
			</div>

		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>
