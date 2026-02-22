<?php
/**
 * Physician Preview Section - BMG Homepage
 *
 * Dark section introducing the physician with credibility markers.
 * Two-column layout: text left, portrait placeholder right.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Value propositions with silver dash prefix.
$value_props = array(
	__( 'Direct Access — Your physician, not a gatekeeper', 'bmg-theme' ),
	__( 'Unhurried Visits — 30-60 minutes, every time', 'bmg-theme' ),
	__( 'Personalized Plans — Healthcare built around your life', 'bmg-theme' ),
	__( 'Preventive First — Proactive, not reactive', 'bmg-theme' ),
);
?>

<section id="physician" class="section section-dark reveal-on-scroll">
	<div class="container">
		<div class="row align-items-center">

			<!-- Text Column -->
			<div class="col-lg-6 mb-5 mb-lg-0">
				<div class="physician-preview">

					<span class="physician-preview__eyebrow">
						<?php esc_html_e( 'Your Physician', 'bmg-theme' ); ?>
					</span>

					<h2 class="physician-preview__heading display-text">
						<?php esc_html_e( 'Healthcare, the Way It Should Be', 'bmg-theme' ); ?>
					</h2>

					<p class="physician-preview__bio">
						<?php esc_html_e( 'Dr. [Name] founded Baig Medical Group on the principle that exceptional healthcare requires time — time to listen, time to understand, and time to develop a care plan tailored to your life. With [X] years of experience in internal medicine, Dr. [Name] brings both clinical expertise and a genuine commitment to each patient\'s wellbeing.', 'bmg-theme' ); ?>
					</p>

					<ul class="physician-preview__values">
						<?php foreach ( $value_props as $prop ) : ?>
							<li><?php echo esc_html( $prop ); ?></li>
						<?php endforeach; ?>
					</ul>

					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="physician-preview__link">
						<?php esc_html_e( 'Learn more about Dr. [Name]', 'bmg-theme' ); ?>
						<span aria-hidden="true">&rarr;</span>
					</a>

				</div>
			</div>

			<!-- Portrait Column -->
			<div class="col-lg-5 offset-lg-1">
				<div class="physician-preview__portrait">
					<span class="physician-preview__portrait-text">
						<?php esc_html_e( 'Physician Portrait', 'bmg-theme' ); ?>
					</span>
				</div>
			</div>

		</div>
	</div>
</section>
