<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package daninjafx
 */

get_header();

echo do_shortcode('[ajax_load_more id="grid-works" container_type="div" css_classes="grid" post_type="post" sticky_posts="true" posts_per_page="6" progress_bar="true" progress_bar_color="000000" images_loaded="true" button_label="More" scroll_distance="100"]');

get_footer();
