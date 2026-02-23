<?php
/**
 * Provider Bio Section — About Page
 *
 * Full provider profile with portrait, bio paragraphs using
 * dynamic Customizer variables, and credentials sidebar.
 * Matches CONTENT.md Section 2.3.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variables from Customizer.
$physician_name        = get_theme_mod( 'bmg_physician_name', '[Provider Name]' );
$physician_last_name   = get_theme_mod( 'bmg_physician_last_name', '[Last Name]' );
$physician_credentials = get_theme_mod( 'bmg_physician_credentials', '[Credentials]' );
$physician_med_school  = get_theme_mod( 'bmg_physician_med_school', '[Medical School]' );
$physician_residency   = get_theme_mod( 'bmg_physician_residency', '[Residency Program]' );
$physician_fellowship  = get_theme_mod( 'bmg_physician_fellowship', '' );
$physician_board_cert  = get_theme_mod( 'bmg_physician_board_cert', '[Certification]' );
$physician_memberships = get_theme_mod( 'bmg_physician_memberships', '[Professional Organizations]' );

// Portrait photo (close-crop) for credentials card.
$portrait_url = get_theme_mod( 'bmg_physician_photo_portrait', '' );
$portrait_id  = $portrait_url ? attachment_url_to_postid( $portrait_url ) : 0;

// Helper: detect placeholder values (wrapped in brackets).
if ( ! function_exists( 'bmg_is_placeholder' ) ) {
	function bmg_is_placeholder( $value ) {
		return preg_match( '/^\[.*\]$/', trim( $value ) );
	}
}
?>

<section id="physician-bio" class="section section-light physician-section reveal-on-scroll">
	<div class="container">

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

		<!-- Bio (~60%) + Credentials Card with Headshot (~35%) -->
		<div class="row g-5 justify-content-center">
			<div class="col-lg-7">
				<div class="physician-bio">
					<p>
						<?php
						echo esc_html(
							sprintf(
								/* translators: %s: physician last name */
								__( 'Dr. %s [provider bio paragraph 1 — credentials and experience overview.]', 'bmg-theme' ),
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
								__( 'Dr. %1$s [provider bio paragraph 2 — education and career background.] %2$s, %3$s.', 'bmg-theme' ),
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
								__( 'Dr. %s [provider bio paragraph 3 — motivation and philosophy.]', 'bmg-theme' ),
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
								__( 'Dr. %s [provider bio paragraph 4 — current practice approach.]', 'bmg-theme' ),
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
								__( 'Dr. %s [provider bio paragraph 5 — personal note.]', 'bmg-theme' ),
								$physician_last_name
							)
						);
						?>
					</p>
				</div>
			</div>

			<!-- Credentials Card with Headshot -->
			<div class="col-lg-4">
				<div class="physician-credentials-sidebar">

					<!-- Headshot -->
					<div class="physician-credentials-sidebar__photo">
						<?php if ( $portrait_id ) : ?>
							<?php
							echo wp_get_attachment_image(
								$portrait_id,
								'medium_large',
								false,
								array(
									'class'   => 'physician-credentials-sidebar__img',
									'alt'     => esc_attr( $physician_name ),
									'loading' => 'lazy',
								)
							);
							?>
						<?php elseif ( $portrait_url ) : ?>
							<img src="<?php echo esc_url( $portrait_url ); ?>"
								 alt="<?php echo esc_attr( $physician_name ); ?>"
								 class="physician-credentials-sidebar__img"
								 loading="lazy">
						<?php else : ?>
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/images/provider-placeholder.webp' ); ?>"
								 alt="<?php echo esc_attr( $physician_name ); ?>"
								 class="physician-credentials-sidebar__img"
								 loading="lazy">
						<?php endif; ?>
					</div>

					<!-- Credentials Content -->
					<div class="physician-credentials-sidebar__content">
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

	</div>
</section>
