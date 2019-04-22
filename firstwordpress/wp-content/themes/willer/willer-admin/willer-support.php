<?php
/**
* willer-support.php
* @link https://www.denisfranchi.com
*
* @package Willer
*
*  @version   1.1.2
*/
?>

<div class="willer-image-background-support container" style="background: url('<?php echo esc_url(get_template_directory_uri()).'/images/willer-default.jpg';  ?>'); background-repeat: no-repeat;
background-position: center center;background-size: cover;" >

<div class="text-support">
	<h1><?php esc_html_e( 'Welcome to Willer','willer' ); ?></h1>
	<h5><?php esc_html_e( 'You can customize with one click','willer' ); ?></h5>
</div>
</div>
<!-- Tab links -->
<div class="willer-tab-support">
	<div class="tab">
		<button class="tablinks" onclick="willeropenGuide(event, 'WELCOME')"id="defaultOpen"><?php esc_html_e( 'WELCOME','willer' ); ?></button>
		<button class="tablinks" onclick="willeropenGuide(event, 'GUIDES')"><?php esc_html_e( 'GUIDES','willer' ); ?></button>
		<button class="tablinks" onclick="willeropenGuide(event, 'PRO AVAILABLE')"><?php esc_html_e( 'PRO AVAILABLE','willer' ); ?></button>
	</div>
	<!-- Tab content -->
	<!-- Welcome -->
	<div id="WELCOME" class="tabcontent">
		<h3 class="willer-welkome-support-title"><?php esc_html_e( 'Welcome','willer' ); ?></h3>
		<p class="willer-welkome-support"><?php esc_html_e( 'Thank you for choosing Willer.','willer');?><br>
			<?php esc_html_e('The theme is ready to be used. You can customize everything you want in a few simple clicks directly from the front end.','willer' ); ?>
		  </p>
			<div class="willer-update"><p><b><?php esc_html_e('WILLER: 1.1.2','willer');?></b><br>
			<a target="_blank" class="wl-site" href="<?php echo esc_url( 'https://www.denisfranchi.com/' ); ?>"><?php esc_html_e('Franchi Design','willer'); ?></a>
			</div>
			</p>
	</div>
	<!-- Guides -->
	<div id="GUIDES" class="tabcontent">
		<h3 class="willer-welkome-support-title"><?php esc_html_e( 'Guides','willer' ); ?></h3>
		<p class="willer-welkome-support">
			<?php esc_html_e( 'Here you will find a complete guide to personalize Willer.', 'willer' ); ?><br><br>
				<button class="willer-button-admin-support"><a target="_blank" class="willer-button" href="<?php echo esc_url( 'https://www.denisfranchi.com/blog/2019/01/19/documentation-free-version/' ); ?>"><?php esc_html_e('Documentation','willer'); ?></a>
				</button>
		</p>
		<div class="willer-clear-guide-support-admin"></div>
	</div>
