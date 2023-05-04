<?php
/**
 * Template part for Article Item
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php
    if (has_post_thumbnail()):
        //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $thumb = get_the_post_thumbnail(get_the_ID(),'large',array( 'title' => wp_strip_all_tags(get_the_title()), 'alt'=> wp_strip_all_tags(get_the_title()),'class'=>'card-img-top'));
        else:
        //$thumb[0]=$GLOBALS['default_image'];
        $thumb ='<img  class="d-block w-100" width="100%" height="60vh" src="'.$GLOBALS['default_image'].'" alt="'.get_the_title().'" title="'.wp_strip_all_tags(get_the_title()).'">';
        endif;  
    
    
        $category = get_post_primary_category(get_the_ID());
        $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
        $catname = get_cat_name($parent_cat->term_id);  
?>

<article class="card article-item">

<a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo $thumb;?></a>
<header class="card-body text-center pb-3 pb-md-5">

	 <a class="mt-auto article-cat align-self-center" href="<?php  echo get_category_link( $parent_cat->term_id );?>"><?php echo $catname;?></a>

	<div class="pb-4 px-md-5 pb-md-0">
		 <h2 class="article-title"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title();?></a></h2>
		<div class="article-author">Por: <?php the_author_posts_link(); ?></div>
	</div>

</header>
</article>