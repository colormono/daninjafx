<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package daninjafx
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site container">
	
	<header id="masthead" class="site-header">
		<hgroup class="brand">
			<?php the_custom_logo(); ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</hgroup>
		<nav class="nav" role="navigation">
			<div class="nav-toggle"><a href="#"><i class="fas fa-bars"></i></a></div>
			<?php
				wp_nav_menu( array(
					'menu'              => 'menu-1',
					'theme_location'    => 'menu-1',
					'depth'             => 1,
					'container'         => 'div',
					'container_class'   => 'nav-menu',
					'container_id'      => 'navbarNav',
					'menu_class'        => 'nav-primary'
				));
			?>
		</nav>
	</header>

	<div id="content" class="site-content">
