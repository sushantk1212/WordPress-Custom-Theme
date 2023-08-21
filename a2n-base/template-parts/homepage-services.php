<?php 
    $page_id = 146;
    $page_data = get_post( $page_id );
    $parent_page_title = $page_data->post_title; // get page title
    $parent_page_excerpt = $page_data->post_excerpt; // get page excerpt
    $parent_page_content = $page_data->post_content;

    $page_parent_args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        'post_parent'    => 146,
        'order'          => 'ASC',
        'orderby'        => 'menu_order'
    );

    $parent_query = new WP_Query( $page_parent_args );

if ( $parent_query->have_posts() ) : ?>
<section id="primary" class="service_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center ">
        <h1><?php echo esc_html($parent_page_title);?></h1>
        <?php if(is_front_page()){?>
        <p class="col-lg-8 px-0">
            <?php echo wp_kses_post($parent_page_excerpt);?>
        </p>
        <?php } else { ?>
            <?php echo $parent_page_content;?>
        <?php } ?>
      </div>
      <div class="service_container">
        <div class="carousel-wrap">
          <div class="service_owl-carousel owl-carousel">
          <?php while ( $parent_query->have_posts() ) : $parent_query->the_post(); ?>
            <div class="item">
              <div class="box">
                <div class="img-box">
                  <?php the_post_thumbnail();?>
                </div>
                <div class="detail-box">
                  <span>
                    <?php the_title();?>
                  </span>
                  <p>
                    <?php the_excerpt();?>
                  </p>
                </div>
              </div>
            </div>
            <?php 
                endwhile;
                wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>
      <?php if(is_front_page()):?>
      <div class="btn-box">
        <a href="<?php echo esc_url(get_permalink($page_id));?>" 
        title="<?php echo esc_html($parent_page_title);?>" rel="bookmark"> 
            <?php _e('Read More','a2n-base');?>
        </a>
      </div>
      <?php endif;?>
    </div>
  </section>
  <?php endif; ?>