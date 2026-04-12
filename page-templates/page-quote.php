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

$phone_display    = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link       = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
$hours_weekday    = get_theme_mod( 'bmg_office_hours', 'Mon–Fri: 8:00 AM – 5:00 PM PST' );
$hours_weekend    = get_theme_mod( 'bmg_office_hours_sun', 'Weekends: Closed' );
$address_street   = get_theme_mod( 'bmg_address_street', '[Street Address]' );
$address_city     = get_theme_mod( 'bmg_address_city', '[City, ST ZIP]' );
$google_rating    = get_theme_mod( 'bmg_google_rating', '4.9' );

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

				<?php // Sidebar — warm credential panel matching the site's card language ?>
				<aside class="col-lg-4 quote-sidebar-col">
					<div class="quote-sidebar">

						<?php // ---- Trust section ---- ?>
						<div class="quote-sidebar__section">
							<h3 class="quote-sidebar__heading"><?php esc_html_e( 'WHY RHINO', 'bmg-theme' ); ?></h3>
							<ul class="quote-sidebar__trust" role="list">
								<?php
								$trust_items = array(
									__( 'Free, no-obligation quote', 'bmg-theme' ),
									__( 'Response within one business day', 'bmg-theme' ),
									__( 'Written quote with itemized pricing', 'bmg-theme' ),
									__( 'No pressure, no upsell', 'bmg-theme' ),
								);
								foreach ( $trust_items as $item ) :
									?>
									<li>
										<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
											<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
										</svg>
										<span><?php echo esc_html( $item ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>

						<?php // ---- Phone CTA ---- ?>
						<a class="quote-sidebar__phone" href="tel:<?php echo esc_attr( $phone_link ); ?>">
							<div class="quote-sidebar__phone-icon">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</div>
							<div class="quote-sidebar__phone-text">
								<span class="quote-sidebar__phone-label"><?php esc_html_e( 'TALK TO A BUILDER', 'bmg-theme' ); ?></span>
								<span class="quote-sidebar__phone-number"><?php echo esc_html( $phone_display ); ?></span>
							</div>
						</a>

						<?php // ---- Info grid: Hours + Location ---- ?>
						<div class="quote-sidebar__info">
							<div class="quote-sidebar__info-block">
								<h3 class="quote-sidebar__heading"><?php esc_html_e( 'HOURS', 'bmg-theme' ); ?></h3>
								<p class="quote-sidebar__text"><?php echo esc_html( $hours_weekday ); ?></p>
								<p class="quote-sidebar__text"><?php echo esc_html( $hours_weekend ); ?></p>
							</div>
							<div class="quote-sidebar__info-block">
								<h3 class="quote-sidebar__heading"><?php esc_html_e( 'LOCATION', 'bmg-theme' ); ?></h3>
								<address class="quote-sidebar__text" style="font-style:normal">
									<?php echo esc_html( $address_street ); ?><br>
									<?php echo esc_html( $address_city ); ?>
								</address>
							</div>
						</div>

						<?php // ---- Rating footer ---- ?>
						<div class="quote-sidebar__rating">
							<span class="quote-sidebar__rating-stars" aria-hidden="true">★★★★★</span>
							<span class="quote-sidebar__rating-score"><?php echo esc_html( $google_rating ); ?></span>
							<span class="quote-sidebar__rating-label"><?php esc_html_e( 'Google Rating', 'bmg-theme' ); ?></span>
						</div>

					</div>
				</aside>

			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
