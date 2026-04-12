<?php
/**
 * Quote Form Setup — Gravity Forms
 *
 * Creates the 3-step "Request a Quote" Gravity Form on first run.
 * Stores the form ID in theme_mod 'bmg_quote_form_id' so the
 * page-quote.php template can reference it.
 *
 * Safe to re-include on every request — the form is only created
 * once (checked by title match). If someone deletes the form in GF
 * admin, this will recreate it on next page load.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Strip the quotes around the required-field asterisk.
 * GF default: "* indicates required fields" → we want: * indicates required fields.
 */
add_filter( 'gform_required_legend', function ( $legend ) {
	return preg_replace( '/&quot;|"/', '', $legend );
} );

/**
 * Create the Request a Quote form if it doesn't exist.
 */
function bmg_maybe_create_quote_form() {
	// Skip if GF isn't active.
	if ( ! class_exists( 'GFAPI' ) ) {
		return;
	}

	// Skip if we already have a stored form ID that's still valid.
	$existing_id = (int) get_theme_mod( 'bmg_quote_form_id', 0 );
	if ( $existing_id > 0 ) {
		$existing = GFAPI::get_form( $existing_id );
		if ( $existing && ! is_wp_error( $existing ) ) {
			return; // form exists — nothing to do.
		}
	}

	// Check by title in case the theme_mod was lost.
	$forms = GFAPI::get_forms();
	foreach ( $forms as $form ) {
		if ( 'Request a Quote' === $form['title'] ) {
			set_theme_mod( 'bmg_quote_form_id', (int) $form['id'] );
			return;
		}
	}

	// ---- Build the form definition ----

	$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );

	$form = array(
		'title'                => 'Request a Quote',
		'description'          => '',
		'labelPlacement'       => 'top_label',
		'descriptionPlacement' => 'below',
		'subLabelPlacement'    => 'below',
		'requiredIndicator'    => 'asterisk',
		'cssClass'             => 'rhino-quote-form',

		'pagination' => array(
			'type'                                => 'steps',
			'pages'                               => array(
				__( 'Your Vehicle', 'bmg-theme' ),
				__( 'What You Want', 'bmg-theme' ),
				__( 'Your Info', 'bmg-theme' ),
			),
			'style'                               => 'custom',
			'backgroundColor'                     => '#1A1A1A',
			'color'                               => '#C41E2A',
			'display_progressbar_on_confirmation'  => false,
			'progressbar_completion_text'          => '',
		),

		'button' => array(
			'type' => 'text',
			'text' => __( 'Submit Quote Request', 'bmg-theme' ),
		),

		'fields' => array(

			// ============================================================
			// PAGE 1 — YOUR VEHICLE
			// ============================================================

			array(
				'type'               => 'number',
				'id'                 => 1,
				'label'              => __( 'Year', 'bmg-theme' ),
				'isRequired'         => true,
				'size'               => 'medium',
				'pageNumber'         => 1,
				'placeholder'        => '2022',
				'rangeMin'           => 1960,
				'rangeMax'           => (int) date( 'Y' ) + 2,
				'allowsPrepopulate'  => true,
				'inputName'          => 'vehicle_year',
			),
			array(
				'type'               => 'text',
				'id'                 => 2,
				'label'              => __( 'Make', 'bmg-theme' ),
				'isRequired'         => true,
				'size'               => 'medium',
				'pageNumber'         => 1,
				'placeholder'        => 'Ford',
				'allowsPrepopulate'  => true,
				'inputName'          => 'vehicle_make',
			),
			array(
				'type'               => 'text',
				'id'                 => 3,
				'label'              => __( 'Model', 'bmg-theme' ),
				'isRequired'         => true,
				'size'               => 'medium',
				'pageNumber'         => 1,
				'placeholder'        => 'F-150',
				'allowsPrepopulate'  => true,
				'inputName'          => 'vehicle_model',
			),
			array(
				'type'               => 'text',
				'id'                 => 4,
				'label'              => __( 'Trim', 'bmg-theme' ),
				'isRequired'         => false,
				'size'               => 'medium',
				'pageNumber'         => 1,
				'placeholder'        => 'Lariat',
				'allowsPrepopulate'  => true,
				'inputName'          => 'vehicle_trim',
			),
			array(
				'type'               => 'text',
				'id'                 => 5,
				'label'              => __( 'VIN', 'bmg-theme' ),
				'isRequired'         => false,
				'size'               => 'large',
				'pageNumber'         => 1,
				'description'        => __( 'Optional — helps us confirm exact fitment.', 'bmg-theme' ),
			),

			// Page break 1 → 2
			array(
				'type'           => 'page',
				'id'             => 6,
				'displayOnly'    => true,
				'pageNumber'     => 1,
				'nextButton'     => array( 'type' => 'text', 'text' => __( 'Next — What You Want →', 'bmg-theme' ) ),
				'previousButton' => array( 'type' => 'text', 'text' => '' ),
			),

			// ============================================================
			// PAGE 2 — WHAT YOU WANT
			// ============================================================

			array(
				'type'               => 'html',
				'id'                 => 7,
				'label'              => '',
				'pageNumber'         => 2,
				'content'            => '<div id="quote-prefill-note" class="quote-prefill-note" style="display:none;"></div>',
				'cssClass'           => 'quote-prefill-html',
			),
			array(
				'type'               => 'checkbox',
				'id'                 => 8,
				'label'              => __( 'Service Categories', 'bmg-theme' ),
				'isRequired'         => false,
				'pageNumber'         => 2,
				'description'        => __( 'Select all that apply.', 'bmg-theme' ),
				'allowsPrepopulate'  => true,
				'inputName'          => 'category',
				'choices'            => array(
					array( 'text' => __( 'Spray-On Bedliners', 'bmg-theme' ),  'value' => 'spray-on-bedliners' ),
					array( 'text' => __( 'Protective Coatings', 'bmg-theme' ), 'value' => 'protective-coatings' ),
					array( 'text' => __( 'Truck Accessories', 'bmg-theme' ),   'value' => 'truck-accessories' ),
					array( 'text' => __( 'Off-Road & Overland', 'bmg-theme' ), 'value' => 'off-road-overland' ),
					array( 'text' => __( 'Fleet Services', 'bmg-theme' ),      'value' => 'fleet' ),
					array( 'text' => __( 'Parts & Gear', 'bmg-theme' ),        'value' => 'parts-gear' ),
					array( 'text' => __( 'Other', 'bmg-theme' ),               'value' => 'other' ),
				),
				'inputs'             => array(
					array( 'id' => '8.1', 'label' => __( 'Spray-On Bedliners', 'bmg-theme' ),  'name' => '' ),
					array( 'id' => '8.2', 'label' => __( 'Protective Coatings', 'bmg-theme' ), 'name' => '' ),
					array( 'id' => '8.3', 'label' => __( 'Truck Accessories', 'bmg-theme' ),   'name' => '' ),
					array( 'id' => '8.4', 'label' => __( 'Off-Road & Overland', 'bmg-theme' ), 'name' => '' ),
					array( 'id' => '8.5', 'label' => __( 'Fleet Services', 'bmg-theme' ),      'name' => '' ),
					array( 'id' => '8.6', 'label' => __( 'Parts & Gear', 'bmg-theme' ),        'name' => '' ),
					array( 'id' => '8.7', 'label' => __( 'Other', 'bmg-theme' ),               'name' => '' ),
				),
			),
			array(
				'type'               => 'textarea',
				'id'                 => 9,
				'label'              => __( 'Tell us what you\'re looking for', 'bmg-theme' ),
				'isRequired'         => false,
				'size'               => 'medium',
				'pageNumber'         => 2,
				'placeholder'        => __( 'Describe the products, services, or build you have in mind.', 'bmg-theme' ),
				'allowsPrepopulate'  => true,
				'inputName'          => 'product',
			),
			array(
				'type'               => 'radio',
				'id'                 => 10,
				'label'              => __( 'Need installation?', 'bmg-theme' ),
				'isRequired'         => false,
				'pageNumber'         => 2,
				'choices'            => array(
					array( 'text' => __( 'Yes — install in-bay', 'bmg-theme' ), 'value' => 'yes', 'isSelected' => true ),
					array( 'text' => __( 'No — parts only', 'bmg-theme' ),      'value' => 'no' ),
					array( 'text' => __( 'Not sure yet', 'bmg-theme' ),          'value' => 'not-sure' ),
				),
			),
			array(
				'type'               => 'select',
				'id'                 => 12,
				'label'              => __( 'Budget range', 'bmg-theme' ),
				'isRequired'         => false,
				'size'               => 'medium',
				'pageNumber'         => 2,
				'placeholder'        => __( 'Select a range (optional)', 'bmg-theme' ),
				'choices'            => array(
					array( 'text' => __( 'Under $500', 'bmg-theme' ),       'value' => 'under-500' ),
					array( 'text' => __( '$500 – $1,500', 'bmg-theme' ),    'value' => '500-1500' ),
					array( 'text' => __( '$1,500 – $5,000', 'bmg-theme' ),  'value' => '1500-5000' ),
					array( 'text' => __( '$5,000 – $10,000', 'bmg-theme' ), 'value' => '5000-10000' ),
					array( 'text' => __( '$10,000+', 'bmg-theme' ),         'value' => '10000-plus' ),
					array( 'text' => __( 'Not sure', 'bmg-theme' ),         'value' => 'not-sure' ),
				),
			),

			// Page break 2 → 3
			array(
				'type'           => 'page',
				'id'             => 13,
				'displayOnly'    => true,
				'pageNumber'     => 2,
				'nextButton'     => array( 'type' => 'text', 'text' => __( 'Next — Your Info →', 'bmg-theme' ) ),
				'previousButton' => array( 'type' => 'text', 'text' => __( '← Back', 'bmg-theme' ) ),
			),

			// ============================================================
			// PAGE 3 — YOUR INFO
			// ============================================================

			array(
				'type'               => 'text',
				'id'                 => 14,
				'label'              => __( 'Name', 'bmg-theme' ),
				'isRequired'         => true,
				'size'               => 'large',
				'pageNumber'         => 3,
				'placeholder'        => __( 'Your full name', 'bmg-theme' ),
			),
			array(
				'type'               => 'phone',
				'id'                 => 15,
				'label'              => __( 'Phone', 'bmg-theme' ),
				'isRequired'         => true,
				'size'               => 'medium',
				'pageNumber'         => 3,
				'phoneFormat'        => 'standard',
				'placeholder'        => '(555) 555-0123',
			),
			array(
				'type'               => 'email',
				'id'                 => 16,
				'label'              => __( 'Email', 'bmg-theme' ),
				'isRequired'         => true,
				'size'               => 'large',
				'pageNumber'         => 3,
				'placeholder'        => 'you@example.com',
			),
			array(
				'type'               => 'radio',
				'id'                 => 17,
				'label'              => __( 'Preferred contact method', 'bmg-theme' ),
				'isRequired'         => false,
				'pageNumber'         => 3,
				'choices'            => array(
					array( 'text' => __( 'Phone', 'bmg-theme' ),  'value' => 'phone', 'isSelected' => true ),
					array( 'text' => __( 'Email', 'bmg-theme' ),  'value' => 'email' ),
					array( 'text' => __( 'Text', 'bmg-theme' ),   'value' => 'text' ),
				),
			),
			array(
				'type'               => 'select',
				'id'                 => 18,
				'label'              => __( 'Preferred drop-off window', 'bmg-theme' ),
				'isRequired'         => false,
				'size'               => 'medium',
				'pageNumber'         => 3,
				'placeholder'        => __( 'Select a window (optional)', 'bmg-theme' ),
				'choices'            => array(
					array( 'text' => __( 'This week', 'bmg-theme' ),        'value' => 'this-week' ),
					array( 'text' => __( 'Next week', 'bmg-theme' ),        'value' => 'next-week' ),
					array( 'text' => __( 'Within a month', 'bmg-theme' ),   'value' => 'within-month' ),
					array( 'text' => __( 'Flexible', 'bmg-theme' ),         'value' => 'flexible' ),
				),
			),
			array(
				'type'               => 'textarea',
				'id'                 => 19,
				'label'              => __( 'Anything else?', 'bmg-theme' ),
				'isRequired'         => false,
				'size'               => 'medium',
				'pageNumber'         => 3,
				'placeholder'        => __( 'Timeline, special requests, questions — anything you want us to know.', 'bmg-theme' ),
			),
		),

		'confirmations' => array(
			array(
				'id'        => '0',
				'name'      => 'Default Confirmation',
				'isDefault' => true,
				'type'      => 'message',
				'message'   => '<div class="quote-confirmation">'
					. '<h2 class="quote-confirmation__headline">' . esc_html__( 'QUOTE REQUEST RECEIVED.', 'bmg-theme' ) . '</h2>'
					. '<p class="quote-confirmation__subline">' . esc_html__( 'Here\'s what happens next.', 'bmg-theme' ) . '</p>'
					. '<ol class="quote-confirmation__steps">'
					. '<li><strong>' . esc_html__( 'Review.', 'bmg-theme' ) . '</strong> ' . esc_html__( 'We review your request within one business day.', 'bmg-theme' ) . '</li>'
					. '<li><strong>' . esc_html__( 'Quote.', 'bmg-theme' ) . '</strong> ' . esc_html__( 'A builder calls or emails with a detailed written quote.', 'bmg-theme' ) . '</li>'
					. '<li><strong>' . esc_html__( 'Schedule.', 'bmg-theme' ) . '</strong> ' . esc_html__( 'Schedule your install — free reschedule up to 24 hours before.', 'bmg-theme' ) . '</li>'
					. '</ol>'
					. '<div class="quote-confirmation__phone">'
					. '<p>' . esc_html__( 'Want to talk now?', 'bmg-theme' ) . '</p>'
					. '<a href="tel:' . esc_attr( preg_replace( '/[^0-9+]/', '', $phone_display ) ) . '" class="btn-rhino btn-rhino--phone">'
					. '<span>' . esc_html( sprintf( __( 'Call %s', 'bmg-theme' ), $phone_display ) ) . '</span>'
					. '</a>'
					. '</div>'
					. '<a href="' . esc_url( home_url( '/' ) ) . '" class="quote-confirmation__home">' . esc_html__( '← Back to Homepage', 'bmg-theme' ) . '</a>'
					. '</div>',
			),
		),

		'notifications' => array(
			array(
				'id'       => '0',
				'isActive' => true,
				'name'     => 'Admin Notification',
				'event'    => 'form_submission',
				'toType'   => 'email',
				'to'       => 'info@rhinocustombuilds.com',
				'from'     => '{admin_email}',
				'subject'  => 'New Quote Request — {Name:14} — {Make:2} {Model:3}',
				'message'  => '{all_fields}',
			),
		),
	);

	$result = GFAPI::add_form( $form );

	if ( is_wp_error( $result ) ) {
		error_log( 'Rhino: Failed to create quote form — ' . $result->get_error_message() );
		return;
	}

	// Store the form ID so the template can use it.
	set_theme_mod( 'bmg_quote_form_id', (int) $result );
}
add_action( 'init', 'bmg_maybe_create_quote_form' );

