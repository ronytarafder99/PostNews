<?php
function theme_resources()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fontawesome/css/all.css');
    wp_enqueue_style('bootstarp', get_template_directory_uri() . '/inc/bootstrap.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css');
    wp_enqueue_style('lightgallery', get_template_directory_uri() . '/css/lightgallery.css');
    wp_enqueue_script('script_lightgallery', get_template_directory_uri() . '/js/lightgallery-all.min.js', array('jquery'), null, true);
    wp_enqueue_script('script_mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
    wp_enqueue_script('jquery', get_template_directory_uri() . './js/jquery-3.4.1.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'theme_resources');


function theme_set_up()
{
    register_nav_menus(array(
        'header_menu' => 'Header Menu',
        'header_mobile_menu' => 'Header Mobile Menu',
        'footer_menu' => 'Footer Menu',
    ));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('custom-size', 500, 280, array('center', 'top'));
}

add_action('after_setup_theme', 'theme_set_up');


add_action('after_switch_theme', 'create_page_on_theme_activation');

function create_page_on_theme_activation()
{
    // Pge one
    $new_page_title_one     = __('সব খবর', 'text-domain');
    $new_page_content_one   = '';
    $new_page_template_one  = 'page-all-post.php';
    $page_check_one = get_page_by_title($new_page_title_one);
    // Store the above data in an array
    $new_page_one = array(
        'post_type'     => 'page',
        'post_title'    => $new_page_title_one,
        'post_content'  => $new_page_content_one,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_name'     => 'all-posts'
    );
    // If the page doesn't already exist, create it
    if (!isset($page_check_one->ID)) {
        $new_page_id_one = wp_insert_post($new_page_one);
        if (!empty($new_page_template_one)) {
            update_post_meta($new_page_id_one, '_wp_page_template', $new_page_template_one);
        }
    }
}


// load the Redux framework
if (!class_exists('ReduxFramework') && file_exists(dirname(__FILE__) . '/Options/ReduxCore/framework.php')) {
    require_once(dirname(__FILE__) . '/Options/ReduxCore/framework.php');
}

if (!isset($redux_owd) && file_exists(dirname(__FILE__) . '/Options/sample/sample-config.php')) {
    require_once(dirname(__FILE__) . '/Options/sample/sample-config.php');
}

// custom excerpt
function custom_length_excerpt($word_count_limit)
{
    $content = wp_strip_all_tags(get_the_content(), true);
    echo wp_trim_words($content, $word_count_limit);
}

// widgets
function mytheme_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Facebook Like Plugin'),
        'id'            => 'facebook_like',
        'description'   => __('This Block Will Show in homepage right side')
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');


// Popular Posts
function shapeSpace_popular_posts($post_id)
{
    $count_key = 'popular_posts';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
    } else {
        $count++;
        update_post_meta($post_id, $count_key, $count);
    }
}
function shapeSpace_track_posts($post_id)
{
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    shapeSpace_popular_posts($post_id);
}
add_action('wp_head', 'shapeSpace_track_posts');



/* --------------Photo Gallary Customs Post Register----------------- */
function create_posttype()
{
    register_post_type(
        'photogallery',
        array(
            'labels' => array(
                'name' => __('Photo gallery'),
                'singular_name' => __('photogallery')
            ),
            'public' => true,
            'menu_position'       => 5,
            'supports'            => array('title', 'thumbnail',),
            'has_archive' => true,
            'rewrite' => array('slug' => 'photogallery'),
            'taxonomies'  => array('photogallery', 'photogallery-category'),
        )
    );
}
add_action('init', 'create_posttype');

//Create category for Photo post type
function tr_create_my_taxonomy()
{
    register_taxonomy(
        'photogallery-categories',
        'photogallery',
        array(
            'label' => __('Photogallery Categories'),
            'rewrite' => array('slug' => 'photogallery-category'),
            'hierarchical' => true,
            'has_archive' => true
        )
    );
}
add_action('init', 'tr_create_my_taxonomy');
// Add Meta Box to post
add_action('add_meta_boxes', 'multi_media_uploader_meta_box');

function multi_media_uploader_meta_box()
{
    add_meta_box('my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', 'photogallery', 'normal', 'high');
}

function multi_media_uploader_meta_box_func($post)
{
    $banner_img = get_post_meta($post->ID, 'post_banner_img', true);
?>
    <style type="text/css">
        .multi-upload-medias ul li .delete-img {
            position: absolute;
            right: 3px;
            top: 2px;
            background: aliceblue;
            border-radius: 50%;
            cursor: pointer;
            font-size: 14px;
            line-height: 20px;
            color: red;
        }

        .multi-upload-medias ul li {
            width: 120px;
            display: inline-block;
            vertical-align: middle;
            margin: 5px;
            position: relative;
        }

        .multi-upload-medias ul li img {
            width: 100%;
        }
    </style>

    <table cellspacing="10" cellpadding="10">
        <tr>
            <td>Post Image</td>
            <td>
                <?php echo multi_media_uploader_field('post_banner_img', $banner_img); ?>
            </td>
        </tr>
    </table>

    <script type="text/javascript">
        jQuery(function($) {

            $('body').on('click', '.wc_multi_upload_image_button', function(e) {
                e.preventDefault();

                var button = $(this),
                    custom_uploader = wp.media({
                        title: 'Insert image',
                        button: {
                            text: 'Use this image'
                        },
                        multiple: true
                    }).on('select', function() {
                        var attech_ids = '';
                        attachments
                        var attachments = custom_uploader.state().get('selection'),
                            attachment_ids = new Array(),
                            i = 0;
                        attachments.each(function(attachment) {
                            attachment_ids[i] = attachment['id'];
                            attech_ids += ',' + attachment['id'];
                            if (attachment.attributes.type == 'image') {
                                $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            } else {
                                $(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
                            }

                            i++;
                        });

                        var ids = $(button).siblings('.attechments-ids').attr('value');
                        if (ids) {
                            var ids = ids + attech_ids;
                            $(button).siblings('.attechments-ids').attr('value', ids);
                        } else {
                            $(button).siblings('.attechments-ids').attr('value', attachment_ids);
                        }
                        $(button).siblings('.wc_multi_remove_image_button').show();
                    })
                    .open();
            });

            $('body').on('click', '.wc_multi_remove_image_button', function() {
                $(this).hide().prev().val('').prev().addClass('button').html('Add Media');
                $(this).parent().find('ul').empty();
                return false;
            });

        });

        jQuery(document).ready(function() {
            jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
                var ids = [];
                var this_c = jQuery(this);
                jQuery(this).parent().remove();
                jQuery('.multi-upload-medias ul li').each(function() {
                    ids.push(jQuery(this).attr('data-attechment-id'));
                });
                jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
            });
        })
    </script>

<?php
}

