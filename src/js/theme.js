// BMG Theme JS — Bootstrap + Dark Mode + Scroll Reveal

/**
 * BMG Theme JavaScript
 *
 * Includes Bootstrap 5 and custom functionality.
 * Refined luxury editorial aesthetic.
 */

// Import Bootstrap
import 'bootstrap';

/**
 * Skip Link Focus Fix
 * Helps with accessibility for keyboard only users.
 */
( function() {
	const isIe = /(trident|msie)/i.test( navigator.userAgent );

	if ( isIe && document.getElementById && window.addEventListener ) {
		window.addEventListener(
			'hashchange',
			function() {
				const id = location.hash.substring( 1 );
				let element;

				if ( ! /^[A-z0-9_-]+$/.test( id ) ) {
					return;
				}

				element = document.getElementById( id );

				if ( element ) {
					if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
						element.tabIndex = -1;
					}

					element.focus();
				}
			},
			false
		);
	}
} )();

/**
 * Dark Mode Toggle
 * Handles theme switching, localStorage persistence, and system preference detection.
 */
( function() {
	'use strict';

	const STORAGE_KEY = 'bmg-theme-mode';
	const THEME_ATTRIBUTE = 'data-bs-theme';

	function getSystemPreference() {
		if ( window.matchMedia && window.matchMedia( '(prefers-color-scheme: dark)' ).matches ) {
			return 'dark';
		}
		return 'light';
	}

	function getStoredTheme() {
		try {
			return localStorage.getItem( STORAGE_KEY );
		} catch ( e ) {
			return null;
		}
	}

	function setStoredTheme( theme ) {
		try {
			localStorage.setItem( STORAGE_KEY, theme );
		} catch ( e ) {
			// localStorage not available
		}
	}

	function applyTheme( theme ) {
		document.documentElement.setAttribute( THEME_ATTRIBUTE, theme );
		updateToggleButtons( theme );
	}

	function getCurrentTheme() {
		const storedTheme = getStoredTheme();
		if ( storedTheme ) {
			return storedTheme;
		}
		return getSystemPreference();
	}

	function toggleTheme() {
		const currentTheme = document.documentElement.getAttribute( THEME_ATTRIBUTE ) || 'light';
		const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
		applyTheme( newTheme );
		setStoredTheme( newTheme );
	}

	function updateToggleButtons( theme ) {
		const buttons = document.querySelectorAll( '.dark-mode-toggle' );
		buttons.forEach( function( button ) {
			const lightLabel = button.getAttribute( 'data-light-label' ) || 'Switch to dark mode';
			const darkLabel = button.getAttribute( 'data-dark-label' ) || 'Switch to light mode';
			button.setAttribute( 'aria-label', theme === 'dark' ? darkLabel : lightLabel );
		} );
	}

	function init() {
		const theme = getCurrentTheme();
		applyTheme( theme );

		document.querySelectorAll( '.dark-mode-toggle' ).forEach( function( button ) {
			button.addEventListener( 'click', toggleTheme );
		} );

		if ( window.matchMedia ) {
			const mediaQuery = window.matchMedia( '(prefers-color-scheme: dark)' );
			mediaQuery.addEventListener( 'change', function( e ) {
				if ( ! getStoredTheme() ) {
					applyTheme( e.matches ? 'dark' : 'light' );
				}
			} );
		}
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Scroll Reveal
 * Uses IntersectionObserver to reveal elements as they enter the viewport.
 * Adds .revealed class to elements with .reveal-on-scroll
 */
( function() {
	'use strict';

	function init() {
		// Check for reduced motion preference
		const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

		if ( prefersReducedMotion ) {
			// If user prefers reduced motion, reveal all elements immediately
			document.querySelectorAll( '.reveal-on-scroll' ).forEach( function( el ) {
				el.classList.add( 'revealed' );
			} );
			return;
		}

		// Check for IntersectionObserver support
		if ( ! ( 'IntersectionObserver' in window ) ) {
			// Fallback: reveal all elements
			document.querySelectorAll( '.reveal-on-scroll' ).forEach( function( el ) {
				el.classList.add( 'revealed' );
			} );
			return;
		}

		const observerOptions = {
			root: null, // viewport
			rootMargin: '0px 0px -50px 0px', // Trigger slightly before element is fully visible
			threshold: 0.1 // 10% visible
		};

		const observer = new IntersectionObserver( function( entries ) {
			entries.forEach( function( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'revealed' );
					// Stop observing once revealed (one-time animation)
					observer.unobserve( entry.target );
				}
			} );
		}, observerOptions );

		// Observe all elements with .reveal-on-scroll
		document.querySelectorAll( '.reveal-on-scroll' ).forEach( function( el ) {
			observer.observe( el );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Smooth Scroll
 * Handles smooth scrolling for anchor links with header offset.
 */
( function() {
	'use strict';

	function init() {
		document.querySelectorAll( 'a[href^="#"]' ).forEach( function( anchor ) {
			anchor.addEventListener( 'click', function( e ) {
				const targetId = this.getAttribute( 'href' );

				if ( targetId === '#' ) {
					return;
				}

				const target = document.querySelector( targetId );

				if ( target ) {
					e.preventDefault();
					const headerOffset = 80;
					const elementPosition = target.getBoundingClientRect().top;
					const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

					window.scrollTo( {
						top: offsetPosition,
						behavior: 'smooth'
					} );
				}
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * FAQ Accordion Enhancements
 * Ensures smooth transitions for Bootstrap accordion.
 */
( function() {
	'use strict';

	function init() {
		// Add aria-expanded tracking for styling purposes
		const accordionButtons = document.querySelectorAll( '.accordion-button' );

		accordionButtons.forEach( function( button ) {
			button.addEventListener( 'click', function() {
				// Bootstrap handles this, but we can add custom tracking if needed
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Billing Toggle (Homepage Plans)
 * Switches between monthly and annual pricing with smooth crossfade.
 */
( function() {
	'use strict';

	function init() {
		const toggleContainer = document.querySelector( '.billing-toggle-home' );
		const cardsContainer = document.querySelector( '.plans-cards-container' );

		if ( ! toggleContainer || ! cardsContainer ) {
			return;
		}

		const buttons = toggleContainer.querySelectorAll( '.billing-toggle-home__btn' );

		buttons.forEach( function( button ) {
			button.addEventListener( 'click', function() {
				const billing = this.getAttribute( 'data-billing' );

				// Update active state on buttons
				buttons.forEach( function( btn ) {
					btn.classList.remove( 'active' );
				} );
				this.classList.add( 'active' );

				// Update data attribute on cards container (CSS handles the transition)
				cardsContainer.setAttribute( 'data-billing', billing );
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
