<?php get_header(); ?>
<?php if (have_posts()) : ?>
<div class="home_page_part_one_bg ">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <div class="archieve_top_cat">

                <div class="cat-header py-2" style="border:none;">
                    <h1 style="line-height:0;margin-top:10px;font-size: 24px;"><a
                            href="<?php echo get_post_type_archive_link('videogallery'); ?>">ভিডিও গ্যালারি</a></h1>
                </div>
                <div class="pt-0 subcategories d-flex align-items-center"> </div>
            </div>

            <div class="archive_page_post leatest_posts sunset-posts-container">
                <?php while (have_posts()) : ?>
                <?php the_post(); ?>

                <div class="leatest_twelve_post">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail();
                                        } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif"
                            alt="<?php the_title(); ?>" />
                        <?php } ?></a>
                    <h2 style="font-size:calc(1em + .4vw);" class="title"> <a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>

                <?php endwhile; ?>

            </div>

        </div>
        <div class="home_page_part_one_right" style="margin-top:38px;">
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

<?php else :
  echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
endif; ?>
<?php get_footer(); ?>