<!-- PRO AVAILABLE -->
<div id="PRO AVAILABLE" class="tabcontent">
	<h3 class="willer-welkome-support-title"><?php esc_html_e('Pro Available','willer'); ?></h3>
	<p class="willer-welkome-support"><?php esc_html_e('Switch to Willer Pro','willer'); ?>
	</p>
		<button class="willer-button-admin-support">
			<a class="willer-button" href="<?php echo esc_url('https://www.denisfranchi.com/willer-theme/'); ?>" target="_blank"><?php esc_html_e('View Pro Theme', 'willer'); ?></a>
		</button>
		<h2 class="wl-text-center"><?php esc_html_e('Comparison','willer');?></h2>
     <!-- Comparation -->
       <div class="comparison">
				<table>
					<thead>
						<tr>
						<th class="tl tl2"></th>
						<th class="product" style="border-top-left-radius: 4px; border-left:0px;"><?php esc_html_e('Free','willer');?><br><?php esc_html_e('Theme','willer');?></th>
						<th class="product" style="border-top-right-radius: 4px"><?php esc_html_e('Pro','willer');?><BR><?php esc_html_e('Theme','willer');?></th>
						</tr>
						<tr>
						<th></th>
						<th class="price-info">
							<div class="price-now"><br>
                            </div>
							</th>
							<th class="price-info">
								<div class="price-now"><span class="price-theme"></span><span class="euro-price-theme"></span>  
									</div>
								</th>
								</tr>
								</thead>
								<tbody>
								<!-- Logo -->
                                <tr>
								 <td></td>
									 <td colspan="3"><?php esc_html_e('Logo Upload','willer');?></td>
							    </tr>
							    <tr class="compare-row">
								 <td><?php esc_html_e('Logo Upload','willer');?></td>
								 <td><span><i class="fa fa-check"></i></span>
								 </td>
								 <td><span><i class="fa fa-check"></i></span></td>
							    </td>
						       </tr>
								<!-- Font Awesome -->
								  <tr>
									<td></td>
									<td colspan="3"><?php esc_html_e('Font Awesome Icons v5','willer');?></td>
								   </tr>
											<tr>
											 <td><?php esc_html_e('Font Awesome Icons v5','willer');?></td>
											  <td><span><i class="fa fa-check"></i></span>
											 </td>
												<td><span><i class="fa fa-check"></i></span></td>
												</td>
											</tr>
											<!-- Ready Retina -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Retina Ready','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Retina Ready','willer');?></td>
												<td><span><i class="fa fa-check"></i></span>
												</td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Responsive -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Responsive Design','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Responsive Design','willer');?></td>
												<td><span><i class="fa fa-check"></i></span>
												</td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Color Change -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Color Change','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Color Change','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span>
												</td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
										<!-- Skins -->
										<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Skins','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Skins','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><?php esc_html_e('3','willer');?></span></td>
											</tr>
											<!-- Font Family -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Font Family','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Font Family','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span>
												</td>
												<td><span><?php esc_html_e('15','willer');?></span></td>
											</tr>
											<!-- Layou setting -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Layout Settings','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Layout Settings','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span>
												</td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
										
											<!--Slider -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Slider','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Slider','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><?php esc_html_e('2','willer');?></span></td>
											</tr>
											<!-- More Widgets -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('More Areas Widgets','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('More Areas Widgets','willer');?></td>
												<td><span><?php esc_html_e('5','willer');?></span></td>
												<td><span><?php esc_html_e('10','willer');?></span></td>
											</tr>
											<!-- Menu types -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Menu Types','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Menu Types','willer');?></td>
												<td><span><?php esc_html_e('1','willer');?></span></td>
												<td><span><?php esc_html_e('2','willer');?></span></td>
											</tr>
											<!-- Menu Image -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Image in Menu','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Image in Menu','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Menu Split -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Spit Menu','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Split Menu','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Preloader -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Preloader','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Preloader','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Percentage reading -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Percentage reading','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Percentage reading','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
												<!-- 404 Custom Page -->
												<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('404 Custom Page','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('404 Custom Page','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Order Section -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Order Section in Homepage','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Order Section in Homepage','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Page Template -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Page Templates','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Page Templates','willer');?></td>
												<td><span><?php esc_html_e('1','willer');?></span></td>
												<td><span><?php esc_html_e('18','willer');?></span></td>
											</tr>
                      	<!-- Post Template -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Post Templates','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Post Templates','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><?php esc_html_e('6','willer');?></span></td>
											</tr>
											<!-- Blog Layout -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Blog Layouts','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Blog Layouts','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><i class="fa fa-check"></i></td>
											</tr>
											<!-- Meta Box -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Meta Box Customized','willer');?></td>
											</tr>
											<tr >
												<td><?php esc_html_e('Meta Box Customized','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><i class="fa fa-check"></i></td>
											</tr>
											<!-- Pop-ip Light Box -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Pop-up Light Box','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Pop-up Light Box','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><i class="fa fa-check"></i></td>
											</tr>
											<!-- Gutenberg -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Gutenberg Compatible','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Gutenberg Compatible','willer');?></td>
												<td><span><i class="fa fa-check"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Portfolio -->
											<tr>
												<td></td>
												<td colspan="4"><?php esc_html_e('Portfolio Template','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Portfolio Template','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><?php esc_html_e('5','willer');?></span></td>
											</tr>
                                            <!-- Effect Hover Portfolio -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Effect Hover Image Portfolio','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Effect Hover Image Portfolio','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><?php esc_html_e('19','willer');?></span></td>
											</tr>
											<!-- About US -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('About US Template','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('About US Template','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Woocommerce compatible -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Woocommerce Complatible','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Woocommerce Complatible','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Woocommerce Template -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Woocommerce Templates','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Woocommerce Templates','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
											<!-- Woocommerce Slider -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Woocommerce Slider','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Woocommerce Slider','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
                      <!-- Editor -->
                      <tr>
                        <td></td>
                        <td colspan="3"><?php esc_html_e('Editor Blocks','willer');?></td>
                      </tr>
                      <tr class="compare-row">
                        <td><?php esc_html_e('Editor Blocks','willer');?></td>
                        <td><span><i class="fas fa-check"></i></span></td>
                        <td><span><i class="fa fa-check"></i></span></td>
                      </tr>
                      <!-- Dropdown Menu -->
                      <tr>
                        <td></td>
                        <td colspan="3"><?php esc_html_e('Dropdown Menu','willer');?></td>
                      </tr>
                      <tr>
                        <td><?php esc_html_e('Dropdown Menu','willer');?></td>
                        <td><span><i class="fa fa-check"></i></i></span></td>
                        <td><span><i class="fa fa-check"></i></span></td>
                      </tr>
                      <!-- Child-Theme Included -->
                      <tr>
                        <td></td>
                        <td colspan="3"><?php esc_html_e('Child-Theme Included','willer');?></td>
                      </tr>
                      <tr class="compare-row">
                        <td><?php esc_html_e('Child-Theme Included','willer');?></td>
                        <td><span><i class="fas fa-times willer-icon-free"></i></span></td>
                        <td><span><i class="fa fa-check"></i></span></td>
                      </tr>
                      <!-- Transition Ready -->
                      <tr>
                        <td></td>
                        <td colspan="3"><?php esc_html_e('Transition Ready','willer');?></td>
                      </tr>
                      <tr>
                        <td><?php esc_html_e('Transition Ready','willer');?></td>
                        <td><span><i class="fa fa-check"></i></span></td>
                        <td><span><i class="fa fa-check"></i></span></td>
                      </tr>
											<!-- Full Support -->
											<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Full support for 12 months','willer');?></td>
											</tr>
											<tr class="compare-row">
												<td><?php esc_html_e('Full support for 12 months','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
												<!-- Full Documentation -->
												<tr>
												<td></td>
												<td colspan="3"><?php esc_html_e('Full Documentation','willer');?></td>
											</tr>
											<tr>
												<td><?php esc_html_e('Full Documentation','willer');?></td>
												<td><span><i class="fas fa-times willer-icon-free"></i></span></td>
												<td><span><i class="fa fa-check"></i></span></td>
											</tr>
										</tbody>
									</table>
								</div>
	</div>
</div>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
