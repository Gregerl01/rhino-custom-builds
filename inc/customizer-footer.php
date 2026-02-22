<?php
/**
 * Footer Customizer Settings
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Footer Menu Locations
 */
function bmg_theme_register_footer_menus() {
	register_nav_menus(
		array(
			'footer-navigation' => __( 'Footer - Navigation', 'bmg-theme' ),
			'footer-legal'      => __( 'Footer - Legal', 'bmg-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'bmg_theme_register_footer_menus' );

/**
 * Register Footer Customizer Settings
 */
function bmg_theme_footer_customizer( $wp_customize ) {

	// Footer Panel.
	$wp_customize->add_panel(
		'bmg_theme_footer_panel',
		array(
			'title'       => __( 'Footer Options', 'bmg-theme' ),
			'description' => __( 'Customize the footer content.', 'bmg-theme' ),
			'priority'    => 130,
		)
	);

	// ==========================================================================
	// Practice Info Section
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_footer_practice',
		array(
			'title' => __( 'Practice Information', 'bmg-theme' ),
			'panel' => 'bmg_theme_footer_panel',
		)
	);

	// Practice Name.
	$wp_customize->add_setting(
		'footer_practice_name',
		array(
			'default'           => __( 'Baig Medical Group', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_practice_name',
		array(
			'label'   => __( 'Practice Name', 'bmg-theme' ),
			'section' => 'bmg_theme_footer_practice',
			'type'    => 'text',
		)
	);

	// Phone Number.
	$wp_customize->add_setting(
		'footer_phone',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_phone',
		array(
			'label'       => __( 'Phone Number', 'bmg-theme' ),
			'description' => __( 'Display format: (555) 123-4567', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_practice',
			'type'        => 'text',
		)
	);

	// Email Address.
	$wp_customize->add_setting(
		'footer_email',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_email',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_email',
		array(
			'label'   => __( 'Email Address', 'bmg-theme' ),
			'section' => 'bmg_theme_footer_practice',
			'type'    => 'email',
		)
	);

	// Physical Address.
	$wp_customize->add_setting(
		'footer_address',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_address',
		array(
			'label'       => __( 'Physical Address', 'bmg-theme' ),
			'description' => __( 'Full mailing address.', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_practice',
			'type'        => 'textarea',
		)
	);

	// ==========================================================================
	// Hours Section
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_footer_hours',
		array(
			'title' => __( 'Hours of Operation', 'bmg-theme' ),
			'panel' => 'bmg_theme_footer_panel',
		)
	);

	// Show Hours.
	$wp_customize->add_setting(
		'footer_hours_show',
		array(
			'default'           => true,
			'sanitize_callback' => 'bmg_theme_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'footer_hours_show',
		array(
			'label'   => __( 'Show Hours of Operation', 'bmg-theme' ),
			'section' => 'bmg_theme_footer_hours',
			'type'    => 'checkbox',
		)
	);

	// Hours Text.
	$wp_customize->add_setting(
		'footer_hours',
		array(
			'default'           => __( "Monday - Friday: 9:00 AM - 5:00 PM\nSaturday: By Appointment\nSunday: Closed", 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_hours',
		array(
			'label'       => __( 'Hours', 'bmg-theme' ),
			'description' => __( 'Enter each day on a new line.', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_hours',
			'type'        => 'textarea',
		)
	);

	// ==========================================================================
	// Copyright Section
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_footer_copyright',
		array(
			'title' => __( 'Copyright', 'bmg-theme' ),
			'panel' => 'bmg_theme_footer_panel',
		)
	);

	// Copyright Text.
	$wp_customize->add_setting(
		'footer_copyright_text',
		array(
			'default'           => __( '{year} {site}. All rights reserved.', 'bmg-theme' ),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_copyright_text',
		array(
			'label'       => __( 'Copyright Text', 'bmg-theme' ),
			'description' => __( 'Use {year} for current year, {site} for site name.', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_copyright',
			'type'        => 'textarea',
		)
	);

	// Show Privacy Link.
	$wp_customize->add_setting(
		'footer_show_privacy',
		array(
			'default'           => true,
			'sanitize_callback' => 'bmg_theme_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'footer_show_privacy',
		array(
			'label'       => __( 'Show Privacy Policy Link', 'bmg-theme' ),
			'description' => __( 'Displays if a Privacy Policy page is set in Settings → Privacy.', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_copyright',
			'type'        => 'checkbox',
		)
	);

	// HIPAA Notice Page.
	$wp_customize->add_setting(
		'footer_hipaa_page',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'footer_hipaa_page',
		array(
			'label'   => __( 'HIPAA Notice Page', 'bmg-theme' ),
			'section' => 'bmg_theme_footer_copyright',
			'type'    => 'dropdown-pages',
		)
	);

	// Terms Page.
	$wp_customize->add_setting(
		'footer_terms_page',
		array(
			'default'           => 0,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'footer_terms_page',
		array(
			'label'   => __( 'Terms of Service Page', 'bmg-theme' ),
			'section' => 'bmg_theme_footer_copyright',
			'type'    => 'dropdown-pages',
		)
	);

	// ==========================================================================
	// Footer Columns Section
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_footer_columns',
		array(
			'title'       => __( 'Footer Menu Columns', 'bmg-theme' ),
			'description' => __( 'Configure footer menu column titles. Manage links via Appearance → Menus.', 'bmg-theme' ),
			'panel'       => 'bmg_theme_footer_panel',
		)
	);

	// Navigation Column Title.
	$wp_customize->add_setting(
		'footer_nav_title',
		array(
			'default'           => __( 'Quick Links', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_nav_title',
		array(
			'label'       => __( 'Navigation Column Title', 'bmg-theme' ),
			'description' => __( 'Menu location: Footer - Navigation', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_columns',
			'type'        => 'text',
		)
	);

	// Legal Column Title.
	$wp_customize->add_setting(
		'footer_legal_title',
		array(
			'default'           => __( 'Legal', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'footer_legal_title',
		array(
			'label'       => __( 'Legal Column Title', 'bmg-theme' ),
			'description' => __( 'Menu location: Footer - Legal', 'bmg-theme' ),
			'section'     => 'bmg_theme_footer_columns',
			'type'        => 'text',
		)
	);
}
add_action( 'customize_register', 'bmg_theme_footer_customizer' );

/**
 * Sanitize checkbox values
 */
if ( ! function_exists( 'bmg_theme_sanitize_checkbox' ) ) {
	function bmg_theme_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
}

/**
 * Get footer copyright text with replacements
 */
function bmg_theme_get_copyright_text() {
	$text = get_theme_mod( 'footer_copyright_text', __( '{year} {site}. All rights reserved.', 'bmg-theme' ) );

	// Replace placeholders.
	$text = str_replace( '{year}', date( 'Y' ), $text );
	$text = str_replace( '{site}', get_bloginfo( 'name' ), $text );

	return $text;
}

/**
 * Custom walker for footer menus - simpler output
 */
class BMG_Theme_Footer_Menu_Walker extends Walker_Nav_Menu {
	public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$output .= '<li>';
		$output .= '<a href="' . esc_url( $item->url ) . '">';
		$output .= esc_html( $item->title );
		$output .= '</a>';
	}

	public function end_el( &$output, $item, $depth = 0, $args = null ) {
		$output .= '</li>';
	}
}
