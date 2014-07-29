<?php
/**
 * デフォルトアーカイブページ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

	<section id="primary" class="content-area post-contents">
		<main id="main" class="site-main main-block" role="main ">

		<?php if ( have_posts() ) : ?>

			<h2 class="page-title sub-title01">
				<?php

				if ( is_taxonomy_hierarchical( 'topics_category' ) ) {

					single_cat_title();

				} else if ( is_post_type_archive( 'topics' ) ) {

					echo 'お知らせ一覧';

				} else if ( is_archive()  ) {

					echo 'スタッフブログ';

				}

				?>
			</h2>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'templates/content-list' );
				?>

			<?php endwhile; ?>

			<?php //wordfes2014_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

			<nav class="text-center">
			<?php
			// wp_pagenavi
			if ( function_exists( 'wp_pagenavi' ) ) {
				wp_pagenavi();
			} ?>
			</nav>
		</main><!-- #main -->
	</section><!-- #primary -->
