<?php
/**
 * Template part for displaying lastests posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php


$carrusel = Foodandpleasure_Public::get_opciones('foodandpleasure_settings','foodandp_carrusel');

if(is_array($carrusel) && count($carrusel)>0):

$GLOBALS['carrusel_home'] = array_merge($carrusel,$GLOBALS['carrusel_home']);


//$featuredPostsSlider = new WP_Query();



/*
$_args = array(
    'showposts' => 3,
    'paged' => 1,
    'no_found_rows' => true,
    'post_status'=>'publish',
    'category_name' => 'destacada',
);*/

$_args=array(
    'showposts' => 3,
    'paged' => 1,
  //  'meta_key'     => 'rrm_post_show_carrusel',
  //  'meta_value'   => 'on',			
    'no_found_rows' => true, 
    'update_post_meta_cache' => false, 
    'update_post_term_cache' => false, 
);

//$featuredPostsSlider->query($_args);




?>



<div class="container">


<div id="featuredCarousel" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">

<?php

$i=0;
$numdestacado=0;
foreach($carrusel as $post):
  setup_postdata($post);
//while($featuredPostsSlider->have_posts()) : $featuredPostsSlider->the_post();
if($i == 0){
    $first_ID = get_the_ID();
    $first_LINK = get_the_permalink();
}
//$GLOBALS['carrusel_home'][]=get_the_ID();
$seodesc = get_the_excerpt();
if (has_post_thumbnail()):
    //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    $thumb = get_the_post_thumbnail(get_the_ID(),'full',array( 'title' => wp_strip_all_tags(get_the_title()), 'alt'=> wp_strip_all_tags(get_the_title()),'class'=>'d-block w-100'));
    else:
    //$thumb[0]=$GLOBALS['default_image'];
    $thumb ='<img  class="d-block w-100" width="100%" height="60vh" src="'.$GLOBALS['default_image'].'" alt="'.get_the_title().'" title="'.wp_strip_all_tags(get_the_title()).'">';
    endif;  


    $category = get_post_primary_category(get_the_ID());
    $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
    $catname = get_cat_name($parent_cat->term_id);    


    add_filter('term_links-post_tag','limit_to_tags');



?>

    <div class="carousel-item <?php echo $i==0 ? 'active':'';?>">



    <article class="article-carousel d-flex flex-column flex-md-row">
        <div class="thumbnail-carousel">
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo $thumb;?></a>
        </div>
        <header class="d-flex flex-column p-5 p-md-5 text-center article-carousel-header">

             <a class="mt-auto article-cat align-self-center" href="<?php  echo get_category_link( $parent_cat->term_id );?>"><?php echo $catname;?></a>

            <div class="carousel-meta my-auto pb-4 pb-md-0">
                <div class="article-tag d-none d-md-block"><?php the_tags( '', ', ', '' ); ?></div>
                 <h2 class="article-title"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title();?></a></h2>
                <div class="article-author">Por: <?php the_author_posts_link(); ?></div>
            </div>

            <a class="mb-auto d-none d-md-block" href="<?php the_permalink() ?>" title="Ver <?php echo get_the_title() ?>"><i class="fas fa-arrow-right"></i></a>
        </header>
    </article>


   
      

    </div>
    <?php	
						$numdestacado++;
						$i++;
                 //   endwhile; 
                  //  wp_reset_postdata();
						
				?>
  <?php endforeach;?>

  <?php     remove_filter('term_links-post_tag','limit_to_tags'); ?>
  </div>
  <a class="carousel-control-prev" href="#featuredCarousel" role="button" data-slide="prev">
    <img src="<?php echo get_template_directory_uri();?>/images/arrow.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="prev" width="17" height="32">
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#featuredCarousel" role="button" data-slide="next">
    <img src="<?php echo get_template_directory_uri();?>/images/arrow.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="next" width="17" height="32">
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<?php
endif;
?>