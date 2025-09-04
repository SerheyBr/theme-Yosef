<?php
function mytheme_scripts() {
    // Подключаем стили
      wp_enqueue_style('fonts', 'https://fonts.googleapis.com');
      wp_enqueue_style('fonts-gstatic', 'https://fonts.gstatic.com');
      wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@75,100..900&display=swap');
      wp_enqueue_style('fonts-googleapis2', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@87.5,100..900&display=swap');
      wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/css/style.css');

    // Подключаем скрипты (jquery уже встроен в WP)
      wp_enqueue_script('ajax-js', get_stylesheet_directory_uri() . '/js/ajax.js', array(), '1.0', true);
      wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/assets/libs/gsap/gsap.min.js', array(), '1.0', true);
      wp_enqueue_script('scrollTrigger', get_stylesheet_directory_uri() . '/assets/libs/gsap/ScrollTrigger.min.js', array(), '1.0', true);
      wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0', true);


      wp_localize_script( 'ajax-js', 'my_ajax', array('ajax_url' => admin_url('admin-ajax.php')) );

}
add_action('wp_enqueue_scripts', 'mytheme_scripts');


// // добавление меню навигации
add_action('after_setup_theme', function () {
    add_theme_support('menus');

    // Регистрируем области (locations)
    register_nav_menus([
        'header_menu' => 'Header menu',
        'sidebar_menu' => 'Selected topics from the site',
		'sidebar_judgments' => 'Selected Judgments',
    ]);
});

// создаем кастомные посты:
// function register_post_landmarks(){
// 	register_post_type( 'post_landmarks', [
// 		'labels' => [
// 			'name'               => 'landmarks', // основное название для типа записи
// 			'singular_name'      => 'landmarks', // название для одной записи этого типа
// 		],
// 		'public'                 => true,
// 		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
// 		'rest_base'           => null, // $post_type. C WP 4.7
// 		'menu_position'       => 4,
// 		'menu_icon'           => null,

// 		'hierarchical'        => false,
// 		'supports'            => [ 'title', 'editor' ], 
// 		'taxonomies'          => [''],
// 		'has_archive'         => false,
// 		'rewrite'             => true,
// 		'query_var'           => true,
// 	] );
// }

// function register_post_articles(){
// 	register_post_type( 'post_articles', [
// 		'labels' => [
// 			'name'               => 'articles', // основное название для типа записи
// 			'singular_name'      => 'articles', // название для одной записи этого типа
// 		],
// 		'public'                 => true,
// 		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
// 		'rest_base'           => null, // $post_type. C WP 4.7
// 		'menu_position'       => 4,
// 		'menu_icon'           => null,

// 		'hierarchical'        => false,
// 		'supports'            => [ 'title', 'editor' ], 
// 		'taxonomies'          => [''],
// 		'has_archive'         => false,
// 		'rewrite'             => true,
// 		'query_var'           => true,
// 	] );
// }

// function register_post_lectures(){
// 	register_post_type( 'post_lectures', [
// 		'labels' => [
// 			'name'               => 'lectures', // основное название для типа записи
// 			'singular_name'      => 'lectures', // название для одной записи этого типа
// 		],
// 		'public'                 => true,
// 		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
// 		'rest_base'           => null, // $post_type. C WP 4.7
// 		'menu_position'       => 4,
// 		'menu_icon'           => null,

// 		'hierarchical'        => false,
// 		'supports'            => [ 'title', 'editor' ], 
// 		'taxonomies'          => [''],
// 		'has_archive'         => false,
// 		'rewrite'             => true,
// 		'query_var'           => true,
// 	] );
// }

// function register_post_judgments(){
// 	register_post_type( 'post_judgment', [
// 		'labels' => [
// 			'name'               => 'judgments', // основное название для типа записи
// 			'singular_name'      => 'judgment', // название для одной записи этого типа
// 		],
// 		'public'                 => true,
// 		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
// 		'rest_base'           => null, // $post_type. C WP 4.7
// 		'menu_position'       => 4,
// 		'menu_icon'           => null,

// 		'hierarchical'        => false,
// 		'supports'            => [ 'title', 'editor' ], 
// 		'taxonomies'          => [''],
// 		'has_archive'         => false,
// 		'rewrite'             => true,
// 		'query_var'           => true,
// 	] );
// }

function register_post_judgments() {
    register_post_type('post_judgment', [
        'labels' => [
            'name' => 'judgments',
            'singular_name' => 'judgment',
        ],
        'public' => true,
        'taxonomies' => ['judgment_tags'],
        'has_archive' => true,
        'show_in_rest' => true, // для Gutenberg
        'supports' => ['title', 'editor'],
    ]);
}

function create_judgment_taxonomy() {
    register_taxonomy('judgment_tags', 'post_judgment', [
        'labels' => [
            'name' => 'judgments tags',
            'singular_name' => 'judgments tag',
        ],
        'public' => true,
        'hierarchical' => false, // true — как категории, false — как теги
        'show_in_rest' => true, // для Gutenberg
    ]);
}

add_action( 'init', 'register_post_judgments' );
add_action('init', 'create_judgment_taxonomy');
// add_action( 'init', 'register_post_landmarks' );
// add_action( 'init', 'register_post_articles' );
// add_action( 'init', 'register_post_lectures' );

// Обработчик AJAX
function my_ajax_load_posts() {
    $tag_id = intval($_POST['tag_id'] ?? 0);

     $query = new WP_Query([
        'post_type' => 'post_judgment',
        'posts_per_page' => -1,
        'meta_key'       => 'post_judgment_order',
        'orderby'        => [
            'meta_value_num' => 'ASC',
            'date'           => 'DESC'
        ],
    ]);

    if($tag_id > 0){
        $query = new WP_Query([
            'post_type' => 'post_judgment',
            'posts_per_page' => -1,
            'meta_key'       => 'post_judgment_order',
            'tax_query' => array(
                array(
                    'taxonomy' => 'judgment_tags',
                    'field'    => 'term_id',
                    'terms'    => $tag_id 
                )
            ),
            'orderby' => [
                'meta_value_num' => 'ASC',
                'date'           => 'DESC'
            ],
        ]);
    }
    

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/posts/post-judgments') ;
        }
    } else {
        echo '<p>Нет постов</p>';
    }
 
    wp_die(); 
}
add_action('wp_ajax_my_ajax_load_posts', 'my_ajax_load_posts');
add_action('wp_ajax_nopriv_my_ajax_load_posts', 'my_ajax_load_posts');
?>