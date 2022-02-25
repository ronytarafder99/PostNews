<?php
global $redux_demo;
get_header(); ?>

<?php if ($redux_demo['exclusive_posts'] == '1') { ?>
    <div class="home_page_part_one_bg exclusive_sectino">
        <div class="custom_container">
            <div class="special-title-section">
                <div class="special-title-container">
                    <h2 class="cover-headline" style="color: #01510e">
                        <a href="<?php echo get_category_link($redux_demo['home_cat_0']); ?>" style="color: #01510e">
                            <?php echo ($redux_demo['home_cat_0_text']); ?>
                        </a>
                    </h2>
                </div>
            </div>
            <div class="home_page_part_one home_page_first_part">
                <div class="home_page_first_part_section_one">
                    <?php $args2 = array(
                        'posts_per_page' => 2,
                        'order' => 'DESC',
                        'cat' => $redux_demo['home_cat_0'],
                    );

                    $lastpost = new WP_Query($args2);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-single_right_item');
                        endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </div>
                <div class="home_page_first_part_section_two">
                    <?php $args2 = array(
                        'posts_per_page' => 1,
                        'order' => 'DESC',
                        'offset' => 2,
                        'cat' => $redux_demo['home_cat_0'],
                    );

                    $lastpost = new WP_Query($args2);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                            <ul class="single_right_item">
                                <a style="width: 100%;" class="home_second_part_grid" href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                    <?php } ?>
                                    <li class="tab_post"><?php the_title(); ?></li>
                                </a>
                            </ul>
                    <?php endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </div>
                <div class="home_page_first_part_section_three">
                    <?php $args2 = array(
                        'posts_per_page' => 2,
                        'order' => 'DESC',
                        'offset' => 3,
                        'cat' => $redux_demo['home_cat_0'],
                    );

                    $lastpost = new WP_Query($args2);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-single_right_item');
                        endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left home_page_part_one_left_left_flex">
            <div class="home_page_part_one_left_left">
                <div class="opinion-contents">
                    <?php
                    $args = array('posts_per_page' => 3, 'order' => 'DESC',);
                    $lastpost = new WP_Query($args); ?>
                    <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                            <div class="leatest_three_post d-flex">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('custom-size');
                                    } else { ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                    <?php } ?></a>
                                <h2 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                    <?php endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?></div>
                <div class="custom_container home_page_ad">
                    <?php echo $redux_demo['home_page_2nd_ad']; ?>
                </div>
            </div>
            <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">
                <?php
                $args = array('posts_per_page' => 3, 'offset' => 3, 'order' => 'DESC',);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <div class="leatest_three_post">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                <?php } ?></a>
                            <h2 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php echo custom_length_excerpt(20); ?></p>
                        </div>
                <?php endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <div class="home_sidebar_two_post">
                <h2 class="home_sidebar_cat_title">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_1']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_1']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_1']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <?php $lastpost = new WP_Query('cat=' . $redux_demo['home_cat_1'] . ' & posts_per_page=1'); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <a class="home_sidebar_posts" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('custom-size');
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                            <?php } ?></thumb>
                            <div class="flex_inner">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <p style="margin-top: 5px;color: #696464;"><?php the_author(); ?></p>
                            </div>
                        </a>
                <?php endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                ?>
            </div>
            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_3rd_ad']; ?>
            </div>
            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_4th_ad']; ?>
            </div>
        </div>
    </div>
</div>



<div class="home_page_part_one_bg opinion-contents">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <div class="leatest_posts">
                <?php
                $args = array('posts_per_page' => 12, 'offset' => 6, 'order' => 'DESC',);
                $lastpost = new WP_Query($args); ?>
                <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <div class="leatest_twelve_post">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                <?php } ?></a>
                            <h2 class="title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                <?php endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                ?>
            </div>
        </div>
        <div class="home_page_part_one_right">
            <?php require get_template_directory() . '/inc/leatest_popular.php'; ?>
            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_6th_ad']; ?>
            </div>
        </div>
    </div>
</div>


