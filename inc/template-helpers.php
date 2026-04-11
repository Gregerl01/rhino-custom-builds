<?php
/**
 * Shared template helpers — Rhino Custom Builds
 *
 * Small utility functions used across multiple template parts.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'bmg_parse_trust_item' ) ) {
	/**
	 * Parse a trust-strip / stat string for an animated counter.
	 *
	 * Looks for the first integer match (with optional comma grouping and
	 * optional trailing "+"). Returns an array with "prefix", "count",
	 * "format", "plus", and "suffix" keys. Returns null when no match or
	 * the number is below the threshold (< 10) — prevents silly 0 → 9
	 * animations on small values.
	 *
	 * @param string $item Raw trust / stat string.
	 * @return array|null
	 */
	function bmg_parse_trust_item( $item ) {
		if ( ! preg_match( '/(\d[\d,]*)(\+?)/', $item, $matches, PREG_OFFSET_CAPTURE ) ) {
			return null;
		}

		$full_match   = $matches[0][0];
		$offset       = $matches[0][1];
		$number_raw   = $matches[1][0];
		$plus         = $matches[2][0];
		$count_target = (int) str_replace( ',', '', $number_raw );

		if ( $count_target < 10 ) {
			return null;
		}

		return array(
			'prefix' => substr( $item, 0, $offset ),
			'count'  => $count_target,
			'format' => $number_raw, // preserve e.g. "4,200"
			'plus'   => $plus,
			'suffix' => substr( $item, $offset + strlen( $full_match ) ),
		);
	}
}
