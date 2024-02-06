<?php
/**
 * Plugin Name: Gli Roles
 * Author: Tanner Barrett
 * Author URI: https://golocalinteractive.com
 * Version: 1.0.0
 * Description: This plugin creates new roles and permissions for GLI client sites.
 * Text-Domain: gli roles
 */

if( ! defined( 'ABSPATH' ) ) : exit(); endif; // No direct access allowed.

/**
* Define Plugins Contants
*/
define ( 'WPRK_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define ( 'WPRK_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );

/**
 * Loading Necessary Scripts
 */
add_action( 'admin_enqueue_scripts', 'load_scripts' );
function load_scripts() {
    wp_enqueue_script( 'gli-roles', WPRK_URL . 'dist/bundle.js', [ 'jquery', 'wp-element' ], wp_rand(), true );
    wp_localize_script( 'gli-roles', 'appLocalizer', [
        'apiUrl' => home_url( '/wp-json' ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
    ] );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-gli-roles-activator.php
 */
function activate_gli_roles() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gli-roles-activator.php';
	Gli_Roles_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-gli-roles-deactivator.php
 */
function deactivate_gli_roles() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-gli-roles-deactivator.php';
	Gli_Roles_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_gli_roles' );
register_deactivation_hook( __FILE__, 'deactivate_gli_roles' );

require_once WPRK_PATH . 'classes/class-create-admin-menu.php';
require_once WPRK_PATH . 'classes/class-create-settings-routes.php';