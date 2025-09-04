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
  <!-- <ul>
    <li>
      <a href="#"><p>חקירת סיבת המוות</p> </a>
    </li>
    <li>
      <a href="#"><p>יו”ר הוועדה הבוחנת</p> </a>
    </li>
    <li>
      <a href="#"><p>עברות המתה - מאמר</p> </a>
    </li>
    <li>
      <a href="#"><p>כנסי לשכת עורכי הדין</p> </a>
    </li>
    <li>
      <a href="#"><p>שיח זכויות מול שיח ראיות</p> </a>
    </li>
    <li>
      <a href="#"><p>המשפט הפלילי</p> </a>
    </li>
  </ul> -->
</div>
