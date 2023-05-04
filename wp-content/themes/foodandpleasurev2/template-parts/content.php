<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */


$esInfinito = (isset($_REQUEST['action']) &&  $_REQUEST['action']=="loadmorepost") ? true : false;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> <?php getPostDataAttributes();?>>

	<header class="entry-header d-flex flex-column">


	<?php 
						if (has_post_thumbnail()):
									//$thumbPinterest = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');	
									//$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
									if(!$esInfinito){
										$thumbSrc = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
										//$thumb = '<img  class="d-block w-100" width="100%" height="60vh" src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . wp_strip_all_tags(get_the_title()) . '">';
										$thumb ='<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lcp-src="'.$thumbSrc[0].'" data-lcp-loaded="false" alt="'.get_the_title().'" title="'.get_the_title().'" class="w-100" loading="lazy">';
									}else{
										$thumb = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
									}  



								//	$thumb = get_the_post_thumbnail(get_the_ID(),'full',array( 'title' => get_the_title(), 'alt'=> get_the_title(),'class'=>"w-100"));
									$featuredCaption = get_the_post_thumbnail_caption();
						else:
									//$thumb[0]=$GLOBALS['default_image'];
									$thumb ='<img src="'.$GLOBALS['default_image'].'" alt="'.get_the_title().'" title="'.get_the_title().'" class="w-100">';
						endif;
					?>

	<figure class="post-thumbnail m-0 position-relative"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo $thumb;?></a><?php echo (isset($featuredCaption)) ? "<span class='featured-caption'>".$featuredCaption."</span>":"";?></figure>


	<div class="tag-container text-center py-4">
		<?php 
		$tag_list = get_the_tag_list( '<ul  class="taglist"><li>', '</li><li>', '</li></ul>' );
 
		if ( $tag_list && ! is_wp_error( $tag_list ) ) {
			echo $tag_list;
		}
		?>
	</div>

		<div class="entry-info px-3 px-md-5 mx-auto text-center pb-3 pb-md-5">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wp_bootstrap_starter_posted_on(); ?>
		</div><!-- .entry-meta -->
		</div>
		<?php
		endif; ?>
<?php /*
		<div class="d-block d-md-none social-share-top">

		<ul class="social-sharebar d-flex flex-row justify-content-center align-items-center align-content-start">
		<li><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"  class="fb share-link" title="¡Compartir en Facebook!" rel="nofollow noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
		<li><a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&text= <?php echo get_the_title(); ?> " target="_blank" class="tw share-link" title="¡Compartir en Twitter!" rel="nofollow noopener noreferrer"><i class="fab fa-twitter"></i></a></li>
		<li><a href="https://api.whatsapp.com/send?text=<?php echo get_permalink(); ?>" data-action="share/whatsapp/share" target="_blank" class="whatsapp share-link" title="¡Compartir en WhatsApp!" rel="nofollow noopener noreferrer"><i class="fab fa-whatsapp"></i></a></li>
		<li><a href="mailto:?Subject=<?php echo urlencode(get_the_title()); ?>&amp;Body=<?php echo urlencode(get_permalink()); ?>" class="email" title="¡Compartir por correo!" rel="nofollow noopener noreferrer"><i class="fas fa-envelope"></i></a></li>
		</ul>


		</div>
*/ ?>
	</header><!-- .entry-header -->
	<div class="row">
		<div class="entry-content col-12 col-lg-8">

		<div class="ad-container"  id="videowall-<?php echo get_the_ID();?>"></div>

		<div class="row">
		<aside class="col-12 col-md-1 px-0 single-share-area sticky-top sticky-header">

		<ul class="social-sharebar sticky-top sticky-header sticky-social-mobile d-flex flex-row justify-content-center align-items-center align-content-start flex-md-column single-share">
		<li><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank"  class="fb share-link" title="¡Compartir en Facebook!" rel="nofollow noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
		<li><a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&text= <?php echo get_the_title(); ?> " target="_blank" class="tw share-link" title="¡Compartir en Twitter!" rel="nofollow noopener noreferrer"><i class="fab fa-twitter"></i></a></li>
		<li><a href="https://api.whatsapp.com/send?text=<?php echo get_permalink(); ?>" data-action="share/whatsapp/share" target="_blank" class="whatsapp share-link" title="¡Compartir en WhatsApp!" rel="nofollow noopener noreferrer"><i class="fab fa-whatsapp"></i></a></li>
		<li><a href="mailto:?Subject=<?php echo urlencode(get_the_title()); ?>&amp;Body=<?php echo urlencode(get_permalink()); ?>" class="email" title="¡Compartir por correo!" rel="nofollow noopener noreferrer"><i class="fas fa-envelope"></i></a></li>
		</ul>



		</aside>
		<div class="col-12 col-md-11 entry-txt">
		<div class="desc mb-4">
			<?php echo get_the_excerpt();?>
		</div>

		<?php
        if ( is_single() ) :
			the_content();
        else :
            the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-bootstrap-starter' ) );
        endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
				'after'  => '</div>',
			) );
		?>
		</div>
		</div>
		</div><!-- .entry-content -->
		<aside class="col-12 col-lg-4 d-none d-lg-block">
		<?php	get_sidebar(); ?>
		</aside>
	</div>



</article><!-- #post-## -->
