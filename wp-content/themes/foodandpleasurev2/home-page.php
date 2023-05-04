<?php
/**
 * Template Name: HOME PAGE
 */

get_header();
?>
    <section id="primary" class="content-area py-3">
        <div id="main" class="site-main" role="main">

        
        
        <?php
            //Lo Último
          get_template_part( 'template-parts/home/section','carrusel');
        ?>

        <?php
            //Lo Último
          get_template_part( 'template-parts/home/section','popular');
        ?>


        <?php
            //Lo Último
         get_template_part( 'template-parts/home/section','favorites');
        ?>




<?php
            //Lo Último
         get_template_part( 'template-parts/home/section','ultimos');
        ?>

<?php
            //Lo Último
          get_template_part( 'template-parts/sections/section','instagram');
        ?>
        </div><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();
