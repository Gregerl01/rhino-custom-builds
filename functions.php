<?php
/**
 * Theme functions and definitions
 *
 * @package starter-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Theme setup.
 */
function bmg_theme_setup() {
	// Load child theme text domain.
	load_child_theme_textdomain( 'bmg-theme', get_stylesheet_directory() . '/languages' );

	// WooCommerce support.
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'bmg_theme_setup' );

/**
 * WooCommerce: Remove default styles.
 *
 * We handle all WooCommerce styling via our SCSS.
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * WooCommerce: Wrap content in Bootstrap container.
 */
function bmg_woocommerce_wrapper_start() {
	echo '<div class="container py-5"><div class="row"><div class="col-12">';
}
function bmg_woocommerce_wrapper_end() {
	echo '</div></div></div>';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', 'bmg_woocommerce_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'bmg_woocommerce_wrapper_end', 10 );

/**
 * WooCommerce: Disable sidebar on shop pages.
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Preconnect to Google Fonts for performance.
 */
function bmg_fonts_preconnect() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action( 'wp_head', 'bmg_fonts_preconnect', 1 );

/**
 * Enqueue styles and scripts.
 *
 * Removes parent theme styles/scripts and enqueues child theme versions.
 */
function bmg_enqueue_scripts() {
	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );
	$suffix        = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// Dequeue parent theme styles and scripts.
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );
	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );

	// Enqueue Google Fonts: Barlow, Barlow Condensed, JetBrains Mono.
	wp_enqueue_style(
		'bmg-fonts',
		'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600;700;800&family=Barlow:wght@400;500;600&family=JetBrains+Mono:wght@400;500;700&display=swap',
		array(),
		null
	);

	// Enqueue child theme styles.
	$theme_styles = "/css/theme{$suffix}.css";
	if ( file_exists( get_stylesheet_directory() . $theme_styles ) ) {
		$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );
		wp_enqueue_style(
			'bmg-styles',
			get_stylesheet_directory_uri() . $theme_styles,
			array( 'bmg-fonts' ),
			$css_version
		);
	}

	// Enqueue child theme scripts.
	$theme_scripts = "/js/theme{$suffix}.js";
	if ( file_exists( get_stylesheet_directory() . $theme_scripts ) ) {
		$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
		wp_enqueue_script(
			'bmg-scripts',
			get_stylesheet_directory_uri() . $theme_scripts,
			array( 'jquery' ),
			$js_version,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'bmg_enqueue_scripts', 20 );

/**
 * Include additional functionality.
 */
$bmg_inc_dir = 'inc';

$bmg_includes = array(
	'/template-helpers.php',         // Shared template helpers (e.g. trust-item parser).
	'/custom-post-types.php',        // Custom post types for homepage sections.
	'/customizer-site-identity.php', // Site Identity settings (logo size).
	'/customizer-practice-info.php', // Business Information panel (provider, contact, hours).
	'/customizer-footer.php',        // Footer Customizer settings and menus.
	'/customizer-hero.php',          // Hero section Customizer settings.
	'/customizer-problem.php',       // Problem section Customizer settings.
	'/customizer-founder.php',       // Founder / Shop section Customizer settings.
	'/customizer-features.php',      // Features section Customizer settings.
	'/customizer-proof.php',         // Proof section Customizer settings.
	'/customizer-about.php',         // About section Customizer settings.
	'/dark-mode.php',                // Dark mode FOUC prevention and data-bs-theme attribute.
	'/seo-metadata.php',             // SEO title tags and meta descriptions.
);

foreach ( $bmg_includes as $file ) {
	$filepath = get_stylesheet_directory() . '/' . $bmg_inc_dir . $file;
	if ( file_exists( $filepath ) ) {
		require_once $filepath;
	}
}
