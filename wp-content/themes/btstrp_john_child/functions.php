<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
   wp_enqueue_style( 'wp-bootstrap-starter-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
   wp_enqueue_style( 'wp-bootstrap-starter-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' );
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

if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
    // File does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // File exists... require it.
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}