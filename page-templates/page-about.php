<?php
/**
 * Template Name: About Page
 *
 * About / Our Story page for Rhino Custom Builds. Mirrors the
 * content structure from CONTENT.md → About page.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Phone fallback for the CTA band.
$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

// Credential list.
$credentials = array(
	__( 'Manufacturer-certified coating installers', 'bmg-theme' ),
	__( 'Authorized dealer: ARB · Fox · Warn · Rigid · Method · BFGoodrich · Rough Country', 'bmg-theme' ),
	__( 'Fully insured + bonded', 'bmg-theme' ),
	__( 'Fleet-qualified / W-9 on file', 'bmg-theme' ),
	__( 'BBB Accredited', 'bmg-theme' ),
);

// Stats.
$stats = array(
	array( 'number' => '12+',      'label' => __( 'YEARS IN BUSINESS', 'bmg-theme' ) ),
	array( 'number' => '4,200+',   'label' => __( 'INSTALLS COMPLETED', 'bmg-theme' ) ),
	array( 'number' => '4.9★',     'label' => __( 'GOOGLE RATING', 'bmg-theme' ) ),
	array( 'number' => 'LIFETIME', 'label' => __( 'COATING WARRANTY', 'bmg-theme' ) ),
);

// Testimonials — pulled from the homepage proof Customizer repeater.
$testimonials = array();
for ( $i = 1; $i <= 3; $i++ ) {
	$testimonials[] = array(
		'quote'   => get_theme_mod( 'bmg_testimonial_' . $i . '_quote', '' ),
		'name'    => get_theme_mod( 'bmg_testimonial_' . $i . '_name', '' ),
		'vehicle' => get_theme_mod( 'bmg_testimonial_' . $i . '_vehicle', '' ),
		'service' => get_theme_mod( 'bmg_testimonial_' . $i . '_service', '' ),
	);
}
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'ABOUT RHINO', 'bmg-theme' ),
			'headline' => __( "WE BUILD THE TRUCKS WE'D DRIVE.", 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== 2. Founder Story ============================================== ?>
	<section class="section-about-story" data-section="about-story">
		<div class="container">
			<div class="row g-5 align-items-start">

				<div class="col-lg-7 section-about-story__content">
					<span class="section-about-story__overline bmg-reveal">
						<?php esc_html_e( 'THE STORY', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-about-story__headline bmg-reveal">
						<?php esc_html_e( 'STARTED IN A TWO-BAY GARAGE.', 'bmg-theme' ); ?>
					</h2>

					<p class="section-about-story__paragraph bmg-reveal">
						<?php esc_html_e( 'Rhino Custom Builds started in 2014 with one spray gun, a two-bay garage, and a beat-up F-150 that needed a bedliner. The liner held. Friends asked. Friends of friends asked. Twelve years later, we run three bays, a dedicated parts program, and a team that only hires installers with manufacturer certifications on the products they touch.', 'bmg-theme' ); ?>
					</p>

					<p class="section-about-story__paragraph bmg-reveal">
						<?php esc_html_e( "We didn't get here by outsourcing. Every coating, every bumper, every winch, every wiring harness — it all comes off our floor. If we installed it, we stand behind it. If we didn't, we'll fix it anyway.", 'bmg-theme' ); ?>
					</p>
				</div>

				<div class="col-lg-5 section-about-story__media bmg-reveal">
					<?php
					$story_image = get_post_meta( get_the_ID(), 'bmg_about_story_image', true );
					if ( $story_image ) :
						?>
						<img src="<?php echo esc_url( $story_image ); ?>" alt="<?php esc_attr_e( 'Rhino Custom Builds shop floor', 'bmg-theme' ); ?>" loading="lazy" decoding="async">
					<?php else : ?>
						<div class="section-about-story__placeholder" aria-hidden="true">
							<span class="section-about-story__placeholder-label">
								<?php esc_html_e( 'SHOP FLOOR — 4:5', 'bmg-theme' ); ?>
							</span>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</section>

	<?php // ===== 3. Credentials + Stats ======================================== ?>
	<section class="section-about-credentials" data-section="about-credentials">
		<div class="container">
			<div class="row g-5">

				<div class="col-lg-6">
					<span class="section-about-credentials__overline bmg-reveal">
						<?php esc_html_e( 'CREDENTIALS', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-about-credentials__headline bmg-reveal">
						<?php esc_html_e( 'BACKED. BONDED. CERTIFIED.', 'bmg-theme' ); ?>
					</h2>
					<ul class="section-about-credentials__list bmg-reveal-stagger">
						<?php foreach ( $credentials as $credential ) : ?>
							<li class="bmg-reveal">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
								<?php echo esc_html( $credential ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<div class="col-lg-6">
					<span class="section-about-credentials__overline bmg-reveal">
						<?php esc_html_e( 'BY THE NUMBERS', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-about-credentials__headline bmg-reveal">
						<?php esc_html_e( 'A DECADE ON THE FLOOR.', 'bmg-theme' ); ?>
					</h2>
					<ul class="section-about-credentials__stats bmg-reveal-stagger">
						<?php foreach ( $stats as $stat ) :
							$parsed = function_exists( 'bmg_parse_trust_item' ) ? bmg_parse_trust_item( $stat['number'] ) : null;
							?>
							<li class="bmg-reveal">
								<span class="section-about-credentials__stat-number">
									<?php if ( $parsed ) : ?>
										<?php if ( $parsed['prefix'] ) : ?><span><?php echo esc_html( $parsed['prefix'] ); ?></span><?php endif; ?>
										<span data-count-to="<?php echo esc_attr( $parsed['count'] ); ?>" data-count-format="<?php echo esc_attr( $parsed['format'] ); ?>"><?php echo esc_html( $parsed['format'] ); ?></span>
										<?php if ( $parsed['plus'] ) : ?><span>+</span><?php endif; ?>
										<?php if ( $parsed['suffix'] ) : ?><span><?php echo esc_html( $parsed['suffix'] ); ?></span><?php endif; ?>
									<?php else : ?>
										<?php echo esc_html( $stat['number'] ); ?>
									<?php endif; ?>
								</span>
								<span class="section-about-credentials__stat-label">
									<?php echo esc_html( $stat['label'] ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			</div>
		</div>
	</section>

	<?php // ===== 4. Testimonials ================================================ ?>
	<?php
	$has_testimonials = false;
	foreach ( $testimonials as $t ) {
		if ( ! empty( $t['quote'] ) ) {
			$has_testimonials = true;
			break;
		}
	}
	if ( $has_testimonials ) :
		?>
		<section class="section-about-testimonials" data-section="about-testimonials">
			<div class="container">
				<header class="section-about-testimonials__header">
					<span class="section-about-testimonials__overline bmg-reveal">
						<?php esc_html_e( 'WHAT CUSTOMERS SAY', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-about-testimonials__headline bmg-reveal">
						<?php esc_html_e( 'REAL TRUCKS. REAL PEOPLE.', 'bmg-theme' ); ?>
					</h2>
				</header>

				<div class="section-about-testimonials__grid bmg-reveal-stagger" role="list">
					<?php foreach ( $testimonials as $t ) :
						if ( empty( $t['quote'] ) ) {
							continue;
						}
						?>
						<figure class="testimonial-card bmg-reveal" role="listitem">
							<blockquote class="testimonial-card__quote">
								<?php echo esc_html( $t['quote'] ); ?>
							</blockquote>
							<figcaption class="testimonial-card__attribution">
								<?php
								$parts = array_filter( array( $t['name'], $t['vehicle'], $t['service'] ) );
								echo esc_html( implode( ' · ', $parts ) );
								?>
							</figcaption>
						</figure>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 5. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal">
						<?php esc_html_e( 'READY WHEN YOU ARE', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-cta__headline bmg-reveal">
						<?php esc_html_e( 'COME SEE THE SHOP.', 'bmg-theme' ); ?>
					</h2>
					<p class="section-cta__subline bmg-reveal">
						<?php esc_html_e( 'Walk-ins welcome for quotes and questions. We love talking trucks.', 'bmg-theme' ); ?>
					</p>

					<div class="section-cta__actions bmg-reveal">
						<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
							<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
						</a>
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
							<span class="section-cta__phone-label"><?php esc_html_e( 'or call', 'bmg-theme' ); ?></span>
							<span class="section-cta__phone-number"><?php echo esc_html( $phone_display ); ?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>
