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
 * Force light theme — Rhino Custom Builds does not use dark mode.
 *
 * The starter theme shipped a dark-mode toggle that read system
 * preference + localStorage and flipped `data-bs-theme` on <html>.
 * We keep the _dark-mode.scss file on disk for reference but neuter
 * the runtime: always pin `data-bs-theme="light"` and purge any
 * stale preference from localStorage.
 */
( function() {
	'use strict';

	document.documentElement.setAttribute( 'data-bs-theme', 'light' );

	try {
		localStorage.removeItem( 'bmg-theme-mode' );
	} catch ( e ) {
		// localStorage unavailable — nothing to clean up.
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
 * Sticky header:
 * - Transparent over the hero (or over the first MIN_THRESHOLD px on
 *   inner pages without a hero).
 * - Condensed state (dark + backdrop-blur) activates once the user
 *   has scrolled past that threshold.
 * - On scroll-DOWN past the threshold, the navbar hides via
 *   translateY(-100%). On scroll-UP at any depth past the threshold,
 *   the condensed navbar reappears.
 *
 * Hero parallax: Background translates at 30% of scroll speed with
 * scale(1.05) base to prevent gaps. Only calculates while hero is in
 * viewport. Disabled when prefers-reduced-motion is active.
 */
( function() {
	'use strict';

	var MIN_THRESHOLD = 120;   // Phase 4 spec — 80 → 120px
	var SCROLL_DELTA  = 10;    // ignore micro-scrolls

	var lastScrollY = 0;
	var ticking = false;

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

		// Condensed activation threshold:
		// - With a hero: past the bottom of the hero section.
		// - Without a hero: MIN_THRESHOLD (120px).
		function getCondenseThreshold() {
			if ( heroSection ) {
				return heroSection.offsetTop + heroSection.offsetHeight;
			}
			return MIN_THRESHOLD;
		}

		function update() {
			var currentScrollY = window.scrollY;
			var delta = currentScrollY - lastScrollY;
			var heroHeight = heroSection ? heroSection.offsetHeight : 0;
			var threshold = getCondenseThreshold();
			var pastThreshold = currentScrollY > threshold;

			// Hero parallax — every frame while hero is in viewport
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
			if ( Math.abs( delta ) >= SCROLL_DELTA ) {
				if ( ! pastThreshold ) {
					// Over the hero / first 120px — transparent
					navbar.classList.remove( 'is-hidden', 'is-condensed' );
				} else if ( delta > 0 ) {
					// Scrolling down past threshold — hide
					navbar.classList.add( 'is-hidden' );
					navbar.classList.remove( 'is-condensed' );
				} else {
					// Scrolling up past threshold — show condensed
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

		// Initialize state based on current scroll position (for
		// inner pages loaded mid-scroll or with anchor jumps).
		lastScrollY = window.scrollY;
		if ( window.scrollY > getCondenseThreshold() ) {
			navbar.classList.add( 'is-condensed' );
		}

		window.addEventListener( 'scroll', onScroll, { passive: true } );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Trust Strip Counter — Rhino Hero
 * Animates [data-count-to] elements from 0 to their target on viewport enter.
 * RAF-based, 1200ms, ease-out-quint. Fires once. Respects prefers-reduced-motion.
 */
( function() {
	'use strict';

	var DURATION = 1200;

	function formatNumber( value, template ) {
		// If the original string used comma grouping (e.g. "4,200"), preserve it.
		var rounded = Math.round( value );
		if ( template && template.indexOf( ',' ) !== -1 ) {
			return rounded.toLocaleString( 'en-US' );
		}
		return String( rounded );
	}

	function easeOutQuint( t ) {
		return 1 - Math.pow( 1 - t, 5 );
	}

	function animateCounter( el ) {
		var target = parseInt( el.getAttribute( 'data-count-to' ), 10 );
		var template = el.getAttribute( 'data-count-format' ) || '';

		if ( isNaN( target ) ) {
			return;
		}

		var start = null;

		function step( ts ) {
			if ( start === null ) {
				start = ts;
			}
			var elapsed = ts - start;
			var progress = Math.min( elapsed / DURATION, 1 );
			var eased = easeOutQuint( progress );
			el.textContent = formatNumber( target * eased, template );

			if ( progress < 1 ) {
				requestAnimationFrame( step );
			} else {
				el.textContent = formatNumber( target, template );
			}
		}

		requestAnimationFrame( step );
	}

	function init() {
		var counters = document.querySelectorAll( '[data-count-to]' );

		if ( ! counters.length ) {
			return;
		}

		var prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

		if ( prefersReducedMotion || ! ( 'IntersectionObserver' in window ) ) {
			// Show final value immediately.
			counters.forEach( function( el ) {
				var target = parseInt( el.getAttribute( 'data-count-to' ), 10 );
				var template = el.getAttribute( 'data-count-format' ) || '';
				if ( ! isNaN( target ) ) {
					el.textContent = formatNumber( target, template );
				}
			} );
			return;
		}

		// Zero out so the animation starts from 0 even if server rendered the target.
		counters.forEach( function( el ) {
			el.textContent = '0';
		} );

		var observer = new IntersectionObserver( function( entries ) {
			entries.forEach( function( entry ) {
				if ( entry.isIntersecting ) {
					animateCounter( entry.target );
					observer.unobserve( entry.target );
				}
			} );
		}, { threshold: 0.4 } );

		counters.forEach( function( el ) {
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
 * Vehicle Type Selector — Rhino Hero & Services Hub
 * Pill group filtering. State persists in sessionStorage + querystring.
 * Emits a 'rhino:vehicle-change' CustomEvent so downstream components
 * (project grid, features, services hub) can filter their content.
 */
( function() {
	'use strict';

	var STORAGE_KEY = 'rhino_vehicle';
	var QUERY_KEY = 'vehicle';

	function getInitialVehicle() {
		// URL querystring wins for shareable links.
		try {
			var params = new URLSearchParams( window.location.search );
			var fromQuery = params.get( QUERY_KEY );
			if ( fromQuery ) {
				return fromQuery;
			}
		} catch ( e ) {
			// URLSearchParams not available — fall through.
		}

		try {
			return sessionStorage.getItem( STORAGE_KEY );
		} catch ( e ) {
			return null;
		}
	}

	function persist( vehicle ) {
		try {
			sessionStorage.setItem( STORAGE_KEY, vehicle );
		} catch ( e ) {
			// sessionStorage blocked — continue.
		}

		// Reflect in URL without reloading.
		if ( window.history && window.history.replaceState ) {
			try {
				var url = new URL( window.location.href );
				url.searchParams.set( QUERY_KEY, vehicle );
				window.history.replaceState( {}, '', url.toString() );
			} catch ( e ) {
				// URL constructor not available in very old browsers — skip.
			}
		}
	}

	function applyActive( group, vehicle ) {
		var pills = group.querySelectorAll( '.section-hero__vehicle-pill' );
		var hasActive = false;

		pills.forEach( function( pill ) {
			var isActive = pill.getAttribute( 'data-vehicle' ) === vehicle;
			pill.setAttribute( 'aria-selected', isActive ? 'true' : 'false' );
			if ( isActive ) {
				hasActive = true;
			}
		} );

		group.setAttribute( 'data-active', hasActive ? 'true' : 'false' );
	}

	function broadcast( vehicle ) {
		var evt;
		try {
			evt = new CustomEvent( 'rhino:vehicle-change', {
				detail: { vehicle: vehicle },
				bubbles: true
			} );
		} catch ( e ) {
			// Very old IE fallback — skip.
			return;
		}
		document.dispatchEvent( evt );
	}

	function init() {
		var groups = document.querySelectorAll( '[data-vehicle-selector]' );

		if ( ! groups.length ) {
			return;
		}

		var initial = getInitialVehicle();

		groups.forEach( function( group ) {
			if ( initial ) {
				applyActive( group, initial );
			}

			group.addEventListener( 'click', function( e ) {
				var pill = e.target.closest( '.section-hero__vehicle-pill' );
				if ( ! pill || ! group.contains( pill ) ) {
					return;
				}

				var vehicle = pill.getAttribute( 'data-vehicle' );
				if ( ! vehicle ) {
					return;
				}

				// Toggle off if tapping the active pill a second time.
				var isCurrentlyActive = pill.getAttribute( 'aria-selected' ) === 'true';
				if ( isCurrentlyActive ) {
					applyActive( group, null );
					try { sessionStorage.removeItem( STORAGE_KEY ); } catch ( err ) {}
					broadcast( null );
					return;
				}

				applyActive( group, vehicle );
				persist( vehicle );
				broadcast( vehicle );
			} );
		} );

		if ( initial ) {
			broadcast( initial );
		}
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
