<?php
/**
 * CTA Section — Customizer
 *
 * Registers all bmg_cta_* fields consumed by
 * template-parts/sections/section-cta.php. Phone number and trust
 * strip values are re-used from the Business Information and Hero
 * sections respectively, so they are NOT redeclared here.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register CTA Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_cta_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_cta',
		array(
			'title'       => __( 'CTA Section', 'bmg-theme' ),
			'description' => __( 'Homepage closing CTA — dual action band with red primary + amber phone. Phone number pulls from Business Information. Trust strip echoes the hero.', 'bmg-theme' ),
			'priority'    => 150,
		)
	);

	$fields = array(
		'bmg_cta_overline' => array(
			'label'    => __( 'Overline', 'bmg-theme' ),
			'default'  => 'READY WHEN YOU ARE',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'bmg_cta_headline' => array(
			'label'    => __( 'Headline (H2)', 'bmg-theme' ),
			'default'  => 'BUILD IT RIGHT. BUILD IT HERE.',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'bmg_cta_subline' => array(
			'label'    => __( 'Subline', 'bmg-theme' ),
			'default'  => 'Free quotes. No pressure. Lifetime warranty on every coating.',
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'bmg_cta_button_text' => array(
			'label'    => __( 'Primary Button Text', 'bmg-theme' ),
			'default'  => 'Get a Quote',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'bmg_cta_button_url' => array(
			'label'    => __( 'Primary Button Link', 'bmg-theme' ),
			'default'  => '/quote/',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'bmg_cta_microcopy' => array(
			'label'       => __( 'Microcopy', 'bmg-theme' ),
			'description' => __( 'Risk-removal line under the CTA buttons.', 'bmg-theme' ),
			'default'     => 'Free quote. No obligation. Same-week availability on most installs.',
			'type'        => 'textarea',
			'sanitize'    => 'sanitize_textarea_field',
		),
		'bmg_cta_hours_reminder' => array(
			'label'    => __( 'Hours Reminder', 'bmg-theme' ),
			'default'  => 'Open Mon–Fri 7AM–6PM · Sat 8AM–2PM',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	foreach ( $fields as $key => $field ) {
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $field['default'],
				'sanitize_callback' => $field['sanitize'],
				'transport'         => 'postMessage',
			)
		);

		$control_args = array(
			'label'   => $field['label'],
			'section' => 'bmg_theme_cta',
			'type'    => $field['type'],
		);

		if ( isset( $field['description'] ) ) {
			$control_args['description'] = $field['description'];
		}

		$wp_customize->add_control( $key, $control_args );
	}
}
add_action( 'customize_register', 'bmg_theme_cta_customizer' );
