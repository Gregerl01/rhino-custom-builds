<?php
/**
 * Service Categories Section — Services Page
 *
 * Five service blocks with alternating backgrounds.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

$services = array(
	array(
		'title'    => __( '[Service 1 Title]', 'bmg-theme' ),
		'body'     => __( '[Service 1 description — detailed paragraph about this service offering.]', 'bmg-theme' ),
		'cta_text' => __( '[Service 1 CTA Text]', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'light',
	),
	array(
		'title'    => __( '[Service 2 Title]', 'bmg-theme' ),
		'body'     => __( '[Service 2 description — detailed paragraph about this service offering.]', 'bmg-theme' ),
		'cta_text' => __( '[Service 2 CTA Text]', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'dark',
	),
	array(
		'title'    => __( '[Service 3 Title]', 'bmg-theme' ),
		'body'     => __( '[Service 3 description — detailed paragraph about this service offering.]', 'bmg-theme' ),
		'cta_text' => __( '[Service 3 CTA Text]', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'light',
	),
	array(
		'title'    => __( '[Service 4 Title]', 'bmg-theme' ),
		'body'     => __( '[Service 4 description — detailed paragraph about this service offering.]', 'bmg-theme' ),
		'cta_text' => __( '[Service 4 CTA Text]', 'bmg-theme' ),
		'cta_url'  => '/contact/',
		'bg'       => 'dark',
	),
	array(
		'title'    => __( '[Service 5 Title]', 'bmg-theme' ),
		'body'     => __( '[Service 5 description — detailed paragraph about this service offering.]', 'bmg-theme' ),
		'cta_text' => __( '[Service 5 CTA Text]', 'bmg-theme' ),
		'cta_url'  => '/our-plans/',
		'bg'       => 'light',
	),
);
?>

<?php foreach ( $services as $service ) : ?>
	<section class="section section-<?php echo esc_attr( $service['bg'] ); ?> reveal-on-scroll">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">

					<div class="service-block">
						<h2 class="service-block__title display-text">
							<?php echo esc_html( $service['title'] ); ?>
						</h2>
						<div class="silver-rule silver-rule--left"></div>
						<p class="service-block__body">
							<?php echo esc_html( $service['body'] ); ?>
						</p>
						<a href="<?php echo esc_url( home_url( $service['cta_url'] ) ); ?>" class="service-block__link">
							<?php echo esc_html( $service['cta_text'] ); ?>
							<span aria-hidden="true">&rarr;</span>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
<?php endforeach; ?>
