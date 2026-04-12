<?php
/**
 * Install Callout Bar — Rhino Custom Builds
 *
 * Reusable red callout bar with white text + mono CTA link.
 * Uses the existing .shop-callout SCSS component.
 *
 * Pass content via get_template_part $args:
 *   get_template_part(
 *     'template-parts/components/callout', 'install-bar',
 *     array( 'text' => 'Your message here.' )
 *   );
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$text = isset( $args['text'] ) ? $args['text'] : __( 'All products include optional in-bay installation by certified builders.', 'bmg-theme' );
?>

<div class="shop-callout" data-section="install-callout-bar">
	<div class="container">
		<p class="shop-callout__text">
			<?php echo esc_html( $text ); ?>
			<a class="shop-callout__link" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">
				<?php esc_html_e( 'Request a quote', 'bmg-theme' ); ?>
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
					<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
				</svg>
			</a>
		</p>
	</div>
</div>
