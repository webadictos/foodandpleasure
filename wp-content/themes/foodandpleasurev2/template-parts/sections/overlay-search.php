<div id="search" class="food-overlay">
  <button type="button" class="close">×</button>
  <div class="container h-100">
    <div class="d-flex flex-column justify-content-center align-items-center h-100">
  <form role="search" method="get" class="search-form w-75" action="<?php echo esc_url( home_url( '/' ) );?>">
    <div class="search-wrapper position-relative">
    <input type="search" id="searchoverlay" name="s" value="" placeholder="Escribe la palabra clave..." autocomplete="off" />
    </div>
  </form>
    </div>
</div>
</div>

	<!-- Modal -->
	<div class="modal left fade modal-menu" id="menu-left" tabindex="-1" role="dialog" aria-labelledby="menu-left">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header justify-content-center justify-content-md-end">
					<button type="button" class="close m-0 p-0" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>

				<div class="modal-body p-0">
                <nav class="navbar h-100 p-0">


                <div class="navbar-text w-100 px-2 search-menu-left mb-3">
                <form role="search" method="get" class="search-form w-100" action="<?php echo esc_url( home_url( '/' ) );?>">
                    <div class="search-wrapper position-relative">
                    <input type="search" name="s" class="w-100" value="" placeholder="Escribe la palabra clave..." autocomplete="off" />
                    </div>
                </form>                  
                </div>


                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-left-nav',
                'container_class' => 'collapse show navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>     
                
                <div class="navbar-text w-100 text-center py-5 mt-auto menu-left-social"><?php my_social_media_icons(false);?></div>
                
                <div class="navbar-brand mt-5 mb-3 w-100 text-center">
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo get_template_directory_uri();?>/images/logo-food.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo" width="238" height="47">
                        </a>
                </div>

                </nav>

				</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->