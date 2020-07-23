<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
}
#do_action(‘wp_enqueue_scripts’, enqueue_parent_styles);
add_filter('use_block_editor_for_post', '__return_false', 10);

// remove version from head
remove_action('wp_head', 'wp_generator');
// remove version from scripts and styles
function remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'remove_version_scripts_styles', 9999);

require_once( get_stylesheet_directory() . '/cpt/project_cpt.php' );

// add image uploader to meta box - on edit page
function aw_include_script() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        wp_enqueue_media();
    }
    wp_enqueue_script( 'awscript', get_stylesheet_directory_uri() . '/js/awscript.js', array('jquery'), null, false );
}
add_action( 'admin_enqueue_scripts', 'aw_include_script' );

// get rid of a jquery err
wp_deregister_script('hoverIntent');


// //build custom meta box, didn't find a way to require include here
// add_action( 'add_meta_boxes', 'cyb_add_metaboxes', 10, 2 ); 
// function cyb_add_metaboxes( $post_type, $post ) {

//    if( $post->ID == get_option( 'page_on_front' ) ) {

//       add_meta_box(
//           'front-page-metabox', 
//           'פרוייקטים לעמוד הבית', 
//           'cyb_front_page_metabox', 
//           'page' );

//    }

// }

// // Metabox callback
// function cyb_front_page_metabox() {
// }