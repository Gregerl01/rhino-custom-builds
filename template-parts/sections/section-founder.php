<?php
/**
 * Homepage Founder / Shop Section — Rhino Custom Builds
 *
 * Dark split-column section.
 * Left: overline, H2, two paragraphs, ghost CTA.
 * Right: three credential badges + four feature bullets.
 *
 * Content: CONTENT.md → Homepage → Section 3 — Founder / Shop
 * Design:  CLAUDE.md → GSL Section Mapping → Founder/Shop
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline    = get_theme_mod( 'bmg_founder_overline', __( 'THE SHOP', 'bmg-theme' ) );
$headline    = get_theme_mod( 'bmg_founder_headline', __( 'RUN BY BUILDERS. NOT SALESPEOPLE.', 'bmg-theme' ) );
$paragraph_1 = get_theme_mod( 'bmg_founder_paragraph_1', __( 'Rhino Custom Builds started in 2014 with one spray gun, a two-bay garage, and a beat-up F-150 that needed a bedliner. The liner held. Friends asked. Friends of friends asked. Twelve years later, we run three install bays, a full parts inventory built for trucks, and a team that only hires installers with manufacturer certifications on the products they touch.', 'bmg-theme' ) );
$paragraph_2 = get_theme_mod( 'bmg_founder_paragraph_2', __( 'We don\'t subcontract. We don\'t outsource. Every coating, every bumper, every winch, every wiring harness — it all comes off our floor. If we installed it, we stand behind it. If we didn\'t, we\'ll still fix it. Walk into the shop any day and the person who\'ll work on your truck is the person who\'ll talk to you about it.', 'bmg-theme' ) );

// Three credential badges.
$badges = array(
	array(
		'number' => get_theme_mod( 'bmg_founder_badge_1_number', __( '12+', 'bmg-theme' ) ),
		'label'  => get_theme_mod( 'bmg_founder_badge_1_label', __( 'YEARS IN BUSINESS', 'bmg-theme' ) ),
	),
	array(
		'number' => get_theme_mod( 'bmg_founder_badge_2_number', __( '4,200+', 'bmg-theme' ) ),
		'label'  => get_theme_mod( 'bmg_founder_badge_2_label', __( 'INSTALLS COMPLETED', 'bmg-theme' ) ),
	),
	array(
		'number' => get_theme_mod( 'bmg_founder_badge_3_number', __( 'San Diego, CA', 'bmg-theme' ) ),
		'label'  => get_theme_mod( 'bmg_founder_badge_3_label', __( 'LOCALLY OWNED', 'bmg-theme' ) ),
	),
);

// Four feature bullets.
$features = array(
	array(
		'title' => get_theme_mod( 'bmg_founder_feature_1_title', __( 'Certified Installers', 'bmg-theme' ) ),
		'body'  => get_theme_mod( 'bmg_founder_feature_1_body', __( 'Manufacturer-trained on every product we touch.', 'bmg-theme' ) ),
	),
	array(
		'title' => get_theme_mod( 'bmg_founder_feature_2_title', __( 'OEM-Grade Parts', 'bmg-theme' ) ),
		'body'  => get_theme_mod( 'bmg_founder_feature_2_body', __( 'Authorized dealer for ARB, Fox, Warn, Rigid, Method, and more.', 'bmg-theme' ) ),
	),
	array(
		'title' => get_theme_mod( 'bmg_founder_feature_3_title', __( 'Lifetime Warranty', 'bmg-theme' ) ),
		'body'  => get_theme_mod( 'bmg_founder_feature_3_body', __( 'Every spray-on coating backed for life. No asterisks.', 'bmg-theme' ) ),
	),
	array(
		'title' => get_theme_mod( 'bmg_founder_feature_4_title', __( 'In-Bay Accountability', 'bmg-theme' ) ),
		'body'  => get_theme_mod( 'bmg_founder_feature_4_body', __( 'Three install bays. One team. No subcontractors.', 'bmg-theme' ) ),
	),
);

$cta_text = get_theme_mod( 'bmg_founder_cta_text', __( 'Meet the Team', 'bmg-theme' ) );
$cta_url  = get_theme_mod( 'bmg_founder_cta_url', '/about/' );
?>

<section id="founder" class="section-founder section-founder--dark" data-section="founder">
	<div class="section-founder__grain" aria-hidden="true"></div>

	<div class="container position-relative">
		<div class="row g-5 align-items-start">

			<?php // Left column — story + CTA ?>
			<div class="col-lg-6 section-founder__content">

				<?php if ( $overline ) : ?>
					<span class="section-founder__overline bmg-reveal">
						<?php echo esc_html( $overline ); ?>
					</span>
				<?php endif; ?>

				<?php if ( $headline ) : ?>
					<h2 class="section-founder__headline bmg-reveal">
						<?php echo esc_html( $headline ); ?>
					</h2>
				<?php endif; ?>

				<?php if ( $paragraph_1 ) : ?>
					<p class="section-founder__paragraph bmg-reveal">
						<?php echo esc_html( $paragraph_1 ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $paragraph_2 ) : ?>
					<p class="section-founder__paragraph bmg-reveal">
						<?php echo esc_html( $paragraph_2 ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $cta_text ) : ?>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="btn-rhino btn-rhino--ghost-dark section-founder__cta bmg-reveal">
						<span><?php echo esc_html( $cta_text ); ?></span>
						<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
							<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
						</svg>
					</a>
				<?php endif; ?>

			</div>

			<?php // Right column — credential badges + feature bullets ?>
			<div class="col-lg-6 section-founder__proof">

				<?php if ( ! empty( $badges ) ) : ?>
					<ul class="section-founder__badges bmg-reveal-stagger" role="list">
						<?php foreach ( $badges as $badge ) : ?>
							<li class="section-founder__badge bmg-reveal">
								<span class="section-founder__badge-number">
									<?php echo esc_html( $badge['number'] ); ?>
								</span>
								<span class="section-founder__badge-label">
									<?php echo esc_html( $badge['label'] ); ?>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ( ! empty( $features ) ) : ?>
					<ul class="section-founder__features bmg-reveal-stagger" role="list">
						<?php foreach ( $features as $feature ) : ?>
							<li class="section-founder__feature bmg-reveal">
								<svg class="section-founder__feature-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
								<div class="section-founder__feature-text">
									<h3 class="section-founder__feature-title">
										<?php echo esc_html( $feature['title'] ); ?>
									</h3>
									<p class="section-founder__feature-body">
										<?php echo esc_html( $feature['body'] ); ?>
									</p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

			</div>

		</div>
	</div>
</section>
