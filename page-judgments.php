<?php
/*
Template Name: judgments Page
*/
get_header();
?>

    <main class="layout">
      <div class="container">
        <div class="layout__wrapper">
          <div class="layout__content">
            <div class="layout__breadcrumbs">
              <ul class="breadcrumbs">
                <li><a href="#">עשייה משפטית</a></li>
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
                <li><a href="#">דף הבית</a></li>
              </ul>
            </div>
            <div class="judgments">
              <div class="judgments__tags">
                <div class="tags">
            
                  <button class="tags__tag active" data-tag="0">הצג הכל</button>

                  <?php
                    $terms_all = get_terms([
                        'taxonomy' => 'judgment_tags',
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
              <div class="judgments__posts">
                
                <?php 
                $query = new WP_Query([
                    'post_type' => 'post_judgment',
                    'posts_per_page' => -1,
                    'meta_key'       => 'post_judgment_order',
                    'orderby'        => [
                        'meta_value_num' => 'ASC',
                        'date'           => 'DESC'
                    ],
                ]);
                ?>

                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                       <?php  get_template_part('template-parts/posts/post-judgments') ;?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="layout__sidebar">
            <div class="sidebar-judgments">
              <p class="sidebar-judgments__title">פסקי דין נבחרים</p>
                <?php 
                    wp_nav_menu([
                        'theme_location' => 'sidebar_judgments',
                        'container'      => false,       
                        'menu_class'     => 'sidebar-judgments__list', 
                        'fallback_cb'    => false,      
                    ]);
                 ?>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php get_footer() ;?>