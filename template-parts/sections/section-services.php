<?php
/**
 * Service Categories Section — Services Page
 *
 * Five service blocks with alternating backgrounds.
 * Matches CONTENT.md Section 6.2.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

$services = array(
	array(
		'title'    => __( 'Primary & Internal Medicine', 'bmg-theme' ),
		'body'     => __( 'Your membership begins with a physician who knows your full medical history — not a chart summary. Appointments are 30 to 60 minutes, with time for thorough examination, conversation, and follow-up planning. Acute concerns — respiratory illness, musculoskeletal pain, infections, skin conditions — are addressed same-day or next-day. Chronic conditions such as hypertension, diabetes, and thyroid disorders are managed with consistent oversight and proactive adjustment, always with the goal of addressing root causes.', 'bmg-theme' ),
		'cta_text' => __( 'See Membership Plans', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'light',
	),
	array(
		'title'    => __( 'Preventive Screenings & Executive Physicals', 'bmg-theme' ),
		'body'     => __( 'Every member receives an annual comprehensive evaluation: detailed health history, physical examination, and age-appropriate laboratory work. Premium and Concierge Elite members receive an executive-level physical with advanced diagnostics — cardiovascular risk panels, metabolic biomarkers, cancer screenings, and imaging tailored to age, sex, and family history. Results are reviewed in a dedicated follow-up appointment where Dr. Baig walks through findings, explains implications, and builds a plan grounded in prevention and long-term wellness.', 'bmg-theme' ),
		'cta_text' => __( 'Compare Plan Tiers', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'dark',
	),
	array(
		'title'    => __( 'Same-Day and Urgent Appointments', 'bmg-theme' ),
		'body'     => __( 'When something comes up, you should not have to wait days or resort to urgent care. All members have same-day and next-day appointments for acute concerns. Premium members have extended evening availability. Concierge Elite members reach Dr. Baig directly at any hour. The principle is simple: when you need medical attention, your own physician is available — not a stranger at a walk-in clinic.', 'bmg-theme' ),
		'cta_text' => __( 'Learn About Access by Tier', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'light',
	),
	array(
		'title'    => __( 'Specialist Referrals & Care Coordination', 'bmg-theme' ),
		'body'     => __( 'Referrals at Baig Medical Group are not a hand-off. Dr. Baig identifies the appropriate specialist, shares relevant records, and facilitates scheduling directly. After your specialist visit, he reviews findings, integrates them into your care plan, and ensures follow-up actions are completed. Concierge Elite members receive multi-specialist case management for complex or overlapping conditions, with Dr. Baig serving as the central coordinator across all providers.', 'bmg-theme' ),
		'cta_text' => __( 'Schedule a Consultation', 'bmg-theme' ),
		'cta_url'  => '/contact/',
		'bg'       => 'dark',
	),
	array(
		'title'    => __( 'Wellness, Nutrition & Longevity Planning', 'bmg-theme' ),
		'body'     => __( 'Dr. Baig\'s approach to care extends well beyond diagnosis and prescription. His clinical philosophy emphasizes nutrition, movement, lifestyle habits, and prevention as foundational to long-term health. All members receive wellness guidance as part of their care. Premium and Concierge Elite members receive structured health coaching, personalized nutrition plans, and wellness strategies informed by their screening results and goals. Concierge Elite members access the full suite — longevity planning, fitness integration, sleep optimization, and stress management.', 'bmg-theme' ),
		'cta_text' => __( 'View the Full Plan Comparison', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'light',
	),
);
?>

<?php foreach ( $services as $service ) : ?>
	<section class="section section-<?php echo esc_attr( $service['bg'] ); ?> reveal-on-scroll">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">

					<div class="service-block">
						<h2 class="service-block__title display-text">
							<?php echo esc_html( $service['title'] ); ?>
						</h2>
						<div class="silver-rule silver-rule--left"></div>
						<p class="service-block__body">
							<?php echo esc_html( $service['body'] ); ?>
						</p>
						<a href="<?php echo esc_url( home_url( $service['cta_url'] ) ); ?>" class="service-block__link">
							<?php echo esc_html( $service['cta_text'] ); ?>
							<span aria-hidden="true">&rarr;</span>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>
