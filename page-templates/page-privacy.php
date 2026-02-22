<?php
/**
 * Template Name: Privacy Policy Page
 *
 * Simple content template for Privacy Policy and legal pages.
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
					<?php
					// Show last modified date for legal pages.
					$modified_date = get_the_modified_date();
					if ( $modified_date ) :
						?>
						<p class="text-muted small mb-0">
							<?php
							printf(
								/* translators: %s: last modified date */
								esc_html__( 'Last updated: %s', 'bmg-theme' ),
								esc_html( $modified_date )
							);
							?>
						</p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Page Content -->
	<section class="section section-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<article class="content-narrow legal-content">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								the_content();
							endwhile;
						endif;
						?>
					</article>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
