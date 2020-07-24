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
    <!-- Home page thumbnail: -->
    <?php
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content', 'home' );
endwhile; // End of the loop.
?>

</main><!-- #main -->

<h2 class="font_2 text-center">פרויקטים נבחרים</h2>
<div class="main-projects">
<?php 
$content = array();
$title  = array();
$excerpt  = array();

$projects = get_posts( array( 'post_type' => 'project') ); 
foreach ($projects as $project):
	$title[] = $project->post_title; 
	$content[] = $project->post_content;
	$excerpt[] = $project2->post_excerpt;
endforeach; 


 var_dump( $title, $excerpt );
 echo '<hr/>';
echo $title[0];
echo $excerpt[0];
echo $content[0];

			 ?>
	</ul>
</div>

<?php

get_footer();