<?php

/**
 * Theme Setup
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */


if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wordfes2014_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	add_action( 'after_setup_theme', 'wordfes2014_setup' );
	function wordfes2014_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wordfes2014, use a find and replace
		 * to change 'wordfes2014' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'wordfes2014', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'wordfes2014' ),
			// 'sub-primary' => __( 'プライマリーメニュー (仮)', 'wordfes2014' ),
		) );


		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'quote', 'link',
		) );

	}
endif; // wordfes2014_setup


/**
 * Display Sidebar Settings
 * @return boolean $display
 */
function wordfes2014_display_sidebar(){

	$display = true;

	/**
	 * ワンカラムが選択されているか、404ページの時は非表示
	 */
	if ( 'one_column' === get_field( 'template_layout' ) ||
			is_404() ) {
		$display = false;
	}

	return $display;

}

/**
 * Main Class Setting
 * @return string $main_class
 */
function wordfes2014_main_class(){

	if ( wordfes2014_display_sidebar() ) {
		$main_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
	} else {
		$main_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
	}

	echo $main_class;

}

/**
 * Display Dashicon
 * @return void
 */

add_action( 'wp_enqueue_scripts', 'themename_scripts' );
function themename_scripts() {
		wp_enqueue_style( 'themename-style', get_stylesheet_uri(), array( 'dashicons' ), '1.0' );
}


/**
 * Editor Style
 * @return add editor style
 */
function my_theme_add_editor_styles()
{
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


/**
 * Admin Bar Menu
 *
 * @param object $wp_admin_bar
 * @return void
 */

add_action( 'admin_bar_menu', 'customize_admin_bar_menu', 9999 );

function customize_admin_bar_menu( $wp_admin_bar )
{

	$title = sprintf(
		'<span class="" style="font-size:13px;">テンプレート : </span> <span class="ab-label">%s</span>',
		show_template()
	);
	$wp_admin_bar->add_menu(
		array(
			'id'    => 'admin_bar_template_name',
			'meta'  => array(),
			'title' => $title,
			'href'  => admin_url( '/theme-editor.php?file=' . show_template() . '&theme=wordfes2014' )
		)
	);
}

/**
 * Template Name
 * @return string $template
 */
function show_template() {

	global $template;
	return basename( $template );

}


/**
 * Protect entry form redirect
 *
 * @return [type]       [description]
 */

// add_action( 'template_redirect', 'protect_entry_form', 10 );

// function protect_entry_form(  ){

//   global $post, $wp_query;

//   if ( is_page( 'entry' )
//        && ! is_user_logged_in() ) {

//     if ( 'true' !== $_GET['staff'] &&
//          ! $_GET['tix_action'] ) {

//       wp_redirect( site_url() , $status = 302 );

//     }

//   }

//   return false;

// }

/**
 * Print page css
 * @return void
 */
add_action( 'wp_head', 'print_page_css', 10, 1 );

function print_page_css(){

	global $post;

	// pages css file root "wordfes2014/assets/css/pages/"
	$page_css_root = get_stylesheet_directory() . '/assets/css/pages/';

	if ( file_exists( $page_css_root . $post->post_name . '.css' ) ) {
		$css_file_url  = get_stylesheet_directory_uri() . '/assets/css/pages/' . $post->post_name . '.css';
		echo '<link rel="stylesheet" href="' . $css_file_url . '">';
	}

}

/**
 * Replace Defautl Gallery
 *
 * @return string $output : HTML of Gallery
 */
add_filter( 'post_gallery', 'wordfes2014_gallery_shortcode_filter', 0, 2 );
function wordfes2014_gallery_shortcode_filter( $empty, $attr ) {

	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}


	// $html5 = current_theme_supports( 'html5', 'gallery' );
	$html5 = false;

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'full',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery'));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$icontag = tag_escape($icontag);
	$valid_tags = wp_kses_allowed_html( 'post' );
	if ( ! isset( $valid_tags[ $itemtag ] ) )
		$itemtag = 'dl';
	if ( ! isset( $valid_tags[ $captiontag ] ) )
		$captiontag = 'dd';
	if ( ! isset( $valid_tags[ $icontag ] ) )
		$icontag = 'dt';

	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';

	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";

	/**
	 * Filter the default gallery shortcode CSS styles.
	 *
	 * @since 2.5.0
	 *
	 * @param string $gallery_style Default gallery shortcode CSS styles.
	 * @param string $gallery_div   Opening HTML div container for the gallery shortcode output.
	 */
	$output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		if ( ! empty( $link ) && 'file' === $link )
			$image_output = wp_get_attachment_link( $id, $size, false, false );
		elseif ( ! empty( $link ) && 'none' === $link )
			$image_output = wp_get_attachment_image( $id, $size, false );
		else
			$image_output = wp_get_attachment_link( $id, $size, true, false );

		$image_meta  = wp_get_attachment_metadata( $id );

		$orientation = '';
		if ( isset( $image_meta['height'], $image_meta['width'] ) )
			$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon {$orientation}'>
				$image_output
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
			$output .= '<br style="clear: both" />';
		}
	}

	if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
		$output .= "
			<br style='clear: both' />";
	}

	$output .= "
		</div>\n";

	return $output;
}

/**
 * include sponsor module
 * @return void
 */

add_action( 'get_footer', 'include_sponsor_module', 10, 1 );

function include_sponsor_module(){
	// if ( is_user_logged_in() ) {
	include get_stylesheet_directory() . '/modules/sponsor.php';
	// }
}


/**
 * change wp pagenavi style
 */

add_filter( 'wp_pagenavi', 'wordfes2014_bootstrap_pagination', 10, 2 );

function wordfes2014_bootstrap_pagination( $html ){
	$out = '';

	//wrap a's and span's in li's
	$out = str_replace( '<div' , '' , $html );
	$out = str_replace( "class='wp-pagenavi'>" , '' , $out );
	$out = str_replace( '<a', '<li><a' , $out );
	$out = str_replace( '</a>' , '</a></li>' , $out );
	$out = str_replace( '<span' , '<li><span' ,$out );
	$out = str_replace( '</span>' , '</span></li>' , $out );
	$out = str_replace( '</div>' , '' , $out );

	return '<div class=" pagination-centered"><ul class="pagination primary-color">' . $out . '</ul></div>';

}


/**
 * TinyMCE Customize
 * @param array $buttons
 */
add_filter( 'mce_buttons_3', 'add_more_buttons' );

function add_more_buttons( $buttons ) {
	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';
	$buttons[] = 'backcolor';

	return $buttons;
}
