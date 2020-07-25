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

// the query
$args=array('post_type' => 'project','posts_per_page'=>7,'orderby'=>'date', 'order'=>'Desc');
$fetchQuery = new WP_Query($args);

if ($fetchQuery->have_posts()) : 
    while ($fetchQuery->have_posts()) : $fetchQuery->the_post(); 
      //  $thumb[]=get_the_thumbnail();
       $thumb[]=get_the_post_thumbnail_url();
    endwhile;
endif;



$projects = get_posts( array( 'post_type' => 'project') ); 
foreach ($projects as $project):
	$title[] = $project->post_title; 
	$content[] = $project->post_content;
	$excerpt[] = $project2->post_excerpt;
endforeach; 

?>
<div class="row col-8 mx-auto">
<div class="col-6">
<div class="homeCard box-1">
<?php echo '<h4 class="box-title">' . $title[1] . '</h4> <hr/>';
echo $excerpt[1] . '<br/>';
echo $content[1]; ?>
<br/>
<a href="<?php get_site_url ?>/projects/<?php echo $title[1] ?>">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png" />
</a>
</div>
<img src="<?php echo $thumb[0]; ?>" alt="<?php echo $title[1]; ?>" width="250" class="homeImage box" />
</div>
<div class="col-6">
<img src="<?php echo $thumb[1]; ?>" alt="<?php echo $title[0]; ?>" width="250" class="homeImage box" />
<div class="homeCard box-2">
<?php
echo '<h4 class="box-title">' . $title[0] . '</h4> <hr/>';
echo $excerpt[0];
echo $content[0];
?>
<br/>
<a href="<?php get_site_url ?>/projects/<?php echo $title[0] ?>">
<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png" />
</a>

</div>
</div>
</div>

	</ul>
</div>

<?php

get_footer();