<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package btstrp_john
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<main id = 'primary' class = 'container-fluid hero' style = "background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">

	<?php echo get_post_meta($post->ID, 'about_meta_box_image1', true); ?>
	<div class="entry-content">
		<div class="spacer"></div>
		<div class="col-4 headingText ">


	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
<hr/>

		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'btstrp_john' ),
				'after'  => '</div>',
			)
		);
		?>
		</div>
	</div><!-- .entry-content -->


</article><!-- #post-<?php the_ID(); ?> -->
