
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
    <p class="articles-post__subtitle"> <?php the_field('articles_date') ;?></p>
    <div class="articles-post__text articles-post__text--excert">
      <?php the_field('articles_date_intro') ;?>
    </div>
    <a
      href="<?php the_permalink(); ?>"
      class="articles-post__btn button-show-more"
    >
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
    </a>
  </div>
</div>
