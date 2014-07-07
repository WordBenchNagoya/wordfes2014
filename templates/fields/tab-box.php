<?php
/**
 * リピーターコンテンツ : タブ
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
<div class="article-block">
<ul class="nav nav-tabs">
	<?php
$count = 0;
while( has_sub_field( 'box' ) ) : ?>

	<li<?php
if ( $count == 0 ){
	echo ' class="active"';
} ?>>
		<a href="#<?php echo esc_attr( get_sub_field( 'id' ) ); ?>" data-toggle="tab">
		<i class="icon-chevron-sign-right"></i>
		<?php
		echo esc_attr( get_sub_field( 'label' ) ); ?></a>
	</li>
	<?php $count++; ?>
	<?php endwhile; ?>
	</ul>
	<div class="tab-content">
	<?php
	$count = 0;
	while( has_sub_field( 'box' ) ): ?>
	<div class="tab-pane <?php if( $count == 0 ){ echo 'active';} ?>" id="<?php echo esc_attr( get_sub_field( 'id' ) ); ?>">
	<?php the_sub_field( 'contents' ); ?>
	</div>
	<?php
$count++ ; ?>
	<?php
endwhile; ?>
	</div>
</div>
