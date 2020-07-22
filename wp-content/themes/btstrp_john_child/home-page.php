<?php
/**
* Template Name: Home Page
*
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 * @package btstrp_john
 */

get_header();
?>


	<main id="primary" class="site-main">

		
		<?php
		while ( have_posts() ) :
			the_post();
			
			get_template_part( 'template-parts/content', 'home' );
			
			
			
		endwhile; // End of the loop.
		?>

<?php
// To Get Value of Text Field
echo get_post_meta( $items, '_john_meta_box_text_field', true);
 

// To Get Value of Textarea Field
echo get_post_meta( $items, '_john_meta_box_textarea_field', true);
?>
	</main><!-- #main -->

<?php

get_footer();
