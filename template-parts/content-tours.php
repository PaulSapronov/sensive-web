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
<div class="main_blog_details">

  <div class="user_details">
    <div class="float-left">
      <a href="#">Lifestyle</a>
      <a href="#">Gadget</a>
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
    <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
    <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#">
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
    </a>
    <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-dribbble"></i></a>
      <a href="#"><i class="fab fa-behance"></i></a>
    </div>
  </div>
</div>
<?php 
	}
} else {
	// Постов не найдено
}

wp_reset_postdata(); // Сбрасываем $post
?>