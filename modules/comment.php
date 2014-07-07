<?php
/**
 * コメント モジュール
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
echo get_avatar( $comment, $size = '64' ); ?>
<div class="media-body">
	<h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4>
	<time datetime="<?php echo comment_date( 'c' ); ?>">
		<a href="<?php echo esc_html( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php printf( __( '%1$s', 'wordfes2014' ), get_comment_date(),  get_comment_time() ); ?></a></time>
	<?php edit_comment_link( __( '(編集)', 'wordfes2014' ), '', '' ); ?>

	<?php if ( $comment->comment_approved == '0' ) : ?>
		<div class="alert alert-info">
			<?php _e( 'あなたのコメントは管理者の承認待ちです。', 'wordfes2014' ); ?>
		</div>
	<?php endif; ?>

<?php comment_text(); ?>
<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div>
