<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package daninjafx
 */

get_header();
?>
<section class="section section-page">
  <div id="flickr-photos" class="wp-block-gallery flickr-grid"></div>
  <div class="flickr-footer">
    <a href="https://www.flickr.com/photos/daninjafx/" target="_blank" class="button">Continue on FLICKr</a>
  </div>
</section>
<?php
get_footer();
