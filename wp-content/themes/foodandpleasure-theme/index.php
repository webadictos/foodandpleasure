<?php

/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option('page_for_posts');
?>
<main class="site-main container-fluid" role="main">

	<div class="row seccion">
		<div class="col-md-12">
			<?php
			echo apply_filters('the_content', get_post_field('post_content', $page_id));

			edit_post_link(__('Edit', 'foodandpleasure-theme'), '<span class="edit-link">', '</span>', $page_id);
			?>
		</div><!-- /.col -->
		<div class="col-md-12">
			<?php
			get_template_part('archive', 'loop');
			?>
		</div><!-- /.col -->
	</div><!-- /.row -->
</main>
<?php
get_footer();
