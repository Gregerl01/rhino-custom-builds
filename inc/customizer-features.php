<?php
/**
 * Features Section — Customizer
 *
 * Registers all bmg_features_* and bmg_service_N_* fields consumed by
 * template-parts/sections/section-features.php.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Features Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_features_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_features',
		array(
			'title'       => __( 'Features Section', 'bmg-theme' ),
			'description' => __( 'Homepage features — overline, headline, subline, CTA, and six Service Category Cards.', 'bmg-theme' ),
			'priority'    => 135,
		)
	);

	// ----------------------------------------------------------------------
	// Header — overline, headline, subline
	// ----------------------------------------------------------------------

	$header_fields = array(
		'bmg_features_overline' => array(
			'label'   => __( 'Overline', 'bmg-theme' ),
			'default' => 'WHAT WE BUILD',
			'type'    => 'text',
		),
		'bmg_features_headline' => array(
			'label'   => __( 'Headline (H2)', 'bmg-theme' ),
			'default' => 'EVERYTHING YOUR RIG NEEDS. UNDER ONE ROOF.',
			'type'    => 'text',
		),
		'bmg_features_subline' => array(
			'label'    => __( 'Subline', 'bmg-theme' ),
			'default'  => 'Six service lines. One shop. One warranty.',
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
				'section' => 'bmg_theme_features',
				'type'    => $field['type'],
			)
		);
	}

	// ----------------------------------------------------------------------
	// Footer CTA
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_features_cta_text',
		array(
			'default'           => 'View All Services',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bmg_features_cta_text',
		array(
			'label'   => __( 'CTA Text', 'bmg-theme' ),
			'section' => 'bmg_theme_features',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_features_cta_url',
		array(
			'default'           => '/services/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bmg_features_cta_url',
		array(
			'label'   => __( 'CTA Link', 'bmg-theme' ),
			'section' => 'bmg_theme_features',
			'type'    => 'url',
		)
	);

	// ----------------------------------------------------------------------
	// Six Service Category Cards
	// ----------------------------------------------------------------------

	$card_defaults = array(
		1 => array(
			'overline' => 'SERVICE 01',
			'title'    => 'Spray-On Bedliners',
			'body'     => 'Permanent coatings bonded to bare metal. Standard, Premium, and off-road-grade finishes — all lifetime warranty.',
			'url'      => '/services/spray-on-bedliners/',
		),
		2 => array(
			'overline' => 'SERVICE 02',
			'title'    => 'Protective Coatings',
			'body'     => 'Undercoating, rocker panels, wheel wells, and frames sealed against rust, salt, and trail abuse.',
			'url'      => '/services/protective-coatings/',
		),
		3 => array(
			'overline' => 'SERVICE 03',
			'title'    => 'Truck Accessories',
			'body'     => 'Tonneau covers, running boards, toolboxes, racks, tow packages — installed clean and torqued to spec.',
			'url'      => '/services/truck-accessories/',
		),
		4 => array(
			'overline' => 'SERVICE 04',
			'title'    => 'Off-Road & Overland',
			'body'     => 'Lifts, bumpers, winches, armor, lighting, and full overland kits. Built to survive the trail.',
			'url'      => '/services/off-road-overland/',
		),
		5 => array(
			'overline' => 'SERVICE 05',
			'title'    => 'Fleet Services',
			'body'     => 'Volume pricing, dedicated project management, scheduled install windows, Net-30 billing.',
			'url'      => '/services/fleet/',
		),
		6 => array(
			'overline' => 'SHOP',
			'title'    => 'Shop Parts & Gear',
			'body'     => 'Browse thousands of parts from the brands we install. Ship to your door or install in-bay.',
			'url'      => '/shop/',
		),
	);

	foreach ( $card_defaults as $i => $defaults ) {
		$prefix = 'bmg_service_' . $i . '_';

		// Overline
		$wp_customize->add_setting(
			$prefix . 'overline',
			array(
				'default'           => $defaults['overline'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			$prefix . 'overline',
			array(
				/* translators: %d: card index */
				'label'   => sprintf( __( 'Card %d — Overline', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_features',
				'type'    => 'text',
			)
		);

		// Title
		$wp_customize->add_setting(
			$prefix . 'title',
			array(
				'default'           => $defaults['title'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			$prefix . 'title',
			array(
				/* translators: %d: card index */
				'label'   => sprintf( __( 'Card %d — Title', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_features',
				'type'    => 'text',
			)
		);

		// Body
		$wp_customize->add_setting(
			$prefix . 'body',
			array(
				'default'           => $defaults['body'],
				'sanitize_callback' => 'sanitize_textarea_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			$prefix . 'body',
			array(
				/* translators: %d: card index */
				'label'   => sprintf( __( 'Card %d — Body', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_features',
				'type'    => 'textarea',
			)
		);

		// URL
		$wp_customize->add_setting(
			$prefix . 'url',
			array(
				'default'           => $defaults['url'],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			$prefix . 'url',
			array(
				/* translators: %d: card index */
				'label'   => sprintf( __( 'Card %d — Link', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_features',
				'type'    => 'url',
			)
		);

		// Image
		$wp_customize->add_setting(
			$prefix . 'image',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				$prefix . 'image',
				array(
					/* translators: %d: card index */
					'label'       => sprintf( __( 'Card %d — Image (4:3)', 'bmg-theme' ), $i ),
					'description' => __( 'Action photography. Sits full-bleed at the top of the card.', 'bmg-theme' ),
					'section'     => 'bmg_theme_features',
				)
			)
		);
	}
}
add_action( 'customize_register', 'bmg_theme_features_customizer' );
