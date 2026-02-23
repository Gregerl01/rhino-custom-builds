<?php
/**
 * Site Identity Customizer Settings
 *
 * Adds logo size control to the Site Identity section.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Site Identity Customizer Settings
 */
function bmg_theme_site_identity_customizer( $wp_customize ) {

	// Logo Max Width Setting.
	$wp_customize->add_setting(
		'bmg_logo_max_width',
		array(
			'default'           => 200,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	// Logo Max Width Control (Range Slider).
	$wp_customize->add_control(
		'bmg_logo_max_width',
		array(
			'label'       => __( 'Logo Max Width (px)', 'bmg-theme' ),
			'description' => __( 'Adjust the maximum width of your logo. Mobile displays at 75% of this value.', 'bmg-theme' ),
			'section'     => 'title_tagline', // Built-in Site Identity section.
			'type'        => 'range',
			'input_attrs' => array(
				'min'  => 80,
				'max'  => 400,
				'step' => 10,
			),
		)
	);

	// Add a number display next to the range slider.
	$wp_customize->add_setting(
		'bmg_logo_max_width_display',
		array(
			'default'           => 200,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);
}
add_action( 'customize_register', 'bmg_theme_site_identity_customizer' );

/**
 * Output logo size CSS in wp_head
 */
function bmg_theme_logo_size_css() {
	$logo_width = get_theme_mod( 'bmg_logo_max_width', 200 );
	$mobile_width = round( $logo_width * 0.75 );
	?>
	<style id="bmg-logo-size-css">
		.navbar-brand img,
		.custom-logo-link img {
			max-width: <?php echo absint( $logo_width ); ?>px;
			height: auto;
		}
		@media (max-width: 767.98px) {
			.navbar-brand img,
			.custom-logo-link img {
				max-width: <?php echo absint( $mobile_width ); ?>px;
			}
		}
	</style>
	<?php
}
add_action( 'wp_head', 'bmg_theme_logo_size_css', 100 );

/**
 * Enqueue Customizer live preview script
 */
function bmg_theme_customizer_live_preview() {
	wp_enqueue_script(
		'bmg-customizer-preview',
		get_stylesheet_directory_uri() . '/js/customizer-preview.js',
		array( 'jquery', 'customize-preview' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_preview_init', 'bmg_theme_customizer_live_preview' );

/**
 * Enqueue Customizer controls script for range value display
 */
function bmg_theme_customizer_controls() {
	wp_enqueue_script(
		'bmg-customizer-controls',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'jquery', 'customize-controls' ),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'bmg_theme_customizer_controls' );
