<?php
  $contact_emailid = get_theme_mod('contact_emailid');
  if( !empty($contact_emailid) ){ ?>
  <div class="infobox">
  <i class="fa fa-envelope"></i><span><b><?php esc_html_e('Email','vstart'); ?></b> 
  <a href="<?php echo esc_url('mailto:'.get_theme_mod('contact_emailid')); ?>"><?php echo esc_html(get_theme_mod('contact_emailid')); ?></a></span>
  </div>
<?php } ?> 
             
  <?php 
    $vstart_fb = get_theme_mod('vstart_fb'); 
    $vstart_twitter  = get_theme_mod('vstart_twitter'); 
    $vstart_in = get_theme_mod('vstart_in');
    $vstart_glplus = get_theme_mod('vstart_glplus');
    $vstart_phone = get_theme_mod('vstart_phone'); 
    $vstart_address_email = get_theme_mod('vstart_address_email');  
  ?>
  <div id="maintopdiv">
  <?php if($vstart_fb || $vstart_twitter || $vstart_in || $vstart_glplus || $vstart_phone || $vstart_address_email) {?>
  <div class="header-top">
  <div class="container">
    <div class="row"> 
        <div class="col-sm-8"> 
          <div class="social-icons">    
              <?php if(get_theme_mod('vstart_fb')){?>
                <a href="<?php echo esc_url(get_theme_mod('vstart_fb','')); ?>" target="_blank" class="fa fa-facebook fa-1x" title="<?php esc_attr_e('Facebook','vstart'); ?>"></a>
              <?php }?>

              <?php if(get_theme_mod('vstart_twitter')){?>
                <a href="<?php echo esc_url(get_theme_mod('vstart_twitter','')); ?>" target="_blank" class="fa fa-twitter fa-1x" title="<?php esc_attr_e('twitter','vstart'); ?>"></a>
              <?php }?>
               
              <?php if(get_theme_mod('vstart_glplus')){?>
                <a href="<?php echo esc_url(get_theme_mod('vstart_glplus','')); ?>" target="_blank" class="fa fa-google-plus fa-1x" title="<?php esc_attr_e('google-plus','vstart'); ?>"></a>
              <?php }?>
                
              <?php if(get_theme_mod('vstart_in')){?>
                <a href="<?php echo esc_url(get_theme_mod('vstart_in','')); ?>" target="_blank" class="fa fa-linkedin fa-1x" title="<?php esc_attr_e('linkedin','vstart'); ?>"></a>
              <?php }?>

                  
          </div> <!--social-icons-->
        </div><!--col-sm-4-->
     <div class="col-sm-4 rightsphone">
      <div class="row">
            <?php if(get_theme_mod('vstart_phone')){?>
                <i class="fa fa-phone"></i> <span class="phno"><?php echo esc_html($vstart_phone);?></span>
            <?php }?>                    
           
            <?php if(get_theme_mod('vstart_address_email')){?>
                    <i class="fa fa-envelope"></i><span class="mailto"><?php echo esc_html($vstart_address_email);?></span>
           <?php }?>         
               <div class="clear"></div>
      </div><!--row-->
    </div><!--col-sm-8 rightsphone-->        
      </div><!--row -->
 </div><!--container-->
</div><!-- header-top -->
 <?php }?>

<section id="main_navigation">
  <div class="main-navigations">
  <div class="container" >
  <div class="row">  
            <div class="col-sm-3 leftlogo">            
                <?php if (display_header_text()==true){?>
                  <div class="logotxt">
                    <h1><a href="<?php echo esc_url( home_url( '/') ); ?>"><?php bloginfo('name'); ?></a></h1>
                    <p><?php bloginfo('description'); ?></p>
                  </div>
                <?php } ?>
            </div> <!--col-sm-3--> 

              <div class="main-navigation-inner col-sm-9 rightmenu">
                  <div class="toggle">
                            <a class="togglemenu" href="#"><?php esc_html_e('Menu','vstart'); ?></a>
                         </div><!-- toggle --> 
                  <div class="sitenav">
                      <?php
                      wp_nav_menu( array(
                      'theme_location' => 'primary'
                      ) );
                      ?>
                        </div><!-- site-nav -->
              </div><!--<div class="row">-->
        </div><!--main-navigation-->
  </div><!--container-->
</div><!--main-navigations-->
</section><!--main_navigation-->
</div><!--maintopdiv-->