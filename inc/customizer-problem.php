<?php
/**
 * Problem Section — Customizer
 *
 * Registers all bmg_problem_* fields consumed by
 * template-parts/sections/section-problem.php.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Problem Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_problem_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_problem',
		array(
			'title'       => __( 'Problem Section', 'bmg-theme' ),
			'description' => __( 'Homepage problem — overline, headline, intro, three loss-aversion pain blocks, bridge line, and CTA.', 'bmg-theme' ),
			'priority'    => 125,
		)
	);

	// ----------------------------------------------------------------------
	// Header — overline, headline, intro
	// ----------------------------------------------------------------------

	$header_fields = array(
		'bmg_problem_overline' => array(
			'label'   => __( 'Overline', 'bmg-theme' ),
			'default' => 'THE WRONG BUILD COSTS YOU TWICE',
			'type'    => 'text',
		),
		'bmg_problem_headline' => array(
			'label'   => __( 'Headline (H2)', 'bmg-theme' ),
			'default' => 'CHEAP UPGRADES DON\'T SURVIVE REAL WORK.',
			'type'    => 'text',
		),
		'bmg_problem_intro' => array(
			'label'    => __( 'Intro Paragraph', 'bmg-theme' ),
			'default'  => 'Drop-in liners crack. Bolt-on parts rattle loose. DIY installs void factory warranty. We see it every week — and we\'ve fixed it every way.',
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
	);

	foreach ( $header_fields as $key => $field ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => isset( $field['sanitize'] ) ? $field['sanitize'] : 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				'label'   => $field['label'],
				'section' => 'bmg_theme_problem',
				'type'    => $field['type'],
			)
		);
	}

	// ----------------------------------------------------------------------
	// Three pain blocks
	// ----------------------------------------------------------------------

	$blocks = array(
		1 => array(
			'overline' => '01 / RUST NEVER SLEEPS',
			'title'    => 'Factory undercoating fails fast.',
			'body'     => 'Every salted road, wet jobsite, and winter rainstorm thins the thin coating your truck came with. By year three, rust is eating frame rails you can\'t see. By year five, it\'s structural.',
		),
		2 => array(
			'overline' => '02 / DROP-INS TRAP WATER',
			'title'    => 'Plastic liners rust your bed.',
			'body'     => 'Bolt-in liners flex every time you load the bed. Water works underneath. You pull the liner out in year four and find a rusted truck bed you can\'t sell.',
		),
		3 => array(
			'overline' => '03 / DIY VOIDS WARRANTY',
			'title'    => 'Bad installs kill coverage.',
			'body'     => 'Wrong torque. Cut harnesses. Drilled mounts in the wrong spot. Every one is a reason a manufacturer denies a warranty claim — and you pay out of pocket.',
		),
	);

	foreach ( $blocks as $i => $block ) {
		foreach ( array( 'overline', 'title', 'body' ) as $field ) {
			$key  = 'bmg_problem_block_' . $i . '_' . $field;
			$type = 'body' === $field ? 'textarea' : 'text';
			$sani = 'body' === $field ? 'sanitize_textarea_field' : 'sanitize_text_field';

			$wp_customize->add_setting(
				$key,
				array(
					'default'           => $block[ $field ],
					'sanitize_callback' => $sani,
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				$key,
				array(
					/* translators: 1: block index, 2: field label */
					'label'   => sprintf( __( 'Block %1$d — %2$s', 'bmg-theme' ), $i, ucfirst( $field ) ),
					'section' => 'bmg_theme_problem',
					'type'    => $type,
				)
			);
		}
	}

	// ----------------------------------------------------------------------
	// Bridge + CTA
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_problem_bridge',
		array(
			'default'           => 'Do it once. Do it right. Do it here.',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_problem_bridge',
		array(
			'label'       => __( 'Bridge Line', 'bmg-theme' ),
			'description' => __( 'Short bridge line between the pain blocks and the CTA.', 'bmg-theme' ),
			'section'     => 'bmg_theme_problem',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_problem_cta_text',
		array(
			'default'           => 'See How We Build It',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bmg_problem_cta_text',
		array(
			'label'   => __( 'CTA Text', 'bmg-theme' ),
			'section' => 'bmg_theme_problem',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_problem_cta_url',
		array(
			'default'           => '#founder',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bmg_problem_cta_url',
		array(
			'label'   => __( 'CTA Link', 'bmg-theme' ),
			'section' => 'bmg_theme_problem',
			'type'    => 'url',
		)
	);
}
add_action( 'customize_register', 'bmg_theme_problem_customizer' );
