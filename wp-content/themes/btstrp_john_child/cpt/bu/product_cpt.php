<?php

function my_custom_post_product() {
    $labels = array(
      'name'               => _x( 'Products', 'post type general name' ),
      'singular_name'      => _x( 'Product', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'book' ),
      'add_new_item'       => __( 'Add New Product' ),
      'edit_item'          => __( 'Edit Product' ),
      'new_item'           => __( 'New Product' ),
      'all_items'          => __( 'All Products' ),
      'view_item'          => __( 'View Product' ),
      'search_items'       => __( 'Search Products' ),
      'not_found'          => __( 'No products found' ),
      'not_found_in_trash' => __( 'No products found in the Trash' ), 
 #     'parent_item_colon'  => ’,
      'menu_name'          => 'Products'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'Holds our products and product specific data',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
      'has_archive'   => true,
    );
    register_post_type( 'product', $args ); 
  }
  add_action( 'init', 'my_custom_post_product' );

  function my_updated_messages( $messages ) {
    global $post, $post_ID;
    $messages['product'] = array(
    //   0 => ’, 
      1 => sprintf( __('Product updated. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
      2 => __('Custom field updated.'),
      3 => __('Custom field deleted.'),
      4 => __('Product updated.'),
      5 => isset($_GET['revision']) ? sprintf( __('Product restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
      6 => sprintf( __('Product published. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
      7 => __('Product saved.'),
      8 => sprintf( __('Product submitted. <a target="_blank" href="%s">Preview product</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
      9 => sprintf( __('Product scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
      10 => sprintf( __('Product draft updated. <a target="_blank" href="%s">Preview product</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    );
    return $messages;
  }
  add_filter( 'post_updated_messages', 'my_updated_messages' );
  

  function my_contextual_help( $contextual_help, $screen_id, $screen ) { 
    if ( 'product' == $screen->id ) {
  
      $contextual_help = '<h2>Products</h2>
      <p>Products show the details of the items that we sell on the website. You can see a list of them on this page in reverse chronological order - the latest one we added is first.</p> 
      <p>You can view/edit the details of each product by clicking on its name, or you can perform bulk actions using the dropdown menu and selecting multiple items.</p>';
  
    } elseif ( 'edit-product' == $screen->id ) {
  
      $contextual_help = '<h2>Editing products</h2>
      <p>This page allows you to view/modify product details. Please make sure to fill out the available boxes with the appropriate details (product image, price, brand) and <strong>not</strong> add these details to the product description.</p>';
  
    }
    return $contextual_help;
  }
  add_action( 'contextual_help', 'my_contextual_help', 10, 3 );

  