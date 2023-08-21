<?php
/**
 * The header for our theme
 *
 *
 * @package a2n-base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="hero_area">
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'a2n-base' ); ?></a>
   	<div class="hero_bg_box">
		<img src="<?php bloginfo('template_url')?>/images/hero-bg.jpg" alt="<?php _e('Main banner', 'a2n-base');?>">
	</div>
	
    <!-- header section strats -->
	<?php 
		$theme_options_options = get_option( 'theme_options_option_name' ); // Array of All Options
		$phone_number = $theme_options_options['phone_number']; // Phone number
 		$email_address = $theme_options_options['email_address']; // Email address
	?>
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid header_top_container">

          <div class="contact_nav">
			<?php if(isset($phone_number) && $phone_number != null) : ?>
				<a href="tel:<?php echo $phone_number;?>" title="<?php echo $phone_number;?>">
				<i class="fa fa-phone" aria-hidden="true"></i>
				<span>
					Call : <?php echo $phone_number;?>
				</span>
				</a>
			<?php endif;?>
			<?php if(isset($email_address) && $email_address != null) : ?>
            <a href="mailto:<?php echo sanitize_email($email_address);?>" title="<?php echo sanitize_email($email_address);?>">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
			  	<?php echo sanitize_email($email_address);?>
              </span>
            </a>
			<?php endif;?>
          </div>

          <?php get_template_part( 'template-parts/socialmedia', 'links' );?>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
          	<?php the_custom_logo();?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<nav id="site-navigation" class="main-navigation">
					<?php 
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'fallback_cb'    => false, // Do not fall back to wp_page_menu()
							'menu_class' 	 => 'navbar-nav',
							'container'		 => false
						) );
					?>
				</nav>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
