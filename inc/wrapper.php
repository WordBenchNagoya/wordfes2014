<?php

/**
 * Theme Wrapper
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

/**
 * Main template path
 * @return string
 */

function wordfes2014_template_path() {
	return Wordfes2014_Wrapping::$main_template;
}

/**
 * Base template path
 * @return string
 */

function wordfes2014_template_base() {
	return Wordfes2014_Wrapping::$base;
}

add_filter( 'template_include', array( 'Wordfes2014_Wrapping', 'wrap' ), 99 );

class Wordfes2014_Wrapping {

	/**
	 * Stores the full path to the main template file
	 */
	static $main_template;

	/**
	 * Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
	 */
	static $base;

	static function wrap( $template ) {
		self::$main_template = $template;

		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base ){
			self::$base = false;
		}

		$templates = array( 'base.php' );

		if ( self::$base ){
			array_unshift( $templates, sprintf( 'base-%s.php', self::$base ) );
		}

		return locate_template( $templates );
	}
}

