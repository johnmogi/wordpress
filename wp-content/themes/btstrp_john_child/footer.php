<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package btstrp_john
 */

?>


<div id="toTop" class="text-center">
<a href="#primary">
	<img id="skew" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png"/>
	חזרה לראש העמוד
</a>
</div>

	<footer id="colophon" class="site-footer text-center bg-dark text-light">
	
	Studio Lavan &copy; <?php echo date("Y"); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scroll.js" />
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
