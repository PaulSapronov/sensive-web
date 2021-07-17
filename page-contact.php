<?php get_header(); ?>

<!--================ Hero sm banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Контакты</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm banner end =================-->


<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <div id="map" style="height: 420px;">
        <?php the_content(); ?>
      </div>
    </div>


    <div class="row">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
        <address class="media contact-info address">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3><?php the_field('address', $post->ID); ?></h3>
            <p><?php the_field('subaddress', $post->ID); ?></p>
          </div>
        </address>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-headphone"></i></span>
          <div class="media-body">
            <h3><a href="tel:+74409865999"><?php the_field('phone', $post->ID); ?></a></h3>
            <p><?php the_field('subphone', $post->ID); ?></p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3><a href="mailto:"><?php the_field('email', $post->ID); ?></a></h3>
            <p><?php the_field('subemail', $post->ID); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-9">
        <?php echo do_shortcode('[contact-form-7 id="96" title="Контактная форма"]');?>
      </div>
    </div>
  </div>
</section>
<!-- ================ contact section end ================= -->

<?php get_footer(); ?>