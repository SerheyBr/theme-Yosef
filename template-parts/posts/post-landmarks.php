<div class="landmarks-post" id="post-landmark-@@id">
  <div class="landmarks-post__title-box">
    <h3 class="landmarks-post__title-top"><?php the_field('landmarks_post_date') ;?></h3>
    <h3 class="landmarks-post__title-bottom"><?php the_title() ;?></h3>
  </div>
  <div class="landmarks-post__content">
    <div class="landmarks-post__text landmarks-post__text--excert">
      <p>
        <?php the_field('landmarks_post_intro') ;?>
      </p>
    </div>
    <div class="landmarks-post__text show-full-text">
      <?php the_content() ;?>
    </div>
    <button class="landmarks-post__btn button-show-more">
      <p dir="rtl" class="btn-visible">סגור</p>
      <p dir="rtl" class="btn-hidden">קרא עוד</p>
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
</div>
