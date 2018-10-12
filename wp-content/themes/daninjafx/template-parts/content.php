<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package daninjafx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<!--footer class="entry-footer">
		<?php daninjafx_entry_footer(); ?>
	</footer> .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
