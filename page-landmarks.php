<?php
/*
Template Name: landmarks Page
*/
get_header();
?>


<main class="layout">
    <div class="container">
    <div class="layout__wrapper">
        <div class="layout__content">
            <!-- <div class="layout__breadcrumbs"> -->
               <?php
                // my_breadcrumbs();
               ?>
               
            <!-- </div> -->
            <h2 class='page-title'>ציוני דרך </h2>
        <div class="landmarks">
            <div class="landmarks__posts">

                <?php 
                    $query = new WP_Query([
                        'post_type' => 'post_landmarks',
                        'posts_per_page' => -1,
                        'meta_key'       => 'landmarks_post_order',
                        'orderby'        => [
                            'meta_value_num' => 'ASC',
                            'date'           => 'DESC'
                        ],
                    ]);
                ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                       <?php  get_template_part('template-parts/posts/post-landmarks') ;?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <!-- <div class="landmarks-post" id="post-landmark-1">
                    <div class="landmarks-post__title-box">
                        <h3 class="landmarks-post__title-top">ספטמבר 1994</h3>
                        <h3 class="landmarks-post__title-bottom">
                        חקירת סיבת המוות
                        </h3>
                    </div>
                    <div class="landmarks-post__content">
                        <div
                            class="landmarks-post__text landmarks-post__text--excert"
                        >
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                        </div>
                        <div class="landmarks-post__text show-full-text">
                        <p>text more</p>
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <button class="landmarks-post__btn button-show-more">
                        <p>קרא עוד</p>
                        <svg
                        width="12"
                        height="10"
                        viewBox="0 0 12 10"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M6.85749 8.57084C6.46909 9.21818 5.53091 9.21818 5.14251 8.57084L0.908699 1.5145C0.508784 0.847972 0.988896 -8.94702e-09 1.76619 5.90063e-08L10.2338 7.99269e-07C11.0111 8.67222e-07 11.4912 0.847972 11.0913 1.5145L6.85749 8.57084Z"
                            fill="#0E7BCD"
                        />
                        </svg>
                    </button>
                    </div>
                </div> -->

                <!-- br -->
                <!-- <div class="landmarks-post" id="post-landmark-2">
                    <div class="landmarks-post__title-box">
                    <h3 class="landmarks-post__title-top">ספטמבר 1994</h3>
                    <h3 class="landmarks-post__title-bottom">
                        חקירת סיבת המוות
                    </h3>
                    </div>
                    <div class="landmarks-post__content">
                    <div
                        class="landmarks-post__text landmarks-post__text--excert"
                    >
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <div class="landmarks-post__text show-full-text">
                        <p>text more</p>
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <button class="landmarks-post__btn button-show-more">
                        <p>קרא עוד</p>
                        <svg
                        width="12"
                        height="10"
                        viewBox="0 0 12 10"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M6.85749 8.57084C6.46909 9.21818 5.53091 9.21818 5.14251 8.57084L0.908699 1.5145C0.508784 0.847972 0.988896 -8.94702e-09 1.76619 5.90063e-08L10.2338 7.99269e-07C11.0111 8.67222e-07 11.4912 0.847972 11.0913 1.5145L6.85749 8.57084Z"
                            fill="#0E7BCD"
                        />
                        </svg>
                    </button>
                    </div>
                </div> -->

                <!-- br -->
                <!-- <div class="landmarks-post" id="post-landmark-3">
                    <div class="landmarks-post__title-box">
                    <h3 class="landmarks-post__title-top">ספטמבר 1994</h3>
                    <h3 class="landmarks-post__title-bottom">
                        חקירת סיבת המוות
                    </h3>
                    </div>
                    <div class="landmarks-post__content">
                    <div
                        class="landmarks-post__text landmarks-post__text--excert"
                    >
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <div class="landmarks-post__text show-full-text">
                        <p>text more</p>
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <button class="landmarks-post__btn button-show-more">
                        <p>קרא עוד</p>
                        <svg
                        width="12"
                        height="10"
                        viewBox="0 0 12 10"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M6.85749 8.57084C6.46909 9.21818 5.53091 9.21818 5.14251 8.57084L0.908699 1.5145C0.508784 0.847972 0.988896 -8.94702e-09 1.76619 5.90063e-08L10.2338 7.99269e-07C11.0111 8.67222e-07 11.4912 0.847972 11.0913 1.5145L6.85749 8.57084Z"
                            fill="#0E7BCD"
                        />
                        </svg>
                    </button>
                    </div>
                </div> -->

                <!-- br -->
                <!-- <div class="landmarks-post" id="post-landmark-4">
                    <div class="landmarks-post__title-box">
                    <h3 class="landmarks-post__title-top">ספטמבר 1994</h3>
                    <h3 class="landmarks-post__title-bottom">
                        חקירת סיבת המוות
                    </h3>
                    </div>
                    <div class="landmarks-post__content">
                    <div
                        class="landmarks-post__text landmarks-post__text--excert"
                    >
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <div class="landmarks-post__text show-full-text">
                        <p>text more</p>
                        <p>
                        בלורם איפסום דולור סיט אמט, קונסקטורר אדיפיסינג אלית. סת
                        אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם.
                        וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו במר מודוף.
                        אודיפו בלאסטיק מונופץ קליר...
                        </p>
                    </div>
                    <button class="landmarks-post__btn button-show-more">
                        <p>קרא עוד</p>
                        <svg
                        width="12"
                        height="10"
                        viewBox="0 0 12 10"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M6.85749 8.57084C6.46909 9.21818 5.53091 9.21818 5.14251 8.57084L0.908699 1.5145C0.508784 0.847972 0.988896 -8.94702e-09 1.76619 5.90063e-08L10.2338 7.99269e-07C11.0111 8.67222e-07 11.4912 0.847972 11.0913 1.5145L6.85749 8.57084Z"
                            fill="#0E7BCD"
                        />
                        </svg>
                    </button>
                    </div>
                </div> -->
            </div>
        </div>
        </div>
        <div class="layout__sidebar">
       <?php get_sidebar() ;?>
        </div>
    </div>
    </div>
</main>

<?php get_footer() ;?>