<?php global $redux_demo; ?>
<footer>
    <div class="footer_part_one_bg">
        <div class="custom_container">
            <div class="footer_flex_item">
                <div class="footer_logo">
                    <a id="footer_logo_img" href="<?php bloginfo('home'); ?>"> <img
                            width="<?php echo $redux_demo['footer_logo_width']; ?>"
                            height="<?php echo $redux_demo['footer_logo_height']; ?>"
                            src="<?php echo $redux_demo['footer_logo']['url']; ?>"
                            alt="<?php echo $redux_demo['footer_logo_alt']; ?>"></a>
                </div>
                <div class="footer_apps_links">
                    <div class="publiser">
                        <?php echo $redux_demo['publiser']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_three_col">
        <div class="custom_container">
            <div class="footer_part_one">
                <div class="footer_menu">
                    <?php
                    $footer_menu = 'footer_menu';
                    if (has_nav_menu($footer_menu)) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'container' => 'div',
                            'container_class' => 'left_side',
                            'menu_class' => 'footer_nav_ul',
                            'depth' => '1',
                        ));
                    } ?>
                </div>
            </div>

            <div class="footer_part_two">
                <p class="footer_our_text">
                    <?php echo $redux_demo['Contact_info']; ?>
                </p>
                <p>
                    <a href="tel:<?php echo $redux_demo['phone_num']; ?>" aria-label="Telephone" class="text-white" target="_blank"
                        rel="nofollow noopener">
                       <i class="fa fa-phone"></i>&nbsp;<?php echo $redux_demo['phone_num']; ?><br>
                    </a>
                </p>
                <p>
                    <a href="tel:<?php echo $redux_demo['mobile_num']; ?>" aria-label="Telephone" class="text-white" target="_blank"
                        rel="nofollow noopener">
                        <i class="fas fa-mobile-alt"></i>&nbsp;<?php echo $redux_demo['mobile_num']; ?><br>
                    </a>
                </p>
                <p>
                    <a href="tel:<?php echo $redux_demo['whatsapp_num']; ?>" aria-label="Telephone" class="text-white" target="_blank"
                        rel="nofollow noopener">
                        <i class="fab fa-whatsapp"></i>&nbsp;<?php echo $redux_demo['whatsapp_num']; ?><br>
                    </a>
                </p>
                <p>
                    <a href="mailto:<?php echo $redux_demo['mail_address']; ?>" aria-label="Email" class="text-white" target="_blank"
                        rel="nofollow noopener">
                        <i class="far fa-envelope"></i>&nbsp;<?php echo $redux_demo['mail_address']; ?><br>
                    </a>
                </p>
            </div>
        </div>
    </div>

    <?php if ($redux_demo['opt-switch'] == 1) { ?>
    <div class="marquee_container_bg">
        <div class="marquee_container">
            <div class="marquee_name"><?php echo $redux_demo['marguee_name']; ?></div>
            <marquee class="marquee_title_sizeing" behavior="scroll" direction="left" scrollamount="3"
                onmouseover="this.stop();" onmouseout="this.start();">
                <?php $foodpost = new WP_Query(array('posts_per_page' => 7, 'order' => 'DESC',)); ?>
                <?php if ($foodpost->have_posts()) : while ($foodpost->have_posts()) : $foodpost->the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php endwhile;
                    else : ?>
                <?php endif; ?>
            </marquee>
        </div>
    </div>
    <?php } ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>