<?php
/**
 * Service Hero — Rhino Custom Builds
 *
 * Inner-page variant of the homepage hero. 70vh dark section with a
 * breadcrumb, overline, H1, subline, dual CTA, and trust strip.
 * Content is passed in via the $args parameter of get_template_part().
 *
 *   get_template_part(
 *     'template-parts/sections/section', 'service-hero',
 *     array( 'hero' => $bmg_service['hero'] )
 *   );
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

// $args is populated by get_template_part( ..., $args ) (WP 5.5+).
$hero = isset( $args['hero'] ) && is_array( $args['hero'] ) ? $args['hero'] : array();

if ( empty( $hero ) ) {
	return;
}

$breadcrumb    = isset( $hero['breadcrumb'] ) && is_array( $hero['breadcrumb'] ) ? $hero['breadcrumb'] : array();
$overline      = isset( $hero['overline'] ) ? $hero['overline'] : '';
$headline      = isset( $hero['headline'] ) ? $hero['headline'] : '';
$subline       = isset( $hero['subline'] ) ? $hero['subline'] : '';
$cta_primary   = isset( $hero['cta_primary'] ) ? $hero['cta_primary'] : array();
$cta_secondary = isset( $hero['cta_secondary'] ) ? $hero['cta_secondary'] : array();
$trust_strip   = isset( $hero['trust_strip'] ) && is_array( $hero['trust_strip'] ) ? $hero['trust_strip'] : array();

// Phone auto-fill markers. The content array can set:
//   url => 'tel:'       → auto-fill from bmg_phone (general line)
//   url => 'tel:fleet'  → auto-fill from bmg_phone_fleet (fleet line)
// In either case the label is regenerated as "Call {number}" so the
// content array doesn't have to duplicate the phone number or keep
// it in sync with the Customizer.
if ( ! empty( $cta_secondary['url'] ) && in_array( $cta_secondary['url'], array( 'tel:', 'tel:fleet' ), true ) ) {
	$is_fleet      = ( 'tel:fleet' === $cta_secondary['url'] );
	$phone_display = get_theme_mod(
		$is_fleet ? 'bmg_phone_fleet' : 'bmg_phone',
		$is_fleet ? '(555) 555-0199' : '(555) 555-0123'
	);
	$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
	$cta_secondary['url']   = 'tel:' . $phone_link;
	$cta_secondary['label'] = $is_fleet
		? sprintf( /* translators: %s: fleet phone number */ __( 'Call Fleet Line: %s', 'bmg-theme' ), $phone_display )
		: sprintf( /* translators: %s: phone number */ __( 'Call %s', 'bmg-theme' ), $phone_display );
}

// Background image — optional, pulled from post meta so each service
// page can have its own without touching the content array.
$bg_image = get_post_meta( get_the_ID(), 'bmg_service_hero_bg', true );
$bg_style = $bg_image ? sprintf( 'background-image: url(%s);', esc_url( $bg_image ) ) : '';
?>

<section class="section-service-hero section-hero--dark" data-section="service-hero">
	<div class="section-service-hero__background"<?php echo $bg_style ? ' style="' . esc_attr( $bg_style ) . '"' : ''; ?>></div>
	<div class="section-service-hero__overlay" aria-hidden="true"></div>
	<div class="section-service-hero__grain" aria-hidden="true"></div>

	<div class="container position-relative">
		<div class="row">
			<div class="col-lg-10 col-xl-9">

				<?php if ( ! empty( $breadcrumb ) ) : ?>
					<nav class="section-service-hero__breadcrumb bmg-reveal" aria-label="<?php esc_attr_e( 'Breadcrumb', 'bmg-theme' ); ?>">
						<ol>
							<?php
							$last_index = count( $breadcrumb ) - 1;
							foreach ( $breadcrumb as $i => $crumb ) :
								$is_last = $i === $last_index;
								?>
								<li<?php echo $is_last ? ' aria-current="page"' : ''; ?>>
									<?php if ( ! $is_last && ! empty( $crumb['url'] ) ) : ?>
										<a href="<?php echo esc_url( home_url( $crumb['url'] ) ); ?>">
											<?php echo esc_html( $crumb['label'] ); ?>
										</a>
									<?php else : ?>
										<?php echo esc_html( $crumb['label'] ); ?>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ol>
					</nav>
				<?php endif; ?>

				<?php if ( $overline ) : ?>
					<span class="section-service-hero__overline bmg-reveal">
						<?php echo esc_html( $overline ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $headline ) : ?>
					<h1 class="section-service-hero__headline bmg-reveal">
						<?php echo esc_html( $headline ); ?>
					</h1>
				<?php endif; ?>

				<?php if ( $subline ) : ?>
					<p class="section-service-hero__subline bmg-reveal">
						<?php echo esc_html( $subline ); ?>
					</p>
				<?php endif; ?>

				<?php if ( ! empty( $cta_primary ) || ! empty( $cta_secondary ) ) : ?>
					<div class="section-service-hero__ctas bmg-reveal">
						<?php if ( ! empty( $cta_primary['label'] ) ) : ?>
							<a href="<?php echo esc_url( home_url( $cta_primary['url'] ?? '#' ) ); ?>" class="btn-rhino btn-rhino--primary">
								<span><?php echo esc_html( $cta_primary['label'] ); ?></span>
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</a>
						<?php endif; ?>

						<?php if ( ! empty( $cta_secondary['label'] ) ) : ?>
							<a href="<?php echo esc_url( $cta_secondary['url'] ?? '#' ); ?>" class="btn-rhino btn-rhino--ghost-dark">
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
								<span><?php echo esc_html( $cta_secondary['label'] ); ?></span>
							</a>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $trust_strip ) ) : ?>
					<ul class="section-service-hero__trust-strip bmg-reveal" role="list">
						<?php foreach ( $trust_strip as $item ) : ?>
							<li class="section-service-hero__trust-item"><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
