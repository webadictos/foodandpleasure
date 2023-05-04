<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="main" class="site-main container px-md-0" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="category-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
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
