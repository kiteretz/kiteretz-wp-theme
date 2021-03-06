<?php

if ( ! function_exists( 'ktrz_setup' ) ) {
/**
 * Set up theme defaults and registers support for various WordPress feaures.
 */
function ktrz_setup() {
	load_theme_textdomain( 'ktrz', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
	add_theme_support( 'custom-background', apply_filters( 'ktrz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'ktrz' ),
	) );
}

}
add_action( 'after_setup_theme', 'ktrz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ktrz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ktrz_content_width', 960 );
}
add_action( 'after_setup_theme', 'ktrz_content_width', 0 );

/**
 * Register widget area.
 */
function ktrz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ktrz' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ktrz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ktrz_scripts() {

	wp_enqueue_style( 'ktrz-style', get_template_directory_uri() . '/assets/css/main.css', array(), '20171229060054' );

	wp_enqueue_script( 'ktrz-script', get_template_directory_uri() . '/assets/js/main.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ktrz_scripts' );

/**
 * Plugin Name: Add Meta to REST-API
 * Author: Takayuki Miyauchi
 * Description: Example plugin that adds post meta to rest-api.
 */
add_action( 'rest_api_init',  function() {
	register_rest_field(
		'post',        // post type
		'post_meta',   // rest-apiに追加するキー
		array(
			'get_callback'  => function( $object, $field_name, $request ) {
				// 出力したいカスタムフィールドのキーをここで定義
				$meta_fields = array(
					'heading',
					'ogimage',
				);
				$meta = array();
				foreach ( $meta_fields as $field ) {
					// バリデーションを一切してないので注意
					$meta[ $field ] = get_post_meta( $object[ 'id' ], $field, true );
				}
				return $meta;
			},
			'update_callback' => null,
			'schema'          => null,
		)
	);
} );

/**
 * Add loading="lazy" decoding="async" attributes to img
 */
add_filter( 'the_content', function( $content ) {
	$content = str_replace( '<img ', '<img loading="lazy" decoding="async" ', $content );
	return $content;
} );
