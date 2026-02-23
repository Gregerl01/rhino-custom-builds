<?php
/**
 * Custom Post Types for Homepage Sections
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Custom Post Types
 */
function bmg_theme_register_post_types() {

	// Services CPT.
	register_post_type(
		'service',
		array(
			'labels'              => array(
				'name'                  => _x( 'Services', 'Post type general name', 'bmg-theme' ),
				'singular_name'         => _x( 'Service', 'Post type singular name', 'bmg-theme' ),
				'menu_name'             => _x( 'Services', 'Admin Menu text', 'bmg-theme' ),
				'add_new'               => __( 'Add New', 'bmg-theme' ),
				'add_new_item'          => __( 'Add New Service', 'bmg-theme' ),
				'edit_item'             => __( 'Edit Service', 'bmg-theme' ),
				'new_item'              => __( 'New Service', 'bmg-theme' ),
				'view_item'             => __( 'View Service', 'bmg-theme' ),
				'search_items'          => __( 'Search Services', 'bmg-theme' ),
				'not_found'             => __( 'No services found', 'bmg-theme' ),
				'not_found_in_trash'    => __( 'No services found in Trash', 'bmg-theme' ),
				'all_items'             => __( 'All Services', 'bmg-theme' ),
				'featured_image'        => __( 'Service Icon', 'bmg-theme' ),
				'set_featured_image'    => __( 'Set service icon', 'bmg-theme' ),
				'remove_featured_image' => __( 'Remove service icon', 'bmg-theme' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-grid-view',
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
			'has_archive'         => false,
			'rewrite'             => false,
			'show_in_rest'        => true,
		)
	);
}
add_action( 'init', 'bmg_theme_register_post_types' );

/**
 * Register Meta Boxes
 */
function bmg_theme_register_meta_boxes() {
	// Service meta box.
	add_meta_box(
		'service_details',
		__( 'Service Details', 'bmg-theme' ),
		'bmg_theme_service_meta_box_callback',
		'service',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'bmg_theme_register_meta_boxes' );

/**
 * Service Meta Box Callback
 */
function bmg_theme_service_meta_box_callback( $post ) {
	wp_nonce_field( 'bmg_theme_service_meta', 'bmg_theme_service_nonce' );

	$icon_type    = get_post_meta( $post->ID, '_service_icon_type', true ) ?: 'preset';
	$icon_preset  = get_post_meta( $post->ID, '_service_icon_preset', true ) ?: 'code';
	$icon_custom  = get_post_meta( $post->ID, '_service_icon_custom', true );
	$display_order = get_post_meta( $post->ID, '_service_display_order', true ) ?: 0;

	$preset_icons = array(
		'code'      => __( 'Code / Development', 'bmg-theme' ),
		'palette'   => __( 'Palette / Design', 'bmg-theme' ),
		'mobile'    => __( 'Mobile / App', 'bmg-theme' ),
		'chart'     => __( 'Chart / Analytics', 'bmg-theme' ),
		'globe'     => __( 'Globe / Web', 'bmg-theme' ),
		'lightning' => __( 'Lightning / Fast', 'bmg-theme' ),
		'shield'    => __( 'Shield / Security', 'bmg-theme' ),
		'heart'     => __( 'Heart / Care', 'bmg-theme' ),
	);
	?>
	<table class="form-table">
		<tr>
			<th><label for="service_icon_type"><?php esc_html_e( 'Icon Type', 'bmg-theme' ); ?></label></th>
			<td>
				<select name="service_icon_type" id="service_icon_type">
					<option value="preset" <?php selected( $icon_type, 'preset' ); ?>><?php esc_html_e( 'Preset Icon', 'bmg-theme' ); ?></option>
					<option value="custom" <?php selected( $icon_type, 'custom' ); ?>><?php esc_html_e( 'Custom SVG', 'bmg-theme' ); ?></option>
				</select>
			</td>
		</tr>
		<tr class="icon-preset-row">
			<th><label for="service_icon_preset"><?php esc_html_e( 'Preset Icon', 'bmg-theme' ); ?></label></th>
			<td>
				<select name="service_icon_preset" id="service_icon_preset">
					<?php foreach ( $preset_icons as $value => $label ) : ?>
						<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $icon_preset, $value ); ?>><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr class="icon-custom-row">
			<th><label for="service_icon_custom"><?php esc_html_e( 'Custom SVG Code', 'bmg-theme' ); ?></label></th>
			<td>
				<textarea name="service_icon_custom" id="service_icon_custom" rows="4" class="large-text code"><?php echo esc_textarea( $icon_custom ); ?></textarea>
				<p class="description"><?php esc_html_e( 'Paste SVG code here. Only the inner paths, not the full SVG wrapper.', 'bmg-theme' ); ?></p>
			</td>
		</tr>
		<tr>
			<th><label for="service_display_order"><?php esc_html_e( 'Display Order', 'bmg-theme' ); ?></label></th>
			<td>
				<input type="number" name="service_display_order" id="service_display_order" value="<?php echo esc_attr( $display_order ); ?>" min="0" step="1" class="small-text">
				<p class="description"><?php esc_html_e( 'Lower numbers display first.', 'bmg-theme' ); ?></p>
			</td>
		</tr>
	</table>
	<script>
	jQuery(document).ready(function($) {
		function toggleIconFields() {
			var type = $('#service_icon_type').val();
			if (type === 'preset') {
				$('.icon-preset-row').show();
				$('.icon-custom-row').hide();
			} else {
				$('.icon-preset-row').hide();
				$('.icon-custom-row').show();
			}
		}
		toggleIconFields();
		$('#service_icon_type').on('change', toggleIconFields);
	});
	</script>
	<?php
}

/**
 * Save Service Meta
 */
function bmg_theme_save_service_meta( $post_id ) {
	if ( ! isset( $_POST['bmg_theme_service_nonce'] ) || ! wp_verify_nonce( $_POST['bmg_theme_service_nonce'], 'bmg_theme_service_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'service_icon_type'     => '_service_icon_type',
		'service_icon_preset'   => '_service_icon_preset',
		'service_icon_custom'   => '_service_icon_custom',
		'service_display_order' => '_service_display_order',
	);

	foreach ( $fields as $field => $meta_key ) {
		if ( isset( $_POST[ $field ] ) ) {
			if ( 'service_icon_custom' === $field ) {
				// Allow SVG in custom icon field.
				update_post_meta( $post_id, $meta_key, wp_kses_post( $_POST[ $field ] ) );
			} elseif ( 'service_display_order' === $field ) {
				update_post_meta( $post_id, $meta_key, absint( $_POST[ $field ] ) );
			} else {
				update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $field ] ) );
			}
		}
	}
}
add_action( 'save_post_service', 'bmg_theme_save_service_meta' );

