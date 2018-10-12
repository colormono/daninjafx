<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package daninjafx
 */

get_header();
?>
<section class="section section-post">
<?php
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', get_post_type() );

?>

<nav class="nav nav-pagination">
	<?php

		// FOR PREVIOUS POST
		$prev_post = get_previous_post(); 
		$prev_id = $prev_post->ID ;
		$prev_permalink = get_permalink( $prev_id );
		
		// FOR NEXT POST
		$next_post = get_next_post();
		$next_id = $next_post->ID ;
		$next_permalink = get_permalink($next_id);

	?>

	<a href="<?php echo $prev_permalink; ?>" class="pagination-item prev-timeline">
		<?php if ( has_post_thumbnail( $prev_post->ID ) ) { echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); } ?>
		<span class="item-content">
			<i class="fas fa-long-arrow-alt-left"></i>
			<strong><?php echo $prev_post->post_title; ?></strong>
		</span>
	</a>

	<a href="<?php echo $next_permalink; ?>" class="pagination-item next-timeline">
		<span class="item-content">
			<i class="fas fa-long-arrow-alt-right"></i>
			<strong><?php echo $next_post->post_title; ?></strong>
		</span>
		<?php if ( has_post_thumbnail( $next_post->ID ) ) { echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); } ?>
	</a>

	<a href="<?php echo get_home_url(); ?>" class="pagination-item all-timeline">
		<span class="item-content">
			<i class="fas fa-grip-horizontal"></i><br />
			<strong>All works</strong>
		</span>
	</a>

</nav>

<?php
endwhile; // End of the loop.
?>
</section>
<?php
get_footer();
