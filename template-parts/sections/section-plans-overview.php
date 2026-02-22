<?php
/**
 * Plans Overview Section - BMG Homepage
 *
 * Three-tier plan cards with premium material presence.
 * Think luxury menu card or private banking product brochure.
 * Monthly/Annual billing toggle with smooth price transitions.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Annual savings percentage.
$annual_savings = 15;

// Plan data - placeholder content with monthly and annual pricing.
$plans = array(
	array(
		'name'         => __( 'Basic', 'bmg-theme' ),
		'description'  => __( 'Essential concierge care for individuals seeking a more personal healthcare experience.', 'bmg-theme' ),
		'price_month'  => 'XXX',
		'price_annual' => 'XXX',
	),
	array(
		'name'         => __( 'Premium', 'bmg-theme' ),
		'description'  => __( 'Enhanced access and comprehensive care coordination for busy professionals and families.', 'bmg-theme' ),
		'price_month'  => 'XXX',
		'price_annual' => 'XXX',
		'featured'     => true,
		'badge'        => __( 'Recommended', 'bmg-theme' ),
	),
	array(
		'name'         => __( 'VIP', 'bmg-theme' ),
		'description'  => __( 'The highest level of personalized care with 24/7 access and priority specialist referrals.', 'bmg-theme' ),
		'price_month'  => 'XXX',
		'price_annual' => 'XXX',
	),
);
?>

<section id="plans" class="section section-light reveal-on-scroll">
	<div class="container">

		<div class="row justify-content-center mb-4">
			<div class="col-lg-8 text-center">
				<h2 class="display-text h2 mb-3">
					<?php esc_html_e( 'Our Plans', 'bmg-theme' ); ?>
				</h2>
				<div class="silver-rule"></div>
				<p class="lead mt-4 mb-4">
					<?php esc_html_e( 'Choose the level of care that fits your needs.', 'bmg-theme' ); ?>
				</p>

				<!-- Billing Toggle -->
				<div class="billing-toggle-home" role="group" aria-label="<?php esc_attr_e( 'Billing frequency', 'bmg-theme' ); ?>">
					<button type="button" class="billing-toggle-home__btn active" data-billing="monthly">
						<?php esc_html_e( 'Monthly', 'bmg-theme' ); ?>
					</button>
					<button type="button" class="billing-toggle-home__btn" data-billing="annual">
						<?php esc_html_e( 'Annual', 'bmg-theme' ); ?>
						<span class="billing-toggle-home__save"><?php printf( esc_html__( 'Save %d%%', 'bmg-theme' ), $annual_savings ); ?></span>
					</button>
				</div>
			</div>
		</div>

		<div class="row g-4 justify-content-center plans-cards-container" data-billing="monthly">
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
							<!-- Monthly Price -->
							<div class="plan-card-home__price plan-card-home__price--monthly">
								<span class="plan-card-home__currency">$</span>
								<span class="plan-card-home__amount"><?php echo esc_html( $plan['price_month'] ); ?></span>
								<span class="plan-card-home__period">/mo</span>
							</div>
							<!-- Annual Price -->
							<div class="plan-card-home__price plan-card-home__price--annual">
								<span class="plan-card-home__currency">$</span>
								<span class="plan-card-home__amount"><?php echo esc_html( $plan['price_annual'] ); ?></span>
								<span class="plan-card-home__period">/yr</span>
							</div>
						</div>

						<a href="<?php echo esc_url( home_url( '/plans/' ) ); ?>" class="plan-card-home__btn<?php echo ! empty( $plan['featured'] ) ? ' plan-card-home__btn--filled' : ''; ?>">
							<?php esc_html_e( 'View Details', 'bmg-theme' ); ?>
						</a>

					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<div class="plans-cta">
			<a href="<?php echo esc_url( home_url( '/plans/' ) ); ?>" class="btn-compare">
				<?php esc_html_e( 'Compare All Plans', 'bmg-theme' ); ?>
			</a>
		</div>

	</div>
</section>
