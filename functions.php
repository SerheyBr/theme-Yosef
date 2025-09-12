<?php
// подключаем стили и скрипты=====================================]
function mytheme_scripts() {
    // Подключаем стили
      wp_enqueue_style('fonts', 'https://fonts.googleapis.com');
      wp_enqueue_style('fonts-gstatic', 'https://fonts.gstatic.com');
      wp_enqueue_style('fonts-googleapis', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@75,100..900&display=swap');
      wp_enqueue_style('fonts-googleapis2', 'https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@87.5,100..900&display=swap');
      wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/css/style.css');
      wp_enqueue_style('wp-css', get_stylesheet_directory_uri() . '/css/style-wp.css');

    // Подключаем скрипты (jquery уже встроен в WP)
      wp_enqueue_script('ajax-js', get_stylesheet_directory_uri() . '/js/ajax.js', array(), '1.0', true);
      wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/assets/libs/gsap/gsap.min.js', array(), '1.0', true);
      wp_enqueue_script('scrollTrigger', get_stylesheet_directory_uri() . '/assets/libs/gsap/ScrollTrigger.min.js', array(), '1.0', true);
      wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0', true);

// прокоментируй эту строку===========================================]
      wp_localize_script( 'ajax-js', 'my_ajax', array('ajax_url' => admin_url('admin-ajax.php')) );

}
add_action('wp_enqueue_scripts', 'mytheme_scripts');


// // добавление меню навигации=====================================]
add_action('after_setup_theme', function () {
    add_theme_support('menus');

    // Регистрируем области (locations)
    register_nav_menus([
        'header_menu' => 'Header menu',
        'sidebar_menu' => 'Selected topics from the site',
		'sidebar_judgments' => 'Selected Judgments',
    ]);
});

// добавляем картинки===============================================]
add_theme_support('post-thumbnails');

// создаем кастомные посты==========================================]

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

function register_post_landmarks() {
    register_post_type('post_landmarks', [
        'labels' => [
            'name' => 'landmarks',
            'singular_name' => 'landmark',
        ],
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // для Gutenberg
        'supports' => ['title', 'editor'],
    ]);
}
add_action( 'init', 'register_post_landmarks' );

function register_post_articles() {
    register_post_type('post_articles', [
        'labels' => [
            'name' => 'articles',
            'singular_name' => 'article',
        ],
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // для Gutenberg
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}
add_action( 'init', 'register_post_articles' );

function register_post_lectures() {
    register_post_type('post_lectures', [
        'labels' => [
            'name' => 'lectures',
            'singular_name' => 'lecture',
        ],
        'public' => true,
        'taxonomies' => ['lectures_tags'],
        'has_archive' => true,
        'show_in_rest' => true, // для Gutenberg
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}

function create_lectures_taxonomy() {
    register_taxonomy('lectures_tags', 'post_lectures', [
        'labels' => [
            'name' => 'lectures tags',
            'singular_name' => 'lecture tag',
        ],
        'public' => true,
        'hierarchical' => false, // true — как категории, false — как теги
        'show_in_rest' => true, // для Gutenberg
    ]);
}

add_action( 'init', 'register_post_lectures' );
add_action('init', 'create_lectures_taxonomy');

function register_post_news() {
    register_post_type('post_news', [
        'labels' => [
            'name' => 'news',
            'singular_name' => 'news',
        ],
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true, // для Gutenberg
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}
add_action( 'init', 'register_post_news' );

// хлебные крошки==============================================]

function my_breadcrumbs() {

    echo '<ul class="breadcrumbs">';
    echo '<li><a href="'.home_url().'">דף הבית </a></li>';
    echo '<li>';
    echo '<svg width="10" height="19" viewBox="0 0 10 19" fill="none" xmlns="http://www.w3.org/2000/svg" > <path d="M7 7L3 10.5L7 14" stroke="#032169" stroke-linecap="round" stroke-linejoin="round" /></svg>';
    echo '</li>';

    
    if(is_page()){
        global $post;
        $slug = $post->post_name;

        $translete = [
            'legal-practice' => 'עשייה משפטית',
            'landmarks-page' => 'ציוני דרך',
            'judgments-page' => 'משפט מנהלי',
            'articles-page' => 'מאמרים',
            'lectures-speeches-page' => 'הרצאות ונאומים',
            'contacts-page' => 'יצירת קשר',
            'book-page' => 'book page',
            'news-page' => 'כתבות',
        ];
        
        if(!empty($translete[$slug])){
            $page_title = $translete[$slug];
        }
    }

    if(is_search()){
         $page_title = 'חיפוש';
    }

    echo '<li>'.$page_title.'</li>';
    echo '</ul>';
}

// меняем параметры цикла для поиска==============================]
// function my_search_filter( $query ) {
//     // Только фронтенд и основной запрос
//     if ( $query->is_search() && $query->is_main_query() && !is_admin() ) {
//         $query->set( 'post_type', [ 'post_news', 'post_lectures', 'post_judgment', 'post_landmarks', 'post_articles' ] );
//     }
// // показываем все посты в поиске==============================]
//      if ( $query->is_search() && $query->is_main_query() ) {
//         $query->set( 'posts_per_page', -1 ); 
//     }
// }
// add_action( 'pre_get_posts', 'my_search_filter' );



// Обработчики AJAX============================================]
// ajax обработчик для judgments===============================]
function my_ajax_load_posts_judgments() {
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
add_action('wp_ajax_my_ajax_load_posts', 'my_ajax_load_posts_judgments');
add_action('wp_ajax_nopriv_my_ajax_load_posts', 'my_ajax_load_posts_judgments');

// ajax обработчик для lectures===============================]
function my_ajax_load_posts_lectures() {
    $tag_id = intval($_POST['tag_id'] ?? 0);

     $query = new WP_Query([
        'post_type' => 'post_lectures',
        'posts_per_page' => -1,
        'meta_key'       => 'lectures_order',
        'orderby'        => [
            'meta_value_num' => 'ASC',
            'date'           => 'DESC'
        ],
    ]);

    if($tag_id > 0){
        $query = new WP_Query([
            'post_type' => 'post_lectures',
            'posts_per_page' => -1,
            'meta_key'       => 'lectures_order',
            'tax_query' => array(
                array(
                    'taxonomy' => 'lectures_tags',
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
            get_template_part('template-parts/posts/post-lectures');
        }
    } else {
        echo '<p>Нет постов</p>';
    }
 
    wp_die(); 
}
add_action('wp_ajax_my_ajax_load_posts_lectures', 'my_ajax_load_posts_lectures');
add_action('wp_ajax_nopriv_my_ajax_load_posts_lectures', 'my_ajax_load_posts_lectures');

// ajax обработчик для поиска===============================]
// function my_live_search(){
//     $query = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

//     if(empty($query)){
//         wp_send_json([]);
//     }

//     // Простейший WP_Query (можно использовать Relevanssi)
//     $args = [
//         's' => $query,
//         'post_type' => ['post_news','post_lectures','post_articles','post_judgment','post_landmarks'], // твои нужные посты
//         'posts_per_page' => 5
//     ];

//     $search = new WP_Query($args);
//     $results = [];

//     if($search->have_posts()){
//         while($search->have_posts()){
//             $search->the_post();
//             $results[] = [
//                 'title' => html_entity_decode(get_the_title()),
//                 'permalink' => get_permalink()
//             ];
//         }
//         wp_reset_postdata();
//     }

//     wp_send_json($results);
// }

// add_action('wp_ajax_live_search', 'my_live_search');
// add_action('wp_ajax_nopriv_live_search', 'my_live_search');
function my_live_search() {
    $query = isset($_POST['s']) ? sanitize_text_field($_POST['s']) : '';

    if (empty($query)) {
        wp_send_json([]);
    }

    // фильтр, чтобы поиск шёл только по заголовку
    add_filter('posts_search', function($search, $wp_query) use ($query) {
        global $wpdb;
        if (empty($query)) return $search;

        // LIKE поиск только по post_title
        $search = $wpdb->prepare(" AND $wpdb->posts.post_title LIKE %s ", '%' . $wpdb->esc_like($query) . '%');
        return $search;
    }, 10, 2);

    $args = [
        's' => $query,
        'post_type' => ['post_news','post_lectures','post_articles','post_judgment','post_landmarks'],
        'posts_per_page' => 5
    ];

    $search = new WP_Query($args);
    $results = [];

    if ($search->have_posts()) {
        while ($search->have_posts()) {
            $search->the_post();
            $results[] = [
                'title' => html_entity_decode(get_the_title()),
                'permalink' => get_permalink()
            ];
        }
        wp_reset_postdata();
    }

    // удаляем фильтр после запроса
    remove_filter('posts_search', '__return_null');

    wp_send_json($results);
}

add_action('wp_ajax_live_search', 'my_live_search');
add_action('wp_ajax_nopriv_live_search', 'my_live_search');

?>