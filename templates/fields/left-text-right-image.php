<?php
/**
 * リピーターコンテンツ : 左テキスト、右画像
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
// 画像を取得
$image_id = get_sub_field( 'right-image' );
$image_objct = wp_get_attachment_image_src( $image_id, 'large' );
$image_caption = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
?>
<div class="article-block block01">
	<div class="col-xs-12 col-lg-8">
		<?php echo wp_kses( get_sub_field( 'left-text' ), wp_kses_allowed_html() ); ?></p>
	</div>
	<div class="col-xs-12 col-lg-4">
		<figure>
			<img src="<?php echo esc_url( $image_objct[0] ); ?>" alt="<?php echo esc_html( $image_caption ); ?>" />
			<figcaption class="text-center"><?php echo esc_html( $image_caption ); ?></figcaption>
		</figure>
	</div>
</div>
