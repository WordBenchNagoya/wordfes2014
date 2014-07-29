<?php
/**
 * コメント一覧
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

if ( post_password_required() ) {
	return;
}


do_action( 'get_comments_template' );

if ( have_comments() ) : ?>
<section id="comments" class="main-block">
	<header class="entry_header">
		<h2 class="entry-title comment-title">
			<?php
			printf( _n( '&ldquo;%2$s&rdquo;への1つの返信があります。', '&ldquo;%2$s&rdquo; への%1$sの返信があります。', get_comments_number(), 'wordfes2014' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?>
		</h2>
	</header>

	<ol class="media-list">
		<?php
		wp_list_comments( array( 'walker' => new ExtendComments ) ); ?>
	</ol>

	<?php
	if ( get_comment_pages_count() > 1
			 && get_option( 'page_comments' ) ) : ?>
	<nav>
		<ul class="pager">
		<?php if ( get_previous_comments_link() ) : ?>
			<li class="previous"><?php previous_comments_link( __( '&larr; 古いコメントを表示', 'wordfes2014' ) ); ?></li>
		<?php endif; ?>
		<?php if ( get_next_comments_link() ) : ?>
			<li class="next"><?php next_comments_link( __( '新しいコメントを表示 &rarr;', 'wordfes2014' ) ); ?></li>
		<?php endif; ?>
		</ul>
	</nav>
	<?php
	endif; ?>

	<?php
	if ( ! comments_open()
			 && ! is_page()
			 && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<div class="alert alert-warning">
		<?php _e( 'コメント欄は閉じています。', 'wordfes2014' ); ?>
	</div>

	<?php
	endif; ?>

	</section><!-- /#comments -->
<?php
endif; ?>

<?php
if ( ! have_comments()
		 && ! comments_open()
		 && ! is_page()
		 && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<section id="comments" class="main-block">
		<div class="alert alert-warning">
			<?php _e( 'コメント欄は閉じています。', 'wordfes2014' ); ?>
		</div>
	</section><!-- /#comments -->
<?php
endif; ?>

<?php if ( comments_open() ) : ?>
<section id="respond" class="main-block">
	<header class="entry_header secondary-border-top ">
		<h2 class="entry-title comment-title sub-title01">
			<?php comment_form_title( __( 'この記事にコメント', 'wordfes2014' ), __( '%s への返信', 'wordfes2014' ) ); ?>
		</h2>
	</header>

	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php
	if ( get_option( 'comment_registration' )
			 && ! is_user_logged_in() ) : ?>

	<p><?php printf( __( 'この記事にコメントするには<a href="%s">ログイン</a>してください。', 'wordfes2014' ), wp_login_url( get_permalink() ) ); ?></p>

	<?php
	else : ?>
	<form action="<?php echo get_option( 'siteurl' ); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php
	if ( is_user_logged_in() ) : ?>
		<p>
			<?php printf( __( '次のユーザーとしてログインしています。<a href="%s/wp-admin/profile.php">%s</a>.', 'wordfes2014' ), get_option( 'siteurl' ), $user_identity ); ?>
			<a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php __('ログアウト', 'wordfes2014' ); ?>"><?php _e( 'ログアウト', 'wordfes2014' ); ?></a>
		</p>
	<?php
	else : ?>
		<div class="form-group">
			<label for="author">
				<?php
				_e( 'お名前', 'wordfes2014' );
				if ( $req ) _e( ' (必須)', 'wordfes2014' ); ?></label>
			<input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr( $comment_author ); ?>" size="22" <?php if ( $req ) echo 'aria-required="true"'; ?>>
		</div>
		<div class="form-group">
			<label for="email">
				<?php _e( 'メールアドレス (非公開)', 'wordfes2014' ); if ( $req ) _e( ' (必須)', 'wordfes2014' ); ?>
			</label>
			<input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="22" <?php if ( $req ) echo 'aria-required="true"'; ?>>
		</div>
		<div class="form-group">
			<label for="url"><?php _e( 'Webサイト', 'wordfes2014' ); ?></label>
			<input type="url" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
		</div>
		<?php
		endif; ?>
		<div class="form-group">
			<label for="comment"><?php _e( 'コメント内容', 'wordfes2014' ); ?></label>
			<textarea name="comment"  class="form-control" rows="5" aria-required="true"></textarea>
		</div>
		<p class="text-center">
			<input name="submit" class="btn btn-default more-link btn-dimensional" type="submit" id="submit" value="<?php _e( 'コメントする', 'wordfes2014' ); ?>">
		</p>
		<?php
		comment_id_fields(); ?>
		<?php
		do_action( 'comment_form', $post->ID ); ?>
	</form>
	<?php
	endif; ?>
</section><!-- /#respond -->
<?php
endif; ?>
