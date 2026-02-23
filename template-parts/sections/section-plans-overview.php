<?php
/**
 * Plans Overview Section - Homepage
 *
 * Three-tier plan cards with billing toggle and premium material presence.
 * Placeholder pricing — update the $plan_pricing array when client provides final rates.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// ──────────────────────────────────────────────
// Placeholder pricing — update these values when client provides final rates.
// Monthly = displayed rate. Annual = discounted monthly rate billed annually.
// ──────────────────────────────────────────────
$plan_pricing = array(
	'essential' => array( 'monthly' => 299, 'annual' => 269 ),
	'premium'   => array( 'monthly' => 499, 'annual' => 449 ),
	'elite'     => array( 'monthly' => 999, 'annual' => 899 ),
);

// Plan data — matches CONTENT.md Section 1.4.
$plans = array(
	array(
		'name'          => __( '[Plan Tier 1]', 'bmg-theme' ),
		'key'           => 'essential',
		'description'   => __( '[Plan Tier 1 short description.]', 'bmg-theme' ),
		'price_monthly' => $plan_pricing['essential']['monthly'],
		'price_annual'  => $plan_pricing['essential']['annual'],
		'features'      => array(
			__( '[Feature 1]', 'bmg-theme' ),
			__( '[Feature 2]', 'bmg-theme' ),
			__( '[Feature 3]', 'bmg-theme' ),
			__( '[Feature 4]', 'bmg-theme' ),
			__( '[Feature 5]', 'bmg-theme' ),
		),
	),
	array(
		'name'          => __( '[Plan Tier 2]', 'bmg-theme' ),
		'key'           => 'premium',
		'description'   => __( '[Plan Tier 2 short description.]', 'bmg-theme' ),
		'featured'      => true,
		'badge'         => __( 'Recommended', 'bmg-theme' ),
		'price_monthly' => $plan_pricing['premium']['monthly'],
		'price_annual'  => $plan_pricing['premium']['annual'],
		'features'      => array(
			__( '[Everything in [Plan Tier 1], plus:]', 'bmg-theme' ),
			__( '[Feature 6]', 'bmg-theme' ),
			__( '[Feature 7]', 'bmg-theme' ),
			__( '[Feature 8]', 'bmg-theme' ),
			__( '[Feature 9]', 'bmg-theme' ),
			__( '[Feature 10]', 'bmg-theme' ),
		),
	),
	array(
		'name'          => __( '[Plan Tier 3]', 'bmg-theme' ),
		'key'           => 'elite',
		'description'   => __( '[Plan Tier 3 short description.]', 'bmg-theme' ),
		'price_monthly' => $plan_pricing['elite']['monthly'],
		'price_annual'  => $plan_pricing['elite']['annual'],
		'features'      => array(
			__( '[Everything in [Plan Tier 2], plus:]', 'bmg-theme' ),
			__( '[Feature 11]', 'bmg-theme' ),
			__( '[Feature 12]', 'bmg-theme' ),
			__( '[Feature 13]', 'bmg-theme' ),
			__( '[Feature 14]', 'bmg-theme' ),
			__( '[Feature 15]', 'bmg-theme' ),
			__( '[Feature 16]', 'bmg-theme' ),
		),
	),
);
?>

<section id="plans" class="section section-light reveal-on-scroll">
	<div class="container">

		<div class="row justify-content-center mb-4">
			<div class="col-lg-8 text-center">
				<h2 class="display-text h2 mb-3">
					<?php esc_html_e( '[Plans Section Headline]', 'bmg-theme' ); ?>
				</h2>
				<div class="silver-rule"></div>
				<p class="lead mt-4 mb-0">
					<?php esc_html_e( '[Plans section subheading — describe the tiers.]', 'bmg-theme' ); ?>
				</p>
			</div>
		</div>

		<!-- Billing Toggle -->
		<div class="row justify-content-center mb-5">
			<div class="col text-center">
				<div class="billing-toggle-home">
					<button class="billing-toggle-home__btn active" data-billing="monthly" type="button">
						<?php esc_html_e( 'Monthly', 'bmg-theme' ); ?>
					</button>
					<button class="billing-toggle-home__btn" data-billing="annual" type="button">
						<?php esc_html_e( 'Annual', 'bmg-theme' ); ?>
						<span class="billing-toggle-home__save"><?php esc_html_e( 'Save 10%', 'bmg-theme' ); ?></span>
					</button>
				</div>
			</div>
		</div>

		<div class="plans-cards-container" data-billing="monthly">
			<div class="row g-4 justify-content-center bmg-reveal-stagger">
				<?php foreach ( $plans as $plan ) : ?>
					<div class="col-md-6 col-lg-4 bmg-reveal">
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
								<div class="plan-card-home__price plan-card-home__price--monthly">
									<span class="plan-card-home__currency">$</span>
									<span class="plan-card-home__amount"><?php echo esc_html( $plan['price_monthly'] ); ?></span>
									<span class="plan-card-home__period">/mo</span>
								</div>
								<div class="plan-card-home__price plan-card-home__price--annual">
									<span class="plan-card-home__currency">$</span>
									<span class="plan-card-home__amount"><?php echo esc_html( $plan['price_annual'] ); ?></span>
									<span class="plan-card-home__period">/mo</span>
								</div>
							</div>

							<?php if ( ! empty( $plan['features'] ) ) : ?>
								<ul class="plan-card-home__features">
									<?php foreach ( $plan['features'] as $feature ) : ?>
										<li><?php echo esc_html( $feature ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>

							<a href="<?php echo esc_url( home_url( '/our-plans/' ) ); ?>" class="plan-card-home__btn<?php echo ! empty( $plan['featured'] ) ? ' plan-card-home__btn--filled' : ''; ?>">
								<?php esc_html_e( 'View Plan Details', 'bmg-theme' ); ?>
							</a>

						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="plans-cta">
			<p class="plans-cta__text">
				<?php esc_html_e( '[Plans CTA question]', 'bmg-theme' ); ?>
			</p>
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-compare">
				<?php esc_html_e( '[Plans CTA Button Text]', 'bmg-theme' ); ?>
			</a>
			<p class="plans-cta__subtext">
				<?php esc_html_e( '[Plans CTA supporting text.]', 'bmg-theme' ); ?>
			</p>
		</div>

	</div>
</section>
