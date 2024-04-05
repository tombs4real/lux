<?php
/**
 * @package lux
 */


 add_theme_support( 'post-thumbnails');
 add_post_type_support( 'page', 'excerpt' );
 show_admin_bar(false);


if ( ! function_exists( 'lux_setup' ) ) :
  function lux_setup() {
    
    register_nav_menus(
      array(
        'site_header_menu1' => esc_html__( 'Site Header Menu 1', 'lux' ),
        'site_footer_menu1' => esc_html__( 'Footer Menu 1', 'lux' ),
        'site_footer_menu2' => esc_html__( 'Footer Menu 2', 'lux' ),
        'site_footer_menu3' => esc_html__( 'Footer Menu 3', 'lux' ),
        'site_footer_menu4' => esc_html__( 'Footer Menu 4', 'lux' ),
      )
    );

  }
endif;
add_action( 'after_setup_theme', 'lux_setup' );



/**
 * Enqueue scripts and styles.
 */
function lux_scripts() {
  // STYLES
  wp_enqueue_style( 'site-style', get_stylesheet_uri(), array(), time());
  wp_enqueue_style( 'lux-custom', get_template_directory_uri() . '/css/main.css', array(), time(), 'all' );
  // SCRIPTS
  wp_enqueue_script( 'lux-main', get_template_directory_uri() . '/js/main.js', array('jquery'), time(), true );
}
add_action( 'wp_enqueue_scripts', 'lux_scripts' );


// LUX THEME SETTINGS PAGE
add_filter( 'mb_settings_pages', 'build_lux_settings_page' );
function build_lux_settings_page( $settings_pages ) {
	$settings_pages[] = [
        'menu_title' => __( 'LUX Theme Settings', 'lux' ),
        'id'         => 'lux-theme-settings',
        'position'   => 25,
        'parent'     => 'options-general.php',
        'style'      => 'no-boxes',
        'columns'    => 1,
        'icon_url'   => 'dashicons-admin-generic',
    ];

	return $settings_pages;
}


// LUX METABOX FIELDS
add_filter( 'rwmb_meta_boxes', 'lux_metabox_fields' );
function lux_metabox_fields( $meta_boxes ) {
    $prefix = 'lux_';

    $meta_boxes[] = [
        'id'             => $prefix . 'theme_settings',
        'settings_pages' => ['lux-theme-settings'],
        'fields'         => [
            [
                'name' => __( 'Header Layout', 'lux' ),
                'id'   => $prefix . 'theme_header',
                'type' => 'image_select',
                'options'  => [
                  'header-left'  => get_template_directory_uri() . '/imgs/header-left.png',
                  'header-center' => get_template_directory_uri() . '/imgs/header-center.png',
              ],
            ],
        ],
    ];

    return $meta_boxes;
}




// function lux_remove_widgets($widgets){
//   unset($widgets['Unwanted_Widget_Class']);
//   return $widgets;
// }
// add_filter('siteorigin_panels_widgets', 'lux_remove_widgets');