<?php
/**
 * Proof Section — Customizer
 *
 * Registers all bmg_proof_*, bmg_project_*, bmg_testimonial_*,
 * bmg_stat_*, and bmg_brand_* fields consumed by
 * template-parts/sections/section-proof.php.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Proof Customizer Settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function bmg_theme_proof_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'bmg_theme_proof',
		array(
			'title'       => __( 'Proof Section', 'bmg-theme' ),
			'description' => __( 'Homepage proof — projects, testimonials, stats, and brand logos.', 'bmg-theme' ),
			'priority'    => 140,
		)
	);

	// ----------------------------------------------------------------------
	// Header
	// ----------------------------------------------------------------------
	$header_fields = array(
		'bmg_proof_overline' => array(
			'label'   => __( 'Overline', 'bmg-theme' ),
			'default' => 'REAL BUILDS. REAL TRUCKS.',
			'type'    => 'text',
		),
		'bmg_proof_headline' => array(
			'label'   => __( 'Headline (H2)', 'bmg-theme' ),
			'default' => 'SEE THE WORK.',
			'type'    => 'text',
		),
		'bmg_proof_subline' => array(
			'label'    => __( 'Subline', 'bmg-theme' ),
			'default'  => 'Every project below came off our floor.',
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
				'section' => 'bmg_theme_proof',
				'type'    => $field['type'],
			)
		);
	}

	// ----------------------------------------------------------------------
	// CTAs — gallery + more builds
	// ----------------------------------------------------------------------
	$cta_fields = array(
		'bmg_proof_gallery_cta_text'     => array( 'View the Full Gallery', __( 'Gallery CTA Text', 'bmg-theme' ), 'text' ),
		'bmg_proof_gallery_cta_url'      => array( '/gallery/', __( 'Gallery CTA Link', 'bmg-theme' ), 'url' ),
		'bmg_proof_more_builds_cta_text' => array( 'See More Builds', __( 'More Builds CTA Text', 'bmg-theme' ), 'text' ),
		'bmg_proof_more_builds_cta_url'  => array( '/gallery/', __( 'More Builds CTA Link', 'bmg-theme' ), 'url' ),
	);

	foreach ( $cta_fields as $key => $field ) {
		list( $default, $label, $type ) = $field;
		$wp_customize->add_setting(
			$key,
			array(
				'default'           => $default,
				'sanitize_callback' => 'url' === $type ? 'esc_url_raw' : 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			$key,
			array(
				'label'   => $label,
				'section' => 'bmg_theme_proof',
				'type'    => $type,
			)
		);
	}

	// ----------------------------------------------------------------------
	// Three project cards
	// ----------------------------------------------------------------------
	$project_defaults = array(
		1 => array(
			'title'    => 'Full Off-Road Build',
			'vehicle'  => '2022 Ford F-250 Super Duty',
			'services' => 'Lift · Bumpers · Winch · Lighting · Bedliner',
			'result'   => 'Trail-ready in 8 days',
			'url'      => '/gallery/',
		),
		2 => array(
			'title'    => 'Overland Build',
			'vehicle'  => '2023 Jeep Gladiator Rubicon',
			'services' => 'Roof Tent · Armor · Recovery Kit · Coatings',
			'result'   => '3,000-mile expedition tested',
			'url'      => '/gallery/',
		),
		3 => array(
			'title'    => 'Work Truck Upfit',
			'vehicle'  => '2021 RAM 1500',
			'services' => 'Spray-On Bedliner · Tonneau · Running Boards · Toolbox',
			'result'   => 'Delivered in 2 days',
			'url'      => '/gallery/',
		),
	);

	foreach ( $project_defaults as $i => $d ) {
		$prefix = 'bmg_project_' . $i . '_';

		$fields = array(
			'title'    => array( __( 'Title', 'bmg-theme' ), 'text', $d['title'] ),
			'vehicle'  => array( __( 'Vehicle', 'bmg-theme' ), 'text', $d['vehicle'] ),
			'services' => array( __( 'Services (· separated)', 'bmg-theme' ), 'text', $d['services'] ),
			'result'   => array( __( 'Result', 'bmg-theme' ), 'text', $d['result'] ),
			'url'      => array( __( 'Link', 'bmg-theme' ), 'url', $d['url'] ),
		);

		foreach ( $fields as $field_key => $meta ) {
			list( $label, $type, $default ) = $meta;
			$wp_customize->add_setting(
				$prefix . $field_key,
				array(
					'default'           => $default,
					'sanitize_callback' => 'url' === $type ? 'esc_url_raw' : 'sanitize_text_field',
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				$prefix . $field_key,
				array(
					/* translators: 1: project index, 2: field label */
					'label'   => sprintf( __( 'Project %1$d — %2$s', 'bmg-theme' ), $i, $label ),
					'section' => 'bmg_theme_proof',
					'type'    => $type,
				)
			);
		}

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
					/* translators: %d: project index */
					'label'   => sprintf( __( 'Project %d — Image (4:5)', 'bmg-theme' ), $i ),
					'section' => 'bmg_theme_proof',
				)
			)
		);
	}

	// ----------------------------------------------------------------------
	// Three testimonials
	// ----------------------------------------------------------------------
	$testimonial_defaults = array(
		1 => array(
			'quote'   => 'Dropped off my F-150 on a Monday, picked it up Wednesday with a spray liner that\'s held up through two winters of hauling firewood. You can tell it\'s bonded — no flex, no cracks, no trapped water.',
			'name'    => 'MIKE R.',
			'vehicle' => '2022 F-150',
			'service' => 'BEDLINER',
		),
		2 => array(
			'quote'   => 'Rhino built out my Gladiator for a 3,000-mile overland trip. Bumper, winch, lights, recovery, the whole kit. Clean wiring, no rattles, every bolt torqued. The difference between a shop build and a driveway build is obvious.',
			'name'    => 'JEN K.',
			'vehicle' => '2023 GLADIATOR',
			'service' => 'OVERLAND',
		),
		3 => array(
			'quote'   => 'We run 14 service trucks. Rhino coats every new one on intake and refreshes the old ones on a rotation we scheduled with them. Net-30 billing, one invoice per cycle, no downtime surprises.',
			'name'    => 'CARLOS D.',
			'vehicle' => 'FLEET MANAGER',
			'service' => '14 TRUCKS',
		),
	);

	foreach ( $testimonial_defaults as $i => $d ) {
		$prefix = 'bmg_testimonial_' . $i . '_';

		$fields = array(
			'quote'   => array( __( 'Quote', 'bmg-theme' ), 'textarea', $d['quote'], 'sanitize_textarea_field' ),
			'name'    => array( __( 'Name', 'bmg-theme' ), 'text', $d['name'], 'sanitize_text_field' ),
			'vehicle' => array( __( 'Vehicle / Role', 'bmg-theme' ), 'text', $d['vehicle'], 'sanitize_text_field' ),
			'service' => array( __( 'Service / Detail', 'bmg-theme' ), 'text', $d['service'], 'sanitize_text_field' ),
		);

		foreach ( $fields as $field_key => $meta ) {
			list( $label, $type, $default, $sanitize ) = $meta;
			$wp_customize->add_setting(
				$prefix . $field_key,
				array(
					'default'           => $default,
					'sanitize_callback' => $sanitize,
					'transport'         => 'postMessage',
				)
			);
			$wp_customize->add_control(
				$prefix . $field_key,
				array(
					/* translators: 1: testimonial index, 2: field label */
					'label'   => sprintf( __( 'Testimonial %1$d — %2$s', 'bmg-theme' ), $i, $label ),
					'section' => 'bmg_theme_proof',
					'type'    => $type,
				)
			);
		}
	}

	// ----------------------------------------------------------------------
	// Four stats
	// ----------------------------------------------------------------------
	$stat_defaults = array(
		1 => array( '4,200+', 'INSTALLS COMPLETED' ),
		2 => array( '12 YRS', 'IN BUSINESS' ),
		3 => array( '4.9★', 'GOOGLE RATING' ),
		4 => array( 'LIFETIME', 'COATING WARRANTY' ),
	);

	foreach ( $stat_defaults as $i => $pair ) {
		$wp_customize->add_setting(
			'bmg_stat_' . $i . '_number',
			array(
				'default'           => $pair[0],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_stat_' . $i . '_number',
			array(
				/* translators: %d: stat index */
				'label'   => sprintf( __( 'Stat %d — Number', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_proof',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'bmg_stat_' . $i . '_label',
			array(
				'default'           => $pair[1],
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_stat_' . $i . '_label',
			array(
				/* translators: %d: stat index */
				'label'   => sprintf( __( 'Stat %d — Label', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_proof',
				'type'    => 'text',
			)
		);
	}

	// ----------------------------------------------------------------------
	// Ten brand logos
	// ----------------------------------------------------------------------
	$brand_defaults = array(
		1  => 'ARB',
		2  => 'FOX',
		3  => 'WARN',
		4  => 'RIGID',
		5  => 'METHOD',
		6  => 'BFGOODRICH',
		7  => 'ROUGH COUNTRY',
		8  => 'BAJA DESIGNS',
		9  => 'SMITTYBILT',
		10 => 'RHINO-RACK',
	);

	foreach ( $brand_defaults as $i => $name ) {
		$wp_customize->add_setting(
			'bmg_brand_' . $i . '_name',
			array(
				'default'           => $name,
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control(
			'bmg_brand_' . $i . '_name',
			array(
				/* translators: %d: brand index */
				'label'   => sprintf( __( 'Brand %d — Name', 'bmg-theme' ), $i ),
				'section' => 'bmg_theme_proof',
				'type'    => 'text',
			)
		);

		$wp_customize->add_setting(
			'bmg_brand_' . $i . '_image',
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'bmg_brand_' . $i . '_image',
				array(
					/* translators: %d: brand index */
					'label'   => sprintf( __( 'Brand %d — Logo', 'bmg-theme' ), $i ),
					'section' => 'bmg_theme_proof',
				)
			)
		);
	}
}
add_action( 'customize_register', 'bmg_theme_proof_customizer' );
