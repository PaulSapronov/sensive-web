<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1><?php the_title(); ?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Туры</li>
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

        <?php echo get_template_part( 'template-parts/content', 'tours' ); ?>

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