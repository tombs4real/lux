<?php
    $excerpt = !empty($post->post_excerpt) ? get_the_excerpt() : null;
    if (empty($excerpt)) {
        $excerpt = !empty($post->post_content) ? $post->post_content : null;
        $excerpt = strip_shortcodes( $excerpt );
        $excerpt = esc_attr( strip_tags( stripslashes( $excerpt ) ) );
        $excerpt = wp_trim_words( $excerpt, $num_words = 25, $more = NULL );
    }
?>

<?php  if ( ! post_password_required() ) { ?>
<meta name="keywords" content="<?php if(is_front_page() || is_home()){ bloginfo('name'); } else { echo get_the_title(); echo ' - '; echo bloginfo('name'); } ?>" />
<meta name="description" content="<?php if ( is_singular() && !empty($excerpt)) { echo $excerpt; } else { bloginfo('name'); }?>" />
<meta property="og:description" content="<?php if ( is_singular() && !empty($excerpt) ) { echo $excerpt; } else { bloginfo('name'); }?>" />
<meta property="og:title" content="<?php if(is_front_page() || is_home()){ bloginfo('name'); } else { echo get_the_title(); echo ' - '; echo bloginfo('name'); } ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo get_permalink(); ?>" />
<?php if( has_post_thumbnail() ) : ?>
<meta property="og:image" content="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'medium'); ?>" />
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image" />
<!--<meta name="twitter:site" content="@flickr" />-->
<meta name="twitter:title" content="<?php if(is_front_page() || is_home()){ bloginfo('name'); } else { echo get_the_title(); echo ' - '; echo bloginfo('name'); } ?>" />
<meta name="twitter:description" content="<?php if ( is_singular() && !empty($excerpt) ) { echo $excerpt; } else { bloginfo('name'); }?>" />
<?php if( has_post_thumbnail() ) : ?>
<meta name="twitter:image" content="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'medium'); ?>" />
<?php endif; ?>
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<?php } ?>
