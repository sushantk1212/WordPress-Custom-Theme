<?php
    $testimonial_args = array(
        'post_type'      => 'testimonials',
        'posts_per_page' => -1
    );

    $testimonial_query = new WP_Query( $testimonial_args );

if ( $testimonial_query->have_posts() ) : 
    $counter_testi = 0;
?>
<section class="client_section layout_padding">
    <div class="container ">
      <div class="heading_container heading_center">
        <h4>
            <?php esc_html_e('Testimonial', 'a2n-base');?>
        </h4>
        <hr>
      </div>
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
          <div class="carousel-item <?php if($counter_testi === 0): ?>active<?php endif; ?>">
            <div class="row">
              <div class="col-lg-7 col-md-9 mx-auto">
                <div class="client_container ">
                  <?php if(has_post_thumbnail()):?>
                    <div class="img-box">
                        <?php the_post_thumbnail(array(250, 250));?>
                    </div>
                   <?php endif;?>
                  <div class="detail-box">
                    <h5>
                        <?php the_title();?>
                    </h5>
                    <?php the_content();?>
                    <span>
                      <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            $counter_testi++;
            endwhile;
            wp_reset_postdata();
            unset($testimonial_query, $counter_testi);
           ?>
        </div>

        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span>
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span>
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php endif;?>