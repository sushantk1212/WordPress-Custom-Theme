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
              <h1>Enquiry Form</h1>
            </div>
            <form action="<?php echo esc_url(get_permalink(208))?>" method="POST">
              <div class="form-row">
                <div class="form-group col">
                  <label for="yourname">Your Name (required):</label>
                  <input type="text" name="yourname" id="yourname" class="form-control" required aria-required="true"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-lg-6">
                  <label for="phonenumber">Phone Number</label>
                  <input type="number" name="phonenumber" id="phonenumber" class="form-control" required aria-required="true"/>
                </div>
                <div class="form-group col-lg-6">
                  <label for="services">Our Services</label>
                  <select name="servicename" id="services" class="form-control wide" required aria-required="true">
                    <option value="selectservice">Select Service</option>
                    <option value="home-welding">Home Welding</option>
                    <option value="machine-welding">Machine Welding</option>
                    <option value="car-welding">Car Welding</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" required aria-required="true"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col">
                  <label for="message">Message</label>
                  <input type="text" name="message" id="message" class="message-box form-control" required aria-required="true"/>
                </div>
              </div>
              <div class="btn_box">
                <button type="submit" name="submitform" title="SEND">
                  Get In Touch
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();?>
