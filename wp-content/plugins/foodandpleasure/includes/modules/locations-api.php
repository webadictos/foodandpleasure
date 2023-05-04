<?php

/**
 * Register the /wp-json/fancysquares/v1/vandelay_industries endpoint
 */

/**
 * get vandelay_industries by location radius, closest within 10 files to what you entered
 */
class BUSHMILLS_Locations_API extends WP_REST_Controller
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->namespace = 'bushmills/v1';
        $this->rest_base = 'get_locations';
    }

    /**
     * Register the component routes.
     */
    public function register_routes()
    {
        //region added
        register_rest_route($this->namespace, '/' . $this->rest_base, array(
            array(
                'methods'             => WP_REST_Server::READABLE,
                'callback'            => array($this, 'bushmills_get_locations'),
                'permission_callback' => array($this, 'bushmills_locations_permissions_check'),
                'args'                => $this->get_collection_params(),
            )
        ));
    }

    /**
     * Retrieve vandelay industries locations
     */
    public function bushmills_get_locations($request)
    {

        $lat1 = $request['lat'];
        $lng1 = $request['lng'];

        $type = $request['type'];
        $post_type = "bushmills_retailer";

        switch ($type) {
            case "retails":
                $post_type = "bushmills_retailer";
                break;

            case "consumo":
                $post_type = " bushmills_location";

                break;

            default:
                $post_type = "bushmills_retailer";

                break;
        }
        $proximity = isset($request['proximity']) ? $request['proximity'] : 100;


        if ($lat1 && $lng1) {

            $args = array(
                'update_post_term_cache' => false,
                'post_type'         => $post_type,
                'posts_per_page'     => -1, // $request['per_page'],
                //'paged'               => $request['page'],
                'geo_query' => array(
                    'lat_field' => 'bushmills_retailer_geolocalizacion_latitude',  // this is the name of the meta field storing latitude
                    'lng_field' => 'bushmills_retailer_geolocalizacion_longitude', // this is the name of the meta field storing longitude 
                    'latitude'  => $lat1,    // this is the latitude of the point we are getting distance from
                    'longitude' => $lng1,   // this is the longitude of the point we are getting distance from
                    'distance'  => $proximity,    // this is the maximum distance to search
                    'units'     => 'km'       // this supports options: miles, mi, kilometers, km
                ),
                'meta_query' => array(),
                'orderby' => 'distance', // this tells WP Query to sort by distance
                'order'   => 'ASC'
            );

            // print_r('sorted');
            // die;



            // use WP_Query to get the results with pagination
            $query = new WP_Query($args);

            // if no posts found return 
            if (empty($query->posts)) {
                return new WP_Error('no_posts', __('No post found'), array('status' => 404));
            }

            // set max number of pages and total num of posts
            $posts = $query->posts;

            $max_pages = $query->max_num_pages;
            $total = $query->found_posts;

            foreach ($posts as $post) {
                $response = $this->prepare_item_for_response($post, $request);
                $data[] = $this->prepare_response_for_collection($response);
            }

            // set headers and return response      
            $response = new WP_REST_Response($data, 200);

            $response->header('X-WP-Total', $total);
            $response->header('X-WP-TotalPages', $max_pages);

            // return data/response
            return $response;
        } else {
            return new WP_Error('error', __('No especificó la ubicación'), array('status' => 404));
        }
    }

    /**
     * Check if a given request has access to post items.
     */
    public function bushmills_locations_permissions_check($request)
    {
        return true;
    }

    /**
     * Get the query params for collections
     */
    public function get_collection_params()
    {
        return array(
            'page'     => array(
                'description'       => 'Current page of the collection.',
                'type'              => 'integer',
                'default'           => 1,
                'sanitize_callback' => 'absint',
            ),
            'per_page' => array(
                'description'       => 'Maximum number of items to be returned in result set.',
                'type'              => 'integer',
                'default'           => 6,
                'sanitize_callback' => 'absint',
            ),
        );
    }

    /**
     * Prepares post data for return as an object.
     */
    public function prepare_item_for_response($post, $request)
    {
        // get card id
        $postID = $post->ID;
        // meta fields notes:
        /*
            * get_post_custom returned ALL META, we only want ACF
            * get_fields is a unique helper function to ACF (only gets Meta Fields done by ACF)
            * returns array of ALL ACF fields
            * if empty, should return null by default per field
            *
            * was previously using get_post_meta() for the fields individually
            * this would be the way to go if the cards had more meta fields that had nothing to do with the API data returned / example: custom page builder for the front-end
        */
        // get card title - post title - default field
        $postTitle = $post->post_title;
        $address = get_post_meta($postID, 'bushmills_retailer_direccion', true);
        $tel = get_post_meta($postID, 'bushmills_retailer_telefono', true);
        $lat = get_post_meta($postID, 'bushmills_retailer_geolocalizacion_latitude', true);
        $long = get_post_meta($postID, 'bushmills_retailer_geolocalizacion_longitude', true);
        $distance = GJSGeoQuery::get_the_distance($post, true);
        $retailer = get_the_terms($postID, 'bushmills_retailers');

        $_args = array(
            'post_type' => 'bushmills_product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'bushmills_retailers',
                    'field' => 'slug',
                    'terms' => $retailer[0]->slug, // or the category name e.g. Germany
                ),
            ),
            'posts_per_page'        => -1,
            'fields' => 'ids'
        );

        $productsOnSale = new WP_Query($_args);



        $data = array(
            'id'                 => $postID,
            'title'             => $postTitle,
            'tel' => $tel,
            'lat' => (float) $lat,
            'lng' => (float) $long,
            'address' => $address,
            'retail' => $retailer[0]->name,
            'distance' => $distance,
            'products' => $productsOnSale->posts,
        );

        return $data;
    }
}


add_action('rest_api_init', function () {
    $controller = new BUSHMILLS_Locations_API();
    $controller->register_routes();
});
