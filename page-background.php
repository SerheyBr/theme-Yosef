<?php
/*
Template Name: Backgrond Page
*/
get_header();
?>

<main class="layout">
    <div class="container">
        <div class="layout__wrapper">
            <div class="layout__content">
                <div class="background">
                    <img
                    src="<?php the_field('backgroundp_img'); ?>"
                    alt="img"
                    width="300"
                    height="375"
                    class="background__img"
                    />
                    <div class="background__body">
                        <h2 class="background__title title-section"><?php the_field('backgroundP_title'); ?></h2>
                        <div><?php the_field('backgroundp_text'); ?></div>
                    </div>
                </div>
            </div>
            <div class="layout__sidebar">
                <?php get_sidebar() ;?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>