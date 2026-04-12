<?php
/**
 * Template Name: FAQ Page
 *
 * Standalone FAQ page grouped by topic. Reuses the scoped Bootstrap 5
 * accordion overrides from .section-service-faq (250ms expand, red
 * 3px left rail on active, mono +/- chevron, warm-white tint).
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

// FAQ groups — each group is a section with its own accordion parent.
$faq_groups = array(

	// ---- General ----
	array(
		'title' => __( 'GENERAL', 'bmg-theme' ),
		'id'    => 'faq-general',
		'items' => array(
			array(
				'q' => __( 'How much does a typical build cost?', 'bmg-theme' ),
				'a' => __( 'It depends on the vehicle and the scope. Spray-on bedliners start under $600. Accessory installs range from $300 to $3,000+ depending on parts. Full off-road builds can run $8,000–$25,000+. Every quote is free, written, and itemized — no surprises.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'How long will my truck be in the shop?', 'bmg-theme' ),
				'a' => __( 'Most bedliner installs are a single day. Accessory work is one to three days. Full builds run one to two weeks depending on parts availability. We give you a firm timeline with your quote and update you if anything shifts.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'What vehicles do you work on?', 'bmg-theme' ),
				'a' => __( 'Any truck, Jeep, SUV, or van — domestic or import, any year. We specialize in Ford, GM, RAM, Toyota, Jeep, and Nissan, but we work on everything.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'Can I walk in or do I need an appointment?', 'bmg-theme' ),
				'a' => __( 'Walk-ins welcome for quotes and questions — we love talking trucks. Installs require scheduling so we can have your parts on-site and an install bay reserved.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'Do you offer financing?', 'bmg-theme' ),
				'a' => __( 'Yes. We partner with a national financing provider for builds over $1,500. Application takes five minutes and most approvals come back instantly.', 'bmg-theme' ),
			),
		),
	),

	// ---- Warranty & Quality ----
	array(
		'title' => __( 'WARRANTY & QUALITY', 'bmg-theme' ),
		'id'    => 'faq-warranty',
		'items' => array(
			array(
				'q' => __( 'Do you warranty your work?', 'bmg-theme' ),
				'a' => __( 'Every spray-on coating carries a lifetime warranty against peeling, cracking, and bubbling. Parts are covered under manufacturer warranty, and we handle any claims on your behalf. Installation labor is warrantied for one year.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'Where do your parts come from?', 'bmg-theme' ),
				'a' => __( "We're an authorized dealer for ARB, Fox, Warn, Rigid, Method, Baja Designs, Smittybilt, Rough Country, and more. Every part is OEM-grade, sourced direct from the manufacturer — no gray market, no knock-offs.", 'bmg-theme' ),
			),
			array(
				'q' => __( 'Are your installers certified?', 'bmg-theme' ),
				'a' => __( 'Yes. Every installer holds manufacturer certifications on the products they touch. We do not subcontract — every job is done in-house by our own team.', 'bmg-theme' ),
			),
		),
	),

	// ---- Process ----
	array(
		'title' => __( 'PROCESS', 'bmg-theme' ),
		'id'    => 'faq-process',
		'items' => array(
			array(
				'q' => __( 'How do I book an install?', 'bmg-theme' ),
				'a' => __( 'Start with the quote form on this site. A builder reviews your request within one business day, confirms parts and pricing, and schedules your install date. You can also call or stop by the shop to book directly.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'What happens after I request a quote?', 'bmg-theme' ),
				'a' => __( 'We review your request within one business day. A builder calls or emails with a detailed written quote. Once approved, we schedule your install — free reschedule up to 24 hours before.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'Can I supply my own parts?', 'bmg-theme' ),
				'a' => __( "Yes, within reason. We install customer-supplied parts we can verify for fit and quality. Labor warranty still applies. If a part turns out to be defective or wrong-fit, we'll tell you before it goes on.", 'bmg-theme' ),
			),
			array(
				'q' => __( 'Do you do custom fabrication?', 'bmg-theme' ),
				'a' => __( "We focus on bolt-on installations and spray-on coatings, not custom welding or fabrication. If your project requires fab work, we'll refer you to a trusted partner and coordinate the build.", 'bmg-theme' ),
			),
		),
	),

	// ---- Bedliners & Coatings ----
	array(
		'title' => __( 'BEDLINERS & COATINGS', 'bmg-theme' ),
		'id'    => 'faq-bedliners',
		'items' => array(
			array(
				'q' => __( 'How long does a bedliner take?', 'bmg-theme' ),
				'a' => __( 'Most installs are done in a single day. You drop off in the morning and pick up in the afternoon after full cure.', 'bmg-theme' ),
			),
			array(
				'q' => __( "What's the difference between Standard, Premium, and Off-Road?", 'bmg-theme' ),
				'a' => __( 'Standard is a UV-stable textured coating for daily drivers. Premium adds thickness, chemical resistance, and impact protection for work trucks. Off-Road Grade is the maximum build — aggressive anti-slip texture, color-match options, and the thickest mil spec we offer. All three carry a lifetime warranty.', 'bmg-theme' ),
			),
			array(
				'q' => __( 'Do I need to prep my truck before drop-off?', 'bmg-theme' ),
				'a' => __( 'Just clean out the bed. We handle every surface prep step ourselves — sanding, degreasing, masking, and priming.', 'bmg-theme' ),
			),
		),
	),
);
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'FAQ', 'bmg-theme' ),
			'headline' => __( "GOT QUESTIONS? WE'VE GOT ANSWERS.", 'bmg-theme' ),
			'subline'  => __( 'Everything you need to know before your first visit.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== 2. Callout bar ================================================= ?>
	<?php
	get_template_part(
		'template-parts/components/callout',
		'install-bar',
		array( 'text' => __( "Can't find your answer? We're happy to help.", 'bmg-theme' ) )
	);
	?>

	<?php // ===== 3. FAQ accordion groups ======================================== ?>
	<section class="section-faq-page" data-section="faq-page">
		<div class="container">

			<?php foreach ( $faq_groups as $group ) : ?>
				<div class="section-faq-page__group bmg-reveal">
					<h2 class="section-faq-page__group-title">
						<?php echo esc_html( $group['title'] ); ?>
					</h2>

					<div class="accordion section-service-faq__accordion" id="<?php echo esc_attr( $group['id'] ); ?>">
						<?php foreach ( $group['items'] as $i => $item ) :
							$hid = $group['id'] . '-heading-' . ( $i + 1 );
							$cid = $group['id'] . '-collapse-' . ( $i + 1 );
							?>
							<div class="accordion-item">
								<h3 class="accordion-header" id="<?php echo esc_attr( $hid ); ?>">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $cid ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $cid ); ?>">
										<?php echo esc_html( $item['q'] ); ?>
									</button>
								</h3>
								<div id="<?php echo esc_attr( $cid ); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo esc_attr( $hid ); ?>" data-bs-parent="#<?php echo esc_attr( $group['id'] ); ?>">
									<div class="accordion-body"><?php echo esc_html( $item['a'] ); ?></div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</section>

	<?php // ===== 4. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal"><?php esc_html_e( 'READY WHEN YOU ARE', 'bmg-theme' ); ?></span>
					<h2 class="section-cta__headline bmg-reveal"><?php esc_html_e( 'BUILD IT RIGHT. BUILD IT HERE.', 'bmg-theme' ); ?></h2>
					<p class="section-cta__subline bmg-reveal"><?php esc_html_e( 'Free quotes. No pressure. One business day turnaround.', 'bmg-theme' ); ?></p>
					<div class="section-cta__actions bmg-reveal">
						<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
							<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/></svg>
						</a>
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/></svg>
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
