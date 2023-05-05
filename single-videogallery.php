<?php get_header(); ?>
<div class="home_page_part_one_bg" id="contentsWrapper">
    <div class="custom_container home_page_part_one content">
        <div class="home_page_part_one_left">
            <div style="border-bottom:none;" class="cat-header py-2">
                <h1 style="line-height:0;margin-top:10px;">
                    <a href="<?php echo get_post_type_archive_link('videogallery'); ?>">ভিডিও</a>
                </h1>
            </div>
            <div class="pt-0 subcategories d-flex align-items-center"></div>
            <div class="row">
                <div class="col-12">
                    <div class="video-wrapper">
                        <div class="video-title">
                            <h1 class="single_title"><?php the_title(); ?></h1>
                        </div>
                        <div class="video-content">
                            <?php $url = get_post_meta($post->ID,  'post_reading_time', true);
                            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars ); ?>
                            <iframe src="https://www.youtube.com/embed/<?php echo $my_array_of_vars['v']; ?>"
                                title="YouTube video player" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_page_part_one_right" style="margin-top:35px;">
            <div class="most_read_in_a_cat">
                <div class="category-header d-flex justify-content-between align-items-center mt-2">
                    <div class="heading photo-heading">
                        <span class="title">ভিডিও গ্যালারি থেকে আরো দেখুন</span>
                    </div>
                </div>
                <ul class="archive_leatest_in_a_cat_postlopp">
                    <?php $args1 = array(
                        'post_type' => 'videogallery',
                        'posts_per_page' => 5,
                        'order' => 'DESC',
                    );
                    $lastpost = new WP_Query($args1);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                    <ul class="single_right_item">
                        <a href="<?php the_permalink(); ?>">
                            <thumb> <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                                    alt="<?php the_title(); ?>" />
                                <?php } ?></thumb>
                        </a>
                        <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    </ul>
                    <?php endwhile;
                    endif ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>