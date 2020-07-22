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
            'register_meta_box_cb' => 'item_title_meta_box',
            'register_meta_box_cb' => 'item_desc_meta_box'
     
        );
         
    }
    function item_title_meta_box() {
        add_meta_box(
            'item-title-field',
            __( 'כותרת ראשית לפרוייקט', 'btstrp_john' ),
            'item_title_meta_box_callback'
        );
    }
    function item_desc_meta_box() {
        add_meta_box(
            'item-desc-field',
            __( 'טקסט ראשי', 'btstrp_john' ),
            'item_desc_meta_box_callback'
        );
    }
    function item_title_meta_box_callback( $post ) {

        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'item_title_nonce', 'item_title_nonce' );
    
        $value = get_post_meta( $post->ID, '_item_title', true );
        $content   = '';
        $editor_id = 'titleditor';
         
       // echo wp_editor( $content, $editor_id )  . esc_attr( $value ) ;

      echo '<textarea style="width:100%" id="item_title" name="item_title">' . esc_attr( $value ) . '</textarea>';
    }
    function item_desc_meta_box_callback( $post ) {

        // Add a nonce field so we can check for it later.
        wp_nonce_field( 'item_desc_nonce', 'item_desc_nonce' );
    
        $value = get_post_meta( $post->ID, '_item_desc', true );
        $content   = '';
        $editor_id = 'desceditor';
         
       // echo wp_editor( $content, $editor_id )  . esc_attr( $value ) ;

      echo '<textarea style="width:100%; height:100px;" id="item_desc" name="item_desc">' . esc_attr( $value ) . '</textarea>';
    }
   
    
    add_action( 'add_meta_boxes', 'item_title_meta_box' );
    add_action( 'add_meta_boxes', 'item_desc_meta_box' );

    /**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id
 */
function save_item_title_meta_box_data( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['item_title_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['item_title_nonce'], 'item_title_nonce' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    }
    else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['item_title'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['item_title'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, '_item_title', $my_data );
}

add_action( 'save_post', 'save_item_title_meta_box_data' );

 ?>

<?php
function item_title_before_post( $content ) {

global $post;

// retrieve the global notice for the current post
$item_title = esc_attr( get_post_meta( $post->ID, '_item_title', true ) );

$notice = "<div class='sp_item_title'>$item_title</div>";

return $notice . $content;

}

add_filter( 'the_content', 'item_title_before_post' );

/**
 * let's make it shorter :
 *
 * @param int $post_id
 */
function save_item_desc_meta_box_data( $post_id ) {
    if ( ! isset( $_POST['item_desc_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['item_desc_nonce'], 'item_desc_nonce' ) ) {
        return;
    }
 if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    }
    else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }
    if ( ! isset( $_POST['item_desc'] ) ) {
        return;
    }
    $my_data = sanitize_text_field( $_POST['item_desc'] );
    update_post_meta( $post_id, '_item_desc', $my_data );
}
add_action( 'save_post', 'save_item_desc_meta_box_data' );
 ?>
<?php
function item_desc_before_post( $content ) {
global $post;
$item_desc = esc_attr( get_post_meta( $post->ID, '_item_desc', true ) );
$notice = "<div class='sp_item_desc'>$item_desc</div>";
return $notice . $content;
}
add_filter( 'the_content', 'item_desc_before_post' );




