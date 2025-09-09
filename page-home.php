<?php
/*
Template Name: home Page
*/
get_header();
?>
<?php get_header();?>

<main class="layout">
    <div class="container">
        <div class="layout__wrapper">
            <div class="layout__content">
                <div class="home">
                    <img src="<?php the_field('hp_img') ;?>" alt="img" width="300" height="375" class="home__img"/>
                    <div class="home__body">
                        <h2 class="home__title title-section"><?php the_field('hp_title') ;?></h2>
                        <div>
                            <?php the_field('hp_text') ;?>
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