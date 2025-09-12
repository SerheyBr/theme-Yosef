<div class="lectures-post">
    <a href="#" class='lectures-post-link' data-video="<?php the_field('lectures_video'); ?>"></a>
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
        <div class="lectures-post__content-wrapper">
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
        </div>
    <button class="lectures-post__btn open-modal-video">
        <p>לצפייה</p>
        <!-- <svg
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
        </svg> -->
        &#160;
        &#62;
         
    </button>
    </div>
</div>