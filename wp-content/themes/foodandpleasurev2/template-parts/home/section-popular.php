<?php
/**
 * Popular
 */

//

//$populares=getTrendingNow();


// $populares = Foodandpleasure_Public::get_opciones('foodandpleasure_settings','foodandp_carrusel');
if(function_exists('stats_get_csv')):
?>

<section class="seccion mas-leido container px-md-0 my-4">
<h2 class="section-title section-title-dos text-center py-4">LO + LEÍDO</h2>

<div class="row no-gutters">
<?php
           if ( false === ( $popularToday = get_transient( "food_popular_today" ) ) ) {
           
            //  $popularToday = stats_get_csv( 'postviews', "period=days&days=3&limit=15" );
  
              $popularToday = stats_get_csv( 'postviews', array( 'days' => 2, 'limit' => 20 ) );
          
              set_transient('food_popular_today', $popularToday, 30*MINUTE_IN_SECONDS); // 30 Minutos
          }

          $ml=0;
          $exclude_ids=array(35349);

$i=0;
foreach ( $popularToday as $p ):
    
  if(intval($p['post_id'])>0 && !in_array(intval($p['post_id']),$exclude_ids)):

  if (!has_post_thumbnail($p['post_id'])) continue;

  $ml++;
           
  if($ml>3) break;

  $exclude_ids[]=$p['post_id'];

    $post = get_post($p['post_id']);

    setup_postdata($post);  
    
?>
   <div class="col-12 col-md-4 d-flex mb-4 p-md-1">

        <?php
            //Lo Último
          get_template_part( 'template-parts/article','item');
        ?>

   </div>

<?php

$i++;

  endif;

endforeach;
wp_reset_postdata();
?>
</div>
</section>
<?php
endif;
