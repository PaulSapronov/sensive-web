<?php get_header(); ?>

<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>Записи</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Главная</li>
            <li class="breadcrumb-item">Записи</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
  <div class="container">
    <div class="row">

      <main class="col-lg-8">

        <?php
          while ( have_posts() ) :
            the_post();
            
            
              get_template_part( 'template-parts/content', get_post_type() );
            
            the_post_navigation(
              array(
                'prev_text' => '',      
                'next_text' => ''
              )
            );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
              comments_template();
            endif;

          endwhile; // End of the loop.
        ?>

      </main>
            
      <!-- Start Blog Post Siddebar -->
      <aside class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">
          <?php if ( ! dynamic_sidebar('sidebar-blog') ) : dynamic_sidebar('sidebar-blog'); endif; ?>
        </div>
      </aside>
      <!-- End Blog Post Siddebar -->
    </div>
</section>
<!--================ End Blog Post Area =================-->

<?php get_footer(); ?>
