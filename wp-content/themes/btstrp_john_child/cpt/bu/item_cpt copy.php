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

function diwp_metabox_mutiple_fields(){
 
    add_meta_box(
            'diwp-metabox-multiple-fields',
            'Metabox With Multiple Fields',
            'diwp_add_multiple_fields',
            'items'
        );
}
 
add_action('add_meta_boxes', 'diwp_metabox_mutiple_fields');
 
function diwp_add_multiple_fields(){
 
    global $post;
 
    // Get Value of Fields From Database
    $diwp_textfield = get_post_meta( $post->ID, '_diwp_text_field', true);
    $diwp_radiofield = get_post_meta( $post->ID, '_diwp_radio_field', true);
    $diwp_checkboxfield = get_post_meta( $post->ID, '_diwp_checkbox_field', true);
    $diwp_selectfield = get_post_meta( $post->ID, '_diwp_select_field', true);
    $diwp_textareafield = get_post_meta( $post->ID, '_diwp_textarea_field', true);
     
?>
     
<div class="row">
    <div class="label">Textfield</div>
    <div class="fields"><input type="text" name="_diwp_text_field" value="<?php echo $diwp_textfield; ?>"</div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">Radio Fields</div>
    <div class="fields">
        <label><input type="radio" name="_diwp_radio_field" value="R1" <?php if($diwp_radiofield == 'R1') echo 'checked'; ?> /> Radio Option 1 </label>
        <label><input type="radio" name="_diwp_radio_field" value="R2"  <?php if($diwp_radiofield == 'R2') echo 'checked'; ?> /> Radio Option 2</label>
        <label><input type="radio" name="_diwp_radio_field" value="R3"  <?php if($diwp_radiofield == 'R3') echo 'checked'; ?>/> Radio Option 3</label>
    </div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">Checkbox Fields</div>
    <div class="fields">
        <label><input type="checkbox" name="_diwp_checkbox_field[]" value="C1" <?php if(in_array('C1', $diwp_checkboxfield)) echo 'checked'; ?> /> Checkbox Option 1 </label>
        <label><input type="checkbox" name="_diwp_checkbox_field[]" value="C2" <?php if(in_array('C2', $diwp_checkboxfield)) echo 'checked'; ?>/> Checkbox Option 2</label>
        <label><input type="checkbox" name="_diwp_checkbox_field[]" value="C3" <?php if(in_array('C3', $diwp_checkboxfield)) echo 'checked'; ?>/> Checkbox Option 3</label>
    </div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">Select Dropdown</div>
    <div class="fields">
        <select name="_diwp_select_field">
            <option value="">Select Option</option>
            <option value="1" <?php if($diwp_selectfield == '1') echo 'selected'; ?>>Option 1</option>
            <option value="2" <?php if($diwp_selectfield == '2') echo 'selected'; ?>>Option 2</option>
            <option value="3" <?php if($diwp_selectfield == '3') echo 'selected'; ?>>Option 3</option>
        </select>
    </div>
</div>
 
<br/>
 
<div class="row">
    <div class="label">Textarea</div>
    <div class="fields">
        <textarea rows="5" name="_diwp_textarea_field"><?php echo $diwp_textareafield; ?></textarea>
    </div>
</div>
 
<?php    
}

// Now Save these multiple fields value in the Database
 
function diwp_save_multiple_fields_metabox(){
 
    global $post;
 
 
    if(isset($_POST["_diwp_text_field"])) :
    update_post_meta($post->ID, '_diwp_text_field', $_POST["_diwp_text_field"]);
    endif;
 
    if(isset($_POST["_diwp_radio_field"])) :
    update_post_meta($post->ID, '_diwp_radio_field', $_POST["_diwp_radio_field"]);
    endif;
 
    if(isset($_POST["_diwp_checkbox_field"])) :
    update_post_meta($post->ID, '_diwp_checkbox_field', $_POST["_diwp_checkbox_field"]);
    endif;
 
    if(isset($_POST["_diwp_select_field"])) :
    update_post_meta($post->ID, '_diwp_select_field', $_POST["_diwp_select_field"]);
    endif;
 
    if(isset($_POST["_diwp_textarea_field"])) :
    update_post_meta($post->ID, '_diwp_textarea_field', $_POST["_diwp_textarea_field"]);
    endif;
 
}
 
add_action('save_post', 'diwp_save_multiple_fields_metabox');