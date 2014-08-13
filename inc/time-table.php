<?php

/**
 * Time Table
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

add_shortcode( 'time_table', 'print_time_table' );

function print_time_table()
{
?>

<section class="post-content clearfix" itemprop="articleBody">
	<table class="table table-bordered time-table">
		<col class="time">
		<col class="stage1">
		<col class="stage2">
		<col class="stage3">
		<col class="stage4">
		<col class="stage5">
		<thead>
			<tr class="hidden-sm hidden-xs">
				<th></th>
				<?php
				// classroom
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false, 'orderby' => 'order' ) );
				foreach ( $stage_terms as $stage_key => $stage ) {
					/**
					 * チャレンジステージの場合
					 * @var
					 */
					if ( $stage->slug === 'challenge-stage' ) { ?>
						<th colspan="2" class="stage<?php echo esc_attr( $stage_key ) + 1; ?>"><?php echo esc_attr( $stage->name ); ?> <br>
							<?php
							echo esc_html( $stage->description );?>
							<small>(
							<?php
							echo esc_html( get_field( 'classroom_parson', $stage ) ); ?>
							)
							<br>
							</small>
							</th>
					<?php
					} else { ?>
						<th  width="200" class="stage<?php echo esc_attr( $stage_key ) + 1; ?>"><?php echo esc_attr( $stage->name ); ?> <br>
							<?php
							echo esc_html( $stage->description );?>
							<small>(
							<?php
							echo esc_html( get_field( 'classroom_parson', $stage ) ); ?>
							)
							</small>
						</th>
						<?php
					}
				}
				?>
			</tr>
		</thead>
		<tr class="hidden-sm hidden-xs">
			<th>
			</th>
			<td class="stage1">
			<a href="http://www.ustream.tv/channel/WordBench-Nagoya" target="_blank">Ustream (ネット中継)</a>
			</td>
			<td class="stage2">
			<a href="http://www.ustream.tv/channel/WordFes" target="_blank">Ustream (ネット中継)</a>
			</td>
			<td class="stage3">
			<a href="http://www.ustream.tv/channel/WordFes2" target="_blank">Ustream (ネット中継)</a>
			</td>
			<td colspan="2">
			</td>
		</tr>

		<tr>
			<th>10:00-</th>
			<td colspan="5" class="rest">開場</td>

		</tr>

		<tr>
			<th>10:45-11:00</th>
			<td>開会式</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="session1">
			<th><strong>─ SESSION1 ─</strong>
			<?php echo esc_html( get_term( 19, 'timezone' )->description ); ?></th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2014_timetable_meta( 'session1', $stage );
			}
			?>
		</tr>

		<tr>
			<th>11:45-13:15</th>
			<td class="rest"><a href="http://2014.wordfes.org/sessions/lunch-meetup/">Lunch MeetUp!</a></td>
			<td class="rest">昼食休憩</td>
			<td class="rest"><a href="http://2014.wordfes.org/sessions/lunch-workshop/">ランチタイムハンズオン</a></td>
			<td colspan="2" class="rest">昼食休憩（90分）</td>
		</tr>

		<tr class="session2">
			<th><strong>─ SESSION2 ─</strong>
			<?php echo esc_html( get_term( 20, 'timezone' )->description ); ?></th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2014_timetable_meta( 'session2', $stage );
			}
			?>
		</tr>



		<tr>
			<th>14:00-14:15</th>
			<td colspan="5" class="rest">休憩</td>
		</tr>
		<tr class="session3">

			<th><strong>─ SESSION3 ─</strong>
			<?php echo esc_html( get_term( 21, 'timezone' )->description ); ?></th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2014_timetable_meta( 'session3', $stage );
			}
			?>
		</tr>

		<tr>
			<th>15:00-15:15</th>
			<td colspan="5" class="rest">休憩</td>
		</tr>

		<tr class="session4">
			<th><strong>─ SESSION4 ─</strong>
			<?php echo esc_html( get_term( 22, 'timezone' )->description ); ?></th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2014_timetable_meta( 'session4', $stage );
			} ?>
		</tr>

		<tr>
			<th><strong>─ LT大会 ─</strong>
      16:05-16:50
      </th>
			<td>LT大会</td>
			<td>&nbsp;</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<table class="table table-bordered time-table">
		<col class="col">
		<tr>
			<th scope="row">16:50-17:30</th>
			<td>懇親会会場へ移動</td>
		</tr>
		<tr>
			<th scope="row">17:30-19:30</th>
			<td>懇親会</td>
		</tr>
		<tr>
			<th scope="row">19:45-20:00</th>
			<td>バス乗車</td>
		</tr>
		<tr>
			<th scope="row">20:45-21:15</th>
			<td>南浜荘到着</td>
		</tr>
	</table>
	</section>
	
		<table class="table table-bordered time-table">
		<col class="col">
		<tr>
			<th scope="row">8/31 (日)<br>11:00-</th>
			<td><a href="http://2014.wordfes.org/inuyama-tour/">2日目ツアー：国宝犬山城 城下町ぶらり食べあるき</a></td>
		</tr>
	</table>
	</section>

