<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package write_cv
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'write_cv'); ?></a>

		<header id="masthead" class="site-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				else :
				?>

				<?php
				endif;
				$write_cv_description = get_bloginfo('description', 'display');
				if ($write_cv_description || is_customize_preview()) :
				?>

				<?php endif; ?>
			</div><!-- .site-branding -->
			<div class="header-nav">

				<a href="localhost/projCV/wordpress/accueil-generale"><img src="/projCV/wordpress/wp-content/themes/write_cv/assets/img/Bertolucci.png" alt="logo" id="logo"></a>
				<h1 id="titre">Bertolucci Agency</h1>

			</div>
			<!-- #site-navigation -->
		</header><!-- #masthead -->