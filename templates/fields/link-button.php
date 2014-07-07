<?php
/**
 * リピーターコンテンツ : リンクボタン
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>
<div class="article-block <?php echo esc_attr( get_sub_field( 'button-align' ) ); ?> ">
	<a href="<?php echo esc_url( get_sub_field( 'link-url' ) ); ?>" class="btn <?php echo esc_attr( get_sub_field( 'button-size' ) ); ?> <?php echo esc_attr( get_sub_field( 'button-color' ) ); ?>">
		<?php echo esc_attr( get_sub_field( 'button-text' ) ); ?>
	</a>
</div>
