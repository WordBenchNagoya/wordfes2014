<?php
/**
 * ベース テンプレート : すべてのテンプレートの前にこのファイルが呼び出されます
 *
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    http://opensource.org/licenses/MIT
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

// Include "modules/head.php"
get_template_part( 'modules/head' );

// Include "modules/header.php"
get_template_part( 'modules/header' );

do_action( 'get_header' )?>

<div class="wrap">
	<?php
	// Main Visual widget area
	dynamic_sidebar( 'main-visual-primary' ); ?>

	<div class="container">
		<main class="main <?php wordfes2014_main_class(); ?>">
			<?php
			// Content Primary widget area
			dynamic_sidebar( 'content-primary' );

			include( wordfes2014_template_path() );
			// Content Secondary widget area
			dynamic_sidebar( 'content-secondary' );
			?>
		</main>
		<?php
		if ( wordfes2014_display_sidebar() ) :
		?>

		<aside class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<?php
			// Include "modules/sidebar.php"
			get_template_part( 'modules/sidebar' );
			?>
		</aside>
		<?php
		endif;
		?>
	</div>

</div>

<?php

do_action( 'get_footer' );

// Include "modules/footer.php"
get_template_part( 'modules/footer' ); ?>
