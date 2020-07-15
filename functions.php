<?php
// Exit if accessed directly.
if (! function_exists('wp_bladeone')) {
    echo "This theme needs WP Blade(One) plugin to be installed and active in order to work";
    exit;
}


// constants used through the theme
require __DIR__ . '/includes/constants.php';

// action that modifies front behavior
require __DIR__ . '/includes/front.php';

// action that modifies admin behavior
require __DIR__ . '/includes/admin.php';

// general actions for this theme
add_action('after_setup_theme', 'wp_bladeone_theme_setup');
function wp_bladeone_theme_setup()
{
    load_theme_textdomain('wp_bladeone_theme', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    global $content_width;
    if (! isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array( 'main-menu' => esc_html__('Main Menu', 'wp_bladeone_theme') ));
}

add_action('wp_enqueue_scripts', 'wp_bladeone_theme_load_scripts');
function wp_bladeone_theme_load_scripts()
{
    wp_enqueue_style('wp_bladeone_theme-style', get_stylesheet_uri());
    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}


add_action('widgets_init', 'wp_bladeone_theme_widgets_init');
function wp_bladeone_theme_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'wp_bladeone_theme'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

add_action('wp_head', 'wp_bladeone_theme_pingback_header');
function wp_bladeone_theme_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('comment_form_before', 'wp_bladeone_theme_enqueue_comment_reply_script');
function wp_bladeone_theme_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

// general filters for this theme
add_filter('get_comments_number', 'wp_bladeone_theme_comment_count', 0);
function wp_bladeone_theme_comment_count($count)
{
    if (! is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

add_filter('document_title_separator', 'wp_bladeone_theme_document_title_separator');
function wp_bladeone_theme_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}

add_filter('the_title', 'wp_bladeone_theme_title');
function wp_bladeone_theme_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}

add_filter('the_content_more_link', 'wp_bladeone_theme_read_more_link');
function wp_bladeone_theme_read_more_link()
{
    if (! is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}

add_filter('excerpt_more', 'wp_bladeone_theme_excerpt_read_more_link');
function wp_bladeone_theme_excerpt_read_more_link($more)
{
    if (! is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}


add_filter('intermediate_image_sizes_advanced', 'wp_bladeone_theme_image_insert_override');
function wp_bladeone_theme_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}
