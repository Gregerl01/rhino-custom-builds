<?php
/**
 * Provider Preview Section - Homepage
 *
 * Dark section introducing provider with two-column layout.
 * Portrait photo left, copy right.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Dynamic variables from Customizer.
$physician_name        = get_theme_mod( 'bmg_physician_name', '[Provider Name]' );
$physician_credentials = get_theme_mod( 'bmg_physician_credentials', '[Credentials]' );
$physician_years       = get_theme_mod( 'bmg_physician_years', '10' );
$physician_med_school  = get_theme_mod( 'bmg_physician_med_school', '[Medical School]' );
$physician_last_name   = get_theme_mod( 'bmg_physician_last_name', '[Last Name]' );

// Three-quarter body photo for homepage preview.
$portrait_url = get_theme_mod( 'bmg_physician_photo_full', '' );
$portrait_id  = $portrait_url ? attachment_url_to_postid( $portrait_url ) : 0;
?>

<section id="physician" class="section section-dark reveal-on-scroll">
	<div class="container">
		<div class="row align-items-center">

			<!-- Portrait Column -->
			<div class="col-lg-5 mb-5 mb-lg-0 bmg-reveal">
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
							<?php esc_html_e( 'Provider Portrait', 'bmg-theme' ); ?>
						</span>
					</div>
				<?php endif; ?>
			</div>

			<!-- Text Column -->
			<div class="col-lg-6 offset-lg-1 bmg-reveal" style="transition-delay: 120ms">
				<div class="physician-preview">

					<span class="physician-preview__eyebrow">
						<?php esc_html_e( '[Provider Eyebrow Text]', 'bmg-theme' ); ?>
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
									__( '%1$s is a %2$s. [Provider preview bio paragraph 1 — brief introduction.]', 'bmg-theme' ),
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
									__( 'Dr. %1$s [provider preview bio paragraph 2 — describe approach and availability.]', 'bmg-theme' ),
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
