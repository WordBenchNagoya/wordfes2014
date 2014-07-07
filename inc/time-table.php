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
		<thead>
			<tr class="hidden-sm hidden-xs">
				<th></th>
				<?php
				// classroom
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false ) );
				foreach ( $stage_terms as $stage_key => $stage ) { ?>
				<th class="stage<?php echo esc_attr( $stage_key ) + 1; ?>"><?php echo esc_attr( $stage->name ); ?> <br>
				<?php echo esc_html( $stage->description ); ?></th>
				<?php
				}
				?>
			</tr>
		</thead>

		<tr>
			<th><strong>SESSION1</strong> <br>
			11:00-11:45</th>
			<?php
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false ) );

				foreach ( $stage_terms as $stage_key => $stage ) { ?>
				<td>
					<dl>
					<?php
					$session_args = get_posts(
						array(
							'post_type'      => 'session',
							'posts_per_page' => 1,
							'tax_query'      => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'timezone',
									'field'    => 'slug',
									'terms'    => 'session1',
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
						<dt><a href="<?php the_permalink(); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
						<dd>
							<i class="glyphicon glyphicon-user"></i><?php echo esc_html( get_field( $session->post_title ) ) ?><br>
							<span class="visible-xs visible-sm grenn">A教室(Green Stage)</span>
							<i class="level_expert level_icon">上級者向け</i>
						</dd>
					<?php
					}
					?>
				</dl>
			</td>
			<?php
				}
			?>
		</tr>

		<tr>
			<th>11:45-13:15</th>
			<td colspan="4" class="rest">昼食休憩（90分）</td>
		</tr>

		<tr>
			<th><strong>SESSION2</strong><br>
			13:15-14:00</th>
			<?php
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false ) );

				foreach ( $stage_terms as $stage_key => $stage ) { ?>
				<td>
					<dl>
					<?php
					$session_args = get_posts(
						array(
							'post_type'      => 'session',
							'posts_per_page' => 1,
							'tax_query'      => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'timezone',
									'field'    => 'slug',
									'terms'    => 'session2',
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
						<dt><a href="<?php echo get_the_permalink( $session->ID ); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
						<dd>
							<i class="glyphicon glyphicon-user"></i><?php echo esc_html( get_field( $session->post_title ) ) ?><br>
							<span class="visible-xs visible-sm grenn">A教室(Green Stage)</span>
							<i class="level_expert level_icon">上級者向け</i>
						</dd>
					<?php
					}
					?>
				</dl>
			</td>
			<?php
				}
			?>
		</tr>



		<tr>
			<th>14:00-14:15</th>
			<td colspan="4" class="rest">休憩</td>
		</tr>
		<tr>

			<th><strong>SESSION3</strong><br>14:15-15:00</th>
			<?php
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false ) );

				foreach ( $stage_terms as $stage_key => $stage ) { ?>
				<td>
					<dl>
					<?php
					$session_args = get_posts(
						array(
							'post_type'      => 'session',
							'posts_per_page' => 1,
							'tax_query'      => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'timezone',
									'field'    => 'slug',
									'terms'    => 'session3',
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
						<dt><a href="<?php the_permalink(); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
						<dd>
							<i class="glyphicon glyphicon-user"></i><?php echo esc_html( get_field( $session->post_title ) ) ?><br>
							<span class="visible-xs visible-sm grenn">A教室(Green Stage)</span>
							<i class="level_expert level_icon">上級者向け</i>
						</dd>
					<?php
					}
					?>
				</dl>
			</td>
			<?php
				}
			?>
		</tr>

		<tr>
			<th>15:00-15:15</th>
			<td colspan="4" class="rest">休憩</td>
		</tr>

		<tr>
			<th><strong>SESSION4</strong><br>15:15-16:00</th>
			<?php
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false ) );

				foreach ( $stage_terms as $stage_key => $stage ) { ?>
				<td>
					<dl>
					<?php

					$session_args = get_posts(
						array(
							'post_type'      => 'session',
							'posts_per_page' => 1,
							'tax_query'      => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'timezone',
									'field'    => 'slug',
									'terms'    => 'session4',
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
						<dt><a href="<?php the_permalink(); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
						<dd>
							<i class="glyphicon glyphicon-user"></i><?php echo esc_html( get_field( $session->post_title ) ) ?><br>
							<span class="visible-xs visible-sm grenn">A教室(Green Stage)</span>
							<i class="level_expert level_icon"><?php echo get_the_term( $session->ID, 'target' ) ;?></i>
						</dd>
					<?php
					} ?>
				</dl>
			</td>
			<?php
				}
			?>
		</tr>

		<tr>
			<th>16:00-16:45</th>
			<td></td>
			<td>&nbsp;</td>
			<td></td>
			<td></td>
		</tr>
	</table>
	<table class="table table-bordered time-table">
		<col class="time">
		<tr>
			<th scope="row">16:45-17:30</th>
			<td>懇親会開場へ移動</td>
		</tr>
		<tr>
			<th scope="row">17:30-19:30</th>
			<td>懇親会</td>
		</tr>
		<tr>
			<th scope="row">19:45</th>
			<td>南浜荘へ移動</td>
		</tr>
		<tr>
			<th scope="row"> 21:00</th>
			<td>南浜荘到着</td>
		</tr>
	</table>
	</section>
<?php

}


