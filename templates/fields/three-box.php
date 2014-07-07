<?php
/**
 * リピーターコンテンツ : 3カラム
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
	<?php
while ( has_sub_field( 'box' ) ) : ?>
	<div class="col-xs-12 col-lg-4 col-md-6 col-sm-12 three-box">
		<h3 class="sub-title">
			<?php
			echo  wp_kses_post( get_sub_field( 'title' ) ); ?>
		</h3>
		<p class="text-center">
		<?php if ( get_sub_field( 'image' ) ): ?>
			<img src="<?php echo esc_url( get_sub_field( 'image' ) ); ?>" alt="<?php echo esc_html( get_sub_field( 'title' ) ); ?>">
		<?php endif ?>
		</p>
		<p><?php the_sub_field( 'contents' ); ?></p>
	</div>
	<?php
endwhile; ?>
</div>
