<?php get_header(); ?>
<?php if (have_posts()) : ?>
<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <div class="singe_left_right">
                <div class="single_meta_box white_bg">
                <div class="print_logo">
                        <img width="<?php echo $redux_demo['width']; ?>" height="<?php echo $redux_demo['height']; ?>"
                            src="<?php echo $redux_demo['logo']['url']; ?>" alt="<?php echo $redux_demo['alt']; ?>">
                    </div>
                    <div class="breadcrumb"
                        style="background-color: transparent; margin: 0 !important; padding: 0 !important;">
                        <?php get_breadcrumb(); ?>
                    </div>
                    <h1 class="single_title"><?php the_title(); ?></h1>
                    <div class="author_social">
                        <div class="author_box">
                            <div class="media">
                                <div style="margin-right: 10px;" class="media-left hidden-print" id="author_thumb">
                                    <?php
                                            $user = wp_get_current_user();

                                            if ($user) :
                                            ?>
                                    <img alt="প্রতিবেদক" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>"
                                        class="media-object"
                                        style="margin-top:5px;width:40px;height:40px;border-radius:100%;display:inline-block;">
                                    <?php endif; ?>
                                </div>
                                <div class="media-body">
                                    <span class="small text-muted time-with-author">
                                        <a class="hidden-print"
                                            href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"
                                            style="display:inline-block;"><?php echo get_the_author(); ?></a>
                                        <br>
                                        <?php echo bn1_date(get_the_date( 'j F Y, g:i a')); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-2 align-items-center" id="social_font">
                    <div class="social_share d-flex"><?php wcr_share_buttons(); ?><i style="margin-right: 5px;"
                            class="fa fa-clone" aria-hidden="true"></i><i class="fa fa-print"></i></div>
                    <div class="print_font">
                        <span><a href="javascript:void(0);" id="fontPlus">ফ+</a></span>
                        <span><a href=" javascript:void(0);" id="fontmines">ফ-</a></span>
                        <span><a href=" javascript:void(0);" id="fontdefult">ফ</a></span>
                    </div>
                </div>
                <hr class="fix-padding-0">
                <div class="demo-gallery">
                    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
                    <ul id="lightgallery" class="single_post_thumbnail">
                        <li data-responsive="<?php echo esc_url($featured_img_url); ?>"
                            data-src="<?php echo esc_url($featured_img_url); ?>"
                            data-sub-html="<h4><?php the_title(); ?></h4><p><?php echo custom_length_excerpt(20); ?></p>">
                            <a href="">
                                <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                    alt="<?php the_title(); ?>" />
                                <?php } ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    jQuery(document).ready(function () {
                        jQuery('#lightgallery').lightGallery();
                    });
                </script>
                <div id="toast">
                    <div id="desc">Link Copied!</div>
                </div>
                <div class="news-details">
                    <?php
                $get_description = get_post(get_post_thumbnail_id())->post_excerpt;

                if (!empty($get_description)) {
                    echo '<p class="single_img_caps">' . $get_description . '</p>';
                } ?>
                    <p><?php the_content(); ?></p>
                </div>
            </div>
            <?php $posttags = get_the_tags();
                if ($posttags) {
                echo '<div class="tags d-flex align-items-center flex-wrap d-print-none">';
                foreach($posttags as $tag) { ?>
            <div class="view-more-round" style="margin: 5px;"><i class="fa fa-tags" aria-hidden="true"></i><a
                    style="color: #000;padding-left: 7px;"
                    href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a>
            </div>

            <?php }
                echo '</div>';
            } ?>


            <?php endwhile; ?>
            <div class="category-header d-flex justify-content-between align-items-center mt-2">
                <div class="heading photo-heading">
                    <span class="title">আরও পড়ুন</span>
                </div>
            </div>
            <div class="leatest_posts" style="padding-top:0.5rem">
                <?php
                $args = array('posts_per_page' => 12, 'offset' => 6, 'order' => 'DESC',);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                get_template_part( 'template-parts/post/content-post');
                endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <div class="single_sticky">

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

                <div class="most_read_in_a_cat">

                    <div class="category-header d-flex justify-content-between align-items-center mt-2">
                        <div class="heading photo-heading">
                            <span class="title"><?php echo get_the_category_by_id($cat_id); ?>
                                <?php echo $redux_demo['latest_only']; ?></span>
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
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                    alt="<?php the_title(); ?>" />
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

            </div>
        </div>
    </div>
</div>
<?php else :
    echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>