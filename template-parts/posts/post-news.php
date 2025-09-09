<?php
  $image_url = get_the_post_thumbnail_url(get_the_ID(), 'card-thumb');
  $alt = get_the_title(); // можно подтянуть заголовок как alt
?>


<div class="articles-post">
  <img
    src="<?php echo esc_url($image_url) ;?>"
    alt="<?php echo esc_attr($alt); ?>"
    width="300"
    height="165"
    class="articles-post__img"
  />

  <div class="articles-post__content">
    <h4 class="articles-post__title"> <?php the_title() ;?></h4>
    <p class="articles-post__subtitle"> <?php the_field('news_date') ;?></p>
    <div class="articles-post__text articles-post__text--excert">
      <?php the_content() ;?>
    </div>
    <a
      href="<?php the_field('news_file') ?>"
      target="_blank"
      class="articles-post__btn button-show-more"
    >
      <p> לצפייה / הורדה</p>
      <!-- <svg
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
      </svg> -->
      &#160;
      &#62;
    </a>
  </div>
</div>
