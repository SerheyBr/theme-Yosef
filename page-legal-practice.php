<?php
/*
Template Name: Legal practice Page
*/
get_header();
?>

<main class="layout">
    <div class="container">
    <div class="layout__wrapper">
        <div class="layout__content">
        <div class="layout__breadcrumbs">
            <ul class="breadcrumbs">
            <li><a href="#">דף הבית</a></li>
            <li>
                <svg
                width="10"
                height="19"
                viewBox="0 0 10 19"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                >
                <path
                    d="M7 7L3 10.5L7 14"
                    stroke="#032169"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                />
                </svg>
            </li>
            <li><a href="#">עשייה משפטית</a></li>
            </ul>
        </div>
        <div class="legal-practice">
            <h2 class="legal-practice__title title-section"><?php echo the_field('title_lp'); ?></h2>
            <div class="legal-practice__posts">

<?php if( have_rows('lp-reapiter') ): ?>
    <?php $index = 0 ;?>
    <?php while( have_rows('lp-reapiter') ): the_row(); ?>
        <div class="legal-practice-post" id="post-leg-prac-<?php echo $index;?>">
            <h3 class="legal-practice-post__title"><?php the_sub_field('lp-reapiter_title'); ?> </h3>

            <div class="legal-practice-post__text legal-practice-post__text--excert text-WYSIWYG">
            <?php the_sub_field('lp-reapiter_exert'); ?>
            </div>

            <div class="legal-practice-post__text show-full-text text-WYSIWYG"><?php the_sub_field('lp-reapiter_full-text'); ?></div>
            <button class="legal-practice-post__btn button-show-more">
            <p dir='rtl'>סגור</p>
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
       <?php $index++; // Увеличиваем счетчик для следующего элемента ?>
    <?php endwhile; ?>
<?php endif; ?>

            </div>
        </div>
        </div>
        <div class="layout__sidebar">
        <div class="sidebar-legal-practice">
            <!-- <h3 class="sidebar-legal-practice__title">
            עשייה משפטית - רשימת נושאים
            </h3> -->
            <div class="sidebar-legal-practice__list">
<?php if( have_rows('lp-reapiter') ): ?>
    <?php $index = 0 ;?>
    <?php while( have_rows('lp-reapiter') ): the_row(); ?>
            <li>
                <?php the_sub_field('lp-reapiter_title'); ?>
                <a href="#post-leg-prac-<?php echo $index;?>"></a>
            </li> 
       <?php $index++; // Увеличиваем счетчик для следующего элемента ?>
    <?php endwhile; ?>
<?php endif; ?>

            <!-- <li class="active">
                קריירה שיפוטית
                <a href="#post-leg-prac-1"></a>
            </li>
            <li>
                משפט וחברה
                <a href="#post-leg-prac-2"></a>
            </li>
            <li>
                ביטחון
                <a href="#post-leg-prac-3"></a>
            </li>
            <li>
                הקפדה על זכויות חשודים ונאשמים
                <a href="#post-leg-prac-4"></a>
            </li>
            <li>
                מדיניות ענישה
                <a href="#"></a>
            </li>
            <li>
                הרפורמה בעבירות ההמתה
                <a href="#"></a>
            </li>
            <li>
                דיני הסגרה
                <a href="#"></a>
            </li>
            <li>
                משפט חוקתי
                <a href="#"></a>
            </li>
            <li>
                משפט מינהלי
                <a href="#"></a>
            </li>
            <li>
                משפט אזרחי
                <a href="#"></a>
            </li>
            <li>
                הצעות לתיקוני חקיקה
                <a href="#"></a>
            </li>
            <li>
                בית המשפט המחוזי בחיפה
                <a href="#"></a>
            </li>
            <li>
                פעילות נוספת במערכת המשפט
                <a href="#"></a>
            </li>
            <li>
                רשימת מאמרים
                <a href="#"></a>
            </li> -->
            </div>
        </div>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>