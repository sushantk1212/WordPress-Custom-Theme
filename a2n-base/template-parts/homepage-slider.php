<section class="slider_section ">
      <?php
         $args = array(
            'post_type' => 'homepage_slider',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );
    
        $loop = new WP_Query( $args );
        if($loop-> have_posts()):
            $counter_homeslider = 0;
      ?>
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php while ( $loop->have_posts() ) : $loop->the_post();
            $slider_contact_link = get_field('slider_contact_link');
          ?>
          <div class="carousel-item <?php if($counter_homeslider === 0): ?>active<?php endif; ?>">
            <div class="container ">
              <div class="row">
                <div class="col-lg-10 col-md-11 mx-auto">
                  <div class="detail-box">
                    <span>
                        <?php the_title();?>
                    </span>
                    <?php the_content();?>
                    <?php if(!empty($slider_contact_link)): ?>
                    <div class="btn-box">
                      <a href="<?php echo esc_url($slider_contact_link['url']);?>"
                      class="btn1" target="<?php echo $slider_contact_link['target'];?>"
                      rel="bookmark" title="<?php echo $slider_contact_link['title'];?>">
                      <?php echo $slider_contact_link['title'];?>
                      </a>
                    </div>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            $counter_homeslider++;
            endwhile;
            wp_reset_postdata();
            unset($loop, $counter_homeslider);
            ?>
          
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <?php endif; ?>
    </section>
    <!-- end slider section -->