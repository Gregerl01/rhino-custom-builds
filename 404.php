<?php
/**
 * 404 — Page Not Found
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<section class="section section-dark page-header error-404">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 text-center">

					<h1 class="display-text display-4 mb-3">
						<?php esc_html_e( 'Page Not Found', 'bmg-theme' ); ?>
					</h1>

					<p class="lead mb-4">
						<?php esc_html_e( 'The page you are looking for does not exist or has been moved. Return to the homepage or contact us if you need assistance.', 'bmg-theme' ); ?>
					</p>

					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-outline-light">
						<?php esc_html_e( 'Return to Homepage', 'bmg-theme' ); ?>
					</a>

				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
