<?php
/**
 * @package lux
 */
get_header();
?>
		<!-- SITE MAIN -->
		<main id="site_main" class="site_main">
			<?php 
				while ( have_posts() ) :
				the_post(); 
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			?>
			<!-- PAGE -->
			<div class="page-container">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if( !is_front_page() ) : ?>
						<div class="page-header" style="background-image:url('<?php echo( esc_url($featured_img_url) ); ?>');">
							<div class="page-header-content">
								<div class="page-breadcrumbs">
									<a href="/">Home</a> <a href="/blog">Blog</a> <?php if ( $post->post_parent ) { echo('<a href="'. get_permalink( $post->post_parent ) .'" >'. get_the_title( $post->post_parent ) .'</a>'); } ?>
								</div>
								<?php the_title('<h1>', '</h1>'); ?>
								<?php // the_excerpt(); ?>
							</div>
						</div>
						<?php endif; ?>
						<div class="content">
							<div class="content-container">
              	<?php the_content(); ?>
							</div>
            </div>
				</article>
			</div>
			<!-- END PAGE -->
			<?php endwhile; ?>
		</main>
		<!-- END SITE MAIN -->

<?php get_footer(); ?>