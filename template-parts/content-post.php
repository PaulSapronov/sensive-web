<div class="main_blog_details">
  <?php 
    if( has_post_thumbnail() ) { // Checking for a miniature
        the_post_thumbnail( 'post-thumbnail', array('class' => "img-fluid w-100",)); // Thumbnail output
    }
    else { // If no miniature
    echo '<img class="img-fluid w-100 h-100" src="'.get_template_directory_uri().'/img/banner/blog.png">';
    }
  ?>
  <a href="#">
    <h4><?php the_title(); ?></h4>
  </a>
  <div class="user_details">
    <div class="float-left">
      <?php the_tags('', '')?>
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
    <span class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#">
      <span class="align-middle mr-2">
        <i class="ti-themify-favicon"></i>
      </span><?php
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
    </span>
    <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
      <?php dynamic_sidebar( 'sidebar-social-header' )?>
    </div>
  </div>
</div>