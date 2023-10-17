<?php
    $team_page_id = 148;
    $team_page_data = get_post( $team_page_id );
    $team_page_title = $team_page_data->post_title; // get page title
    $team_page_excerpt = $team_page_data->post_excerpt; // get page excerpt

    $ourteam_args = array(
        'post_type'      => 'our_team',
        'posts_per_page' => 3
    );

    $ourteam_query = new WP_Query( $ourteam_args );

if ( $ourteam_query->have_posts() ) {
?>
<section class="team_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <?php if(is_front_page()){ ?>
        <h2>
            <?php echo esc_html($team_page_title);?>
        </h2>
        <?php if($team_page_excerpt != null):?>
            <p>
                <?php echo wp_kses_post($team_page_excerpt);?>
            </p>
        <?php endif;?>
        <?php } else { ?>
          <h1>
            <?php echo esc_html($team_page_title);?>
          </h1>
           <?php echo $team_page_data->post_content;?>
        <?php } ?>
      </div>

      <div class="row">
      <?php
        while ( $ourteam_query->have_posts() ) : $ourteam_query->the_post();
        $designation = get_field('designation');
      ?>
        <div class="col-md-4 col-sm-6 mx-auto">
          <div class="box">
            <?php if(has_post_thumbnail()):?>
                <div class="img-box">
                    <?php the_post_thumbnail();?>
                </div>
            <?php endif;?>
            <div class="detail-box">
              <h3>
                <?php the_title();?>
              </h3>
              <?php if($designation != null):?>
                <p>
                  <?php echo esc_html($designation);?>
                </p>
              <?php endif;?>
            </div>
          </div>
        </div>
       <?php
        endwhile;
        wp_reset_postdata();
       ?>
      </div>
    </div>
  </section>
  <?php } ?>