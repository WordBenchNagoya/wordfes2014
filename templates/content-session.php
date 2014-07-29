<?php
/**
 * セッション詳細ページ テンプレート
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
		<?php the_title( '<h1 class="entry-title sub-title01">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php //wordfes2014_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
    <h4>セッション内容</h4>
    <?php the_field( 'session_contents' ) ?>
    <h4>こんな人におすすめ</h4>
    <?php the_field( 'session_recommended_person' ) ?>
    <h4>その他</h4>
    <?php the_field( 'session_other' ) ?>
    <h4>スピーカー</h4>
    <?php the_field( 'session_speaker_name' ) ?>
    <h4>スピーカー紹介</h4>
    <?php the_field( 'session_description' ) ?>
    <h4>所属</h4>
    <?php the_field( 'session_speaker_belong' ) ?>
    <?php the_field( 'session_speaker_belong_link' ) ?>
    <?php the_field( 'session_speaker_sns' ) ?>
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
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wordfes2014' );
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
			);
		?>

		<?php edit_post_link( __( '編集', 'wordfes2014' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
