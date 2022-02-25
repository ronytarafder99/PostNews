<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <div class="home_page_part_one_bg">
        <div class="custom_container home_page_part_one">
            <div class="home_page_part_one_left home_page_part_one_left_left_flex">
                <div class="home_page_part_one_left_left single_left_left">
                    <div class="custom_container home_page_ad">
                        <?php echo $redux_demo['home_page_2nd_ad']; ?>
                    </div>
                    <div class="category-header d-flex justify-content-between align-items-center mt-2">
                        <div class="heading photo-heading">
                            <span class="title"><?php echo $redux_demo['latest_all_only']; ?></span>
                        </div>
                    </div>
                    <ul class="leatest_in_a_cat_postlopp">
                        <?php $args = array(
                            'posts_per_page' => 15,
                            'order' => 'DESC',
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <ul class="single_right_item">
                                    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                </ul>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                </div>
                <?php while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="home_page_part_one_left_right singe_left_right" id="printTable">
                        <div class="single_meta_box white_bg">
                            <div class="breadcrumb" style="background-color: transparent; margin: 0 !important; padding: 0 !important;">
                                <?php get_breadcrumb(); ?>
                            </div>
                            <h1 class="single_title"><?php the_title(); ?></h1>
                            <div class="author_social">
                                <div class="author_box">
                                    <div class="media">
                                        <div style="margin: 0px 10px;" class="media-left hidden-print" id="author_thumb">
                                            <?php
                                            $user = wp_get_current_user();

                                            if ($user) :
                                            ?>
                                                <img alt="প্রতিবেদক" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" class="media-object" style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                                            <?php endif; ?>
                                        </div>
                                        <div class="media-body">
                                            <span class="small text-muted time-with-author">
                                                <a class="hidden-print" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" style="display:inline-block;"><?php echo get_the_author(); ?></a>
                                                <br>
                                                <?php the_time('F j, Y g:i a'); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="demo-gallery">
                            <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                            <ul id="lightgallery" class="single_post_thumbnail">
                                <li data-responsive="<?php echo esc_url($featured_img_url); ?>" data-src="<?php echo esc_url($featured_img_url); ?>" data-sub-html="<h4><?php the_title(); ?></h4><p><?php echo custom_length_excerpt(20); ?></p>">
                                    <a href="">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <script type="text/javascript">
                            jQuery(document).ready(function() {
                                jQuery('#lightgallery').lightGallery();
                            });
                        </script>
                        <div class="d-flex justify-content-between mt-3 mb-2 align-items-center">
                            <div class="social_share d-flex"><?php wcr_share_buttons(); ?><i style="margin-right: 5px;" class="fa fa-clone" aria-hidden="true"></i><i class="fa fa-print"></i></div>
                            <div class="print_font">
                                <span><a href="javascript:void(0);" id="fontPlus">ফ+</a></span>
                                <span><a href=" javascript:void(0);" id="fontmines">ফ-</a></span>
                                <span><a href=" javascript:void(0);" id="fontdefult">ফ</a></span>
                            </div>
                        </div>
                        <div id="toast">
                            <div id="desc">Link Copied!</div>
                        </div>
                        <div class="single_post_content">
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="home_page_part_one_right">

                <?php $categories = get_the_category();
                $category_id = $categories[0]->cat_ID;
                $child = get_category($category_id);
                $parent = $child->parent;
                if ($parent) {
                    $cat_id = $parent;
                } else {
                    $cat_id = $category_id;
                } ?>

                <div class="custom_container home_page_ad">
                    <?php echo $redux_demo['home_page_3rd_ad']; ?>
                </div>

                <div class="most_read_in_a_cat">

                    <div class="category-header d-flex justify-content-between align-items-center mt-2">
                        <div class="heading photo-heading">
                            <span class="title"><?php echo get_the_category_by_id($cat_id); ?> <?php echo $redux_demo['latest_only']; ?></span>
                        </div>
                    </div>
                    <ul class="archive_leatest_in_a_cat_postlopp">
                        <?php $args = array(
                            'posts_per_page' => 5,
                            'order' => 'DESC',
                            'cat' => $cat_id,
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <ul class="single_right_item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size');
                                        } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                    </a>
                                    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                </ul>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                </div>
                <div class="most_read_in_a_cat">
                    <div class="category-header d-flex justify-content-between align-items-center mt-2">
                        <div class="heading photo-heading">
                            <span class="title"><?php echo $redux_demo['most_read_in_weak']; ?></span>
                        </div>
                    </div>
                    <ul class="archive_leatest_in_a_cat_postlopp">
                        <?php $popular = new WP_Query(array('cat' => $cat_id, 'posts_per_page' => 5, 'meta_key' => 'popular_posts', 'orderby' => 'meta_value_num', 'order' => 'DESC'));
                        while ($popular->have_posts()) : $popular->the_post(); ?>
                            <ul class="single_right_item">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) {
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