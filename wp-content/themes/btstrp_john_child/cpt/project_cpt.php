<?php

// Our custom post type function
function create_posttype() {
    add_theme_support('post-thumbnails');
    add_post_type_support( 'project', 'thumbnail' ); 

    register_post_type( 'project',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Projects' ),
                'singular_name' => __( 'Project' ),
                'add_new'            => _x( 'Add New', 'project' ),
                'add_new_item'       => __( 'Add New Project' ),
                'edit_item'          => __( 'Edit Project' ),
                'new_item'           => __( 'New Project' ),
                'all_items'          => __( 'All Projects' ),
                'view_item'          => __( 'View Project' ),
                'search_items'       => __( 'Search Projects' ),
                'not_found'          => __( 'No projects found' ),
                'not_found_in_trash' => __( 'No projects found in the Trash' ), 
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'project'),
            'show_in_rest' => true,
            'menu_icon'           => 'dashicons-buddicons-activity',
            'taxonomies'  => array( 'category' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );




function john_meta_box_metabox_mutiple_fields(){
 
    add_meta_box(
            'john_meta_box-metabox-multiple-fields',
            'פרטי הפרוייקט',
            'john_meta_box_add_multiple_fields',
            'project'
        );
}
 
add_action('add_meta_boxes', 'john_meta_box_metabox_mutiple_fields');
 
function john_meta_box_add_multiple_fields(){
 
    global $post;
 
    // Get Value of Fields From Database
   
    $john_meta_box_imagefield = get_post_meta( $post->ID, 'john_meta_box_imagefield', true);
    $john_meta_box_imagefield1 = get_post_meta( $post->ID, 'john_meta_box_imagefield1', true);
    $john_meta_box_imagefield2 = get_post_meta( $post->ID, 'john_meta_box_imagefield2', true);
    $john_meta_box_imagefield3 = get_post_meta( $post->ID, 'john_meta_box_imagefield3', true);
    $john_meta_box_imagefield4 = get_post_meta( $post->ID, 'john_meta_box_imagefield4', true);
?>
     

<div class="row">
    <div class="label">תמונות פרוייקט</div>
    <div class="fields">
    <table>
        <tr>
        <td><a href="#" class="john_meta_box_imagefield_button button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="john_meta_box_imagefield" id="john_meta_box_imagefield" value="<?php echo $john_meta_box_imagefield; ?>" style="width:500px;" /></td>
            <td><img src ="<?php echo $john_meta_box_imagefield; ?>" width=150 /></td>
        </tr>
        <tr>
        <td><a href="#" class="john_meta_box_imagefield_button1 button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="john_meta_box_imagefield1" id="john_meta_box_imagefield1" value="<?php echo $john_meta_box_imagefield1; ?>" style="width:500px;" /></td>
            <td><img src ="<?php echo $john_meta_box_imagefield1; ?>" width=150 /></td>
        </tr>
        <tr>
        <td><a href="#" class="john_meta_box_imagefield_button2 button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="john_meta_box_imagefield2" id="john_meta_box_imagefield2" value="<?php echo $john_meta_box_imagefield2; ?>" style="width:500px;" /></td>
            <td><img src ="<?php echo $john_meta_box_imagefield2; ?>" width=150 /></td>
        </tr>
        <tr>
        <td><a href="#" class="john_meta_box_imagefield_button3 button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="john_meta_box_imagefield3" id="john_meta_box_imagefield3" value="<?php echo $john_meta_box_imagefield3; ?>" style="width:500px;" /></td>
            <td><img src ="<?php echo $john_meta_box_imagefield3; ?>" width=150 /></td>
        </tr>
        <tr>
        <td><a href="#" class="john_meta_box_imagefield_button4 button button-secondary"><?php _e('Upload Image'); ?></a></td>
            <td><input type="text" name="john_meta_box_imagefield4" id="john_meta_box_imagefield4" value="<?php echo $john_meta_box_imagefield4; ?>" style="width:500px;" /></td>
            <td><img src ="<?php echo $john_meta_box_imagefield4; ?>" width=150 /></td>
        </tr>
    </table>
        </div>
</div>

<?php    
}
// Now Save these multiple fields value in the Database
 
function john_meta_box_save_multiple_fields_metabox(){
 
    global $post;

    if(isset($_POST["_john_meta_box_imagefield"])) :
        update_post_meta($post->ID, '_john_meta_box_imagefield', $_POST["_john_meta_box_imagefield"]);
        endif;

    if(isset($_POST["_john_meta_box_imagefield1"])) :
        update_post_meta($post->ID, '_john_meta_box_imagefield1', $_POST["_john_meta_box_imagefield1"]);
        endif;
        if(isset($_POST["_john_meta_box_imagefield2"])) :
            update_post_meta($post->ID, '_john_meta_box_imagefield2', $_POST["_john_meta_box_imagefield2"]);
            endif;
            if(isset($_POST["_john_meta_box_imagefield3"])) :
                update_post_meta($post->ID, '_john_meta_box_imagefield3', $_POST["_john_meta_box_imagefield3"]);
                endif;
                if(isset($_POST["_john_meta_box_imagefield4"])) :
                    update_post_meta($post->ID, '_john_meta_box_imagefield4', $_POST["_john_meta_box_imagefield4"]);
                    endif;
}
 
function aw_save_postdata($post_id){
 if (array_key_exists('john_meta_box_imagefield', $_POST)) {
	 update_post_meta(
		 $post_id,
		 'john_meta_box_imagefield',
		 $_POST['john_meta_box_imagefield']
	 );
 }
}

function aw_save_postdata2($post_id){
    if (array_key_exists('john_meta_box_imagefield1', $_POST)) {
        update_post_meta(
            $post_id,
            'john_meta_box_imagefield1',
            $_POST['john_meta_box_imagefield1']
        );
    }
   }

   function aw_save_postdata3($post_id){
    if (array_key_exists('john_meta_box_imagefield2', $_POST)) {
        update_post_meta(
            $post_id,
            'john_meta_box_imagefield2',
            $_POST['john_meta_box_imagefield2']
        );
    }
   }
   function aw_save_postdata4($post_id){
    if (array_key_exists('john_meta_box_imagefield3', $_POST)) {
        update_post_meta(
            $post_id,
            'john_meta_box_imagefield3',
            $_POST['john_meta_box_imagefield3']
        );
    }
   }
   function aw_save_postdata5($post_id){
    if (array_key_exists('john_meta_box_imagefield4', $_POST)) {
        update_post_meta(
            $post_id,
            'john_meta_box_imagefield4',
            $_POST['john_meta_box_imagefield4']
        );
    }
   }
add_action('save_post', 'aw_save_postdata');
add_action('save_post', 'aw_save_postdata2');
add_action('save_post', 'aw_save_postdata3');
add_action('save_post', 'aw_save_postdata4');
add_action('save_post', 'aw_save_postdata5');

add_action('save_post', 'john_meta_box_save_multiple_fields_metabox');
