<?php
/**
 * SEO Metadata — Title Tags & Meta Descriptions
 *
 * Programmatic defaults matching CONTENT.md Section 12.
 * Rank Math (or any SEO plugin) takes priority when configured;
 * these serve as fallbacks for pages without plugin-level overrides.
 *
 * @package BMG_Theme
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
			'title'       => __( 'Baig Medical Group — Concierge Medicine in Yuma, AZ', 'bmg-theme' ),
			'description' => __( 'Membership-based medical practice in Yuma offering direct physician access, extended appointments, and coordinated care for individuals and families.', 'bmg-theme' ),
		),
		'page-about'    => array(
			'title'       => __( 'About Dr. Adil Baig — Baig Medical Group', 'bmg-theme' ),
			'description' => __( 'Meet Dr. Adil Baig, a board-certified family medicine physician offering concierge care in Yuma, Arizona.', 'bmg-theme' ),
		),
		'page-plans'    => array(
			'title'       => __( 'Membership Plans — Baig Medical Group', 'bmg-theme' ),
			'description' => __( 'Compare three concierge medicine membership tiers. Every plan includes direct physician access, same-day appointments, and care coordination.', 'bmg-theme' ),
		),
		'page-services' => array(
			'title'       => __( 'Our Services — Baig Medical Group, Yuma AZ', 'bmg-theme' ),
			'description' => __( 'Primary care, preventive health, executive physicals, specialist coordination, and wellness planning delivered by your personal physician in Yuma.', 'bmg-theme' ),
		),
		'page-enroll'   => array(
			'title'       => __( 'Enroll — Baig Medical Group', 'bmg-theme' ),
			'description' => __( 'Begin your membership application. All information is transmitted securely in compliance with HIPAA privacy requirements.', 'bmg-theme' ),
		),
		'page-faq'      => array(
			'title'       => __( 'Frequently Asked Questions — Baig Medical Group', 'bmg-theme' ),
			'description' => __( 'Answers about concierge medicine, membership plans, insurance coordination, physician access, and enrollment at Baig Medical Group.', 'bmg-theme' ),
		),
		'page-contact'  => array(
			'title'       => __( 'Contact — Baig Medical Group, Yuma AZ', 'bmg-theme' ),
			'description' => __( 'Reach Baig Medical Group by phone, email, or contact form. Office hours, location, and directions in Yuma, Arizona.', 'bmg-theme' ),
		),
		'page-privacy'  => array(
			'title'       => __( 'Privacy Policy — Baig Medical Group', 'bmg-theme' ),
			'description' => __( 'HIPAA Notice of Privacy Practices and website privacy policy for Baig Medical Group.', 'bmg-theme' ),
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
