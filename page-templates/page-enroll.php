<?php
/**
 * Template Name: Enrollment Page
 *
 * Template for the patient enrollment page.
 *
 * @package starter-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<!-- 4.1 Hero / Intro -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'Begin Enrollment', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( '[Enrollment page intro — describe the enrollment process, security, and next steps.]', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// Enrollment Form Section.
	get_template_part( 'template-parts/sections/section', 'enroll-form' );
	?>

</main>

<?php
get_footer();