/**
 * Add custom columns to admin lists
 */
function bmg_theme_add_admin_columns( $columns ) {
	$new_columns = array();
	foreach ( $columns as $key => $value ) {
		$new_columns[ $key ] = $value;
		if ( 'title' === $key ) {
			$new_columns['display_order'] = __( 'Order', 'bmg-theme' );
		}
	}
	return $new_columns;
}
add_filter( 'manage_service_posts_columns', 'bmg_theme_add_admin_columns' );

/**
 * Populate custom columns
 */
function bmg_theme_populate_admin_columns( $column, $post_id ) {
	if ( 'display_order' === $column ) {
		$order = get_post_meta( $post_id, '_service_display_order', true );
		echo esc_html( $order ?: '0' );
	}
}
add_action( 'manage_service_posts_custom_column', 'bmg_theme_populate_admin_columns', 10, 2 );

/**
 * Make order column sortable
 */
function bmg_theme_sortable_columns( $columns ) {
	$columns['display_order'] = 'display_order';
	return $columns;
}
add_filter( 'manage_edit-service_sortable_columns', 'bmg_theme_sortable_columns' );

/**
 * Helper function to get service icon SVG
 */
function bmg_theme_get_service_icon( $post_id ) {
	$icon_type   = get_post_meta( $post_id, '_service_icon_type', true ) ?: 'preset';
	$icon_preset = get_post_meta( $post_id, '_service_icon_preset', true ) ?: 'code';
	$icon_custom = get_post_meta( $post_id, '_service_icon_custom', true );

	if ( 'custom' === $icon_type && ! empty( $icon_custom ) ) {
		return $icon_custom;
	}

	// Preset icons.
	$icons = array(
		'code'      => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
		'palette'   => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>',
		'mobile'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>',
		'chart'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>',
		'globe'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
		'lightning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>',
		'shield'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
		'heart'     => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
	);

	return isset( $icons[ $icon_preset ] ) ? $icons[ $icon_preset ] : $icons['code'];
}

/**
 * Flush rewrite rules on theme activation
 */
function bmg_theme_flush_rewrites() {
	bmg_theme_register_post_types();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'bmg_theme_flush_rewrites' );
