для просмотра этого файла нажми Ctrl+Shift+V

# СКАЧИВАНИЕ И УСТАНОВКА WP

1. Скачай wp архив c https://wordpress.org/download/
2. Перенеси файлы в htdocs для XAMPP
3. Запусти Apache и MySQL
4. Перейдите по адресу http://localhost/phpmyadmin
5. Создай базу данных (выбери сортировку <span style="color:green">utf8\*general_ci</span> она стоит по умолчанию)
6. Открой сайт по адресу http://localhost/mysite
7. Выбери язык
8. Нажми кнопку продожить
9. Введи имя базы данных (как назвали бд при создании)
10. Введи имя пользователя базы данных (<span style="color:green">root</span> по дефолту)
11. Введи пароль пользователя базы данных (<span style="color:green">оставить пустым это поле</span>)
12. Введи сервер базы данных (localhost по дефолту)
13. Введи префикс таблиц (wp по дефолту)
14. Нажми на кнопк установки
15. Введи название сайта например: «Мой тестовый сайт» (позже можно изменить).
16. Введите имя пользователя это логин для входа в админку (**<span style="color:red">ЗАПОМНИ ЕГО!</span>**)
17. Пароль wp сам сгенерирует (**<span style="color:red">ЗАПОМНИ ЕГО!</span>**)
18. Введите ваш e-mail (можно любой **НО ЭТО НУЖНО ПРОВЕРИТЬ**)
19. Видимость для поисковых систем (поставь галочку если НЕ ХОЧЕШЬ что бы сайт индексировался. **<span style="color:red">ЛУЧШЕ ОСТАВИТЬ БЕЗ ГАЛОЧКИ</span>**)
20. нажать кнопку "установить wordpress"

# НАСТРОЙКА СТАРТОВОГО ОКРУЖЕНИЯ

1. удалить все стартовые страницы, удалить стартовые записи, удалить стартовые плагины
2. Подключить плагины ......
3. Закинь билд готовой верстки в папку **wp_content/themes** и переименовать под название темы
4. Создать в корне папки **style.css, functions.php, index.php, header.php, footer.php** (**<span style="color:green">ЭТО ОБЯЗАТЕЛЬНЫЙ МИНИМУМ ДЛЯ РАБОТЫ С WP</span>**)
5. В **styles.css** обязательно должен быть комментарий

```css
/*
Theme Name: My Custom Theme
*/
```

6. В **header.php** добавь разметку с началом файла и до конца **header** (в том случае если **header** повторяется на всех страницаах) а перед закрывающимся тегом **head** добавь

```php
 <?php wp_head(); ?>
```

7. С **footer.php** аналогичная ситуация только перед закрывающимся тегом **body** вставь

```php
  <?php wp_footer(); ?>
```

8. И в каждом файле страниц добавить следующие команды между содержимым страницы, что бы подключились **heder** и **footer** вместе со стилями и скриптами

```php
<?php get_header(); ?>
// уникальный код страницы...
<?php get_footer(); ?>
```

9. В **functions.php** добовляем скрипты, стили

```php
<?php
// подключение стилей и скриптов (start)
function mytheme_scripts() {
    // Подключаем стили
    wp_enqueue_style('slimselect-css', get_stylesheet_directory_uri() . '/lib/slim-select/slimselect.css');
	 wp_enqueue_style('swiper-css', get_stylesheet_directory_uri() . '/lib/swiper/swiper-bundle.min.css');
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/assets/app-BDLTyHWw.css');

   //  // Подключаем скрипты (jquery уже встроен в WP)
    wp_enqueue_script('slimselect-js', get_stylesheet_directory_uri() . '/lib/slim-select/slimselect.min.js', array(), '1.0', true);
	 wp_enqueue_script('swiper-js', get_stylesheet_directory_uri() . '/lib/swiper/swiper-bundle.min.js', array(), '1.0', true);
	 wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/assets/app-BAFUCIpz.js', array(), '1.0', true);

}
add_action('wp_enqueue_scripts', 'mytheme_scripts');
// подключение стилей и скриптов (end)
?>
```

10. В начале каждого файла страницы нужно добовлять комментарий который будет указывать на то что это шаблон и ее можно выбрать в админке в сплывающем меню и так мы перестрахуемся если слаг **page-slag.php** будет написан не правильно или мы захотим использовать один шаблон для нескольких страниц.**<span style="color:green"> комментарий не нужно писать в зарезервированных файлах wp</span>** таких как **index.php, front-page.php, single.php, archive.php**

```php
/_Template Name: About Page_/
```

11.Если нужно показать картинки в верстке посаженой на wp когда еще нет никкой динамики и если картинки статичные добавь перед основным путем картинки вот эту запись так у картинки будет правильный путь

```php
<?php echo get_stylesheet_directory_uri(); ?>
// пример:
//  <img src="<?php echo get_stylesheet_directory_uri(); ?>" alt="">
```

# БАЗОВАЯ РАБОТА С WP

## ДОБАВЛЕНИЕ СТРНИЦ

