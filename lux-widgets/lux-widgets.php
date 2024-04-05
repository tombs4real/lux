<?php
/*
Plugin Name: LUX Widgets.
Description: LUX Custom Widgets.
Version: 0.1
Author: James Tombs
Author URI: 
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.txt
*/

function add_lux_widgets_collection($folders)
{
    $folders[] = plugin_dir_path(__FILE__) . 'lux-widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_lux_widgets_collection');

// ADD FRP TAB
function add_lux_widget_tabs($tabs) {
    $tabs[] = array(
        'title' => __('LUX Widgets', 'lux-widgets'),
        'filter' => array(
            'groups' => array('lux-widgets')
        )
    );

    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'add_lux_widget_tabs', 20);

