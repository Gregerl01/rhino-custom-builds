<?php
/**
 * Homepage Problem Section — Rhino Custom Builds
 *
 * Warm-white section introducing the three loss-aversion pain blocks
 * (rust, drop-in failure, DIY warranty voiding). Dark → light transition
 * section, so uses an extra 128px top padding per design spec.
 *
 * Content: CONTENT.md → Homepage → Section 2 — Problem
 * Design:  CLAUDE.md → GSL Section Mapping → Problem
 * Motion:  references/rhino-build-spec.md → Scroll reveal stagger (60ms, 16px)
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline = get_theme_mod( 'bmg_problem_overline', __( 'THE WRONG BUILD COSTS YOU TWICE', 'bmg-theme' ) );
$headline = get_theme_mod( 'bmg_problem_headline', __( 'CHEAP UPGRADES DON\'T SURVIVE REAL WORK.', 'bmg-theme' ) );
$intro    = get_theme_mod( 'bmg_problem_intro', __( 'Drop-in liners crack. Bolt-on parts rattle loose. DIY installs void factory warranty. We see it every week — and we\'ve fixed it every way.', 'bmg-theme' ) );

$blocks = array(
	1 => array(
		'overline' => get_theme_mod( 'bmg_problem_block_1_overline', __( '01 / RUST NEVER SLEEPS', 'bmg-theme' ) ),
		'title'    => get_theme_mod( 'bmg_problem_block_1_title', __( 'Factory undercoating fails fast.', 'bmg-theme' ) ),
		'body'     => get_theme_mod( 'bmg_problem_block_1_body', __( 'Every salted road, wet jobsite, and winter rainstorm thins the thin coating your truck came with. By year three, rust is eating frame rails you can\'t see. By year five, it\'s structural.', 'bmg-theme' ) ),
	),
	2 => array(
		'overline' => get_theme_mod( 'bmg_problem_block_2_overline', __( '02 / DROP-INS TRAP WATER', 'bmg-theme' ) ),
		'title'    => get_theme_mod( 'bmg_problem_block_2_title', __( 'Plastic liners rust your bed.', 'bmg-theme' ) ),
		'body'     => get_theme_mod( 'bmg_problem_block_2_body', __( 'Bolt-in liners flex every time you load the bed. Water works underneath. You pull the liner out in year four and find a rusted truck bed you can\'t sell.', 'bmg-theme' ) ),
	),
	3 => array(
		'overline' => get_theme_mod( 'bmg_problem_block_3_overline', __( '03 / DIY VOIDS WARRANTY', 'bmg-theme' ) ),
		'title'    => get_theme_mod( 'bmg_problem_block_3_title', __( 'Bad installs kill coverage.', 'bmg-theme' ) ),
		'body'     => get_theme_mod( 'bmg_problem_block_3_body', __( 'Wrong torque. Cut harnesses. Drilled mounts in the wrong spot. Every one is a reason a manufacturer denies a warranty claim — and you pay out of pocket.', 'bmg-theme' ) ),
	),
);

$bridge   = get_theme_mod( 'bmg_problem_bridge', __( 'Do it once. Do it right. Do it here.', 'bmg-theme' ) );
$cta_text = get_theme_mod( 'bmg_problem_cta_text', __( 'See How We Build It', 'bmg-theme' ) );
$cta_url  = get_theme_mod( 'bmg_problem_cta_url', '#founder' );
?>

<section id="problem" class="section-problem" data-section="problem">
	<div class="container">

		<header class="section-problem__header">
			<?php if ( $overline ) : ?>
				<span class="section-problem__overline bmg-reveal">
					<?php echo esc_html( $overline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $headline ) : ?>
				<h2 class="section-problem__headline bmg-reveal">
					<?php echo esc_html( $headline ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $intro ) : ?>
				<p class="section-problem__intro bmg-reveal">
					<?php echo esc_html( $intro ); ?>
				</p>
			<?php endif; ?>
		</header>

		<div class="section-problem__blocks bmg-reveal-stagger" role="list">
			<?php foreach ( $blocks as $i => $block ) : ?>
				<article class="section-problem__block bmg-reveal" role="listitem">
					<?php if ( $block['overline'] ) : ?>
						<span class="section-problem__block-overline">
							<?php echo esc_html( $block['overline'] ); ?>
						</span>
					<?php endif; ?>

					<?php if ( $block['title'] ) : ?>
						<h3 class="section-problem__block-title">
							<?php echo esc_html( $block['title'] ); ?>
						</h3>
					<?php endif; ?>

					<?php if ( $block['body'] ) : ?>
						<p class="section-problem__block-body">
							<?php echo esc_html( $block['body'] ); ?>
						</p>
					<?php endif; ?>
				</article>
			<?php endforeach; ?>
		</div>

		<footer class="section-problem__footer bmg-reveal">
			<?php if ( $bridge ) : ?>
				<p class="section-problem__bridge">
					<?php echo esc_html( $bridge ); ?>
				</p>
			<?php endif; ?>

			<?php if ( $cta_text ) : ?>
				<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-rhino btn-rhino--primary section-problem__cta">
					<span><?php echo esc_html( $cta_text ); ?></span>
					<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
					</svg>
				</a>
			<?php endif; ?>
		</footer>

	</div>
</section>
