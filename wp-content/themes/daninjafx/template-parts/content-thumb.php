<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package daninjafx
 */

?>

<article id="post-<?php the_ID(); ?>"  class="cell">

  <a class="cell-content <?php if (!has_post_thumbnail()) { echo "no-img"; } ?>" href="<?= the_permalink(); ?>">
	<?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); }?>
    <div class="overlay">
      <div class="text">
        <?php the_title( '<strong>', '</strong>' ); ?>
        <?php if ( has_excerpt() ) { the_excerpt(); } ?>
      </div>
    </div>
  </a><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->