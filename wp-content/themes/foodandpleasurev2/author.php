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
 $queried_object = get_queried_object();
 
 $exclude_ids=array();

 $title=get_the_archive_title();
?>
<?php
$pagina = get_query_var( 'paged' ) ? get_query_var('paged') : 1;
?> 
	<section id="primary" class="content-area">
		<div id="main" class="site-main container px-md-0" role="main">

		<?php
		if ( have_posts() ) : ?>

            <header class="author-info mb-5 text-center p-4 my-4">
                    <?php echo get_avatar($queried_object->ID,"150"); ?>
                    <h1 class="page-title text-center"><?php echo get_the_author_meta('display_name',$queried_object->ID); ?></h1>


                            <?php
                                    $bio = get_the_author_meta( 'description', $queried_object->ID );

                                    if($bio!=""):
                            ?>
                                    <p class="bio mx-auto px-2 px-md-5"><?php echo $bio;?></p>


                            <?php endif; ?>
            </header>
			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
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
