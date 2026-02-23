<?php
/**
 * Plans Comparison Section — Plans Page
 *
 * Detailed feature-by-feature comparison table for all three tiers.
 * Matches CONTENT.md Section 3.2. Pricing TBD.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Comparison data — matches CONTENT.md Section 3.2.
$categories = array(
	array(
		'name'     => __( '[Feature Category 1]', 'bmg-theme' ),
		'features' => array(
			array( __( '[Feature description]', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( '[Feature Category 2]', 'bmg-theme' ),
		'features' => array(
			array( __( '[Feature description]', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( '[Feature Category 3]', 'bmg-theme' ),
		'features' => array(
			array( __( '[Feature description]', 'bmg-theme' ), __( '[Tier 1 level]', 'bmg-theme' ), __( '[Tier 2 level]', 'bmg-theme' ), __( '[Tier 3 level]', 'bmg-theme' ) ),
			array( __( '[Feature description]', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( '[Feature Category 4]', 'bmg-theme' ),
		'features' => array(
			array( __( '[Feature description]', 'bmg-theme' ), '✓', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '✓', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
		),
	),
	array(
		'name'     => __( '[Feature Category 5]', 'bmg-theme' ),
		'features' => array(
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '—', '✓' ),
			array( __( '[Feature description]', 'bmg-theme' ), '—', '✓', '✓' ),
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
							<?php esc_html_e( '[Plan Tier 1]', 'bmg-theme' ); ?>
						</th>
						<th class="plans-table__plan-col plans-table__plan-col--featured">
							<?php esc_html_e( '[Plan Tier 2]', 'bmg-theme' ); ?>
							<span class="plans-table__badge"><?php esc_html_e( 'Recommended', 'bmg-theme' ); ?></span>
						</th>
						<th class="plans-table__plan-col">
							<?php esc_html_e( '[Plan Tier 3]', 'bmg-theme' ); ?>
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
						<td colspan="4"><?php esc_html_e( '[Feature Category 6]', 'bmg-theme' ); ?></td>
					</tr>
					<tr>
						<td class="plans-table__feature-name"><?php esc_html_e( '[Feature description]', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--featured plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
						<td class="plans-table__cell plans-table__cell--pricing"><?php esc_html_e( 'Contact Us', 'bmg-theme' ); ?></td>
					</tr>
					<tr>
						<td class="plans-table__feature-name"><?php esc_html_e( '[Feature description]', 'bmg-theme' ); ?></td>
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
					<?php esc_html_e( '[Plans disclaimer and pricing note.]', 'bmg-theme' ); ?>
				</p>
			</div>
		</div>

	</div>
</section>
