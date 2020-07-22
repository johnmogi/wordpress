<?php
/**
 * Template part for displaying page content in homepage.php
 *
 * @link https://developer.wordpress.org/themesbasics/template-hierarchy/
 *
 * @package btstrp_john
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="container-fluid hero jumbotron" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

	<img id="parallaxHero" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="סטודיו לבן | עיצוב ומיתוג קירות" />
	
	</section>

<section class="container-fluid">
	<div class="container">
	<?php
echo get_post_meta( $post->ID, '_john_meta_box_text_field', true);
echo '<br/>';
echo get_post_meta( $post->ID, '_john_meta_box_textarea_field', true);
echo '<br/>';
$image1 = get_post_meta( $post->ID, 'john_meta_box_imagefield', true);

?>
<img alt="sunset" src="<?php echo $image1 ?>" height="150" width="450" border="0" />

<?php
echo get_post_meta( $post->ID, '_john_meta_box_text_field2', true);
echo '<br/>';
echo get_post_meta( $post->ID, '_john_meta_box_textarea_field2', true);
?>
</div>
</section>

	<div class="entry-content">
		<?php
		the_content();

		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'btstrp_john' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
