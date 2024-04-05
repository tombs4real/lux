<?php
/*
Widget Name: LUX Marquee Widget
Description: Display a marquee on any page.
Author: James Tombs
Author URI: https://umc.utah.edu
*/

class Marquee_Widget extends SiteOrigin_Widget {


	function __construct() {

		// ENQUEUE ADMIN STYLES & SCRIPTS
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
    add_action('admin_enqueue_scripts', array($this, 'admin_register_scripts') );

		parent::__construct(
			'marquee-widget',
			__('Marquee Widget', 'marquee-widget-text-domain'),
			array(
				'description' => __('Display a slider marquee on your site.', 'marquee-widget-text-domain'),
				'panels_icon' => 'lux-so-widget-icon',
			),
			array(

			),
			array(

					'lux_marquee_repeater' => array(
						'type' => 'repeater',
						'label' => __( 'Marquee Slides' , 'marquee-widget-text-domain' ),
						'item_name'  => __( 'Slide', 'siteorigin-widgets' ),
						'item_label' => array(
							'selector' => "[id*='lux_marquee_title']",
							'update_event' => 'change',
							'value_method' => 'val',
						),
						'fields' => array(
							// BKG IMAGE
							'lux_marquee_image' => array(
								'type' => 'media',
								'choose' => __( 'Choose image', 'marquee-widget-text-domain' ),
								'update' => __( 'Set image', 'marquee-widget-text-domain' ),
								'library' => 'image',
								'fallback' => true
							),
							// TITLE
							'lux_marquee_title' => array(
								'type' => 'text',
								'label' => __('Title', 'marquee-widget-text-domain')
							),
							// TITLE HEADING
							'lux_marquee_title_heading' => array(
								'type' => 'select',
								'label' => __( 'Title Heading Type', 'marquee-widget-text-domain' ),
								'default' => 'h1',
								'options' => array(
										'h1' => __( 'H1', 'marquee-widget-text-domain' ),
										'h2' => __( 'H2', 'marquee-widget-text-domain' ),
										'h3' => __( 'H3', 'marquee-widget-text-domain' ),
								),
							),
							// SUBTITLE
							'lux_marquee_subtitle' => array(
								'type' => 'text',
								'label' => __('Subtitle', 'marquee-widget-text-domain')
							),
							// DESC
								'lux_marquee_desc' => array(
								'type' => 'textarea',
								'label' => __('Description', 'marquee-widget-text-domain'),
										'default' => '',
										'rows' => 3,
								),
							// BTN TITLE
							'lux_marquee_btn_title' => array(
								'type' => 'text',
								'label' => __('Button Title', 'marquee-widget-text-domain'),
							),
							// BTN URL
							'lux_marquee_btn_url' => array(
								'type' => 'link',
								'label' => __('Link URL for th button.', 'marquee-widget-text-domain'),
							),
						)
			   )
			),
			plugin_dir_path(__FILE__)
		);

	}

	// ENQUEUE ADMIN STYLES & SCRIPTS
	public function admin_enqueue_scripts()
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


	function get_template_name($instance) {
		return 'marquee-widget-template';
	}


	function initialize() {
		$this->register_frontend_scripts(
	        array(
	            array( 'owl-js',
	            	plugin_dir_url(__FILE__) . 'js/vendor/owl/owl.carousel.min.js',
	            	array( 'jquery' ),
	            	 '2.3.4',
	            	 true
	            	)
	        )
	    );
		$this->register_frontend_scripts(
	        array(
	            array( 'marquee-widget-js',
	            	plugin_dir_url(__FILE__) . 'js/marquee-widget.js',
	            	array( 'jquery' ),
	            	 time(),
	            	 true
	            	)
	        )
	    );
	    $this->register_frontend_styles(
			array(
				array(
					'owl-css',
					plugin_dir_url(__FILE__) . 'css/vendor/owl/owl.carousel.min.css',
					array(),
					'2.3.4'
				),
			)
		);
		$this->register_frontend_styles(
			array(
				array(
					'marquee-widget-css',
					plugin_dir_url(__FILE__) . 'css/marquee-widget.css',
					array(),
					'1.0'
				),
			)
		);

	}

}

siteorigin_widget_register('marquee-widget', __FILE__, 'Marquee_Widget');

// ADD WIDGET TO GROUP
function add_marquee_widget_to_lux_group( $widgets ) {

	$widgets['Marquee_Widget']['groups'][] = 'lux-widgets';
	return $widgets;
}

add_filter( 'siteorigin_panels_widgets', 'add_marquee_widget_to_lux_group', 12 );
