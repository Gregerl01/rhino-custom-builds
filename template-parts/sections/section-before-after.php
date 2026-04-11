<?php
/**
 * Before / After Slider — Rhino Custom Builds
 *
 * Drag-to-reveal comparison component. CSS clip-path on the "after"
 * image, controlled by a range input that sits on top. Keyboard,
 * mouse, and touch all work via the input's native events.
 *
 * Data passed via get_template_part $args:
 *   array(
 *     'before_after' => array(
 *       'overline' => '...',
 *       'headline' => '...',
 *       'body'     => '...',
 *       'images'   => array(
 *         array(
 *           'before' => 'url',
 *           'after'  => 'url',
 *           'label'  => 'Project name',
 *           'tier'   => 'PREMIUM',
 *         ),
 *         ...
 *       ),
 *     ),
 *   )
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$data = isset( $args['before_after'] ) && is_array( $args['before_after'] ) ? $args['before_after'] : array();

if ( empty( $data ) ) {
	return;
}

$overline = isset( $data['overline'] ) ? $data['overline'] : '';
$headline = isset( $data['headline'] ) ? $data['headline'] : '';
$body     = isset( $data['body'] ) ? $data['body'] : '';
$images   = isset( $data['images'] ) && is_array( $data['images'] ) ? $data['images'] : array();
?>

<section class="section-before-after" data-section="before-after">
	<div class="container">

		<header class="section-before-after__header">
			<?php if ( $overline ) : ?>
				<span class="section-before-after__overline bmg-reveal">
					<?php echo esc_html( $overline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $headline ) : ?>
				<h2 class="section-before-after__headline bmg-reveal">
					<?php echo esc_html( $headline ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $body ) : ?>
				<p class="section-before-after__body bmg-reveal">
					<?php echo esc_html( $body ); ?>
				</p>
			<?php endif; ?>
		</header>

		<?php if ( ! empty( $images ) ) : ?>
			<div class="section-before-after__grid">
				<?php foreach ( $images as $idx => $image ) :
					$slider_id = 'bmg-before-after-' . ( $idx + 1 );
					?>
					<figure class="before-after bmg-reveal" data-before-after>

						<div class="before-after__stage">
							<?php // BEFORE — base layer ?>
							<?php if ( ! empty( $image['before'] ) ) : ?>
								<img
									class="before-after__image before-after__image--before"
									src="<?php echo esc_url( $image['before'] ); ?>"
									alt="<?php esc_attr_e( 'Before', 'bmg-theme' ); ?>"
									loading="lazy"
									decoding="async"
								>
							<?php else : ?>
								<div class="before-after__image before-after__image--before before-after__placeholder" aria-hidden="true">
									<span class="before-after__placeholder-label"><?php esc_html_e( 'BEFORE — PLACEHOLDER', 'bmg-theme' ); ?></span>
								</div>
							<?php endif; ?>

							<?php // AFTER — clipped layer ?>
							<?php if ( ! empty( $image['after'] ) ) : ?>
								<img
									class="before-after__image before-after__image--after"
									src="<?php echo esc_url( $image['after'] ); ?>"
									alt="<?php esc_attr_e( 'After', 'bmg-theme' ); ?>"
									loading="lazy"
									decoding="async"
								>
							<?php else : ?>
								<div class="before-after__image before-after__image--after before-after__placeholder before-after__placeholder--after" aria-hidden="true">
									<span class="before-after__placeholder-label"><?php esc_html_e( 'AFTER — PLACEHOLDER', 'bmg-theme' ); ?></span>
								</div>
							<?php endif; ?>

							<?php // Labels ?>
							<span class="before-after__label before-after__label--before">
								<?php esc_html_e( 'BEFORE', 'bmg-theme' ); ?>
							</span>
							<span class="before-after__label before-after__label--after">
								<?php esc_html_e( 'AFTER', 'bmg-theme' ); ?>
							</span>

							<?php // Divider line + handle ?>
							<div class="before-after__divider" aria-hidden="true">
								<div class="before-after__handle">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M9 6l-6 6 6 6M15 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
								</div>
							</div>

							<?php // Range input — the actual control (sits above everything, transparent) ?>
							<input
								type="range"
								class="before-after__range"
								min="0"
								max="100"
								value="50"
								id="<?php echo esc_attr( $slider_id ); ?>"
								aria-label="<?php esc_attr_e( 'Reveal slider — drag to compare before and after', 'bmg-theme' ); ?>"
							>
						</div>

						<?php if ( ! empty( $image['label'] ) || ! empty( $image['tier'] ) ) : ?>
							<figcaption class="before-after__caption">
								<?php if ( ! empty( $image['label'] ) ) : ?>
									<span class="before-after__caption-label"><?php echo esc_html( $image['label'] ); ?></span>
								<?php endif; ?>
								<?php if ( ! empty( $image['tier'] ) ) : ?>
									<span class="before-after__caption-tier"><?php echo esc_html( $image['tier'] ); ?></span>
								<?php endif; ?>
							</figcaption>
						<?php endif; ?>

					</figure>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>
