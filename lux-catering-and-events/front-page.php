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
					<div class="lux-marquee-banner-video-container">
						<?php include get_theme_file_path('inc/lux-planner.php'); ?>
						<div class="lux-marquee-banner-video">
							<iframe src="https://player.vimeo.com/video/151179707?h=3dfe4389d7&title=0&byline=0&portrait=0&background=1" title="LUX Test Background Video" width="640" height="360" frameborder="0" allow="autoplay" allowfullscreen></iframe>
          	</div>
					</div>
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