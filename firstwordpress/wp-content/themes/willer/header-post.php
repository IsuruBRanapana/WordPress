<?php
/**
* header-post.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!--Backtotop-->
	<?php if ( false == esc_attr(get_theme_mod( 'wl_enable_back_top', false) )) : // Function Customize Enable Back To Top ?>
	<div id="backtop"><i class="fas fa-caret-up"></i></div>
	<?php endif; // End Function Customize Enable Back To Top ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<!--Navbar-->
			<nav class="navbar navbar-expand-md willer-menu" role="navigation">
				<!--Menu header-->
				<div class="container-fluid float-panel willer-container-fluid-navbar" data-top="0" data-scroll="500">
					<!--Logo-->
					<div class="willer-logo-header <?php if ( false == esc_attr(get_theme_mod( 'willer_enable_rotate_logo', true) )) : // Function Customize Enable Rotate Logo ?> rotate <?php endif; ?>">
						<?php the_custom_logo(); ?>
						<div class="willer-description-logo">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
							$willer_description = get_bloginfo( 'description', 'display' );
							if ( $willer_description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_attr($willer_description); /* WPCS: xss ok. */ ?></p>
						</div>
					<?php endif ?>
				</div>
				<!-- Menu right -->
				<?php if ( false == esc_attr(get_theme_mod( 'wl_enable_menu_right', true) )): // Function Customize Enable Menu Right ?>
				<div role='navigation' class="willer-menu-right">
					<div id="willer-menuSocial">
						<input type="checkbox" />
						<i class="fab fa-chrome willer-menu-rotate"></i>
						<div id="willer-menu-right-in">
							<div class="image-menu-willer-about">
								<?php get_template_part( 'sections/section-menuAbout' ); ?>
								<?php if ( false == esc_attr(get_theme_mod( 'wl_enable_social_menu_right', true) )) : // Function Customize Enable Social Menu Right ?>
								<div class="willer-divide-menu-social"></div>
								<div class="willer-social-container">
									<ul class="willer-social-icons-menu-right">
									  <?php get_template_part( 'sections/section','social');?>
									</ul>
								</div>
								<?php endif; // End Function Customize Enable Social Menu Right ?>
							</div>
						</div>
					</div>
				</div>
					<?php endif; // End Function Customize Enable Social Menu Right ?>
				<!--Toggle get grouped for better mobile display-->
				<div id="willer-menu-mobile" data-toggle="collapse" data-target="#willer-menu-header" aria-controls="willer-menu-header" aria-expanded="false" aria-label="Toggle navigation">
					<input type="checkbox" />
					<i class="fab fa-chrome"></i>
				</div>
				<div class="willer-position-menu">
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'primary',
						'depth'             =>  2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'willer-menu-header',
						'menu_class'        => 'nav navbar-nav',
						'after'             => '<div class="willer-divide-menu"></div>',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),) );?>
					</div>
				</div>
			</nav>
		</header><!-- End #masthead -->

		<div id="content" class="site-content willer-container-post">
