<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>

<meta property="fb:app_id" content="1587891547963166" />


<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
  var slots=[];
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
</script>

<script>
  googletag.cmd.push(function() {

    //MAPPINGS
    var ros_top_a = googletag.sizeMapping().
      addSize([0, 0], [728, 90]).
      addSize([320, 0], [[320, 50], [320, 100]]). //Mobile
      addSize([1024, 200], [[970, 250],[970, 90],[728, 90]]). // Desktop
      build();

      var ros_top_b = googletag.sizeMapping().
      addSize([0, 0], [728,90]).
      addSize([320, 0], [[320, 50], [320, 100], [300, 250]]). //Mobile
      addSize([1024, 200], [[970, 90],[728, 90]]). // Desktop
      build();

      var ros_box_a = googletag.sizeMapping().
      addSize([0, 0], [300, 250]).
      addSize([320, 0], [[300, 250], [300, 600]]). //Mobile
      addSize([1024, 200], [[300, 250], [300, 600]]). // Desktop  
      build();

      var ros_inread = googletag.sizeMapping().
      addSize([0, 0], [[1,1],'fluid',[300, 250]]).
      addSize([320, 0], [[1,1],[300, 250], [300, 600],'fluid']). //Mobile
      addSize([1024, 200], [[1,1],'fluid',[300, 250]]). // Desktop  
      build();

      slots['top-a']=googletag.defineSlot('/1026310/FoodAndPleasure/top-a', [[980, 200],[970, 250], [320, 50], [970, 90], [320, 100], [728, 90]], 'div-gpt-ad-1554933679200-0').defineSizeMapping(ros_top_a).addService(googletag.pubads());
      slots['top-b']=googletag.defineSlot('/1026310/FoodAndPleasure/top-b', [[728, 90], [320, 100], [320, 50]], 'div-gpt-ad-1554933805100-0').defineSizeMapping(ros_top_b).addService(googletag.pubads());
      slots['box-a']=googletag.defineSlot('/1026310/FoodAndPleasure/box-a', [[300, 250], [300, 600]], 'div-gpt-ad-1554934013848-0').defineSizeMapping(ros_box_a).addService(googletag.pubads());
      slots['box-b']=googletag.defineSlot('/1026310/FoodAndPleasure/box-b', [[300, 250], [300, 600]], 'div-gpt-ad-1554933982278-0').defineSizeMapping(ros_box_a).addService(googletag.pubads());
      slots['box-c']=googletag.defineSlot('/1026310/FoodAndPleasure/box-c', [[300, 250], [300, 600]], 'div-gpt-ad-1554934090386-0').defineSizeMapping(ros_box_a).addService(googletag.pubads());
      slots['inread']=googletag.defineSlot('/1026310/FoodAndPleasure/inread',[[1,1],'fluid',[300, 250],[300, 600]], 'div-gpt-ad-1554934136881-0').defineSizeMapping(ros_inread).addService(googletag.pubads());
      slots['interstitial']=googletag.defineSlot('/1026310/FoodAndPleasure/interstitial', [1, 1], 'div-gpt-ad-1554934250385-0').addService(googletag.pubads());
      slots['VideoWall']=googletag.defineSlot('/1026310/FoodAndPleasure/VideoWall', [[300, 250], [300, 600]], 'div-gpt-ad-1565377299902-0').defineSizeMapping(ros_box_a).addService(googletag.pubads());


    googletag.pubads().setTargeting("canal",window.food_config.page.canal);
    googletag.pubads().setTargeting("postID",window.food_config.page.postID);
    googletag.pubads().setTargeting("tags",window.food_config.page.tags);
    googletag.pubads().setTargeting("single",window.food_config.page.is_single);   
    googletag.pubads().setTargeting("url",window.location.pathname);
    googletag.pubads().setTargeting("referrer",document.referrer.split('/')[2]);
    googletag.pubads().setCentering(true);

        googletag.pubads().enableLazyLoad({
            fetchMarginPercent: 50, 
            renderMarginPercent: 25,
            mobileScaling: 2.0
        });

    googletag.pubads().disableInitialLoad();

 
    googletag.enableServices();


    googletag.pubads().addEventListener('slotRenderEnded', function (event) {
      if (event.isEmpty) {
        var id = event.slot.getSlotElementId();
        var x = document.getElementById(id);
        x.style.display = "none";
                console.log("No tiene anuncio");
                
        var r1 = x.closest(".ad-container");  

        if(r1){
          r1.style.display = "none";
        }

      }else{
                    var id = event.slot.getSlotElementId();
                    var x = document.getElementById(id);
                    console.log("Cargando anuncio");
                    //console.log(event);

                    x.classList.add("ad-slot");
                    
                    var r1 = x.closest(".ad-container");  

                    if(r1){
                        r1.style.display = r1.style.display === 'none' ? '' : '';
                    }              
        }
    });


  });
</script>

</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header sticky-top navbar-dark" role="banner">
        <div class="container-fluid px-0 px-md-5">
            <nav class="navbar navbar-expand-xl p-0">


            <button class="menu-toggler mr-4" type="button" data-toggle="modal" data-target="#menu-left" aria-controls="main-left-nav" title="Menú">
            <span class="navbar-toggler-icon"></span>
            </button>


                <div class="navbar-brand">
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo get_template_directory_uri();?>/images/logo-food.png" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo" width="238" height="47">
                        </a>
                </div>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            <div class="navbar-text mx-3 mx-md-4 ml-auto ml-md-2"><a href="/our-favorites/" class="favorite-icon" alt="Our Favorites" title="Our Favorites"><i class="fas fa-star"></i></a></div>

            <div class="navbar-text mx-3 mx-md-4 ml-md-2 d-none d-sm-block"><a href="#search" class="search_icon" alt="Buscar" title="Buscar"><i class="fas fa-search"></i></a></div>

            </nav>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
                <?php endif; ?>

        <!-- /1026310/FoodAndPleasure/interstitial -->
        <div id='div-gpt-ad-1554934250385-0' class="ad-container">
        <script>
        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1554934250385-0'); });
        </script>
        </div>
<?php /*
      <div id="mosaic-container"  class="mosaic text-center mx-auto">
      <script type="application/javascript" src="https://www5.smartadserver.com/ac?out=js&nwid=1204&siteid=369103&pgname=home_1&fmtid=52334&tgt=[sas_target]&visit=m&tmstp=[timestamp]&clcturl=[countgo]"></script>
      </div> */?>
