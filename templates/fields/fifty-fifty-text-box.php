<?php
/**
 * 5 : 5 ボックス テンプレート
 *
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
<div class="article-block row">
	<div class="col-xs-12 col-lg-6">
<?php
while ( has_sub_field( 'contents1' ) ) : ?>
			<h4><?php echo esc_html( get_sub_field( 'sub-title' ) ); ?></h4>
			<p><?php echo wp_kses_post( get_sub_field( 'text' ) ); ?></p>
<?php
endwhile; ?>
	</div>
	<div class="col-xs-12 col-lg-6">
<?php
while ( has_sub_field( 'contents2' ) ) : ?>
			<h4><?php echo esc_html( get_sub_field( 'sub-title' ) ); ?></h4>
			<p><?php echo get_sub_field( 'text' ); ?></p>
<?php
endwhile; ?>
	</div>
</div>
