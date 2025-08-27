<?php
function mytheme_scripts() {
    // Подключаем стили
      wp_enqueue_style('fonts', 'https://fonts.googleapis.com');
      wp_enqueue_style('fonts-gstatic', 'https://fonts.gstatic.com');
      wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@75,100..900&display=swap');
      wp_enqueue_style('fonts-googleapis2', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@87.5,100..900&display=swap');
      wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/css/style.css');

    // Подключаем скрипты (jquery уже встроен в WP)
      wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/assets/libs/gsap/gsap.min.js', array(), '1.0', true);
      wp_enqueue_script('scrollTrigger', get_stylesheet_directory_uri() . '/assets/libs/gsap/ScrollTrigger.min.js', array(), '1.0', true);
      wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0', true);


}
add_action('wp_enqueue_scripts', 'mytheme_scripts');


// // добавление меню навигации
// function my_theme_register_nav_menu() {
//     register_nav_menus( array(
//         'menu_header' => __( 'menu for header', 'My Custom Theme' ), /*вот втором аргументе должно быть написано название темы с комментария style.css style.css */
//        'menu_footer' => __( 'menu for footer', 'My Custom Theme' ), 
// 		  // Можно добавить другие области меню
//     ) );
// }
// add_action( 'after_setup_theme', 'my_theme_register_nav_menu' );

// создаем кастомные посты:
function register_post_landmarks(){
	register_post_type( 'post_landmarks', [
		'labels' => [
			'name'               => 'landmarks', // основное название для типа записи
			'singular_name'      => 'landmarks', // название для одной записи этого типа
		],
		'public'                 => true,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,

		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], 
		'taxonomies'          => [''],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function register_post_judgments(){
	register_post_type( 'post_judgments', [
		'labels' => [
			'name'               => 'judgments', // основное название для типа записи
			'singular_name'      => 'judgments', // название для одной записи этого типа
		],
		'public'                 => true,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,

		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], 
		'taxonomies'          => [''],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function register_post_articles(){
	register_post_type( 'post_articles', [
		'labels' => [
			'name'               => 'articles', // основное название для типа записи
			'singular_name'      => 'articles', // название для одной записи этого типа
		],
		'public'                 => true,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,

		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], 
		'taxonomies'          => [''],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

function register_post_lectures(){
	register_post_type( 'post_lectures', [
		'labels' => [
			'name'               => 'lectures', // основное название для типа записи
			'singular_name'      => 'lectures', // название для одной записи этого типа
		],
		'public'                 => true,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,

		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ], 
		'taxonomies'          => [''],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action( 'init', 'register_post_landmarks' );
add_action( 'init', 'register_post_judgments' );
add_action( 'init', 'register_post_articles' );
add_action( 'init', 'register_post_lectures' );
?>