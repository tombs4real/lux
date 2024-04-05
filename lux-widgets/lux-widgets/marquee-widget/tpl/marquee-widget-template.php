<?php
	$unique_id = uniqid('lux_marquee_');
	$marquee_slides = $instance['lux_marquee_repeater'];
?>

<?php if (!empty($marquee_slides)) : ?>
		<div class="lux-marquee-container">
			<div class="lux-marquee owl-carousel" id="<?php echo($unique_id); ?>">
				<?php foreach ($marquee_slides as $marquee_slide) : ?>
					<?php
						// VARS 
						$marquee_bkg = wp_get_attachment_image_src($marquee_slide['lux_marquee_image'], 'full') ?? '';
						$marquee_bkg_url = $marquee_bkg[0] ?? '';
						$marquee_title = $marquee_slide['lux_marquee_title'] ?? '';
						$marquee_title_heading = $marquee_slide['lux_marquee_title_heading'] ?? '';
						$marquee_subtitle = $marquee_slide['lux_marquee_subtitle'] ?? '';
						$marquee_desc = $marquee_slide['lux_marquee_desc'] ?? '';
						$marquee_btn_url = $marquee_slide['lux_marquee_btn_url'] ?? '';
						$marquee_btn_title = $marquee_slide['lux_marquee_btn_title'] ?? '';
					?>
					<div class="lux-marquee-slide" <?php if ( !empty($marquee_bkg) ) : ?> style="background-image:url('<?php echo($marquee_bkg_url); ?>');"<?php endif; ?>>
						<div class="lux-marquee-slide-content">

							<?php if ( !empty($marquee_title) ) : ?>
							<div class="lux-marquee-slide-title"><?php echo('<' . $marquee_title_heading . '>' . $marquee_title . '</' . $marquee_title_heading . '>'); ?></div>
							<?php endif; ?>

							<?php if ( !empty($marquee_subtitle) ) : ?>
							<div class="lux-marquee-slide-subtitle subhead"><?php echo($marquee_subtitle); ?></div>
							<?php endif; ?>

							<?php if ( !empty($marquee_desc) ) : ?>
							<div class="lux-marquee-slide-description"><?php echo($marquee_desc); ?></div>
							<?php endif; ?>

							<?php if ( !empty($marquee_btn_url) ) : ?>
							<div class="lux-marquee-slide-btn"><a href="<?php echo($marquee_btn_url); ?>" alt="<?php echo($marquee_btn_title); ?>" class="btn"><?php echo($marquee_btn_title); ?></a></div>
							<?php endif; ?>

						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
<?php else: ?>
	<p>No Slides in Marquee.</p>
<?php endif; ?>
			

