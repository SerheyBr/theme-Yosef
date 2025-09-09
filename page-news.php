<?php
/*
Template Name: News Page
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
                 <h2 class='page-title'>כתבות</h2>
                <div class="articles">
                    <div class="articles__posts">

                        <?php 
                            $query = new WP_Query([
                                'post_type' => 'post_news',
                                'posts_per_page' => -1,
                                'orderby'        => 'date',
                                'order'          => 'DESC', // новые сверху (по умолчанию)
                            ]);
                        ?>

                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <?php get_template_part('template-parts/posts/post-news') ;?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

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