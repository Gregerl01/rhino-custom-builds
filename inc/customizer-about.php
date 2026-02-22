<?php
/**
 * Philosophy & Physician Customizer Settings
 *
 * Used for the philosophy section on the homepage and physician profile.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Philosophy/About Customizer Settings
 */
function bmg_theme_about_customizer( $wp_customize ) {

	// Philosophy Panel.
	$wp_customize->add_panel(
		'bmg_theme_about_panel',
		array(
			'title'       => __( 'Philosophy & Physician', 'bmg-theme' ),
			'description' => __( 'Customize practice philosophy and physician information.', 'bmg-theme' ),
			'priority'    => 122,
		)
	);

	// ==========================================================================
	// Philosophy Section (Homepage)
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_philosophy',
		array(
			'title'       => __( 'Philosophy Section', 'bmg-theme' ),
			'description' => __( 'Content for the homepage philosophy introduction.', 'bmg-theme' ),
			'panel'       => 'bmg_theme_about_panel',
		)
	);

	// Philosophy Paragraph 1.
	$wp_customize->add_setting(
		'philosophy_paragraph_1',
		array(
			'default'           => __( 'We believe exceptional healthcare begins with time. Time to listen, time to understand, and time to develop a care plan tailored to your life.', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'philosophy_paragraph_1',
		array(
			'label'   => __( 'Opening Paragraph', 'bmg-theme' ),
			'section' => 'bmg_theme_philosophy',
			'type'    => 'textarea',
		)
	);

	// Philosophy Paragraph 2.
	$wp_customize->add_setting(
		'philosophy_paragraph_2',
		array(
			'default'           => __( 'Baig Medical Group offers concierge primary care that prioritizes the physician-patient relationship above all else. Fewer patients means more attention for you.', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'philosophy_paragraph_2',
		array(
			'label'   => __( 'Supporting Paragraph', 'bmg-theme' ),
			'section' => 'bmg_theme_philosophy',
			'type'    => 'textarea',
		)
	);

	// Show Link to About Page.
	$wp_customize->add_setting(
		'philosophy_show_link',
		array(
			'default'           => true,
			'sanitize_callback' => 'bmg_theme_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'philosophy_show_link',
		array(
			'label'   => __( 'Show "Learn More" Link', 'bmg-theme' ),
			'section' => 'bmg_theme_philosophy',
			'type'    => 'checkbox',
		)
	);

	// Link Text.
	$wp_customize->add_setting(
		'philosophy_link_text',
		array(
			'default'           => __( 'Learn about our approach', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'philosophy_link_text',
		array(
			'label'   => __( 'Link Text', 'bmg-theme' ),
			'section' => 'bmg_theme_philosophy',
			'type'    => 'text',
		)
	);

	// Link URL.
	$wp_customize->add_setting(
		'philosophy_link_url',
		array(
			'default'           => '/about/',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'philosophy_link_url',
		array(
			'label'   => __( 'Link URL', 'bmg-theme' ),
			'section' => 'bmg_theme_philosophy',
			'type'    => 'url',
		)
	);

	// ==========================================================================
	// Physician Profile Section
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_physician',
		array(
			'title'       => __( 'Physician Profile', 'bmg-theme' ),
			'description' => __( 'Physician information for the About page.', 'bmg-theme' ),
			'panel'       => 'bmg_theme_about_panel',
		)
	);

	// Physician Name.
	$wp_customize->add_setting(
		'physician_name',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'physician_name',
		array(
			'label'       => __( 'Physician Name', 'bmg-theme' ),
			'description' => __( 'e.g., Dr. John Smith, MD', 'bmg-theme' ),
			'section'     => 'bmg_theme_physician',
			'type'        => 'text',
		)
	);

	// Physician Title/Credentials.
	$wp_customize->add_setting(
		'physician_credentials',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'physician_credentials',
		array(
			'label'       => __( 'Credentials', 'bmg-theme' ),
			'description' => __( 'e.g., Board Certified Internal Medicine', 'bmg-theme' ),
			'section'     => 'bmg_theme_physician',
			'type'        => 'text',
		)
	);

	// Physician Bio.
	$wp_customize->add_setting(
		'physician_bio',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'physician_bio',
		array(
			'label'   => __( 'Biography', 'bmg-theme' ),
			'section' => 'bmg_theme_physician',
			'type'    => 'textarea',
		)
	);

	// Physician Photo.
	$wp_customize->add_setting(
		'physician_photo',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'physician_photo',
			array(
				'label'   => __( 'Physician Photo', 'bmg-theme' ),
				'section' => 'bmg_theme_physician',
			)
		)
	);

	// ==========================================================================
	// Credentials Section (Homepage)
	// ==========================================================================
	$wp_customize->add_section(
		'bmg_theme_credentials',
		array(
			'title'       => __( 'Credentials Section', 'bmg-theme' ),
			'description' => __( 'Professional affiliations shown on the homepage.', 'bmg-theme' ),
			'panel'       => 'bmg_theme_about_panel',
		)
	);

	// Credentials List.
	$wp_customize->add_setting(
		'credentials_list',
		array(
			'default'           => "Board Certified in Internal Medicine\nMember, American College of Physicians\nFellow, American Academy of Family Physicians\nConcierge Medicine Today Top Doctor",
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'credentials_list',
		array(
			'label'       => __( 'Credentials & Affiliations', 'bmg-theme' ),
			'description' => __( 'Enter each credential on a new line.', 'bmg-theme' ),
			'section'     => 'bmg_theme_credentials',
			'type'        => 'textarea',
		)
	);

	// Section Heading.
	$wp_customize->add_setting(
		'credentials_heading',
		array(
			'default'           => __( 'Credentials & Affiliations', 'bmg-theme' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'credentials_heading',
		array(
			'label'   => __( 'Section Heading', 'bmg-theme' ),
			'section' => 'bmg_theme_credentials',
			'type'    => 'text',
		)
	);
}
add_action( 'customize_register', 'bmg_theme_about_customizer' );

/**
 * Sanitize checkbox values
 */
if ( ! function_exists( 'bmg_theme_sanitize_checkbox' ) ) {
	function bmg_theme_sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}
}
