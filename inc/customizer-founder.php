<?php
/**
 * Founder / Shop Section — Customizer
 *
 * Registers all bmg_founder_* fields consumed by
 * template-parts/sections/section-founder.php.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Founder Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_founder_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_founder',
		array(
			'title'       => __( 'Founder / Shop Section', 'bmg-theme' ),
			'description' => __( 'Homepage shop story — two paragraphs, three credential badges, four feature bullets, CTA, and image collage.', 'bmg-theme' ),
			'priority'    => 130,
		)
	);

	// ----------------------------------------------------------------------
	// Header — overline + headline
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_founder_overline',
		array(
			'default'           => 'THE SHOP',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_founder_overline',
		array(
			'label'   => __( 'Overline', 'bmg-theme' ),
			'section' => 'bmg_theme_founder',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_founder_headline',
		array(
			'default'           => 'RUN BY BUILDERS. NOT SALESPEOPLE.',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_founder_headline',
		array(
			'label'       => __( 'Headline (H2)', 'bmg-theme' ),
			'description' => __( 'Barlow Condensed uppercase.', 'bmg-theme' ),
			'section'     => 'bmg_theme_founder',
			'type'        => 'text',
		)
	);

	// ----------------------------------------------------------------------
	// Two paragraphs
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_founder_paragraph_1',
		array(
			'default'           => 'Rhino Custom Builds started in 2014 with one spray gun, a two-bay garage, and a beat-up F-150 that needed a bedliner. The liner held. Friends asked. Friends of friends asked. Twelve years later, we run three install bays, a full parts inventory built for trucks, and a team that only hires installers with manufacturer certifications on the products they touch.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_founder_paragraph_1',
		array(
			'label'   => __( 'Paragraph 1', 'bmg-theme' ),
			'section' => 'bmg_theme_founder',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'bmg_founder_paragraph_2',
		array(
			'default'           => 'We don\'t subcontract. We don\'t outsource. Every coating, every bumper, every winch, every wiring harness — it all comes off our floor. If we installed it, we stand behind it. If we didn\'t, we\'ll still fix it. Walk into the shop any day and the person who\'ll work on your truck is the person who\'ll talk to you about it.',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'bmg_founder_paragraph_2',
		array(
			'label'   => __( 'Paragraph 2', 'bmg-theme' ),
			'section' => 'bmg_theme_founder',
			'type'    => 'textarea',
		)
	);

	// ----------------------------------------------------------------------
	// Three credential badges
	// ----------------------------------------------------------------------

	$badge_defaults = array(
		1 => array( '12+', 'YEARS IN BUSINESS' ),
		2 => array( '4,200+', 'INSTALLS COMPLETED' ),
		3 => array( 'San Diego, CA', 'LOCALLY OWNED' ),
	);

	foreach ( $badge_defaults as $i => $pair ) {
		$wp_customize->add_setting(
			'bmg_founder_badge_' . $i . '_number',
			array(
				'default'           => $pair[0],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_founder_badge_' . $i . '_number',
			array(
				/* translators: %d: badge index */
				'label'   => sprintf( __( 'Badge %d — Number', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_founder',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'bmg_founder_badge_' . $i . '_label',
			array(
				'default'           => $pair[1],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_founder_badge_' . $i . '_label',
			array(
				/* translators: %d: badge index */
				'label'   => sprintf( __( 'Badge %d — Label', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_founder',
				'type'    => 'text',
			)
		);
	}

	// ----------------------------------------------------------------------
	// Four feature bullets
	// ----------------------------------------------------------------------

	$feature_defaults = array(
		1 => array(
			'title' => 'Certified Installers',
			'body'  => 'Manufacturer-trained on every product we touch.',
		),
		2 => array(
			'title' => 'OEM-Grade Parts',
			'body'  => 'Authorized dealer for ARB, Fox, Warn, Rigid, Method, and more.',
		),
		3 => array(
			'title' => 'Lifetime Warranty',
			'body'  => 'Every spray-on coating backed for life. No asterisks.',
		),
		4 => array(
			'title' => 'In-Bay Accountability',
			'body'  => 'Three install bays. One team. No subcontractors.',
		),
	);

	foreach ( $feature_defaults as $i => $feature ) {
		$wp_customize->add_setting(
			'bmg_founder_feature_' . $i . '_title',
			array(
				'default'           => $feature['title'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_founder_feature_' . $i . '_title',
			array(
				/* translators: %d: feature index */
				'label'   => sprintf( __( 'Feature %d — Title', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_founder',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'bmg_founder_feature_' . $i . '_body',
			array(
				'default'           => $feature['body'],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_founder_feature_' . $i . '_body',
			array(
				/* translators: %d: feature index */
				'label'   => sprintf( __( 'Feature %d — Body', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_founder',
				'type'    => 'text',
			)
		);
	}

	// ----------------------------------------------------------------------
	// CTA
	// ----------------------------------------------------------------------

	$wp_customize->add_setting(
		'bmg_founder_cta_text',
		array(
			'default'           => 'Meet the Team',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'bmg_founder_cta_text',
		array(
			'label'   => __( 'CTA Text', 'bmg-theme' ),
			'section' => 'bmg_theme_founder',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'bmg_founder_cta_url',
		array(
			'default'           => '/about/',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'bmg_founder_cta_url',
		array(
			'label'   => __( 'CTA Link', 'bmg-theme' ),
			'section' => 'bmg_theme_founder',
			'type'    => 'url',
		)
	);
}
add_action( 'customize_register', 'bmg_theme_founder_customizer' );
