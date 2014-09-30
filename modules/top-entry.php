<?php
/**
 * トップページ エントリーエリア モジュール
 *
 * - - -
 *
 * setup.php にてアクションフックで出力させてます
 *
 * =====================================================
 * @package    WordPress
 * @subpackage WordFes 2014
 * @author     wordbench nagoya
 * @license    GPLv2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */


if ( ! function_exists( 'get_avatar_url' ) ) {
	function get_avatar_url( $author_id, $size = '' ) {
			$get_avatar = get_avatar( $author_id, $size );
			preg_match( "/src='(.*?)'/i", $get_avatar, $matches );
			return ( $matches[1] );
	}
}

// get post type "attendees"
global $attendees_args;
$attendees = get_posts( $attendees_args );

function top_entry_twitter_icon( $atts = array() ){

		global $post, $camptix;

		extract( shortcode_atts( array(
			'attr'           => 'value',
			'order'          => 'ASC',
			'orderby'        => 'title',
			'posts_per_page' => 10000,
			'tickets'        => false,
			'columns'        => 3,
		), $atts ) );

		$questions = get_posts( array(
			'post_type' => 'tix_question',
			'meta_query' => array(
				array(
					'key'     => 'tix_type',
					'value'   => 'twitter',
					'compare' => '=',
				),
			),
		) );
		$facebook_question_ids = array(
			'521',
			'523',
			'525',
		);

		foreach ( $questions as $key => $question ) {
			$question_ids[] = $question->ID;
		}

		$camptix_options = $camptix->get_options();

		$start = microtime( true );

		// Cache for a month if archived or less if active.
		$cache_time = ( $camptix_options['archived'] ) ? 60 * 60 * 24 * 30 : 60 * 60;
		$query_args = array();
		ob_start();

		// @todo validate atts here
		if ( ! in_array( strtolower( $order ), array( 'asc', 'desc' ) ) )
			$order = 'asc';

		if ( ! in_array( strtolower( $orderby ), array( 'title', 'date' ) ) )
			$orderby = 'title';

		if ( $tickets ) {
			$tickets = array_map( 'intval', explode( ',', $tickets ) );
			if ( count( $tickets ) > 0 ) {
				$query_args['meta_query'] = array( array(
					'key' => 'tix_ticket_id',
					'compare' => 'IN',
					'value' => $tickets,
				) );
			}
		}

		$paged = 0;
		$printed = 0;
		// do_action( 'camptix_attendees_shortcode_init' );
		?>

		<!-- entry-area -->
		<section class="area entry--area text-center background-color dark-brown">
			<div class="container">
				<h2 class="section--title">
					ENTRY
				</h2>
				<div class="clearfix section--contents">
					<ul class="twitter-avatar">
				<?php
						$facebook_info = false;
						$twitter_id    = false;
					// while ( true && $printed < $posts_per_page ) {
						$paged++;

						$attendees = get_posts( array_merge( array(
							'post_type'      => 'tix_attendee',
							'posts_per_page' => 12,
							'post_status'    => array( 'publish', 'pending' ),
							'paged'          => $paged,
							'order'          => $order,
							'orderby'        => $orderby,
							'fields'         => 'ids', // ! no post objects
							'cache_results'  => false,
						), $query_args ) );

						// shuffle attendees
						shuffle( $attendees );

						if ( ! is_array( $attendees ) || count( $attendees ) < 1 ){
							break; // life saver!
						}

						// Disable object cache for prepared metadata.
						$camptix->filter_post_meta = $camptix->prepare_metadata_for( $attendees );


						foreach ( $attendees as $attendee_id ) {
							if ( $printed > $posts_per_page ){
								break;
							}

							// Skip attendees marked as private.
							$privacy = get_post_meta( $attendee_id, 'tix_privacy', true );

							if ( 'private' === $privacy ){
								continue;
							}

							$first     = get_post_meta( $attendee_id, 'tix_first_name', true );
							$last      = get_post_meta( $attendee_id, 'tix_last_name', true );
							$questions = get_post_meta( $attendee_id, 'tix_questions', true );


							foreach ( $question_ids as $key => $question_id ) {
								if ( isset( $questions[$question_id] ) && $questions[$question_id] ) {
									$twitter_id =  $questions[$question_id];
								}
							}

							foreach ( $facebook_question_ids as $key => $facebook_id ) {

								if ( isset( $questions[$facebook_id] ) && $questions[$facebook_id] ) {
									$facebook_info =  $questions[$facebook_id];
								}

							}

							$facebook_id = '';

							if ( $facebook_info ) {
								if ( strstr( $facebook_info, 'https://www.facebook.com/') ) {
									$facebook_id = str_replace( 'https://www.facebook.com/', '', $facebook_info );
								} else {
									$facebook_id = $facebook_info;
								}
							}

							$matches = array();
							$screen_name = false;

							if ( preg_match( '#^@?([a-z0-9_]+)$#i', $twitter_id, $matches ) ){
								$screen_name = $matches[1];
							} elseif ( preg_match( '#^(https?://)?(www\.)?twitter\.com/(\#!/)?([a-z0-9]+)$#i', $twitter_id, $matches ) ){
								$screen_name = $matches[4];
							}
							if ( $screen_name ) {
								echo '<li><a class="push" href="http://twitter.com/' . $screen_name . '/" target="_blank"><img src="http://www.paper-glasses.com/api/twipi/' . $screen_name . '/bigger/" class="img-responsive img-circle" ></a></li>';
							} else if( $facebook_id ){
								echo '<li><a class="push" href="https://www.facebook.com/' . $facebook_id . '/" target="_blank"><span style="display: block;background-image: url(https://graph.facebook.com/' . $facebook_id . '/picture/?type=normal); background-size: 100% auto;width: 70px;height: 70px;" class="img-responsive img-circle" ></span></a></li>';
							} else {
								echo '<li><img src="' . get_avatar_url( get_post_meta( $attendee_id, 'tix_email', true ) ) . '" class="img-responsive img-circle"  width="70" height="70" /></li>';
							}
							?>
							<?php
							$facebook_id = '';
							$facebook_info = '';
							$twitter_id = '';
							$printed++;

						} // foreach ?>
						<?php
						$camptix->filter_post_meta = false; // cleanup
					// } // while true
				?>
					<li class="more"><a href="<?php echo site_url( '/entry/#tix-attendees' ) ?>" class="img-circle">MORE...</a></li>
				</ul>

				<div class="entry-summary">
					<span class="current"> <?php $count = wp_count_posts( 'tix_attendee' ); echo ( $count->publish + $count->pending );?></span> / 253 ENTRY <a class="btn btn-warning btn-lg" href="<?php echo site_url( '/entry/' ) ?>"><i class="glyphicon glyphicon-flag"></i> ENTRY</a>
				</div>
			</div>
		</div>
	</section><!--/ entry-area-->
		<?php

		wp_reset_postdata();
		$content = ob_get_contents();
		ob_end_clean();
		// set_transient( $transient_key, array( 'content' => $content, 'time' => time() ), $cache_time );
		return $content;
}


echo top_entry_twitter_icon();

