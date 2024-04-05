<?php
/*
Widget Name: LUX Card Widget
Description: Display Cards on any page.
Author: James Tombs
Author URI: https://umc.utah.edu
*/

class Card_Widget extends SiteOrigin_Widget {

  // CONSTRUCT FIELDS
  function __construct() {

    // ENQUEUE ADMIN STYLES & SCRIPTS
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
    add_action('admin_enqueue_scripts', array($this, 'admin_register_scripts') );

    // CALL PARENT WITH ARGS
		parent::__construct(

      // WIDGET ID, NAME, OPTIONS, AND FIELDS
      // ID
      'lux-card-widget',
      // NAME
			__('Card Widget', 'card-widget-text-domain'),
      // WIDGET OPTIONS
			array(
				'description' => __('Display Cards on any page.', 'card-widget-text-domain'),
        'panels_icon' => 'lux-so-widget-icon',
			),
      // CONTROL OPTIONS
			array(

			),
			//FIELDS (FORM OPTIONS)
			array(
        // CARD LAYOUT
        'lux_card_layout' => array(
          'type' => 'select',
          'label' => __( 'Card Layout', 'widget-form-fields-text-domain' ),
          'description' => __( 'Horizontal Cards look best with 1 card per row', 'widget-form-fields-text-domain' ),
          'default' => 'vert-img-top',
          'options' => array(
            'vert-img-top' => __( 'Vertical with Image on Top', 'widget-form-fields-text-domain' ),
            'horz-img-left' => __( 'Horizontal with Image on Left', 'widget-form-fields-text-domain' ),
            'horz-img-right' => __( 'Horizontal with Image on Right', 'widget-form-fields-text-domain' ),
          )
        ),
        // CARDS PER ROW
        'lux_card_per_row' => array(
          'type' => 'select',
          'label' => __( 'Cards Per Row', 'widget-form-fields-text-domain' ),
          'description' => __( '4 or more cards per row look best in full width stretched rows.', 'widget-form-fields-text-domain' ),
          'default' => '3col',
          'options' => array(
            '1col' => __( '1 Card', 'widget-form-fields-text-domain' ),
            '2col' => __( '2 Cards', 'widget-form-fields-text-domain' ),
            '3col' => __( '3 Cards', 'widget-form-fields-text-domain' ),
            '4col' => __( '4 Cards', 'widget-form-fields-text-domain' ),
            '5col' => __( '5 Cards', 'widget-form-fields-text-domain' ),
            '6col' => __( '6 Cards', 'widget-form-fields-text-domain' ),
          )
        ),
        // CARD REPEATER
        'lux_card_repeater' => array(
          'type' => 'repeater',
          'label' => __( 'Cards' , 'widget-form-fields-text-domain' ),
          'item_name'  => __( 'Card', 'siteorigin-widgets' ),
          'item_label' => array(
            'selector'     => "[id*='lux_card_title']",
            'update_event' => 'change',
            'value_method' => 'val'
          ),
          'fields' => array(
            // CARD IMAGE
            'lux_card_image' => array(
              'type' => 'media',
              'label' => __( 'Choose an Image', 'widget-form-fields-text-domain' ),
              'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
              'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
              'library' => 'image',
              'fallback' => true
            ),
            // CARD TITLE
            'lux_card_title' => array(
              'type' => 'text',
              'label' => __('Card Title', 'widget-form-fields-text-domain'),
              'default' => ''
            ),
            // CARD TITLE COLOR
            'lux_card_title_color' => array(
              'type' => 'select',
              'label' => __( 'Title Color', 'widget-form-fields-text-domain' ),
              'default' => 'indigo',
              'options' => array(
                'indigo' => __( 'Indigo', 'widget-form-fields-text-domain' ),
                'tea' => __( 'Tea', 'widget-form-fields-text-domain' ),
              )
            ),
            // CARD COPY
            'lux_card_content' => array(
              'type' => 'textarea',
              'label' => __( 'Card Copy', 'widget-form-fields-text-domain' ),
              'default' => '',
              'rows' => 5
            ),
            // CARD BUTTON TITLE
            'lux_card_btn_title' => array(
              'type' => 'text',
              'label' => __('Button Title', 'widget-form-fields-text-domain'),
              'default' => ''
            ),
            // CARD BUTTON URL
            'lux_card_btn_url' => array(
              'type' => 'link',
              'label' => __('Button URL', 'widget-form-fields-text-domain'),
              'default' => '',
              'sanitize' => 'url'
            ),
            // CARD BUTTON NEW TAB
            'lux_card_btn_url_new_tab' => array(
              'type' => 'checkbox',
              'label' => __( 'Open Link in a New Tab?', 'widget-form-fields-text-domain' ),
              'default' => false
            ),
            // CARD BUTTON COLOR
            'lux_card_btn_color' => array(
              'type' => 'select',
              'label' => __( 'Button Color', 'widget-form-fields-text-domain' ),
              'default' => 'indigo',
              'options' => array(
                'indigo' => __( 'Indigo', 'widget-form-fields-text-domain' ),
                'tea' => __( 'Tea', 'widget-form-fields-text-domain' ),
                'sky' => __( 'Sky', 'widget-form-fields-text-domain' ),
              )
            ),
            // CARD ALIGNMENT
            'lux_card_alignment' => array(
              'type' => 'select',
              'label' => __( 'Title, Copy & Button Alignment', 'widget-form-fields-text-domain' ),
              'default' => 'left',
              'options' => array(
                'left' => __( 'Left', 'widget-form-fields-text-domain' ),
                'center' => __( 'Center', 'widget-form-fields-text-domain' ),
                'right' => __( 'Right', 'widget-form-fields-text-domain' ),
              )
            ),
          )
        )
        
			),
      // BASE FOLDER PATH
			plugin_dir_path(__FILE__)
		);

	}

  // / ENQUEUE ADMIN STYLES & SCRIPTS
	public function admin_enqueue_scripts($prefix)
	{
			wp_enqueue_style('siteorigin-widgets-manage-admin', plugin_dir_url(__FILE__) . 'admin/admin.css', array(), time());
	}

	public function admin_register_scripts()
	{
			wp_register_style(
					'marquee-widget-admin-css',
					plugin_dir_url(__FILE__) . 'admin/admin.css'
			);
	}

  // GET TEMPLATE NAME
  function get_template_name($instance) {
      return 'card-widget';
  }



  // INIT SCRIPTS & STYLES
  function initialize() {
    $this->register_frontend_scripts(
      array(
        array(
          'card-widget-scripts',
        	plugin_dir_url(__FILE__) . 'js/card-widget.js',
        	array( 'jquery' ),
        	 time(),
        	 true
        )
      )
    );
		$this->register_frontend_styles(
			array(
				array(
					'card-widget-styles',
					plugin_dir_url(__FILE__) . 'css/card-widget.css',
					array(),
					time()
				),
			)
		);
	}
}

siteorigin_widget_register('lux-card-widget', __FILE__, 'Card_Widget');

// ADD WIDGET TO GROUP
function add_card_widget_to_lux_group( $widgets ) {

	$widgets['Card_Widget']['groups'][] = 'lux-widgets';
	return $widgets;
}

add_filter( 'siteorigin_panels_widgets', 'add_card_widget_to_lux_group', 12 );
