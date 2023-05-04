<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="main" class="site-main container px-md-0 my-4" role="main">
		<section class="articles-container">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			/*if ( comments_open() || get_comments_number() ) :
				comments_template();
		<script type="application/javascript" src="https://www5.smartadserver.com/ac?out=js&nwid=1204&siteid=369103&pgname=_home&fmtid=52013&tgt=[sas_target]&visit=m&tmstp=[timestamp]&clcturl=[countgo]"></script>

			endif;*/

		endwhile; // End of the loop.
		?>
		</section>


		<?php get_template_part( 'template-parts/sections/section', 'recientes' ); ?>

		</div><!-- #main -->

		<?php
            //Lo Último
          get_template_part( 'template-parts/sections/section','instagram');
        ?>
	</section><!-- #primary -->

<?php
get_footer();
