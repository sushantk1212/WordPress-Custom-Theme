<?php
/**
 * The template for displaying front page.
 *
 *
 * @package a2n-base
 */

get_header();
?>
    <?php get_template_part( 'template-parts/homepage', 'slider' ); ?>
    </div> <!-- header top ends -->
    <!-- service section -->
    <?php get_template_part( 'template-parts/homepage', 'services' );?>
    <!-- service section ends -->

    <!-- about section -->
    <?php get_template_part( 'template-parts/homepage', 'aboutus' );?>
    <!-- about section ends -->

    <!-- team section -->
    <?php get_template_part( 'template-parts/homepage', 'team' );?>
    <!-- end team section -->

    <!-- client section -->
    <?php get_template_part( 'template-parts/homepage', 'testimonials' );?>
    <!-- end client section -->

  <?php get_footer();?>