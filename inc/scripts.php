<?php
/**
 * Javascript, CSS の登録
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

add_action( 'wp_enqueue_scripts', 'wordfes2014_scripts', 100 );

function wordfes2014_scripts() {

  // wp_enqueue_style( 'wordfes2014_style', get_template_directory_uri() . '/assets/css/main.min.css', false, 'b86b9697ac7ddf0cecc8c346ec02452d' );

	if ( ! is_admin() ) {

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, true );

	}

	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_register_script( 'wordfes2014_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), 'd5f17729b0025cd15b71aa1b830f1943', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'wordfes2014_scripts' );

}
