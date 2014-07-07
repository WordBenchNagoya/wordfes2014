<?php
/**
 * リピーターコンテンツ : テキストのみ
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

<?php
echo wp_kses_post( get_sub_field( 'text' ) ); ?>
