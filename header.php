<?php global $redux_demo; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header>
        <?php $home_page_top_ad1 = $redux_demo['home_page_top_ad1'];
        if($home_page_top_ad1){
            echo '<div class="custom_container home_page_ad header_top_ad">'.$home_page_top_ad1.'</div>';
        }; ?>

        <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-2x fa-angle-up"></i></button>
        <div class="top_header_bg">
            <div class="custom_container top_header_container">
                <div class="logo_part">
                    <a href="<?php bloginfo('home'); ?>"><img width="<?php echo $redux_demo['width']; ?>"
                            height="<?php echo $redux_demo['height']; ?>"
                            src="<?php echo $redux_demo['logo']['url']; ?>" alt="<?php echo $redux_demo['alt']; ?>"></a>
                </div>
                <div class="time_part">
                    <i class="fas fa-map-marker-alt"></i>
                    <small class="time_date">ঢাকা<i style="margin: 0px 10px;"
                            class="far fa-calendar"></i><?php echo bn1_date(date('l , j F Y')); ?></small>
                </div>
                <div class="social_part">
                    <ul class="social">
                        <li><a target="_blank" href="<?php echo $redux_demo['facebook']; ?>"><i
                                    class="fab fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['Youtube']; ?>"><i
                                    class="fab fa-youtube"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['twitter']; ?>"><i
                                    class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['instagram']; ?>"><i
                                    class="fab fa-instagram"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['linkedin']; ?>"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                        <li><a target="_blank" href="<?php echo $redux_demo['podcast']; ?>"><i
                                    class="fa fa-podcast"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom_header_bg bottom_parent">
            <div class="custom_container bottom_header_container">
                <div class="home_icon">
                    <span id="bars">
                        <li id="animated_hamn" onclick="myFunction(this)">
                            <div>
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                        </li>
                    </span>
                    <a id="home" href="<?php bloginfo('home'); ?>"><?php echo $redux_demo['home_heading']; ?></a>
                </div>
                <div class="logo_part mobile_logo">
                    <a href="<?php bloginfo('home'); ?>"><img width="<?php echo $redux_demo['width']; ?>"
                            height="<?php echo $redux_demo['height']; ?>"
                            src="<?php echo $redux_demo['logo']['url']; ?>" alt="<?php echo $redux_demo['alt']; ?>"></a>
                </div>
                <div class="nav_menu_ground">
                    <ul class="ul_menu">
                        <li><a href="<?=get_latest_post_page_link();?>">সর্বশেষ</a></li>
                        <?php $header_menu = 'header_menu';
                        if (has_nav_menu($header_menu)) {
                            wp_nav_menu(array(
                        'theme_location' => 'header_menu',
                        'container' => '',
                        'items_wrap' => '%3$s',
                        'depth' => '3',
                    ));
                    } ?>
                    </ul>
                </div>


                <div class="search_container">
                    <ul class="ul_menu always_show">
                        <li id="animated_hamn" onclick="myFunction(this)">
                            <div>
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>
                            </div>
                            <span class="other_heading"><?php echo $redux_demo['other_heading']; ?></span>
                        </li>
                    </ul>
                    <div class="search_icon"><i class="fa fa-search"></i></div>
                    <div class="cross_icon"><i style="color: #ffffff;" class="fas fa-times"></i></div>
                    <div class="search_inner"><?php get_search_form(); ?></div>
                </div>
            </div>
            <div class="drop_nav_menu_container">
                <ul class="drop_nav_menu">
                    <?php wp_list_categories(array(
                        'parent' => 0,
                        'hide_empty' => 0,
                        'number' => 30,
                        'title_li' => __(''),
                        'exclude'    => '1',
                    )); ?>
                </ul>
            </div>
            <div class="header_mobile_menu">
                <?php $header_mobile_menu = 'header_mobile_menu';
                if (has_nav_menu($header_mobile_menu)) {
                    wp_nav_menu(array(
                        'theme_location' => 'header_mobile_menu',
                        'container' => 'div',
                        'container_class' => 'header_mobile_menu_ground',
                        'menu_class' => 'header_mobile_menu_ul',
                        'depth' => '3',
                    ));
                } ?>
            </div>
        </div>
        <div class="scrollmenu">
            <ol>
            <li><a href="<?=get_latest_post_page_link();?>">সর্বশেষ</a></li>
                <?php $header_menu = 'header_menu';
                if (has_nav_menu($header_menu)) {
                    wp_nav_menu(array(
                        'theme_location' => 'header_menu',
                        'container' => '',
                        'items_wrap' => '%3$s',
                        'depth' => '1',
                    ));
                } ?>
            </ol>
        </div>
    </header>