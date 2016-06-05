<?php
/*
Plugin Name: Bootstrap for Torro Forms
Plugin URI:  https://wordpress.org/plugins/bootstrap-for-torro-forms/
Description: This Torro Forms extension modifies the output of your forms to be styled in compliance with themes using the Boostrap CSS Framework.
Version:     1.0.0
Author:      Felix Arntz
Author URI:  https://leaves-and-love.net
License:     GNU General Public License v3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: bootstrap-for-torro-forms
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Bootstrap_For_Torro_Forms_Init {
	public static function init() {
		self::load_textdomain();

		if ( ! class_exists( 'Torro_Init' ) ) {
			add_action( 'admin_notices', array( __CLASS__, 'torro_not_active' ) );
			return;
		}

		torro_load( array( __CLASS__, 'load_extension' ) );
	}

	public static function load_extension() {
		require_once plugin_dir_path( __FILE__ ) . 'core/extension.php';
	}

	public static function torro_not_active() {
		?>
		<div class="notice notice-warning">
			<p><?php printf( __( 'Torro Forms is not activated. Please activate it in order to use the extension %s.', 'bootstrap-for-torro-forms' ), 'Bootstrap for Torro Forms' ); ?></p>
		</div>
		<?php
	}

	private static function load_textdomain() {
		return load_plugin_textdomain( 'bootstrap-for-torro-forms' );
	}
}

add_action( 'plugins_loaded', array( 'Bootstrap_For_Torro_Forms_Init', 'init' ) );
