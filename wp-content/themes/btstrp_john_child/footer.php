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

<div class="spacersm"></div>
<a href="#primary" id="top">
<div id="toTop" class="text-center">
	<img id="skew" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png"/>
	חזרה לראש העמוד
</div>
</a>
<div class="spacersm"></div>
<footer id="colophon" class="site-footer text-center bg-dark text-light">
	
	Studio Lavan &copy; <?php echo date("Y"); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/contact.js" ></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/scroll.js" ></script>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