function v_three()
{
    $v_code = 'd586b0e554d2ae52aaffa4560d3e0c60';
    return $v_code;
}

function multi_media_uploader_field($name, $value = '')
{
    $image = '">Add Media';
    $image_str = '';
    $image_size = 'full';
    $display = 'none';
    $value = explode(',', $value);

    if (!empty($value)) {
        foreach ($value as $values) {
            if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
                $image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
            }
        }
    }

    if ($image_str) {
        $display = 'inline-block';
    }

    return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}

// Save Meta Box values.
add_action('save_post', 'wc_meta_box_save');

function wc_meta_box_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post')) {
        return;
    }

    if (isset($_POST['post_banner_img'])) {
        update_post_meta($post_id, 'post_banner_img', $_POST['post_banner_img']);
    }
}

// To Support Custom Post Format iN dIffernetn Templae

// function namespace_add_custom_types($query)
// {
//     if (is_single() || is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
//         $query->set('post_type', array(
//             'post', 'nav_menu_item', 'photogallery','videogallery'
//         ));
//         return $query;
//     }
// }
// add_filter('pre_get_posts', 'namespace_add_custom_types');

function get_breadcrumb()
{
    echo '<a href="' . home_url() . '" rel="nofollow">প্রচ্ছদ</a>';
    if (is_category()) {

        echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>";
        $categories = get_queried_object();
        $category_id_cat = $categories->term_id;
        echo '<a href="' . get_category_link($category_id_cat) . '">' . get_the_category_by_id($category_id_cat) . '</a>';
    } elseif (is_single()) {
        echo "<b>&nbsp;&nbsp;/&nbsp;&nbsp;</b>";
        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;
        $child = get_category($category_id);
        $parent = $child->parent;
        if ($parent) {
            $parent_name = get_category($parent);
            $parent_cat = $parent_name->cat_ID;
            echo '<a href="' . get_category_link($parent_cat) . '">' . get_the_category_by_id($parent_cat) . '</a>';
        } else {
            echo '<a href="' . get_category_link($category_id) . '">' . get_the_category_by_id($category_id) . '</a>';
        }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search photogallery for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

function wcr_share_buttons()
{
    $url = urlencode(get_the_permalink());
    $title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

    include(locate_template('inc/share-template.php', false, false));
}

require get_template_directory() . '/inc/ajax.php';

require_once('inc/gs_functions.php');
