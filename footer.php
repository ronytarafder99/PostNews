<?php global $redux_demo; ?>
<footer>
    <div class="footer_part_one_bg">
        <div class="custom_container">
            <div class="footer_flex_item">
                <div class="footer_logo">
                    <a id="footer_logo_img" href="<?php bloginfo('home'); ?>"> <img width="<?php echo $redux_demo['footer_logo_width']; ?>" height="<?php echo $redux_demo['footer_logo_height']; ?>" src="<?php echo $redux_demo['footer_logo']['url']; ?>" alt="<?php echo $redux_demo['footer_logo_alt']; ?>"></a>
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
                <div class="footer_our_text"><?php echo $redux_demo['info']; ?></div>
            </div>
            <div class="footer_part_two">
                <?php if ($redux_demo['opt-switch-dmca'] == 1) { ?>
                    <img style="margin: 0 auto 10px auto;" width="<?php echo $redux_demo['footer_dmca_width']; ?>" height="<?php echo $redux_demo['footer_dmca_height']; ?>" src="<?php echo $redux_demo['dmca']['url']; ?>" alt="<?php echo $redux_demo['footer_dmca_alt']; ?>">
                <?php } ?>
                <div class="social_part footer_social">
                    <ul class="social">
                        <li><a target="_blank" href="<?php echo $redux_demo['facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['Youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
                <div class="footer_our_text">
                    <?php echo $redux_demo['company_info']; ?>
                </div>
                <div class="footer_menu">
                    <?php
                    $footer_menu = 'footer_menu';
                    if (has_nav_menu($footer_menu)) {
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'container' => 'div',
                            'container_class' => 'left_side',
                            'menu_class' => 'footer_nav_ul',
                            'depth' => '3',
                        ));
                    } ?>
                </div>
            </div>
            <div class="footer_part_three">
                <div class="footer_our_text">
                    <?php echo $redux_demo['Contact_info']; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if ($redux_demo['opt-switch'] == 1) { ?>
        <div class="marquee_container_bg">
            <div class="marquee_container">
                <div class="marquee_name"><?php echo $redux_demo['marguee_name']; ?></div>
                <marquee class="marquee_title_sizeing" behavior="scroll" direction="left" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();">
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