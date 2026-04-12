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
 * Mobile Nav Drawer — custom implementation (not Bootstrap collapse)
 *
 * Bootstrap's collapse plugin height-animates the target element, which
 * fights a fixed-position drawer and produces a half-open state. We
 * manage open/close ourselves via an .is-open class on the drawer and
 * backdrop, plus .drawer-open on <body> for scroll lock.
 *
 * Also handles the accordion expand behavior for Services / Shop
 * dropdowns on mobile: tap the parent label to expand its submenu,
 * tap the "View All" footer link to navigate.
 */
( function() {
	'use strict';

	var MOBILE_BREAKPOINT = 768;

	function isMobile() {
		return window.innerWidth < MOBILE_BREAKPOINT;
	}

	function init() {
		var drawer   = document.querySelector( '[data-drawer]' );
		var toggle   = document.querySelector( '[data-drawer-toggle]' );
		var closeBtn = document.querySelector( '[data-drawer-close]' );
		var backdrop = document.querySelector( '[data-drawer-backdrop]' );

		if ( ! drawer || ! toggle ) {
			return;
		}

		function collapseAccordions() {
			var expanded = drawer.querySelectorAll( '.has-dropdown.is-expanded' );
			expanded.forEach( function( el ) {
				el.classList.remove( 'is-expanded' );
				var t = el.querySelector( '.nav-link.dropdown-toggle' );
				if ( t ) {
					t.setAttribute( 'aria-expanded', 'false' );
				}
			} );
		}

		function openDrawer() {
			drawer.classList.add( 'is-open' );
			if ( backdrop ) {
				backdrop.classList.add( 'is-open' );
			}
			document.body.classList.add( 'drawer-open' );
			toggle.setAttribute( 'aria-expanded', 'true' );

			// Focus the close button for keyboard users.
			if ( closeBtn ) {
				window.setTimeout( function() { closeBtn.focus(); }, 50 );
			}
		}

		function closeDrawer() {
			drawer.classList.remove( 'is-open' );
			if ( backdrop ) {
				backdrop.classList.remove( 'is-open' );
			}
			document.body.classList.remove( 'drawer-open' );
			toggle.setAttribute( 'aria-expanded', 'false' );
			collapseAccordions();

			// Return focus to the hamburger.
			toggle.focus();
		}

		function toggleDrawer() {
			if ( drawer.classList.contains( 'is-open' ) ) {
				closeDrawer();
			} else {
				openDrawer();
			}
		}

		// ----- Wire up controls -----
		toggle.addEventListener( 'click', function( e ) {
			e.preventDefault();
			toggleDrawer();
		} );

		if ( closeBtn ) {
			closeBtn.addEventListener( 'click', function( e ) {
				e.preventDefault();
				closeDrawer();
			} );
		}

		if ( backdrop ) {
			backdrop.addEventListener( 'click', closeDrawer );
		}

		// Escape key closes the drawer when open.
		document.addEventListener( 'keydown', function( e ) {
			if ( e.key === 'Escape' && drawer.classList.contains( 'is-open' ) ) {
				closeDrawer();
			}
		} );

		// ----- Submenu accordion (Services / Shop) -----
		var subToggles = drawer.querySelectorAll( '.has-dropdown > .nav-link.dropdown-toggle' );

		subToggles.forEach( function( subToggle ) {
			subToggle.addEventListener( 'click', function( e ) {
				if ( ! isMobile() ) {
					return; // desktop — let href navigate
				}

				e.preventDefault();
				var parent = subToggle.parentElement;
				if ( ! parent ) {
					return;
				}

				var expanded = parent.classList.toggle( 'is-expanded' );
				subToggle.setAttribute( 'aria-expanded', expanded ? 'true' : 'false' );

				// Accordion behavior: close other open submenus.
				var siblings = parent.parentElement
					? parent.parentElement.querySelectorAll( '.has-dropdown.is-expanded' )
					: [];
				siblings.forEach( function( sib ) {
					if ( sib !== parent ) {
						sib.classList.remove( 'is-expanded' );
						var t = sib.querySelector( '.nav-link.dropdown-toggle' );
						if ( t ) {
							t.setAttribute( 'aria-expanded', 'false' );
						}
					}
				} );
			} );
		} );

		// ----- Resize handler — close drawer + reset accordions on desktop -----
		window.addEventListener( 'resize', function() {
			if ( ! isMobile() ) {
				if ( drawer.classList.contains( 'is-open' ) ) {
					closeDrawer();
				}
				collapseAccordions();
			}
		}, { passive: true } );
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Quote Form — querystring pre-fill note
 *
 * When the URL has ?category=slug&product=name (from shop product
 * cards), show a pre-fill note in the GF form's HTML field:
 * "You're requesting a quote for: [Product] in [Category]."
 * The note is purely informational — GF handles the actual field
 * population via its native allowsPrepopulate feature.
 */
( function() {
	'use strict';

	function init() {
		var note = document.getElementById( 'quote-prefill-note' );
		if ( ! note ) {
			return;
		}

		try {
			var params = new URLSearchParams( window.location.search );
			var category = params.get( 'category' );
			var product  = params.get( 'product' );

			if ( ! category && ! product ) {
				return;
			}

			var parts = [];
			if ( product ) {
				parts.push( '<strong>' + product.replace( /-/g, ' ' ) + '</strong>' );
			}
			if ( category ) {
				parts.push( 'in <strong>' + category.replace( /-/g, ' ' ) + '</strong>' );
			}

			note.innerHTML = "You\u2019re requesting a quote for: " + parts.join( ' ' ) + '.';
			note.style.display = 'block';
		} catch ( e ) {
			// URLSearchParams not available — skip silently.
		}
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
} )();

/**
 * Before/After Slider — Rhino Service Detail pages
 *
 * The heavy lifting (drag, touch, keyboard) is handled by a native
 * <input type="range"> sitting on top of the stage. We just listen
 * for its "input" event and push the value to a --slider-pos CSS
 * custom property, which drives the clip-path on the "after" image
 * and the position of the divider + handle. No canvas, no raf loop,
 * no synthetic pointer events.
 */
( function() {
	'use strict';

	function init() {
		var stages = document.querySelectorAll( '[data-before-after]' );
		if ( ! stages.length ) {
			return;
		}

		stages.forEach( function( figure ) {
			var range = figure.querySelector( '.before-after__range' );
			var stage = figure.querySelector( '.before-after__stage' );
			if ( ! range || ! stage ) {
				return;
			}

			function apply() {
				stage.style.setProperty( '--slider-pos', range.value + '%' );
			}

			range.addEventListener( 'input', apply );
			range.addEventListener( 'change', apply );

			// Initial sync (in case the input has a non-default value).
			apply();
		} );
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

// Vehicle Type Selector IIFE removed from the homepage hero.
// Re-add when vehicle selector pills are implemented on /shop/.

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
