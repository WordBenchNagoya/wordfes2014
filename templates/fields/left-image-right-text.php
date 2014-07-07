<?php
/**
 * リピーターコンテンツ : 左画像、右テキスト
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

$image_id = get_sub_field( 'left-image' );
$image_objct = wp_get_attachment_image_src( $image_id, 'large' );
$image_caption = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
?>
<div class="article-block block01 row">
	<div class="col-xs-12 col-lg-4">
		<figure>
			<img src="<?php echo esc_url( $image_objct[0] ); ?>" alt="<?php echo $image_caption; ?>" />
			<figcaption class="text-center"><?php echo $image_caption; ?></figcaption>
		</figure>
	</div>
	<div class="col-xs-12 col-lg-8">
		<p><?php echo wp_kses_post( get_sub_field( 'right-text' ) ); ?></p>
	</div>
</div>
