<?php
/**
 * Physician Bio Section — About Page
 *
 * Full physician profile with portrait, five-paragraph bio using
 * dynamic Customizer variables, and credentials sidebar.
 * Matches CONTENT.md Section 2.3.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variables from Customizer.
$physician_name        = get_theme_mod( 'bmg_physician_name', 'Dr. Adil Baig' );
$physician_last_name   = get_theme_mod( 'bmg_physician_last_name', 'Baig' );
$physician_credentials = get_theme_mod( 'bmg_physician_credentials', 'Board-Certified Family Medicine Physician' );
$physician_med_school  = get_theme_mod( 'bmg_physician_med_school', '[Medical School]' );
$physician_residency   = get_theme_mod( 'bmg_physician_residency', '[Residency Program]' );
$physician_fellowship  = get_theme_mod( 'bmg_physician_fellowship', '' );
$physician_board_cert  = get_theme_mod( 'bmg_physician_board_cert', 'American Board of Family Medicine' );
$physician_memberships = get_theme_mod( 'bmg_physician_memberships', '[Professional Organizations]' );

// Full photo — try attachment ID for responsive srcset.
$photo_url = get_theme_mod( 'bmg_physician_photo_full', '' );
$photo_id  = $photo_url ? attachment_url_to_postid( $photo_url ) : 0;

// Helper: detect placeholder values (wrapped in brackets).
function bmg_is_placeholder( $value ) {
	return preg_match( '/^\[.*\]$/', trim( $value ) );
}
?>

<section id="physician-bio" class="section section-light physician-section reveal-on-scroll">
	<div class="container">

		<!-- Portrait Row -->
		<div class="row justify-content-center mb-5">
			<div class="col-lg-6">
				<div class="physician-portrait">
					<?php if ( $photo_id ) : ?>
						<?php
						echo wp_get_attachment_image(
							$photo_id,
							'large',
							false,
							array(
								'class'   => 'img-fluid',
								'alt'     => esc_attr( $physician_name ),
								'loading' => 'lazy',
							)
						);
						?>
					<?php elseif ( $photo_url ) : ?>
						<img src="<?php echo esc_url( $photo_url ); ?>"
							 alt="<?php echo esc_attr( $physician_name ); ?>"
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
		</div>

		<!-- Name + Heading -->
		<div class="row justify-content-center mb-4">
			<div class="col-lg-10 text-center">
				<p class="physician-credentials-label">
					<?php echo esc_html( $physician_credentials ); ?>
				</p>
				<h2 class="physician-name display-text">
					<?php echo esc_html( $physician_name ); ?>
				</h2>
			</div>
		</div>

		<!-- Bio (~60%) + Credentials Card (~35%) -->
		<div class="row g-5 justify-content-center">
			<div class="col-lg-7">
				<div class="physician-bio">
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: physician last name */
								__( 'Dr. %s is a board-certified family medicine physician with over a decade of clinical experience spanning hospital systems, health system networks, and private practice.', 'bmg-theme' ),
								$physician_last_name
							)
						);
						?>
					</p>
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: 1: physician last name, 2: medical school, 3: residency */
								__( 'After completing his medical training at %2$s and residency at %3$s, Dr. %1$s practiced within traditional healthcare settings before founding Baig Medical Group in Yuma, Arizona.', 'bmg-theme' ),
								$physician_last_name,
								$physician_med_school,
								$physician_residency
							)
						);
						?>
					</p>
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: physician last name */
								__( 'The transition to concierge medicine was deliberate. Having experienced the constraints of volume-based practice firsthand — where patient panels routinely exceed 2,000 and appointments are compressed to minutes — Dr. %s recognized that the model itself was the barrier to the care patients deserved.', 'bmg-theme' ),
								$physician_last_name
							)
						);
						?>
					</p>
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: physician last name */
								__( 'At Baig Medical Group, Dr. %s maintains a limited patient panel, conducts extended appointments, and remains personally accessible to every member. His clinical approach emphasizes prevention, nutrition, movement, and evidence-based medicine, with care plans developed collaboratively through shared decision-making.', 'bmg-theme' ),
								$physician_last_name
							)
						);
						?>
					</p>
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: physician last name */
								__( 'Outside of practice, Dr. %s is a devoted father of five and remains connected to his roots as a second-generation physician.', 'bmg-theme' ),
								$physician_last_name
							)
						);
						?>
					</p>
				</div>
			</div>

			<!-- Credentials Card -->
			<div class="col-lg-4">
				<div class="physician-credentials-sidebar">
					<h3 class="physician-credentials-sidebar__title">
						<?php esc_html_e( 'Credentials', 'bmg-theme' ); ?>
					</h3>
					<dl class="physician-credentials-sidebar__list">
						<dt><?php esc_html_e( 'Board Certification', 'bmg-theme' ); ?></dt>
						<dd<?php echo bmg_is_placeholder( $physician_board_cert ) ? ' class="is-placeholder"' : ''; ?>><?php echo esc_html( $physician_board_cert ); ?></dd>

						<dt><?php esc_html_e( 'Medical School', 'bmg-theme' ); ?></dt>
						<dd<?php echo bmg_is_placeholder( $physician_med_school ) ? ' class="is-placeholder"' : ''; ?>><?php echo esc_html( $physician_med_school ); ?></dd>

						<dt><?php esc_html_e( 'Residency', 'bmg-theme' ); ?></dt>
						<dd<?php echo bmg_is_placeholder( $physician_residency ) ? ' class="is-placeholder"' : ''; ?>><?php echo esc_html( $physician_residency ); ?></dd>

						<?php if ( ! empty( $physician_fellowship ) ) : ?>
							<dt><?php esc_html_e( 'Fellowship', 'bmg-theme' ); ?></dt>
							<dd><?php echo esc_html( $physician_fellowship ); ?></dd>
						<?php endif; ?>

						<dt><?php esc_html_e( 'Professional Memberships', 'bmg-theme' ); ?></dt>
						<dd<?php echo bmg_is_placeholder( $physician_memberships ) ? ' class="is-placeholder"' : ''; ?>><?php echo esc_html( $physician_memberships ); ?></dd>
					</dl>
				</div>
			</div>
		</div>

	</div>
</section>
