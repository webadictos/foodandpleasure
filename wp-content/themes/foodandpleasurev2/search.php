<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="main" class="site-main container px-md-0" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="category-title"><?php printf( esc_html__( 'Resultados para: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
