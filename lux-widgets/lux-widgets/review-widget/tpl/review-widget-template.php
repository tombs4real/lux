<?php
	$unique_id = uniqid('lux_review_');
	$review_slides = $instance['lux_review_repeater'];
?>

<?php if (!empty($review_slides)) : ?>
		<div class="lux-review-container">
			<div class="lux-review owl-carousel" id="<?php echo($unique_id); ?>">
				<?php foreach ($review_slides as $review_slide) : ?>
					<?php
						// VARS 
						$review_bkg = wp_get_attachment_image_src($review_slide['lux_review_image'], 'full') ?? '';
						$review_bkg_url = $review_bkg[0] ?? '';
						$review_name = $review_slide['lux_review_name'] ?? '';
						$review_stars = $review_slide['lux_review_stars'] ?? '';
						$review_stars_num = intval($review_stars);
						$review = $review_slide['lux_review_review'] ?? '';
						$review_source = $review_slide['lux_review_source'] ?? '';
						$i = 1;
					?>
					<div class="lux-review-slide">
						<div class="lux-review-slide-img" <?php if ( !empty($review_bkg) ) : ?> style="background-image:url('<?php echo($review_bkg_url); ?>');"<?php endif; ?>></div>
						<div class="lux-review-slide-content">
							<div class="lux-review-slide-stars <?php echo($review_stars . '-stars'); ?>">
								<?php while( $i <= $review_stars_num ) {
									echo ('<svg xmlns="http://www.w3.org/2000/svg" width="28.392" height="27" viewBox="0 0 28.392 27"><path id="Path_631" data-name="Path 631" d="M15.193-23.625l4.562,8.648,9.635,1.666L22.57-6.3l1.392,9.677L15.193-.939,6.418,3.375,7.81-6.3,1-13.31l9.629-1.666Z" transform="translate(-0.997 23.625)" fill="#ae8a56"/></svg> ');
									$i++;
								} ?>
							</div>
							<div class="lux-review-name">
							<?php echo($review_name); ?> <span><?php echo($review_source); ?></span>
							</div>
							<div class="lux-review-review">
								<?php echo($review); ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
<?php else: ?>
	<p>No Slides in Review.</p>
<?php endif; ?>
			

