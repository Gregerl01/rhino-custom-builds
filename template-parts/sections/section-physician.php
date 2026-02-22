<?php
/**
 * Physician Section
 *
 * Displays physician profile with portrait, credentials, and bio.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Get Customizer settings.
$name        = get_theme_mod( 'physician_name', __( 'Dr. [Physician Name], MD', 'bmg-theme' ) );
$credentials = get_theme_mod( 'physician_credentials', __( 'Board Certified Internal Medicine', 'bmg-theme' ) );
$bio         = get_theme_mod( 'physician_bio', __( 'With over 20 years of experience in internal medicine, Dr. [Name] founded Baig Medical Group to provide the kind of personalized, unhurried care that patients deserve. After years of practicing in traditional healthcare settings, it became clear that the best outcomes come from building genuine relationships with patients—relationships that require time and attention that conventional practice models simply cannot provide.', 'bmg-theme' ) );
$photo       = get_theme_mod( 'physician_photo', '' );
?>

<section id="physician" class="section section-light physician-section">
	<div class="container">
		<div class="row g-5 align-items-center">

			<!-- Portrait -->
			<div class="col-lg-5">
				<div class="physician-portrait">
					<?php if ( $photo ) : ?>
						<img src="<?php echo esc_url( $photo ); ?>"
							 alt="<?php echo esc_attr( $name ); ?>"
							 class="img-fluid"
							 loading="lazy">
					<?php else : ?>
						<div class="physician-portrait__placeholder">
							<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
								<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
							</svg>
							<span><?php esc_html_e( 'Portrait', 'bmg-theme' ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Bio Content -->
			<div class="col-lg-7">
				<div class="physician-content">
					<?php if ( $credentials ) : ?>
						<p class="physician-credentials">
							<?php echo esc_html( $credentials ); ?>
						</p>
					<?php endif; ?>

					<?php if ( $name ) : ?>
						<h2 class="physician-name display-text">
							<?php echo esc_html( $name ); ?>
						</h2>
					<?php endif; ?>

					<?php if ( $bio ) : ?>
						<div class="physician-bio">
							<?php echo wp_kses_post( wpautop( $bio ) ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</section>
