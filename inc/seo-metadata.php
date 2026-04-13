<?php
/**
 * SEO Metadata — Title Tags & Meta Descriptions
 *
 * Programmatic defaults matching CONTENT.md Section 12.
 * Rank Math (or any SEO plugin) takes priority when configured;
 * these serve as fallbacks for pages without plugin-level overrides.
 *
 * @package starter-theme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Map page template slugs to SEO data.
 *
 * @return array Keyed by template file basename (without .php).
 */
function bmg_seo_page_data() {
	return array(
		'front-page'          => array(
			'title'       => __( 'Rhino Custom Builds — Custom Truck & Off-Road Shop in San Diego, CA', 'bmg-theme' ),
			'description' => __( 'Spray-on bedliners, protective coatings, truck accessories, off-road builds, and fleet services. Installed by certified builders in San Diego. Free quotes.', 'bmg-theme' ),
		),
		'page-about'          => array(
			'title'       => __( 'About — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( '35+ years building trucks in San Diego. Manufacturer-certified installers, OEM-grade parts, lifetime coating warranty. Meet the Rhino team.', 'bmg-theme' ),
		),
		'page-services-hub'   => array(
			'title'       => __( 'Services — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Spray-on bedliners, protective coatings, truck accessories, off-road & overland builds, and fleet services. One shop, one warranty.', 'bmg-theme' ),
		),
		'page-service-detail' => array(
			'title'       => '',  // Let WordPress use the page title + site name
			'description' => '',
		),
		'page-shop'           => array(
			'title'       => __( 'Shop Parts & Gear — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Browse truck and off-road parts from ARB, Fox, Warn, Rigid, Method, BFGoodrich, and more. All products include optional in-bay installation in San Diego.', 'bmg-theme' ),
		),
		'page-faq'            => array(
			'title'       => __( 'FAQ — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Answers to common questions about bedliners, coatings, accessories, off-road builds, pricing, and the install process at Rhino Custom Builds.', 'bmg-theme' ),
		),
		'page-contact'        => array(
			'title'       => __( 'Contact — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Contact Rhino Custom Builds in San Diego. Walk-ins welcome for quotes. Call or send a message — we respond within one business day.', 'bmg-theme' ),
		),
		'page-quote'          => array(
			'title'       => __( 'Request a Quote — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Get a free, no-obligation quote for bedliners, coatings, accessories, or off-road builds. Three steps, one business day response.', 'bmg-theme' ),
		),
		'page-gallery'        => array(
			'title'       => __( 'Gallery — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'See completed builds from the Rhino shop floor. Bedliners, coatings, off-road builds, fleet upfits, and more. Real trucks, real results.', 'bmg-theme' ),
		),
		'page-privacy'        => array(
			'title'       => __( 'Privacy Policy — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Privacy policy for Rhino Custom Builds website.', 'bmg-theme' ),
		),
		'page-terms'          => array(
			'title'       => __( 'Terms of Use — Rhino Custom Builds', 'bmg-theme' ),
			'description' => __( 'Terms of use for Rhino Custom Builds website.', 'bmg-theme' ),
		),
	);
}

/**
 * Identify the current page's SEO key.
 *
 * @return string|false SEO key or false if not a mapped page.
 */
function bmg_get_current_seo_key() {
	if ( is_front_page() ) {
		return 'front-page';
	}

	if ( is_page() ) {
		$template = get_page_template_slug();
		if ( $template ) {
			// Template slug is like "page-templates/page-about.php".
			$basename = basename( $template, '.php' );
			return $basename;
		}
	}

	return false;
}

/**
 * Filter document title parts for mapped pages.
 *
 * Replaces the default "Page Title – Site Name" with our CONTENT.md title.
 * Yields to Rank Math: if Rank Math sets a custom title, it runs at
 * priority 15 and overrides this.
 *
 * @param array $title_parts Title parts array.
 * @return array
 */
function bmg_seo_document_title( $title_parts ) {
	// Skip if an SEO plugin is handling titles.
	if ( class_exists( 'RankMath' ) || defined( 'WPSEO_VERSION' ) ) {
		return $title_parts;
	}

	$key = bmg_get_current_seo_key();
	if ( ! $key ) {
		return $title_parts;
	}

	$seo_data = bmg_seo_page_data();
	if ( isset( $seo_data[ $key ]['title'] ) ) {
		// Set the full title and remove the site name separator.
		$title_parts['title'] = $seo_data[ $key ]['title'];
		unset( $title_parts['site'] );
		unset( $title_parts['tagline'] );
	}

	return $title_parts;
}
add_filter( 'document_title_parts', 'bmg_seo_document_title' );

/**
 * Output meta description for mapped pages.
 *
 * Skips output if Rank Math or Yoast is active (they handle their own).
 */
function bmg_seo_meta_description() {
	// Skip if an SEO plugin is handling meta descriptions.
	if ( class_exists( 'RankMath' ) || defined( 'WPSEO_VERSION' ) ) {
		return;
	}

	$key = bmg_get_current_seo_key();
	if ( ! $key ) {
		return;
	}

	$seo_data = bmg_seo_page_data();
	if ( isset( $seo_data[ $key ]['description'] ) ) {
		echo '<meta name="description" content="' . esc_attr( $seo_data[ $key ]['description'] ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'bmg_seo_meta_description', 1 );
