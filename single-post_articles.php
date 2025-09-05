
<?php get_header();?>
<main class="layout">
    <div class="container">
    <div class="layout__wrapper">
        <div class="layout__content">
        <div class="layout__breadcrumbs">
            <ul class="breadcrumbs">
                <li><a href="#">עשייה משפטית</a></li>
                <li>
                  <svg
                    width="10"
                    height="19"
                    viewBox="0 0 10 19"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M7 7L3 10.5L7 14"
                      stroke="#032169"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </li>
                <li><a href="#">דף הבית</a></li>
            </ul>
        </div>
        <div class="select-page-article">
            <div class="select-page-article__body">
            <h1 class="select-page-article__title">
                <?php the_title() ;?>
            </h1>
            <p class="select-page-article__subtitle"> <?php the_field('articles_date') ;?> </p>
            <div class="select-page-article__text text-WYSIWYG">
                 <?php the_content() ;?>
            </div>
            </div>
            <div class="select-page-article-more-articles">
            <p class="select-page-article-more-articles__title">
                מאמרים נוספים
            </p>
            <div class="select-page-article-more-articles__list">
                <?php 
                    $query = new WP_Query([
                        'post_type' => 'post_articles',
                        'posts_per_page' => 3,
                        'orderby'        => 'date',
                        'order'          => 'DESC', // новые сверху (по умолчанию)
                    ]);
                    ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <?php 
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'card-thumb');
                        $alt = get_the_title(); 
                    ?>
             

                        <a href="<?php the_permalink(); ?>" class="select-page-article-more-articles__link">
                            <img src="<?php echo esc_url($image_url);?>" alt="<?php echo esc_attr($alt);?>" />
                            <p><?php the_title() ;?></p>
                        </a> 

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- <a href="#" class="select-page-article-more-articles__link">
                <img src="assets/images/articles-img.png" alt="img" />
                <p>
                    חוות דעת פסיכיאטריות מנוגדות - שיקולים בבסיס ההכרעה
                    השיפוטית
                </p>
                </a> -->

                <!-- <a href="#" class="select-page-article-more-articles__link">
                <img src="assets/images/articles-img.png" alt="img" />
                <p>תסקיר מבחן ותסקיר קורבן - שיקולים משפטיים ואתיים</p>
                </a> -->

                <!-- <a href="#" class="select-page-article-more-articles__link">
                <img src="assets/images/articles-img.png" alt="img" />
                <p>קבלת ראיות שלא על פי סדר הדין - המשפט יב</p>
                </a> -->

            </div>
            </div>
        </div>
        </div>
        <div class="layout__sidebar">
           <?php get_sidebar(); ?>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>