<?php
/**
 * Process + FAQ Section — Customizer
 *
 * Registers all bmg_process_* fields consumed by
 * template-parts/sections/section-process.php (four-step process row
 * and inline eight-question FAQ accordion).
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Process Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_process_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_process',
		array(
			'title'       => __( 'Process + FAQ Section', 'bmg-theme' ),
			'description' => __( 'Homepage process — four steps + inline FAQ accordion.', 'bmg-theme' ),
			'priority'    => 145,
		)
	);

	// ----------------------------------------------------------------------
	// Header
	// ----------------------------------------------------------------------
	$header_fields = array(
		'bmg_process_overline' => array(
			'label'   => __( 'Overline', 'bmg-theme' ),
			'default' => 'HOW IT WORKS',
		),
		'bmg_process_headline' => array(
			'label'   => __( 'Headline (H2)', 'bmg-theme' ),
			'default' => 'FROM QUOTE TO ROAD-READY IN 4 STEPS.',
		),
	);

	foreach ( $header_fields as $key => $field ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				'label'   => $field['label'],
				'section' => 'bmg_theme_process',
				'type'    => 'text',
			)
		);
	}

	// ----------------------------------------------------------------------
	// Four process steps
	// ----------------------------------------------------------------------
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

	foreach ( $step_defaults as $i => $d ) {
		$wp_customize->add_setting(
			'bmg_process_step_' . $i . '_title',
			array(
				'default'           => $d['title'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_process_step_' . $i . '_title',
			array(
				/* translators: %d: step index */
				'label'   => sprintf( __( 'Step %d — Title', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_process',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'bmg_process_step_' . $i . '_body',
			array(
				'default'           => $d['body'],
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_process_step_' . $i . '_body',
			array(
				/* translators: %d: step index */
				'label'   => sprintf( __( 'Step %d — Body', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_process',
				'type'    => 'textarea',
			)
		);
	}

	// ----------------------------------------------------------------------
	// FAQ header
	// ----------------------------------------------------------------------
	$wp_customize->add_setting(
		'bmg_process_faq_overline',
		array(
			'default'           => 'COMMON QUESTIONS',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_process_faq_overline',
		array(
			'label'   => __( 'FAQ Overline', 'bmg-theme' ),
			'section' => 'bmg_theme_process',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_process_faq_headline',
		array(
			'default'           => 'GOT QUESTIONS?',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_process_faq_headline',
		array(
			'label'   => __( 'FAQ Headline', 'bmg-theme' ),
			'section' => 'bmg_theme_process',
			'type'    => 'text',
		)
	);

	// ----------------------------------------------------------------------
	// Eight FAQ items
	// ----------------------------------------------------------------------
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

	foreach ( $faq_defaults as $i => $d ) {
		$wp_customize->add_setting(
			'bmg_process_faq_' . $i . '_question',
			array(
				'default'           => $d['question'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_process_faq_' . $i . '_question',
			array(
				/* translators: %d: FAQ index */
				'label'   => sprintf( __( 'FAQ %d — Question', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_process',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'bmg_process_faq_' . $i . '_answer',
			array(
				'default'           => $d['answer'],
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_process_faq_' . $i . '_answer',
			array(
				/* translators: %d: FAQ index */
				'label'   => sprintf( __( 'FAQ %d — Answer', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_process',
				'type'    => 'textarea',
			)
		);
	}
}
add_action( 'customize_register', 'bmg_theme_process_customizer' );
