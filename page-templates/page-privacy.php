<?php
/**
 * Template Name: Privacy Policy Page
 *
 * Renders the page content from the WP editor (the_content) inside
 * a dark page header + clean reading layout. No hardcoded legal
 * copy — all content is managed in wp-admin.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'LEGAL', 'bmg-theme' ),
			'headline' => get_the_title(),
		)
	);
	?>

	<section class="single-post-content" data-section="legal-content">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-xl-7">
					<div class="single-post-content__body">
						<?php
						while ( have_posts() ) :
							the_post();
							the_content();
						endwhile;
						?>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
