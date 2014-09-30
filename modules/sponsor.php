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
		$sponsor_temrs = get_terms( 'sponsor_category', array( 'hide_empty' => false, 'orderby' => 'order', 'order' => 'ASC') );

		if ( is_user_logged_in() ) {
			$post_status = array( 'draft','publish' );
		} else {
			$post_status = array( 'publish' );
		}

		foreach ( $sponsor_temrs as $key => $sponsor_term ){


			// Set sponsor Kind to posts settings
			$args = array(
				'post_type' => 'sponsored',
				'post_status' => $post_status,
				'posts_per_page' => -1,
				'orderby' => 'title',
				'tax_query' => array(
					array(
						'taxonomy' => 'sponsor_category',
						'field' => 'id',
						'terms' => $sponsor_term->term_id,
					),
				),
			);
			// create instance.
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
									<a href="<?php echo esc_url( get_field( 'sponsor_url' ) ) ?>" target="_blank" title="<?php the_title(); ?>"><img src="<?php echo wp_get_attachment_url( get_field( 'sponsor_logo_image' ) ) ?>" alt="<?php the_title(); ?>" class="img-responsive"></a>
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
			wp_reset_query();

		} ?>
		<?php if ( is_user_logged_in() ) { ?>
			<p class="edit-link">
				<a href="<?php echo admin_url( '/post-new.php?post_type=sponsored' ); ?>" class="btn btn-success"><i class="dashicons dashicons-admin-generic"></i> 新しいスポンサーを追加</a>
			</p>
		<?php } ?>

		</div>
	</div>
</div>
