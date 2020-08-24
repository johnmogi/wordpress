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




<div class="form-sticky">
 
    <div class="form-sticky-footer row">
        <div class="col mob-order-1 text-center">
            <button type="button" class="btn btn-dark open-form-sticky">השאר/י פרטים</button>
        </div>
        <div class="col mob-order-2 text-center">
            <button type="button" href="tel:050-938-2456" class="btn btn-dark button-mobile">חייג/י עכשיו</button>
        </div>
	</div>
	
    <div class="form-sticky-wrap">
	<button type="button" rel="nofollow" class="turnoff-form-sticky"> X </button>

	
	<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="10"]'); ?>
</div>
	
</div>

<style>
	.form-sticky {
		max-width:310px;
    left: 0;
    position: fixed;
    width: 100%;
    z-index: 99;
    bottom: 0;
    padding: 10px;
	background-color: #793b79;
	}
	.form-sticky-wrap{
		display:none;
					height:0;
					opacity: 0;
    -moz-transition: opacity 0.4s ease-in-out;
    -o-transition: opacity 0.4s ease-in-out;
    -webkit-transition: opacity 0.4s ease-in-out;
    transition: opacity 0.4s ease-in-out;

	}

	 .form-sticky .btn {
    width: 100%;
    text-align: center;
    padding: 10px;
    background: #000;
    border: 1px solid #000;
    font-weight: 400;
    color: #fff;
    font-size: 22px;
	line-height: 26px;
	}
				.form-sticky-wrap.turnoff{
					display:block;
		height:100%;
		opacity: 1;
				}

		.button-mobile{
			display:none;
		}
		.mob-order-2{
			max-width: 0;
    padding: 0;
}
		}
		@media only screen and (max-width: 781px) {
			.button-mobile{
			display:block;
		}
		.mob-order-2{
			max-width: 100%;
	padding: initial;
	display:block;
}
		.form-sticky {
		max-width:100%;
		}
		}
	</style>

<script>
	$('.trigger, .open-form-sticky').click(function() {
  $('.form-sticky-wrap').toggleClass('turnoff');
});
</script>


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
