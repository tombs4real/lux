<?php
/**
 * The header for lux
 *
 * @package lux
 */

//  VARS
$header_layout = rwmb_meta( 'lux_theme_header', ['object_type' => 'setting'], 'lux-theme-settings' );
$site_header_location = 'site_header_menu1';
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <title>
      <?php
        bloginfo('name');
        if (wp_title('', false)) {
            echo '|';
        } else {
            echo bloginfo('description');
        } wp_title('');
        ?>
    </title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#cc0000">
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>

    <!-- ANALYTICS -->
    <?php include get_theme_file_path('inc/tracking.php'); ?>
    <!-- END ANALYTICS -->

    <!-- META/OG TAGS -->
    <?php include get_theme_file_path('inc/meta.php'); ?>
    <!-- END META/OG TAGS -->

    <!-- WP HEAD -->
    <?php wp_head(); ?>
    <!-- END WP HEAD -->

</head>

<body <?php body_class('uu-body'); ?>>
    <!-- WP BODY OPEN -->
    <?php wp_body_open(); ?>
    <!-- END WP BODY OPEN -->

    <!-- SITE CONTAINER -->
	  <div class="site-container">

    <!-- SITE HEADER -->
    <header id="site_header" class="site-header <?php if ( !empty($header_layout)) { echo($header_layout); }; ?>">
      <div class="site-header-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Visit LUX Catering & Events Homepage">
        <svg class="site-header-logo-container" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="145.343" height="183.905" viewBox="0 0 145.343 183.905">
          <g id="lux_main_logo" data-name="lux-main-logo">
            <path id="Path_634" data-name="Path 634" d="M180.775,2.928a2.9,2.9,0,0,1,.838-2.079,2.693,2.693,0,0,1,2-.85,2.737,2.737,0,0,1,2.013.849,2.923,2.923,0,0,1,.823,2.078,2.867,2.867,0,0,1-.823,2.061,2.709,2.709,0,0,1-2.013.865,2.669,2.669,0,0,1-2-.865,2.834,2.834,0,0,1-.838-2.061m.607,0a2.312,2.312,0,0,0,.64,1.677,2.086,2.086,0,0,0,1.586.672,2.121,2.121,0,0,0,1.6-.673,2.337,2.337,0,0,0,.628-1.678,2.357,2.357,0,0,0-.628-1.694,2.143,2.143,0,0,0-1.6-.657,2.106,2.106,0,0,0-1.586.658,2.335,2.335,0,0,0-.64,1.695m1.158-1.791h1.25q1.135-.008,1.135,1.019a1.014,1.014,0,0,1-.241.73,1.033,1.033,0,0,1-.6.265l.947,1.4h-.656l-.951-1.389H183.1V4.556h-.56Zm.56,1.5h.391a1.932,1.932,0,0,0,.613-.072.4.4,0,0,0,.261-.412.406.406,0,0,0-.23-.4,1.374,1.374,0,0,0-.517-.088H183.1Z" transform="translate(-67.444 0)" />
            <path id="Path_635" data-name="Path 635" d="M91.105,130.626c-1.747.29-3.609.592-5.551.9,2.864-8.725,5.72-17.448,7.221-22.237,16.945,27.778,31.5,56.086,52.568,80.1a22.27,22.27,0,0,0-2.966-7.915c-14.963-26.233-30.045-52.4-44.811-78.739A14.1,14.1,0,0,1,96.2,93.313c5.808-23.042,10.254-42.292,16.3-65.275.658-2.5,2.7-8.8,3.108-11.368s-3.687-2.663-4.877-.16C99.549,40.031,93.859,59.767,85.471,83.176,84,81.2,82.987,79.937,82.085,78.6,74.728,67.685,67.418,56.742,60.027,45.852c-1.221-1.8-2.467-3.924-4.249-4.9-1.536-.842-4.628-3.182-5.822-.313a6.2,6.2,0,0,0,.53,5.432Q64.964,67.74,79.863,89.126a12.137,12.137,0,0,1,1.916,10.452c-1.7,7.449-5.525,21.343-8.822,33.907-8.434,1.288-17.121,2.587-24.1,3.689-10.233,1.547-23.926,3.654-35.3,5.447C10.767,103.322,9.926,63.813,6.9,24.5a3.459,3.459,0,0,0-6.9.4C.365,35.265.472,45.706.558,56.141c.416,31.829-.365,63.574,1,95.417a6.176,6.176,0,0,0,7.41,4.624c6.887-1.595,13.856-3.138,20.809-4.681,12.533-2.793,27-5.931,40.859-9-1.163,4.624-2.132,8.714-2.731,11.75a15.658,15.658,0,0,0,.3,7.4A5.736,5.736,0,0,0,72.19,164.8c.967.151,2.68-1.731,3.352-3.058a46.858,46.858,0,0,0,2.5-7.15c1.01-3.2,2.794-8.665,4.808-14.81,3.306-.744,6.529-1.476,9.628-2.19a3.549,3.549,0,0,0-1.37-6.96" transform="translate(0 -5.481)"/>
            <path id="Path_636" data-name="Path 636" d="M63.3,154.829a41.719,41.719,0,0,0,8.086-7.6c5.056-6.044,6.114-26.619,4.506-33.341-.582-2.435-1.572-4.963-6.8-5.687-.445,2.629.08,6.412.332,8.646C73.1,149.5,50.489,150.029,48.409,146.6a11.456,11.456,0,0,1-1.179-2.7c-.985-3.3-1.083-20.662-1.674-24.016-.193-1.1.251-2.474-2-2.718-2.444-.265-2.967,1.171-3.661,2.323a3.335,3.335,0,0,0-.444,1.086c-1.228,6.645-.63,27.043,4.784,32.837,5,5.353,12.514,5.974,19.065,1.412" transform="translate(-14.519 -40.366)"/>
          </g>
        </svg>
        </a>
      </div>
      <div class="site-header-nav">
      <?php
          if ( has_nav_menu( $site_header_location ) ) :
            wp_nav_menu( array(
              'theme_location'    => $site_header_location,
              'menu_class'        => 'site-header-menu',
              'container'         => false,
              'items_wrap'        => '<ul id="%1$s" class="%2$s" rel="top">%3$s</ul>'
            ));
          endif;
          // END SITE HEADER NAV
        ?>
      </div>
      <button id="main_nav_mobile_toggle" class="site-header-mobile-nav-btn">Navigation</button>
    </header>


    <div id="main-mobile-nav-container" class="site-header-mobile-nav">
      <?php

          if ( has_nav_menu( $site_header_location ) ) :
            wp_nav_menu( array(
              'theme_location'    => $site_header_location,
              'menu_class'        => 'site-header-mobile-menu',
              'container'         => false,
              'items_wrap'        => '<ul id="%1$s" class="%2$s" rel="top">%3$s</ul>'
            ));
          endif;
          // END MOBILE NAV
        ?>
    </div>
    <div class="page-curtain"></div>
    <!-- END SITE HEADER -->