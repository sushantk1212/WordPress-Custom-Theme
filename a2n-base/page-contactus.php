<?php
/**
 * Template Name: Contact Us
 * The template for displaying contact us page.
 * @package a2n-base
 */

get_header();
?>
  </div>
	<section id="primary" class="contact_section">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-6 px-0">
          <?php if(has_post_thumbnail()): // check if page has featured image ?>
            <div class="img-box ">
              <?php the_post_thumbnail( 'full', array( 'class' => 'box_img' ) );?>
            </div>
          <?php endif;?>
        </div>
        <div class="col-md-5 mx-auto">
          <div class="form_container">
            <div class="heading_container heading_center">
              <h1><?php the_title();?></h1>
            </div>
            <form action="<?php echo esc_url(get_permalink(208))?>" method="POST">
              <div class="form-row">
                <div class="form-group col">
                  <label for="yourname"><?php _e("Your Name (required):", "a2n-base");?></label>
                  <input type="text" name="yourname" id="yourname" class="form-control" required aria-required="true"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="phonenumber"><?php _e("Phone Number", "a2n-base");?></label>
                  <input type="number" name="phonenumber" id="phonenumber" class="form-control" required aria-required="true"/>
                </div>
                <div class="form-group col-lg-6">
                  <label for="services"><?php _e("Our Services", "a2n-base");?></label>
                  <select name="servicename" id="services" class="form-control wide" required aria-required="true">
                    <option value="selectservice"><?php _e("Select Service", "a2n-base");?></option>
                    <option value="home-welding"><?php _e("Home Welding", "a2n-base");?></option>
                    <option value="machine-welding"><?php _e("Machine Welding", "a2n-base");?></option>
                    <option value="car-welding"><?php _e("Car Welding", "a2n-base");?></option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <label for="email"><?php _e("Email", "a2n-base");?></label>
                  <input type="email" name="email" id="email" class="form-control" required aria-required="true"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <label for="message"><?php _e("Message", "a2n-base");?></label>
                  <input type="text" name="message" id="message" class="message-box form-control" required aria-required="true"/>
                </div>
              </div>
              <div class="btn_box">
                <button type="submit" name="submitform" title="Get In Touch">
                  <?php _e("Get In Touch", "a2n-base");?>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();?>
