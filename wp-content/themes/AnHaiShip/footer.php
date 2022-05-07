<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
							<?php
							if(function_exists('the_custom_logo')){
								$custom_logo_id = get_theme_mod('custom_logo');
								$logo = wp_get_attachment_image_src($custom_logo_id)[0];
							}
							?>
							<a href="/" class="logo me-auto me-lg-0"><img src="<?php echo $logo ?>" alt="" class="img-fluid"></a>
              <p>Địa chỉ:
              Số 110, Lô 17 Mở Rộng, Đường Trung Hành 5, Phường Đằng Lâm, Quận Hải An, Thành phố Hải Phòng. 
              <br>
                <strong>Điện thoại:</strong>:</strong> 0225 8830218<br>
                <strong>Email:</strong> chartering@anhaishipping.com.vn<br> ops@anhaishipping.com.vn  <br>
                <strong>Fax:</strong> +84 225 8830218<br>
              </p>
              
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <div class="menu-footer">
							<?php
							wp_nav_menu(
								array(
									'menu' => 'footer',
									'container' => '',
									'theme_location' => 'footer'
								)
							);
							?>
						</div>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Vận tải quốc tế và nội địa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Logistic</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Cho thuê tàu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Mua bán tàu</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Quản lý và cung ứng thuyền viên</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Social</h4>
            <div class="social-links mt-3">
							<a href="https://www.facebook.com/profile.php?id=100016342899214" class="facebook"><i class="bx bxl-facebook"></i></a>
						</div>

          </div>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>HG</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Code by <a href="https://www.facebook.com/hoan.glad">HoanPL</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php wp_footer(); ?>

</body>

</html>