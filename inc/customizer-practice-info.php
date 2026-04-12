<?php
/**
 * Business Information Customizer Settings
 *
 * Centralizes all reusable business data (provider, contact, hours)
 * so templates pull values via get_theme_mod() instead of hardcoding.
 * See CONTENT.md "Dynamic Variables" section for the full reference.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Business Information Customizer Settings
 */
function bmg_practice_info_customizer( $wp_customize ) {

	// ======================================================================
	// Panel: Business Information
	// ======================================================================

	$wp_customize->add_panel(
		'bmg_practice_info',
		array(
			'title'       => __( 'Business Information', 'bmg-theme' ),
			'description' => __( 'Provider details, contact information, and business hours used across the site.', 'bmg-theme' ),
			'priority'    => 110,
		)
	);

	// ======================================================================
	// Section: Provider
	// ======================================================================

	$wp_customize->add_section(
		'bmg_section_physician',
		array(
			'title' => __( 'Provider', 'bmg-theme' ),
			'panel' => 'bmg_practice_info',
		)
	);

	// Provider Name.
	$wp_customize->add_setting(
		'bmg_physician_name',
		array(
			'default'           => '[Provider Name]',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_name',
		array(
			'label'   => __( 'Full Name', 'bmg-theme' ),
			'section' => 'bmg_section_physician',
			'type'    => 'text',
		)
	);

	// Provider Last Name.
	$wp_customize->add_setting(
		'bmg_physician_last_name',
		array(
			'default'           => '[Last Name]',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_last_name',
		array(
			'label'       => __( 'Last Name', 'bmg-theme' ),
			'description' => __( 'Used in shorthand references (e.g. "Dr. [Last Name]").', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'text',
		)
	);

	// Credentials.
	$wp_customize->add_setting(
		'bmg_physician_credentials',
		array(
			'default'           => '[Credentials]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_credentials',
		array(
			'label'   => __( 'Credentials', 'bmg-theme' ),
			'section' => 'bmg_section_physician',
			'type'    => 'text',
		)
	);

	// Specialty.
	$wp_customize->add_setting(
		'bmg_physician_specialty',
		array(
			'default'           => '[Specialty]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_specialty',
		array(
			'label'   => __( 'Specialty', 'bmg-theme' ),
			'section' => 'bmg_section_physician',
			'type'    => 'text',
		)
	);

	// Years of Experience.
	$wp_customize->add_setting(
		'bmg_physician_years',
		array(
			'default'           => '10',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_years',
		array(
			'label'   => __( 'Years of Experience', 'bmg-theme' ),
			'section' => 'bmg_section_physician',
			'type'    => 'text',
		)
	);

	// Education 1.
	$wp_customize->add_setting(
		'bmg_physician_med_school',
		array(
			'default'           => '[Medical School]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_med_school',
		array(
			'label'       => __( 'Education / Training 1', 'bmg-theme' ),
			'description' => __( 'Displayed in credentials sidebar (e.g. medical school, degree program).', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'text',
		)
	);

	// Education 2.
	$wp_customize->add_setting(
		'bmg_physician_residency',
		array(
			'default'           => '[Residency Program]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_residency',
		array(
			'label'   => __( 'Education / Training 2', 'bmg-theme' ),
			'section' => 'bmg_section_physician',
			'type'    => 'text',
		)
	);

	// Fellowship (optional — hidden if empty).
	$wp_customize->add_setting(
		'bmg_physician_fellowship',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_fellowship',
		array(
			'label'       => __( 'Fellowship (optional)', 'bmg-theme' ),
			'description' => __( 'Leave empty to hide from credentials sidebar.', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'text',
		)
	);

	// Certification.
	$wp_customize->add_setting(
		'bmg_physician_board_cert',
		array(
			'default'           => '[Certification]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_board_cert',
		array(
			'label'   => __( 'Certification', 'bmg-theme' ),
			'section' => 'bmg_section_physician',
			'type'    => 'text',
		)
	);

	// Professional Memberships.
	$wp_customize->add_setting(
		'bmg_physician_memberships',
		array(
			'default'           => '[Professional Organizations]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_memberships',
		array(
			'label'       => __( 'Professional Memberships', 'bmg-theme' ),
			'description' => __( 'Comma-separated list of organizations.', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'text',
		)
	);

	// Portrait Photo (Homepage Provider Preview).
	$wp_customize->add_setting(
		'bmg_physician_photo_portrait',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bmg_physician_photo_portrait',
			array(
				'label'       => __( 'Portrait Photo (Homepage)', 'bmg-theme' ),
				'description' => __( 'Displayed in the homepage Provider Preview section. Recommended: 600×800px, vertical crop.', 'bmg-theme' ),
				'section'     => 'bmg_section_physician',
			)
		)
	);

	// Full Photo (About Page Provider Bio).
	$wp_customize->add_setting(
		'bmg_physician_photo_full',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bmg_physician_photo_full',
			array(
				'label'       => __( 'Full Photo (About Page)', 'bmg-theme' ),
				'description' => __( 'Displayed in the About page Provider Bio section. Recommended: 800×1000px, vertical crop.', 'bmg-theme' ),
				'section'     => 'bmg_section_physician',
			)
		)
	);

	// Short Bio (Provider Preview — homepage).
	$wp_customize->add_setting(
		'bmg_physician_bio_short',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_bio_short',
		array(
			'label'       => __( 'Short Bio (Homepage)', 'bmg-theme' ),
			'description' => __( 'If empty, the template uses its built-in copy.', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'textarea',
		)
	);

	// Full Bio (About Page).
	$wp_customize->add_setting(
		'bmg_physician_bio_full',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_bio_full',
		array(
			'label'       => __( 'Full Bio (About Page)', 'bmg-theme' ),
			'description' => __( 'If empty, the template uses its built-in copy.', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'textarea',
		)
	);

	// ======================================================================
	// Section: Site Images
	// ======================================================================

	$wp_customize->add_section(
		'bmg_section_site_images',
		array(
			'title' => __( 'Site Images', 'bmg-theme' ),
			'panel' => 'bmg_practice_info',
		)
	);

	// CTA Background Image.
	$wp_customize->add_setting(
		'bmg_cta_background',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'bmg_cta_background',
			array(
				'label'       => __( 'CTA Background Image', 'bmg-theme' ),
				'description' => __( 'Photo used as parallax background in the CTA section. Recommended: 1920×1080px, landscape.', 'bmg-theme' ),
				'section'     => 'bmg_section_site_images',
			)
		)
	);

	// ======================================================================
	// Section: Contact
	// ======================================================================

	$wp_customize->add_section(
		'bmg_section_contact',
		array(
			'title' => __( 'Contact', 'bmg-theme' ),
			'panel' => 'bmg_practice_info',
		)
	);

	// Phone.
	$wp_customize->add_setting(
		'bmg_phone',
		array(
			'default'           => '(000) 000-0000',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'bmg_phone',
		array(
			'label'   => __( 'Phone Number', 'bmg-theme' ),
			'section' => 'bmg_section_contact',
			'type'    => 'tel',
		)
	);

	// Email.
	$wp_customize->add_setting(
		'bmg_email',
		array(
			'default'           => 'info@example.com',
			'sanitize_callback' => 'sanitize_email',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'bmg_email',
		array(
			'label'   => __( 'Email Address', 'bmg-theme' ),
			'section' => 'bmg_section_contact',
			'type'    => 'email',
		)
	);

	// Street Address.
	$wp_customize->add_setting(
		'bmg_address_street',
		array(
			'default'           => '[Street Address]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_address_street',
		array(
			'label'   => __( 'Street Address', 'bmg-theme' ),
			'section' => 'bmg_section_contact',
			'type'    => 'text',
		)
	);

	// City / State / ZIP.
	$wp_customize->add_setting(
		'bmg_address_city',
		array(
			'default'           => '[City, State ZIP]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_address_city',
		array(
			'label'   => __( 'City, State ZIP', 'bmg-theme' ),
			'section' => 'bmg_section_contact',
			'type'    => 'text',
		)
	);

	// Privacy Policy Effective Date.
	$wp_customize->add_setting(
		'bmg_privacy_effective_date',
		array(
			'default'           => '[Effective Date]',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_privacy_effective_date',
		array(
			'label'       => __( 'Privacy Policy Effective Date', 'bmg-theme' ),
			'description' => __( 'Displayed at the top of the Privacy Policy page.', 'bmg-theme' ),
			'section'     => 'bmg_section_contact',
			'type'        => 'text',
		)
	);

	// ======================================================================
	// Section: Business Hours
	// ======================================================================

	$wp_customize->add_section(
		'bmg_section_hours',
		array(
			'title' => __( 'Business Hours', 'bmg-theme' ),
			'panel' => 'bmg_practice_info',
		)
	);

	// Weekday Hours.
	$wp_customize->add_setting(
		'bmg_office_hours',
		array(
			'default'           => 'Mon–Fri: 8:00 AM – 5:00 PM PST',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_office_hours',
		array(
			'label'   => __( 'Weekday Hours', 'bmg-theme' ),
			'section' => 'bmg_section_hours',
			'type'    => 'text',
		)
	);

	// Weekend Hours.
	$wp_customize->add_setting(
		'bmg_office_hours_sun',
		array(
			'default'           => 'Weekends: Closed',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_office_hours_sun',
		array(
			'label'   => __( 'Weekend Hours', 'bmg-theme' ),
			'section' => 'bmg_section_hours',
			'type'    => 'text',
		)
	);
}
add_action( 'customize_register', 'bmg_practice_info_customizer' );
