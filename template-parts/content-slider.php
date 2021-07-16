<!--================ Blog slider start =================-->
<section>
  <div class="container">
    <div class="owl-carousel owl-theme blog-slider">
      <?php		
        global $post;
        
        $query = new WP_Query( [
          'posts_per_page' => 6,
          'post_type'      => 'tours',
        ] );
        
        if ( $query->have_posts() ) {
          while ( $query->have_posts() ) {
            $query->the_post();
      ?>
      <div class="card blog__slide text-center">
        <div class="blog__slide__img">
          <img class="card-img rounded-0" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        </div>
        <div class="blog__slide__content">
          <h3><a href="#"><?php the_title(); ?></a></h3>
          <p>2 days ago</p>
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
  </div>
</section>
<!--================ Blog slider end =================-->