<?php
/**
 * Physician Preview Section - BMG Homepage
 *
 * Dark section introducing Dr. Baig with two-column layout.
 * Portrait photo left, copy right. Photo placeholder until client provides.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variables from Customizer.
$physician_name        = get_theme_mod( 'bmg_physician_name', 'Dr. Adil Baig' );
$physician_credentials = get_theme_mod( 'bmg_physician_credentials', 'Board-Certified Family Medicine Physician' );
$physician_years       = get_theme_mod( 'bmg_physician_years', '10' );
$physician_med_school  = get_theme_mod( 'bmg_physician_med_school', '[Medical School]' );
$physician_last_name   = get_theme_mod( 'bmg_physician_last_name', 'Baig' );

// Portrait photo — try attachment ID for responsive srcset.
$portrait_url = get_theme_mod( 'bmg_physician_photo_portrait', '' );
$portrait_id  = $portrait_url ? attachment_url_to_postid( $portrait_url ) : 0;
?>

<section id="physician" class="section section-dark reveal-on-scroll">
	<div class="container">
		<div class="row align-items-center">

			<!-- Portrait Column -->
			<div class="col-lg-5 mb-5 mb-lg-0">
				<?php if ( $portrait_id ) : ?>
					<div class="physician-preview__portrait physician-preview__portrait--has-image">
						<?php
						echo wp_get_attachment_image(
							$portrait_id,
							'large',
							false,
							array(
								'class'   => 'physician-preview__img',
								'alt'     => esc_attr( $physician_name ),
								'loading' => 'lazy',
							)
						);
						?>
					</div>
				<?php elseif ( $portrait_url ) : ?>
					<div class="physician-preview__portrait physician-preview__portrait--has-image">
						<img src="<?php echo esc_url( $portrait_url ); ?>"
							 alt="<?php echo esc_attr( $physician_name ); ?>"
							 class="physician-preview__img"
							 loading="lazy">
					</div>
				<?php else : ?>
					<div class="physician-preview__portrait">
						<span class="physician-preview__portrait-text">
							<?php esc_html_e( 'Physician Portrait', 'bmg-theme' ); ?>
						</span>
					</div>
				<?php endif; ?>
			</div>

			<!-- Text Column -->
			<div class="col-lg-6 offset-lg-1">
				<div class="physician-preview">

					<span class="physician-preview__eyebrow">
						<?php esc_html_e( 'Your Physician', 'bmg-theme' ); ?>
					</span>

					<h2 class="physician-preview__heading display-text">
						<?php echo esc_html( $physician_name ); ?>
					</h2>

					<div class="physician-preview__bio">
						<p>
							<?php
							echo esc_html(
								sprintf(
									/* translators: 1: physician name, 2: credentials */
									__( '%1$s is a %2$s with over a decade of clinical experience. A second-generation physician and father of five, he founded Baig Medical Group on a conviction that guided his career: time is the most valuable resource in medicine — for patients and physicians alike.', 'bmg-theme' ),
									$physician_name,
									strtolower( $physician_credentials )
								)
							);
							?>
						</p>
						<p>
							<?php
							echo esc_html(
								sprintf(
									/* translators: 1: physician last name */
									__( 'In Yuma, Dr. %1$s maintains a limited patient panel, conducts extended appointments, and remains personally accessible to every member. The result is care built around attention, not volume.', 'bmg-theme' ),
									$physician_last_name
								)
							);
							?>
						</p>
					</div>

					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="physician-preview__link">
						<?php esc_html_e( 'Read Full Profile', 'bmg-theme' ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>

				</div>
			</div>

		</div>
	</div>
</section>
