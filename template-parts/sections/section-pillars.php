<?php
/**
 * Value Pillars Section - Homepage
 *
 * Four key value propositions in a clean card grid.
 * Dark section. Icons in accent color.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

// Pillar content — update titles, text, and icons per project.
// Icons: Lucide-style inline SVGs, colored via CSS (currentColor → accent color).
$pillars = array(
	array(
		'title' => __( '[Pillar 1 Title]', 'bmg-theme' ),
		'text'  => __( '[Pillar 1 description — one to two sentences describing this value proposition.]', 'bmg-theme' ),
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
	),
	array(
		'title' => __( '[Pillar 2 Title]', 'bmg-theme' ),
		'text'  => __( '[Pillar 2 description — one to two sentences describing this value proposition.]', 'bmg-theme' ),
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
	),
	array(
		'title' => __( '[Pillar 3 Title]', 'bmg-theme' ),
		'text'  => __( '[Pillar 3 description — one to two sentences describing this value proposition.]', 'bmg-theme' ),
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>',
	),
	array(
		'title' => __( '[Pillar 4 Title]', 'bmg-theme' ),
		'text'  => __( '[Pillar 4 description — one to two sentences describing this value proposition.]', 'bmg-theme' ),
		'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>',
	),
);
?>

<section id="pillars" class="section section-dark reveal-on-scroll">
	<div class="container">

		<div class="row justify-content-center mb-5">
			<div class="col-lg-8 text-center">
				<h2 class="display-text mb-0">
					<?php esc_html_e( '[Pillars Section Headline]', 'bmg-theme' ); ?>
				</h2>
				<div class="silver-rule"></div>
			</div>
		</div>

		<div class="row pillars-row bmg-reveal-stagger">
			<?php foreach ( $pillars as $pillar ) : ?>
				<div class="col-12 col-md-6 col-lg-3 bmg-reveal">
					<div class="pillar">
						<div class="pillar__icon" aria-hidden="true">
							<?php echo $pillar['icon']; ?>
						</div>
						<h3 class="pillar__title">
							<?php echo esc_html( $pillar['title'] ); ?>
						</h3>
						<p class="pillar__text">
							<?php echo esc_html( $pillar['text'] ); ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>
