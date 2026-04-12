<?php
/**
 * Homepage Proof Section — Rhino Custom Builds
 *
 * Warm-white proof section: three project cards → testimonials →
 * stats strip → brand logo marquee. Proof elements are woven (per
 * Phase 5 guideline #10: stars + stats + partners throughout, not
 * siloed in a "Reviews" section).
 *
 * Content:  CONTENT.md → Homepage → Section 5 — Proof
 * Design:   CLAUDE.md → GSL Section Mapping → Proof + Components #3, #7, #13
 * Motion:   references/rhino-build-spec.md → #5 Brand Carousel, #6 Project
 *           Card reveal+hover, #9 Trust Strip Counter
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$overline = get_theme_mod( 'bmg_proof_overline', __( 'REAL BUILDS. REAL TRUCKS.', 'bmg-theme' ) );
$headline = get_theme_mod( 'bmg_proof_headline', __( 'SEE THE WORK.', 'bmg-theme' ) );
$subline  = get_theme_mod( 'bmg_proof_subline', __( 'Every project below came off our floor.', 'bmg-theme' ) );

// ---------------------------------------------------------------------
// Three featured projects
// ---------------------------------------------------------------------
$project_defaults = array(
	1 => array(
		'title'    => 'Full Off-Road Build',
		'vehicle'  => '2022 Ford F-250 Super Duty',
		'services' => 'Lift · Bumpers · Winch · Lighting · Bedliner',
		'result'   => 'Trail-ready in 8 days',
		'url'      => '/gallery/',
	),
	2 => array(
		'title'    => 'Overland Build',
		'vehicle'  => '2023 Jeep Gladiator Rubicon',
		'services' => 'Roof Tent · Armor · Recovery Kit · Coatings',
		'result'   => '3,000-mile expedition tested',
		'url'      => '/gallery/',
	),
	3 => array(
		'title'    => 'Work Truck Upfit',
		'vehicle'  => '2021 RAM 1500',
		'services' => 'Spray-On Bedliner · Tonneau · Running Boards · Toolbox',
		'result'   => 'Delivered in 2 days',
		'url'      => '/gallery/',
	),
);

$projects = array();
foreach ( $project_defaults as $i => $d ) {
	$projects[] = array(
		'title'    => get_theme_mod( 'bmg_project_' . $i . '_title', $d['title'] ),
		'vehicle'  => get_theme_mod( 'bmg_project_' . $i . '_vehicle', $d['vehicle'] ),
		'services' => get_theme_mod( 'bmg_project_' . $i . '_services', $d['services'] ),
		'result'   => get_theme_mod( 'bmg_project_' . $i . '_result', $d['result'] ),
		'url'      => get_theme_mod( 'bmg_project_' . $i . '_url', $d['url'] ),
		'image'    => get_theme_mod( 'bmg_project_' . $i . '_image', '' ),
	);
}

$gallery_cta_text = get_theme_mod( 'bmg_proof_gallery_cta_text', __( 'View the Full Gallery', 'bmg-theme' ) );
$gallery_cta_url  = get_theme_mod( 'bmg_proof_gallery_cta_url', '/gallery/' );

// ---------------------------------------------------------------------
// Three testimonials
// ---------------------------------------------------------------------
$testimonial_defaults = array(
	1 => array(
		'quote'   => 'Dropped off my F-150 on a Monday, picked it up Wednesday with a spray liner that\'s held up through two winters of hauling firewood. You can tell it\'s bonded — no flex, no cracks, no trapped water.',
		'name'    => 'MIKE R.',
		'vehicle' => '2022 F-150',
		'service' => 'BEDLINER',
	),
	2 => array(
		'quote'   => 'Rhino built out my Gladiator for a 3,000-mile overland trip. Bumper, winch, lights, recovery, the whole kit. Clean wiring, no rattles, every bolt torqued. The difference between a shop build and a driveway build is obvious.',
		'name'    => 'JEN K.',
		'vehicle' => '2023 GLADIATOR',
		'service' => 'OVERLAND',
	),
	3 => array(
		'quote'   => 'We run 14 service trucks. Rhino coats every new one on intake and refreshes the old ones on a rotation we scheduled with them. Net-30 billing, one invoice per cycle, no downtime surprises.',
		'name'    => 'CARLOS D.',
		'vehicle' => 'FLEET MANAGER',
		'service' => '14 TRUCKS',
	),
);

$testimonials = array();
foreach ( $testimonial_defaults as $i => $d ) {
	$testimonials[] = array(
		'quote'   => get_theme_mod( 'bmg_testimonial_' . $i . '_quote', $d['quote'] ),
		'name'    => get_theme_mod( 'bmg_testimonial_' . $i . '_name', $d['name'] ),
		'vehicle' => get_theme_mod( 'bmg_testimonial_' . $i . '_vehicle', $d['vehicle'] ),
		'service' => get_theme_mod( 'bmg_testimonial_' . $i . '_service', $d['service'] ),
	);
}

// ---------------------------------------------------------------------
// Four stats
// ---------------------------------------------------------------------
$stat_defaults = array(
	1 => array(
		'number' => '4,200+',
		'label'  => 'INSTALLS COMPLETED',
	),
	2 => array(
		'number' => '35 YRS',
		'label'  => 'IN BUSINESS',
	),
	3 => array(
		'number' => '4.9★',
		'label'  => 'GOOGLE RATING',
	),
	4 => array(
		'number' => 'LIFETIME',
		'label'  => 'COATING WARRANTY',
	),
);

$stats = array();
foreach ( $stat_defaults as $i => $d ) {
	$stats[] = array(
		'number' => get_theme_mod( 'bmg_stat_' . $i . '_number', $d['number'] ),
		'label'  => get_theme_mod( 'bmg_stat_' . $i . '_label', $d['label'] ),
	);
}

// ---------------------------------------------------------------------
// Ten brand logos
// ---------------------------------------------------------------------
$brand_defaults = array(
	'ARB',
	'FOX',
	'WARN',
	'RIGID',
	'METHOD',
	'BFGOODRICH',
	'ROUGH COUNTRY',
	'BAJA DESIGNS',
	'SMITTYBILT',
	'RHINO-RACK',
);

$brands = array();
for ( $i = 1; $i <= 10; $i++ ) {
	$brands[] = array(
		'name'  => get_theme_mod( 'bmg_brand_' . $i . '_name', $brand_defaults[ $i - 1 ] ),
		'image' => get_theme_mod( 'bmg_brand_' . $i . '_image', '' ),
	);
}

$more_builds_cta_text = get_theme_mod( 'bmg_proof_more_builds_cta_text', __( 'See More Builds', 'bmg-theme' ) );
$more_builds_cta_url  = get_theme_mod( 'bmg_proof_more_builds_cta_url', '/gallery/' );
?>

<section id="proof" class="section-proof" data-section="proof">
	<div class="container">

		<header class="section-proof__header">
			<?php if ( $overline ) : ?>
				<span class="section-proof__overline bmg-reveal">
					<?php echo esc_html( $overline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $headline ) : ?>
				<h2 class="section-proof__headline bmg-reveal">
					<?php echo esc_html( $headline ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $subline ) : ?>
				<p class="section-proof__subline bmg-reveal">
					<?php echo esc_html( $subline ); ?>
				</p>
			<?php endif; ?>
		</header>

		<?php // Project cards grid. ?>
		<div class="section-proof__projects bmg-reveal-stagger" role="list">
			<?php foreach ( $projects as $project ) :
				if ( empty( $project['title'] ) ) {
					continue;
				}
				$tags = array_filter( array_map( 'trim', explode( '·', (string) $project['services'] ) ) );
				?>
				<a href="<?php echo esc_url( $project['url'] ); ?>" class="project-card bmg-reveal" role="listitem">

					<div class="project-card__media">
						<?php if ( $project['image'] ) : ?>
							<img src="<?php echo esc_url( $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] . ' — ' . $project['vehicle'] ); ?>" loading="lazy" decoding="async">
						<?php else : ?>
							<div class="project-card__placeholder" aria-hidden="true">
								<span class="project-card__placeholder-label">PROJECT 4:5</span>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $tags ) ) : ?>
							<ul class="project-card__tags" role="list">
								<?php foreach ( array_slice( $tags, 0, 3 ) as $tag ) : ?>
									<li class="project-card__tag"><?php echo esc_html( $tag ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>

					<div class="project-card__body">
						<h3 class="project-card__title">
							<span class="project-card__title-text"><?php echo esc_html( $project['title'] ); ?></span>
						</h3>
						<p class="project-card__vehicle">
							<?php echo esc_html( $project['vehicle'] ); ?>
						</p>
						<?php if ( $project['result'] ) : ?>
							<p class="project-card__result">
								<?php echo esc_html( $project['result'] ); ?>
							</p>
						<?php endif; ?>
					</div>

				</a>
			<?php endforeach; ?>
		</div>

		<?php if ( $gallery_cta_text ) : ?>
			<div class="section-proof__gallery-cta bmg-reveal">
				<a href="<?php echo esc_url( $gallery_cta_url ); ?>" class="btn-rhino btn-rhino--ghost-light">
					<span><?php echo esc_html( $gallery_cta_text ); ?></span>
					<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
					</svg>
				</a>
			</div>
		<?php endif; ?>

		<?php // Testimonials grid / carousel. ?>
		<div class="section-proof__testimonials bmg-reveal-stagger" role="list">
			<?php foreach ( $testimonials as $t ) :
				if ( empty( $t['quote'] ) ) {
					continue;
				}
				?>
				<figure class="testimonial-card bmg-reveal" role="listitem">
					<blockquote class="testimonial-card__quote">
						<?php echo esc_html( $t['quote'] ); ?>
					</blockquote>
					<figcaption class="testimonial-card__attribution">
						<?php
						$parts = array_filter( array( $t['name'], $t['vehicle'], $t['service'] ) );
						echo esc_html( implode( ' · ', $parts ) );
						?>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>

		<?php // Stats strip. ?>
		<ul class="section-proof__stats bmg-reveal" role="list">
			<?php foreach ( $stats as $stat ) :
				if ( empty( $stat['number'] ) ) {
					continue;
				}
				$parsed = bmg_parse_trust_item( $stat['number'] );
				?>
				<li class="section-proof__stat">
					<span class="section-proof__stat-number">
						<?php if ( $parsed ) : ?>
							<?php if ( $parsed['prefix'] ) : ?><span class="section-proof__stat-prefix"><?php echo esc_html( $parsed['prefix'] ); ?></span><?php endif; ?>
							<span class="section-proof__stat-count" data-count-to="<?php echo esc_attr( $parsed['count'] ); ?>" data-count-format="<?php echo esc_attr( $parsed['format'] ); ?>"><?php echo esc_html( $parsed['format'] ); ?></span>
							<?php if ( $parsed['plus'] ) : ?><span class="section-proof__stat-plus">+</span><?php endif; ?>
							<?php if ( $parsed['suffix'] ) : ?><span class="section-proof__stat-suffix"><?php echo esc_html( $parsed['suffix'] ); ?></span><?php endif; ?>
						<?php else : ?>
							<?php echo esc_html( $stat['number'] ); ?>
						<?php endif; ?>
					</span>
					<span class="section-proof__stat-label">
						<?php echo esc_html( $stat['label'] ); ?>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php // Brand logo carousel. ?>
		<div class="brand-carousel bmg-reveal" aria-label="<?php esc_attr_e( 'Authorized dealer partners', 'bmg-theme' ); ?>">
			<div class="brand-carousel__track" aria-hidden="false">
				<?php
				// Track duplicated for seamless wrap.
				for ( $pass = 0; $pass < 2; $pass++ ) :
					foreach ( $brands as $brand ) :
						if ( empty( $brand['name'] ) ) {
							continue;
						}
						$aria_hidden = $pass === 1 ? 'true' : 'false';
						?>
						<div class="brand-carousel__item" aria-hidden="<?php echo esc_attr( $aria_hidden ); ?>">
							<?php if ( $brand['image'] ) : ?>
								<img src="<?php echo esc_url( $brand['image'] ); ?>" alt="<?php echo esc_attr( $brand['name'] ); ?>" loading="lazy" decoding="async">
							<?php else : ?>
								<span class="brand-carousel__name"><?php echo esc_html( $brand['name'] ); ?></span>
							<?php endif; ?>
						</div>
						<?php
					endforeach;
				endfor;
				?>
			</div>
		</div>

		<?php if ( $more_builds_cta_text ) : ?>
			<div class="section-proof__more-cta bmg-reveal">
				<a href="<?php echo esc_url( $more_builds_cta_url ); ?>" class="btn-rhino btn-rhino--ghost-light">
					<span><?php echo esc_html( $more_builds_cta_text ); ?></span>
					<svg class="btn-rhino__arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
					</svg>
				</a>
			</div>
		<?php endif; ?>

	</div>
</section>
