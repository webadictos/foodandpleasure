<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://webadictos.com
 * @since      1.0.0
 *
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/public
 * @author     Daniel Medina <admin@webadictos.com.mx>
 */
class Foodandpleasure_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Foodandpleasure_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Foodandpleasure_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	//	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/foodandpleasure-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Foodandpleasure_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Foodandpleasure_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	//	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/foodandpleasure-public.js', array( 'jquery' ), $this->version, false );

	}


	static function get_opciones($prefix='', $key = '', $default = false ) {
		if ( function_exists( 'cmb2_get_option' ) ) {
			// Use cmb2_get_option as it passes through some key filters.
			return cmb2_get_option( $prefix, $key, $default );
		}
	
		// Fallback to get_option if CMB2 is not loaded yet.
		$opts = get_option( $prefix, $default );
	
		$val = $default;
	
		if ( 'all' == $key ) {
			$val = $opts;
		} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
			$val = $opts[ $key ];
		}
	
		return $val;
	}


	public function custom_user_avatar($avatar, $id_or_email, $size, $alt, $args){
			
		// determine which user we're asking about - this is the hard part!
		// ........
	  
		// get your custom field here, using the user's object to get the correct one
		// ........
	  
		// enter your custom image output here
		//print_r($id_or_email);
		//get_user_meta( $id_or_email, theseeker_user_avatar, true );
		if(is_admin()) return $avatar;

		  $img = get_user_meta( $id_or_email, 'food_user_avatar', true );



		  if(isset($img) && $img!=""){
		  
			$img=str_replace("https://","https://i0.wp.com/",$img);

			$img=$img."?resize=200%2C200&ssl=1";
			
			$avatar = '<img alt="' . $alt . '" src="'.$img.'" width="' . $size . '" height="' . $size . '" class="avatar author-avatar" />';
		  
		  }
		return $avatar;
	  
	  }


}
