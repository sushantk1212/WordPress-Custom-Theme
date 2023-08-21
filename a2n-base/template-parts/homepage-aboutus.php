<?php 
  $page_id = 144;
  $about_page_data = get_post( $page_id );
  $about_page_title = $about_page_data->post_title; // get page title
  $about_page_excerpt = $about_page_data->post_excerpt; // get page excerpt
  $image_attr = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'full'); // get featured image source 
  $about_thumbnail_id = get_post_thumbnail_id( $page_id ); 
  $about_img_alt = get_post_meta($about_thumbnail_id, '_wp_attachment_image_alt', true); // get image alt tag
?> 
<section class="about_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="detail-box pr-md-2">
            <div class="heading_container">
              <h2>
              <?php echo esc_html($about_page_title);?>
              </h2>
            </div>
            <p class="detail_p_mt">
              <?php echo wp_kses_post($about_page_excerpt);?>
            </p>
            <a href="<?php echo esc_url(get_permalink($page_id));?>" 
            title="<?php echo esc_html($about_page_title);?>" rel="bookmark">
            <?php _e('Read More', 'a2n-base');?>
        </a>
          </div>
        </div>
        <div class="col-md-6 px-0">
          <?php if(has_post_thumbnail($page_id)):?>
          <div class="img-box">
              <img src="<?php echo esc_url($image_attr[0]);?>" class="box_img" alt="<?php echo esc_html($about_img_alt);?>" decoding="async" loading="lazy">
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </section>