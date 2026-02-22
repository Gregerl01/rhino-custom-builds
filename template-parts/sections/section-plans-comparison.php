<?php
/**
 * Plans Comparison Section — Plans Page
 *
 * Detailed feature-by-feature comparison table for all three tiers.
 * Matches CONTENT.md Section 3.2. Pricing TBD.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

// Comparison data — matches CONTENT.md Section 3.2.
$categories = array(
	array(
		'name'     => __( 'Access & Availability', 'bmg-theme' ),
		'features' => array(
			array( __( 'Direct physician phone/text', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( 'Secure messaging', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( 'Same-day/next-day appointments', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( 'Extended hours (evenings)', 'bmg-theme' ), '—', '✓', '✓' ),
			array( __( '24/7 physician availability', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( 'Evaluations & Screenings', 'bmg-theme' ),
		'features' => array(
			array( __( 'Annual comprehensive evaluation', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( 'Executive physical with advanced panels', 'bmg-theme' ), '—', '✓', '✓' ),
			array( __( 'Quarterly health check-ins', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( 'Specialist Coordination', 'bmg-theme' ),
		'features' => array(
			array( __( 'Referral coordination', 'bmg-theme' ), __( 'Standard', 'bmg-theme' ), __( 'Priority', 'bmg-theme' ), __( 'VIP / Expedited', 'bmg-theme' ) ),
			array( __( 'Post-referral follow-up', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( 'Multi-specialist case management', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( 'Wellness & Prevention', 'bmg-theme' ),
		'features' => array(
			array( __( 'Foundational wellness programming', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( 'Health coaching (nutrition & lifestyle)', 'bmg-theme' ), '—', '✓', '✓' ),
			array( __( 'Longevity & optimization planning', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( 'Convenience', 'bmg-theme' ),
		'features' => array(
			array( __( 'In-home/on-site visits', 'bmg-theme' ), '—', '—', '✓' ),
			array( __( 'Travel medicine & global coordination', 'bmg-theme' ), '—', '—', '✓' ),
			array( __( 'Dedicated care coordinator', 'bmg-theme' ), '—', '—', '✓' ),
			array( __( 'Family member add-on', 'bmg-theme' ), '—', '✓', '✓' ),
		),
	),
);
?>

<section id="plans-comparison" class="section section-light reveal-on-scroll">
	<div class="container">

		<div class="plans-table-wrapper">
			<table class="plans-table">
				<thead>
					<tr>
						<th class="plans-table__feature-col">
							<span class="sr-only"><?php esc_html_e( 'Feature', 'bmg-theme' ); ?></span>
						</th>
						<th class="plans-table__plan-col">
							<?php esc_html_e( 'Essential', 'bmg-theme' ); ?>
						</th>
						<th class="plans-table__plan-col plans-table__plan-col--featured">
							<?php esc_html_e( 'Premium', 'bmg-theme' ); ?>
							<span class="plans-table__badge"><?php esc_html_e( 'Recommended', 'bmg-theme' ); ?></span>
						</th>
						<th class="plans-table__plan-col">
							<?php esc_html_e( 'Concierge Elite', 'bmg-theme' ); ?>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $categories as $category ) : ?>
						<tr class="plans-table__category-row">
							<td colspan="4"><?php echo esc_html( $category['name'] ); ?></td>
						</tr>
						<?php foreach ( $category['features'] as $feature ) : ?>
							<tr>
								<td class="plans-table__feature-name"><?php echo esc_html( $feature[0] ); ?></td>
								<td class="plans-table__cell"><?php echo esc_html( $feature[1] ); ?></td>
								<td class="plans-table__cell plans-table__cell--featured"><?php echo esc_html( $feature[2] ); ?></td>
								<td class="plans-table__cell"><?php echo esc_html( $feature[3] ); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php endforeach; ?>

					<!-- Pricing rows -->
					<tr class="plans-table__category-row">
						<td colspan="4"><?php esc_html_e( 'Investment', 'bmg-theme' ); ?></td>
					</tr>
					<tr>
						<td class="plans-table__feature-name"><?php esc_html_e( 'Monthly', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--featured plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
					</tr>
					<tr>
						<td class="plans-table__feature-name"><?php esc_html_e( 'Annual', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--featured plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="row justify-content-center mt-4">
			<div class="col-lg-10 text-center">
				<p class="plans-table__note">
					<?php esc_html_e( 'All plans require an initial enrollment consultation. Annual commitments include a preferred rate. Pricing reflects physician access and care coordination — standard office visit copays and insurance billing for covered services remain separate.', 'bmg-theme' ); ?>
				</p>
			</div>
		</div>

	</div>
</section>
