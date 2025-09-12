<?php
/*
Template Name: Lectures & Speeches Page
*/
get_header();
?>

<main class="layout">
    <div class="container">
    <div class="layout__wrapper">
        <div class="layout__content">
        <!-- <div class="layout__breadcrumbs"> -->
               <?php
                // my_breadcrumbs();
               ?>
             
        <!-- </div> -->
          <h2 class='page-title'>הרצאות ונאומים </h2>
        <div class="lectures">
            <div class="lectures__tags">
            <div class="tags">
                <button class="tags__tag active" data-tag="0">הצג הכל</button>
                <?php
                    $terms_all = get_terms([
                        'taxonomy' => 'lectures_tags',
                        'hide_empty' => true, // показывать даже пустые термины
                    ]);
                ?>

                <?php if ($terms_all && ! is_wp_error($terms_all)): ?>
                <?php foreach ($terms_all as $term): ?>
                    <button class="tags__tag" data-tag="<?php echo $term->term_id; ?>"><?php echo esc_html($term->name); ?></button>
                <?php endforeach; ?>
                <?php endif; ?>
                
            </div>
            </div>
            <div class="lectures__posts">

              <?php 
                $query = new WP_Query([
                    'post_type' => 'post_lectures',
                    'posts_per_page' => -1,
                    'meta_key'       => 'lectures_order',
                    'orderby'        => [
                        'meta_value_num' => 'ASC',
                        'date'           => 'DESC'
                    ],
                ]);
                ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                         <?php get_template_part('template-parts/posts/post-lectures');?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>


            <div class="video-modal">
                <div class="container">
                    <div class="video-modal__wrapper">
                        <div class="video-modal__content">
                            <button class="video-modal__btn-close">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 5L8 8M8 8L5 11M8 8L5 5M8 8L11 11M1 1H15V15H1V1Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                סגירה
                            </button>
                            <video id="main-video" controls>
                            <source src="<?php the_field('video_file'); ?>" type="video/mp4">
                            Ваш браузер не поддерживает видео.
                            </video>
                            <p class="video-modal__title">
                            הרצאתו של שופט בית המשפט העליון יוסף אלרון, בטקס
                            בוגרי ובוגרות ומוסמכי ומוסמכות מחזור 2022 של הפקולטה
                            למשפטים באוניברסיטת חיפה, שהתקיים ביום שני,
                            17.7.2023, בשעה 18:00.
                            </p>
                        </div>
                        <div class="video-modal__left-column">
                            <p class="video-modal__left-column-title">
                            הרצאות נוספות
                            </p>
                            <div class="video-modal__more-videos">  



                            <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php
                                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'card-thumb');
                                        $alt = get_the_title(); // можно подтянуть заголовок как alt
                                    ?>
                                    <div class="additional-video" data-video="<?php the_field('lectures_video'); ?>">
                                        <a href="#" class='lectures-post-link' ></a>
                                        <img
                                        src="<?php echo esc_url($image_url) ;?>"
                                        alt="<?php echo esc_attr($alt); ?>"
                                        class="additional-video__img"
                                        />
                                        <p class="additional-video__title"><?php the_field('lectures_date');?> </p>
                                        <p class="additional-video__subtitle">
                                        <?php the_title();?>
                                        </p>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div> 


        </div>
        </div>
        <div class="layout__sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
    </div>
</main>

<?php get_footer(); ?>