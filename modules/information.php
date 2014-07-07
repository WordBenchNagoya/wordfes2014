<?php
/**
 * =====================================================
 * インフォメーション テンプレート
 * @package    WordPress
 * @subpackage
 * @author     WordBench Nagoya
 * @license    http://opensource.org/licenses/MIT
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

	<!-- information area -->
	<section class="area information--area background-color sliver">
		<div class="container">
			<div class="clearfix">

				<!-- topics -->
				<div class="col-xs-12 col-lg-4 col-md-6">
					<h2 class="section--title inverse--title">
						TOPICS
					</h2>
					<div class="section--contents">
						<div class="info-wrap">
							<?php
							$news_args = array(
								'post_type' => 'news',
								'posts_per_page' => 20,
							);

							// create instance
							$news_query = new WP_Query( $news_args );

							if ( $news_query->have_posts() ) :
								while ( $news_query->have_posts() ) :
									$news_query->the_post(); ?>

								<dl class="info-row">
									<dt class="time"><?php the_date( 'Y' ) ?><br><?php the_date( 'm-d' ) ?></dt>
									<dd class="info-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></dd>
								</dl>

							<?php endwhile; ?>

							<?php else: ?>

							<dl class="info-row">
								<dt>まだトピックスは投稿されていません。</dt>
							</dl>

							<?php endif; ?>

						</div>
						<!--p class="more-btn text-center">
							<a href="<?php echo site_url( '/topics/' ) ?>" class="btn btn-primary">トピックス一覧</a>
						</p-->
					</div>
				</div>

				<!-- staff blog -->
				<div class="col-xs-12 col-lg-4 col-md-6">
					<h2 class="section--title inverse--title">
						STAFF BLOG
					</h2>
					<div class="section--contents">
						<div class="info-wrap">
							<?php
							$blog_args = array(
								'post_type' => 'post',
								'posts_per_page' => 20,
							);
							// create instance
							$blog_query = new WP_Query( $blog_args );

							if ( $blog_query->have_posts() ) :
								while ( $blog_query->have_posts() ) :
									$blog_query->the_post(); ?>

								<dl class="info-row">
									<dt class="time"><?php the_date( 'Y' ) ?><br><?php echo get_the_date( 'm-d' ) ?></dt>
									<dd class="info-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></dd>
								</dl>

							<?php endwhile; ?>

							<?php else: ?>

							<dl class="info-row">
								<dt>まだスタッフブログは投稿されていません。</dt>
							</dl>

							<?php endif; ?>
						</div>
						<!--p class="more-btn text-center">
							<a href="<?php echo site_url( '/archives/' ) ?>" class="btn btn-primary">スタッフブログ一覧</a>
						</p-->
					</div>
				</div>

				<!-- other -->
				<div class="col-xs-12 col-lg-4 col-md-6">
					<h2 class="section--title inverse--title">
						OTHER
					</h2>
					<div class="twitter">
						<a class="twitter-timeline" href="https://twitter.com/wbNagoya" data-widget-id="485337873780969472">@wbNagoya からのツイート</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
					<div class="row">
						<div class="col-lg-12 col-xs-12">
							<p><a href="http://wordbench.org/groups/nagoya/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner/bench_bn.png" alt="WordBench Nagoya"></a></p>
						</div>
						<div class="col-lg-6 col-xs-12">
							<a href="https://www.facebook.com/WordBenchNagoya?fref=ts" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/banner/fb_bn.png" alt="WordBench Nagoya Facebookページ"></a>
						</div>
						<div class="col-lg-6 col-xs-12">
							<a href="https://twitter.com/wbNagoya" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/banner/twitter_bn.png" alt="WordBench Nagoya Twitter アカウント"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- /information area -->
