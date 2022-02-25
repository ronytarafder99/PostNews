<?php

/**
 * Template Name: All post Template
 */
function mypage_head()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/inc/mypage.css">' . "\n";
}
add_action('wp_head', 'mypage_head');
?>

<?php get_header(); ?>
<div class="all_posts_container">
    <div class="all_posts_container_left">
        <div class="bread">
            <a href="<?php bloginfo('home'); ?>"><?php echo $redux_demo['home_heading']; ?></a>
            <?php echo "<b>&nbsp;&nbsp;&#187;&nbsp;&nbsp;</b>"; ?>
            <a href="#"><?php echo $redux_demo['latest_all_only']; ?></a>
        </div>
        <?php
        $args = array(
            'posts_per_page' => 10,
            'paged' => max(1, get_query_var('paged')),
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array('post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video'),
                    'operator' => 'NOT IN'
                )
            )
        );
        $lastpost = new WP_Query($args); ?>
        <div class="all_twinty_posts">
            <?php if ($lastpost->have_posts()) : while ($lastpost->have_posts()) : $lastpost->the_post(); ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('custom-size');
                        } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-img_final.gif" alt="<?php the_title(); ?>" />
                        <?php } ?>
                        <span class="item20span">
                            <h4><?php echo wp_trim_words(get_the_title(), 10); ?></h4>
                        </span>
                    </a>
                <?php endwhile; ?>
        </div>
        <div class="pagination1">
            <div class="pagi_inner">
                <?php echo paginate_links(array(
                    'total' => $lastpost->max_num_pages,
                    'prev_text' => __('&laquo;', 'textdomain'),
                    'next_text' => __('&raquo;', 'textdomain'),
                )); ?>
            </div>
        </div>
    <?php else :
                echo '<P>no posts found</P>';
            endif;
    ?>
    </div>
    <div class="all_posts_container_right">
        <div class="custom_container home_page_ad">
            <?php echo $redux_demo['home_page_3rd_ad']; ?>
        </div>

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
    </div>
</div>
<?php get_footer(); ?>