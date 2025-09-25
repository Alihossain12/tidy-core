<?php 
/*
 * Plugin Name: Tidy Core
 * Plugin URI: https://wordpress.org/plugins
 * Description: Core plugin for MAK theme.
 * Version: 1.0.0
 * Author: MTS
 * Author URI: https://maktechsolution.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: tidy-core
*/

function register_tidy_core_widgets( $widgets_manager ) {
	require_once( __DIR__ . '/widgets/hero.php' );
    require_once( __DIR__ . '/widgets/features-tabs-widget.php' );
    require_once( __DIR__ . '/widgets/heading_widget.php' );
    require_once( __DIR__ . '/widgets/MAK_CORE_Image_Widget.php' );
    require_once( __DIR__ . '/widgets/MAK_CORE_Description_Widget.php' );
    require_once( __DIR__ . '/widgets/MAK_CORE_Icon_Box_Widget.php' );
    require_once( __DIR__ . '/widgets/MAK_CORE_Image_Box_Widget.php' );
    require_once( __DIR__ . '/widgets/MAK_Timeline_Widget.php' );
    


    $widgets_manager->register( new \TIDY_CORE_Hero() );
    $widgets_manager->register( new \Features_Tabs_Widget() );
    $widgets_manager->register( new \MAK_CORE_Heading_Widget() );
    $widgets_manager->register( new \MAK_CORE_Image_Widget() );
    $widgets_manager->register( new \MAK_CORE_Description_Widget() );
    $widgets_manager->register( new \Modern_Icon_Box_Widget() );
    $widgets_manager->register( new \MAK_CORE_Image_Box_Widget() );
    $widgets_manager->register( new \Custom_Timeline_Widget() );

}
add_action( 'elementor/widgets/register', 'register_tidy_core_widgets' );





function category_elementor_init(){
    \Elementor\Plugin::instance()->elements_manager->add_category(
        'tidy_core',
        [
            'title'  => 'Tidy Core',
            'icon' => 'font'
        ],
        5
    );
}
add_action('elementor/init', 'category_elementor_init');


function register_plugin_styles() {
    wp_enqueue_style('tidy-core-styles', plugin_dir_url(__FILE__) . '/assets/css/style.css', array(), '0.1.0', 'all');
    wp_enqueue_script( 'tidy-core-script', plugin_dir_url(__FILE__) . 'assets/js/main.min.js', array('jquery'), '0.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );


// Register Tidy Core category
add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
    $elements_manager->add_category(
        'tidy-core',
        [
            'title' => esc_html__( 'Tidy Core', 'tidy-core' ),
            'icon'  => 'fa fa-plug',
        ]
    );
});


