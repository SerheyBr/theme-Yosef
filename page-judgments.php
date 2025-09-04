<?php
/*
Template Name: judgments Page
*/
get_header();
?>

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
            <div class="judgments">
              <div class="judgments__tags">
                <div class="tags">
            
                  <button class="tags__tag active" data-tag="0">הצג הכל</button>

                  <?php
                    $terms_all = get_terms([
                        'taxonomy' => 'judgment_tags',
                        'hide_empty' => true, // показывать даже пустые термины
                    ]);
                  ?>

                  <?php if ($terms_all && ! is_wp_error($terms_all)): ?>
                  <?php foreach ($terms_all as $term): ?>
                      <button class="tags__tag" data-tag="<?php echo $term->term_id; ?>"><?php echo esc_html($term->name); ?></button>
                  <?php endforeach; ?>
                  <?php endif; ?>

                  <!-- <button class="tags__tag active">הצג הכל</button>
                  <button class="tags__tag">עברות המתה</button>
                  <button class="tags__tag">דיני עונשין</button>
                  <button class="tags__tag">סדר דין פלילי</button>
                  <button class="tags__tag">דיני ראיות</button>
                  <button class="tags__tag">הסגרה</button>
                  <button class="tags__tag">משפט ציבורי</button>
                  <button class="tags__tag">רווחה ואוכלוסיה חלשה</button>
                  <button class="tags__tag">משפט אזרחי</button> -->
                </div>
              </div>
              <div class="judgments__posts">
                
                <?php 
                $query = new WP_Query([
                    'post_type' => 'post_judgment',
                    'posts_per_page' => -1,
                    'meta_key'       => 'post_judgment_order',
                    'orderby'        => [
                        'meta_value_num' => 'ASC',
                        'date'           => 'DESC'
                    ],
                ]);

                //  $query = new WP_Query([
                //     'post_type' => 'post_judgment',
                //     'posts_per_page' => -1,
                //     'meta_key'       => 'post_judgment_order',
                //     'tax_query' => array(
                //         array(
                //             'taxonomy' => 'judgment_tags', // ваша таксономия
                //             'field'    => 'term_id',
                //             'terms'    => 20 // слаг термина
                //         )
                //     ),
                //     'orderby' => [
                //         'meta_value_num' => 'ASC',
                //         'date'           => 'DESC'
                //     ],
                // ]);
                ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                       <?php  get_template_part('template-parts/posts/post-judgments') ;?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- <div class="judgments-post" id="post-landmark-1">
                  <div class="judgments-post__title-box">
                    <h3 class="judgments-post__title-top">ינואר 2025</h3>
                    <h3 class="judgments-post__title-bottom">
                      רומן שגל נגד מדינת ישראל עפ"ג 31852-10-2
                    </h3>
                  </div>
                  <div class="judgments-post__content">
                    <div
                      class="judgments-post__text judgments-post__text--excert"
                    >
                      <p>
                        <b
                          >ערעור על גזר דינו של בית המשפט המחוזי בחיפה ב-ת"פ
                          44729-04-24 מיום 1.10.2024 שניתן על ידי השופטת א'
                          אימבר.</b
                        >
                      </p>
                      <p>
                        מתוך הפסיקה: “דין הערעור להידחות. ככלל, ערכאת הערעור לא
                        תתערב בעונש שגזרה הערכאה הדיונית, אלא במקרים שבהם ניכרת
                        חריגה קיצונית ממדיניות הענישה הנוהגת במקרים דומים, או
                        כאשר נפלה על פני הדברים טעות מהותית ובולטת בגזר הדין...”
                      </p>
                    </div>
                    <button class="judgments-post__btn">
                      <p>למסמך המלא / הורדה</p>
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9 14L5.59055 10.1644C5.25376 9.78548 5.25376 9.21452 5.59055 8.83564L9 5"
                          stroke="#0E7BCD"
                          stroke-width="1.5"
                          stroke-miterlimit="3.8637"
                          stroke-linecap="round"
                        />
                      </svg>
                    </button>
                  </div>
                </div> -->

                <!-- br -->
                <!-- <div class="judgments-post" id="post-landmark-2">
                  <div class="judgments-post__title-box">
                    <h3 class="judgments-post__title-top">ינואר 2025</h3>
                    <h3 class="judgments-post__title-bottom">
                      רומן שגל נגד מדינת ישראל עפ"ג 31852-10-2
                    </h3>
                  </div>
                  <div class="judgments-post__content">
                    <div
                      class="judgments-post__text judgments-post__text--excert"
                    >
                      <p>
                        <b
                          >ערעור על גזר דינו של בית המשפט המחוזי בחיפה ב-ת"פ
                          44729-04-24 מיום 1.10.2024 שניתן על ידי השופטת א'
                          אימבר.</b
                        >
                      </p>
                      <p>
                        מתוך הפסיקה: “דין הערעור להידחות. ככלל, ערכאת הערעור לא
                        תתערב בעונש שגזרה הערכאה הדיונית, אלא במקרים שבהם ניכרת
                        חריגה קיצונית ממדיניות הענישה הנוהגת במקרים דומים, או
                        כאשר נפלה על פני הדברים טעות מהותית ובולטת בגזר הדין...”
                      </p>
                    </div>
                    <button class="judgments-post__btn">
                      <p>למסמך המלא / הורדה</p>
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9 14L5.59055 10.1644C5.25376 9.78548 5.25376 9.21452 5.59055 8.83564L9 5"
                          stroke="#0E7BCD"
                          stroke-width="1.5"
                          stroke-miterlimit="3.8637"
                          stroke-linecap="round"
                        />
                      </svg>
                    </button>
                  </div>
                </div> -->

                <!-- br -->
                <!-- <div class="judgments-post" id="post-landmark-3">
                  <div class="judgments-post__title-box">
                    <h3 class="judgments-post__title-top">ינואר 2025</h3>
                    <h3 class="judgments-post__title-bottom">
                      רומן שגל נגד מדינת ישראל עפ"ג 31852-10-2
                    </h3>
                  </div>
                  <div class="judgments-post__content">
                    <div
                      class="judgments-post__text judgments-post__text--excert"
                    >
                      <p>
                        <b
                          >ערעור על גזר דינו של בית המשפט המחוזי בחיפה ב-ת"פ
                          44729-04-24 מיום 1.10.2024 שניתן על ידי השופטת א'
                          אימבר.</b
                        >
                      </p>
                      <p>
                        מתוך הפסיקה: “דין הערעור להידחות. ככלל, ערכאת הערעור לא
                        תתערב בעונש שגזרה הערכאה הדיונית, אלא במקרים שבהם ניכרת
                        חריגה קיצונית ממדיניות הענישה הנוהגת במקרים דומים, או
                        כאשר נפלה על פני הדברים טעות מהותית ובולטת בגזר הדין...”
                      </p>
                    </div>
                    <button class="judgments-post__btn">
                      <p>למסמך המלא / הורדה</p>
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9 14L5.59055 10.1644C5.25376 9.78548 5.25376 9.21452 5.59055 8.83564L9 5"
                          stroke="#0E7BCD"
                          stroke-width="1.5"
                          stroke-miterlimit="3.8637"
                          stroke-linecap="round"
                        />
                      </svg>
                    </button>
                  </div>
                </div> -->

                <!-- br -->
                <!-- <div class="judgments-post" id="post-landmark-4">
                  <div class="judgments-post__title-box">
                    <h3 class="judgments-post__title-top">ינואר 2025</h3>
                    <h3 class="judgments-post__title-bottom">
                      רומן שגל נגד מדינת ישראל עפ"ג 31852-10-2
                    </h3>
                  </div>
                  <div class="judgments-post__content">
                    <div
                      class="judgments-post__text judgments-post__text--excert"
                    >
                      <p>
                        <b
                          >ערעור על גזר דינו של בית המשפט המחוזי בחיפה ב-ת"פ
                          44729-04-24 מיום 1.10.2024 שניתן על ידי השופטת א'
                          אימבר.</b
                        >
                      </p>
                      <p>
                        מתוך הפסיקה: “דין הערעור להידחות. ככלל, ערכאת הערעור לא
                        תתערב בעונש שגזרה הערכאה הדיונית, אלא במקרים שבהם ניכרת
                        חריגה קיצונית ממדיניות הענישה הנוהגת במקרים דומים, או
                        כאשר נפלה על פני הדברים טעות מהותית ובולטת בגזר הדין...”
                      </p>
                    </div>
                    <button class="judgments-post__btn">
                      <p>למסמך המלא / הורדה</p>
                      <svg
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M9 14L5.59055 10.1644C5.25376 9.78548 5.25376 9.21452 5.59055 8.83564L9 5"
                          stroke="#0E7BCD"
                          stroke-width="1.5"
                          stroke-miterlimit="3.8637"
                          stroke-linecap="round"
                        />
                      </svg>
                    </button>
                  </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="layout__sidebar">
            <div class="sidebar-judgments">
              <p class="sidebar-judgments__title">פסקי דין נבחרים</p>
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'sidebar_judgments',
                        'container'      => false,       
                        'menu_class'     => 'sidebar-judgments__list', 
                        'fallback_cb'    => false,      
                    ]);
                 ?>
              <!-- <ul class="sidebar-judgments__list">
                <li>
                  <a href="#" target="_blank">
                    רומן שגל נגד מדינת ישראל, ינואר 2025, ערעור על גזר דינו של
                    בית המשפט המחוזי בחיפה
                  </a>
                </li>
                <li>
                  <a href="#" target="_blank">
                    דן אוסקר למפל נגד היועץ המשפטי לממשלה, אפריל 2018, ערעור על
                    פסק דינו של בית המשפט המחוזי בירושלים
                  </a>
                </li>
                <li>
                  <a href="#" target="_blank">רומן שגל נגד מדינת ישראל, ינואר 2025, ערעור על גזר דינו של
                    בית המשפט המחוזי בחיפה
                  </a>
                </li>
                <li>
                  <a href="#" target="_blank"
                    >דניס זייצב נגד מדינת ישראל, מאי 2021, בקשת רשות ערעור על
                    פסק דינו של בית המשפט המחוזי
                  </a>
                </li>
              </ul> -->
            </div>
          </div>
        </div>
      </div>
    </main>

<?php get_footer() ;?>