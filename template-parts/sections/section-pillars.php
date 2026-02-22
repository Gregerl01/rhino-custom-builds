<?php
/**
 * Value Pillars Section - BMG Homepage
 *
 * Four key membership benefits in a clean grid layout.
 * Dark section (Obsidian). Left silver border creates vertical rhythm.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Pillar content — order matches CONTENT.md Section 1.3.
$pillars = array(
	array(
		'title' => __( 'Direct Physician Access', 'bmg-theme' ),
		'text'  => __( 'Reach Dr. Baig personally by phone, text, or secure message. Same-day and next-day appointments are standard, not exceptions. No gatekeeping, no hold queues.', 'bmg-theme' ),
	),
	array(
		'title' => __( 'Unhurried Appointments', 'bmg-theme' ),
		'text'  => __( 'Visits are scheduled for 30 to 60 minutes. There is time to listen, investigate, discuss options, and answer every question — without watching the clock.', 'bmg-theme' ),
	),
	array(
		'title' => __( 'Coordinated Specialist Care', 'bmg-theme' ),
		'text'  => __( 'When referrals are needed, Dr. Baig personally coordinates with specialists, follows up on results, and ensures nothing falls between the cracks.', 'bmg-theme' ),
	),
	array(
		'title' => __( 'Prevention-First Approach', 'bmg-theme' ),
		'text'  => __( 'Comprehensive evaluations, advanced screenings, and personalized wellness planning built around nutrition, movement, and lifestyle — identifying risk early, not reacting after symptoms appear.', 'bmg-theme' ),
	),
);
?>

<section id="pillars" class="section section-dark reveal-on-scroll">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<h2 class="display-text mb-0">
					<?php esc_html_e( 'What Membership Provides', 'bmg-theme' ); ?>
				</h2>
				<div class="silver-rule"></div>
			</div>
		</div>

		<div class="row pillars-row">
			<?php foreach ( $pillars as $pillar ) : ?>
				<div class="col-12 col-md-6 col-lg-3">
					<div class="pillar">
						<h3 class="pillar__title">
							<?php echo esc_html( $pillar['title'] ); ?>
						</h3>
						<p class="pillar__text">
							<?php echo esc_html( $pillar['text'] ); ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
