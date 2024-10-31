<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://nafsin.info
 * @since             1.1.0
 * @package           Searchable_accrodion
 *
 * @wordpress-plugin
 * Plugin Name:       Searchable Accordion
 * Plugin URI:        http://nafsin.info/wp/searchable_accrodion
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.1.0
 * Author:            Nafsin Vattakandy
 * Author URI:        http://nafsin.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       searchable_accrodion
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-searchable_accrodion-activator.php
 */
function activate_searchable_accrodion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-searchable_accrodion-activator.php';
	Searchable_accrodion_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-searchable_accrodion-deactivator.php
 */
function deactivate_searchable_accrodion() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-searchable_accrodion-deactivator.php';
	Searchable_accrodion_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_searchable_accrodion' );
register_deactivation_hook( __FILE__, 'deactivate_searchable_accrodion' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-searchable_accrodion.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_searchable_accrodion() {

	$plugin = new Searchable_accrodion();
	$plugin->run();

}
run_searchable_accrodion();
