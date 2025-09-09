<div class="judgments-post">
  <div class="judgments-post__title-box">
    <p class="judgments-post__title-date"><?php the_field('post_judgment_date') ;?></p>
    <p class="judgments-post__title-bottom"><?php the_field('post_judgment_title') ;?></p>
    <p><?php the_field('post_judgment_sn') ;?></p>
  </div>
  <div class="judgments-post__content">
    <div class="judgments-post__text judgments-post__text--excert">
      <p><b>  <?php the_title();?></b></p>
      <?php the_content();?>
    </div>
    <a href='<?php the_field('post_judgment_link') ;?>' class="judgments-post__btn" target="_blank" >
      <p>למסמך המלא / הורדה</p>
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
