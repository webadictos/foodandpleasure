<?php

// Creating the widget 
class food_ad_block_widget extends WP_Widget {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'food_ad_block_widget', 
  
// Widget name will appear in UI
__('Ad Block', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Ad Block', 'wpb_widget_domain' ), ) 
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
    
    $tags = wp_get_post_tags(get_the_ID(),array('orderby' => 'count', 'order' => 'DESC'));
    $tag_ids = array();
    $tagnumber=0;
    $invalidtags = array(3004,3005,3006);
    foreach($tags as $individual_tag) {
        $tagnumber++;
        if(in_array($individual_tag->term_id,$invalidtags)) continue;
        $tag_ids[] = $individual_tag->term_id;
        if($tagnumber==3) break;
    }


if(count($tag_ids)==0){ 
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
        $_args=array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'tag__in' => $tag_ids,
        'post__not_in' => array($post->ID),
        'posts_per_page'=>3,
        'no_found_rows' => true,
        'caller_get_posts'=>1,
        'order' => 'DESC',
        'orderby'=>'date',
        'has_password' => false,
        );

}else{
    
    $category_ids = get_post_primary_category(get_the_ID(),'category',true);
    //foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
        $_args=array(
        'post_status' => 'publish',
        'post_type' => 'post',
        'category__in'     => $category_ids['all_categories'],
        'post__not_in' => array(get_the_ID()),
        'posts_per_page'=>3,
        'no_found_rows' => true,
        'caller_get_posts'=>1,
        'order' => 'DESC',
        'orderby'=>'date',
        'has_password' => false,
        );
}
    $my_query = new WP_Query($_args);


    if( $my_query->have_posts() ) { 
       
            while( $my_query->have_posts() ) {
              $my_query->the_post();
       
    
       
                 //  $category = get_post_primary_category(get_the_ID());
                 //  $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
                 //  $catname = strtolower(get_cat_name($parent_cat));
                   //$tags = getWokiiTags(get_the_ID(),2);
       ?>
       
       <li>

       <?php
            //Lo Último
          get_template_part( 'template-parts/article','item-horizontal');
        ?>

       </li>
               
       
             <?php 
               }

            }
            wp_reset_query(); 
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
function food_load_lomasleido_widget() {
    register_widget( 'food_lomasleido_widget' );
}
add_action( 'widgets_init', 'food_load_lomasleido_widget' );
?>