<?php
/**
 * Homepage Process + FAQ Section — Rhino Custom Builds
 *
 * White section containing the 4-step process row and an inline
 * 8-question FAQ accordion (Bootstrap 5 native, speed/style overridden
 * to 250ms + red 3px left rail on the active item).
 *
 * Content:  CONTENT.md → Homepage → Section 6 — Process + FAQ
 * Design:   CLAUDE.md → GSL Section Mapping → Process
 * Motion:   references/rhino-build-spec.md → Accordion expand (250ms)
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline = get_theme_mod( 'bmg_process_overline', __( 'HOW IT WORKS', 'bmg-theme' ) );
$headline = get_theme_mod( 'bmg_process_headline', __( 'FROM QUOTE TO ROAD-READY IN 4 STEPS.', 'bmg-theme' ) );

// Four process steps.
$step_defaults = array(
	1 => array(
		'title' => 'Quote',
		'body'  => 'Tell us your vehicle and what you want done. We send a detailed written quote back within one business day.',
	),
	2 => array(
		'title' => 'Consultation',
		'body'  => 'Drop in for a walk-around or send photos. We spec the build, confirm parts and fitment, and lock in a date.',
	),
	3 => array(
		'title' => 'Install',
		'body'  => 'Your rig comes into our bay. Certified installers handle every step. You get progress photos along the way.',
	),
	4 => array(
		'title' => 'Road Test',
		'body'  => 'We test-drive every build before pickup. You get a dialed truck, full documentation, and warranty registration.',
	),
);

$steps = array();
foreach ( $step_defaults as $i => $d ) {
	$steps[] = array(
		'title' => get_theme_mod( 'bmg_process_step_' . $i . '_title', $d['title'] ),
		'body'  => get_theme_mod( 'bmg_process_step_' . $i . '_body', $d['body'] ),
	);
}

// FAQ — 8 questions. Q5 references phone fallback later; no dynamic subs here.
$faq_defaults = array(
	1 => array(
		'question' => 'How much does a typical build cost?',
		'answer'   => 'It depends on the vehicle and the scope. Spray-on bedliners start under $600. Accessory installs range from $300 to $3,000+ depending on parts. Full off-road builds can run $8,000–$25,000+. Every quote is free, written, and itemized — no surprises.',
	),
	2 => array(
		'question' => 'How long will my truck be in the shop?',
		'answer'   => 'Most bedliner installs are a single day. Accessory work is one to three days. Full builds run one to two weeks depending on parts availability. We give you a firm timeline with your quote and update you if anything shifts.',
	),
	3 => array(
		'question' => 'What vehicles do you work on?',
		'answer'   => 'Any truck, Jeep, SUV, or van — domestic or import, any year. We specialize in Ford, GM, RAM, Toyota, Jeep, and Nissan, but we work on everything.',
	),
	4 => array(
		'question' => 'Do you warranty your work?',
		'answer'   => 'Every spray-on coating carries a lifetime warranty against peeling, cracking, and bubbling. Parts are covered under manufacturer warranty, and we handle any claims on your behalf. Installation labor is warrantied for one year.',
	),
	5 => array(
		'question' => 'Do you offer financing?',
		'answer'   => 'Yes. We partner with a national financing provider for builds over $1,500. Application takes five minutes and most approvals come back instantly. See our financing page for details.',
	),
	6 => array(
		'question' => 'Where do your parts come from?',
		'answer'   => 'We\'re an authorized dealer for ARB, Fox, Warn, Rigid, Method, Baja Designs, Smittybilt, Rough Country, and more. Every part is OEM-grade, sourced direct from the manufacturer — no gray market, no knock-offs.',
	),
	7 => array(
		'question' => 'How do I book an install?',
		'answer'   => 'Start with the quote form on this site. A builder reviews your request within one business day, confirms parts and pricing, and schedules your install date. You can also call or stop by the shop to book directly.',
	),
	8 => array(
		'question' => 'Can I walk in or do I need an appointment?',
		'answer'   => 'Walk-ins welcome for quotes and questions — we love talking trucks. Installs require scheduling so we can have your parts on-site and an install bay reserved.',
	),
);

$faqs = array();
foreach ( $faq_defaults as $i => $d ) {
	$faqs[] = array(
		'question' => get_theme_mod( 'bmg_process_faq_' . $i . '_question', $d['question'] ),
		'answer'   => get_theme_mod( 'bmg_process_faq_' . $i . '_answer', $d['answer'] ),
	);
}

$faq_overline = get_theme_mod( 'bmg_process_faq_overline', __( 'COMMON QUESTIONS', 'bmg-theme' ) );
$faq_headline = get_theme_mod( 'bmg_process_faq_headline', __( 'GOT QUESTIONS?', 'bmg-theme' ) );
?>

<section id="process" class="section-process" data-section="process">
	<div class="container">

		<header class="section-process__header">
			<?php if ( $overline ) : ?>
				<span class="section-process__overline bmg-reveal">
					<?php echo esc_html( $overline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $headline ) : ?>
				<h2 class="section-process__headline bmg-reveal">
					<?php echo esc_html( $headline ); ?>
				</h2>
			<?php endif; ?>
		</header>

		<?php // 4-step process row with red connecting line. ?>
		<ol class="section-process__steps bmg-reveal-stagger">
			<?php foreach ( $steps as $i => $step ) :
				$num = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
				?>
				<li class="section-process__step bmg-reveal">
					<span class="section-process__step-number"><?php echo esc_html( $num ); ?></span>
					<h3 class="section-process__step-title">
						<?php echo esc_html( $step['title'] ); ?>
					</h3>
					<p class="section-process__step-body">
						<?php echo esc_html( $step['body'] ); ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ol>

		<?php // FAQ accordion (Bootstrap 5 native). ?>
		<div class="section-process__faq">
			<header class="section-process__faq-header bmg-reveal">
				<?php if ( $faq_overline ) : ?>
					<span class="section-process__faq-overline">
						<?php echo esc_html( $faq_overline ); ?>
					</span>
				<?php endif; ?>
				<?php if ( $faq_headline ) : ?>
					<h3 class="section-process__faq-headline">
						<?php echo esc_html( $faq_headline ); ?>
					</h3>
				<?php endif; ?>
			</header>

			<div class="accordion section-process__accordion bmg-reveal" id="processFaqAccordion">
				<?php foreach ( $faqs as $i => $faq ) :
					if ( empty( $faq['question'] ) ) {
						continue;
					}
					$heading_id = 'process-faq-heading-' . ( $i + 1 );
					$collapse_id = 'process-faq-collapse-' . ( $i + 1 );
					?>
					<div class="accordion-item">
						<h4 class="accordion-header" id="<?php echo esc_attr( $heading_id ); ?>">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $collapse_id ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $collapse_id ); ?>">
								<?php echo esc_html( $faq['question'] ); ?>
							</button>
						</h4>
						<div id="<?php echo esc_attr( $collapse_id ); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" data-bs-parent="#processFaqAccordion">
							<div class="accordion-body">
								<?php echo esc_html( $faq['answer'] ); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</section>
