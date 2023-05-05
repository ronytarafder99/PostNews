<?php

/**
 * Template Name: All post Template
 */

get_header(); 
if (have_posts()) :
    global $redux_demo;
    $author = get_user_by('slug', get_query_var('author_name'));
    ?>
<div class="home_page_part_one_bg">
    <div class="custom_container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="font-weight-bold py-2 todays-news-title">আজকের খবর</h1>
            </div>
            <div class="col-lg-8">
                <div class="d-flex justify-content-between mt-3 mb-2 align-items-center">
                    <div class="social_share d-flex"><?php wcr_share_buttons(); ?><i style="margin-right: 5px;"
                            class="fa fa-clone" aria-hidden="true"></i></div>
                </div>
                <div id="toast">
                    <div id="desc">Link Copied!</div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <nav>
                    <div class="nav nav-tabs topic-tab" id="nav-tab">
                        <a class="nav-item nav-link topic-tab-btn active" id="topic-latest"
                            href="javascript: void(0)">সর্বশেষ
                            খবর</a>
                        <a class="nav-item nav-link topic-tab-btn" id="topic-selected"
                            href="javascript: void(0)">নির্বাচিত
                            খবর</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-latest">
                        <div class="tag_page_post white_bg sunset-posts-container">
                            <?php while (have_posts()) : ?>
                            <?php the_post();
                                get_template_part( 'template-parts/post/tag-post');
                                endwhile; ?>
                        </div>
                        <div class="d-flex">
                            <?php
                                global $wp_query;
                                if (  $wp_query->max_num_pages > 1 )
                                echo '<div class="btn misha_loadmore sunset-load-more" id="load_more_button">Load More</div>';
                                echo' <div class="loader w-100">
                                <div class="d-flex justify-content-center w-100 p-3">
                                <div class="sk-chase">
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                <div class="sk-chase-dot"></div>
                                </div>
                                </div>
                                </div>';
                                ?>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="nav-selected">
                        <div class="article-box pt-3">
                            <div class="text-center w-100">
                                <h4>কোন খবর পাওয়া যায়নি</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else :
        echo '<h2 style="text-align:center; font-size:2rem; margin:20px 0; font-weight:normal;">Nothing hare</h2>';
    endif; ?>
<?php get_footer(); ?>