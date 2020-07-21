<?php

// Our custom post type function
function create_posttype() {
    add_theme_support('post-thumbnails');
    add_post_type_support( 'items', 'thumbnail' ); 

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
            'taxonomies'          => array( 'collections' ),
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
            'register_meta_box_cb' => 'item_image_meta_box'

     
        );
         
    }
    function item_image_meta_box() {

        add_meta_box(
            'item-image',
            __( 'Item', 'sitepoint' ),
            'item_image_meta_box_callback'
        );
    
    }
    function item_image_meta_box_callback( $post ) {

        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'item_image_nonce', 'item_image_nonce' );
    
        $value = get_post_meta( $post->ID, '_item_image', true );
    
        echo '<textarea style="width:100%" id="item_image" name="item_image">' . esc_attr( $value ) . '</textarea>';
    }

   
    
    add_action( 'add_meta_boxes', 'item_image_meta_box' );

 ?>