<div class="main_blog_details">
  <?php 
    if( has_post_thumbnail() ) { // Checking for a miniature
        the_post_thumbnail( 'post-thumbnail', array('class' => "img-fluid w-100",)); // Thumbnail output
    }
    else { // If no miniature
    echo '<img class="img-fluid w-100 h-100" src="'.get_template_directory_uri().'/img/banner/blog.png">';
    }
  ?>
  <h4><?php the_title(); ?></h4>
  <div class="user_details">
    <div class="float-left">
    </div>
    <div class="float-right mt-sm-0 mt-3">
      <div class="media">
        <div class="media-body">
          <h5><?php the_author(); ?></h5>
          <p><?php the_time('j F Y'); ?></p>
        </div>
        <div class="d-flex">
          <?php echo get_avatar( get_the_author_meta('ID'), '42' ); ?>
        </div>
      </div>
    </div>
  </div>

  <?php the_content(); ?>

  <div class="news_d_footer flex-column flex-sm-row">

    <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-dribbble"></i></a>
      <a href="#"><i class="fab fa-behance"></i></a>
    </div>
  </div>
</div>