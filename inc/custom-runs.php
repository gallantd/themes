<?php
function customRunTypes(){
echo 4;
}/***************************************************************
 * Careers Post Type
 ***************************************************************/
function register_trailRace_post_type() {
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
        'supports'              => array( 'title', 'revisions','thumbnail', 'excerpt' ),
        'rewrite'             => array( 'slug' => 'trail-race', 'with_front' => false ),
        'capability_type'     => 'post',
        'menu_position'       => 5, // after Posts
        'menu_icon'           => 'dashicons-admin-users',
        'hierarchical'        => true,
        'show_ui'             => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'public'              => true,
        'can_export'          => true,
        'show_in_admin_bar'   => true,
    );
    register_post_type('Trail Race', $args);
}
add_action('init', 'register_trailRace_post_type');

/***************************************************************
 * Careers Category
 ***************************************************************/

function create_trailRace_category() {
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
    register_taxonomy('trail_race_category', 'career', $args);
}
add_action( 'init', 'create_trailRace_category', 0 );
