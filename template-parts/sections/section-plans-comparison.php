<?php
/**
 * Plans Comparison Section
 *
 * Three-tier plan comparison with monthly/annual toggle.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Plan data - placeholder content (will be replaced by WooCommerce products).
$plans = array(
	'basic' => array(
		'name'        => __( 'Basic', 'bmg-theme' ),
		'description' => __( 'Essential concierge care for individuals seeking a more personal healthcare experience.', 'bmg-theme' ),
		'monthly'     => '$XXX',
		'annual'      => '$X,XXX',
		'features'    => array(
			__( 'Same-day or next-day appointments', 'bmg-theme' ),
			__( 'Extended appointment times (30+ min)', 'bmg-theme' ),
			__( 'Direct phone access to physician', 'bmg-theme' ),
			__( 'Annual comprehensive wellness exam', 'bmg-theme' ),
			__( 'Care coordination assistance', 'bmg-theme' ),
		),
		'featured'    => false,
	),
	'premium' => array(
		'name'        => __( 'Premium', 'bmg-theme' ),
		'description' => __( 'Enhanced access and comprehensive care coordination for busy professionals and families.', 'bmg-theme' ),
		'monthly'     => '$XXX',
		'annual'      => '$X,XXX',
		'features'    => array(
			__( 'All Basic features included', 'bmg-theme' ),
			__( 'After-hours phone consultations', 'bmg-theme' ),
			__( 'Priority specialist referrals', 'bmg-theme' ),
			__( 'Preventive health screenings', 'bmg-theme' ),
			__( 'Personalized wellness planning', 'bmg-theme' ),
			__( 'Prescription coordination', 'bmg-theme' ),
		),
		'featured'    => true,
		'badge'       => __( 'Most Popular', 'bmg-theme' ),
	),
	'vip' => array(
		'name'        => __( 'VIP', 'bmg-theme' ),
		'description' => __( 'The highest level of personalized care with 24/7 access and white-glove service.', 'bmg-theme' ),
		'monthly'     => '$XXX',
		'annual'      => '$X,XXX',
		'features'    => array(
			__( 'All Premium features included', 'bmg-theme' ),
			__( '24/7 physician access', 'bmg-theme' ),
			__( 'Home and office visits available', 'bmg-theme' ),
			__( 'Executive health assessments', 'bmg-theme' ),
			__( 'Concierge travel medicine', 'bmg-theme' ),
			__( 'Family member discounts', 'bmg-theme' ),
			__( 'Priority hospital admission coordination', 'bmg-theme' ),
		),
		'featured'    => false,
	),
);
?>

<section id="plans-comparison" class="section section-light plans-comparison">
	<div class="container">

		<!-- Section Header -->
		<div class="row justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<h2 class="display-text h1 mb-3">
					<?php esc_html_e( 'Choose Your Plan', 'bmg-theme' ); ?>
				</h2>
				<p class="lead text-muted">
					<?php esc_html_e( 'Select the membership that best fits your healthcare needs.', 'bmg-theme' ); ?>
				</p>
			</div>
		</div>

		<!-- Billing Toggle -->
		<div class="row justify-content-center mb-5">
			<div class="col-auto">
				<div class="billing-toggle" role="tablist" aria-label="<?php esc_attr_e( 'Billing frequency', 'bmg-theme' ); ?>">
					<button type="button"
							class="billing-toggle__btn active"
							data-billing="monthly"
							role="tab"
							aria-selected="true"
							aria-controls="plans-monthly">
						<?php esc_html_e( 'Monthly', 'bmg-theme' ); ?>
					</button>
					<button type="button"
							class="billing-toggle__btn"
							data-billing="annual"
							role="tab"
							aria-selected="false"
							aria-controls="plans-annual">
						<?php esc_html_e( 'Annual', 'bmg-theme' ); ?>
						<span class="billing-toggle__save"><?php esc_html_e( 'Save 15%', 'bmg-theme' ); ?></span>
					</button>
				</div>
			</div>
		</div>

		<!-- Plans Grid -->
		<div class="row g-4 justify-content-center">
			<?php foreach ( $plans as $plan_key => $plan ) : ?>
				<div class="col-md-6 col-lg-4">
					<div class="plan-card <?php echo $plan['featured'] ? 'plan-card--featured' : ''; ?>">

						<?php if ( ! empty( $plan['badge'] ) ) : ?>
							<div class="plan-card__badge">
								<?php echo esc_html( $plan['badge'] ); ?>
							</div>
						<?php endif; ?>

						<div class="plan-card__header">
							<h3 class="plan-card__name">
								<?php echo esc_html( $plan['name'] ); ?>
							</h3>
							<p class="plan-card__description">
								<?php echo esc_html( $plan['description'] ); ?>
							</p>
						</div>

						<div class="plan-card__pricing">
							<div class="plan-card__price" data-monthly="<?php echo esc_attr( $plan['monthly'] ); ?>" data-annual="<?php echo esc_attr( $plan['annual'] ); ?>">
								<span class="plan-card__amount"><?php echo esc_html( $plan['monthly'] ); ?></span>
								<span class="plan-card__period"><?php esc_html_e( '/month', 'bmg-theme' ); ?></span>
							</div>
							<p class="plan-card__billing-note">
								<span class="billing-monthly"><?php esc_html_e( 'Billed monthly', 'bmg-theme' ); ?></span>
								<span class="billing-annual" style="display: none;"><?php esc_html_e( 'Billed annually', 'bmg-theme' ); ?></span>
							</p>
						</div>

						<ul class="plan-card__features">
							<?php foreach ( $plan['features'] as $feature ) : ?>
								<li>
									<svg class="plan-card__check" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
									</svg>
									<?php echo esc_html( $feature ); ?>
								</li>
							<?php endforeach; ?>
						</ul>

						<div class="plan-card__footer">
							<a href="<?php echo esc_url( home_url( '/enroll/' ) ); ?>" class="btn <?php echo $plan['featured'] ? 'btn-dark' : 'btn-outline-dark'; ?> w-100">
								<?php esc_html_e( 'Get Started', 'bmg-theme' ); ?>
							</a>
						</div>

					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Additional Info -->
		<div class="row justify-content-center mt-5">
			<div class="col-lg-8 text-center">
				<p class="text-muted small">
					<?php esc_html_e( 'All plans include a one-time enrollment fee. Prices subject to change. Contact us for family and corporate rates.', 'bmg-theme' ); ?>
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="text-decoration-underline">
					<?php esc_html_e( 'Questions? Contact us', 'bmg-theme' ); ?>
				</a>
			</div>
		</div>

	</div>
</section>

<script>
(function() {
	'use strict';

	document.addEventListener('DOMContentLoaded', function() {
		const toggleBtns = document.querySelectorAll('.billing-toggle__btn');
		const priceElements = document.querySelectorAll('.plan-card__price');
		const monthlyNotes = document.querySelectorAll('.billing-monthly');
		const annualNotes = document.querySelectorAll('.billing-annual');

		toggleBtns.forEach(function(btn) {
			btn.addEventListener('click', function() {
				const billing = this.dataset.billing;

				// Update active state
				toggleBtns.forEach(function(b) {
					b.classList.remove('active');
					b.setAttribute('aria-selected', 'false');
				});
				this.classList.add('active');
				this.setAttribute('aria-selected', 'true');

				// Update prices
				priceElements.forEach(function(el) {
					const amount = el.querySelector('.plan-card__amount');
					const period = el.querySelector('.plan-card__period');
					if (billing === 'annual') {
						amount.textContent = el.dataset.annual;
						period.textContent = '/year';
					} else {
						amount.textContent = el.dataset.monthly;
						period.textContent = '/month';
					}
				});

				// Update billing notes
				monthlyNotes.forEach(function(el) {
					el.style.display = billing === 'monthly' ? '' : 'none';
				});
				annualNotes.forEach(function(el) {
					el.style.display = billing === 'annual' ? '' : 'none';
				});
			});
		});
	});
})();
</script>
