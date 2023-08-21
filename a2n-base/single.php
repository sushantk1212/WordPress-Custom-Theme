<?php
/**
 * The template for displaying all single posts
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
			<?php while ( have_posts() ) : the_post(); // Loop ?>
			<div class="entry-content">
           		<?php 
					the_content();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					the_post_navigation(
						array(
							'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'sushant-theme' ) . '</span> <span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'sushant-theme' ) . '</span> <span class="nav-title">%title</span>',
						)
					);
				?>
				
			</div>
			<?php endwhile;?>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer();
