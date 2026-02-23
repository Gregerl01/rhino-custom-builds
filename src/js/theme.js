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
 * BMG Reveal System
 * Uses IntersectionObserver to reveal elements with .bmg-reveal class.
 * Adds .is-visible when element enters viewport at 15% threshold.
 * One-way — once revealed, stays revealed.
 */
( function() {
	'use strict';

	function init() {
		const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;
		const reveals = document.querySelectorAll( '.bmg-reveal' );

		if ( ! reveals.length ) {
			return;
		}

		if ( prefersReducedMotion || ! ( 'IntersectionObserver' in window ) ) {
			reveals.forEach( function( el ) {
				el.classList.add( 'is-visible' );
			} );
			return;
		}

		const observer = new IntersectionObserver( function( entries ) {
			entries.forEach( function( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					observer.unobserve( entry.target );
				}
			} );
		}, { threshold: 0.15 } );

		reveals.forEach( function( el ) {
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

/**
 * Smart Sticky Header + Hero Parallax
 * Single scroll listener handles both features via shared rAF loop.
 *
 * Sticky header: Full transparent in hero, hidden on scroll-down past hero,
 * condensed on scroll-up. Inner pages without hero start condensed.
 *
 * Hero parallax: Background translates at 30% of scroll speed with scale(1.05)
 * base to prevent gaps. Only calculates while hero is in viewport.
 * Disabled when prefers-reduced-motion is active.
 */
( function() {
	'use strict';

	var lastScrollY = 0;
	var ticking = false;
	var SCROLL_THRESHOLD = 10;

	function init() {
		var navbar = document.getElementById( 'main-nav' );

		if ( ! navbar ) {
			return;
		}

		var heroSection = document.querySelector( '.section-hero' );
		var heroBg = document.querySelector( '.section-hero__background' );
		var ctaSection = document.querySelector( '.section-cta' );
		var ctaBg = document.querySelector( '.cta-background' );
		var prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

		// Inner pages without a hero — start condensed immediately
		if ( ! heroSection ) {
			navbar.classList.add( 'is-condensed' );
		}

		function getHeroBottom() {
			if ( ! heroSection ) {
				return 0;
			}
			return heroSection.offsetTop + heroSection.offsetHeight;
		}

		function update() {
			var currentScrollY = window.scrollY;
			var delta = currentScrollY - lastScrollY;
			var heroHeight = heroSection ? heroSection.offsetHeight : 0;
			var pastHero = currentScrollY > getHeroBottom();

			// Hero parallax — runs on every frame while hero is in viewport
			if ( heroBg && ! prefersReducedMotion && currentScrollY < heroHeight ) {
				heroBg.style.transform = 'translateY(' + ( currentScrollY * 0.3 ) + 'px) scale(1.05)';
			}

			// CTA parallax — only when section is near viewport
			if ( ctaBg && ctaSection && ! prefersReducedMotion ) {
				var ctaRect = ctaSection.getBoundingClientRect();
				if ( ctaRect.bottom > 0 && ctaRect.top < window.innerHeight ) {
					var ctaScrollAmount = ctaRect.top * -0.2;
					ctaBg.style.transform = 'translateY(' + ctaScrollAmount + 'px)';
				}
			}

			// Sticky header — only updates on meaningful scroll deltas
			if ( Math.abs( delta ) >= SCROLL_THRESHOLD ) {
				if ( ! pastHero ) {
					// In hero — full transparent navbar
					navbar.classList.remove( 'is-hidden', 'is-condensed' );
				} else if ( delta > 0 ) {
					// Scrolling DOWN past hero — hide
					navbar.classList.add( 'is-hidden' );
					navbar.classList.remove( 'is-condensed' );
				} else {
					// Scrolling UP past hero — show condensed
					navbar.classList.remove( 'is-hidden' );
					navbar.classList.add( 'is-condensed' );
				}

				lastScrollY = currentScrollY;
			}

			ticking = false;
		}

		function onScroll() {
			if ( ! ticking ) {
				requestAnimationFrame( update );
				ticking = true;
			}
		}

		lastScrollY = window.scrollY;
		window.addEventListener( 'scroll', onScroll, { passive: true } );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Back to Top Button
 * Shows a fixed button after scrolling 2x viewport height.
 * Smooth scrolls to top on click. Respects prefers-reduced-motion.
 */
( function() {
	'use strict';

	function init() {
		var backToTop = document.querySelector( '.bmg-back-to-top' );

		if ( ! backToTop ) {
			return;
		}

		var threshold = window.innerHeight * 2;
		var prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

		window.addEventListener( 'scroll', function() {
			if ( window.scrollY > threshold ) {
				backToTop.classList.add( 'is-visible' );
			} else {
				backToTop.classList.remove( 'is-visible' );
			}
		}, { passive: true } );

		backToTop.addEventListener( 'click', function() {
			window.scrollTo( {
				top: 0,
				behavior: prefersReducedMotion ? 'auto' : 'smooth'
			} );
		} );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();
