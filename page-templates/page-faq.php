<?php
/**
 * Template Name: FAQ Page
 *
 * Template for the FAQ page.
 *
 * @package BMG_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<!-- Page Header -->
	<section class="section section-dark page-header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">
					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'Frequently Asked Questions', 'bmg-theme' ); ?>
					</h1>
					<p class="lead mb-0">
						<?php esc_html_e( 'Answers to common questions about concierge medicine, our membership plans, and how Baig Medical Group operates.', 'bmg-theme' ); ?>
					</p>
				</div>
			</div>
		</div>
	</section>

	<?php
	// FAQ Section.
	get_template_part( 'template-parts/sections/section', 'faq' );
	?>

</main>

<?php
get_footer();
