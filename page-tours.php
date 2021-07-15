<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>Туры</h1>
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
        <div class="single-recent-blog-post">
          <div class="thumb">
            <img class="img-fluid" src="img/blog/blog2.png" alt="">
            <ul class="thumb-info">
              <li><a href="#"><i class="ti-user"></i>Admin</a></li>
              <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
          </div>
          <div class="details mt-20">
            <a href="blog-single.html">
              <h3>Woman claims husband wants to name baby girl
                after his ex-lover sparking.</h3>
            </a>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>

        <div class="single-recent-blog-post">
          <div class="thumb">
            <img class="img-fluid" src="img/blog/blog3.png" alt="">
            <ul class="thumb-info">
              <li><a href="#"><i class="ti-user"></i>Admin</a></li>
              <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
          </div>
          <div class="details mt-20">
            <a href="blog-single.html">
              <h3>Tourist deaths in Costa Rica jeopardize safe dest
                ination reputation all time. </h3>
            </a>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>

        <div class="single-recent-blog-post">
          <div class="thumb">
            <img class="img-fluid" src="img/blog/blog4.png" alt="">
            <ul class="thumb-info">
              <li><a href="#"><i class="ti-user"></i>Admin</a></li>
              <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
              <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
            </ul>
          </div>
          <div class="details mt-20">
            <a href="blog-single.html">
              <h3>Tourist deaths in Costa Rica jeopardize safe dest
                ination reputation all time. </h3>
            </a>
            <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
            <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
          </div>
        </div>

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