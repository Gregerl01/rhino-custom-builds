<?php
/**
 * Template Name: Gallery Page
 *
 * Filterable project showcase at /gallery/. Displays completed builds
 * in a grid with category filter pills and a click-to-view lightbox.
 * V1 uses content arrays — future versions may pull from a CPT.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
$projects      = function_exists( 'bmg_get_gallery_projects' ) ? bmg_get_gallery_projects() : array();

// Filter categories — derived from the data.
$filter_cats = array(
	'all'          => __( 'All', 'bmg-theme' ),
	'bedliners'    => __( 'Bedliners', 'bmg-theme' ),
	'coatings'     => __( 'Coatings', 'bmg-theme' ),
	'accessories'  => __( 'Accessories', 'bmg-theme' ),
	'off-road'     => __( 'Off-Road', 'bmg-theme' ),
	'fleet'        => __( 'Fleet', 'bmg-theme' ),
	'wheels-tires' => __( 'Wheels & Tires', 'bmg-theme' ),
);

// Category display labels for the card tags.
$cat_labels = array(
	'bedliners'    => __( 'BEDLINER', 'bmg-theme' ),
	'coatings'     => __( 'COATINGS', 'bmg-theme' ),
	'accessories'  => __( 'ACCESSORIES', 'bmg-theme' ),
	'off-road'     => __( 'OFF-ROAD', 'bmg-theme' ),
	'fleet'        => __( 'FLEET', 'bmg-theme' ),
	'wheels-tires' => __( 'WHEELS & TIRES', 'bmg-theme' ),
);
?>

<main id="main" class="site-main">

	<?php // ===== 1. Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'GALLERY', 'bmg-theme' ),
			'headline' => __( 'SEE THE WORK.', 'bmg-theme' ),
			'subline'  => __( 'Every project below came off our floor. Real trucks. Real builds. Real results.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== 2. Callout bar ================================================= ?>
	<?php
	get_template_part(
		'template-parts/components/callout',
		'install-bar',
		array( 'text' => __( "Like what you see? Let's build yours.", 'bmg-theme' ) )
	);
	?>

	<?php // ===== 3. Filter pills + Gallery grid ================================= ?>
	<section class="section-gallery" data-section="gallery">
		<div class="container">

			<?php // Filter pills ?>
			<div class="gallery-filters bmg-reveal" role="tablist" aria-label="<?php esc_attr_e( 'Filter projects by category', 'bmg-theme' ); ?>" data-gallery-filters>
				<?php foreach ( $filter_cats as $slug => $label ) : ?>
					<button
						type="button"
						class="gallery-filters__pill<?php echo 'all' === $slug ? ' gallery-filters__pill--active' : ''; ?>"
						role="tab"
						aria-selected="<?php echo 'all' === $slug ? 'true' : 'false'; ?>"
						data-filter="<?php echo esc_attr( $slug ); ?>"
					>
						<?php echo esc_html( $label ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php // Grid ?>
			<div class="gallery-grid bmg-reveal-stagger" role="list" data-gallery-grid>
				<?php foreach ( $projects as $i => $project ) :
					$cat_label = isset( $cat_labels[ $project['category'] ] ) ? $cat_labels[ $project['category'] ] : strtoupper( $project['category'] );
					?>
					<figure
						class="gallery-card bmg-reveal"
						role="listitem"
						data-category="<?php echo esc_attr( $project['category'] ); ?>"
						data-gallery-item="<?php echo esc_attr( $i ); ?>"
						data-description="<?php echo esc_attr( $project['description'] ); ?>"
					>
						<div class="gallery-card__media" tabindex="0" role="button" aria-label="<?php echo esc_attr( sprintf( __( 'View %s', 'bmg-theme' ), $project['title'] ) ); ?>">
							<?php if ( ! empty( $project['image'] ) ) : ?>
								<img src="<?php echo esc_url( $project['image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>" loading="lazy" decoding="async">
							<?php else : ?>
								<div class="gallery-card__placeholder" aria-hidden="true">
									<span class="gallery-card__placeholder-label"><?php echo esc_html( $cat_label ); ?></span>
								</div>
							<?php endif; ?>

							<div class="gallery-card__overlay">
								<span class="gallery-card__tag"><?php echo esc_html( $cat_label ); ?></span>
								<h3 class="gallery-card__title"><?php echo esc_html( $project['title'] ); ?></h3>
								<p class="gallery-card__vehicle"><?php echo esc_html( $project['vehicle'] ); ?></p>
							</div>
						</div>
					</figure>
				<?php endforeach; ?>
			</div>

		</div>
	</section>

	<?php // ===== 4. Instagram callout =========================================== ?>
	<section class="section-gallery-social" data-section="gallery-social">
		<div class="container">
			<div class="section-gallery-social__card bmg-reveal">
				<span class="section-gallery-social__label"><?php esc_html_e( 'WANT TO SEE MORE?', 'bmg-theme' ); ?></span>
				<p class="section-gallery-social__body">
					<?php esc_html_e( 'Follow us on Instagram for daily build updates.', 'bmg-theme' ); ?>
				</p>
				<a class="btn-rhino btn-rhino--ghost-light section-gallery-social__cta" href="https://instagram.com/" target="_blank" rel="noopener noreferrer">
					<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
						<rect x="2" y="2" width="20" height="20" rx="5"/>
						<path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
						<line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
					</svg>
					<span><?php esc_html_e( 'Follow @rhinocustombuilds', 'bmg-theme' ); ?></span>
				</a>
			</div>
		</div>
	</section>

	<?php // ===== 5. CTA ========================================================= ?>
	<section class="section-cta section-cta--dark" data-section="cta">
		<div class="section-cta__grain" aria-hidden="true"></div>
		<div class="container position-relative">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-9 text-center">
					<span class="section-cta__overline bmg-reveal"><?php esc_html_e( 'READY WHEN YOU ARE', 'bmg-theme' ); ?></span>
					<h2 class="section-cta__headline bmg-reveal"><?php esc_html_e( 'BUILD IT RIGHT. BUILD IT HERE.', 'bmg-theme' ); ?></h2>
					<p class="section-cta__subline bmg-reveal"><?php esc_html_e( 'Free quotes. No pressure. One business day turnaround.', 'bmg-theme' ); ?></p>
					<div class="section-cta__actions bmg-reveal">
						<a href="<?php echo esc_url( home_url( '/quote/' ) ); ?>" class="btn-rhino btn-rhino--primary">
							<span><?php esc_html_e( 'Get a Quote', 'bmg-theme' ); ?></span>
							<svg width="16" height="16" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/></svg>
						</a>
						<a href="tel:<?php echo esc_attr( $phone_link ); ?>" class="btn-rhino btn-rhino--phone">
							<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 4h4l2 5-3 2a12 12 0 0 0 5 5l2-3 5 2v4a2 2 0 0 1-2 2A17 17 0 0 1 3 6a2 2 0 0 1 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/></svg>
							<span class="section-cta__phone-label"><?php esc_html_e( 'or call', 'bmg-theme' ); ?></span>
							<span class="section-cta__phone-number"><?php echo esc_html( $phone_display ); ?></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

</main>

<?php // ===== Lightbox (hidden by default, activated by JS) ================== ?>
<div class="gallery-lightbox" data-gallery-lightbox aria-hidden="true" role="dialog" aria-label="<?php esc_attr_e( 'Project detail', 'bmg-theme' ); ?>">
	<button class="gallery-lightbox__close" type="button" data-gallery-lightbox-close aria-label="<?php esc_attr_e( 'Close', 'bmg-theme' ); ?>">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
			<path d="M6 6l12 12M18 6l-12 12" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
		</svg>
	</button>
	<div class="gallery-lightbox__content">
		<div class="gallery-lightbox__media"></div>
		<div class="gallery-lightbox__info">
			<span class="gallery-lightbox__tag"></span>
			<h3 class="gallery-lightbox__title"></h3>
			<p class="gallery-lightbox__vehicle"></p>
			<p class="gallery-lightbox__description"></p>
		</div>
	</div>
</div>

<?php get_footer(); ?>
