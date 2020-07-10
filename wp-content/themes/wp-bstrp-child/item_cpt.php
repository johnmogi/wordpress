<?php

// Our custom post type function
function create_posttype() {
 
    register_post_type( 'items',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Items' ),
                'singular_name' => __( 'Item' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'items'),
            'show_in_rest' => true,
            'menu_icon'           => 'dashicons-buddicons-activity',
            'taxonomies'  => array( 'category' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );




/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Items', 'Post Type General Name', 'wp-bootstrap-starter' ),
            'singular_name'       => _x( 'Item', 'Post Type Singular Name', 'wp-bootstrap-starter' ),
            'menu_name'           => __( 'Items', 'wp-bootstrap-starter' ),
            'parent_item_colon'   => __( 'Parent Item', 'wp-bootstrap-starter' ),
            'all_items'           => __( 'All Items', 'wp-bootstrap-starter' ),
            'view_item'           => __( 'View Item', 'wp-bootstrap-starter' ),
            'add_new_item'        => __( 'Add New Item', 'wp-bootstrap-starter' ),
            'add_new'             => __( 'Add New', 'wp-bootstrap-starter' ),
            'edit_item'           => __( 'Edit Item', 'wp-bootstrap-starter' ),
            'update_item'         => __( 'Update Item', 'wp-bootstrap-starter' ),
            'search_items'        => __( 'Search Item', 'wp-bootstrap-starter' ),
            'not_found'           => __( 'Not Found', 'wp-bootstrap-starter' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'wp-bootstrap-starter' ),
        );
         
    // Set other options for Custom Post Type
         
        $args = array(
            'label'               => __( 'items', 'wp-bootstrap-starter' ),
            'description'         => __( 'Item news and reviews', 'wp-bootstrap-starter' ),
            'labels'              => $labels,
            // Features this CPT supports in Post Editor
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            // You can associate this CPT with a taxonomy or custom taxonomy. 
            'taxonomies'          => array( 'genres' ),
            /* A hierarchical CPT is like Pages and can have
            * Parent and child items. A non-hierarchical CPT
            * is like Posts.
            */ 
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
         
        // Registering your Custom Post Type
        register_post_type( 'items', $args );
     
    }
     
    /* Hook into the 'init' action so that the function
    * Containing our post type registration is not 
    * unnecessarily executed. 
    */
     
    add_action( 'init', 'custom_post_type', 0 );
    ?>