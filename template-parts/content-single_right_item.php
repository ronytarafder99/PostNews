<ul class="single_right_item">
    <a class="home_second_part_grid" href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('custom-size');
        } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
        <?php } ?>
        <li class="tab_post"><?php the_title(); ?></li>
    </a>
</ul>






