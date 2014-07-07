<?php

/**
 * =====================================================
 * @package    Grow Creater
 * @subpackage WordPress Theme Cleanup
 * @author     Grow Group
 * @license    GPLv2 or Later
 * @link       http://grow-group.jp
 * @copyright  2014 Grow Group
 * =====================================================
 */

class GC_Clean_Up
{

	public function __construct()
	{

		add_filter( 'the_generator', '__return_false' );

		add_filter( 'style_loader_tag', array( $this, 'wordfes2014_clean_style_tag' ) );
		// body class
		add_filter( 'body_class', array( $this, 'wordfes2014_body_class' ) );

		add_filter( 'embed_oembed_html', array( $this, 'wordfes2014_embed_wrap' ), 10, 4 );

		add_filter( 'img_caption_shortcode', array( $this, 'wordfes2014_caption' ), 10, 3 );

		add_filter( 'get_avatar', array( $this, 'wordfes2014_remove_self_closing_tags' ) );

		add_filter( 'comment_id_fields', array( $this, 'wordfes2014_remove_self_closing_tags' ) );

		add_filter( 'post_thumbnail_html', array( $this, 'wordfes2014_remove_self_closing_tags' ) );

		add_filter( 'request', array( $this, 'wordfes2014_request_filter' ) );

		add_filter( 'excerpt_length', array( $this, 'wordfes2014_excerpt_length' ) );

		add_filter( 'excerpt_more', array( $this, 'wordfes2014_excerpt_more' ) );

		add_filter( 'get_bloginfo_rss', array( $this, 'wordfes2014_remove_default_description' ) );

		add_filter( 'get_search_form', array( $this, 'wordfes2014_get_search_form' ) );

		add_filter( 'get_avatar', array( $this, 'wordfes2014_get_avatar' ), 10, 2 );

		add_filter( 'wp_page_menu_args', array( $this, 'wordfes2014_page_menu_args' ) );

		add_filter( 'wp_title', array( $this, 'wordfes2014_wp_title' ) , 10, 2 );

		add_action( 'wp', array( $this, 'wordfes2014_setup_author' ) );

		add_action( 'admin_init', array( $this, 'wordfes2014_remove_dashboard_widgets' ) );

		add_action( 'template_redirect', array( $this, 'wordfes2014_nice_search_redirect' ) );

	}


	/**
	 * wp_head clean up
	 * @return void
	 */
	public function wordfes2014_head_cleanup()
	{

		remove_action( 'wp_head', 'feed_links', 2 );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

		global $wp_widget_factory;

		remove_action( 'wp_head',
			array(
				$wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
				'recent_comments_style',
			)
		);

	}

	/**
	 * Clean up output of stylesheet <link> tags
	 *
	 * @param  string $input
	 * @return string <link> tag
	 */

