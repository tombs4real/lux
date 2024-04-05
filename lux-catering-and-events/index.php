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
			?>
			<!-- PAGE -->
			<div class="page-container">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="content">
              <?php the_content(); ?>
            </div>
				</article>
			</div>
			<!-- END PAGE -->
			<?php endwhile; ?>
		</main>
		<!-- END SITE MAIN -->

<?php get_footer(); ?>