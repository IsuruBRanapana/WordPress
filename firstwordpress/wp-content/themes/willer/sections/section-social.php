<?php
/**
* section-social.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/
?>

<!-- Facebook -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_facebook_social', true) )):?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_facebook_social' ));?>">
		<i class="item fab fa-facebook"></i></a>
	</li>
<?php endif; ?>
<!-- Twitter -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_twitter_social', true) )):?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_twitter_social' ));?>">
			<i class="item fab fa-twitter"></i></a>
	</li>
<?php endif; ?>
<!-- Google Plus-->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_google_plus_social', true) )) : ?>
	<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_google_plus_social' )); ?>">
		  <i class="item fab fa-google-plus-g"></i></a>
	</li>
<?php endif; ?>
<!-- Dribbble-->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_dribbble_social', true ) )) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_dribbble_social' )); ?>">
			<i class="item fab fa-dribbble"></i></a>
		</li>
<?php endif; ?>
<!-- Tumblr -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_tumblr_social', true ) )) : ?>
			<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_tumblr_social' ));?>">
				<i class="item fab fa-tumblr"></i></a>
			</li>
<?php endif; ?>
<!-- Instagram -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_instagram_social', true ) )) : ?>
			<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_instagram_social' )); ?>">
					<i class="item fab fa-instagram"></i></a>
			</li>
<?php endif; ?>
<!-- Linkedin -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_linkedin_social', true ) )) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_linkedin_social' )); ?>">
					<i class="item fab fa-linkedin"></i></a>
		</li>
<?php endif; ?>
<!-- Youtube -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_youtube_social', true) )) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_youtube_social' )); ?>">
				<i class="item fab fa-youtube-square"></i></a>
		</li>
<?php endif; ?>
<!-- Pinterest -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_pinterest_social',true ) )) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_pinterest_social' )); ?>">
				<i class="item fab fa-pinterest-p"></i></a>
		</li>
<?php endif; ?>
<!-- Flickr -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_flickr_social', true) )) : ?>
		<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_flickr_social' )); ?>">
				<i class="item fab fa-flickr"></i></a>
		</li>
<?php endif; ?>
<!-- Github -->
<?php if ( false == esc_attr( get_theme_mod( 'willer_enable_github_social', true ) )) : ?>
			<li><a href="<?php echo esc_url( get_theme_mod( 'willer_link_github_social' )); ?>">
					<i class="item fab fa-github"></i></a>
			</li>
<?php endif; ?>
