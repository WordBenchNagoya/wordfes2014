<?php
/**
 * スポンサー モジュール
 *
 * - - -
 *
 * setup.php にてアクションフックで出力させてます
 *
 * =====================================================
 * @package    WordPress
 * @subpackage WordFes 2014
 * @author     Grow Group
 * @license    GPLv2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */
?>

<div class="area sponsor--area sponsor-wrap background-color white">
	<div class="container">
		<h2 class="section--title text-center" style="color:#252525">SPONSOR</h2>
		<div class="sponsor-area">
		<?php
		// Get Sponsor Kind
		$sponsor_temrs = get_terms( 'sponsor_category', array( 'orderby' => 'menu_order', 'order' => 'DESC') );
		foreach ( $sponsor_temrs as $key => $sponsor_term ){

		// Set sponsor Kind to posts settings
			$args = array(
				'post_type' => 'sponsored',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
						'taxonomy' => 'sponsor_category',
						'field' => 'id',
						'terms' => $sponsor_term->term_id,
					),
				),
			);
			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>
				<div class="sponsor-contents <?php echo esc_attr( $sponsor_term->slug ) ?>">
					<div class="clearfix">
						<h3 class="sponsor-flag">
							<?php echo esc_attr( strtoupper( $sponsor_term->slug ) ) ?> <br>
							SPONSOR
						</h3>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post(); ?>
								<div class="colmun text-center">
									<a href="<?php echo esc_url( get_field( 'sponsor_url' ) ) ?>" target="_blank"><img src="<?php echo wp_get_attachment_url( get_field( 'sponsor_logo_image' ) ) ?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
								</div>
						<?php
						endwhile; ?>
						</div>
					</div>
				</div>

			<?php
			else: ?>

			<?php
			endif;
		} ?>


		</div>
	</div>
</div>
