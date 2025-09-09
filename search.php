<?php get_header();?>





    <main class="layout">
      <div class="container">
        <div class="layout__wrapper">
          <div class="layout__content">
            <!-- <div class="layout__breadcrumbs"> -->
                <?php 
                // my_breadcrumbs();
                ?>
            <!-- </div> -->
             <h2 class='page-title'>לְחַפֵּשׂ</h2>
            <div class="search">
              <div class="search__result-subtitle">
                <div dir="rtl">
                  נמצאו <strong><?php echo $wp_query->found_posts; ?></strong> תוצאות חיפוש לערך:
                  <span> <?php echo get_search_query(); ?></span>
                </div>
              </div>
              <div class="search__tags">
                <!-- @@include('../components/tags.html') -->
              </div>
              <div class="search__posts">
                <!-- if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        the_title();
    }
} -->

<?php if(have_posts()) :?>
    <?php while(have_posts()) : the_post(); ?>
        <?php get_template_part('template-parts/posts/post-search');?>
    <?php endwhile;?>
    <?php else : ?>
    <p>שום דבר לא נמצא.</p>
<?php endif;?>
               
                <!-- br -->
                <!-- @@include('../components/judgments-post.html', {"id": "1"}) -->
                <!-- br -->
                <!-- @@include('../components/landmarks-post.html', {"id": "2"}) -->
                <!-- br -->
                <!-- @@include('../components/lectures-post.html', {"id": "3"}) -->
                <!-- br -->
                <!-- @@include('../components/legal-practice-post.html', {"id": "4"}) -->
              </div>
            </div>
          </div>
          <div class="layout__sidebar">
           <?php get_sidebar() ;?>
          </div>
        </div>
      </div>
    </main>

    <main class="layout">
    <div class="container">
        <div class="layout__wrapper">
            <div class="layout__content">
                <h1>Результаты поиска: "<?php echo get_search_query(); ?>"</h1>

  <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article>
        <h2>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php the_excerpt(); ?>
      </article>
    <?php endwhile; ?>

    <?php the_posts_pagination(); ?>

  <?php else : ?>
    <p>Ничего не найдено.</p>
  <?php endif; ?>
            </div>
            <div class="layout__sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>