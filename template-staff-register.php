<?php
/*
Template Name: スタッフ登録テンプレート
*/
/**
 * =====================================================
 * スタッフ登録テンプレート
 * @package    WordPress
 * @subpackage
 * @author     WordBench Nagoya
 * @license    http://opensource.org/licenses/MIT
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
if ( $_GET['protected'] !== 'BaxC4ZgP2GTYMEBYttDUrxiFmMVYrR' ) {
	wp_die( '見てはいけない所を見てます。' );
}
$message = '';

function staff_register_error( $error_code ){

	if ( ! is_numeric( $error_code ) ) {

	}

}

function verify_staff_register( $nonce, $action ){

	// wpnonce create.
	$verify_nonce = 0;

	if ( $nonce ) {
		$verify_nonce = wp_verify_nonce( esc_attr( $nonce ), __FILE__ );
	}

	if ( 'staff_register' !== $_POST['action'] ) {
		$verify_nonce = 0;
	}

	return $verify_nonce;

}

/**
 * [staff_register_post description]
 * @param  [type] $staff_name         [description]
 * @param  [type] $staff_charge       [description]
 * @param  [type] $staff_twitter_url  [description]
 * @param  [type] $staff_facebook_url [description]
 * @param  [type] $staff_comment      [description]
 * @return [type]                     [description]
 */
function staff_register_post( $staff_name, $staff_charge, $staff_twitter_url, $staff_facebook_url, $staff_comment ){

	$message = '<div class="alert alert-danger">登録に失敗しました。<br />  <a href="mailto:info@wordfes.org">info@wordfes.org</a> まで連絡してください。</div>';

	if ( ! verify_staff_register( $_POST['_wp_nonce'], $_POST['action']  ) ) {
		return $message;
	}


	$post = array(
	  'post_status' => 'draft',
	  'post_title' => esc_attr( $staff_name ),
	  'post_type' => 'staff',
	);

	$post_id = wp_insert_post( $post );

	if ( $post_id ) {

		$staff_charge       = isset( $staff_charge )       ? esc_attr( $staff_charge )       : '';
		$staff_twitter_url  = isset( $staff_twitter_url )  ? esc_attr( $staff_twitter_url )  : '';
		$staff_facebook_url = isset( $staff_facebook_url ) ? esc_attr( $staff_facebook_url ) : '';
		$staff_comment      = ( isset( $staff_comment ) )  ? esc_attr( $staff_comment )      : '';

		update_post_meta( $post_id, 'staff_charge',       $staff_charge );
		update_post_meta( $post_id, 'staff_twitter_url',  $staff_twitter_url );
		update_post_meta( $post_id, 'staff_facebook_url', $staff_facebook_url );
		update_post_meta( $post_id, 'staff_comment',      $staff_comment );

		$message = '<div class="alert alert-info">正常に登録されました。</div>';

	} else {

		$message = '<div class="alert alert-danger">登録に失敗しました。<br /><a href="mailto:info@wordfes.org">info@wordfes.org</a> まで連絡してください。</div>';

	}

	return $message;

}

if ( $_POST['confirm'] && $_POST['staff_name'] && $_POST['staff_charge'] && $_POST['staff_twitter_url'] && $_POST['staff_facebook_url'] && $_POST['staff_comment'] ) {

	$message = staff_register_post( $_POST['staff_name'], $_POST['staff_charge'], $_POST['staff_twitter_url'], $_POST['staff_facebook_url'], $_POST['staff_comment'] );

} else {

	$message = '<div class="alert alert-danger">必要情報を入力して下さい。</div>';

}
?>
<div class="post-contents">
	<div class="main-block">
	<?php
	if ( $message !== '' ) {
		echo $message;
	}
	the_content();
	?>
		<form class="form-horizontal" action="<?php echo site_url( '/staff-register?protected=BaxC4ZgP2GTYMEBYttDUrxiFmMVYrR' ) ?>" role="form" method="post">
		  <div class="form-group">
		    <label for="charge" class="col-sm-3 control-label">お名前
		    </label>
		    <div class="col-sm-9">
		      <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="名前を入力してください。">
			    <small>※ 例 : 田中 太郎</small>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="staff_charge" class="col-sm-3 control-label">担当
		    </label>
		    <div class="col-sm-9">
		      <input type="text" name="staff_charge" class="form-control" id="staff_charge" placeholder="担当を入力してください。">
			    <small>※ 例 : サイト制作</small>
		    </div>

		  </div>
		  <div class="form-group">
		    <label for="staff_twitter_url" class="col-sm-3 control-label">TwiiterアカウントURL
		    </label>
		    <div class="col-sm-9">
		      <input type="text" name="staff_twitter_url" class="form-control" id="staff_twitter_url" placeholder="TwiiterアカウントURLを入力してください。">
			    <small>※ 例 : https://twitter.com/1shiharaT</small>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="staff_facebook_url" class="col-sm-3 control-label">FacebookアカウントURL
		    </label>
		    <div class="col-sm-9">
		      <input type="text" name="staff_facebook_url" class="form-control" id="staff_facebook_url" placeholder="FacebookアカウントURLを入力してください。">
			    <small>※ 例 : https://www.facebook.com/saori.yamada.758</small>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="staff_comment" class="col-sm-3 control-label">一言紹介文</label>
		    <div class="col-sm-9">
		    	<textarea type="text" name="staff_comment" class="form-control" id="staff_comment"></textarea>
		    	<small>※ 56文字以内でお願い致します。</small>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox" name="confirm" value="true"> 入力内容を確認後、チェックを入れて下さい。
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-9">
		      <button type="submit" class="btn btn-warning btn-lg">この内容で送信</button>
		      <input type="hidden" name="_wp_nonce" value="<?php echo esc_attr( wp_create_nonce( __FILE__ ) ); ?>">
		      <input type="hidden" name="action" value="staff_register">
		      <input type="hidden" name="translation_id" value="<?php echo esc_attr( $nonce ); ?>">
		    </div>
		  </div>
		</form>
	</div>
</div>
