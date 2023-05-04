<?php
/**
 * Template part for Article Item
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */
add_filter('term_links-post_tag','limit_to_tags');

?>

<?php

    
        $category = get_post_primary_category(get_the_ID());
        $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
        $catname = get_cat_name($parent_cat->term_id);  
?>

<article class="card article-item article-item-horizontal flex-row p-3">

<header class="card-body text-left align-self-center">

	<div class="px-2">
        <div class="article-tag"><?php the_tags( '', ', ', '' ); ?></div>

		 <h2 class="article-title my-2"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title();?></a></h2>
		<div class="article-author">Por: <?php the_author_posts_link(); ?></div>
	</div>

</header>
<footer class="align-self-center"><a href="<?php the_permalink() ?>" title="Ver <?php echo get_the_title() ?>"  class="arrow-link" rel="nofollow"></a></footer>
</article>
<?php     remove_filter('term_links-post_tag','limit_to_tags'); ?>
