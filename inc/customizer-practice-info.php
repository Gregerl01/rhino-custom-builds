<?php
/**
 * Practice Information Customizer Settings
 *
 * Centralizes all reusable practice data (physician, contact, hours)
 * so templates pull values via get_theme_mod() instead of hardcoding.
 * See CONTENT.md "Dynamic Variables" section for the full reference.
 *
 * @package BMG_Theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Practice Information Customizer Settings
 */
function bmg_practice_info_customizer( $wp_customize ) {

	// ======================================================================
	// Panel: Practice Information
	// ======================================================================

	$wp_customize->add_panel(
		'bmg_practice_info',
		array(
			'title'       => __( 'Practice Information', 'bmg-theme' ),
			'description' => __( 'Physician details, contact information, and office hours used across the site.', 'bmg-theme' ),
			'priority'    => 110,
		)
	);

	// ======================================================================
	// Section: Physician
	// ======================================================================

	$wp_customize->add_section(
		'bmg_section_physician',
		array(
			'title' => __( 'Physician', 'bmg-theme' ),
			'panel' => 'bmg_practice_info',
		)
	);

	// Physician Name.
	$wp_customize->add_setting(
		'bmg_physician_name',
		array(
			'default'           => 'Dr. Adil Baig',
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

	// Physician Last Name.
	$wp_customize->add_setting(
		'bmg_physician_last_name',
		array(
			'default'           => 'Baig',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_last_name',
		array(
			'label'       => __( 'Last Name', 'bmg-theme' ),
			'description' => __( 'Used in shorthand references (e.g. "Dr. Baig").', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'text',
		)
	);

	// Credentials.
	$wp_customize->add_setting(
		'bmg_physician_credentials',
		array(
			'default'           => 'Board-Certified Family Medicine Physician',
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
			'default'           => 'Family Medicine',
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

	// Medical School.
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
			'label'       => __( 'Medical School', 'bmg-theme' ),
			'description' => __( 'Displayed in credentials sidebar.', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'text',
		)
	);

	// Residency.
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
			'label'   => __( 'Residency', 'bmg-theme' ),
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

	// Board Certification.
	$wp_customize->add_setting(
		'bmg_physician_board_cert',
		array(
			'default'           => 'American Board of Family Medicine',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_physician_board_cert',
		array(
			'label'   => __( 'Board Certification', 'bmg-theme' ),
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

	// Short Bio (Physician Preview — homepage).
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
			'label'       => __( 'Short Bio (Homepage Preview)', 'bmg-theme' ),
			'description' => __( 'If empty, the template uses its built-in copy.', 'bmg-theme' ),
			'section'     => 'bmg_section_physician',
			'type'        => 'textarea',
		)
	);

	// Full Bio (About page).
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
			'default'           => 'info@baigmedicalgroup.com',
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
			'default'           => 'Yuma, AZ [ZIP]',
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
	// Section: Hours
	// ======================================================================

	$wp_customize->add_section(
		'bmg_section_hours',
		array(
			'title' => __( 'Office Hours', 'bmg-theme' ),
			'panel' => 'bmg_practice_info',
		)
	);

	// Weekday Hours.
	$wp_customize->add_setting(
		'bmg_office_hours',
		array(
			'default'           => 'Monday – Friday: 8:00 AM – 5:00 PM',
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

	// Saturday Hours.
	$wp_customize->add_setting(
		'bmg_office_hours_sat',
		array(
			'default'           => 'By appointment',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_office_hours_sat',
		array(
			'label'   => __( 'Saturday Hours', 'bmg-theme' ),
			'section' => 'bmg_section_hours',
			'type'    => 'text',
		)
	);

	// Sunday Hours.
	$wp_customize->add_setting(
		'bmg_office_hours_sun',
		array(
			'default'           => 'Closed',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'bmg_office_hours_sun',
		array(
			'label'   => __( 'Sunday Hours', 'bmg-theme' ),
			'section' => 'bmg_section_hours',
			'type'    => 'text',
		)
	);
}
add_action( 'customize_register', 'bmg_practice_info_customizer' );
