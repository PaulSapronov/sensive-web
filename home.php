<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>Блог</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Главная</li>
            <li class="breadcrumb-item">Блог</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->
<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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
              <li>
                <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') );?>"><i class="ti-user"></i><?php the_author(); ?></a>
              </li>
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

        <?php endwhile; else: ?>
        Записей нет.
        <?php endif; ?>

        <div class="row">
          <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
                <?php the_posts_pagination( array(
                'end_size'           => 0,
                'mid_size'           => 0,
                'prev_text'          => '<li class="page-item"><button class="page-link"><span aria-hidden="true"><i class="ti-angle-left"></i></span></button></li>',
                'next_text'          => '<li class="page-item"><button class="page-link"><span aria-hidden="true"><i class="ti-angle-right"></i></span></button></li>',
                
              )); ?>

                <!-- <button class="page-link"><span aria-hidden="true"><i class="ti-angle-left"></i></span></button> -->
                <!-- <button class="page-link"><span aria-hidden="true"><i class="ti-angle-right"></i></span></button> -->

                <!-- <li class="page-item active"><a href="#" class="page-link">1</a></li> -->
                <!-- <li class="page-item"><a href="#" class="page-link">2</a></li> -->

              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- Start Blog Post Siddebar -->
      <aside class="col-lg-4 sidebar-widgets">
        <div class="widget-wrap">
          <?php if ( ! dynamic_sidebar('sidebar-blog') ) : dynamic_sidebar('sidebar-blog'); endif; ?>

        </div>
      </aside>
      <!-- End Blog Post Siddebar -->

    </div>
  </div>
</section>
<!--================ End Blog Post Area =================-->

<?php get_footer(); ?>