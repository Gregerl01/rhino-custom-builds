<?php
/**
 * Homepage Blog Preview — Rhino Custom Builds
 *
 * Shows the 3 most recent blog posts in a card grid. Hides entirely
 * if no posts exist. Placed between the Process/FAQ section and the
 * CTA in front-page.php.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

$blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

// Don't render the section if there are no posts.
if ( ! $blog_query->have_posts() ) {
	wp_reset_postdata();
	return;
}
?>

<section class="section-blog-preview" data-section="blog-preview">
	<div class="container">

		<header class="section-blog-preview__header">
			<span class="section-blog-preview__overline bmg-reveal">
				<?php esc_html_e( 'FROM THE SHOP FLOOR', 'bmg-theme' ); ?>
			</span>
			<h2 class="section-blog-preview__headline bmg-reveal">
				<?php esc_html_e( 'TIPS. BUILDS. BEHIND THE SCENES.', 'bmg-theme' ); ?>
			</h2>
		</header>

		<div class="section-blog-preview__grid bmg-reveal-stagger" role="list">
			<?php
			while ( $blog_query->have_posts() ) :
				$blog_query->the_post();
				$categories = get_the_category();
				$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
				?>
				<article class="blog-card bmg-reveal" role="listitem">

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

						<h3 class="blog-card__title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>

						<?php if ( has_excerpt() ) : ?>
							<p class="blog-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
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

		<div class="section-blog-preview__footer bmg-reveal">
			<a class="btn-rhino btn-rhino--ghost-light" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
				<span><?php esc_html_e( 'View All Posts', 'bmg-theme' ); ?></span>
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
					<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="square" stroke-linejoin="miter"/>
				</svg>
			</a>
		</div>

	</div>
</section>

<?php wp_reset_postdata(); ?>
