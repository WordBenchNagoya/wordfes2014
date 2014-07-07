<?php
/**
 * =====================================================
 * ヘッダー テンプレート
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     Grow Group
 * @license    GPLv2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>
<header class="header header-minimal">
	<div class="container">
		<div class="logo-area col-lg-5 col-md-5 col-sm-12 col-xs-12">
			<a href="<?php echo esc_url( site_url() ); ?>">
				<img src="<?php echo esc_url ( get_template_directory_uri() ); ?>/assets/img/subpage/logo_sc.png" alt="愛がある！冒険がある！WordPressがある！ WordFes Nagoya 2014">
			</a>
		</div>

		<div class="nav-area col-lg-7 col-md-7 col-sm-12 col-xs-12">
			<div class="social-area col-lg-12 col-md-12 text-right">
				<div class="sns-button fb-like" data-href="http://2014.wordfes.org" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
				<div class="sns-button twitter">
					<a href="https://twitter.com/share" class="twitter-share-button" data-via="wordbenchnagoya" data-lang="">ツイートする</a>
				</div>
			</div>
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	    </div>
	    <nav class="collapse navbar-collapse" role="navigation">
				<?php
				 if ( has_nav_menu( 'primary_navigation' ) ) :
						wp_nav_menu(
							array(
								'theme_location' => 'primary_navigation',
								'menu_class' => 'nav-main nav navbar-nav',
								'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
								'walker'            => new WP_Bootstrap_Navwalker()
							 )
						 );
				 endif;
				?>
			</nav>
		</div>
	</div>
</header>