1. Создай файлы с таким нэймингом <span style="color:green">page-[название страницы].php</span> (например **page-about.php**)
2. В самом начале страницы добавь комментарий [тут подробней](#настройка-стартового-окружения)
3. Ну и добавь **header** и **footer** и те элементы которые повторяются на каждой странице и добавь уникальный контент если он есть
4. После того как создал файлы страниц иди в админку создай аналогичные стрницы и прекрепи шаблоны которые указывал в комментариях
5. Для главной страницы подход немного другой. Скопируй содержимое **index.php** в **front-page.php**, затем в админке создай страницу **home**, затем зайди в **Настройки → Чтение выбери "Статическая страница" выбери "Home"**, если она есть. и да<span style="color:green"> в front-page не нужно писать комментарий для шаблона</span>

## ДОБАВЛЕНИЕ ССЫЛОК НА СТРАНИЦЫ

1. есть два варианта как добавить ссылки на страницы

   - по id. для того что бы сделать ссылку по id (**<sapn style="color:green"> ЛУЧШИЙ ВАРИАНТ</sapn>** ) нужно узнать сам id как это сделать? Просто заходим в админку в страницы и наводим на страницы курсором и внизу слева экрана будет запись например **"http://localhost/testwp/wp-admin/post.php?post=9&action=edit"** вот то число которое стоит сразу после **"post="** и является нашим id (в данном примере 9)

   ```php
   <?php echo esc_url(get_permalink(9)); ?>
   <!-- пример ссылки -->
   <a href='<?php echo esc_url(get_permalink(9)); ?>'></a>
   ```

   - по слагу. Тут ничего сверхестественного просто по слагу. но так <sapn style="color:red"> НЕ РЕКОММЕНДУЕТСЯ</sapn> лучше делать ссылку по id

   ```php
   <?php echo esc_url(home_url('/about/')); ?>
   <!-- пример ссылки -->
   <a href='<?php echo esc_url(home_url('/about/')); ?>'></a>
   ```

## РЕДАКТИРОВАНИЕ И СОЗДАНИЕ МЕНЮ НАВИГАЦИИ

1. В **functions.php** нужно добавить код для того что бы меню появилось в админке

```php
// добавление меню в админку (start)
function my_theme_register_nav_menu() {
    register_nav_menus( array(
        'menu_header' => __( 'menu for header', 'My Custom Theme' ), /*вот втором аргументе должно быть написано название темы с комментария style.css style.css */
       'menu_footer' => __( 'menu for footer', 'My Custom Theme' ),
		  // Можно добавить другие области меню
    ) );
}
add_action( 'after_setup_theme', 'my_theme_register_nav_menu' );
// добавление меню в админку (end)
```

2. В админке зайти **«Внешний вид» → «Меню» нажми «Создать новое меню»** укажи название (например, «Основное меню») → «Создать меню» затем в секции «Область отображения» выберите то что ты писал при инициализацции первым аргументом в функции например «menu for header»
3. Затем в хедер добавить кусок кода и действовуй по инструкции

```php
<!-- как добавить меню навигации в header: там где должно будет быть меню нужно добавить код который ниже.
при добавлении этого кода у нас в разметке появится меню с следующей разметкой div.className > ul > li там где написано className
нужно вставить наш класс как в верстке и при верстке лучше при стилизации меню обращаться к ul и li через родителя className
.className ul и .className li так мы без труда перенесем стили на меню подключенное через wp -->

<!-- это нужно добавлять в хедер ну или еще куда короче там где ты хочешь что бы у тебя было меню -->
<?php
    wp_nav_menu( array(
        'theme_location' => 'menu_header',
        'menu_class'     => 'className',
        'container'      => false,
    ) );
    ?>
```

# ACF

### подключение ACF pro

1. Просто перетащить архив с плагином в подключение плагинов в wp
2. Для добавления отдельной страницы для глобальных acf полей добавить этот код в **function.php**

```php
// создание отдельной страницы настроек глобальных acf полей (start)
add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Global ACF',
        'menu_title'    => 'Глобальные ACF поля',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

  }
});
// создание отдельной страницы настроек глобальных acf полей (end)
```

3. Для того что бы вывести коректо поле которое является глобальным необходимо это делать с добовлением второго аргумента **option** вот так **get_field('global_cta', 'option');** (так wp будет понимать что мы обращаемся к глобальным полям а не к полям преднозначеных для конкретной страницы)
4. Что бы вынести отдельную записть (не повторитель и не группу) можно воспользоваться следующей конструкцией

```php
<?php the_field('тут название поля из админки'); ?>
```

5. Для того что бы вывести повторитель нужно использовать цикл и the_sub_field() для вывода полей репитера

```php
<?php if( have_rows('повторитель') ): ?>
    <ul>
    <?php while( have_rows('повторитель') ): the_row(); ?>
        <li>
            <h3><?php the_sub_field('заголовок'); ?></h3>
            <p><?php the_sub_field('описание'); ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>
```

6. Для того что бы вывести группу нужно использовать следующую конструкцию

```php
<?php
$group = get_field('группа');
if( $group ): ?>
    <div class="group">
        <h2><?php echo esc_html($group['заголовок']); ?></h2>
        <p><?php echo esc_html($group['описание']); ?></p>
    </div>
<?php endif; ?>
```

# Произвольные типы записей (Custom Post Types)

### Регистрация ctp

1. Добавить следующий код в **functions.php** (тут также есть подключение таксономии)

```php
// регистрация кастомных постов и таксономий (start)

function register_custom_taxonomy() {
   register_taxonomy(
        'product_category',                  // Идентификатор таксономии
        'post__product',                // Тип записи, к которому привязываем
        [
            'label'        => 'Категории товаров',  // Название в админке
            'hierarchical' => true,           // false = теги (true = категории)
            'public'       => true,            // Видимость в интерфейсе
        ]
    );
}

function register_post_types_product(){
	register_post_type( 'post__product', [
		'label'  => null,
		'labels' => [
			'name'               => 'Товары', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
		],
		'description'            => '',
		'public'                 => true,
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor' ],
		'taxonomies'          => ['product_category'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_action('init', 'register_custom_taxonomy');
add_action( 'init', 'register_post_types_product' );
// регистрация кастомных постов и таксономий (end)
```

2.  <span style="color:red">**Важно**</span>: после создания нового типа записи. Обязательно нужно зайти на страницу **_Настройки → Постоянные ссылки_**. Нужно это для того, чтобы правила ЧПУ были пересозданы и туда были добавлены правила нового типа записи.

3.  Как вывводить записи на страницу

```php
<?php
$products = get_posts([
    'post_type'      => 'post__product',  // Тип записи
    'numberposts'    => -1,               // Количество записей (-1 = все)
    'orderby'        => 'date',           // Сортировка по дате
    'order'          => 'DESC',           // По убыванию (новые сначала)
]);

if ($products) {
    foreach ($products as $post) {
        setup_postdata($post);
        ?>

			// разметка для поста (start)

        <div class="product">
 				<p><?php the_field('product__title'); ?></p>
 				<p><?php the_field('product__price'); ?></p>
        </div>

			// разметка для поста (end)

        <?php
    }
    wp_reset_postdata(); // Сбрасываем глобальные переменные поста
} else {
    echo 'Товары не найдены';
}
?>
```

4.  Как вывводить записи на страницу по конкретной таксономии

```php
$posts = get_posts([
				'post_type' => 'post__product',
				'numberposts' => '-1',
				'orderby' => 'date',  // Сортировка по дате
    			'order' => 'DESC',  // По убыванию (новые сначала)
				'tax_query' => [
					[
					'taxonomy' => 'product_category',
					'field'    => 'slug',
					'terms' => 'metal_roofing_tiles',
					],

				],
			]);
//а дальше цикл как в примере выше
```

# Как создавать шаблоны

1. Создаем папку **template-parts** и там создаем шаблон
2. Затем этот шаблон можно подключить в коде с помощью **get_template_part()**

```php
// данный пример вывода шаблона для поста! для постов которые будут выводится с помощью цикла важен третий аргумент который передает данные поста
 get_template_part('template-parts/cards/product-card', null, ['post' => $post]);

//  в цикле это будет выглядеть так
$products = get_posts([
    'post_type'      => 'post__product',  // Тип записи
    'numberposts'    => -1,               // Количество записей (-1 = все)
    'orderby'        => 'date',           // Сортировка по дате
    'order'          => 'DESC',           // По убыванию (новые сначала)
]);

if ($products) {
    foreach ($products as $post) {
        get_template_part('template-parts/cards/product-card', null, ['post' => $post]);
    }

} else {
    echo 'Товары не найдены';
}
```

3. В **get_template_part()** только первый аргумент является обязательным, он говорит по какому пути будет находится файл, второй аргумент может содержать часть имени файла для подключения (не является обязательным) и третий аргумент передает массив данных
4. Также что бы коректно отображались посты в цикле который будет использовать шаблон поста необходимо в начале файла прописать **setup_postdata($post);** так шаблон будет использовать данные вщятые с нужного поста, если мы не напишем этот код то данные будут браться от странице и что приведет к ошибкам

5. Так же в конце шаблона поста необходимо добавить **wp_reset_postdata();** что бы все коректно работало
   Вот пример кода шаблона поста:

```php
<?php
// карточка товара
setup_postdata($post);
?>


<div class="card-catalog">
	<div class="card-catalog__img">
		<img src="<?php the_field('product__img') ?>" alt="catalog img 1" />
	</div>
	<div class="card-catalog__info">
		<p class="card-catalog__title"><?php the_field('product__title') ?></p>
		<?php if( have_rows('product__description-rp') ): ?>
			<ul class="card-catalog__proportions">
			<?php while( have_rows('product__description-rp') ): the_row(); ?>
				<li>
					<p><?php the_sub_field('product__desc--title'); ?></p>
					<p><?php the_sub_field('product__desc--value'); ?></p>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>

<?php
wp_reset_postdata();
?>
```

Если наш шаблон просто статичный блок который несколько раз повторяется на сайте например секция которорая идентичная на двух страницах но не является ни футером, ни хедером то писать в шаблоне **setup_postdata($post);** и **wp_reset_postdata();** не надо
