<?php
/**
 * Page Header — Rhino Custom Builds
 *
 * Dark inner-page header used on About, Contact, Quote, Gallery,
 * FAQ, and other content-forward pages. Shorter than the service
 * detail hero (no 70vh minimum, no breadcrumb, no dual CTA), but
 * inherits the same grain + overlay pattern and the same typography.
 *
 * Content is passed via the $args parameter of get_template_part():
 *
 *   get_template_part(
 *     'template-parts/sections/section', 'page-header',
 *     array(
 *       'overline' => 'ABOUT RHINO',
 *       'headline' => 'WE BUILD THE TRUCKS WE\'D DRIVE.',
 *       'subline'  => 'Optional subline.',
 *     )
 *   );
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline = isset( $args['overline'] ) ? $args['overline'] : '';
$headline = isset( $args['headline'] ) ? $args['headline'] : '';
$subline  = isset( $args['subline'] ) ? $args['subline'] : '';
?>

<section class="section-page-header section-hero--dark" data-section="page-header">
	<div class="section-page-header__background"></div>
	<div class="section-page-header__overlay" aria-hidden="true"></div>
	<div class="section-page-header__grain" aria-hidden="true"></div>

	<div class="container position-relative">
		<div class="row">
			<div class="col-lg-10 col-xl-9">
				<?php if ( $overline ) : ?>
					<span class="section-page-header__overline bmg-reveal">
						<?php echo esc_html( $overline ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $headline ) : ?>
					<h1 class="section-page-header__headline bmg-reveal">
						<?php echo esc_html( $headline ); ?>
					</h1>
				<?php endif; ?>

				<?php if ( $subline ) : ?>
					<p class="section-page-header__subline bmg-reveal">
						<?php echo esc_html( $subline ); ?>
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
