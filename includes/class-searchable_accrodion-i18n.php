<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://nafsin.info
 * @since      1.0.0
 *
 * @package    Searchable_accrodion
 * @subpackage Searchable_accrodion/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Searchable_accrodion
 * @subpackage Searchable_accrodion/includes
 * @author     Nafsin Vattakandy <nafsinvk@gmail.com>
 */
class Searchable_accrodion_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'searchable_accrodion',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
