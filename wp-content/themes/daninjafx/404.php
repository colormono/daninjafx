<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package daninjafx
 */

get_header();
?>

<section id="not-found" class="section error-404">
	<h1><?php esc_html_e( 'Oops! This page can&rsquo;t be found.', 'daninjafx' ); ?></h1>
</section>

<?php
get_footer();
