<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
	// Sidebars
	// register sidebar-primary
	register_sidebar(
		array(
			'name' => __( 'サイドバー', 'growcreater' ) ,
			'id' => 'sidebar-primary',
			'before_widget' => '<section class="widget widget-sidebar %1$s %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title ' . $type . ' secondary-border-top">',
			'after_title' => '</h3>',
		)
	);

	// register header-primary
	register_sidebar(
		array(
			'name' => __( 'ヘッダー広告エリア', 'growcreater' ) ,
			'id' => 'header-primary',
			'before_widget' => '<section class="widget widget-header %1$s %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title ' . $type . ' secondary-border-top">',
			'after_title' => '</h3>',
		)
	);

	// register main-visual-primary
	register_sidebar(
		array(
			'name' => __( 'メインヴィジュアルエリア', 'growcreater' ) ,
			'id' => 'main-visual-primary',
			'before_widget' => '<section class="widget widget-content %1$s %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title ' . $type . ' secondary-border-top">',
			'after_title' => '</h3>',
		)
	);

	// register content-primary
	register_sidebar(
		array(
			'name' => __( 'コンテンツ上部', 'growcreater' ) ,
			'id' => 'content-primary',
			'before_widget' => '<section class="widget widget-content %1$s %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title ' . $type . ' secondary-border-top">',
			'after_title' => '</h3>',
		)
	);

	// register content-secondary
	register_sidebar(
		array(
			'name' => __( 'コンテンツ下部', 'growcreater' ) ,
			'id' => 'content-secondary',
			'before_widget' => '<section class="widget widget-content %1$s %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title ' . $type . ' secondary-border-top">',
			'after_title' => '</h3>',
		)
	);

	// register footer-secondary
	register_sidebar(
		array(
			'name' => __( 'フッター', 'growcreater' ) ,
			'id' => 'footer-primary',
			'before_widget' => '<section class="widget widget-footer %1$s %2$s col-xs-24 col-lg-6 col-md-6">',
			'after_widget' => '</section>',
			'before_title' => '<h3 class="widget-title ' . $type . ' secondary-border-top">',
			'after_title' => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'roots_widgets_init' );
