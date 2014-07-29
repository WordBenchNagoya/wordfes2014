<?php
/**
 * Custom Template Tag
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2014
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

if ( ! function_exists( 'wordfes2014_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function wordfes2014_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'wordfes2014' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'wordfes2014' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'wordfes2014' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wordfes2014_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function wordfes2014_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next
				 && ! $previous ) {
		return;
	}
		?>
		<nav class="navigation post-navigation" role="navigation">
				<div class="nav-links clearfix">
						<?php
								previous_post_link( '<div class="nav-previous btn btn-default pull-left">%link</div>', _x( '<span class="meta-nav"><i class="dashicons dashicons-arrow-left"></i> </span> %title', '前の記事一覧へ', 'growcreater' ) );
								next_post_link(     '<div class="nav-next btn btn-default pull-right">%link</div>',     _x( '%title <span class="meta-nav"><i class="dashicons dashicons-arrow-right"></i> </span>', '次の記事一覧へ',     'growcreater' ) );
						?>
				</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
}
endif;

if ( ! function_exists( 'wordfes2014_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wordfes2014_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( 'Posted on %s', 'post date', 'wordfes2014' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'wordfes2014' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wordfes2014_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wordfes2014_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wordfes2014_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wordfes2014_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wordfes2014_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wordfes2014_categorized_blog.
 */
function wordfes2014_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'wordfes2014_categories' );
}
add_action( 'edit_category', 'wordfes2014_category_transient_flusher' );
add_action( 'save_post',     'wordfes2014_category_transient_flusher' );

/**
 * Add social Share Butin
 */
add_shortcode( 'social_btn', 'wordfes2014_social_btn' );
function wordfes2014_social_btn(){
	if ( function_exists( 'wp_social_bookmarking_light_output_e' ) ) {
		wp_social_bookmarking_light_output_e();
	}
}

function wordfes2014_the_term( $post_id, $taxonomy ){
	$output = '';
	$terms = get_the_terms( $post_id, $taxonomy );
	foreach ( $terms as $key => $term ) {
		$output = $term->name;
	}

	echo esc_html( $output );
}
