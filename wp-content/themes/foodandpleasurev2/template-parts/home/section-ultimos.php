
<?php
//print_r($GLOBALS['featured']);
//print_r($GLOBALS['carrusel_home']);
?>
<section class="seccion ultimos-articulos">
    <div class="container px-md-0">

        <div class="row more-container">

        <?php
                
                /* query_posts(array('showposts'=>4,'meta_query' => array(
                         array(
                          'key' => 'rrm_post_no_show_home',
                          'compare' => 'NOT EXISTS'
                         ),
                     )));*/
                     query_posts(array('posts_per_page'=>6,'post_status'=>'publish','post__not_in'=>$GLOBALS['carrusel_home']));
                     
                 if (have_posts()) : while (have_posts()) : the_post(); 
 
 ?>
                 <div class="col-12 col-md-6 d-flex mb-4">
                     
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
        


        <button id="btn-more-home" class="btn btn-more d-block mx-auto loadmore" data-container="more-container" data-not-in="<?php echo json_encode($GLOBALS['carrusel_home']);?>">Ver más</button>

    </div>

</section>