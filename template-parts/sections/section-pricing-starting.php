<?php
/**
 * Pricing (Starting At) — Rhino Custom Builds
 *
 * Grid-based price table. Recommended column is highlighted with a
 * red top rail. Collapses to stacked cards on mobile.
 *
 * Data via get_template_part $args:
 *   array(
 *     'pricing' => array(
 *       'overline'        => '...',
 *       'headline'        => '...',
 *       'columns'         => array( 'Bed Size', 'Standard', 'Premium', 'Off-Road' ),
 *       'rows'            => array( array( 'label', 'col1', 'col2', 'col3' ), ... ),
 *       'recommended_col' => 2,  // 1-indexed relative to the price columns
 *       'microcopy'       => '...',
 *     ),
 *   )
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$data = isset( $args['pricing'] ) && is_array( $args['pricing'] ) ? $args['pricing'] : array();

if ( empty( $data ) ) {
	return;
}

$overline    = isset( $data['overline'] ) ? $data['overline'] : '';
$headline    = isset( $data['headline'] ) ? $data['headline'] : '';
$columns     = isset( $data['columns'] ) && is_array( $data['columns'] ) ? $data['columns'] : array();
$rows        = isset( $data['rows'] ) && is_array( $data['rows'] ) ? $data['rows'] : array();
$recommended = isset( $data['recommended_col'] ) ? (int) $data['recommended_col'] : 0;
$microcopy   = isset( $data['microcopy'] ) ? $data['microcopy'] : '';
?>

<section class="section-pricing-starting" data-section="pricing-starting">
	<div class="container">

		<header class="section-pricing-starting__header">
			<?php if ( $overline ) : ?>
				<span class="section-pricing-starting__overline bmg-reveal">
					<?php echo esc_html( $overline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $headline ) : ?>
				<h2 class="section-pricing-starting__headline bmg-reveal">
					<?php echo esc_html( $headline ); ?>
				</h2>
			<?php endif; ?>
		</header>

		<?php if ( ! empty( $columns ) && ! empty( $rows ) ) : ?>
			<div class="section-pricing-starting__table bmg-reveal" role="table" aria-label="<?php esc_attr_e( 'Pricing by bed size', 'bmg-theme' ); ?>">

				<?php // Header row ?>
				<div class="section-pricing-starting__row section-pricing-starting__row--head" role="row">
					<?php foreach ( $columns as $col_idx => $col ) :
						$is_recommended = ( $col_idx >= 1 ) && ( $col_idx === $recommended );
						$cell_class     = 'section-pricing-starting__cell section-pricing-starting__cell--head';
						if ( 0 === $col_idx ) {
							$cell_class .= ' section-pricing-starting__cell--label';
						}
						if ( $is_recommended ) {
							$cell_class .= ' section-pricing-starting__cell--recommended';
						}
						?>
						<div class="<?php echo esc_attr( $cell_class ); ?>" role="columnheader">
							<?php if ( $is_recommended ) : ?>
								<span class="section-pricing-starting__recommended-badge"><?php esc_html_e( 'RECOMMENDED', 'bmg-theme' ); ?></span>
							<?php endif; ?>
							<?php echo esc_html( $col ); ?>
						</div>
					<?php endforeach; ?>
				</div>

				<?php // Body rows ?>
				<?php foreach ( $rows as $row ) : ?>
					<div class="section-pricing-starting__row" role="row">
						<?php foreach ( $row as $cell_idx => $cell ) :
							$is_label       = ( 0 === $cell_idx );
							$is_recommended = ( $cell_idx >= 1 ) && ( $cell_idx === $recommended );
							$cell_class     = 'section-pricing-starting__cell';
							if ( $is_label ) {
								$cell_class .= ' section-pricing-starting__cell--label';
							}
							if ( $is_recommended ) {
								$cell_class .= ' section-pricing-starting__cell--recommended';
							}
							?>
							<div class="<?php echo esc_attr( $cell_class ); ?>" role="cell" data-col="<?php echo esc_attr( isset( $columns[ $cell_idx ] ) ? $columns[ $cell_idx ] : '' ); ?>">
								<?php echo esc_html( $cell ); ?>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>

		<?php if ( $microcopy ) : ?>
			<p class="section-pricing-starting__microcopy bmg-reveal">
				<?php echo esc_html( $microcopy ); ?>
			</p>
		<?php endif; ?>

	</div>
</section>
