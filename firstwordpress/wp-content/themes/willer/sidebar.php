<?php
/**
* sidebar.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="willer-widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- End #secondary -->
