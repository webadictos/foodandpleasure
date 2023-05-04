<?php

/**
 * The Template used to display Tag Archive pages.
 */

get_header();
?>
<main class="site-main section-archive" role="main">
	<div class="container">
		<?php

		if (have_posts()) :
		?>

			<section class="section p-0">

				<header class="section__title-container page-header">


					<h1 class="section__title page-title">
						<?php printf(esc_html__('Tag: %s', 'foodandpleasure-theme'), single_tag_title('', false)); ?>
					</h1>
					<?php
					$tag_description = tag_description();
					if (!empty($tag_description)) :
						echo apply_filters('tag_archive_meta', '<div class="category-archive-meta">' . $tag_description . '</div>');
					endif;
					?>
				</header>

			</section>
			<section class="section p-0">
				<div class="archive-articles-container" data-loadmore-layout="grid" data-loadmore-item-layout="article-item">
					<div class="row"></div>
					<?php
					$_args = array(
						'items_layout_css' => 'article-item archive-item',
						'items_config' => array(
							'items_show_tags' => false,
							'items_show_main_cat' => false,
							'items_show_badge_cat' => false,
							'items_show_date' => true,
							'items_show_author' => false,
							'items_show_excerpt' => false,
							'items_show_arrow' => false,
							'items_show_more_btn' => false,
						),
					);
					get_template_part('template-parts/archive', 'loop', $_args);
					?>
				</div>
			</section>


		<?php
			get_template_part('archive', 'loop');
		else :
			// 404.
			get_template_part('content', 'none');
		endif;

		wp_reset_postdata(); // End of the loop.
		?>
	</div>
</main>
<?php
get_footer();
