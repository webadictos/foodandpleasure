<?php
/**
 * Our Favorites
 */

//

//$populares=getTrendingNow();


 $populares = Foodandpleasure_Public::get_opciones('foodandpleasure_settings','foodandp_our_favorites');

?>

<section class="seccion our-favorites my-4">
<h2 class="section-title text-center pt-4 pb-3 mb-5">OUR FAVORITES</h2>
<div class="container px-md-0">
<div class="row favorites-row">
<?php
$i=0;
foreach($populares as $post):
    
    if($i==3) break;
    setup_postdata($post);  
    
?>
   <div class="col-12 col-md-4 d-flex mb-4 favorite-item">

        <?php
            //Lo Último
          get_template_part( 'template-parts/article','item-horizontal');
        ?>

   </div>

<?php

$i++;


endforeach;
?>
</div>

<div class="row justify-content-end">

   <div class="col-2 py-3 text-right">
   <a class="arrow-link" href="/our-favorites/" title="Our Favorites"></a>
   </div>

</div>


</div>
</section>
