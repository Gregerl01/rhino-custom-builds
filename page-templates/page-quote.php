<?php
/**
 * Template Name: Quote Page
 *
 * Primary conversion destination. 3-step Gravity Forms multi-page
 * quote form with a sticky sidebar showing what-to-expect + phone
 * fallback. Reads ?category and ?product querystrings for pre-fill.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
$hours_weekday = get_theme_mod( 'bmg_office_hours', 'Mon–Fri: 7AM – 6PM' );
$hours_sat     = get_theme_mod( 'bmg_office_hours_sat', 'Saturday: 8AM – 2PM' );

$form_id = (int) get_theme_mod( 'bmg_quote_form_id', 0 );
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'REQUEST A QUOTE', 'bmg-theme' ),
			'headline' => __( 'GET A REAL NUMBER. FAST.', 'bmg-theme' ),
			'subline'  => __( 'Three steps. One business day. Free and no-obligation.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== 2. Form + Sidebar ============================================= ?>
	<section class="section-quote-form" data-section="quote-form">
		<div class="container">
			<div class="row g-5 align-items-start">

				<?php // Form column ?>
				<div class="col-lg-8 section-quote-form__form-col">
					<?php
					if ( $form_id && function_exists( 'gravity_form' ) ) {
						gravity_form(
							$form_id,
							false,  // display title
							false,  // display description
							false,  // display inactive
							null,   // field values
							true,   // ajax
							0,      // tabindex
							true    // echo
						);
					} else {
						?>
						<div class="section-quote-form__fallback">
							<p class="section-quote-form__fallback-text">
								<?php esc_html_e( '[Quote form is being configured. Please call us directly or try again shortly.]', 'bmg-theme' ); ?>
							</p>
							<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
								<span><?php echo esc_html( sprintf( __( 'Call %s', 'bmg-theme' ), $phone_display ) ); ?></span>
							</a>
						</div>
						<?php
					}
					?>
				</div>

				<?php // Sticky sidebar ?>
				<aside class="col-lg-4 section-quote-form__sidebar-col">
					<div class="section-quote-form__sidebar">

						<div class="section-quote-form__sidebar-card">
							<h3 class="section-quote-form__sidebar-heading">
								<?php esc_html_e( 'WHAT TO EXPECT', 'bmg-theme' ); ?>
							</h3>
							<ul class="section-quote-form__sidebar-list">
								<li>
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
									<?php esc_html_e( 'Free, no-obligation quote', 'bmg-theme' ); ?>
								</li>
								<li>
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
									<?php esc_html_e( 'Response within one business day', 'bmg-theme' ); ?>
								</li>
								<li>
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
									<?php esc_html_e( 'Written quote with itemized pricing', 'bmg-theme' ); ?>
								</li>
								<li>
									<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
									<?php esc_html_e( 'No pressure, no upsell', 'bmg-theme' ); ?>
								</li>
							</ul>
						</div>

						<a class="section-quote-form__sidebar-phone" href="tel:<?php echo esc_attr( $phone_link ); ?>">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
							<span class="section-quote-form__sidebar-phone-label">
								<?php esc_html_e( 'Rather talk?', 'bmg-theme' ); ?>
							</span>
							<span class="section-quote-form__sidebar-phone-number">
								<?php echo esc_html( $phone_display ); ?>
							</span>
						</a>

						<div class="section-quote-form__sidebar-hours">
							<span class="section-quote-form__sidebar-hours-label">
								<?php esc_html_e( 'HOURS', 'bmg-theme' ); ?>
							</span>
							<p><?php echo esc_html( $hours_weekday ); ?></p>
							<p><?php echo esc_html( $hours_sat ); ?></p>
						</div>

					</div>
				</aside>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
