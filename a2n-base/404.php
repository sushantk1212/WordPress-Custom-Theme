<?php
/**
 * The template for displaying 404 pages (not found).
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
            	<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'a2n-base' );?></h1>
            </div>
			<div class="entry-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. 
				Maybe try one of the links below or a search?', 'a2n-base' ); ?></p>
			</div>
	      </div>
        </div>
      </div>
    </div>
  </section>
<?php
get_footer();