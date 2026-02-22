<?php
/**
 * Template Name: About Page
 *
 * Template for the About/Physician page.
 *
 * @package BMG_Theme
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
						<?php esc_html_e( 'Medicine Practiced With Intention', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( 'Baig Medical Group exists because healthcare should not require patients to choose between access and quality, or between thoroughness and convenience. Dr. Adil Baig built this practice to provide the kind of care he believes medicine is meant to deliver — attentive, preventive, and personal — in a model structured around the physician-patient relationship.', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// 2.2 Philosophy — Dr. Baig's Approach.
	get_template_part( 'template-parts/sections/section', 'philosophy' );

	// 2.3 Full Physician Bio + Credentials Sidebar.
	get_template_part( 'template-parts/sections/section', 'physician' );

	// 2.4 CTA — Reuse homepage CTA section.
	get_template_part( 'template-parts/sections/section', 'cta' );
	?>

</main>

<?php
get_footer();
