<?php get_header(); ?>
<?php if (have_posts()) : ?>
<div class="home_page_part_one_bg ">
  <div class="custom_container home_page_part_one">
    <div class="home_page_part_one_left">
      <div class="archieve_top_cat">
        <?php $categories = get_queried_object();

          $category_id = $categories->term_id;

          $child = get_category($category_id);
          $parent = $child->parent;

          $parent_name = get_category($parent);

          $parent_cat = $parent_name->cat_ID;
          if ($parent_cat) { ?>
        <div class="cat-header py-2">
          <h2><a
              href="<?php echo get_category_link($parent_cat); ?>"><?php echo get_the_category_by_id($parent_cat); ?></a>
          </h2>
        </div>
        <?php $subcategories = get_categories('&child_of=' . $parent_cat . '&hide_empty');
            echo '<div class="subcategories d-flex align-items-center">';
            foreach ($subcategories as $subcategory) {
              echo '<div class="identifier"></div>', sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
            }
            echo '</div>';
          } else { ?>
        <div class="cat-header py-2">
          <h2><a
              href="<?php echo get_category_link($category_id); ?>"><?php echo get_the_category_by_id($category_id); ?></a>
          </h2>
        </div>
        <?php $subcategories = get_categories('&child_of=' . $category_id . '&hide_empty');
            if ($subcategories) {
              echo '<div class="subcategories d-flex align-items-center">';
              foreach ($subcategories as $subcategory) {
                echo sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
              }
              echo '</div>';
            } else {
              echo '<div class="subcategories d-flex align-items-center">';
              wp_list_categories(array(
                'parent' => 0,
                'hide_empty' => 0,
                'number' => 10,
                'title_li' => __(''),
                'exclude'    => '1',
              ));
              echo '</div>';
            }
          } ?>

      </div>
      <div class="archive_page_post leatest_posts sunset-posts-container">
        <?php while (have_posts()) : ?>
        <?php the_post();
        get_template_part( 'template-parts/post/content-post');
        endwhile; ?>
      </div>
      <div class="d-flex">
        <?php $cat_id = get_query_var('cat'); ?>
        <?php
          global $wp_query;
          if (  $wp_query->max_num_pages > 1 )
            echo '<div class="btn misha_loadmore sunset-load-more" id="load_more_button">Load More</div>';
            echo' <div class="loader w-100">
            <div class="d-flex justify-content-center w-100 p-3">
            <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            </div>
            </div>
            </div>';
          ?>
      </div>
    </div>
    <div class="home_page_part_one_right">
      <div class="custom_container home_page_ad">
        <?php echo $redux_demo['home_page_3rd_ad']; ?>
      </div>
      <div class="custom_container home_page_ad">
        <?php echo $redux_demo['home_page_4th_ad']; ?>
      </div>
      <div class="most_read_in_a_cat">
        <div class="category-header d-flex justify-content-between align-items-center mt-2">
          <div class="heading photo-heading">
            <span class="title"><?php echo $redux_demo['most_read']; ?> - <?php echo get_the_category_by_id($cat_id); ?>
            </span>
          </div>
        </div>
        <ul class="archive_leatest_in_a_cat_postlopp">
          <?php $popular = new WP_Query(array('cat' => $cat_id, 'posts_per_page' => 5, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
            while ($popular->have_posts()) : $popular->the_post(); ?>
          <ul class="single_right_item">
            <a href="<?php the_permalink(); ?>">
              <thumb> <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('custom-size');
                          } else { ?>
                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                  alt="<?php the_title(); ?>" />
                <?php } ?>
            </a>
            <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          </ul>
          <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php else :
  echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>