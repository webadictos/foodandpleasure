<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
<?php
global $categoriaPadre;

 $queried_object = get_queried_object();

 $exclude_ids=array();


$title=get_cat_name($queried_object->term_id);

$hasParent=false;
?>
            <?php

$pagina = get_query_var( 'paged' ) ? get_query_var('paged') : 1;
$featuredID=array();
?> 
	<section id="primary" class="content-area">
		<div id="main" class="site-main container px-md-0" role="main">


        <?php
        if($pagina==1):
            $_args=array(
                'posts_per_page' => 1,
                'paged' => 1,
            //  'meta_key'     => 'rrm_post_show_carrusel',
            //  'meta_value'   => 'on',			
                'no_found_rows' => true, 
                'update_post_meta_cache' => false, 
                'update_post_term_cache' => false, 
                'cat' => $queried_object->term_id,
                'post_status'=>'publish',

            );
            $featuredSeccion = new WP_Query();

            $featuredSeccion->query($_args);

            ?>
            <div class="my-4 category-featured">
<?php
while($featuredSeccion->have_posts()) : $featuredSeccion->the_post();

$featuredID[] = get_the_ID();

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




    <article class="article-carousel d-flex flex-column flex-md-row">
        <div class="thumbnail-carousel">
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo $thumb;?></a>
        </div>
        <header class="d-flex flex-column pt-5 px-5 pb-2 p-md-5 text-center article-carousel-header">

             <h1><a class="mt-auto article-cat align-self-center" href="<?php  echo get_category_link( $parent_cat->term_id );?>"><?php echo $catname;?></a></h1>

            <div class="carousel-meta my-auto px-md-5 pb-4 pb-md-0">
                <div class="article-tag d-none d-md-block"><?php the_tags( '', ', ', '' ); ?></div>
                 <h2 class="article-title"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title();?></a></h2>
                <div class="article-author">Por: <?php the_author_posts_link(); ?></div>
            </div>

            <a class="mb-auto mx-auto d-none d-md-block arrow-link" href="<?php the_permalink() ?>" title="Ver <?php echo get_the_title() ?>"></a>
        </header>
    </article>

    <?php	
						$numdestacado++;
						$i++;
                    endwhile; 
                    wp_reset_postdata();
                    ?>
            </div>




<?php
//category__and

$_args=array(
    'posts_per_page' => 3,
//  'meta_key'     => 'rrm_post_show_carrusel',
//  'meta_value'   => 'on',			
    'no_found_rows' => true, 
    'update_post_meta_cache' => false, 
    'update_post_term_cache' => false, 
    'category__and' => array($queried_object->term_id,701),
    'post__not_in' => $featuredID,
//    'cat' => $queried_object->term_id,
    'post_status'=>'publish',

);
$featuredSeccionDos = new WP_Query();

$featuredSeccionDos->query($_args);

?>

<div class="row my-4">

  <div class="col-12 col-md-6">
  <?php
while($featuredSeccionDos->have_posts()) : $featuredSeccionDos->the_post();

$featuredID[] = get_the_ID();

?>

<?php
	   //Lo Último
	 get_template_part( 'template-parts/article','item');
   ?>

    <?php	
                    endwhile; 
                    wp_reset_postdata();
                    ?>
  </div>
  <div class="col-12  col-md-6 px-md-5">
      <?php get_sidebar();?>
  </div>

</div>

<?php
                endif;
				?>

		<?php
        $perpage=6;
        if($pagina>1) $perpage=9;
        query_posts(array('posts_per_page'=>$perpage,'paged'=>$pagina,'cat' => $queried_object->term_id,'post_status'=>'publish','post__not_in'=>$featuredID));


		if ( have_posts() ) : ?>
    <?php if($pagina>1):?>
			<header class="page-header">
				<h1 class="category-title"><?php echo $title;?></h1>
			</header><!-- .page-header -->
    <?php endif;?>
			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
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
			</div>

            <section class="container paginacion py-5 mb-5 text-center">
                    <!--Paginación-->
                    <?php the_posts_pagination( array("mid_size"=>2,"prev_text"=>"&laquo;","next_text"=>"&raquo;") );?>
                    <!--Fin Paginación-->
            </section>

<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
