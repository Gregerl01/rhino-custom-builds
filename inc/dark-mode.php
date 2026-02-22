<?php
/**
 * Dark Mode functionality
 *
 * Handles theme switching, FOUC prevention, and language_attributes filter.
 *
 * @package BMG_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add inline script to prevent flash of incorrect theme (FOUC).
 *
 * This script runs before CSS loads to set the correct theme immediately.
 */
function bmg_theme_dark_mode_inline_script() {
	?>
	<script>
	(function() {
		var theme = 'light';
		try {
			var stored = localStorage.getItem('bmg-theme-mode');
			if (stored) {
				theme = stored;
			} else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				theme = 'dark';
			}
		} catch (e) {}
		document.documentElement.setAttribute('data-bs-theme', theme);
	})();
	</script>
	<?php
}
add_action( 'wp_head', 'bmg_theme_dark_mode_inline_script', 1 );

/**
 * Add data-bs-theme attribute to the html element via language_attributes filter.
 *
 * @param string $output The language attributes output.
 * @return string Modified language attributes with data-bs-theme.
 */
function bmg_theme_add_theme_attribute( $output ) {
	return $output . ' data-bs-theme="light"';
}
add_filter( 'language_attributes', 'bmg_theme_add_theme_attribute' );

/**
 * Add noscript fallback styles.
 * Uses BMG brand colors for light mode fallback.
 */
function bmg_theme_dark_mode_noscript() {
	?>
	<noscript>
		<style>
			:root {
				--us-bg-primary: #FAFAFA;
				--us-bg-secondary: #E5E4E2;
				--us-bg-tertiary: #E8E8E8;
				--us-text-primary: #0A0A0A;
				--us-text-secondary: #2D2D2D;
				--us-border-color: rgba(10, 10, 10, 0.08);
				--bs-body-bg: #FAFAFA;
				--bs-body-color: #0A0A0A;
			}
		</style>
	</noscript>
	<?php
}
add_action( 'wp_head', 'bmg_theme_dark_mode_noscript', 2 );
