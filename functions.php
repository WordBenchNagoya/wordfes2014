<?php

/**
 * include file
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

require locate_template( 'inc/extras.php' );
require locate_template( 'inc/jetpack.php' );
require locate_template( 'inc/scripts.php' );
require locate_template( 'inc/setup.php' );
require locate_template( 'inc/template-tags.php' );
require locate_template( 'inc/wrapper.php' );
require locate_template( 'inc/sidebar.php' );
require locate_template( 'inc/custom-post-type.php' );
require locate_template( 'inc/custom-taxonomy.php' );
require locate_template( 'inc/time-table.php' );

// class file
require locate_template( 'classes/class-wp-bootstrap-navwalker.php' );
require locate_template( 'classes/class-cleanup.php' );
require locate_template( 'classes/class-camptix-widgets.php' );
require locate_template( 'classes/class-wbn-title.php' );
