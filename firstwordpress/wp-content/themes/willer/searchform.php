<?php
/**
* searchform.php
*
* @author    Denis Franchi
* @package   Willer
* @version   1.1.2
*/
?>

<form role="search" class="willer-box-search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
  <div class="willer-container-search">
    <input type="willer-search-widget" id="willer-search-widget" placeholder="<?php echo esc_attr__( 'Search for &hellip;', 'willer' ) ?>" value="<?php echo get_search_query() ?>" name="s"/>
    <button class="icon"><i class="fa fa-search"></i></button>
  </div>
</form>



