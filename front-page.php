<?php
/**
 * Front Page Template
 *
 * BMG Homepage — 8 sections, refined luxury editorial aesthetic.
 *
 * @package BMG_Theme
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="main" class="site-main">

	<?php
	// Section 1: Hero — Full viewport, animated headline.
	get_template_part( 'template-parts/sections/section', 'hero' );

	// Section 2: What Is Concierge Medicine — Educational explainer.
	get_template_part( 'template-parts/sections/section', 'explainer' );

	// Section 3: Value Pillars — 4-column benefits.
	get_template_part( 'template-parts/sections/section', 'pillars' );

	// Section 4: Plans Overview — Three-tier cards.
	get_template_part( 'template-parts/sections/section', 'plans-overview' );

	// Section 5: Physician Preview — Doctor introduction.
	get_template_part( 'template-parts/sections/section', 'physician-preview' );

	// Section 6: FAQ Preview — Common questions accordion.
	get_template_part( 'template-parts/sections/section', 'faq-preview' );

	// Section 7: CTA — Consultation prompt.
	get_template_part( 'template-parts/sections/section', 'cta' );
	?>

</main>

<?php
get_footer();
