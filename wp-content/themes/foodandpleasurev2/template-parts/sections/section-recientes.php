
<?php
//print_r($GLOBALS['featured']);
//print_r($GLOBALS['carrusel_home']);
?>
<section class="seccion ultimos-articulos">
    <div class="container px-md-0">

<h3 class="section-title section-title-dos text-center py-4">Lo +  Reciente</h3>

        <div class="row more-container">

        <?php
                
                /* query_posts(array('showposts'=>4,'meta_query' => array(
                         array(
                          'key' => 'rrm_post_no_show_home',
                          'compare' => 'NOT EXISTS'
                         ),
                     )));*/

/*
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
*/
$_args=array(
    'post_status' => 'publish',
    'post_type' => 'post',
    'post__not_in' => array(get_the_ID()),
    'posts_per_page'=>3,
    'no_found_rows' => true,
    'caller_get_posts'=>1,
    'order' => 'DESC',
    'orderby'=>'date',
    'has_password' => false,
    );
    $my_query = new WP_Query($_args);

                     
                 if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); 
 
 ?>
                 <div class="col-12 col-md-4 d-flex mb-4">
                     
         <?php
            //Lo Último
          get_template_part( 'template-parts/article','item');
        ?>
                  </div>
                  <?php 
                  endwhile; 
                 ?>
                 <?php endif; ?>



        </div>

    
    </div>

</section>