<?php
/**
 * フッター モジュール
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

	<footer class="footer">
		<p class="copyright">Copyright © WordFes Nagoya 2014 All Rights Reserved.</p>
	</footer>
  <?php dynamic_sidebar( 'footer-primary' ); ?>

	<!-- GA -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-33186005-2', 'wordfes.org');
	ga('send', 'pageview');
	</script>
	<!-- /GA -->
	<!-- Facebook -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=646556028772013&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<!-- Twiiter -->
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<?php wp_footer(); ?>
</body>
</html>


