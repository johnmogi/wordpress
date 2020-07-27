<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id = 'content'>
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package btstrp_john
*/

?>
<!doctype html>
<html <?php language_attributes();
?>>
<head>
<meta charset = "<?php bloginfo( 'charset' ); ?>">
<meta name = 'viewport' content = 'width=device-width, initial-scale=1'>
<link rel = 'profile' href = 'https://gmpg.org/xfn/11'>

<?php wp_head();
?>
<link rel = 'stylesheet' href = 'wp-content/themes/btstrp_john_child/bootstrap-4.5.0-dist/css/bootstrap.min.css' >
<link rel = 'stylesheet' href = '<?php echo get_stylesheet_directory_uri(); ?>/scss/main.css' >

</head>

<body <?php body_class();
?>>
<?php wp_body_open();
?>
<div id = 'page' class = 'site' data-spy = 'scroll' data-target = '#logo' data-offset = '50'>

<header id = 'masthead' class = 'site-header container-fluid'>

<nav class = 'navbar navbar-expand-lg  my-2 my-lg-0' role = 'navigation'>
<div class = 'container'>


 <button class = 'navbar-toggler' type = 'button' data-toggle = 'collapse' data-target = '#navbar-collapse-1' aria-controls = 'navbar-collapse-1' aria-expanded = 'false' aria-label = "<php esc_attr_e( 'Toggle navigation', 'btstrp_john ' ); ?>">
<span class = 'navbar-toggler-icon'></span>
</button> 

<?php
wp_nav_menu( array(
    'theme_location'    => 'menu-1',
    'menu_id'        => 'primary-menu',
    'depth'             => 2,
    'container'         => 'div',
    'container_class'   => 'collapse navbar-collapse',
    'container_id'      => 'navbar-collapse-1',
    'menu_class'        => 'nav navbar-nav',

) );
?>

<a class = 'navbar-brand px-md-5' href = '<?php echo home_url(); ?>'><img id = 'logo' src = '<?php echo get_stylesheet_directory_uri(); ?>/images/logo__sm.png' alt = 'סטודיו לבן | עיצוב ומיתוג קירות' />
</a>
</div>
</nav>

</div>

<!-- #site-navigation -->
</header><!-- #masthead -->
