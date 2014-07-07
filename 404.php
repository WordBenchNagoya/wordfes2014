<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package wordfes2014
 */
?>

<div id="primary" class="content-area post-contents">
	<main id="main" class="site-main" role="main">

		<section class="error-404 main-block not-found">
			<h1 class="page-title sub-title01"><?php _e( '404 Not Found', 'wordfes2014' ); ?></h1>

			<div class="page-content">
			<p>
				ご指定のページはサイト内に見つかりませんでした。
			</p>

			<?php get_search_form( 'modules/searchform' ); ?>

			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

