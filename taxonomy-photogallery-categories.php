<?php get_header(); ?>
<div class="custom_container">
    <h2 class="catTitle" style="margin:10px 0">
        <span class="pvtitle"></span> <?php single_cat_title(); ?>
    </h2>
    <div class="archive_web-stories web-stories py-">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <a class="story-item" href="<?php the_permalink(); ?>" target="_blank">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('custom-size');
                    } else { ?>
                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                    <?php } ?>
                    <div class="story-extra">
                        <?php
                        $terms = get_the_terms($post->ID, 'photogallery-categories');
                        foreach ($terms as $term) {
                            $texname = $term->name;
                            $texnid = $term->term_id;
                        }
                        ?>
                        <p class="story-category"><?php echo $texname; ?></p>
                        <h2><?php echo wp_trim_words(get_the_title(), 10); ?></h2>
                        <div class="story-page-indicator"><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span></div>
                    </div>
                </a>
        <?php endwhile;
        endif ?>
    </div>
    <div class="pagination1">
        <div class="pagi_inner">
            <?php echo paginate_links(array(
                'prev_text' => __('&laquo;', 'textdomain'),
                'next_text' => __('&raquo;', 'textdomain'),

            )); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>