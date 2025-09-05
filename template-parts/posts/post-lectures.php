<div class="lectures-post" data-video="https://www.youtube.com/watch?v=ztN8QYYbe1M&t=2s">
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
                        <!-- <div class="additional-video">
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
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <?php
      $image_url = get_the_post_thumbnail_url(get_the_ID(), 'card-thumb');
      $alt = get_the_title(); // можно подтянуть заголовок как alt
    ?>

    <img
    src="<?php echo esc_url($image_url) ;?>"
    alt="<?php echo esc_attr($alt); ?>"
    width="300"
    height="165"
    class="lectures-post__img"
    />
    <div class="lectures-post__content">
    <h4 class="lectures-post__title">
     <?php the_title();?>
    </h4>
    <p class="lectures-post__subtitle">
        <?php the_field('lectures_date');?>    
    </p>
    <div
        class="lectures-post__text lectures-post__text--excert"
    >
        <p>
            <?php the_field('lectures_intro');?>
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
</div>