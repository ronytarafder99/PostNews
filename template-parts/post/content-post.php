<div class="leatest_twelve_post">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if (has_post_thumbnail()) {
                  the_post_thumbnail('custom-size');
                } else { ?>
        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
        <?php } ?></a>
    <h2 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
</div>