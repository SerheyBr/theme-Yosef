<div class="sidebar-featured-topics">
  <p class="sidebar-featured-topics__title">נושאים נבחרים מתוך האתר</p>
  <?php 
    wp_nav_menu([
        'theme_location' => 'sidebar_menu',
        'container'      => false,       
        'menu_class'     => '', 
        'fallback_cb'    => false,      
    ]);
  ?>


    <div class="sidebar-featured-topics__book">
      <a href="<?php 
      // echo esc_url(get_permalink(265)); 

      // строка выше для хостинга, раскоментировать когда меню файлы на хостинге
      echo esc_url(get_permalink(172)); 
      ?>">
        <p>עברות המתה - הספר</p>
        <img
          src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/book.png"
          class="sidebar-featured-topics__img"
          alt="book"
          width="274"
          height="156"
        />
      </a>
    </div>
</div>
