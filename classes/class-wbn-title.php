<?php
/**
 * ページタイトルウィジェット
 */

add_action( 'widgets_init', 'register_title_widget' );
function register_title_widget(){
	register_widget( 'WBN_Title_Widget' );

}

class WBN_Title_Widget extends WP_Widget {
	private $fields = array(
		// 'title'          => 'Title (optional)',
		// 'street_address' => 'Street Address',
	);

	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_wbn_title',
			'description' => __( 'タイトル見出し', 'wordfes2014' ) );

		$this->WP_Widget( 'widget_wbn_title', __( '大見出しウィジェット', 'wordfes2014' ), $widget_ops );
		$this->alt_option_name = 'widget_wbn_title';

		add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		$cache = wp_cache_get( 'widget_wbn_title', 'widget' );

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = null;
		}

		if ( isset( $cache[$args['widget_id']] ) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( '', 'wordfes2014' ) : $instance['title'], $instance, $this->id_base );

		foreach ( $this->fields as $name => $label ) {
			if ( ! isset( $instance[$name] ) ) {
				$instance[$name] = '';
			}
		}

		echo $before_widget;

		if ( $title ) {
			echo $before_title, $title, $after_title;
		}
		global $post;
		$post_type = get_post_type( $post->ID );

		switch ( $post_type ) {
			case 'session' : ?>
		<header class="page-title-area">
			<div class="container">
				<h1 class="page-title text-center">SESSION</h1>
				<p class="page-sub-title text-center ">セッション詳細</p>
			</div>
		</header>
				<?php
				break;
			case 'post' : ?>
		<header class="page-title-area">
			<div class="container">
				<h1 class="page-title text-center">STAFF BLOG</h1>
				<p class="page-sub-title text-center ">スタッフブログ</p>
			</div>
		</header>
				<?php
				break;
			case 'topics' : ?>
		<header class="page-title-area">
			<div class="container">
				<h1 class="page-title text-center">TOPICS</h1>
				<p class="page-sub-title text-center ">お知らせ</p>
			</div>
		</header>
				<?php
				break;

			default: ?>

		<header class="page-title-area">
			<div class="container">
				<h1 class="page-title text-center"><?php the_title(); ?></h1>
				<?php if ( get_field( 'post_sub_title' ) ) : ?>
				<p class="page-sub-title text-center "><?php the_field( 'post_sub_title' ) ?></p>
				<?php endif; ?>
			</div>
		</header>

				<?php
				break;
		}

	?>

	<?php
		echo $after_widget;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_wbn_title', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = array_map( 'strip_tags', $new_instance );

		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );

		if ( isset( $alloptions['widget_wbn_title'] ) ) {
			delete_option( 'widget_wbn_title' );
		}

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( 'widget_wbn_title', 'widget' );
	}

	function form( $instance ) {
		foreach( $this->fields as $name => $label ) {
			${ $name } = isset( $instance[$name] ) ? esc_attr( $instance[$name] ) : '';
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'wordfes2014'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
		</p>
		<?php
		}
	}
}
