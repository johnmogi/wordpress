<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}
#do_action(‘wp_enqueue_scripts’, enqueue_parent_styles);

 require_once WP_CONTENT_DIR . '/themes/wp-bstrp-child/cpt/product_cpt.php';
 require_once WP_CONTENT_DIR . '/themes/wp-bstrp-child/cpt/item_cpt.php';

?>
