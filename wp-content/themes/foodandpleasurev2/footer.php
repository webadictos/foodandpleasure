<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container-fluid">
		<div class="row footer-dark py-5">
		<div class="col-12 col-md-6  my-5 my-md-0 text-center  text-lg-left align-self-center pl-md-5 order-last order-md-first">
						<a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo get_template_directory_uri();?>/images/logo-food.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo logo-footer" width="238" height="47">
                        </a>
		</div>

		<div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
			<?php my_social_media_icons(false);?>
		</div>
		</div>


		<nav class="navbar navbar-expand-sm navbar-light">
			<div id="footer-nav" class="navbar-collapse">
				<ul id="menu-footer" class="navbar-nav text-center text-sm-left">
					<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
					<a title="Anúnciate con nosotros" href="mailto:ventas.foodandpleasure@gmail.com" class="nav-link">Anúnciate con nosotros <span>ventas.foodandpleasure@gmail.com</span></a>
					</li>

					<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
					<a title="Contacto Editorial" href="mailto:ventas.foodandpleasure@gmail.com" class="nav-link">Contacto editorial <span>editorial@foodandpleasure.com</span></a>
					</li>

					<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="menu-item nav-item">
					<a title="Aviso de privacidad" href="#" class="nav-link">Aviso de privacidad</a>
					</li>

				</ul>
		   </div> 
		   <span class="navbar-text mx-auto mx-md-3"> MX © Food & Pleasure. Todos los derechos reservados. </span>
		</nav>


		
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->
<?php get_template_part( 'template-parts/sections/overlay','search'); ?>
<?php wp_footer(); ?>
<?php if(is_single()): ?>
<script async src="https://t.seedtag.com/t/3100-3594-01.js"></script>
<?php endif;?>
</body>
</html>