<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left cs_border-right">
            <h2 class="home_sidebar_cat_title">
                <a href="<?php echo get_category_link($redux_demo['home_cat_2']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_2']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_2']); ?>" class="read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <div class="home_page_part_one_left_left_flex">
                <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">
                    <?php $args2 = array(
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        'cat' => $redux_demo['home_cat_2'],
                    );

                    $lastpost = new WP_Query($args2);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-single_right_item');
                        endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </div>
                <div class="home_page_part_one_left_left">
                    <ul class="leatest_in_a_cat_postlopp">
                        <?php $args = array(
                            'posts_per_page' => 7,
                            'order' => 'DESC',
                            'offset' => 4,
                            'cat' => $redux_demo['home_cat_2'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <ul class="single_right_item">
                                    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                </ul>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                </div>
            </div>

        </div>
        <div class="home_page_part_one_right">
            <h2 class="home_sidebar_cat_title">
                <a href="<?php echo get_category_link($redux_demo['home_cat_3']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_3']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_3']); ?>" class="read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <ul class="leatest_in_a_cat_postlopp">
                <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_3'], 'posts_per_page' => 4,));
                while ($popular->have_posts()) : $popular->the_post();
                    get_template_part('template-parts/content-single_right_item_two');
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>








<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left cs_border-right">
            <h2 class="home_sidebar_cat_title d-flex">
                <a href="<?php echo get_category_link($redux_demo['home_cat_4']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_4']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_4']); ?>" class="read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <div class="three_col_flex">
                <div style="flex: 1;" class="three_firest">
                    <div class="row type-sect-three-left">
                        <?php $args = array(
                            'posts_per_page' => 2,
                            'order' => 'DESC',
                            'cat' => $redux_demo['home_cat_4'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-12 box-news">
                                    <a href="<?php the_permalink(); ?>" class="news-item news-item-box pt-2 m-pb-2">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size');
                                        } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </a>
                                </div>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </div>
                </div>
                <div style="flex: 1;" class="img_hun_ten">
                    <div class="clk-list clk-center">
                        <ul class="leatest_in_a_cat_postlopp">
                            <?php $args = array(
                                'posts_per_page' => 5,
                                'order' => 'DESC',
                                'offset' => 2,
                                'cat' => $redux_demo['home_cat_4'],
                            );

                            $lastpost = new WP_Query($args);
                            if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                    get_template_part('template-parts/content-single_right_item_two');
                                endwhile;
                            else :
                                echo '<P>no posts found</P>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
                <div style="flex: 1;" class="img_hun_ten">
                    <div class="clk-list clk-right">
                        <ul class="leatest_in_a_cat_postlopp">
                            <?php $args = array(
                                'posts_per_page' => 5,
                                'order' => 'DESC',
                                'offset' => 7,
                                'cat' => $redux_demo['home_cat_4'],
                            );

                            $lastpost = new WP_Query($args);
                            if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                    get_template_part('template-parts/content-single_right_item_two');
                                endwhile;
                            else :
                                echo '<P>no posts found</P>';
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="home_page_part_one_right">
            <h2 class="home_sidebar_cat_title d-flex">
                <a href="#"><?php echo $redux_demo['area_news']; ?></a>
            </h2>
            <form>
                <div class="form-group">
                    <div class="form_col">
                        <select class="form-control" name="bd_division" id="division">
                            <option>--বিভাগ--</option>
                            <?php $division_args =   array(
                                'taxonomy'     => 'location',
                                'orderby'      => 'ID',
                                'parent' => 0,
                                'hide_empty'    => false
                            );
                            $divisions = get_terms($division_args);
                            ?>
                            <?php foreach ($divisions as $division) : ?>
                                <option value="<?php echo $division->term_id; ?>" data-val="<?php echo get_term_link($division->term_id); ?>"><?php echo $division->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form_col">
                        <select class="form-control" name="bd_district" id="district">
                            <option value="" selected="">--জেলা--</option>
                            <?php $args =   array(
                                'taxonomy'     => 'location',
                                'orderby'      => 'ID',
                                'parent' => 0,
                                'hide_empty'    => false
                            );
                            $terms = get_terms($args);
                            ?>
                            <?php foreach ($terms as $term) :
                            ?>

                                <?php $d_args =   array(
                                    'taxonomy'     => 'location',
                                    'parent'        => $term->term_id,
                                    'orderby'      => 'ID',
                                    'hide_empty'    => false
                                );
                                $districts = get_terms($d_args);
                                ?>
                                <?php foreach ($districts as $district) {
                                ?>
                                    <option value="<?php echo $district->term_id; ?>" style="display:none" class="dist-<?php echo $term->term_id; ?>" data-val="<?php echo get_term_link($district->term_id); ?>"><?php echo $district->name; ?></option>
                                <?php  } ?>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form_col">
                        <select class="form-control" name="bd_thana" id="upozilla">

                            <option value="" selected="">--উপজেলা--</option>

                            <?php $args =   array(
                                'taxonomy'     => 'location',
                                'orderby'      => 'ID',
                                'parent'        => 0,
                                'hide_empty'    => false
                            );
                            $terms = get_terms($args);
                            ?>
                            <?php foreach ($terms as $term) : //Level 0 
                            ?>

                                <?php $d_args =   array(
                                    'taxonomy'     => 'location',
                                    'parent'        => $term->term_id,
                                    'orderby'      => 'ID',
                                    'hide_empty'    => false
                                );
                                $districts = get_terms($d_args);
                                ?>
                                <?php foreach ($districts as $district) {  // Level One 
                                ?>

                                    <?php $u_args =   array(
                                        'taxonomy'     => 'location',
                                        'child_of'        => $district->term_id,
                                        'orderby'      => 'ID',
                                        'hide_empty'    => false
                                    );
                                    $upozilas = get_terms($u_args);
                                    ?>

                                    <?php foreach ($upozilas as $upozila) :  // Level One 
                                    ?>
                                        <option id="upo" value="<?php echo get_term_link($upozila->term_id); ?>" style="display:none" class="thana-<?php echo $district->term_id; ?>" data-val="<?php echo get_term_link($upozila->term_id); ?>"><?php echo $upozila->name; ?></option>
                                    <?php endforeach; // Upozilas 
                                    ?>
                                <?php } // Districts 
                                ?>
                            <?php endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form_col">
                        <div class="btn btn-danger dist_news_srch w-100">খুঁজুন
                            <i class="fa fa-search ml-2" style="color: #FFF !important; height: 100%"></i>
                        </div>
                    </div>
                </div>
            </form>
            <div class="custom_container home_page_ad">
                <?php echo $redux_demo['home_page_5th_ad']; ?>
            </div>
        </div>
    </div>
</div>







<div class="home_page_part_one_bg opinion-contents">
    <div class="custom_container home_page_part_one">
        <div class="home_page_part_one_left">
            <h2 class="home_sidebar_cat_title d-flex">
                <a href="<?php echo get_category_link($redux_demo['home_cat_5']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_5']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_5']); ?>" class="read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <div class="home_page_part_one_left_left_flex">
                <div class="home_page_part_one_left_right home_page_pat_one_left_right_grid">
                    <?php $args2 = array(
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        'cat' => $redux_demo['home_cat_5'],
                    );

                    $lastpost = new WP_Query($args2);
                    if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                            get_template_part('template-parts/content-single_right_item');
                        endwhile;
                    else :
                        echo '<P>no posts found</P>';
                    endif;
                    ?>
                </div>
                <div class="home_page_part_one_left_left">
                    <ul class="leatest_in_a_cat_postlopp">
                        <?php $args = array(
                            'posts_per_page' => 7,
                            'order' => 'DESC',
                            'offset' => 4,
                            'cat' => $redux_demo['home_cat_5'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <ul class="single_right_item">
                                    <li class="tab_post"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                </ul>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="home_page_part_one_right">
            <h2 class="home_sidebar_cat_title d-flex">
                <a href="<?php echo get_category_link($redux_demo['home_cat_6']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_6']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_6']); ?>" class="read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <ul class="leatest_in_a_cat_postlopp">
                <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_6'], 'posts_per_page' => 3,));
                while ($popular->have_posts()) : $popular->the_post();
                    get_template_part('template-parts/content-single_right_item_flex');
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>









<div class="home_page_part_one_bg">
    <div class="custom_container">
        <h2 class="home_sidebar_cat_title d-flex">
            <a href="<?php echo get_category_link($redux_demo['home_cat_7']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_7']); ?></a>
            <a href="<?php echo get_category_link($redux_demo['home_cat_7']); ?>" class="read-more d-flex justify-content-end align-items-center">
                <p><?php echo $redux_demo['read_more']; ?></p>
                <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
            </a>
        </h2>
        <div class="home_page_part_one">
            <ul class="leatest_in_a_cat_postlopp">
                <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_7'], 'posts_per_page' => 5,));
                while ($popular->have_posts()) : $popular->the_post();
                    get_template_part('template-parts/content-single_right_item_flex');
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
            <div class="home_page_pat_one_left_right_grid firest_item_two_column">
                <?php $args2 = array(
                    'posts_per_page' => 3,
                    'order' => 'DESC',
                    'offset' => 5,
                    'cat' => $redux_demo['home_cat_7'],
                );

                $lastpost = new WP_Query($args2);
                if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                        <ul class="single_right_item zoom_img">
                            <a class="home_second_part_grid" href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('custom-size');
                                } else { ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                <?php } ?>
                                <li class="tab_post"><?php the_title(); ?></li>
                            </a>
                        </ul>
                <?php endwhile;
                else :
                    echo '<P>no posts found</P>';
                endif;
                ?>
            </div>
            <ul class="leatest_in_a_cat_postlopp firest_item_three_column">
                <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_7'], 'offset' => 8, 'posts_per_page' => 5,));
                while ($popular->have_posts()) : $popular->the_post();
                    get_template_part('template-parts/content-single_right_item_flex');
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>











<div class="home_page_part_one_bg">
    <div class="custom_container home_page_part_one justify-content-between">
        <div class="home_page_part_left cs_border-right">
            <h2 class="home_sidebar_cat_title d-flex">
                <a href="<?php echo get_category_link($redux_demo['home_cat_8']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_8']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_8']); ?>" class="read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <div class="clk-list d-flex">
                <div style="flex: 1;" class="three_firest">
                    <div class="type-sect-three-left">
                        <?php $args = array(
                            'posts_per_page' => 2,
                            'order' => 'DESC',
                            'cat' => $redux_demo['home_cat_8'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class="box-news">
                                    <a href="<?php the_permalink(); ?>" class="news-item news-item-box pt-2 m-pb-2">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size');
                                        } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </a>
                                </div>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </div>
                </div>
                <div style="flex: 1;" class="img_hun_ten">
                    <ul class="leatest_in_a_cat_postlopp">
                        <?php $args = array(
                            'posts_per_page' => 5,
                            'order' => 'DESC',
                            'offset' => 2,
                            'cat' => $redux_demo['home_cat_8'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                get_template_part('template-parts/content-single_right_item_two');
                            endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="home_page_part_right">
            <h2 class="home_sidebar_cat_title d-flex">
                <a href="<?php echo get_category_link($redux_demo['home_cat_9']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_9']); ?></a>
                <a href="<?php echo get_category_link($redux_demo['home_cat_9']); ?>" class=" read-more d-flex justify-content-end align-items-center">
                    <p><?php echo $redux_demo['read_more']; ?></p>
                    <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                </a>
            </h2>
            <div class="clk-list d-flex">
                <div style="flex: 1;" class="three_firest">
                    <div class="type-sect-three-left">
                        <?php $args = array(
                            'posts_per_page' => 2,
                            'order' => 'DESC',
                            'cat' => $redux_demo['home_cat_9'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                                <div class=" box-news">
                                    <a href="<?php the_permalink(); ?>" class="news-item news-item-box pt-2 m-pb-2">
                                        <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('custom-size');
                                        } else { ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                                        <?php } ?>
                                        <h2 class="title"><?php the_title(); ?></h2>
                                    </a>
                                </div>
                        <?php endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </div>
                </div>
                <div style="flex: 1;" class="img_hun_ten">
                    <ul class="leatest_in_a_cat_postlopp">
                        <?php $args = array(
                            'posts_per_page' => 5,
                            'order' => 'DESC',
                            'offset' => 2,
                            'cat' => $redux_demo['home_cat_9'],
                        );

                        $lastpost = new WP_Query($args);
                        if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post();
                                get_template_part('template-parts/content-single_right_item_two');
                            endwhile;
                        else :
                            echo '<P>no posts found</P>';
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>










<div class="home_page_part_one_bg opinion-contents">
    <div class="custom_container">
        <div class="home_page_part_one">
            <ul class="leatest_in_a_cat_postlopp" style="flex: 1;">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_10']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_10']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_10']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_10'], 'posts_per_page' => 3,));
                while ($popular->have_posts()) : $popular->the_post();
                    get_template_part('template-parts/content-single_right_item_flex');
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
            <ul class="leatest_in_a_cat_postlopp flex_two">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_11']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_11']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_11']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <div class="two_col_flex">
                    <div class="two_col_flex_part_one">
                        <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_11'], 'posts_per_page' => 4,));
                        while ($popular->have_posts()) : $popular->the_post();
                            get_template_part('template-parts/content-single_right_item_two');
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                    <div class="two_col_flex_part_two">
                        <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_11'], 'offset' => 4, 'posts_per_page' => 4,));
                        while ($popular->have_posts()) : $popular->the_post();
                            get_template_part('template-parts/content-single_right_item_two');
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </ul>
            <ul class="leatest_in_a_cat_postlopp" style="flex: 1;">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_12']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_12']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_12']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_12'], 'posts_per_page' => 3,));
                while ($popular->have_posts()) : $popular->the_post();
                    get_template_part('template-parts/content-single_right_item_flex');
                endwhile;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>