<?php

}


function wordfes2014_timetable_meta( $timezone, $stage ){

	if ( ! $timezone || ! $stage ) {
		return;
	}
	if ( $stage->slug !== 'challenge-stage' ) : ?>

		<td class="<?php echo esc_html( $stage->slug ); ?>">
			<dl>
			<?php
			$session_args = get_posts(
				array(
					'post_type'      => 'session',
					'post_status' => array( 'publish', 'private' ),
					'posts_per_page' => 1,
					'tax_query'      => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'timezone',
							'field'    => 'slug',
							'terms'    => $timezone,
						),
						array(
							'taxonomy' => 'classroom',
							'field'    => 'id',
							'terms'    => $stage->term_id,
						),
					)
				)
			);

			foreach ( $session_args as $session_key => $session ) { ?>
				<dt><a href="<?php echo esc_url( get_the_permalink( $session->ID ) ); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
				<dd>
					<i class="glyphicon glyphicon-user"></i> <?php echo esc_html( get_field( 'session_speaker_name', $session->ID ) ) ?><br>
					<span class="visible-xs visible-sm"><?php echo esc_html( $stage->name ); ?>(<?php echo esc_html( $stage->description ); ?>）</span>
          <?php
          $target_terms = get_the_terms( $session->ID, 'target' );
          foreach ( $target_terms as $key => $target ) { ?>
            <i class="level_<?php echo esc_html( $target->slug );?> level_icon"><?php echo esc_html( $target->name );?></i>
          <?php
          } ?>
					<?php wordfes2014_post_edit_link( $session->ID ); ?>
				</dd>
			<?php
			}
			?>
			</dl>
		</td>

	<?php else : ?>

		<td class="<?php echo esc_html( $stage->slug ); ?>">
			<dl>

			<?php
			$session_args = get_posts(
				array(
					'post_type'      => 'session',
					'post_status' => array( 'publish', 'private' ),
					'posts_per_page' => 1,
					'tax_query'      => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'timezone',
							'field'    => 'slug',
							'terms'    => $timezone,
						),
						array(
							'taxonomy' => 'classroom',
							'field'    => 'id',
							'terms'    => $stage->term_id,
						),
					)
				)
			);

			foreach ( $session_args as $session_key => $session ) { ?>
				<dt><a href="<?php echo esc_url( get_the_permalink( $session->ID ) ); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
				<dd>
					<i class="glyphicon glyphicon-user"></i> <?php echo esc_html( get_field( 'session_speaker_name', $session->ID ) ) ?><br>
					<span class="visible-xs visible-sm grenn"><?php echo esc_html( $stage->name ); ?>(<?php echo esc_html( $stage->description ); ?>）</span>
					<i class="level_<?php wordfes2014_the_term( $session->ID, 'target', 'slug' );?> level_icon"><?php wordfes2014_the_term( $session->ID, 'target' );?></i>
					<?php wordfes2014_post_edit_link( $session->ID ); ?>
				</dd>
			<?php
			}
			?>
			</dl>
		</td>

		<td class="<?php echo esc_html( $stage->slug ); ?>">
			<dl>
			<?php
			$session_args = get_posts(
				array(
					'post_type'      => 'session',
					'post_status' => array( 'publish', 'private' ),
					'offset' => 1,
					'posts_per_page' => 1,
					'tax_query'      => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'timezone',
							'field'    => 'slug',
							'terms'    => $timezone,
						),
						array(
							'taxonomy' => 'classroom',
							'field'    => 'id',
							'terms'    => $stage->term_id,
						),
					)
				)
			);

			foreach ( $session_args as $session_key => $session ) { ?>
				<dt><a href="<?php echo esc_url( get_the_permalink( $session->ID ) ); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
				<dd>
					<i class="glyphicon glyphicon-user"></i> <?php echo esc_html( get_field( 'session_speaker_name', $session->ID ) ) ?><br>
					<span class="visible-xs visible-sm grenn"><?php echo esc_html( $stage->name ); ?>(<?php echo esc_html( $stage->description ); ?>）</span>
					<i class="level_<?php wordfes2014_the_term( $session->ID, 'target', 'slug' );?> level_icon"><?php wordfes2014_the_term( $session->ID, 'target' );?></i>
					<?php wordfes2014_post_edit_link( $session->ID ); ?>
				</dd>
			<?php
			}
			?>
			</dl>
		</td>
	<?php
	endif;
}
