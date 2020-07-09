https://www.wpbeginner.com/wp-tutorials/how-to-create-custom-post-types-in-wordpress/

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
 
        )
    );
}
---------------------/

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Movies', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentytwenty' ),
        'all_items'           => __( 'All Movies', 'twentytwenty' ),
        'view_item'           => __( 'View Movie', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Movie', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Movie', 'twentytwenty' ),
        'update_item'         => __( 'Update Movie', 'twentytwenty' ),
        'search_items'        => __( 'Search Movie', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'movies', 'twentytwenty' ),
        'description'         => __( 'Movie news and reviews', 'twentytwenty' ),
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
    register_post_type( 'movies', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );