<?php

// Creating the widget 
class wa_most_liked extends WP_Widget
{

    function __construct()
    {
        parent::__construct(

            // Base ID of your widget
            'wa_most_liked_widget',

            // Widget name will appear in UI
            __('WA - Most Liked', 'wpb_widget_domain'),

            // Widget description
            array(
                'description' => __('Most Liked', 'wpb_widget_domain'),
                'classname' => 'wa_most_liked_widget',
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
        $favorites = WA_Theme_Manager::get_opciones('foodandpleasure_settings', 'foodandp_our_favorites');



        if (is_array($favorites) && count($favorites) > 0) :

        ?>
            <ul>
                <?php
                $i = 1;
                foreach ($favorites as $post) :
                    $order = "";
                    if ($i == 4) break;
                    setup_postdata($post);

                ?>

                    <li><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title(); ?></a></li>

                <?php
                    $i++;
                endforeach;
                wp_reset_postdata();

                ?>
            </ul>
        <?php
        endif;
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
function load_wa_most_liked_widget()
{
    register_widget('wa_most_liked');
}
add_action('widgets_init', 'load_wa_most_liked_widget');
?>