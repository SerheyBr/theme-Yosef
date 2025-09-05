

<!DOCTYPE html>
<html lang="he" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <!-- <link rel="icon" type="image/svg+xml" href="/vite.svg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <!-- шрифт для 75% -->
    <!-- <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@75,100..900&display=swap"
      rel="stylesheet"
    /> -->
    <!-- шрифт для 87% -->
    <!-- <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wdth,wght@87.5,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/libs/slim-select/slimselect.css" />
    <link rel="stylesheet" href="assets/libs/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css" /> -->
    <?php wp_head(); ?> 
    <title>Template-vite.1.0.</title>
  </head>
  <body>
    <header class="header">
  <div class="header__top">
    <div class="container">
      <h1 dir='rtl'>יוסף אלרון, שופט בית המשפט העליון (בדימוס)</h1>
    </div>
  </div>
  <div class="header__body">
    <div class="container">
      <div class="header__body-wrapper">
        <div class="header__burger">
          <svg
            class="header__burger--close"
            width="22"
            height="17"
            viewBox="0 0 22 17"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M1 1H21M1 8.5H21M1 16H21"
              stroke="#032169"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <svg
            class="header__burger--open"
            width="18"
            height="17"
            viewBox="0 0 18 17"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M1 1L17 16M1 16L17 1"
              stroke="#032169"
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
          <!-- </div> -->
        </div>
        <nav class="header__menu">
        <?php 
          wp_nav_menu([
              'theme_location' => 'header_menu',
              'container'      => false,       
              'menu_class'     => '', 
              'fallback_cb'    => false,      
          ]);
        ?>
          <!-- <ul>
            <li class='active'>
              <a href="index.html" >דף בית</a>
            </li>
            <li>
              <a href="<?php echo esc_url(get_permalink(9)); ?>">עשייה משפטית</a>
            </li>
            <li>
              <a href="<?php echo esc_url(get_permalink(52)); ?>">רקע אישי</a>
            </li>
            <li>
              <a href="<?php echo esc_url(get_permalink(54)); ?>">ציוני דרך</a>
            </li>
            <li>
              <a href="<?php echo esc_url(get_permalink(56)); ?>">פסקי דין</a>
            </li>
            <li>
              <a href="<?php echo esc_url(get_permalink(59)); ?>">מאמרים</a>
            </li>
            <li>
              <a href="<?php echo esc_url(get_permalink(61)); ?>">הרצאות ונאומים</a>
            </li>
            <li>
              <a href="#">כתבות</a>
            </li>
            <li>
              <a href="contacts.html">יצירת קשר</a>
            </li>
          </ul> -->
        </nav>
        <div class="header__search">
          <button class="header__search-btn">
            <svg
              width="16"
              height="16"
              viewBox="0 0 16 16"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M11.622 11.622L15 15M13.4444 7.22222C13.4444 3.78578 10.6587 1 7.22222 1C3.78578 1 1 3.78578 1 7.22222C1 10.6587 3.78578 13.4444 7.22222 13.4444C10.6587 13.4444 13.4444 10.6587 13.4444 7.22222Z"
                stroke="#032169"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>

          <input type="search" autocomplete="off" placeholder="חיפוש..." />
          <ul class="header__search-body">
            <!-- <li><a href="#">קריירה שיפוטית</a></li>
            <li><a href="#">משפט וחברה</a></li>
            <li><a href="#">ביטחון</a></li>
            <li><a href="#">הקפדה על זכויות חשודים ונאשמים</a></li>
            <li><a href="#">מדיניות ענישה</a></li>
            <li><a href="#">הרפורמה בעבירות ההמתה</a></li>
            <li><a href="#">דיני הסגרה</a></li>
            <li><a href="#">משפט חוקתי</a></li>
            <li><a href="#">משפט מינהלי</a></li>
            <li><a href="#">משפט אזרחי</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>



