<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/style.css' );
 # wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri().'/font/Alef-Webfont/stylesheet.css' );
 # wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri().'./bootstrap-4.5.0-dist/css/bootstrap.min.css.map' );
}
#do_action(‘wp_enqueue_scripts’, enqueue_parent_styles);

add_filter('use_block_editor_for_post', '__return_false', 10);



// remove version from head
remove_action('wp_head', 'wp_generator');

// remove version from rss
add_filter('the_generator', '__return_empty_string');

// remove version from scripts and styles
function remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'remove_version_scripts_styles', 9999);
add_filter('script_loader_src', 'remove_version_scripts_styles', 9999);

require_once( get_stylesheet_directory() . '/cpt/item_cpt.php' );



