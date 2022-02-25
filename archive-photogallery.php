<?php get_header(); ?>
<div class="custom_container">
    <div class="category-list d-flex mt-4">
        <?php
        $subcategories1 = get_terms(array(
            'taxonomy' => 'photogallery-categories',
            'hide_empty' => false,
        ));

        $arrayLength1 = count($subcategories1);
        $i = 0;
        while ($i < $arrayLength1) { ?>
            <li class="btn btn-info rounded-sm rounded-pill btn-md mr-2 mb-2 psubcat"><?php echo sprintf('<a href="%s">%s</a>', get_category_link($subcategories1[$i]->term_id), apply_filters('get_term', $subcategories1[$i]->name)); ?></li>
        <?php $i++;
        } ?>
    </div>
    <?php
    $subcategories = get_terms(array(
        'taxonomy' => 'photogallery-categories',
        'hide_empty' => false,
    ));

    $arrayLength = count($subcategories);
    $i = 0;
    while ($i < $arrayLength) { ?>

        <div class="photo_subcat">
            <?php $lastpost = new WP_Query(array(
                'post_type' => 'photogallery',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'photogallery-categories',
                        'field' => 'term_id',
                        'terms' => $subcategories[$i]->term_id,
                    )
                ), 'posts_per_page' => 10,
            ));
            if ($lastpost->have_posts()) :
            ?>

                <h2 class="catTitle" style="margin:10px 0">
                    <span class="pvtitle"></span> <?php echo sprintf('<a href="%s">%s</a>', get_category_link($subcategories[$i]->term_id), apply_filters('get_term', $subcategories[$i]->name)); ?>
                </h2>
                <div class="archive_web-stories web-stories py-2">
                    <?php while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
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
                    <?php endwhile; ?>
                </div>
            <?php endif;
            ?>
        </div>
    <?php $i++;
    } ?>

</div>
<?php get_footer(); ?>