<div class="home_page_part_one_bg">
    <div class="custom_container">
        <h2 class="home_sidebar_cat_title d-flex">
            <a href="<?php echo get_category_link($redux_demo['home_cat_13']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_13']); ?></a>
            <a href="<?php echo get_category_link($redux_demo['home_cat_13']); ?>" class="read-more d-flex justify-content-end align-items-center">
                <p><?php echo $redux_demo['read_more']; ?></p>
                <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
            </a>
        </h2>

        <div class="row ocs-items mt-2">
            <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_13'], 'posts_per_page' => 4,));
            while ($popular->have_posts()) : $popular->the_post(); ?>
                <div class="col-sm-3 m-scroll-item align-items-stretch d-flex">
                    <a class="ocs card" href="<?php the_permalink(); ?>">
                        <div class="image-container">
                            <?php if (has_post_thumbnail()) {
                                the_post_thumbnail('custom-size');
                            } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </div>
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </div>

    </div>
</div>


<div class="home_page_part_one_bg white_bg">
    <div class="custom_container">
        <div class="three_coloumn">
            <div class="column_one">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_14']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_14']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_14']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <ul class="leatest_in_a_cat_postlopp">
                    <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_14'], 'posts_per_page' => 3,));
                    while ($popular->have_posts()) : $popular->the_post();
                        get_template_part('template-parts/content-single_right_item_flex');
                    endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
            <div class="column_one">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_15']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_15']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_15']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <ul class="leatest_in_a_cat_postlopp">
                    <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_15'], 'posts_per_page' => 3,));
                    while ($popular->have_posts()) : $popular->the_post();
                        get_template_part('template-parts/content-single_right_item_flex');
                    endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
            <div class="column_one">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_16']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_16']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_16']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <ul class="leatest_in_a_cat_postlopp">
                    <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_16'], 'posts_per_page' => 3,));
                    while ($popular->have_posts()) : $popular->the_post();
                        get_template_part('template-parts/content-single_right_item_flex');
                    endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
            <div class="column_one">
                <h2 class="home_sidebar_cat_title d-flex">
                    <a href="<?php echo get_category_link($redux_demo['home_cat_17']); ?>"><?php echo get_the_category_by_id($redux_demo['home_cat_17']); ?></a>
                    <a href="<?php echo get_category_link($redux_demo['home_cat_17']); ?>" class="read-more d-flex justify-content-end align-items-center">
                        <p><?php echo $redux_demo['read_more']; ?></p>
                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                    </a>
                </h2>
                <ul class="leatest_in_a_cat_postlopp">
                    <?php $popular = new WP_Query(array('cat' => $redux_demo['home_cat_17'], 'posts_per_page' => 3,));
                    while ($popular->have_posts()) : $popular->the_post();
                        get_template_part('template-parts/content-single_right_item_flex');
                    endwhile;
                    wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    </div>
</div>






<!-- Photo -->

<div class="home_page_part_one_bg">
    <div class="custom_container">
        <h2 class="home_sidebar_cat_title d-flex">
            <a href="<?php echo get_post_type_archive_link('photogallery'); ?>"><?php echo $redux_demo['photo_name']; ?></a>
            <a href="<?php echo get_post_type_archive_link('photogallery'); ?>" class="read-more d-flex justify-content-end align-items-center">
                <p><?php echo $redux_demo['read_more']; ?></p>
                <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
            </a>
        </h2>


        <div class="web-stories py-2">
            <?php $args1 = array(
                'post_type' => 'photogallery',
                'posts_per_page' => 6,
                'order' => 'DESC',
            );
            $lastpost = new WP_Query($args1);
            if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
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
    </div>
</div>

<?php get_footer(); ?>