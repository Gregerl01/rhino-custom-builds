<?php
/**
 * Template Name: Service Detail
 *
 * Slug-based service detail template. Reads the current page's slug,
 * looks up its content array via bmg_get_service_content(), and
 * renders all 9 service detail sections in order. One template serves
 * all 5 service pages (Bedliners, Coatings, Accessories, Off-Road,
 * Fleet) — the content registry in inc/service-content.php controls
 * what each page shows.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$slug    = get_post_field( 'post_name', get_the_ID() );
$service = function_exists( 'bmg_get_service_content' ) ? bmg_get_service_content( $slug ) : null;

// Fallback when the slug has no entry in the registry yet.
if ( ! $service ) {
	?>
	<main id="main" class="site-main">
		<section class="section-service-hero section-service-hero--dark" data-section="service-hero">
			<div class="section-service-hero__overlay" aria-hidden="true"></div>
			<div class="container position-relative">
				<div class="row">
					<div class="col-lg-10">
						<h1 class="section-service-hero__headline">
							<?php the_title(); ?>
						</h1>
						<p class="section-service-hero__subline">
							<?php esc_html_e( '[CONTENT TBD — service detail content not yet registered for this slug.]', 'bmg-theme' ); ?>
						</p>
					</div>
				</div>
			</div>
		</section>
	</main>
	<?php
	get_footer();
	return;
}

// Phone fallback used in the CTA section + service hero tel: link.
$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
?>

<main id="main" class="site-main">

	<?php // ===== 1. Service Hero ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'service-hero',
		array( 'hero' => $service['hero'] )
	);
	?>

	<?php // ===== 2. Problem ===================================================== ?>
	<?php if ( ! empty( $service['problem'] ) ) :
		$problem = $service['problem'];
		?>
		<section class="section-problem" data-section="problem">
			<div class="container">
				<header class="section-problem__header">
					<?php if ( ! empty( $problem['overline'] ) ) : ?>
						<span class="section-problem__overline bmg-reveal"><?php echo esc_html( $problem['overline'] ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $problem['headline'] ) ) : ?>
						<h2 class="section-problem__headline bmg-reveal"><?php echo esc_html( $problem['headline'] ); ?></h2>
					<?php endif; ?>
				</header>

				<?php if ( ! empty( $problem['blocks'] ) ) : ?>
					<div class="section-problem__blocks bmg-reveal-stagger" role="list">
						<?php foreach ( $problem['blocks'] as $block ) : ?>
							<article class="section-problem__block bmg-reveal" role="listitem">
								<?php if ( ! empty( $block['overline'] ) ) : ?>
									<span class="section-problem__block-overline"><?php echo esc_html( $block['overline'] ); ?></span>
								<?php endif; ?>
								<?php if ( ! empty( $block['title'] ) ) : ?>
									<h3 class="section-problem__block-title"><?php echo esc_html( $block['title'] ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $block['body'] ) ) : ?>
									<p class="section-problem__block-body"><?php echo esc_html( $block['body'] ); ?></p>
								<?php endif; ?>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 3. Coating Tiers (features variant) ============================ ?>
	<?php if ( ! empty( $service['tiers'] ) ) :
		$tiers = $service['tiers'];
		?>
		<section class="section-coating-tiers" data-section="coating-tiers">
			<div class="container">
				<header class="section-coating-tiers__header">
					<?php if ( ! empty( $tiers['overline'] ) ) : ?>
						<span class="section-coating-tiers__overline bmg-reveal"><?php echo esc_html( $tiers['overline'] ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $tiers['headline'] ) ) : ?>
						<h2 class="section-coating-tiers__headline bmg-reveal"><?php echo esc_html( $tiers['headline'] ); ?></h2>
					<?php endif; ?>
				</header>

				<?php if ( ! empty( $tiers['cards'] ) ) : ?>
					<div class="section-coating-tiers__grid bmg-reveal-stagger" role="list">
						<?php foreach ( $tiers['cards'] as $card ) :
							$card_class = 'coating-tier-card bmg-reveal';
							if ( ! empty( $card['recommended'] ) ) {
								$card_class .= ' coating-tier-card--recommended';
							}
							?>
							<article class="<?php echo esc_attr( $card_class ); ?>" role="listitem">
								<?php if ( ! empty( $card['recommended'] ) ) : ?>
									<span class="coating-tier-card__badge"><?php esc_html_e( 'RECOMMENDED', 'bmg-theme' ); ?></span>
								<?php endif; ?>

								<h3 class="coating-tier-card__name"><?php echo esc_html( $card['name'] ); ?></h3>

								<?php if ( ! empty( $card['best_for'] ) ) : ?>
									<p class="coating-tier-card__best-for">
										<span class="coating-tier-card__best-for-label"><?php esc_html_e( 'Best for', 'bmg-theme' ); ?></span>
										<?php echo esc_html( $card['best_for'] ); ?>
									</p>
								<?php endif; ?>

								<?php if ( ! empty( $card['highlights'] ) ) : ?>
									<ul class="coating-tier-card__highlights">
										<?php foreach ( $card['highlights'] as $highlight ) : ?>
											<li>
												<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
													<path d="M5 12l5 5L20 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="square" stroke-linejoin="miter"/>
												</svg>
												<?php echo esc_html( $highlight ); ?>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>

								<a class="btn-rhino btn-rhino--ghost-light coating-tier-card__cta" href="<?php echo esc_url( home_url( '/quote/' ) ); ?>">
									<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
									<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
										<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
									</svg>
								</a>
							</article>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 4. Before / After =============================================== ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'before-after',
		array( 'before_after' => $service['before_after'] ?? array() )
	);
	?>

	<?php // ===== 5. Process ===================================================== ?>
	<?php if ( ! empty( $service['process'] ) ) :
		$process = $service['process'];
		?>
		<section class="section-process section-process--service" data-section="process">
			<div class="container">
				<header class="section-process__header">
					<?php if ( ! empty( $process['overline'] ) ) : ?>
						<span class="section-process__overline bmg-reveal"><?php echo esc_html( $process['overline'] ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $process['headline'] ) ) : ?>
						<h2 class="section-process__headline bmg-reveal"><?php echo esc_html( $process['headline'] ); ?></h2>
					<?php endif; ?>
				</header>

				<?php if ( ! empty( $process['steps'] ) ) : ?>
					<ol class="section-process__steps bmg-reveal-stagger">
						<?php foreach ( $process['steps'] as $i => $step ) :
							$num = str_pad( (string) ( $i + 1 ), 2, '0', STR_PAD_LEFT );
							?>
							<li class="section-process__step bmg-reveal">
								<span class="section-process__step-number"><?php echo esc_html( $num ); ?></span>
								<h3 class="section-process__step-title"><?php echo esc_html( $step['title'] ); ?></h3>
								<p class="section-process__step-body"><?php echo esc_html( $step['body'] ); ?></p>
							</li>
						<?php endforeach; ?>
					</ol>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 6. Pricing ===================================================== ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'pricing-starting',
		array( 'pricing' => $service['pricing'] ?? array() )
	);
	?>

	<?php // ===== 7. Proof (stats + testimonials) ================================ ?>
	<?php if ( ! empty( $service['proof'] ) ) :
		$proof = $service['proof'];
		?>
		<section class="section-proof section-proof--service" data-section="proof">
			<div class="container">

				<?php if ( ! empty( $proof['stats'] ) ) : ?>
					<ul class="section-proof__stats bmg-reveal" role="list">
						<?php foreach ( $proof['stats'] as $stat ) :
							$parsed = function_exists( 'bmg_parse_trust_item' ) ? bmg_parse_trust_item( $stat['number'] ) : null;
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
								<span class="section-proof__stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ( ! empty( $proof['testimonials'] ) ) : ?>
					<div class="section-proof__testimonials bmg-reveal-stagger" role="list">
						<?php foreach ( $proof['testimonials'] as $t ) :
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
									$parts = array_filter( array( $t['name'] ?? '', $t['vehicle'] ?? '', $t['service'] ?? '' ) );
									echo esc_html( implode( ' · ', $parts ) );
									?>
								</figcaption>
							</figure>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 8. FAQ ========================================================== ?>
	<?php if ( ! empty( $service['faq'] ) ) :
		$faq = $service['faq'];
		?>
		<section class="section-service-faq" data-section="service-faq">
			<div class="container">
				<header class="section-service-faq__header">
					<?php if ( ! empty( $faq['overline'] ) ) : ?>
						<span class="section-service-faq__overline bmg-reveal"><?php echo esc_html( $faq['overline'] ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $faq['headline'] ) ) : ?>
						<h2 class="section-service-faq__headline bmg-reveal"><?php echo esc_html( $faq['headline'] ); ?></h2>
					<?php endif; ?>
				</header>

				<?php if ( ! empty( $faq['items'] ) ) :
					$faq_id = 'service-faq-' . esc_attr( $slug );
					?>
					<div class="accordion section-service-faq__accordion bmg-reveal" id="<?php echo esc_attr( $faq_id ); ?>">
						<?php foreach ( $faq['items'] as $i => $item ) :
							$hid = $faq_id . '-heading-' . ( $i + 1 );
							$cid = $faq_id . '-collapse-' . ( $i + 1 );
							?>
							<div class="accordion-item">
								<h3 class="accordion-header" id="<?php echo esc_attr( $hid ); ?>">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $cid ); ?>" aria-expanded="false" aria-controls="<?php echo esc_attr( $cid ); ?>">
										<?php echo esc_html( $item['question'] ); ?>
									</button>
								</h3>
								<div id="<?php echo esc_attr( $cid ); ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo esc_attr( $hid ); ?>" data-bs-parent="#<?php echo esc_attr( $faq_id ); ?>">
									<div class="accordion-body"><?php echo esc_html( $item['answer'] ); ?></div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>

	<?php // ===== 9. CTA ========================================================= ?>
	<?php if ( ! empty( $service['cta'] ) ) :
		$cta = $service['cta'];
		?>
		<section class="section-cta section-cta--dark" data-section="cta">
			<div class="section-cta__grain" aria-hidden="true"></div>
			<div class="container position-relative">
				<div class="row justify-content-center">
					<div class="col-lg-10 col-xl-9 text-center">
						<?php if ( ! empty( $cta['overline'] ) ) : ?>
							<span class="section-cta__overline bmg-reveal"><?php echo esc_html( $cta['overline'] ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $cta['headline'] ) ) : ?>
							<h2 class="section-cta__headline bmg-reveal"><?php echo esc_html( $cta['headline'] ); ?></h2>
						<?php endif; ?>
						<?php if ( ! empty( $cta['subline'] ) ) : ?>
							<p class="section-cta__subline bmg-reveal"><?php echo esc_html( $cta['subline'] ); ?></p>
						<?php endif; ?>

						<div class="section-cta__actions bmg-reveal">
							<a href="<?php echo esc_url( home_url( $cta['cta_url'] ?? '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
								<span><?php echo esc_html( $cta['cta_label'] ?? __( 'Get a Quote', 'bmg-theme' ) ); ?></span>
								<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
							</a>
							<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
								<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
									<path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
								</svg>
								<span class="section-cta__phone-label"><?php esc_html_e( 'or call', 'bmg-theme' ); ?></span>
								<span class="section-cta__phone-number"><?php echo esc_html( $phone_display ); ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>
