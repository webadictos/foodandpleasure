<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://webadictos.com
 * @since      1.0.0
 *
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Foodandpleasure
 * @subpackage Foodandpleasure/admin
 * @author     Daniel Medina <admin@webadictos.com.mx>
 */
class Foodandpleasure_Admin
{

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

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

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/foodandpleasure-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

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

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/foodandpleasure-admin.js', array('jquery'), $this->version, false);
	}


	/**
	 * Registra el post Type
	 */

	public function register_post_types()
	{


		$productArgs = array(

			'label' =>  __('Videos', 'foodandpleasure'),
			'labels' =>
			array(
				'name' => __('Videos', 'foodandpleasure'),
				'singular_name' => 'Video',
				'add_new' => 'Agregar Video',
				'add_new_item' => 'Agregar Nuevo Video',
				'edit_item' => 'Editar Video',
				'new_item' => 'Nuevo Video',
				'view_item' => 'Ver Video',
				'view_items' => 'Ver Videos',
				'search_items' => 'Buscar Videos',
				'not_found' => 'No se encontraron videos',
				'not_found_in_trash' => 'No se encontraron videos en la papelera',
				'menu_name' => 'Videos',
				'name_admin_bar' => 'Videos F&P',
			),
			'public' => true,
			'publicly_queryable' => true,
			'description' => 'Catálogo de videos',
			'exclude_from_search' => false,
			'show_ui' => true,
			// 'show_in_menu' => 'bushmills_settings',
			'menu_position' => 5,
			'menu_icon' => "dashicons-video-alt",
			'show_in_rest' => true,
			'supports' => array('title', 'thumbnail', 'custom_fields', 'editor', 'excerpt'),
			'has_archive' => 'videos',
			'taxonomies' => array('category'),

			'rewrite'  => array('slug' => 'videos', 'with_front' => true),

		);




		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type('fp_video', $productArgs);

		$locationArgs = array(

			'label' =>  __('Lugares', 'foodandpleasure'),
			'labels' =>
			array(
				'name' => __('Lugares', 'foodandpleasure'),
				'singular_name' => 'Lugar',
				'add_new' => 'Agregar lugar',
				'add_new_item' => 'Agregar Nuevo Lugar',
				'edit_item' => 'Editar Lugar',
				'new_item' => 'Nuevo Lugar',
				'view_item' => 'Ver Lugar',
				'view_items' => 'Ver Lugares',
				'search_items' => 'Buscar Lugares',
				'not_found' => 'No se encontraron lugares',
				'not_found_in_trash' => 'No se encontraron lugares en la papelera',
				'menu_name' => 'Lugares',
				'name_admin_bar' => 'Lugares F&P',
			),
			'public' => true,
			'publicly_queryable' => false,
			'description' => 'Directorio de lugares',
			'exclude_from_search' => true,
			'show_ui' => true,
			// 'show_in_menu' => 'bushmills_settings',
			'menu_position' => 5,
			'menu_icon' => "dashicons-store",
			'show_in_rest' => true,
			'supports' => array('title', 'thumbnail', 'custom_fields', 'excerpt'),
			'taxonomies' => array('fp_location_types', 'fp_regions'),
			'has_archive' => false, //'centros-de-consumo',
			//'rewrite'  => array('slug' => 'lugar', 'with_front' => true),

		);

		// Post type, $args - the Post Type string can be MAX 20 characters
		register_post_type('fp_location', $locationArgs);
	}



	public function register_taxonomies()
	{


		/**
		 * TIPO DE ESTABLECIMIENTO
		 * Restaurant, Food Truck, Changarro
		 */
		register_taxonomy(
			'fp_location_types',
			array('fp_location'),
			array(
				'labels' => array(
					'name' => 'Tipo de establecimiento',
					'add_new_item' => 'Agregar nuevo tipo',
					'new_item_name' => "Nuevo tipo",
				),
				'public' => true,
				'publicly_queryable' => false,
				'show_ui' => true,
				'show_in_menu' => true,
				'show_tagcloud' => false,
				'hierarchical' => true,
				'show_in_rest'       => true,
				'show_admin_column' => true, //see this line

				// 'rewrite' =>  array("slug" => "establecimiento")
			)
		);

		/**
		 * Categoría principal (tipo de cocina)
		 */
		register_taxonomy(
			'fp_regions',
			array('fp_location'),
			array(
				'labels' => array(
					'name' => 'Regiones',
					'add_new_item' => 'Agregar nueva región',
					'new_item_name' => "Nueva región",
				),
				'public' => true,
				'publicly_queryable' => false,

				'show_ui' => true,
				'show_tagcloud' => false,
				'hierarchical' => true,
				'show_in_rest'       => true,
				'show_admin_column' => true, //see this line

				'show_in_menu' => true,

				// 'default_term' => array(
				// 	'name' => 'Sin especificar',
				// 	'slug' => 'sin-especificar'
				// ),
				// 'rewrite' =>  array("slug" => "cat")
			)
		);
	}

	public function register_location_fields()
	{
		$prefix = "fp_location_";



		/**
		 * DÓNDE COMPRAR
		 */


		$cmb_socio = new_cmb2_box(array(
			'id'            => 'fp_location_fields',
			'title'         => esc_html__('Datos del lugar', 'cmb2'),
			'object_types'  => array('fp_location'), // Post type
			'context'    => 'normal',
			'priority'   => 'high',
			'show_names' => true, // Show field names on the left
			'show_in_rest' => true,
			'tabs' => array(
				array(
					'id'    => 'socio-tab-1',
					'icon' => 'dashicons-index-card',
					'title' => 'Información General',
					'fields' => array(
						$prefix . 'direccion',
						$prefix . 'telefono',
						$prefix . 'whatsapp',
						$prefix . 'web',
						$prefix . 'social_networks',

					),
				),
				array(
					'id'    => 'socio-tab-2',
					'icon' => 'dashicons-location',
					'title' => 'Geolocalización',
					'column' => true,
					'fields' => array(
						$prefix . 'geolocalizacion',
					),
				),
			)

		));






		$cmb_socio->add_field(array(
			'name'    => "Dirección",
			'desc'    => "Dirección del lugar",
			'id'      => $prefix . 'direccion',
			'type'    => 'text',
		));

		$cmb_socio->add_field(array(
			'name'    => "Teléfono",
			'desc'    => "Teléfono del lugar",
			'id'      => $prefix . 'telefono',
			'type'    => 'text',
		));

		$cmb_socio->add_field(array(
			'name'    => "WhatsApp",
			'desc'    => "Número de WhatsApp",
			'id'      => $prefix . 'whatsapp',
			'type'    => 'text',
		));


		$cmb_socio->add_field(array(
			'name'    => "Página Web",
			'desc'    => "Página web del lugar",
			'id'      => $prefix . 'web',
			'type'    => 'text_url',
		));

		$cmb_socio->add_field(array(
			'name'    => "Redes sociales",
			// 'desc' => 'Introduce las redes sociales del local',
			'id'      => $prefix . 'social_networks',
			'type'    => 'social',
			'repeatable' => true,
		));

		$cmb_socio->add_field(array(
			'name' => 'Geolocalización',
			'desc' => 'Arrastra el marcador a la ubicación',
			'id' => $prefix . 'geolocalizacion',
			'type' => 'pw_map',
			'split_values' => true, // Save latitude and longitude as two separate fields
		));



		// $cmbMETABOX = new_cmb2_box(array(
		// 	'id'            => 'test_metabox',
		// 	'title'         => __('Test Metabox', 'cmb2'),
		// 	'object_types'  => array('bushmills_retailer',), // Post type
		// 	'context'       => 'normal',
		// 	'priority'      => 'high',
		// 	'show_names'    => true, // Show field names on the left
		// 	// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 	// 'closed'     => true, // Keep the metabox closed by default
		// ));



		// $cmbMETABOX->add_field(array(
		// 	'name'           => 'Test Taxonomy Radio',
		// 	'desc'           => 'Description Goes Here',
		// 	'id'             => 'wiki_test_taxonomy_radio',
		// 	'taxonomy'       => 'bushmills_retailers', // Enter Taxonomy Slug
		// 	'type'           => 'taxonomy_radio',
		// 	// Optional :
		// 	'text'           => array(
		// 		'no_terms_text' => 'Sorry, no terms could be found.' // Change default text. Default: "No terms"
		// 	),
		// 	'remove_default' => 'true', // Removes the default metabox provided by WP core.
		// 	// Optionally override the args sent to the WordPress get_terms function.
		// 	'query_args' => array(
		// 		// 'orderby' => 'slug',
		// 		// 'hide_empty' => true,
		// 	),
		// ));
	}



	public function foodandpleasure_settings()
	{
		$prefix = "foodandp_";

		/**
		 * Registers options page menu item and form.
		 */
		$cmb_options = new_cmb2_box(array(
			'id'           => 'foodandp_content_page',
			'title'        => 'Food & Pleasure',
			'object_types' => array('options-page'),

			/*
			 * The following parameters are specific to the options-page box
			 * Several of these parameters are passed along to add_menu_page()/add_submenu_page().
			 */

			'option_key'      => 'foodandpleasure_settings', // The option key and admin menu page slug.
			'icon_url'        => 'dashicons-admin-site', // Menu icon. Only applicable if 'parent_slug' is left empty.
			// 'menu_title'      => esc_html__( 'Options', 'cmb2' ), // Falls back to 'title' (above).
			//'parent_slug'     => 'edit.php?post_type=webcammx', // Make options page a submenu item of the themes menu.
			'capability'      => 'edit_others_posts', // Cap required to view options-page.
			// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
			// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
			// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
			// 'save_button'     => esc_html__( 'Save Theme Options', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
			// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
			// 'message_cb'      => array( $this, 'notify_server' ),
			// 'tab_group'       => '', // Tab-group identifier, enables options page tab navigation.
			// 'tab_title'       => null, // Falls back to 'title' (above).
			'autoload'        => false, // Defaults to true, the options-page option will be autloaded.
		));



		$cmb_options->add_field(array(
			'name' => 'PORTADA',
			'desc' => 'Configura las opciones de portada',
			'type' => 'title',
			'id'   => $prefix . 'portada_title'
		));

		$cmb_options->add_field(array(
			'name' => 'Descripción Our Favorites',
			'desc' => 'Descripción de la sección Our Favorites',
			'default' => '',
			'id'   => $prefix . 'our_favorites_desc',
			'type' => 'textarea_small',
		));



		$cmb_options->add_field(array(
			'name'      	=> 'Favorites',
			'id'        	=> $prefix . 'our_favorites',
			'type'      	=> 'post_ajax_search',
			'desc'			=> 'Comienza escribiendo el título del artículo.',
			// Optional :
			'multiple-item' => true,
			'limit'      	=> 50,
			'sortable' 	 	=> true, 	// Allow selected items to be sortable (default false)
			'query_args'	=> array(
				'post_type'			=> array('post'),
				'post_status'		=> array('publish'),
				'posts_per_page'	=> 5,
				/*'date_query' => array(
					'after' => date('Y-m-d', strtotime('-2 years')) 
				)*/
			)
		));
	}


	public function food_register_user_profile_metabox()
	{

		/**
		 * Metabox for the user profile screen
		 */
		$cmb_user = new_cmb2_box(array(
			'id'               => 'food_user_edit',
			'title'            => esc_html__('Perfil', 'cmb2'), // Doesn't output for user boxes
			'object_types'     => array('user'), // Tells CMB2 to use user_meta vs post_meta
			'show_names'       => true,
			'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		));

		$cmb_user->add_field(array(
			'name'    => 'Imagen de perfil',
			'desc'    => 'Asigna una imagen de perfil para el usuario',
			'id'      => 'food_user_avatar',
			'type'    => 'file',
			'text'    => array(
				'add_upload_file_text' => 'Agregar Avatar' // Change upload button text. Default: "Add or Upload File"
			),
			// query_args are passed to wp.media's library query.
			'query_args' => array(
				//'type' => 'application/pdf', // Make library only display PDFs.
				// Or only allow gif, jpg, or png images
				'type' => array(
					'image/gif',
					'image/jpeg',
					'image/png',
				),
			),
			'preview_size' => 'thumbnail', // Image size to use when previewing in the admin.
		));
	}


	public function custom_user_avatar($avatar, $id_or_email, $size, $alt, $args)
	{

		if (!is_admin()) return $avatar;

		$img = get_user_meta($id_or_email, 'food_user_avatar', true);
		if (isset($img) && $img != "")
			$avatar = '<img alt="' . $alt . '" src="' . $img . '" width="' . $size . '" height="' . $size . '" style="object-fit:cover;" />';

		return $avatar;
	}
}
