<?php
 $vstart_copyright = get_theme_mod('vstart_copyright');
 $vstart_design = get_theme_mod('vstart_design');  
?>
<?php if($vstart_copyright || $vstart_design){?>
<div class="footer-bottom">

  <div class="container">

    <div class="row">

      <div class="col-sm-6 col-xs-6">

        <div class="copyright text-left">

          
            <?php if(get_theme_mod('vstart_copyright')){?>
              <?php echo esc_html($vstart_copyright);?>
            <?php }?>         
        </div><!--copyright-->

      </div>

      <div class="col-sm-6 col-xs-6">

        <div class="design text-right">
          
            <?php if(get_theme_mod('vstart_design')){?>
              <?php echo esc_html($vstart_design);?>
            <?php }?>

        </div><!--design-->

      </div><!--col-sm-6-->

    </div><!--row-->

  </div><!--container-->

</div><!--footer-bottom-->
<?php }?>