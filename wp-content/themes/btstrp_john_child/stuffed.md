<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$btstrp_john_description = get_bloginfo( 'description', 'display' );
			if ( $btstrp_john_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $btstrp_john_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->


		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
          'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
          'container'       => 'div',
          'container_class' => 'collapse navbar-collapse',
          'container_id'    => 'bs-example-navbar-collapse-1',
          'menu_class'      => 'navbar-nav mr-auto',
				)
			);
			?>



		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'btstrp_john' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>


function wporg_add_custom_box()
{
    $screens = ['post', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',           // Unique ID
            'Custom Meta Box Title',  // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
add_action('add_meta_boxes', 'wporg_add_custom_box');




----------------/* was working on cpt items


function john_meta_box_metabox_mutiple_fields(){
 
    add_meta_box(
            'john_meta_box-metabox-multiple-fields',
            'פרוייקטים לעמוד הבית',
            'john_meta_box_add_multiple_fields',
            'items'
        );
}
 
add_action('add_meta_boxes', 'john_meta_box_metabox_mutiple_fields');
 
function john_meta_box_add_multiple_fields(){
 
    global $post;
 
    // Get Value of Fields From Database
    $john_meta_box_textfield = get_post_meta( $post->ID, '_john_meta_box_text_field', true);
    $john_meta_box_textareafield = get_post_meta( $post->ID, '_john_meta_box_textarea_field', true);
    $john_meta_box_imagefield = get_post_meta( $post->ID, 'john_meta_box_imagefield', true);

    $john_meta_box_textfield2 = get_post_meta( $post->ID, '_john_meta_box_text_field2', true);
    $john_meta_box_textareafield2 = get_post_meta( $post->ID, '_john_meta_box_textarea_field2', true);
     
?>
     
<div class="row">
    <div class="label">כותרת ראשית</div>
    <div class="fields"><input type="text" name="_john_meta_box_text_field" value="<?php echo $john_meta_box_textfield; ?>"</div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">טקסט מורחב</div>
    <div class="fields">
        <textarea rows="5" name="_john_meta_box_textarea_field"><?php echo $john_meta_box_textareafield; ?></textarea>
    </div>
</div>
 
<div class="row">
    <div class="label">תמונת פרוייקט</div>
    <div class="fields">
    <table>
        <tr>
        <td><a href="#" class="john_meta_box_imagefield_button button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="john_meta_box_imagefield" id="john_meta_box_imagefield" value="<?php echo $john_meta_box_imagefield; ?>" style="width:500px;" /></td>
            <td><img src ="<?php echo $john_meta_box_imagefield; ?>" width=150 /></td>
        </tr>
    </table>
        </div>
</div>
<hr/>

<div class="row">
    <div class="label">כותרת ראשית</div>
    <div class="fields"><input type="text" name="_john_meta_box_text_field2" value="<?php echo $john_meta_box_textfield2; ?>"</div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">טקסט מורחב</div>
    <div class="fields">
        <textarea rows="5" name="_john_meta_box_textarea_field2"><?php echo $john_meta_box_textareafield2; ?></textarea>
    </div>
</div>
<?php    
}

// Now Save these multiple fields value in the Database
 
function john_meta_box_save_multiple_fields_metabox(){
 
    global $post;
 
 
    if(isset($_POST["_john_meta_box_text_field"])) :
    update_post_meta($post->ID, '_john_meta_box_text_field', $_POST["_john_meta_box_text_field"]);
    endif;
 
    if(isset($_POST["_john_meta_box_textarea_field"])) :
    update_post_meta($post->ID, '_john_meta_box_textarea_field', $_POST["_john_meta_box_textarea_field"]);
    endif;
 
    if(isset($_POST["_john_meta_box_imagefield"])) :
        update_post_meta($post->ID, '_john_meta_box_imagefield', $_POST["_john_meta_box_imagefield"]);
        endif;
     
    
    if(isset($_POST["_john_meta_box_text_field2"])) :
        update_post_meta($post->ID, '_john_meta_box_text_field2', $_POST["_john_meta_box_text_field2"]);
        endif;
     
        if(isset($_POST["_john_meta_box_textarea_field2"])) :
        update_post_meta($post->ID, '_john_meta_box_textarea_field2', $_POST["_john_meta_box_textarea_field2"]);
        endif;
}
 
function aw_save_postdata($post_id)
{
    if (array_key_exists('john_meta_box_imagefield', $_POST)) {
        update_post_meta(
            $post_id,
            'john_meta_box_imagefield',
            $_POST['john_meta_box_imagefield']
        );
    }
}
add_action('save_post', 'aw_save_postdata');

add_action('save_post', 'john_meta_box_save_multiple_fields_metabox');


// debug: 
print_r($thumb);
print_r($fetchQuery);
