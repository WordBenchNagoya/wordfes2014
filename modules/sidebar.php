<?php
/**
 * =====================================================
 * サイドバー テンプレート
 * @package    WordPress
 * @subpackage WordFes 2014
 * @author     Grow Group
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

dynamic_sidebar( 'sidebar-primary' );

if ( is_user_logged_in() ) { ?>
	<p class="edit-link">
		<a href="<?php echo admin_url( '/widgets.php' ); ?>" class="btn btn-success"><i class="dashicons dashicons-admin-generic"></i> サイドバーを編集</a>
	</p>
<?php
} ?>
