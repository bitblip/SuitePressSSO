<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              mailto:joshuaslaven42@gmail.com
 * @since             1.0.0
 * @package           Suitepresssso
 *
 * @wordpress-plugin
 * Plugin Name:       SuitePressSSO
 * Plugin URI:        mailto:joshuaslaven42@gmail.com
 * Description:       WordPress authentication hooks that allow wordpress to use MS credentials or vice versa.
 * Version:           1.0.0
 * Author:            Joshua Slaven
 * Author URI:        mailto:joshuaslaven42@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       suitepresssso
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-suitepresssso-activator.php
 */
function activate_suitepresssso() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-suitepresssso-activator.php';
	Suitepresssso_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-suitepresssso-deactivator.php
 */
function deactivate_suitepresssso() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-suitepresssso-deactivator.php';
	Suitepresssso_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_suitepresssso' );
register_deactivation_hook( __FILE__, 'deactivate_suitepresssso' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-suitepresssso.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_suitepresssso() {

	$plugin = new Suitepresssso();
	$plugin->run();

}
run_suitepresssso();
