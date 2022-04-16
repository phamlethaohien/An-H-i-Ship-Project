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
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Social</h4>
            <div class="social-links mt-3">
							<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
							<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
							<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
							<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
							<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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