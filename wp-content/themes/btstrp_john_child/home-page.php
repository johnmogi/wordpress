<?php require_once( get_stylesheet_directory() . '/form-valid.php' ); ?>


<?php
/**
* Template Name: Home Page
*
*
* @package btstrp_john
*/


get_header();
?>


<main id = 'primary' class = 'site-main'>
<!-- Home page thumbnail: -->

<section class="container-fluid hero jumbotron" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
	<img id="parallaxHero" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="סטודיו לבן | עיצוב ומיתוג קירות" />
	</section>

</main><!-- #main -->

<h2 class = 'font_2 text-center'>פרויקטים נבחרים</h2>
<div class = 'main-projects container'>
<?php
$content = array();
$title  = array();
$excerpt  = array();

// query for pics
$args = array( 'post_type' => 'project', 'posts_per_page'=>6, 'orderby'=>'menu_order', 'order'   => 'DESC', );
$fetchQuery = new WP_Query( $args );

if ( $fetchQuery->have_posts() ) :
while ( $fetchQuery->have_posts() ) : $fetchQuery->the_post();

//  $thumb[] = get_the_thumbnail();
$thumb[] = get_the_post_thumbnail_url();
endwhile;
endif;

$projects = get_posts( array( 'post_type' => 'project', 'orderby'=>'menu_order', 'posts_per_page'=>6, ) );

foreach ( $projects as $project ):
$title[] = $project->post_title;

$excerpt[] = $project->post_excerpt;
$content[] = $project->post_content;
endforeach;

# var_dump( $title, $excerpt );
?>
<div class = 'row mx-auto'>
<div class = 'col-6 px-2'>
<img src = "<?php echo $thumb[0]; ?>" alt = "<?php echo $title[0]; ?>" width = '250' class = 'homeImage box' />
<div class = 'homeCard mx-auto col-10 box-2'>
<?php
echo '<h4 class="box-title">' . $title[0] . '</h4> <hr/>';
echo '<p>' .$excerpt[0] . '</p>';
?>
<br />
<a href = "<?php get_site_url ?>/projects/<?php echo $title[0] ?>">
<img src = '<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png' />
</a>

</div> <!-- home nox-2-->
</div>
<!--col-6 -->

<div class = 'col-6 px-2'>
<div class = 'homeCard mx-auto col-10 box-1'>
<?php echo '<h4 class="box-title">' . $title[1] . '</h4> <hr/>';
echo '<p>' .$excerpt[1] . '</p>';
?>
<br />
<a href = "<?php get_site_url ?>/projects/<?php echo $title[1] ?>">
<img src = '<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png' />
</a>
</div> <!-- home box-3-->
<img src = "<?php echo $thumb[1]; ?>" alt="<?php echo $title[1]; ?>" width = '250' class = 'homeImage box-1' />

</div>
<!--col-6 -->

</div>
<!--row -->

<section class = 'full-size row pt-50'>

<div class = 'homeCard box-3 col-9'>
<?php echo '<h4 class="box-title">' . $title[2] . '</h4> <hr/>';
echo '<p>' .$excerpt[2] . '</p>';
?>
<br />
<a href = "<?php get_site_url ?>/projects/<?php echo $title[2] ?>">
<img src = '<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png' />
</a>
</div>

<img src = "<?php echo $thumb[2]; ?>" alt="<?php echo $title[2]; ?>" width = '250' class = 'homeImage box-3 col-4'" />
</section> <!-- /TEAMBERT -->

<div class=" spacer">
</div>
<section class="full-size row pt-120">

    <img src='<?php echo $thumb[3]; ?>' alt='<?php echo $title[3];?>' width='450' class='homeImage box-4 col-6' />
    <div class="homeCard box-4 col-6">
        <?php echo '<h4 class="box-title">' . $title[3] . '</h4> <hr/>';
echo '<p>' .$excerpt[3] . '</p>';?>
        <br />
        <a href="<?php get_site_url ?>/projects/<?php echo $title[3] ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png" />
        </a>
    </div>

</section>



<section class="full-size row ">
<img src='<?php echo $thumb[4]; ?>' alt='<?php echo $title[4];?>' width='450' class='homeImage box-5 ' />

    <div class="homeCard box-5 col-8">
        <?php echo '<h4 class="box-title">' . $title[4] . '</h4> <hr/>';
echo '<p>' .$excerpt[4] . '</p>';?>
        <br />
        <a href="<?php get_site_url ?>/projects/<?php echo $title[4] ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png" />
        </a>
    </div>

</section>

<section class="full-size row ">
<img src='<?php echo $thumb[5]; ?>' alt='<?php echo $title[5]; ?>' width='250' class='homeImage box' />

    <div class="homeCard box-6 col-8">
        <?php echo '<h4 class="box-title">' . $title[5] . '</h4> <hr/>';
echo '<p>' .$excerpt[5] . '</p>';?>
        <br />
        <a href="<?php get_site_url ?>/projects/<?php echo $title[5] ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow.png" />
        </a>
    </div>

</section>

</div><!-- main-projects -->

<?php
while ( have_posts() ) :
the_post();

get_template_part( 'template-parts/content', 'home' );
endwhile;
// End of the loop.
?>

<?php

get_footer();