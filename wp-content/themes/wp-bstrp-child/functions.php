<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

 require_once WP_CONTENT_DIR . '/themes/wp-bstrp-child/item_cpt.php'

?>