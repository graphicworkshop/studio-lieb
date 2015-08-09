<?php

/*
 * Plugin Name: FAQ
 */

if (!function_exists('faq_details')) {

// Register Custom Post Type
    function faq_cat() {

        $labels = array(
            'name' => _x('FAQ', 'Post Type General Name', 'text_domain'),
            'singular_name' => _x('FAQ', 'Post Type Singular Name', 'text_domain'),
            'menu_name' => __('FAQ', 'text_domain'),
            'name_admin_bar' => __('FAQ', 'text_domain'),
            'parent_item_colon' => __('Parent Item:', 'text_domain'),
            'all_items' => __('All Items', 'text_domain'),
            'add_new_item' => __('Add New Item', 'text_domain'),
            'add_new' => __('Add New', 'text_domain'),
            'new_item' => __('New Item', 'text_domain'),
            'edit_item' => __('Edit Item', 'text_domain'),
            'update_item' => __('Update Item', 'text_domain'),
            'view_item' => __('View Item', 'text_domain'),
            'search_items' => __('Search Item', 'text_domain'),
            'not_found' => __('No posts found.', 'text_domain'),
            'not_found_in_trash' => __('No posts found in Trash.', 'text_domain'),
        );
        $args = array(
            'label' => __('faq', 'text_domain'),
            'labels' => $labels,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'taxonomies' => array('category', 'post_tag'),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 20,
            'menu_icon' => 'dashicons-heart',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => true,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'page',
        );
        register_post_type('faq', $args);

        $labels = array(
            'name' => _x('faqcategory', 'taxonomy general name'),
            'singular_name' => _x('faqcategory', 'taxonomy singular name'),
            'search_items' => __('Search faqcategory'),
            'all_items' => __('All faqcategory'),
            'parent_item' => __('Parent faqcategory'),
            'parent_item_colon' => __('Parent faqcategory:'),
            'edit_item' => __('Edit faqcategory'),
            'update_item' => __('Update faqcategory'),
            'add_new_item' => __('Add New faqcategory'),
            'new_item_name' => __('New faqcategory Name'),
            'menu_name' => __('faqcategory'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'faqcategory'),
        );

        register_taxonomy('faqcategory', array('faq_cat'), $args);
    }

// Hook into the 'init' action
    add_action('init', 'faq_cat', 0);
}

function faq_shortcut($atts) {

    //print_r($atts); die();
    $_SESSION['path'] = ABSPATH;


    extract(shortcode_atts(array(
        "limit" => '',
        "category" => '',
        "faqcategory"=>'',
        "order"=> '',
                    ), $atts));

    // Define limit
    if ($limit) {
        $posts_per_page = $limit;
    } else {
        $posts_per_page = '-1';
    }
    // Define category
    if ($category) {
        $cat = $category;
    } else {
        $cat = '';
    }

     if ($order) {
        $ord = $order;
    } else {
        $ord = 'DESC';
    }


if ($faqcategory) {
        $faqcat = $faqcategory;
    } else {
        $faqcat = '';
    }
    ob_start(); // begin output buffering

    include('faq.php');

    $output = ob_get_contents(); // end output buffering

    ob_end_clean(); // grab the buffer contents and empty the buffer

    return $output;

}

add_shortcode('showallfaq', 'faq_shortcut');

add_shortcode('faq', 'faq_shortcut');