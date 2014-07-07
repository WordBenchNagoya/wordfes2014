<?php
/**
 * スタッフブログ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    http://opensource.org/licenses/MIT
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

<section class="post-content clearfix" itemprop="articleBody">

<?php
// 本文
the_field( 'post_content' );

while( has_sub_field( 'layout-block' ) ) :

	include dirname( __FILE__ ) . '/fields/' . get_row_layout() . '.php';

endwhile; ?>
</section>
