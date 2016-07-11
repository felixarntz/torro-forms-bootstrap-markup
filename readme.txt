=== Torro Forms Bootstrap Markup ===

Plugin Name:       Torro Forms Bootstrap Markup
Plugin URI:        https://wordpress.org/plugins/torro-forms-bootstrap-markup/
Author:            Felix Arntz
Author URI:        https://leaves-and-love.net
Contributors:      flixos90
Requires at least: 4.4
Tested up to:      4.5.3
Stable tag:        1.0.1
Version:           1.0.1
License:           GNU General Public License v3
License URI:       http://www.gnu.org/licenses/gpl-3.0.html
Tags:              torro forms, form builder, extension, bootstrap

This Torro Forms extension modifies the output of your forms to be styled in compliance with themes using the Boostrap CSS Framework.

== Description ==

This plugin is a tiny extension to the form builder plugin _Torro Forms_ which changes the output of its forms to follow Bootstrap markup conventions. If you're using _Torro Forms_ in combination with a theme based on the Bootstrap CSS Framework, using this extension will ensure your forms will fit into the rest of your theme design and look good out of the box, so you don't need to deal with it manually.

The plugin does not change any functionality, it's just a drop-in that will mostly override the necessary templates of the main plugin.

Being built using the official extension boilerplate, this simple plugin is also a great resource to learn how to build a custom extension for the _Torro Forms_. If you're a developer and would like to build your own extension, feel encouraged to browse the source code of the plugin. It is available [on GitHub](https://github.com/felixarntz/torro-forms-bootstrap-markup).

> **Note**: This extension requires _Torro Forms_ version 1.0.0-beta.6 at least.

== Installation ==

1. Upload the entire `torro-forms-bootstrap-markup` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Add all the post types you like, for example in your plugin or theme.

== Frequently Asked Questions ==

= How can I change the form layout? =

The plugin adds a new section "Bootstrap Settings" to each form's editing screen. You will find a checkbox there that will enable the respective form to be rendered with a horizontal layout.

= Where should I submit my support request? =

I preferably take support requests as [issues on Github](https://github.com/felixarntz/torro-forms-bootstrap-markup/issues), so I would appreciate if you created an issue for your request there. However, if you don't have an account there and do not want to sign up, you can of course use the [wordpress.org support forums](https://wordpress.org/support/plugin/torro-forms-bootstrap-markup) as well.

= How can I contribute to the plugin? =

If you're a developer and you have some ideas to improve the plugin or to solve a bug, feel free to raise an issue or submit a pull request in the [Github repository for the plugin](https://github.com/felixarntz/torro-forms-bootstrap-markup).

You can also contribute to the plugin by translating it. Simply visit [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/torro-forms-bootstrap-markup) to get started.

== Screenshots ==

1. A simple Torro Forms contact form embedded in the [Bootstrap Basic theme](https://wordpress.org/themes/bootstrap-basic/)
2. The same form with a horizontal layout
3. The same form after a submission that produced some errors

== Changelog ==

= 1.0.1 =
* Fixed: support forms without a container

= 1.0.0 =
* First stable version
