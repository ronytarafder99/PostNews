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
              <h2><a href="<?php echo get_category_link($parent_cat); ?>"><?php echo get_the_category_by_id($parent_cat); ?></a></h2>
            </div>
            <?php $subcategories = get_categories('&child_of=' . $parent_cat . '&hide_empty');
            echo '<div class="subcategories d-flex align-items-center">';
            foreach ($subcategories as $subcategory) {
              echo '<div class="identifier"></div>', sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
            }
            echo '</div>';
          } else { ?>
            <div class="cat-header py-2">
              <h2><a href="<?php echo get_category_link($category_id); ?>"><?php echo get_the_category_by_id($category_id); ?></a></h2>
            </div>
          <?php $subcategories = get_categories('&child_of=' . $category_id . '&hide_empty');
            if ($subcategories) {
              echo '<div class="subcategories d-flex align-items-center">';
              foreach ($subcategories as $subcategory) {
                echo '<div class="identifier"></div>', sprintf('<li><a href="%s">%s</a></li>', get_category_link($subcategory->term_id), apply_filters('get_term', $subcategory->name));
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
            <?php the_post(); ?>



            <div class="leatest_twelve_post">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('custom-size');
                } else { ?>
                  <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                <?php } ?></a>
              <h2 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>



          <?php endwhile; ?>
        </div>
        <div class="d-flex">
          <?php $cat_id = get_query_var('cat'); ?>
          <button class="sunset-load-more" id="load_more_button" data-category="<?php echo esc_attr($cat_id); ?>" data-page="1" data-archive="<?php echo $_SERVER["REQUEST_URI"]; ?>" data-url="<?php echo admin_url('admin-ajax.php'); ?>"><img alt="Loader" src="<?php echo get_template_directory_uri(); ?>/img/ajax-loader.gif" class="animation_image" style="margin-right: 5px; width: 21px; display: none;"> <span class="text">আরও পড়ুন</span></button>
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
              <span class="title"><?php echo $redux_demo['most_read']; ?> - <?php echo get_the_category_by_id($cat_id); ?> </span>
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
                      <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
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