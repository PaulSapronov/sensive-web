<!--================ Start Footer Area =================-->
<footer class="footer-area section-padding">
  <div class="container">
    <div class="row">
      <div class="col-lg-3  col-md-6 col-sm-6">
        <?php if ( ! dynamic_sidebar('sidebar-footer') ) : dynamic_sidebar('sidebar-footer'); endif; ?>
      </div>

      <div class="col-lg-4  col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Подписаться</h6>
          <p>Будьте в курсе наших последних новостей</p>
          <div class="" id="mc_embed_signup">
            <form class="form-inline" action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
              <div class="d-flex flex-row">
                <input type="text" name="email" placeholder="Email" /><br />
                <button class="click-btn btn btn-default" type="submit" value="Подписяться"><span class="lnr lnr-arrow-right"></button>
                <input type="hidden" name="campaign_token" value="ocvPY" />
                <input type="hidden" name="start_day" value="0" />
                <div style="position: absolute; left: -5000px;">
                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                </div>
              </div>
              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-3  col-md-6 col-sm-6">
        <div class="single-footer-widget mail-chimp">
          <ul class="instafeed d-flex flex-wrap">
            <?php if ( ! dynamic_sidebar('sidebar-footer-galery') ) : dynamic_sidebar('sidebar-footer-galery'); endif; ?>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 col-sm-6">
        <div class="single-footer-widget">
          <h6>Follow Us</h6>
          <p>Let us be social</p>
          <div class="footer-social d-flex align-items-center">
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-dribbble"></i>
            </a>
            <a href="#">
              <i class="fab fa-behance"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
      <p class="footer-text m-0">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>
        document.write(new Date().getFullYear());
        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </div>
</footer>
<!--================ End Footer Area =================-->

<?php wp_footer(); ?>

</body>

</html>