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
		'front-page'    => array(
			'title'       => __( '[Business Name] — [Industry Tagline]', 'bmg-theme' ),
			'description' => __( '[Homepage meta description — summarize services, location, and value proposition.]', 'bmg-theme' ),
		),
		'page-about'    => array(
			'title'       => __( 'About — [Business Name]', 'bmg-theme' ),
			'description' => __( '[About page meta description — introduce the provider or team and their qualifications.]', 'bmg-theme' ),
		),
		'page-plans'    => array(
			'title'       => __( 'Plans — [Business Name]', 'bmg-theme' ),
			'description' => __( '[Plans page meta description — summarize plan tiers and key benefits.]', 'bmg-theme' ),
		),
		'page-services' => array(
			'title'       => __( 'Services — [Business Name]', 'bmg-theme' ),
			'description' => __( '[Services page meta description — summarize core service offerings.]', 'bmg-theme' ),
		),
		'page-enroll'   => array(
			'title'       => __( 'Enroll — [Business Name]', 'bmg-theme' ),
			'description' => __( '[Enrollment page meta description — describe the enrollment process.]', 'bmg-theme' ),
		),
		'page-faq'      => array(
			'title'       => __( 'FAQ — [Business Name]', 'bmg-theme' ),
			'description' => __( '[FAQ page meta description — summarize common questions covered.]', 'bmg-theme' ),
		),
		'page-contact'  => array(
			'title'       => __( 'Contact — [Business Name]', 'bmg-theme' ),
			'description' => __( '[Contact page meta description — mention contact methods and location.]', 'bmg-theme' ),
		),
		'page-privacy'  => array(
			'title'       => __( 'Privacy Policy — [Business Name]', 'bmg-theme' ),
			'description' => __( '[Privacy page meta description — mention privacy practices and compliance.]', 'bmg-theme' ),
		),
		'page-terms'    => array(
			'title'       => __( 'Terms of Use — [Business Name]', 'bmg-theme' ),
			'description' => __( '[Terms page meta description — mention terms of use and disclaimers.]', 'bmg-theme' ),
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
