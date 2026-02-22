<?php
/**
 * Template Name: Enrollment Page
 *
 * Template for the patient enrollment page.
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
						<?php the_title(); ?>
					</h1>
					<?php if ( has_excerpt() ) : ?>
						<p class="lead mb-0">
							<?php echo esc_html( get_the_excerpt() ); ?>
						</p>
					<?php endif; ?>
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
