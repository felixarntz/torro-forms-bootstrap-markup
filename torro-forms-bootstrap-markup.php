<?php
/*
Plugin Name: Torro Forms Bootstrap Markup
Plugin URI:  https://wordpress.org/plugins/torro-forms-bootstrap-markup/
Description: This Torro Forms extension modifies the output of your forms to be styled in compliance with themes using the Boostrap CSS Framework.
Version:     1.0.1
Author:      Felix Arntz
Author URI:  https://leaves-and-love.net
License:     GNU General Public License v3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: torro-forms-bootstrap-markup
Tags:        torro forms, form builder, extension, bootstrap
*/
/**
 * Extension initialization file
 *
 * @package TFBS3
 * @author Felix Arntz <felix-arntz@leaves-and-love.net>
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Torro_Forms_Bootstrap_Markup_Init {
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
			<p><?php printf( __( 'Torro Forms is not activated. Please activate it in order to use the extension %s.', 'torro-forms-bootstrap-markup' ), 'Torro Forms Bootstrap Markup' ); ?></p>
		</div>
		<?php
	}

	private static function load_textdomain() {
		return load_plugin_textdomain( 'torro-forms-bootstrap-markup' );
	}
}

add_action( 'plugins_loaded', array( 'Torro_Forms_Bootstrap_Markup_Init', 'init' ) );
