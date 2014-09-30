<?php

/**
 * セッション詳細 テンプレート
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
	<div id="primary" class="content-area post-contents">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'templates/content', 'session' );

			// wordfes2014_post_nav();
			?>
			<div class="nav-previous pull-left" style="margin-bottom: 20px">
				<a href="http://2014.wordfes.org/sessions/" class="btn btn-primary" rel="prev">
					<span class="meta-nav">
						<i class="dashicons dashicons-arrow-left"></i>
					</span>
					タイムテーブルへ戻る</a></div>

			<?php

				// If comments are open or we have at least one comment, load up the comment template
				// if ( comments_open() || '0' != get_comments_number() ) :
				//   comments_template();
				// endif;
		endwhile; // end of the loop. ?>

	</div><!-- #primary -->



