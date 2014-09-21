<?php
/*
Author: Zhen Huang
URL: http://themefortress.com/

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
  - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here

if(!function_exists('init_css_sass')) :
    function init_css_sass(){
        /*
        2. lib/enqueue-sass.php or enqueue-css.php
            - enqueueing scripts & styles for Sass OR CSS
            - please use either Sass OR CSS, having two enabled will ruin your weekend
        */
        require_once('lib/enqueue-sass.php'); // do all the cleaning and enqueue if you Sass to customize Reverie
        //require_once('lib/enqueue-css.php'); // to use CSS for customization, uncomment this line and comment the above Sass line
    }
endif;

init_css_sass();

/*
3. lib/foundation.php
	- add pagination
*/
require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
/*
4. lib/nav.php
	- custom walker for top-bar and related
*/
require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup
/*
5. lib/presstrends.php
    - add PressTrends, tracks how many people are using Reverie
*/
require_once('lib/presstrends.php'); // load PressTrends to track the usage of Reverie across the web, comment this line if you don't want to be tracked

/**********************
Add theme supports
 **********************/
function reverie_theme_support() {
    // Add language supports.
    load_theme_textdomain('reverie', get_template_directory() . '/lang');

    // Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formarts supports. http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    // Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
    add_theme_support('menus');
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'reverie'),
        'utility' => __('Utility Navigation', 'reverie')
    ));

    // Add custom background support
    add_theme_support( 'custom-background',
        array(
            'default-image' => '',  // background image default
            'default-color' => '', // background color default (dont add the #)
            'wp-head-callback' => '_custom_background_cb',
            'admin-head-callback' => '',
            'admin-preview-callback' => ''
        )
    );
}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
        'after_widget' => '</div></article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
    register_sidebar(array('name'=> $sidebar,
        'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
        'after_widget' => '</article>',
        'before_title' => '<h6><strong>',
        'after_title' => '</strong></h6>'
    ));
}

// return entry meta information for posts, used by multiple loops.
if(!function_exists('reverie_entry_meta')) :
    function reverie_entry_meta() {
        echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
        echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
    }
endif;


function custom_scripts() {
	wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/vendor/jquery.cycle2.js', array(), '1.0.0', true );
	wp_enqueue_script( 'cycle2-center', get_template_directory_uri() . '/js/vendor/jquery.cycle2.center.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'cycle2-carousel', get_template_directory_uri() . '/js/vendor/jquery.cycle2.carousel.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/vendor/owl.carousel.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'images-loaded', get_template_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/vendor/masonry.pkgd.js', array(), '1.0.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.pkgd.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/vendor/isotope.center.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-temp', get_template_directory_uri() . '/js/vendor/jquery.tmpl.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery-stellar', get_template_directory_uri() . '/js/vendor/jquery.stellar.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'mobile-menu', get_template_directory_uri() . '/js/vendor/mobile-menu.js', array(), '1.0.0', true );
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

remove_filter('the_content', 'wpautop');


/*function custom_menu_item($items, $args) {
	if ($args->theme_location == 'primary') {
		$items = '<li class="logo"><a href="'.get_option('home').'"><img src="'.get_template_directory_uri().'/img/front-title2.svg"></a></li>'.$items;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'custom_menu_item', 10, 2);*/

if (function_exists('add_image_size')) { 
	add_image_size('category-thumbs', 300);
}

function my_custom_sizes($sizes) {
    return array_merge($sizes, array(
        'category-thumbs' => __('Thumnail Pics'),
    ));
}
add_filter('image_size_names_choose', 'my_custom_sizes');

add_filter('show_admin_bar', '__return_false');


function addlightboxrel_replace ($content) {
    global $post;
    $pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";

    $replacement = '<a$1class="single-slide">';
    $content = preg_replace($pattern, $replacement, $content);
    $content = str_replace("%LIGHTID%", $post->ID, $content);
    return $content;
}
add_filter('the_content', 'addlightboxrel_replace');

function add_custom_class($content){
    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $document = new DOMDocument();
    libxml_use_internal_errors(true);
    $document->loadHTML(utf8_decode($content));

    $imgs = $document->getElementsByTagName('img');
    foreach ($imgs as $img) {           
       $img->setAttribute('class','single-slide');
    }

    $html = $document->saveHTML();
    return $html;   
}
add_filter('the_content', 'add_custom_class');

?>