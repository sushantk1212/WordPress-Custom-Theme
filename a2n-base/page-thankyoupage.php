<?php
/**
 * Template Name: Thank you page
 * The template for displaying form submitted thank you page.
 *
 *
 * @package a2n-base
 */

get_header();
?>
  </div>
	<section id="primary" class="about_section layout_padding">
    <?php
      if(isset($_POST['submitform'])){
          $name         = esc_attr($_POST['yourname']);
          $phone_number = absint($_POST['phonenumber']);
          $servicename  = esc_attr($_POST['servicename']);
          $email        = sanitize_email($_POST['email']);
          $message      = esc_attr($_POST['message']);

          global $wpdb;

          $tableContact = $wpdb->prefix . 'contactdetails';

          $dataContact = array(
              'name'   => $name,
              'phonenumber' => $phone_number,
              'servicename'  => $servicename,
              'email'  => $email,
              'message'  => $message,
          );
          $formatContact = array( '%s', '%d', '%s', '%s', '%s' );
          $contactInsert = $wpdb->insert( $tableContact, $dataContact, $formatContact );
      }
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
            <div class="heading_container">
            	<h1><?php the_title();?></h1>
            </div>
            <?php while ( have_posts() ) : the_post();?>
              <div class="entry-content">
                <?php the_content();?>
              </div>
            <?php endwhile;?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();?>