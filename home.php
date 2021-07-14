<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>Блог</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Блог</li>
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
              <li><a href="#"><i class="ti-user"></i><?php the_author(); ?></a></li>
              <li><a href="#"><i class="ti-notepad"></i><?php the_time( 'F j, Y' ); ?></a></li>
              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
          </div>
          <div class="details mt-20">
            <a href="<?php echo get_the_permalink(); ?>">
              <h3><?php the_title(); ?></h3>
            </a>
            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
            <p><?php the_excerpt(); ?></p>
            <a class="button" href="<?php echo get_the_permalink(); ?>">Читать статью<i class="ti-arrow-right"></i></a>
          </div>
        </div>

        <?php endwhile; else: ?>
        Записей нет.
        <?php endif; ?>

        <!-- Start Posts Pagination -->
        <div class="row">
          <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="ti-angle-left"></i>
                    </span>
                  </a>
                </li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="ti-angle-right"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- End Posts Pagination -->

      <!-- Start Blog Post Siddebar -->

      <?php get_sidebar(); ?>

      <!-- End Blog Post Siddebar -->
    </div>
  </div>
</section>
<!--================ End Blog Post Area =================-->

<?php get_footer(); ?>