	public function wordfes2014_clean_style_tag( $input )
	{

		preg_match_all( "!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches );

		// Only display media if it is meaningful
		$media = $matches[3][0] !== '' && $matches[3][0] !== 'all' ? ' media="' . $matches[3][0] . '"' : '';

		return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";

	}

	/**
	 * Add and remove body_class() classes
	 *
	 * @param  string $classes
	 * @return array $classes
	 */

	public function wordfes2014_body_class( $classes )
	{

		// Add post/page slug
		if ( is_single()
			 || is_page()
			 && ! is_front_page() ) {

			$classes[] = basename( get_permalink() );

		}

		// Remove unnecessary classes
		$home_id_class = 'page-id-' . get_option( 'page_on_front' );

		$remove_classes = array(
			'page-template-default',
			$home_id_class,
		);

		$classes = array_diff( $classes, $remove_classes );

		return $classes;
	}

	/**
	 * Wrap embedded media as suggested by Readability
	 *
	 * @link https://gist.github.com/965956
	 * @link http://www.readability.com/publishers/guidelines#publisher
	 */

	public function wordfes2014_embed_wrap( $cache, $url, $attr = '', $post_ID = '' )
	{
		return '<div class="entry-content-asset">' . $cache . '</div>';
	}

	/**
	 * Add Bootstrap thumbnail styling to images with captions
	 * Use <figure> and <figcaption>
	 *
	 * @link http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
	 */

	public function wordfes2014_caption( $output, $attr, $content )
	{

		if ( is_feed() ) {
			return $output;
		}

		$defaults = array(
			'id' => '',
			'align' => 'alignnone',
			'width' => '',
			'caption' => '',
		);

		$attr = shortcode_atts( $defaults, $attr );

		// If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
		if ( $attr['width'] < 1
				 || empty( $attr['caption'] ) ) {
			return $content;
		}

		// Set up the attributes for the caption <figure>
		$attributes = ( ! empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
		$attributes .= ' class="thumbnail wp-caption ' . esc_attr( $attr['align'] ) . '"';
		$attributes .= ' style="width: ' . ( esc_attr( $attr['width'] ) + 10 ) . 'px"';

		$output = '<figure' . $attributes . '>';
		$output .= do_shortcode( $content );
		$output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
		$output .= '</figure>';

		return $output;
	}

	/**
	 * Remove unnecessary dashboard widgets
	 *
	 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
	 */
	public function wordfes2014_remove_dashboard_widgets()
	{
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	}

	/**
	 *  Clean up the_excerpt()
	 *
	 * @param  Integer $length
	 * @return Integer excerpt typos
	 */

	public function wordfes2014_excerpt_length( $length )
	{

		return $length = 140;

	}

	/**
	 * Excerpt more button
	 *
	 * @param  string $more
	 * @return string <a> tag
	 */
	public function wordfes2014_excerpt_more( $more )
	{

		$more = ' &hellip; <a href="' . get_permalink() . '" class="btn btn-sm btn-dimensional">' . __( '続きを読む', 'wordfes2014' ) . '</a>';

		return apply_filters( 'wordfes2014_more_button', $more );

	}

	/**
	 * Remove unnecessary self-closing tags
	 */
	public function wordfes2014_remove_self_closing_tags( $input )
	{

		return str_replace( ' />', '>', $input );

	}

	/**
	 * Don't return the default description in the RSS feed if it hasn't been changed
	 */
	public function wordfes2014_remove_default_description( $bloginfo )
	{

		$default_tagline = 'Just another WordPress site';

		return ( $bloginfo === $default_tagline ) ? '' : $bloginfo;

	}

	/**
	 * Redirects search results from /?s=query to /search/query/, converts %20 to +
	 *
	 * @link http://txfx.net/wordpress-plugins/nice-search/
	 */
	public function wordfes2014_nice_search_redirect()
	{

		global $wp_rewrite;

		if ( ! isset( $wp_rewrite )
				 || ! is_object( $wp_rewrite )
				 || ! $wp_rewrite->using_permalinks() ) {

			return;

		}

		$search_base = $wp_rewrite->search_base;

		if ( is_search()
				 && ! is_admin()
				 && strpos( $_SERVER['REQUEST_URI'], "/{$search_base}/" ) === false ) {

			wp_redirect( home_url( "/{$search_base}/" . urlencode( get_query_var( 's' ) ) ) );

			exit();

		}

		if ( current_theme_supports( 'nice-search' ) ) {

			return;

		}
	}



	/**
	 * Fix for empty search queries redirecting to home page
	 *
	 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
	 * @link http://core.trac.wordpress.org/ticket/11330
	 */
	public function wordfes2014_request_filter( $query_vars )
	{

		if ( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {

			$query_vars['s'] = ' ';

		}

		return $query_vars;

	}

	/**
	 * Tell WordPress to use searchform.php from the templates/ directory
	 */

	public function wordfes2014_get_search_form( $form )
	{

		$form = '';

		locate_template( '/modules/searchform.php', true, false );

		return $form;

	}

	/**
	 * Sets the authordata global when viewing an author archive.
	 *
	 * @global WP_Query $wp_query WordPress Query object.
	 * @return void
	 */

	public function wordfes2014_setup_author()
	{

		global $wp_query;

		if ( $wp_query->is_author()
				 && isset( $wp_query->post ) ) {

				$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
		}
	}

	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */

	public function wordfes2014_wp_title( $title, $sep )
	{
		if ( is_feed() )
			return $title;

		global $page, $paged;

		$title .= get_bloginfo( 'name', 'display' );

		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) ) {

				$title .= " $sep $site_description";

		}

		if ( $paged >= 2 || $page >= 2 ) {

				$title .= " $sep " . sprintf( __( 'Page %s', 'wordfes2014' ) , max( $paged, $page ) );

		}

		return $title;
	}

	/**
	 * get avater
	 * @param  [type] $avatar
	 * @param  [type] $type
	 * @return [type]
	 */
	function wordfes2014_get_avatar( $avatar, $type )
	{
			if ( ! is_object( $type ) ) return $avatar;

			$avatar = str_replace( "class='avatar", "class='avatar pull-left media-object", $avatar );

			return $avatar;
	}

	/**
	 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
	 *
	 * @param array $args Configuration arguments.
	 * @return array
	 */

	public function wordfes2014_page_menu_args( $args )
	{
			$args['show_home'] = true;

			return $args;
	}

}

$cleanup = new GC_Clean_Up();
