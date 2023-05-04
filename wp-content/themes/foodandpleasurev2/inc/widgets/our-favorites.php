<?php

// Creating the widget 
class food_ourfavorites_widget extends WP_Widget {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'food_ourfavorites_widget', 
  
// Widget name will appear in UI
__('Our Favorites', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Widget de Our Favorites', 'wpb_widget_domain' ), ) 
);
}
  
// Creating widget front-end
  
public function widget( $args, $instance ) {
  global $post;

$title = apply_filters( 'widget_title', $instance['title'] );
  
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
  
// This is where you run the code and display the output
?>
<ul>
<?php

  //if ( false === ( $tag_ids[] = get_transient( "thRelatedPosts_tags_".$post->ID ) ) ) {
    
    $populares = Foodandpleasure_Public::get_opciones('foodandpleasure_settings','foodandp_our_favorites');

    $i=0;
    foreach($populares as $post):
        
        if($i==3) break;
        setup_postdata($post);
       
    
       
                 //  $category = get_post_primary_category(get_the_ID());
                 //  $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
                 //  $catname = strtolower(get_cat_name($parent_cat));
                   //$tags = getWokiiTags(get_the_ID(),2);
       ?>
       
       <li>

       <?php
            //Lo Último
          get_template_part( 'template-parts/article','item-horizontal-noimage');
        ?>

       </li>
               
       
             <?php 
             $i++;
        endforeach;
?>
</ul>

<?php
echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Título', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Titulo:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}  
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
 
// Class wpb_widget ends here
} 
 
 
// Register and load the widget
function food_load_ourfavorites_widget() {
    register_widget( 'food_ourfavorites_widget' );
}
add_action( 'widgets_init', 'food_load_ourfavorites_widget' );
?>