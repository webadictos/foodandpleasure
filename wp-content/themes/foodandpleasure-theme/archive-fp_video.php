<?php

/**
 * The Template for displaying Archive pages.
 */

get_header();
?>
<main class="site-main video-archive container" role="main">
	<?php
	if (have_posts()) :
	?>

		<header class="video-archive__header">


			<h1 class="video-archive__title bordered-title">
				Videos
			</h1>
		</header>

		<section class="archive-articles-container video-archive__items" data-loadmore-layout="grid" data-loadmore-item-layout="archive-item">
			<div class="row"></div>
			<?php
			$_args = array(
				'items_layout_css' => 'archive-item',
				'items_config' => array(
					'items_show_tags' => false,
					'items_show_main_cat' => false,
					'items_show_badge_cat' => true,
					'items_show_date' => false,
					'items_show_author' => false,
					'items_show_excerpt' => false,
					'items_show_arrow' => false,
					'items_show_more_btn' => false,
				),
			);
			get_template_part('template-parts/video_fp/video_fp', 'loop', $_args);
			?>
		</section>


	<?php
	else :
		// 404.
		get_template_part('content', 'none');
	endif;

	wp_reset_postdata(); // End of the loop.
	?>
</main>
<?php
get_footer();
