<?php
/**
 * Template Name: Services Page
 *
 * Explains services offered. Earlier in the funnel than Plans.
 *
 * @package starter-theme
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
						<?php esc_html_e( '[Services Page Headline]', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( '[Services page intro paragraph — describe what the business provides and how services are delivered.]', 'bmg-theme' ); ?>
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
