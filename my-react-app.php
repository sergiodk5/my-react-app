<?php
/**
 * Plugin Name: my-react-app
 * Plugin URI: https://mybusiness360.gr/plugins/my-react-app
 * Description: A react plugin
 * Version: 0.1
 * Text Domain: my-react-app
 * Author: Asterios Patsikas
 * Author URI: https://mybusiness360.gr/team/asterios
 *
 * @package My_React_App
 */

/**
 * Initialize the plugin by registering the resources.
 *
 * @return void
 */
function my_react_app_init() {
	$path = '/frontend/static';

	if ( 'development' === wp_get_environment_type() ) {
		$path = '/frontend/build/static';
	}

	wp_register_script('my_react_app_js', plugins_url( $path . '/js/main.js', __FILE__ ), array(), '1.0.0', false ); // phpcs:ignore
	wp_register_style( 'my_react_app_css', plugins_url( $path . '/css/main.css', __FILE__ ), array(), '1.0.0', 'all' );
}

add_action( 'init', 'my_react_app_init' );

/**
 * Register Shortcode to show the react app.
 *
 * @return string
 */
function my_react_app() {
	wp_enqueue_script( 'my_react_app_js', '1.0.0', true ); // phpcs:ignore
	wp_enqueue_style( 'my_react_app_css' );

	return '<div id="my_react_app"></div>';
}

add_shortcode( 'my-react-app', 'my_react_app' );
