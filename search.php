<?php get_header();?>

    <main class="layout">
      <div class="container">
        <div class="layout__wrapper">
          <div class="layout__content">
             <h2 class='page-title'>לְחַפֵּשׂ</h2>
            <div class="search">
              <div class="search__result-subtitle">
                <div dir="rtl">
                  נמצאו <strong><?php echo $wp_query->found_posts; ?></strong> תוצאות חיפוש לערך:
                  <span> <?php echo get_search_query(); ?></span>
                </div>
              </div>
              <!-- <div class="search__tags">
              </div> -->

              <div class="search__posts">

                  <?php if(have_posts()) :?>
                      <?php while(have_posts()) : the_post(); ?>
                         

                          <!-- вариант реализации вывода результата поиска №1 start -->
                           <!-- описание: выводим посты в том виде как они выглядят у себя на страницах,если в результате
                            поиска мы получаем пост или страницу у которой нет вида карточки то используется карточка с макета
                            на странице поиска   -->
                            <?php 
                              global $post;
                              $post_type = $post->post_type;

                              if($post_type === 'post_news'){
                                get_template_part('template-parts/posts/post-news');
                              }
                              else if($post_type === 'post_lectures'){
                                get_template_part('template-parts/posts/post-lectures');
                              }
                              else if($post_type === 'post_articles'){
                                get_template_part('template-parts/posts/post-articles');
                              }
                              else if($post_type === 'post_landmarks'){
                                get_template_part('template-parts/posts/post-landmarks');
                              }
                              else if($post_type === 'post_judgment'){
                                get_template_part('template-parts/posts/post-judgments');
                              }else{
                                get_template_part('template-parts/posts/post-search');
                              }
                            ?>
                          <!-- вариант реализации вывода результата поиска №1 end -->
                      <?php endwhile;?>
                      <?php else : ?>
                    <p>שום דבר לא נמצא.</p>
                  <?php endif;?>
    
              </div>
            </div>
          </div>
          <div class="layout__sidebar">
           <?php get_sidebar() ;?>
          </div>
        </div>
      </div>
    </main>

<!-- модалка для видео -->


            <div class="video-modal">
                <div class="container">
                    <div class="video-modal__wrapper">
                        <div class="video-modal__content">
                            <button class="video-modal__btn-close">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 5L8 8M8 8L5 11M8 8L5 5M8 8L11 11M1 1H15V15H1V1Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                סגירה
                            </button>
                            <video id="main-video" controls>
                            <source src="<?php the_field('video_file'); ?>" type="video/mp4">
                            Ваш браузер не поддерживает видео.
                            </video>
                            <p class="video-modal__title">
                            הרצאתו של שופט בית המשפט העליון יוסף אלרון, בטקס
                            בוגרי ובוגרות ומוסמכי ומוסמכות מחזור 2022 של הפקולטה
                            למשפטים באוניברסיטת חיפה, שהתקיים ביום שני,
                            17.7.2023, בשעה 18:00.
                            </p>
                        </div>
                        <div class="video-modal__left-column">
                            <p class="video-modal__left-column-title">
                            הרצאות נוספות
                            </p>
                            <div class="video-modal__more-videos">  

                              <?php 
                                $query = new WP_Query([
                                    'post_type' => 'post_lectures',
                                    'posts_per_page' => -1,
                                    'meta_key'       => 'lectures_order',
                                    'orderby'        => [
                                        'meta_value_num' => 'ASC',
                                        'date'           => 'DESC'
                                    ],
                                ]);
                                ?>

                            <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php
                                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'card-thumb');
                                        $alt = get_the_title(); // можно подтянуть заголовок как alt
                                    ?>
                                    <div class="additional-video" data-video="<?php the_field('lectures_video'); ?>">
                                        <a href="#" class='lectures-post-link' ></a>
                                        <img
                                        src="<?php echo esc_url($image_url) ;?>"
                                        alt="<?php echo esc_attr($alt); ?>"
                                        class="additional-video__img"
                                        />
                                        <p class="additional-video__title"><?php the_field('lectures_date');?> </p>
                                        <p class="additional-video__subtitle">
                                        <?php the_title();?>
                                        </p>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div> 
<?php get_footer(); ?>