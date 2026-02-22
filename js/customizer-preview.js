/**
 * BMG Theme Customizer Live Preview
 *
 * Handles real-time updates in the Customizer preview.
 *
 * @package BMG_Theme
 */

( function( $ ) {
	'use strict';

	// Logo Max Width live preview.
	wp.customize( 'bmg_logo_max_width', function( value ) {
		value.bind( function( newValue ) {
			var mobileWidth = Math.round( newValue * 0.75 );
			var styleId = 'bmg-logo-size-css';
			var css = '.navbar-brand img, .custom-logo-link img { max-width: ' + newValue + 'px; height: auto; }';
			css += '@media (max-width: 767.98px) { .navbar-brand img, .custom-logo-link img { max-width: ' + mobileWidth + 'px; } }';

			// Update or create the style element.
			if ( $( '#' + styleId ).length ) {
				$( '#' + styleId ).html( css );
			} else {
				$( 'head' ).append( '<style id="' + styleId + '">' + css + '</style>' );
			}
		} );
	} );

} )( jQuery );
