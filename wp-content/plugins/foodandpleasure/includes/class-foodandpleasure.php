<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://webadictos.com
 * @since      1.0.0
 *
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/includes
 * @author     Daniel Medina <admin@webadictos.com.mx>
 */
class Foodandpleasure
{

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Foodandpleasure_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct()
	{
		if (defined('FOODANDPLEASURE_VERSION')) {
			$this->version = FOODANDPLEASURE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'foodandpleasure';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Foodandpleasure_Loader. Orchestrates the hooks of the plugin.
	 * - Foodandpleasure_i18n. Defines internationalization functionality.
	 * - Foodandpleasure_Admin. Defines all hooks for the admin area.
	 * - Foodandpleasure_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies()
	{

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-foodandpleasure-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-foodandpleasure-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-foodandpleasure-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-foodandpleasure-public.php';


		/**
		 * Require CMB2 
		 */
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/CMB2/init.php';

		//	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb2-field-post-search-ajax/cmb-field-post-search-ajax.php';
		// require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cmb2-field-ajax-search/cmb2-field-ajax-search.php';

		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/CMB2/cmb-field-spread-post-search-ajax.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-conditionals/cmb2-conditionals.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-tabs/cmb2-tabs.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-field-map/cmb-field-map.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-field-ajax-search/cmb2-field-ajax-search.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-post-search-field/cmb2-post-search-field.php';
		//	require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-retail-field/cmb2-retail-field.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/cmb2-social-field/cmb2-social-field.php';

		$this->loader = new Foodandpleasure_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Foodandpleasure_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale()
	{

		$plugin_i18n = new Foodandpleasure_i18n();

		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks()
	{

		$plugin_admin = new Foodandpleasure_Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('init', $plugin_admin, 'register_post_types');
		$this->loader->add_action('init', $plugin_admin, 'register_taxonomies');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('cmb2_admin_init', $plugin_admin, 'foodandpleasure_settings');
		$this->loader->add_action('cmb2_admin_init', $plugin_admin, 'food_register_user_profile_metabox');
		$this->loader->add_filter('get_avatar', $plugin_admin, 'custom_user_avatar', 10, 5);
		$this->loader->add_action('cmb2_init', $plugin_admin, 'register_location_fields');
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks()
	{

		$plugin_public = new Foodandpleasure_Public($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
		$this->loader->add_filter('get_avatar', $plugin_public, 'custom_user_avatar', 10, 5);
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run()
	{
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name()
	{
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Foodandpleasure_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader()
	{
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version()
	{
		return $this->version;
	}
}
