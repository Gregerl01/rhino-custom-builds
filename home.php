<?php
/**
 * Blog Archive — Rhino Custom Builds
 *
 * This is home.php — WordPress uses it for the Posts page (the page
 * assigned as "Posts page" in Settings → Reading). Dark page header
 * + post card grid + pagination.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );
?>

<main id="main" class="site-main">

	<?php // ===== Page header ================================================ ?>
	<?php
	get_template_part(
		'template-parts/sections/section',
		'page-header',
		array(
			'overline' => __( 'BLOG', 'bmg-theme' ),
			'headline' => __( 'FROM THE SHOP FLOOR.', 'bmg-theme' ),
			'subline'  => __( 'Tips, builds, and behind-the-scenes from the Rhino team.', 'bmg-theme' ),
		)
	);
	?>

	<?php // ===== Callout bar ================================================= ?>
	<?php
	get_template_part(
		'template-parts/components/callout',
		'install-bar',
		array( 'text' => __( 'Like what you read? We build what we write about.', 'bmg-theme' ) )
	);
	?>

	<?php // ===== Post grid ==================================================== ?>
	<section class="section-blog-archive" data-section="blog-archive">
		<div class="container">

			<?php if ( have_posts() ) : ?>
				<div class="section-blog-archive__grid" role="list">
					<?php
					while ( have_posts() ) :
						the_post();
						$categories = get_the_category();
						$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
						?>
						<article class="blog-card" role="listitem">

							<a class="blog-card__media" href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail( 'medium_large', array(
										'class'    => 'blog-card__image',
										'loading'  => 'lazy',
										'decoding' => 'async',
									) ); ?>
								<?php else : ?>
									<div class="blog-card__placeholder" aria-hidden="true">
										<span class="blog-card__placeholder-label"><?php echo esc_html( strtoupper( $cat_name ?: 'BLOG' ) ); ?></span>
									</div>
								<?php endif; ?>
							</a>

							<div class="blog-card__body">
								<?php if ( $cat_name ) : ?>
									<span class="blog-card__category"><?php echo esc_html( strtoupper( $cat_name ) ); ?></span>
								<?php endif; ?>

								<h2 class="blog-card__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>

								<?php if ( has_excerpt() ) : ?>
									<p class="blog-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
								<?php else : ?>
									<p class="blog-card__excerpt"><?php echo esc_html( wp_trim_words( get_the_content(), 25 ) ); ?></p>
								<?php endif; ?>

								<div class="blog-card__meta">
									<time class="blog-card__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
										<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
									</time>
									<a class="blog-card__read-more" href="<?php the_permalink(); ?>">
										<?php esc_html_e( 'Read More', 'bmg-theme' ); ?>
										<svg width="12" height="12" viewBox="0 0 24 24" fill="none" aria-hidden="true">
											<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
										</svg>
									</a>
								</div>
							</div>

						</article>
					<?php endwhile; ?>
				</div>

				<?php // Pagination ?>
				<nav class="section-blog-archive__pagination" aria-label="<?php esc_attr_e( 'Blog pagination', 'bmg-theme' ); ?>">
					<?php
					the_posts_pagination( array(
						'mid_size'           => 1,
						'prev_text'          => __( '← Previous', 'bmg-theme' ),
						'next_text'          => __( 'Next →', 'bmg-theme' ),
						'screen_reader_text' => __( 'Posts navigation', 'bmg-theme' ),
					) );
					?>
				</nav>

			<?php else : ?>
				<p class="section-blog-archive__empty">
					<?php esc_html_e( 'No posts yet. Check back soon.', 'bmg-theme' ); ?>
				</p>
			<?php endif; ?>

		</div>
	</section>

	<?php // ===== CTA ========================================================= ?>
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

<?php get_footer(); ?>
