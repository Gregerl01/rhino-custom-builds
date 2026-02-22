<?php
/**
 * Template Name: Services Page
 *
 * Explains what BMG does for prospective members researching
 * concierge medicine in Yuma. Earlier in the funnel than Plans.
 *
 * @package BMG_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<!-- 6.1 Hero / Intro -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'What We Do for Our Members', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( 'Baig Medical Group provides comprehensive primary care, preventive medicine, and coordinated specialist access within a membership model built around availability, thoroughness, and continuity. Every service below is delivered personally by Dr. Baig — not a rotating roster of providers. The care is intentional, and the relationship is ongoing.', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// 6.2 Service Categories.
	get_template_part( 'template-parts/sections/section', 'services' );

	// 6.3 CTA — Reuse homepage CTA section.
	get_template_part( 'template-parts/sections/section', 'cta' );
	?>

</main>

<?php
get_footer();
