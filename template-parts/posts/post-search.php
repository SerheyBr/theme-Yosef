<div class="search-result">
  <div class="search-result__location">

    <?php
        $post_type_obj = get_post_type();          
    ?>

    <p>post type object -><?php echo $post_type_obj;?></p>
    <p><</p>
    <p>the title -><?php the_title();?></p>
    <p>the content-><?php the_content() ;?></p>
  </div>
  <p class="search-result__text">
    <!-- לורם איפסום דולור סיט אמט, <span>עברות המתה</span> אדיפיסינג אלית. סת
    אלמנקום ניסי נון ניבאה. דס איאקוליס וולופטה דיאם. וסטיבולום אט דולור
    וסטיבולום אט דולור, קראס אגת לקטוס וואל אאוגו וסטיבולום סוליסיטידום... -->
    <?php 
        $search_query = get_search_query();
        $content = wp_trim_words( get_the_content(), 40, '...' );
        $post_type = get_post_type();
        $highlighted_content = preg_replace("/($search_query)/iu", '<mark>$1</mark>', $content);
    ?>
   

    <?php echo $highlighted_content ;?>
  </p>
  <a href="#" class="search-result__link button-show-more">
    <p dir="rtl">לצפייה</p>
    <svg
      width="10"
      height="16"
      viewBox="0 0 10 16"
      fill="none"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        d="M5 14L1.59055 10.1644C1.25376 9.78548 1.25376 9.21452 1.59055 8.83564L5 5"
        stroke="#0E7BCD"
        stroke-width="1.5"
        stroke-miterlimit="3.8637"
        stroke-linecap="round"
      />
    </svg>
  </a>
</div>
