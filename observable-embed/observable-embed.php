<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Observable_Embed
 *
 * @wordpress-plugin
 * Plugin Name:       Observable Embed
 * Plugin URI:        https://github.com/andybrowncompassion/Observable-Embed
 * Description:       This plugin facilitates embedded data visualizations from Oberservable
 * Version:           0.1.0
 * Author:            Andy Brown
 * Author URI:        http://andybrown.media
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       observable-embed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'OBSERVABLE_EMBED_VERSION', '0.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-observable-embed-activator.php
 */
function activate_observable_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-observable-embed-activator.php';
	Observable_Embed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-observable-embed-deactivator.php
 */
function deactivate_observable_embed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-observable-embed-deactivator.php';
	Observable_Embed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_observable_embed' );
register_deactivation_hook( __FILE__, 'deactivate_observable_embed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-observable-embed.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_observable_embed() {

	$plugin = new Observable_Embed();
	$plugin->run();

}
run_observable_embed();
