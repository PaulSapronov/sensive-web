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
          <form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
            <div class="d-flex flex-row">
              <!-- Поле Email (обязательно) -->
              <input required class="form-control" type="text" name="email" placeholder="Введите email" />
              <!-- Токен списка -->
              <!-- Получить API ID на: https://app.getresponse.com/campaign_list.html -->
              <input type="hidden" name="campaign_token" value="ocvPY" />
              <!-- Страница благодарности (по желанию) -->
              <input type="hidden" name="thankyou_url" value="<?php echo home_url( 'thankyou' ); ?>" />
              <!-- Добавить подписчика в цикл на определенный день (по желанию) -->
              <input type="hidden" name="start_day" value="0" />
              <!-- Кнопка подписаться -->
              <button class="click-btn btn btn-default" type="submit" value="Подписаться"><span class="lnr lnr-arrow-right"></button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>
            </div>
            <div class="info"></div>
          </form>
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
        <?php dynamic_sidebar('sidebar-social-footer'); ?>
        <!-- <div class="single-footer-widget">
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
        </div> -->
      </div>
    </div>
    <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">

      <p class="footer-text m-0">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<?php echo date('Y');?> <?php echo the_field('copyright', 8 ); ?> <i class="fa fa-heart" aria-hidden="true"></i> командой <a href="https://sensive-web.pavelsapronov.ru" target="_blank"><?php echo get_bloginfo('name'); ?></a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
    </div>
  </div>
</footer>
<!--================ End Footer Area =================-->
<?php wp_footer(); ?>

</body>

</html>