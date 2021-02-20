<?php
/***************************************************************
 * Trail Post Type
 ***************************************************************/
function register_trail_post_type() {
    $plural = "Trail Races";
    $singular = "Trail Race";

    $labels = array(
        'name'               => __( "{$plural}" ),
        'menu_name'          => __( "{$plural}" ),
        'singular_name'      => __( "{$singular}" ),
        'add_new_item'       => __( "Add New {$singular}" ),
        'edit_item'          => __( "Edit {$singular}" ),
        'new_item'           => __( "New {$singular}" ),
        'view_item'          => __( "View {$singular}" ),
        'search_items'       => __( "Search {$plural}" ),
        'not_found'          => __( "No {$plural} found" ),
        'not_found_in_trash' => __( "No {$plural} found in Trash" ),
    );
    $args = array(
        'labels'              => $labels,
        'supports'              => array( 'title', 'editor', 'revisions','thumbnail', 'excerpt' ),
        'rewrite'             => array( 'slug' => 'trail-races', 'with_front' => false ),
        'capability_type'     => 'post',
        'menu_position'       => 7, // after Posts
        'menu_icon'           => 'dashicons-groups',
        'hierarchical'        => false,
        'show_ui'             => true,
        'has_archive'         => false,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'public'              => true,
        'can_export'          => true,
        'show_in_admin_bar'   => true,
    );
    register_post_type('trail', $args);
}
add_action('init', 'register_trail_post_type');

/***************************************************************
 * Trail Category
 ***************************************************************/

function create_trail_category() {
    $plural = "Categories";
    $singular = "Category";
    $labels = array(
        'name'              => _x("{$plural}", 'taxonomy general name'),
        'singular_name'     => _x("{$singular}", 'taxonomy singular name'),
        'search_items'      => __("Search {$plural}"),
        'all_items'         => __("All {$plural}"),
        'parent_item'       => __("Parent {$singular}"),
        'parent_item_colon' => __("Parent {$singular}:"),
        'edit_item'         => __("Edit {$singular}"),
        'update_item'       => __("Update {$singular}"),
        'add_new_item'      => __("Add New {$singular}"),
        'new_item_name'     => __("New {$singular} Name"),
        'menu_name'         => __("{$plural}"),
    );
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false
    );
    register_taxonomy('trails_category', 'trail', $args);
}
add_action( 'init', 'create_trail_category', 0 );

/***************************************************************
 * FAQ Post Type
 ***************************************************************/
function register_faq_post_type() {
    $plural = "FAQ";
    $singular = "FAQs";

    $labels = array(
        'name'               => __( "{$plural}" ),
        'menu_name'          => __( "{$plural}" ),
        'singular_name'      => __( "{$singular}" ),
        'add_new_item'       => __( "Add New {$singular}" ),
        'edit_item'          => __( "Edit {$singular}" ),
        'new_item'           => __( "New {$singular}" ),
        'view_item'          => __( "View {$singular}" ),
        'search_items'       => __( "Search {$plural}" ),
        'not_found'          => __( "No {$plural} found" ),
        'not_found_in_trash' => __( "No {$plural} found in Trash" ),
    );
    $args = array(
        'labels'              => $labels,
        'supports'              => array( 'title', 'editor', 'revisions' ),
        'rewrite'             => array( 'with_front' => false ),
        'capability_type'     => 'post',
        'menu_position'       => 8, // after Posts
        'menu_icon'           => 'dashicons-format-quote',
        'hierarchical'        => false,
        'show_ui'             => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'query_var'           => true,
        'public'              => true,
        'can_export'          => true,
        'show_in_admin_bar'   => true,
    );
    register_post_type('faq', $args);
}
add_action('init', 'register_faq_post_type');

/***************************************************************
 * FAQ Category
 ***************************************************************/

function create_faq_category() {
    $plural = "Categories";
    $singular = "Category";
    $labels = array(
        'name'              => _x("{$plural}", 'taxonomy general name'),
        'singular_name'     => _x("{$singular}", 'taxonomy singular name'),
        'search_items'      => __("Search {$plural}"),
        'all_items'         => __("All {$plural}"),
        'parent_item'       => __("Parent {$singular}"),
        'parent_item_colon' => __("Parent {$singular}:"),
        'edit_item'         => __("Edit {$singular}"),
        'update_item'       => __("Update {$singular}"),
        'add_new_item'      => __("Add New {$singular}"),
        'new_item_name'     => __("New {$singular} Name"),
        'menu_name'         => __("{$plural}"),
    );
    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => false
    );
    register_taxonomy('faq_category', 'faq', $args);
}
add_action( 'init', 'create_faq_category', 0 );
/***************************************************************
 * Page Excerpt
 ***************************************************************/
add_post_type_support( 'page', 'excerpt' );
