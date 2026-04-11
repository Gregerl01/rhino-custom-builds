<?php
/**
 * Hero Section — Customizer
 *
 * Registers all bmg_hero_* fields consumed by
 * template-parts/sections/section-hero.php.
 *
 * Field keys match CONTENT.md → Homepage → Section 1 — Hero.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Hero Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_hero_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_hero',
		array(
			'title'       => __( 'Hero Section', 'bmg-theme' ),
			'description' => __( 'Homepage hero — overline, headline, subline, CTAs, trust strip, vehicle selector, background image.', 'bmg-theme' ),
			'priority'    => 120,
		)
	);

	// ----------------------------------------------------------------------
	// Content — overline, headline, subline
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_hero_overline',
		array(
			'default'           => 'CUSTOM TRUCK & OFF-ROAD SHOP',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_overline',
		array(
			'label'       => __( 'Overline', 'bmg-theme' ),
			'description' => __( 'Short label above the headline (uppercase mono).', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_hero_headline',
		array(
			'default'           => 'BUILT FOR WHERE THE ROAD ENDS.',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_headline',
		array(
			'label'       => __( 'Headline (H1)', 'bmg-theme' ),
			'description' => __( 'Barlow Condensed uppercase. Max 6 words.', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_hero_subline',
		array(
			'default'           => 'Spray-on bedliners, protective coatings, off-road gear, and full upfitting — installed in-house by certified builders.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_subline',
		array(
			'label'       => __( 'Subline', 'bmg-theme' ),
			'description' => __( 'One to two supporting sentences.', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'textarea',
		)
	);

	// ----------------------------------------------------------------------
	// CTAs
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_hero_cta_primary_text',
		array(
			'default'           => 'Get a Quote',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_cta_primary_text',
		array(
			'label'   => __( 'Primary CTA Text', 'bmg-theme' ),
			'section' => 'bmg_theme_hero',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_hero_cta_primary_url',
		array(
			'default'           => '/quote/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_cta_primary_url',
		array(
			'label'   => __( 'Primary CTA Link', 'bmg-theme' ),
			'section' => 'bmg_theme_hero',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'bmg_hero_cta_secondary_text',
		array(
			'default'           => 'Explore Services',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_cta_secondary_text',
		array(
			'label'       => __( 'Secondary CTA Text', 'bmg-theme' ),
			'description' => __( 'Leave empty to hide.', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_hero_cta_secondary_url',
		array(
			'default'           => '#features',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_cta_secondary_url',
		array(
			'label'   => __( 'Secondary CTA Link', 'bmg-theme' ),
			'section' => 'bmg_theme_hero',
			'type'    => 'url',
		)
	);

	// ----------------------------------------------------------------------
	// Trust Strip (4 items)
	// ----------------------------------------------------------------------

	$trust_defaults = array(
		1 => 'LIFETIME WARRANTY',
		2 => '4,200+ INSTALLS',
		3 => 'CERTIFIED INSTALLERS',
		4 => '4.9★ GOOGLE',
	);

	foreach ( $trust_defaults as $i => $default ) {
		$key = 'bmg_hero_trust_item_' . $i;

		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $default,
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				/* translators: %d: trust strip item number */
				'label'       => sprintf( __( 'Trust Strip Item %d', 'bmg-theme' ), $i ),
				'description' => 1 === $i ? __( 'Four inline proof items. Numeric values animate on viewport enter.', 'bmg-theme' ) : '',
				'section'     => 'bmg_theme_hero',
				'type'        => 'text',
			)
		);
	}

	// ----------------------------------------------------------------------
	// Vehicle Selector
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_hero_vehicle_selector_enabled',
		array(
			'default'           => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
		)
	);
	$wp_customize->add_control(
		'bmg_hero_vehicle_selector_enabled',
		array(
			'label'       => __( 'Show Vehicle Type Selector', 'bmg-theme' ),
			'description' => __( 'Overlays pill group (Trucks / Jeeps / SUVs / Fleet) on the hero.', 'bmg-theme' ),
			'section'     => 'bmg_theme_hero',
			'type'        => 'checkbox',
		)
	);

	// ----------------------------------------------------------------------
	// Background Image
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_hero_background_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bmg_hero_background_image',
			array(
				'label'       => __( 'Background Image', 'bmg-theme' ),
				'description' => __( 'Action photography. Sits behind a 70% dark overlay + grain texture.', 'bmg-theme' ),
				'section'     => 'bmg_theme_hero',
			)
		)
	);
}
add_action( 'customize_register', 'bmg_theme_hero_customizer' );
