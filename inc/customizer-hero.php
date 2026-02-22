<?php
/**
 * Hero Section Customizer Settings
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Hero Customizer Settings
 */
function bmg_theme_hero_customizer( $wp_customize ) {

	// Hero Section.
	$wp_customize->add_section(
		'bmg_theme_hero',
		array(
			'title'       => __( 'Hero Section', 'bmg-theme' ),
			'description' => __( 'Customize the homepage hero section.', 'bmg-theme' ),
			'priority'    => 120,
		)
	);

	// ==========================================================================
	// Headline
	// ==========================================================================

	// Hero Headline.
	$wp_customize->add_setting(
		'hero_headline',
		array(
			'default'           => __( 'Medicine the Way It Should Be', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'hero_headline',
		array(
			'label'       => __( 'Headline', 'bmg-theme' ),
			'description' => __( 'Short, impactful brand statement (6-8 words recommended).', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'text',
		)
	);

	// ==========================================================================
	// Subtitle
	// ==========================================================================

	// Hero Subtitle.
	$wp_customize->add_setting(
		'hero_subtitle',
		array(
			'default'           => __( 'Personalized, unhurried care for patients who expect more.', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'hero_subtitle',
		array(
			'label'       => __( 'Subtitle', 'bmg-theme' ),
			'description' => __( 'Single supporting sentence.', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'text',
		)
	);

	// ==========================================================================
	// Background Image (Optional)
	// ==========================================================================

	// Background Image.
	$wp_customize->add_setting(
		'hero_background_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hero_background_image',
			array(
				'label'       => __( 'Background Image (Optional)', 'bmg-theme' ),
				'description' => __( 'If set, displays behind the hero content with a dark overlay.', 'bmg-theme' ),
				'section'     => 'bmg_theme_hero',
			)
		)
	);

	// Background Overlay Opacity.
	$wp_customize->add_setting(
		'hero_overlay_opacity',
		array(
			'default'           => 70,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'hero_overlay_opacity',
		array(
			'label'       => __( 'Overlay Opacity (%)', 'bmg-theme' ),
			'description' => __( 'Darkness of overlay on background image (0-100).', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'range',
			'input_attrs' => array(
				'min'  => 0,
				'max'  => 100,
				'step' => 5,
			),
		)
	);
}
add_action( 'customize_register', 'bmg_theme_hero_customizer' );
