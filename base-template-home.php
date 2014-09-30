<?php
/*
Template Name: ホーム テンプレート
*/
/**
 * トップページ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<?php wp_head(); ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo( 'name' ); ?> Feed" href="<?php echo esc_url( get_feed_link() ); ?>">
</head>

<body <?php body_class( 'home' ) ?> onload="init();">
	<header class="header header--top">
		<div class="container">
			<div class="social-area">
				<div class="sns-button fb-like" data-href="http://2014.wordfes.org" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>
				<div class="sns-button">
					<a href="https://twitter.com/share" data-url="http://2014.wordfes.org" class="twitter-share-button" data-via="wbNagoya" data-lang="ja_JP">ツイートする</a>
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
if ( has_nav_menu( 'primary' ) ) :
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_class'     => 'nav-main nav navbar-nav',
			'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
			'walker'         => new WP_Bootstrap_Navwalker(),
		 )
	 );
endif;
				?>
			</nav>
		</div>
	</header>
	<div id="main_area" style="opacity:0;">
		<div class="container">
			<div class="clearfix">
				<div class="col-md-6 col-xs-12 main_logo">
					<h1><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAhMAAAC+CAMAAAC4YH0PAAAA9lBMVEX//////wD//////wD//////wD//////wD//wD//////////wD//wD//////////////wD//wD//////wD//wD//////////wD//////wD//////////////wD//wD//+L//////wD//wD//////wD//wD//////////wD//////wD//////wD//wD//////////wD//wD//////////////////////wD//wD//////////////////wD//xD//y7//z3//0D//1D//2D//3D//3z//4D//5D//6j//7D//7j//8D//9D//93//+D///D///P///+GrJaLAAAAPXRSTlMAEBAgIDAwP0BATE9QUFdYX2Bgb3BwdH9/gICHiI+QkJCfoKCvsLC4v7/AwM/Q0Njf4ODi5Ofo7/Dw8/b34TH70wAAIjtJREFUeNrtfW2jJalxHsIsKyJ1rMXqrBdLcstInc0gEYXElkh8Yyd+S+y81f//M/nQ0C90AdXn3pl7Z27zZWdnzjlNU08VTxVVBWPvbnAHUbN73GMbEwDAvQz32A13Y+IexYg3Ju5R0AkAAHevwz22oQAA5nsd7rGNEQDA3Otwj8LtGO51uEfhdsh7He5RuB1PeXz48OvvfvrDH9zL8u7djv/1VIw/fPjux0Rg3Pj5Mt2O//mEjd/+4qvet//op7/96l7DL9Lt+MenyvjDX3zVBMTT0zf3En6Zbsd/f6qP//BTdHf48S9++/R0Q+LLdTv+21Nz/Pqbg7X44Te/+JD+5YbElzjCwe2ojw8fvvvuu+/+4sOHP+z+8obEFzkAAP7P02PjhsSX63b8yw2Je2xDN92O1vj9DYkvdBgAgL97BBJ3XOI9ux3Y+M0f3Wv33t2OYvzyXrkvg06akaNux/+9qUSHdEXwvPupMcJ08YcnAPuaLzZgKXYPuR3fv7d9IwL0xS2v5xxoAAD12swBndU/XTMSf/IuYzie5NVfylfjEQBAvzLYAXU7/v4Sk3iHZ+MBAIBT7MSlXOcJAADE670XBwCIz3U7vv/he2RilpSeeLUmQsJrZ8IqFMYBAOC/3ogg7PtdQjFfZAcOACDwV3wvPD37gtvx+1++2yiVIBGKiwnwGl49OdpifEaubsf3P//266+/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" alt="WordFes Nagoya 2014 愛がある！冒険がある！WordPressがある！"></h1>
					<p class="date"><span>2014.<strong>8.30</strong>(SAT)</span>名古屋工業大学52号館</p>
					<?php the_field( 'top_description' ) ?>
				</div>
				<div class="col-md-6 col-xs-12" id="livestage">
					<div class="slick slider slick-slider">


					<?php
					$css = array();
					if ( $sliders = get_field( 'top_slider' ) ):
            $delete_keys = array_rand( $sliders, 8 );
            foreach ( $delete_keys as $delete_key ) {
              unset( $sliders[$delete_key] );
            }
            foreach ( $sliders as $key => $slider ) :
              $i = rand(0,10);
							$slider_bg = wp_get_attachment_image_src( $slider['top_slider_background_image'], 'full' );
							$style = 'background-image: url(' . esc_url( $slider_bg['0']  ) . ' );background-color: ' .$slider['top_slider_background_color'];
							$link = $slider['slider_link'];
							$display = $slider['slider_display'];
							if ( '0' === $display || ( '2' === $display && ! is_user_logged_in() ) ) {
								continue;
							}
						?>
						<div class="slider-contents slider-image slider-contents<?php echo $i;?>" style="<?php echo $style; ?>">

							<?php
							if ( $link ) echo '<a href="' . $link . '" class="slider-link">';
							$slider['top_slider_contents'];
							$css[] = $slider['top_slider_css'];
							if ( $link ) echo '</a>';
							?>

						</div>

						<?php
						endforeach;
						if ( $css && is_array( $css ) ) {
							$code = implode( ' ', $css );
							echo '<style>' . $code . '</style>';
						}
					endif; ?>

					</div>
					<span id="stage_light"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVsAAAAbCAMAAADlPtwHAAAAUVBMVEX///9ERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERER9mhn1AAAAGnRSTlMAEB8gMEBMUGBqcHmAkKCwwNDg6Orw9Pj8/Z+Z/FoAAAHRSURBVGje7djBdoIwFARQIlKpRQhYajv//6FdtCosDDPJLJmdOTfvHB+YxFQVUHHxQ0HmpKHL01KEe2/33u693Xu77m0dyEa4oSAzEt7YRtBShcDck41wQ0FmZPhie0tLFQLAkWuEGwoya0UgG0FLGQ4AYlUd49aX9ENBam2NdVWNAHqbzIP1DOC9B+LGLD8UpJQRuHwAmINNZsIOwDcAnDam+aEghbQA8APgbJO5MHziL9PGPD8UJJ8w/9e82mQurCPu6dI/YDsUpJDuUXOoTTITXvDMnJroh4IUUi+Kpp8YLXPhsPyY2gT9UJBCIl2Ulrlw1Wo05DOxQEHyaZYlk7s6LfNhtxyI1FrigoKkM9FLAi3z4WNrAwC0r2f6oSDZnJcFJ4ssge1q6PD6BOeHguQ6e1g9rJNBFsJxOXZLvD5+KEjqpb2RiwwtS+FqCU699n4oSHWtTd4C0bIY9svRS2Ij9ENBbiesizlkMayfK0VMHuH9UJBMjpE7fwmyFN7PQtPWGdMPBUnldP9xnm2yDIYrAMzb27QfCpJMN1MXNYosgQMA9MRi54eCZFP37H9oWhbAHuCu/v1QkHyayF6s0TIbhpG8m/ZDQSppx+CWMvwFIq+tufPapl8AAAAASUVORK5CYII="></span>
					<span id="stage_speaker1"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAV8AAAA5CAMAAACmsdhAAAAAOVBMVEX///8gICAoKCg1NTVRUVFVVVVdXV1tbW11dXV5eXmKioqOjo6Wlpaurq7Kysrb29vj4+Pn5+fv7++xmE2VAAAAAXRSTlMAQObYZgAAAXRJREFUeNrt2l1zgjAQhWELAnL4iPL/f2xrANsLg0Z62pn23QtkiFfPZDK7mz28bcWBeBzbgvjiiy+++OL7t33LYyOpOZb4vuh7T3B9KWqtURf4vuB7X3BdPEnDGKYwDtKpwDfbNyF4W+zDNEfob8vgPe2bEpx/avWXaY1LrxrfTN+U4HwwS2H6jCCV+Gb5JgUX/GH6GsPCD96zvknB+Gw0Xj+eu7Y7X19GNfhm+SYF41OKH7uqqrr4NwnfLN+k4LIaN3X7sdrGN3yzfROC7N8f2L+cv97zl/zBmz+Q/3rzX+o3b/1G/8Hcf6B/5u2f0f/d7bvd/+X+Yrfv9v0F92/7fbnfxBdfAl98/58v+ZkzP6O+sNYX1MfW+pj+jre/Q39yry/zJVZf5ku8vsyXeH2ZL/H6Ml/i9mW+5Pf2L+ev9/wlf/DmD+S/3vyX+s1bv9F/MPcf6J95+2f0f3f7Ml9i9mW+xO3L/Sa++BL44osvvt/g+w7FbUbryr3AQwAAAABJRU5ErkJggg=="></span>
					<span id="stage_staff"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACYAAABeCAYAAABPTGYCAAAFVklEQVRo3u3a/2/UZBwHcP4D7zd/k/vZCLngD8bwS02MGreYM0ZNMIFqFhFJWJnBSQykkhhmhvEytwjBZDWM6JLBnYgZGZh1OAJjDLtb9kUG7EaGmwLuPOayg20fn6fXHk/bp891d32uTbDJO1z2XPq86PP08zzttg4A1gWW20fiKFmUDIpItgWJihkgMJINCyxKoAoJBayASxKw38IEi6DMGrCm8MAKuB4DpoUNJhPDGQ0TTCRgUtVgg0efiaAIRiIUmEDAUlxhBkZGyaCALSpKzHYDkGUjwgVmoDQKiEwWJUrgSFicF0wtgTKjEDCVgCm+w/AQkZ1PnHhZjxuOgCUIWIYHDM8ruNq+afXOgKR3NNe/owgZ7RRwG4kTDJhkG86o37AU7tBE4SxnWvSrhkH48/zVRhImUe5MHNH3+TXe9dJDx+KMsnS9ufj5WqoGJk7qQyy73ACy3zAll94PNBiZlVttkBvZb4eleMLipVBmDFicgGW4wSgduOaP83X54krgnGMy70WZmoWxA7eHO55vcqljepHltcfKloDVuqyVxWWJ537eDUduCCNw9+c5W7vGd3dRuHLXKTCh+J2Hf4/g8g/L9wHme832BP9tj3PuAPx1srb56ETLseTNG2A/MDD/5/vBwFbzyy9uVWHbngFwORK8hxJP6nnKIxo8/Uo3CxblAtv31ci3LcpYXh+W2XYrCs2jy8P3GLCVNK8drII7xdGPB3cBclcK+fd3/UffJaf0djyclEPkAcMbPP1K4I7xlaEdZnsRbx6rK/f18uEzTLF3fPDwmAM1M7dYRFHwit/PlSLtijz3xlnILTywwPYeSltgrccmyea4E1Z4wSFYip+3oKed1ZzbUL3+YT8ke2b0K4MRJIqCj1hhzrUtsQaYZh8uPIR2ACsY907DxTz6HLPDBNbrIEbkUpN7jXFcsShlPdtdGrb6j58w+/nJKj1loBbNBwImbL7PUSHxfCnzarnArDuCnOXh03hkp75vMIqmeZjF038YfS+Vcdyt5uKMlxxc3fWdwcJouShvMPeNnmLMR9G6jekCWLzRi2/3clHPxnsmvMHYu9AsbceJU8EVU73DSm+RTWSs+rBHq4LmArPcudWFPbpbE445Z/te9WHWqyeR70oJVKyCyX+pMhgjqAOxXNjmt37RuMHQYtxULmzTaz1z3GD4f82/wJaRjbVnFkIHq2TiE4nygIk+wAQeMIXV6baPByxpOjwObR2TxaTOzsBOeWgjl6H8pnO4+3L6nuMBBB/Tc3fg1/S4I6cvDsHB40k9jUeOv8pl8j9RIwooUEESvGBShbAML5hcIQwnzgOm+ABTeMBUH2A4Eb9hWokOvcJFv2GlOmTNwSmUdpR6FP9f3KGTxvp7m9Frgn2w4/M9UNOwC556sw6ejL83a5aTDVu3w5ZPG/Tv4O8OXfiylnYuHq84aVvwGJ472ck2Wls0OJiXtgBgmqe2AGAqoy0VJEz21BYATGK0iUHCBE9tgcHoLwhjwcFYv5dknIfH749CCaMNV4R4c0Rve9wnfzasMJVRx9Qg65jKqPxqkJVfZsCUsMLkIGGirfME0SYFCRMY2x4hyG1PbA0wtXowZ71SPbc9zjCVAdPCAtM8o6sAU1y3N9a/RcxUGyYzYHIwz5W0QhoimMCACf/DPNSy9Yy/31/PFaZ1f9R45SepdfBU/cT0pc+WUADnXEcdnO/84BpuGzq9exr9bHnp5td62+ApCQZSu05wgV3o2tmX2PsCfNGwuawgeIYLrKv17aVyUVxho+c+2YCHCXeA/yUz8GP9930/bE+fUd69ZW8z43be/wBmS8rxpsAE4QAAAABJRU5ErkJggg=="></span>

					<?php
					if ( is_user_logged_in() ) { ?>
						<div class="edit-link">
							<a href="<?php echo admin_url( '/post.php?post=509&action=edit#acf-top_slider' ) ?>" class="btn btn-success"><div class="dashicons dashicons-admin-generic"></div> スライダーを編集</a>
						</div>
					<?php
					} ?>

				</div>
			</div>
		</div><!-- /container -->
		<div class="main-visual audience"></div>
	</div><!-- /#main_area -->


	<section id="schedule">
		<div class="container">
			<div class="clearfix">
				<h2>SCHEDULE</h2>

				<?php echo get_post_meta( $post->ID, 'top_schedule', true ) ?>
					<?php
					if ( is_user_logged_in() ) { ?>
						<div class="edit-link text-center">
							<a href="<?php echo admin_url( '/post.php?post=509&action=edit#acf-top_slider' ) ?>" class="btn btn-success"><div class="dashicons dashicons-admin-generic"></div> スケジュールを編集</a>
						</div>
					<?php
					} ?>
			</div>
		</div>
	</section><!-- /schedule -->

	<!-- pickup area -->
	<section class="area picup--area text-center background-color beige">
		<div class="container">
			<h2 class="section--title inverse--title">PICK UP</h2>
			<div class="clearfix section--contents">

				<?php
				if ( get_field( 'top_pickup_banner', $post->ID ) ):
					while ( has_sub_field( 'top_pickup_banner', $post->ID ) ) :

						$banner_image  = wp_get_attachment_image_src( get_sub_field( 'pickup_banner_image', $post->ID ), 'full' );
						$banner_link   = get_sub_field( 'pickup_banner_url', $post->ID );
						$banner_target = ( get_sub_field( 'pickup_banner_target', $post->ID ) === '_blank' ) ? 'target="' . esc_attr( get_sub_field( 'pickup_banner_target', $post->ID ) ) . '"' : '';
						$banner_column = get_sub_field( 'pickup_banner_column', $post->ID ); ?>

						<div class="col-xs-6 <?php echo esc_attr( $banner_column ); ?> banner col-md-4">
							<a class="push" href="<?php echo esc_url( $banner_link ) ?>" <?php echo $banner_target; ?>>
								<img src="<?php echo esc_url( $banner_image[0] ); ?>" alt="<?php echo esc_attr( $banner_image[2] ) ?>"></a>
						</div>

					<?php

					endwhile;

				endif; ?>

			</div>

			<?php
			if ( is_user_logged_in() ) { ?>
				<div class="edit-link">
					<a href="<?php echo admin_url( '/post.php?post=509&action=edit#acf-top_pickup_banner' ) ?>" class="btn btn-success"><div class="dashicons dashicons-admin-generic"></div> バナーを編集</a>
				</div>
			<?php
			} ?>

		</div>
	</section><!--/pickup area -->

	<?php
	// @see "wordfes2014/modules/top-entry.php"
	get_template_part( 'modules/top-entry' );
	?>

	<?php
	// @see "wordfes2014/modules/information.php"
	get_template_part( 'modules/information' );
	?>

	<div class="responsive_canvas">
		<canvas id="canvas" width="1980" height="730"></canvas>
	</div>


	<?php
do_action( 'get_footer' );
get_template_part( 'modules/footer' );
