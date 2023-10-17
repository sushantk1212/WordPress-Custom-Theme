<?php
/**
 * The template for displaying front page.
 *
 *
 * @package a2n-base
 */

get_header();
?>
    <?php
    define("HOMEPAGE_TEMPLATE", "template-parts/homepage");
    get_template_part( HOMEPAGE_TEMPLATE, 'slider' ); ?>
    </div> <!-- header top ends -->
    <!-- service section -->
    <?php get_template_part( HOMEPAGE_TEMPLATE, 'services' );?>
    <!-- service section ends -->

    <!-- about section -->
    <?php get_template_part( HOMEPAGE_TEMPLATE, 'aboutus' );?>
    <!-- about section ends -->

    <!-- team section -->
    <?php get_template_part( HOMEPAGE_TEMPLATE, 'team' );?>
    <!-- end team section -->

    <!-- client section -->
    <?php get_template_part( HOMEPAGE_TEMPLATE, 'testimonials' );?>
    <!-- end client section -->

  <?php get_footer();?>