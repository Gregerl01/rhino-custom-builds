<?php
/**
 * Template Name: About Page
 *
 * Template for the About page.
 *
 * @package starter-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<!-- 2.1 Hero / Intro -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( '[About Page Headline]', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( '[About page intro paragraph — describe the business mission and founding principle.]', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// 2.2 Philosophy.
	get_template_part( 'template-parts/sections/section', 'philosophy' );

	// 2.3 Full Provider Bio + Credentials Sidebar.
	get_template_part( 'template-parts/sections/section', 'physician' );

	// 2.4 CTA — Reuse homepage CTA section.
	get_template_part( 'template-parts/sections/section', 'cta' );
	?>

</main>

<?php
get_footer();
