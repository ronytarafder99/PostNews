<?php

/*
	
@package Jagotheme_by_rony-ajax
	
	========================
		AJAX FUNCTIONS
	========================
*/

add_action('wp_ajax_nopriv_sunset_load_more', 'sunset_load_more');
add_action('wp_ajax_sunset_load_more', 'sunset_load_more');

function sunset_load_more()
{

	$paged = $_POST["page"] + 1;
	$cat_id  = $_POST['cat'];
	$query = new WP_Query(array(
		'cat'      => $cat_id,
		'post_type' => 'post',
		'paged' => $paged,
		'posts_per_page' => 4,

	));

	if ($query->have_posts()) :

		while ($query->have_posts()) : $query->the_post(); ?>

			<div class="leatest_twelve_post">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php if (has_post_thumbnail()) {
						the_post_thumbnail('custom-size');
					} else { ?>
						<img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
					<?php } ?></a>
				<h2 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>

		<?php endwhile;

	endif;

	wp_reset_postdata();

	die();
}
