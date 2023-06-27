<?php

/**
 * The Template for displaying Category Archive pages.
 */

get_header();

$ig_category = wa_theme()->module('social')->config('instagram_category') ?? '';
?>
<main class="site-main category-archive container" role="main">

	<?php
	if (have_posts()) :
	?>

		<header class="category-archive__header">


			<h1 class="category-archive__title bordered-title">
				Instagram Pick's
			</h1>
			<?php
			$category_description = category_description();
			if (!empty($category_description)) :
				echo apply_filters('category_archive_meta', '<div class="category-archive__meta">' . $category_description . '</div>');
			endif;
			?>
		</header>

		<div class="instagram-search">
			<form id="instagram-search__form" class="instagram-search__form" action="/" accept-charset="utf-8">
				<input id="search" name="s" value="" class="instagram-search__form--input form-control" type="search" data-swplive="true" dir="ltr" spellcheck="false" autocorrect="off" autocomplete="off" autocapitalize="off" maxlength="2048" tabindex="0" placeholder="<?php echo __('Buscar Instagram Pick\'s:', 'wa-theme'); ?>" aria-label="<?php echo __('Buscar Instagram Pick\'s:', 'wa-theme'); ?>" aria-describedby="search-form-icon">
				<input type="hidden" name="category_name" value="<?php echo $ig_category; ?>" />

			</form>
		</div>


		<section class="archive-articles-container category-map__items mb-5" data-loadmore-layout="grid" data-loadmore-item-layout="article-item-tres">
			<div class="row"></div>
			<?php
			$_args = array(
				'items_layout_css' => 'article-item-tres',
				'sidebar' => false,
				'change_item_layout' => false,
				'grid_layout' => 'grid-container-items px-4 px-lg-5',
				'items_config' => array(
					'items_show_tags' => false,
					'items_show_main_cat' => false,
					'items_show_badge_cat' => true,
					'items_show_date' => false,
					'items_show_author' => true,
					'items_show_excerpt' => false,
					'items_show_arrow' => true,
					'items_show_more_btn' => false,
				),
			);
			get_template_part('template-parts/category/category', 'loop', $_args);
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
