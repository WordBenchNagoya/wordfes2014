<?php
/**
 * 固定ページ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    http://opensource.org/licenses/MIT
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

<div class="entry-content">
	<div class="main-block">
	<?php the_content(); ?>
	<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'wordfes2014' ),
			'after'  => '</div>',
		) );
	?>
	</div><!-- .main-block -->
</div><!-- .entry-content -->
