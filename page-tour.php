<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Главная</li>
            <li class="breadcrumb-item">Туры</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <?php		
          global $post;

          $query = new WP_Query( [
            'posts_per_page' => 5,
            'post_type'      => 'tours',
          ] );

          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
          ?>
        <div class="single-recent-blog-post">
          <div class="thumb">

            <?php 
                if( has_post_thumbnail() ) { // Checking for a miniature
                    the_post_thumbnail( 'post-thumbnail', array('class' => "img-fluid w-100",)); // Thumbnail output
                }
                else { // If no miniature
                echo '<img class="img-fluid w-100 h-100" src="'.get_template_directory_uri().'/img/banner/blog.png">';
                }
                ?>

            <ul class="thumb-info thumb-info-tours">
              <li><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') );?>"><i class="ti-user"></i><?php the_author(); ?></a></li>
              <li><i class="ti-notepad"></i><?php the_time( 'F j, Y' ); ?></li>

            </ul>
          </div>
          <div class="details mt-20">
            <a href="<?php echo get_the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            <?php the_tags('', '')?>
            <p><?php the_excerpt(); ?></p>
            <a class="button" href="<?php echo get_the_permalink(); ?>">Читать статью<i class="ti-arrow-right"></i></a>
          </div>
        </div>
        <?php 
            }
          } else {
            // Постов не найдено
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>
      </div>

      <!-- Start Blog Post Siddebar -->
      <aside class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">
          <?php if ( ! dynamic_sidebar('sidebar-tours') ) : dynamic_sidebar('sidebar-tours'); endif; ?>
        </div>
      </aside>
      <!-- End Blog Post Siddebar -->
    </div>
  </div>
</section>
<!--================ End Blog Post Area =================-->

<?php get_footer(); ?>