<?php
/**
 * Single Post — Rhino Custom Builds
 *
 * Dark post header with category tag, title, meta, and featured image.
 * Centered reading column (~720px) for the post content. Related posts
 * section below + CTA band at bottom.
 *
 * @package rhino-custom-builds-theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$phone_display = get_theme_mod( 'bmg_phone', '(555) 555-0123' );
$phone_link    = preg_replace( '/[^0-9+]/', '', (string) $phone_display );

$categories = get_the_category();
$cat_name   = ! empty( $categories ) ? $categories[0]->name : '';
$cat_id     = ! empty( $categories ) ? $categories[0]->term_id : 0;
?>

<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php // ===== Post header ================================================ ?>
		<header class="single-post-header" data-section="post-header">
			<div class="single-post-header__background"></div>
			<div class="single-post-header__overlay" aria-hidden="true"></div>
			<div class="single-post-header__grain" aria-hidden="true"></div>

			<div class="container position-relative">
				<div class="row justify-content-center">
					<div class="col-lg-10 col-xl-8 text-center">
						<?php if ( $cat_name ) : ?>
							<span class="single-post-header__category">
								<?php echo esc_html( strtoupper( $cat_name ) ); ?>
							</span>
						<?php endif; ?>

						<h1 class="single-post-header__title">
							<?php the_title(); ?>
						</h1>

						<div class="single-post-header__meta">
							<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
								<?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
							</time>
						</div>
					</div>
				</div>
			</div>
		</header>

		<?php // ===== Featured image (full-width below header) ================ ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="single-post-hero-image">
				<div class="container">
					<?php the_post_thumbnail( 'large', array(
						'class'    => 'single-post-hero-image__img',
						'loading'  => 'eager',
						'decoding' => 'async',
					) ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php // ===== Post content ============================================= ?>
		<article class="single-post-content" data-section="post-content">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8 col-xl-7">
						<div class="single-post-content__body">
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</div>
		</article>

	<?php endwhile; ?>

	<?php // ===== Related posts ================================================ ?>
	<?php
	$related = new WP_Query( array(
		'post_type'      => 'post',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
		'post__not_in'   => array( get_the_ID() ),
		'cat'            => $cat_id ?: '',
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	if ( $related->have_posts() ) :
		?>
		<section class="section-related-posts" data-section="related-posts">
			<div class="container">
				<header class="section-related-posts__header">
					<span class="section-related-posts__overline">
						<?php esc_html_e( 'KEEP READING', 'bmg-theme' ); ?>
					</span>
					<h2 class="section-related-posts__headline">
						<?php esc_html_e( 'MORE FROM THE BLOG.', 'bmg-theme' ); ?>
					</h2>
				</header>

				<div class="section-related-posts__grid" role="list">
					<?php
					while ( $related->have_posts() ) :
						$related->the_post();
						$rel_cats = get_the_category();
						$rel_cat  = ! empty( $rel_cats ) ? $rel_cats[0]->name : '';
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
										<span class="blog-card__placeholder-label"><?php echo esc_html( strtoupper( $rel_cat ?: 'BLOG' ) ); ?></span>
									</div>
								<?php endif; ?>
							</a>

							<div class="blog-card__body">
								<?php if ( $rel_cat ) : ?>
									<span class="blog-card__category"><?php echo esc_html( strtoupper( $rel_cat ) ); ?></span>
								<?php endif; ?>
								<h3 class="blog-card__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<div class="blog-card__meta">
									<time class="blog-card__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
										<?php echo esc_html( get_the_date( 'M j, Y' ) ); ?>
									</time>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php
		wp_reset_postdata();
	endif;
	?>

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
