<?php
/**
 * Plans Overview Section - BMG Homepage
 *
 * Three-tier plan cards with premium material presence.
 * Pricing TBD — displays "Contact for Pricing" until client provides.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Plan data — matches CONTENT.md Section 1.4.
$plans = array(
	array(
		'name'        => __( 'Essential', 'bmg-theme' ),
		'description' => __( 'Foundational concierge care for individuals.', 'bmg-theme' ),
		'features'    => array(
			__( 'Annual comprehensive health evaluation', 'bmg-theme' ),
			__( 'Same-day and next-day appointments', 'bmg-theme' ),
			__( 'Direct physician phone and messaging access', 'bmg-theme' ),
			__( 'Standard specialist referral coordination', 'bmg-theme' ),
			__( 'Foundational wellness programming', 'bmg-theme' ),
		),
	),
	array(
		'name'        => __( 'Premium', 'bmg-theme' ),
		'description' => __( 'Enhanced access with priority coordination.', 'bmg-theme' ),
		'featured'    => true,
		'badge'       => __( 'Recommended', 'bmg-theme' ),
		'features'    => array(
			__( 'Everything in Essential, plus:', 'bmg-theme' ),
			__( 'Extended appointment availability, including evenings', 'bmg-theme' ),
			__( 'Priority specialist referrals and follow-up', 'bmg-theme' ),
			__( 'Health coaching with nutrition and lifestyle guidance', 'bmg-theme' ),
			__( 'Annual executive physical with advanced screenings', 'bmg-theme' ),
			__( 'Family member add-on available', 'bmg-theme' ),
		),
	),
	array(
		'name'        => __( 'Concierge Elite', 'bmg-theme' ),
		'description' => __( 'The full measure of personalized medicine.', 'bmg-theme' ),
		'features'    => array(
			__( 'Everything in Premium, plus:', 'bmg-theme' ),
			__( '24/7 direct physician availability', 'bmg-theme' ),
			__( 'VIP specialist referral network with expedited scheduling', 'bmg-theme' ),
			__( 'Full-suite wellness, nutrition, and longevity programming', 'bmg-theme' ),
			__( 'In-home and on-site visit options', 'bmg-theme' ),
			__( 'Travel medicine and global care coordination', 'bmg-theme' ),
			__( 'Dedicated care coordinator', 'bmg-theme' ),
		),
	),
);
?>

<section id="plans" class="section section-light reveal-on-scroll">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<h2 class="display-text h2 mb-3">
					<?php esc_html_e( 'Membership Tiers', 'bmg-theme' ); ?>
				</h2>
				<div class="silver-rule"></div>
				<p class="lead mt-4 mb-0">
					<?php esc_html_e( 'Three levels of care, each built around access, attention, and coordination.', 'bmg-theme' ); ?>
				</p>
			</div>
		</div>

		<div class="row g-4 justify-content-center">
			<?php foreach ( $plans as $plan ) : ?>
				<div class="col-md-6 col-lg-4">
					<div class="plan-card-home<?php echo ! empty( $plan['featured'] ) ? ' plan-card-home--featured' : ''; ?>">

						<?php if ( ! empty( $plan['badge'] ) ) : ?>
							<span class="plan-card-home__badge"><?php echo esc_html( $plan['badge'] ); ?></span>
						<?php endif; ?>

						<h3 class="plan-card-home__name">
							<?php echo esc_html( $plan['name'] ); ?>
						</h3>

						<p class="plan-card-home__description">
							<?php echo esc_html( $plan['description'] ); ?>
						</p>

						<div class="plan-card-home__pricing">
							<span class="plan-card-home__pricing-tbd">
								<?php esc_html_e( 'Contact for Pricing', 'bmg-theme' ); ?>
							</span>
						</div>

						<?php if ( ! empty( $plan['features'] ) ) : ?>
							<ul class="plan-card-home__features">
								<?php foreach ( $plan['features'] as $feature ) : ?>
									<li><?php echo esc_html( $feature ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<a href="<?php echo esc_url( home_url( '/plans/' ) ); ?>" class="plan-card-home__btn<?php echo ! empty( $plan['featured'] ) ? ' plan-card-home__btn--filled' : ''; ?>">
							<?php esc_html_e( 'View Plan Details', 'bmg-theme' ); ?>
						</a>

					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="plans-cta">
			<p class="plans-cta__text">
				<?php esc_html_e( 'Not sure which tier fits?', 'bmg-theme' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-compare">
				<?php esc_html_e( 'Schedule a Consultation', 'bmg-theme' ); ?>
			</a>
			<p class="plans-cta__subtext">
				<?php esc_html_e( 'We will walk through your needs with no obligation.', 'bmg-theme' ); ?>
			</p>
		</div>

	</div>
</section>
