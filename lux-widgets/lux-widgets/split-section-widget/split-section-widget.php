<?php
/*
Widget Name: LUX Split Section Widget
Description: Display a 2 column section on any page.
Author: James Tombs
Author URI: https://umc.utah.edu
*/

class Split_Section_Widget extends SiteOrigin_Widget {


	function __construct() {

		// ENQUEUE ADMIN STYLES & SCRIPTS
    add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts') );
    add_action('admin_enqueue_scripts', array($this, 'admin_register_scripts') );

		parent::__construct(
			'split-section-widget',
			__('Split Section Widget', 'split-section-widget-text-domain'),
			array(
				'description' => __('Display a 2 column section on any page.', 'split-section-widget-text-domain'),
				'panels_icon' => 'lux-so-widget-icon',
			),
			array(

			),
			array(
				// ALIGNMENT
				'lux_split_layout' => array(
					'type' => 'select',
					'label' => __( 'Choose a Layout', 'split-section-widget-text-domain' ),
					'default' => 'image-on-left',
					'options' => array(
							'image-on-left' => __( 'Image on Left', 'split-section-widget-text-domain' ),
							'image-on-right' => __( 'Image on Right', 'split-section-widget-text-domain' )
					),
				),
				// BKG COLOR
				'lux_split_bkg_color' => array(
					'type' => 'select',
					'label' => __( 'Background Color', 'split-section-widget-text-domain' ),
					'default' => 'midnight',
					'options' => array(
							'midnight' => __( 'Midnight', 'split-section-widget-text-domain' ),
							'white' => __( 'White', 'split-section-widget-text-domain' ),
							'punch' => __( 'Punch', 'split-section-widget-text-domain' ),
							'off-white' => __( 'Off White', 'split-section-widget-text-domain' )
					),
				),
				// IMAGE
				'lux_split_image' => array(
					'type' => 'media',
					'choose' => __( 'Choose image', 'split-section-widget-text-domain' ),
					'update' => __( 'Set image', 'split-section-widget-text-domain' ),
					'library' => 'image',
					'fallback' => true
				),
				// TITLE
				'lux_split_title' => array(
					'type' => 'text',
					'label' => __('Title', 'split-section-widget-text-domain')
				),
				// TITLE HEADING
				'lux_split_title_heading' => array(
					'type' => 'select',
					'label' => __( 'Title Heading Type', 'split-section-widget-text-domain' ),
					'default' => 'h2',
					'options' => array(
							'h1' => __( 'H1', 'split-section-widget-text-domain' ),
							'h2' => __( 'H2', 'split-section-widget-text-domain' ),
							'h3' => __( 'H3', 'split-section-widget-text-domain' ),
					),
				),
				// SUBTITLE
				'lux_split_subtitle' => array(
					'type' => 'text',
					'label' => __('Subtitle', 'split-section-widget-text-domain')
				),
				// DESC
					'lux_split_desc' => array(
					'type' => 'textarea',
					'label' => __('Description', 'split-section-widget-text-domain'),
							'default' => '',
							'rows' => 3,
					),
				// BTN TITLE
				'lux_split_btn_title' => array(
					'type' => 'text',
					'label' => __('Button Title', 'split-section-widget-text-domain'),
				),
				// BTN URL
				'lux_split_btn_url' => array(
					'type' => 'link',
					'label' => __('Link URL for Button', 'split-section-widget-text-domain'),
				),
				// LOGO PLACEMENT
				'lux_split_logo_placement' => array(
					'type' => 'select',
					'label' => __( 'Show Logo over Image?', 'split-section-widget-text-domain' ),
					'default' => 'no-logo',
					'options' => array(
							'no-logo' => __( 'No Logo', 'split-section-widget-text-domain' ),
							'logo-center' => __( 'Logo in Center', 'split-section-widget-text-domain' ),
							'logo-top-left' => __( 'Logo Top Left', 'split-section-widget-text-domain' ),
							'logo-top-right' => __( 'Logo Top Right', 'split-section-widget-text-domain' ),
							'logo-bottom-left' => __( 'Logo Bottom Left', 'split-section-widget-text-domain' ),
							'logo-bottom-right' => __( 'Logo Bottom Right', 'split-section-widget-text-domain' ),
					),
				),
				// LOGO COLOR
				'lux_split_logo_color' => array(
					'type' => 'select',
					'label' => __( 'Logo Color', 'split-section-widget-text-domain' ),
					'default' => 'white',
					'options' => array(
							'midnight' => __( 'Midnight', 'split-section-widget-text-domain' ),
							'white' => __( 'White', 'split-section-widget-text-domain' ),
							'punch' => __( 'Punch', 'split-section-widget-text-domain' ),
							'off-white' => __( 'Off White', 'split-section-widget-text-domain' )
					),
				),

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
		return 'split-section-widget-template';
	}


	function initialize() {
		$this->register_frontend_scripts(
	        array(
	            array( 'split-section-widget-js',
	            	plugin_dir_url(__FILE__) . 'js/split-section-widget.js',
	            	array( 'jquery' ),
	            	 time(),
	            	 true
	            	)
	        )
	    );
		$this->register_frontend_styles(
			array(
				array(
					'split-section-widget-css',
					plugin_dir_url(__FILE__) . 'css/split-section-widget.css',
					array(),
					'1.0'
				),
			)
		);

	}

}

siteorigin_widget_register('split-section-widget', __FILE__, 'Split_Section_Widget');

// ADD WIDGET TO GROUP
function add_Split_Section_Widget_to_lux_group( $widgets ) {

	$widgets['Split_Section_Widget']['groups'][] = 'lux-widgets';
	return $widgets;
}

add_filter( 'siteorigin_panels_widgets', 'add_Split_Section_Widget_to_lux_group', 12 );
