<?php
/*
Widget Name: LUX Review Widget
Description: Display reviews on any page.
Author: James Tombs
Author URI: https://umc.utah.edu
*/

class Review_Widget extends SiteOrigin_Widget {


	function __construct() {

		// ENQUEUE ADMIN STYLES & SCRIPTS
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
    add_action('admin_enqueue_scripts', array($this, 'admin_register_scripts') );

		parent::__construct(
			'review-widget',
			__('Review Widget', 'review-widget-text-domain'),
			array(
				'description' => __('Display reviews on your site.', 'review-widget-text-domain'),
				'panels_icon' => 'lux-so-widget-icon',
			),
			array(

			),
			array(

					'lux_review_repeater' => array(
						'type' => 'repeater',
						'label' => __( 'Reviews' , 'review-widget-text-domain' ),
						'item_name'  => __( 'Review', 'siteorigin-widgets' ),
						'item_label' => array(
							'selector' => "[id*='lux_review_name']",
							'update_event' => 'change',
							'value_method' => 'val',
						),
						'fields' => array(
							// IMAGE
							'lux_review_image' => array(
								'type' => 'media',
								'choose' => __( 'Choose Headshot', 'review-widget-text-domain' ),
								'update' => __( 'Set Headshot', 'review-widget-text-domain' ),
								'library' => 'image',
								'fallback' => true
							),
							// NAME
							'lux_review_name' => array(
								'type' => 'text',
								'label' => __('Review Name', 'review-widget-text-domain')
							),
							// STARS
							'lux_review_stars' => array(
								'type' => 'select',
								'label' => __( 'Stars', 'review-widget-text-domain' ),
								'default' => '5',
								'options' => array(
										1 => __( '1', 'review-widget-text-domain' ),
										2 => __( '2', 'review-widget-text-domain' ),
										3 => __( '3', 'review-widget-text-domain' ),
										4 => __( '4', 'review-widget-text-domain' ),
										5 => __( '5', 'review-widget-text-domain' ),
								),
							),
							// REVIEW SOURCE
							'lux_review_source' => array(
								'type' => 'select',
								'label' => __( 'Review Source', 'review-widget-text-domain' ),
								'default' => 'google',
								'options' => array(
										'google' => __( 'Google', 'review-widget-text-domain' ),
										'facebook' => __( 'Facebook', 'review-widget-text-domain' ),
										'customer' => __( 'Customer', 'review-widget-text-domain' ),
								),
							),
							// DESC
								'lux_review_review' => array(
								'type' => 'textarea',
								'label' => __('Review', 'review-widget-text-domain'),
										'default' => '',
										'rows' => 5,
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
					'review-widget-admin-css',
					plugin_dir_url(__FILE__) . 'admin/admin.css'
			);
	}


	function get_template_name($instance) {
		return 'review-widget-template';
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
	            array( 'review-widget-js',
	            	plugin_dir_url(__FILE__) . 'js/review-widget.js',
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
					'review-widget-css',
					plugin_dir_url(__FILE__) . 'css/review-widget.css',
					array(),
					'1.0'
				),
			)
		);

	}

}

siteorigin_widget_register('review-widget', __FILE__, 'Review_Widget');

// ADD WIDGET TO GROUP
function add_review_widget_to_lux_group( $widgets ) {

	$widgets['Review_Widget']['groups'][] = 'lux-widgets';
	return $widgets;
}

add_filter( 'siteorigin_panels_widgets', 'add_review_widget_to_lux_group', 12 );
