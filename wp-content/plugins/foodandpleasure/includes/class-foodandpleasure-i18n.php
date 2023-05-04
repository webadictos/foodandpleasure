<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://webadictos.com
 * @since      1.0.0
 *
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/includes
 * @author     Daniel Medina <admin@webadictos.com.mx>
 */
class Foodandpleasure_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'foodandpleasure',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
