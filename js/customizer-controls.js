/**
 * BMG Theme Customizer Controls
 *
 * Enhances Customizer controls with additional functionality.
 *
 * @package BMG_Theme
 */

( function( $ ) {
	'use strict';

	wp.customize.bind( 'ready', function() {

		// Add value display to logo max width range slider.
		var logoWidthControl = wp.customize.control( 'bmg_logo_max_width' );

		if ( logoWidthControl ) {
			var $container = logoWidthControl.container;
			var $rangeInput = $container.find( 'input[type="range"]' );

			if ( $rangeInput.length ) {
				// Create value display element.
				var $valueDisplay = $( '<span class="bmg-range-value"></span>' );
				$valueDisplay.css( {
					'display': 'inline-block',
					'margin-left': '10px',
					'font-weight': '600',
					'min-width': '50px'
				} );

				// Set initial value.
				$valueDisplay.text( $rangeInput.val() + 'px' );

				// Append after the range input.
				$rangeInput.after( $valueDisplay );

				// Update on change.
				$rangeInput.on( 'input change', function() {
					$valueDisplay.text( $( this ).val() + 'px' );
				} );
			}
		}

	} );

} )( jQuery );
