<?php
/**
 * 固定ページ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-contents' ); ?>>

<?php while ( have_posts() ) : the_post(); ?>

	<figure class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</figure>
	<?php
	/**
	 * @see "wordfes2014/templates/content-page.php"
	 */
	get_template_part( 'templates/content', 'page' ); ?>

	<footer class="entry-footer">
		<?php //edit_post_link( __( 'この記事を編集', 'wordfes2014' ), '<span class="btn-default btn edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open()
				 || '0' != get_comments_number() ) :
			comments_template( '/modules/comments.php' );
		endif;
	?>

<?php endwhile; // end of the loop. ?>

</article>
