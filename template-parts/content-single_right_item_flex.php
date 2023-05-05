<ul class="single_right_item flex_column">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('custom-size');
        } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
        <?php } ?>
    </a>
    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
</ul>