// =====================================================================
// Contact Form
// =====================================================================

/**
 * Create the Contact form if it doesn't exist.
 */
function bmg_maybe_create_contact_form() {
	if ( ! class_exists( 'GFAPI' ) ) {
		return;
	}

	$existing_id = (int) get_theme_mod( 'bmg_gf_contact_form_id', 0 );
	if ( $existing_id > 0 ) {
		$existing = GFAPI::get_form( $existing_id );
		if ( $existing && ! is_wp_error( $existing ) ) {
			return;
		}
	}

	$forms = GFAPI::get_forms();
	foreach ( $forms as $form ) {
		if ( 'Contact' === $form['title'] ) {
			set_theme_mod( 'bmg_gf_contact_form_id', (int) $form['id'] );
			return;
		}
	}

	$form = array(
		'title'                => 'Contact',
		'description'          => '',
		'labelPlacement'       => 'top_label',
		'descriptionPlacement' => 'below',
		'subLabelPlacement'    => 'below',
		'requiredIndicator'    => 'asterisk',
		'cssClass'             => 'rhino-contact-form',

		'button' => array(
			'type' => 'text',
			'text' => __( 'Send Message', 'bmg-theme' ),
		),

		'fields' => array(
			array(
				'type'       => 'text',
				'id'         => 1,
				'label'      => __( 'Name', 'bmg-theme' ),
				'isRequired' => true,
				'size'       => 'large',
				'pageNumber' => 1,
				'placeholder' => __( 'Your full name', 'bmg-theme' ),
			),
			array(
				'type'       => 'email',
				'id'         => 2,
				'label'      => __( 'Email', 'bmg-theme' ),
				'isRequired' => true,
				'size'       => 'medium',
				'pageNumber' => 1,
				'placeholder' => 'you@example.com',
			),
			array(
				'type'        => 'phone',
				'id'          => 3,
				'label'       => __( 'Phone', 'bmg-theme' ),
				'isRequired'  => true,
				'size'        => 'medium',
				'pageNumber'  => 1,
				'phoneFormat' => 'standard',
				'placeholder' => '(555) 555-0123',
			),
			array(
				'type'       => 'text',
				'id'         => 4,
				'label'      => __( 'Vehicle', 'bmg-theme' ),
				'isRequired' => false,
				'size'       => 'large',
				'pageNumber' => 1,
				'placeholder' => '2022 Ford F-150',
				'description' => __( 'Optional — Year, Make, Model helps us prepare.', 'bmg-theme' ),
			),
			array(
				'type'       => 'textarea',
				'id'         => 5,
				'label'      => __( 'Message', 'bmg-theme' ),
				'isRequired' => true,
				'size'       => 'medium',
				'pageNumber' => 1,
				'placeholder' => __( 'Tell us about your project, question, or what you need.', 'bmg-theme' ),
			),
		),

		'confirmations' => array(
			array(
				'id'        => '0',
				'name'      => 'Default Confirmation',
				'isDefault' => true,
				'type'      => 'message',
				'message'   => '<div class="contact-confirmation">'
					. '<h3 class="contact-confirmation__headline">'
					. esc_html__( 'MESSAGE SENT.', 'bmg-theme' )
					. '</h3>'
					. '<p class="contact-confirmation__body">'
					. esc_html__( 'A builder reviews every message within one business day. If your project is urgent, call us directly.', 'bmg-theme' )
					. '</p>'
					. '</div>',
			),
		),

		'notifications' => array(
			array(
				'id'       => '0',
				'isActive' => true,
				'name'     => 'Admin Notification',
				'event'    => 'form_submission',
				'toType'   => 'email',
				'to'       => 'info@rhinocustombuilds.com',
				'from'     => '{admin_email}',
				'subject'  => 'New Contact — {Name:1}',
				'message'  => '{all_fields}',
			),
		),
	);

	$result = GFAPI::add_form( $form );

	if ( is_wp_error( $result ) ) {
		error_log( 'Rhino: Failed to create contact form — ' . $result->get_error_message() );
		return;
	}

	set_theme_mod( 'bmg_gf_contact_form_id', (int) $result );
}
add_action( 'init', 'bmg_maybe_create_contact_form' );
