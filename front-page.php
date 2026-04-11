<?php
/**
 * Front Page Template
 *
 * Homepage — section-based layout.
 *
 * @package starter-theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<?php
	// Rhino Custom Builds — 7-section CRO sequence.
	// See CLAUDE.md → GSL Section Mapping → Homepage Section Map.

	// Section 1: Hero — dark full-viewport, vehicle selector + trust strip.
	get_template_part( 'template-parts/sections/section', 'hero' );

	// Section 2: Problem — warm-white loss-aversion pain blocks.
	get_template_part( 'template-parts/sections/section', 'problem' );

	// Section 3: Founder / Shop — dark, builders not salespeople.
	get_template_part( 'template-parts/sections/section', 'founder' );

	// Section 4: Features — six service category cards.
	get_template_part( 'template-parts/sections/section', 'features' );

	// Section 5: Proof — project cards, testimonials, stats, brand marquee.
	get_template_part( 'template-parts/sections/section', 'proof' );

	// Section 6: Process + FAQ — 4-step process with integrated accordion.
	get_template_part( 'template-parts/sections/section', 'process' );

	// Section 7: CTA — dual-CTA band (red primary + amber phone).
	get_template_part( 'template-parts/sections/section', 'cta' );
	?>

</main>

<?php
get_footer();
