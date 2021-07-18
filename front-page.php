<?get_header(); ?>

<main class="site-main">
  <!--================Hero Banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner">
        <div class="hero-banner__content">
          <h3><?php echo the_field( 'subtitle', $post->ID )?></h3>
          <h1><?php the_title(); ?></h1>
          <h4></h4>
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner end =================-->

  <?php echo get_template_part( 'template-parts/content', 'slider' ); ?>

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <?php		
          global $post;

          $query = new WP_Query( [
            'posts_per_page' => 5,
            'post_type'      => 'post',
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

              <ul class="thumb-info">
                <li><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') );?>"><i class="ti-user"></i><?php the_author(); ?></a></li>
                <li><i class="ti-notepad"></i><?php the_time( 'F j, Y' ); ?></li>
                <li><i class="ti-themify-favicon"></i>
                  <?php
                  $sensive_comment_count = comments_number(); // возвратит число
                  if ( comments_open() ) {
                    if ( $sensive_comment_count == 0 ) {
                      $comments = __('No Comments');
                    } elseif ( $sensive_comment_count > 1 ) {
                      $comments = $sensive_comment_count . __(' Comments');
                    } else {
                      $comments = __('1 Comment');
                    }
                    $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
                    } else {
                    $write_comments =  __('Comments are off for this post.');
                    }
                ?>

                </li>
              </ul>
            </div>
            <div class="details mt-20">
              <a href="<?php echo get_the_permalink(); ?>">
                <h3><?php the_title(); ?></h3>
              </a>
              <p class="tag-list-inline"><?php the_tags(); ?></p>
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
            <?php if ( ! dynamic_sidebar('sidebar-main') ) : dynamic_sidebar('sidebar-main'); endif; ?>
          </div>
        </aside>
        <!-- End Blog Post Siddebar -->

      </div>
    </div>
  </section>
  <!--================ End Blog Post Area =================-->
</main>

<?php get_footer();?>