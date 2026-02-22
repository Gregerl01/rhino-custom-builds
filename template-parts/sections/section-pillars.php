<?php
/**
 * Value Pillars Section - BMG Homepage
 *
 * Four key benefits in a clean grid layout.
 * No icons — text only. The restraint IS the design.
 * Left silver border creates vertical rhythm.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Pillar content.
$pillars = array(
	array(
		'title' => __( 'Unhurried Appointments', 'bmg-theme' ),
		'text'  => __( 'Visits are never rushed. Your physician dedicates 30 to 60 minutes per appointment, ensuring every concern is heard and addressed thoroughly.', 'bmg-theme' ),
	),
	array(
		'title' => __( 'Direct Physician Access', 'bmg-theme' ),
		'text'  => __( 'Reach your physician directly by phone, email, or secure message. No navigating phone trees or waiting days for a callback.', 'bmg-theme' ),
	),
	array(
		'title' => __( 'Preventive Focus', 'bmg-theme' ),
		'text'  => __( 'Comprehensive wellness planning, advanced screenings, and proactive health management — designed to prevent problems before they start.', 'bmg-theme' ),
	),
	array(
		'title' => __( 'Coordinated Care', 'bmg-theme' ),
		'text'  => __( 'When specialist referrals are needed, your physician personally coordinates with your care team to ensure seamless, informed treatment.', 'bmg-theme' ),
	),
);
?>

<section id="pillars" class="section section-light-warm reveal-on-scroll">
	<div class="container">
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
