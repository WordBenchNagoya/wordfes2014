<?php
/**
 *  テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>
<div class="article-content">
	<div class="main-block ">
		<div class="row clearfix">
			<div class="col-xs-4 col-lg-2">
			<?php
			if ( has_post_thumbnail( $post_id ) ) {
				the_post_thumbnail( 'thumbnail', array( 'class' => 'thumbnail' ) );
			} else {
				echo '<img src="http://2014.wordfes.org/wp-content/themes/wordfes2014/assets/img/common/noimage.png" class="thumbnail" alt="placeholder+image">';
			}
			?>
			</div>
			<div class="col-lg-10">
				<h3 class="sub-title03">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div><!-- .main-block -->
</div><!-- .entry-content -->
