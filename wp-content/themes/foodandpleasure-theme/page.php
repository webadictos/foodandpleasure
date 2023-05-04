<?php

/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();

// the_post();
?>
<main class="site-main container-fluid" role="main">

	<?php
	$thumb = "";
	if (has_post_thumbnail()) :

		$thumb = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));

	endif;
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('content section'); ?>>
		<header class="entry-header">

			<?php
			if ($thumb !== "") :
			?>
				<figure class="post-thumbnail m-0"><?php echo $thumb; ?></figure>
			<?php
			endif;
			?>

			<?php
			// $category = get_post_primary_category(get_the_ID());
			// $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id, true);
			// $catname = get_cat_name($parent_cat->term_id);

			/*
        */
			?>
			<div class="entry-info text-center">
				<h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			</div>

		</header><!-- /.entry-header -->
		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'foodandpleasure-theme') . '">',
					'after'    => '</nav>',
					'pagelink' => esc_html__('Page %', 'foodandpleasure-theme'),
				)
			);
			edit_post_link(
				esc_attr__('Edit', 'foodandpleasure-theme'),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</div>
	</article><!-- /#post-<?php the_ID(); ?> -->


</main>
<?php
get_footer();
