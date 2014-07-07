<?php

/**
 * Custom Taxonomy Settings
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

// Hook into the 'init' action
add_action( 'init', 'wordfes2014_taxonomy', 0 );

/**
 * WordFes 2014 All Register taxonomy
 *
 * @return void : register taxonomy
 */
function wordfes2014_taxonomy() {

	/**
	 * sponsor category labels
	 * @var array
	 */

	$sponsor_labels = array(
		'name'                       => _x( 'スポンサーカテゴリ', 'Taxonomy General Name', 'wordfes2014' ),
		'singular_name'              => _x( 'スポンサーカテゴリ', 'Taxonomy Singular Name', 'wordfes2014' ),
		'menu_name'                  => __( 'スポンサーカテゴリ', 'wordfes2014' ),
		'all_items'                  => __( 'すべてのスポンサーカテゴリ', 'wordfes2014' ),
		'parent_item'                => __( '親スポンサーカテゴリ', 'wordfes2014' ),
		'parent_item_colon'          => __( '親スポンサーカテゴリ:', 'wordfes2014' ),
		'new_item_name'              => __( '新しいスポンサーカテゴリ', 'wordfes2014' ),
		'add_new_item'               => __( '新しいスポンサーカテゴリを追加', 'wordfes2014' ),
		'edit_item'                  => __( 'スポンサーカテゴリを編集', 'wordfes2014' ),
		'update_item'                => __( 'スポンサーカテゴリを更新', 'wordfes2014' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2014' ),
		'search_items'               => __( 'スポンサーカテゴリを検索', 'wordfes2014' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2014' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2014' ),
		'not_found'                  => __( 'スポンサーカテゴリ見つかりませんでした。', 'wordfes2014' ),
	);
	$sponsor_args = array(
		'labels'                     => $sponsor_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register "sponsor" category
	register_taxonomy( 'sponsor_category', array( 'sponsored' ), $sponsor_args );

	/**
	 * Target category labels
	 * @var array
	 */

	$target_labels = array(
		'name'                       => _x( 'ターゲット', 'Taxonomy General Name', 'wordfes2014' ),
		'singular_name'              => _x( 'ターゲット', 'Taxonomy Singular Name', 'wordfes2014' ),
		'menu_name'                  => __( 'ターゲット', 'wordfes2014' ),
		'all_items'                  => __( 'すべてのターゲット', 'wordfes2014' ),
		'parent_item'                => __( '親ターゲット', 'wordfes2014' ),
		'parent_item_colon'          => __( '親ターゲット:', 'wordfes2014' ),
		'new_item_name'              => __( '新しいターゲット', 'wordfes2014' ),
		'add_new_item'               => __( '新しいターゲットを追加', 'wordfes2014' ),
		'edit_item'                  => __( 'ターゲットを編集', 'wordfes2014' ),
		'update_item'                => __( 'ターゲットを更新', 'wordfes2014' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2014' ),
		'search_items'               => __( 'ターゲットを検索', 'wordfes2014' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2014' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2014' ),
		'not_found'                  => __( 'ターゲット見つかりませんでした。', 'wordfes2014' ),
	);
	$target_args = array(
		'labels'                     => $target_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register target category
	register_taxonomy( 'target', array( 'session' ), $target_args );

	/**
	 * Class room category labels
	 * @var array
	 */

	$classroom_labels = array(
		'name'                       => _x( '教室', 'Taxonomy General Name', 'wordfes2014' ),
		'singular_name'              => _x( '教室', 'Taxonomy Singular Name', 'wordfes2014' ),
		'menu_name'                  => __( '教室', 'wordfes2014' ),
		'all_items'                  => __( 'すべての教室', 'wordfes2014' ),
		'parent_item'                => __( '親教室', 'wordfes2014' ),
		'parent_item_colon'          => __( '親教室:', 'wordfes2014' ),
		'new_item_name'              => __( '新しい教室', 'wordfes2014' ),
		'add_new_item'               => __( '新しい教室', 'wordfes2014' ),
		'edit_item'                  => __( '教室', 'wordfes2014' ),
		'update_item'                => __( '教室', 'wordfes2014' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2014' ),
		'search_items'               => __( '教室', 'wordfes2014' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2014' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2014' ),
		'not_found'                  => __( '教室が見つかりませんでした。', 'wordfes2014' ),
	);
	$classroom_args = array(
		'labels'                     => $classroom_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'classroom', array( 'session' ), $classroom_args );

	/**
	 * Class room category labels
	 * @var array
	 */

	$time_zone_labels = array(
		'name'                       => _x( 'タイムゾーン', 'Taxonomy General Name', 'wordfes2014' ),
		'singular_name'              => _x( 'タイムゾーン', 'Taxonomy Singular Name', 'wordfes2014' ),
		'menu_name'                  => __( 'タイムゾーン', 'wordfes2014' ),
		'all_items'                  => __( 'すべてのタイムゾーン', 'wordfes2014' ),
		'parent_item'                => __( '親タイムゾーン', 'wordfes2014' ),
		'parent_item_colon'          => __( '親タイムゾーン:', 'wordfes2014' ),
		'new_item_name'              => __( '新しいタイムゾーン', 'wordfes2014' ),
		'add_new_item'               => __( '新しいタイムゾーン', 'wordfes2014' ),
		'edit_item'                  => __( 'タイムゾーン', 'wordfes2014' ),
		'update_item'                => __( 'タイムゾーン', 'wordfes2014' ),
		'separate_items_with_commas' => __( 'アイテムをカンマで区切る', 'wordfes2014' ),
		'search_items'               => __( 'タイムゾーン', 'wordfes2014' ),
		'add_or_remove_items'        => __( '追加、または削除', 'wordfes2014' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'wordfes2014' ),
		'not_found'                  => __( 'タイムゾーンが見つかりませんでした。', 'wordfes2014' ),
	);
	$time_zone_args = array(
		'labels'                     => $time_zone_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'timezone', array( 'session' ), $time_zone_args );



}


