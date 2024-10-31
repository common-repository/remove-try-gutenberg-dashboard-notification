<?php
/**
 * Plugin Name: 		Remove Try Gutenberg Dashboard Notification
 * Plugin URI:          https://uianimate.github.io/remove-try-gutenberg
 * Author: 				UI Animations
 * Author URI:			https://github.com/uianimate
 * Description: 		Remove Try Gutenberg to avoid consequences in the future
 * Version: 			1.0
 * Requires at least:   4.0
 * Tested up to:        4.9.8
 * License: 			GPL v3
 * Text Domain:			rmv-guten
 * Domain Path: 		/languages
 *
**/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define('TRY_VERSION', '1.0');
define('TRY_PATH', plugin_dir_path(__FILE__));
define('TRY_URL', plugin_dir_url(__FILE__));

register_activation_hook(__FILE__, array('TRY_DISSOLVE','activate'));
register_deactivation_hook(__FILE__, array('TRY_DISSOLVE','deactivate'));

if ( ! class_exists( 'TRY_DISSOLVE' ) ) {

    class TRY_DISSOLVE {

    private static $_instance = null;

    public static function get_instance() {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	
    public static function activate() {

    }
	
    public static function deactivate() {
        
    }
	
	public function __construct() {
        global $wpdb;
        
		if ( self::$_instance ) {
			return;
        }
        
        self::$_instance = $this;

        remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel' );

        
    }

    }

}

function TRY_DISSOLVE() {
    return TRY_DISSOLVE::get_instance();
}

$GLOBALS['TRY_DISSOLVE'] = TRY_DISSOLVE();