<?php 

// VARS
$lux_card_layout = $instance['lux_card_layout'];
$lux_card_per_row = $instance['lux_card_per_row'];
$lux_cards = $instance['lux_card_repeater'];
$count = 1;

?>

<div id="lux-card-widget-container" class="<?php if ( !empty($lux_card_per_row) ) { echo 'lux-card-widget-container-' . $lux_card_per_row; } ?> <?php if ( !empty($lux_card_layout) ) { echo 'lux-card-widget-layout-' . $lux_card_layout; } ?>">

<?php if ( !empty($lux_cards) ) : ?>
  <?php foreach ($lux_cards as $card) : ?>
  <?php
    $card_img =         wp_kses_post($card['lux_card_image']);
    $card_img_url =     wp_get_attachment_url( $card_img );
    $card_title =       wp_kses_post($card['lux_card_title']);
    $card_title_color = wp_kses_post($card['lux_card_title_color']);
    $card_copy =        wp_kses_post($card['lux_card_content']);
    $card_btn_title =   wp_kses_post($card['lux_card_btn_title']);
    $card_btn_url =     wp_kses_post($card['lux_card_btn_url']);
    $card_btn_new_tab = wp_kses_post($card['lux_card_btn_url_new_tab']);
    $card_btn_color =   wp_kses_post($card['lux_card_btn_color']);
    $card_alignment =   wp_kses_post($card['lux_card_alignment']);
  ?>
  <!-- UU CARD WIDGET ITEM <?php echo $count; ?> -->
  <div class="lux-card-widget-card <?php if ( !empty($card_alignment) ) { echo $card_alignment . '-align'; } ?>">
    <?php if ( !empty($card_img) ) : ?>
      <div class="lux-card-widget-card-img" style="background-image:url('<?php echo$card_img_url; ?>');"></div>
    <?php endif; ?>
    <div class="lux-card-widget-card-body">
      <?php if ( !empty($card_title) ) : ?>
        <div class="lux-card-widget-card-title<?php if ( !empty($card_title_color) ) { echo '-' . $card_title_color; } ?>"><?php echo $card_title; ?></div>
      <?php endif; ?>
      <?php if ( !empty($card_copy) ) : ?>
        <div class="lux-card-widget-card-copy">
          <?php echo $card_copy; ?>
        </div>
      <?php endif; ?>
      <?php if ( !empty($card_btn_title) ) : ?>
        <a class="btn small <?php if ( !empty($card_btn_color) ) { echo $card_btn_color; } ?>" href="<?php echo $card_btn_url; ?>" <?php if ( $card_btn_new_tab == 1 ) : ?><?php echo('target="_blank"'); ?><?php endif; ?>  aria-label="Link to <?php echo $card_title; ?>">
          <?php echo $card_btn_title; ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <!-- END UU CARD WIDGET ITEM <?php echo $count; ?> -->
  <?php
    ++$count;
    endforeach;
  ?>
<?php else : ?>
  <p style="text-align:center;">No Cards Found.</p>
<?php endif; ?>

</div>