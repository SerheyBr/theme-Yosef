<?php
/*
Template Name: Lectures & Speeches Page
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
        <div class="lectures">
            <div class="lectures__tags">
            <div class="tags">
                <button class="tags__tag active" data-tag="0">הצג הכל</button>
                <?php
                    $terms_all = get_terms([
                        'taxonomy' => 'lectures_tags',
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
            <div class="lectures__posts">

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
                         <?php get_template_part('template-parts/posts/post-lectures');?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
         
                <!-- <div class="lectures-post" data-video="https://www.youtube.com/watch?v=ztN8QYYbe1M&t=2s">
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
                            <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/gtCd-HCo7FQ"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                            ></iframe>
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
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <img
                    src="assets/images/lectures-img.png"
                    alt="img"
                    width="300"
                    height="165"
                    class="lectures-post__img"
                    />
                    <div class="lectures-post__content">
                    <h4 class="lectures-post__title">
                        פיקוח שיפוטי במציאות טכנולוגית
                    </h4>
                    <p class="lectures-post__subtitle">
                        מאי 2022, הכנס השנתי ה-21 של לשכת עורכי הדין באילת
                    </p>
                    <div
                        class="lectures-post__text lectures-post__text--excert"
                    >
                        <p>
                        לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור...
                        </p>
                    </div>
                    <button class="lectures-post__btn open-modal-video">
                        <p>לצפייה</p>
                        <svg
                        width="6"
                        height="11"
                        viewBox="0 0 6 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M5 10L1.59055 6.16436C1.25376 5.78548 1.25376 5.21452 1.59055 4.83564L5 1"
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
                <!-- <div class="lectures-post" id="post-landmark-2" data-video="https://www.youtube.com/watch?v=ztN8QYYbe1M&t=2s">
                    <div class="video-modal">
                    <div class="container">
                        <div class="video-modal__wrapper">
                        <div class="video-modal__content">
                            <button class="video-modal__btn-close">
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                d="M11 5L8 8M8 8L5 11M8 8L5 5M8 8L11 11M1 1H15V15H1V1Z"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                />
                            </svg>
                            סגירה
                            </button>
                            <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/gtCd-HCo7FQ"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                            ></iframe>
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
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <img
                    src="assets/images/lectures-img.png"
                    alt="img"
                    width="300"
                    height="165"
                    class="lectures-post__img"
                    />
                    <div class="lectures-post__content">
                    <h4 class="lectures-post__title">
                        פיקוח שיפוטי במציאות טכנולוגית
                    </h4>
                    <p class="lectures-post__subtitle">
                        מאי 2022, הכנס השנתי ה-21 של לשכת עורכי הדין באילת
                    </p>
                    <div
                        class="lectures-post__text lectures-post__text--excert"
                    >
                        <p>
                        לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור...
                        </p>
                    </div>
                    <button class="lectures-post__btn open-modal-video">
                        <p>לצפייה</p>
                        <svg
                        width="6"
                        height="11"
                        viewBox="0 0 6 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M5 10L1.59055 6.16436C1.25376 5.78548 1.25376 5.21452 1.59055 4.83564L5 1"
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
                <!-- <div class="lectures-post" id="post-landmark-3" data-video="https://www.youtube.com/watch?v=ztN8QYYbe1M&t=2s">
                    <div class="video-modal">
                    <div class="container">
                        <div class="video-modal__wrapper">
                        <div class="video-modal__content">
                            <button class="video-modal__btn-close">
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                d="M11 5L8 8M8 8L5 11M8 8L5 5M8 8L11 11M1 1H15V15H1V1Z"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                />
                            </svg>
                            סגירה
                            </button>
                            <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/gtCd-HCo7FQ"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                            ></iframe>
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
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <img
                    src="assets/images/lectures-img.png"
                    alt="img"
                    width="300"
                    height="165"
                    class="lectures-post__img"
                    />
                    <div class="lectures-post__content">
                    <h4 class="lectures-post__title">
                        פיקוח שיפוטי במציאות טכנולוגית
                    </h4>
                    <p class="lectures-post__subtitle">
                        מאי 2022, הכנס השנתי ה-21 של לשכת עורכי הדין באילת
                    </p>
                    <div
                        class="lectures-post__text lectures-post__text--excert"
                    >
                        <p>
                        לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור...
                        </p>
                    </div>
                    <button class="lectures-post__btn open-modal-video">
                        <p>לצפייה</p>
                        <svg
                        width="6"
                        height="11"
                        viewBox="0 0 6 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M5 10L1.59055 6.16436C1.25376 5.78548 1.25376 5.21452 1.59055 4.83564L5 1"
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
                <!-- <div class="lectures-post" id="post-landmark-4" data-video="https://www.youtube.com/watch?v=ztN8QYYbe1M&t=2s">
                    <div class="video-modal">
                    <div class="container">
                        <div class="video-modal__wrapper">
                        <div class="video-modal__content">
                            <button class="video-modal__btn-close">
                            <svg
                                width="16"
                                height="16"
                                viewBox="0 0 16 16"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                d="M11 5L8 8M8 8L5 11M8 8L5 5M8 8L11 11M1 1H15V15H1V1Z"
                                stroke="white"
                                stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                />
                            </svg>
                            סגירה
                            </button>
                            <iframe
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/gtCd-HCo7FQ"
                            title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin"
                            allowfullscreen
                            ></iframe>
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
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            <div class="additional-video">
                                <img
                                src="assets/images/lectures-img.png"
                                alt="video"
                                class="additional-video__img"
                                />
                                <p class="additional-video__title">ספטמבר 2019</p>
                                <p class="additional-video__subtitle">
                                המכללה למנהל – המסלול האקדמי
                                </p>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <img
                    src="assets/images/lectures-img.png"
                    alt="img"
                    width="300"
                    height="165"
                    class="lectures-post__img"
                    />
                    <div class="lectures-post__content">
                    <h4 class="lectures-post__title">
                        פיקוח שיפוטי במציאות טכנולוגית
                    </h4>
                    <p class="lectures-post__subtitle">
                        מאי 2022, הכנס השנתי ה-21 של לשכת עורכי הדין באילת
                    </p>
                    <div
                        class="lectures-post__text lectures-post__text--excert"
                    >
                        <p>
                        לורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור...
                        </p>
                    </div>
                    <button class="lectures-post__btn open-modal-video">
                        <p>לצפייה</p>
                        <svg
                        width="6"
                        height="11"
                        viewBox="0 0 6 11"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M5 10L1.59055 6.16436C1.25376 5.78548 1.25376 5.21452 1.59055 4.83564L5 1"
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
            <?php get_sidebar(); ?>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>