<?php
/**
 * The template for displaying all pages.
 *
 * @package a2n-base
 */

get_header();
?>
    </div>
	<section id="primary" class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="detail-box">
            <div class="heading_container">
            	<h1><?php the_title();?></h1>
            </div>
            <?php while ( have_posts() ) : the_post(); // Loop starts ?>
              <div class="entry-content">
                <?php the_content(); // Loop ends ?>
              </div>
            <?php endwhile;?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();?>
