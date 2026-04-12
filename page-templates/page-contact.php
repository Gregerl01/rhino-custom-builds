<?php
/**
 * Template Name: Contact Page
 *
 * Contact page for Rhino Custom Builds. Mirrors CONTENT.md → Contact
 * page with a 2-column form + sticky info sidebar layout.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

// Business Info Customizer values.
$phone_display    = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link       = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
$phone_fleet      = get_theme_mod( 'bmg_phone_fleet', '(555) 555-0199' );
$phone_fleet_link = preg_replace( '/[^0-9+]/', '', (string) $phone_fleet );
$email            = get_theme_mod( 'bmg_email', 'hello@rhinocustombuilds.com' );
$address_street   = get_theme_mod( 'bmg_address_street', '[Street Address]' );
$address_city     = get_theme_mod( 'bmg_address_city', '[City, ST ZIP]' );
$hours_weekday    = get_theme_mod( 'bmg_office_hours', 'Mon–Fri: 7AM – 6PM' );
$hours_saturday   = get_theme_mod( 'bmg_office_hours_sat', 'Saturday: 8AM – 2PM' );
$hours_sunday     = get_theme_mod( 'bmg_office_hours_sun', 'Sunday: Closed' );

// Contact FAQ items.
$contact_faq = array(
	array(
		'question' => __( 'What are your hours?', 'bmg-theme' ),
		'answer'   => __( 'We\'re open Mon–Fri 7AM–6PM and Saturday 8AM–2PM. Closed Sunday. Walk-ins are welcome during business hours for quotes and questions — installs require scheduling.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Do I need an appointment to get a quote?', 'bmg-theme' ),
		'answer'   => __( 'No. Walk-ins welcome for quotes and questions — we love talking trucks. You can also submit the contact form or our quote form and we\'ll get back to you within one business day.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'How fast do you respond to form submissions?', 'bmg-theme' ),
		'answer'   => __( 'Within one business day on weekdays. Saturday submissions typically get a reply first thing Monday morning. For urgent work, call us directly.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Do I need to bring my vehicle in to get a quote?', 'bmg-theme' ),
		'answer'   => __( 'Not always. For spray-on bedliners and accessory installs we can quote from the year/make/model. For off-road builds, custom work, or anything involving existing damage or rust, we prefer to see the vehicle in person.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Are you the right shop for fleet accounts?', 'bmg-theme' ),
		'answer'   => __( 'Yes. Use the fleet line — (555) 555-0199 — and a dedicated project manager will respond within one business day with volume pricing, scheduling, and Net-30 billing options.', 'bmg-theme' ),
	),
	array(
		'question' => __( 'Can I drop off my truck and come back later?', 'bmg-theme' ),
		'answer'   => __( 'Yes. Most bedliner installs are one day. Accessory work is one to three days. We\'ll give you a firm pickup time with your quote and text you when it\'s ready.', 'bmg-theme' ),
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
			'overline' => __( 'CONTACT', 'bmg-theme' ),
			'headline' => __( 'STOP BY. CALL. OR SEND IT.', 'bmg-theme' ),
			'subline'  => __( 'Open six days a week. Free quotes. No pressure.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== 2. Form + Info Sidebar ========================================= ?>
	<section class="section-contact" data-section="contact">
		<div class="container">
			<div class="row g-5 align-items-start">

				<?php // ---- Form column ---- ?>
				<div class="col-lg-7 section-contact__form-col">
					<span class="section-contact__overline bmg-reveal">
						<?php esc_html_e( 'SEND A MESSAGE', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-contact__headline bmg-reveal">
						<?php esc_html_e( "TELL US WHAT YOU'RE BUILDING.", 'bmg-theme' ); ?>
					</h2>
					<p class="section-contact__body bmg-reveal">
						<?php esc_html_e( "A builder reviews every message within one business day. If your project is urgent, call us — we're on the shop floor.", 'bmg-theme' ); ?>
					</p>

					<?php
					// Gravity Forms contact form — auto-created by
					// inc/quote-form-setup.php, stored in bmg_gf_contact_form_id.
					$gf_contact_id = (int) get_theme_mod( 'bmg_gf_contact_form_id', 0 );
					if ( $gf_contact_id && function_exists( 'gravity_form' ) ) :
						gravity_form( $gf_contact_id, false, false, false, null, true, 0, true );
					else :
						?>
						<div class="section-contact__fallback bmg-reveal">
							<p><?php esc_html_e( 'Contact form is loading. If it doesn\'t appear, call or email us directly.', 'bmg-theme' ); ?></p>
							<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
								<span><?php echo esc_html( sprintf( __( 'Call %s', 'bmg-theme' ), $phone_display ) ); ?></span>
							</a>
						</div>
						<?php
					endif;
					?>
				</div>

				<?php // ---- Sticky info sidebar ---- ?>
				<aside class="col-lg-5 section-contact__info-col">
					<div class="section-contact__info-card bmg-reveal">

						<h3 class="section-contact__info-heading">
							<?php esc_html_e( 'VISIT OR CALL', 'bmg-theme' ); ?>
						</h3>

						<ul class="section-contact__contact-list" role="list">
							<li>
								<span class="section-contact__contact-label"><?php esc_html_e( 'General', 'bmg-theme' ); ?></span>
								<a class="section-contact__phone" href="tel:<?php echo esc_attr( $phone_link ); ?>">
									<?php echo esc_html( $phone_display ); ?>
								</a>
							</li>
							<?php if ( $phone_fleet ) : ?>
								<li>
									<span class="section-contact__contact-label"><?php esc_html_e( 'Fleet', 'bmg-theme' ); ?></span>
									<a class="section-contact__phone" href="tel:<?php echo esc_attr( $phone_fleet_link ); ?>">
										<?php echo esc_html( $phone_fleet ); ?>
									</a>
								</li>
							<?php endif; ?>
							<li>
								<span class="section-contact__contact-label"><?php esc_html_e( 'Email', 'bmg-theme' ); ?></span>
								<a class="section-contact__email" href="mailto:<?php echo esc_attr( $email ); ?>">
									<?php echo esc_html( $email ); ?>
								</a>
							</li>
						</ul>

						<div class="section-contact__divider"></div>

						<h3 class="section-contact__info-heading">
							<?php esc_html_e( 'THE SHOP', 'bmg-theme' ); ?>
						</h3>
						<address class="section-contact__address">
							<?php echo esc_html( $address_street ); ?><br>
							<?php echo esc_html( $address_city ); ?>
						</address>

						<div class="section-contact__divider"></div>

						<h3 class="section-contact__info-heading">
							<?php esc_html_e( 'HOURS', 'bmg-theme' ); ?>
						</h3>
						<ul class="section-contact__hours" role="list">
							<li><?php echo esc_html( $hours_weekday ); ?></li>
							<li><?php echo esc_html( $hours_saturday ); ?></li>
							<li><?php echo esc_html( $hours_sunday ); ?></li>
						</ul>

						<div class="section-contact__divider"></div>

						<a class="btn-rhino btn-rhino--primary section-contact__quote-cta" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">
							<span><?php esc_html_e( 'Request a Quote', 'bmg-theme' ); ?></span>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
							</svg>
						</a>

					</div>
				</aside>

			</div>
		</div>
	</section>

	<?php // ===== 3. FAQ ========================================================= ?>
	<section class="section-service-faq" data-section="contact-faq">
		<div class="container">
			<header class="section-service-faq__header">
				<span class="section-service-faq__overline bmg-reveal">
					<?php esc_html_e( 'COMMON QUESTIONS', 'bmg-theme' ); ?>
				</span>
				<h2 class="section-service-faq__headline bmg-reveal">
					<?php esc_html_e( 'GOT QUESTIONS?', 'bmg-theme' ); ?>
				</h2>
			</header>

			<div class="accordion section-service-faq__accordion bmg-reveal" id="contact-faq-accordion">
				<?php foreach ( $contact_faq as $i => $item ) :
					$hid = 'contact-faq-heading-' . ( $i + 1 );
					$cid = 'contact-faq-collapse-' . ( $i + 1 );
					?>
					<div class="accordion-item">
						<h3 class="accordion-header" id="<?php echo esc_attr( $hid ); ?>">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $cid ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $cid ); ?>">
								<?php echo esc_html( $item['question'] ); ?>
							</button>
						</h3>
						<div id="<?php echo esc_attr( $cid ); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo esc_attr( $hid ); ?>" data-bs-parent="#contact-faq-accordion">
							<div class="accordion-body"><?php echo esc_html( $item['answer'] ); ?></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php // ===== 4. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal">
						<?php esc_html_e( 'READY WHEN YOU ARE', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-cta__headline bmg-reveal">
						<?php esc_html_e( 'LET\'S BUILD IT.', 'bmg-theme' ); ?>
					</h2>
					<p class="section-cta__subline bmg-reveal">
						<?php esc_html_e( 'Free quote. No pressure. One business day turnaround on every message.', 'bmg-theme' ); ?>
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
