<?php
/**
 * Template Name: Contact Page
 *
 * Template for the Contact page.
 *
 * @package BMG_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<!-- 5.1 Hero / Intro -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'Get in Touch', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( 'Whether you are considering membership or have questions about our practice, we welcome the conversation. Reach us by phone, email, or the form below.', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// Contact Info Section.
	get_template_part( 'template-parts/sections/section', 'contact-info' );

	// Contact Form Section.
	get_template_part( 'template-parts/sections/section', 'contact-form' );
	?>

</main>

<?php
get_footer();
