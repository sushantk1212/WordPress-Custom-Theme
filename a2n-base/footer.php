<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package a2n-base
 */
?>

	<!-- info section -->
	<footer>
	<section class="info_section">
		<?php 
			$theme_options_options = get_option( 'theme_options_option_name' ); // Array of All Options
			$location = $theme_options_options['location']; // Location
			$phone_number = $theme_options_options['phone_number']; // Phone number
			$company_info = $theme_options_options['company_info']; // Company Info
			$services_info = $theme_options_options['services_info']; // Services Info
			$useful_links_heading = $theme_options_options['useful_links_heading']; // Useful links heading
			$company_heading = $theme_options_options['company_heading']; // Company heading
			$location_heading = $theme_options_options['location_heading']; // location heading
			$services_heading = $theme_options_options['services_heading']; // Services heading
			$copyright_text = $theme_options_options['copyright_text']; // Copyright text
		?>
    <div class="container">
      <div class="info_top">
        <div class="row">
          <div class="col-md-4">
             <?php the_custom_logo();?>
          </div>
          <div class="col-md-4">
            <div class="info_contact">
              <a href="<?php echo esc_url($location);?>" title="<?php echo esc_url($location);?>" target="_blank" rel="nofollow">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                 <?php echo esc_html($location_heading);?>
                </span>
              </a>
              <a href="tel:<?php echo $phone_number;?>" title="<?php echo $phone_number;?>">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
					<?php echo $phone_number;?>
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-4">
		 	 <?php get_template_part( 'template-parts/socialmedia', 'links' );?>
          </div>
        </div>
      </div>
      <div class="info_bottom">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="info_detail">
              <h5>
                <?php echo esc_html($company_heading);?>
              </h5>
              <p>
                <?php echo esc_html($company_info);?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="info_detail">
              <h5>
			  <?php echo esc_html($services_heading);?>
              </h5>
              <p>
                <?php echo esc_html($services_info);?>
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <h5>
            	<?php echo esc_html($useful_links_heading);?>
			</h5>
           	<?php 
				wp_nav_menu( array(
					'theme_location' => 'footer_menu',
					'fallback_cb'    => false, // Do not fall back to wp_page_menu()
					'menu_class' 	 => 'info_menu',
					'container'		 => false
				) );
			?>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->

  <!-- Copyright section starts -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> <?php echo esc_html($copyright_text);?>
      </p>
    </div>
   </section> 
   <!-- Copyright section ends -->	
  </footer>
  <!-- footer section -->

<?php wp_footer(); ?>

</body>
</html>
