<?php
/**
 * スタッフブログ詳細 テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-block' ); ?>>

	<header class="entry-header">
		<h1 class="sub-title01 entry-title">
			<time class="title-date"><?php echo get_the_date( 'Y-m-d' ); ?></time>
			<?php the_title(); ?>
		</h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php do_shortcode( '' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wordfes2014' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'wordfes2014' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'wordfes2014' ) );

			if ( ! wordfes2014_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wordfes2014' );
				} else {
					// $meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wordfes2014' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wordfes2014' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wordfes2014' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			); ?>

			<?php wordfes2014_post_nav(); ?>

		<?php
		if ( is_user_logged_in() ) { ?>
			<hr>
			<?php edit_post_link( __( 'この記事を編集', 'wordfes2014' ), '<span class="edit-link btn-default btn">', '</span>' ); ?>
		<?php
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
