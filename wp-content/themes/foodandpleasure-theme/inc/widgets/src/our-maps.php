<?php

// Creating the widget 
class WA_Our_Maps extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'wa_our_maps_widget',

            // Widget name will appear in UI
            __('WA -Our Maps', 'wpb_widget_domain'),

            // Widget description
            array(
                'description' => __('Our Maps', 'wpb_widget_domain'),
                'classname' => 'wa_our_maps_widget',
            )
        );
    }

    // Creating widget front-end

    public function widget($args, $instance)
    {
        global $post;

        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // This is where you run the code and display the output
?>
        <?php

        //if ( false === ( $tag_ids[] = get_transient( "thRelatedPosts_tags_".$post->ID ) ) ) {

        $tags = wp_get_post_tags(get_the_ID(), array('orderby' => 'count', 'order' => 'DESC'));
        $tag_ids = array();
        $tagnumber = 0;
        $invalidtags = array();
        foreach ($tags as $individual_tag) {
            $tagnumber++;
            if (in_array($individual_tag->term_id, $invalidtags)) continue;
            $tag_ids[] = $individual_tag->term_id;
            if ($tagnumber == 3) break;
        }


        if (count($tag_ids) == 0) {
            /*
                    'post_status' => 'publish',
                    'post_type' => 'post',
                    'category__in'   => $cats,
                    'posts_per_page' => 1,
                    'post__not_in'   => array(get_the_ID()),
                    'fields' => 'ids',
                    'cache_results'  => false,
                    'update_post_meta_cache' => false,
                    'update_post_term_cache' => false,
                    'has_password' => false,

*/
            $_args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'tag__in' => $tag_ids,
                'post__not_in' => array(get_the_ID()),
                'posts_per_page' => 3,
                'no_found_rows' => true,
                'ignore_sticky_posts' => 1,
                'order' => 'DESC',
                'orderby' => 'date',
                'has_password' => false,
            );
        } else {

            $post_categories = wp_get_post_categories(get_the_ID(), array('fields' => 'ids'));

            $_args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'category__in'     => $post_categories,
                'post__not_in' => array(get_the_ID()),
                'posts_per_page' => 4,
                'no_found_rows' => true,
                'caller_get_posts' => 1,
                'order' => 'DESC',
                'orderby' => 'date',
                'has_password' => false,
            );
        }

        $my_query = new WP_Query($_args);


        if ($my_query->have_posts()) {

        ?>
            <div class="wa_our_maps_widget__items">
                <?php
                while ($my_query->have_posts()) {
                    $my_query->the_post();

                    // $_itemArgs = array(
                    //     'items_layout_css' => 'article-item',
                    //     'items_swiper' => false,
                    //     'items_config' => array(
                    //         'items_show_tags' => false,
                    //         'items_show_main_cat' => false,
                    //         'items_show_badge_cat' => false,
                    //         'items_show_date' => false,
                    //         'items_show_author' => false,
                    //         'items_show_excerpt' => false,
                    //         'items_show_arrow' => false,
                    //         'items_show_more_btn' => false,
                    //         'items_more_btn_txt' => __('Leer más', 'wa-theme'),
                    //         'items_more_arrow' => "data:image/svg+xml,%3C%3Fxml version='1.0' encoding='UTF-8'%3F%3E%3Csvg id='Layer_1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1080 1080'%3E%3Cdefs%3E%3Cstyle%3E.cls-1%7Bfill:%23231f20;%7D%3C/style%3E%3C/defs%3E%3Cpolygon class='cls-1' points='712.44 427.01 711.93 427.45 711.93 527.27 283.72 527.27 283.72 541.33 711.93 541.33 711.93 641.14 712.44 641.58 835.08 534.3 712.44 427.01'/%3E%3C/svg%3E",
                    //         'image_animation' => true,
                    //     ),
                    // );

                    $_itemArgs = array(
                        'items_layout_css' => 'article-item--related',
                        'items_config' => array(
                            'items_show_main_cat' => true,
                            'items_show_author' => true,

                        ),
                    );
                    get_template_part('template-parts/items/article', 'item', $_itemArgs);
                }
                ?>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    <?php
        echo $args['after_widget'];
    }

    // Widget Backend 
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Título', 'wpb_widget_domain');
        }
        // Widget admin form
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titulo:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
<?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }

    // Class wpb_widget ends here
}


// Register and load the widget
function load_wa_our_maps_widget()
{
    register_widget('WA_Our_Maps');
}
add_action('widgets_init', 'load_wa_our_maps_widget');
?>