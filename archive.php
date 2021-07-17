<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>
          <?php if( is_category() ){
            echo '<small>' . __('Рубрика ', 'sensive') . '</small> </br>' . get_queried_object()->name; 
          }?>
          <?php if( is_tag() ){
            echo '<small>' . __('Записи с меткой ', 'sensive') . '</small> </br>' . get_queried_object()->name; 
          }?>
          <?php if( is_author() ){
            echo '<small>' . __('Автор поста: ', 'sensive') . '</small> </br>' . get_the_author_meta('display_name'); 
          }?>
          <?php if( is_date() ){
            echo '<small>' . __('Дата: ', 'sensive') . '</small> </br>' . get_the_date('j F Y'); 
          }?>
        </h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Главная</li>

            <?php if( is_category() ){
              echo '<li class="breadcrumb-item active" aria-current="page">' . get_queried_object()->name; '</li>'; 
            }?>
            <?php if( is_tag() ){
              echo '<li class="breadcrumb-item active" aria-current="page">' . get_queried_object()->name; '</li>';
            }?>
            <?php if( is_author() ){
              echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_author_meta('display_name'); '</li>';
            }?>
            <?php if( is_date() ){
              echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_date('j F Y'); '</li>';
            }?>

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
        <div class="row">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="col-md-6">
            <div class="single-recent-blog-post card-view">
              <div class="thumb">

                <?php 
                if( has_post_thumbnail() ) { // Checking for a miniature
                    the_post_thumbnail( 'thumbnail', array('class' => "img-fluid w-100 h-100",)); // Thumbnail output
                }
                else { // If no miniature
                echo '<img class="img-fluid w-100 h-100" src="'.get_template_directory_uri().'/img/banner/blog.png">';
                }
                ?>

                <ul class="thumb-info">
                  <li>
                    <a href="<?php echo get_author_posts_url( get_the_author_meta('ID') );?>"><i class="ti-user"></i><?php the_author(); ?></a>
                  </li>
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
                <p><?php the_excerpt(); ?></p>
                <a class="button" href="<?php echo get_the_permalink(); ?>">Читать статью<i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <?php endwhile; else: ?>
          Записей нет.
          <?php endif; ?>

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