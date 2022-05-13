<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php wp_head(); ?>
  <!-- Favicons -->
  <link href="wp-content/themes/AnHaiShip/assets/images/favicon.png" rel="icon">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-main">
    <div class="container d-flex align-items-center justify-content-lg-between">
			<?php
			if(function_exists('the_custom_logo')){
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id)[0];
			}
			?>
      <a href="/" class="logo me-auto me-lg-0"><img src="<?php echo $logo ?>" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
					<?php
					wp_nav_menu(
						array(
							'menu' => 'primary',
							'container' => '',
							'theme_location' => 'primary'
						)
					);
					?>
          <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <nav class="navbar order-last order-lg-0">
        <ul>
          <li class="get-started-btn dropdown">
            <a href="#"><span>
              <?php
                if (pll_current_language() == 'en') {
                  echo 'Language';
                } else {
                  echo 'Ngôn ngữ';
                }
              ?>
            </span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dropdown-menu">
              <?php pll_the_languages($args); ?>
            </ul>
          </li>
        </ul>
      </nav>

    </div>
  </header><!-- End Header -->

	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center justify-content-center">
		<div class="container" data-aos="fade-up">

			<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
				<div class="col-xl-8 col-lg-10">
          <h2 class="mb-5"><?php echo get_bloginfo('name') ?></h2>
					<h1><?php single_post_title(); ?><span>.</span></h1>
				</div>
			</div>

      <?php if ( is_front_page() ) : ?>
        <div class="row gy-4 mt-5 justify-content-center getting-started-services" data-aos="zoom-in" data-aos-delay="250">
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-store-line"></i>
              <h3><a href="#services">
                <?php
                if (pll_current_language() == 'en') {
                  echo 'International and domestic transportation';
                } else {
                  echo 'Vận tải quốc tế và nội địa';
                }
                ?>
              </a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line"></i>
              <h3><a href="#services">Logistic</a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-calendar-todo-line"></i>
              <h3><a href="#services">
                <?php
                if (pll_current_language() == 'en') {
                  echo 'Boat rental';
                } else {
                  echo 'Cho thuê tàu';
                }
                ?>
              </a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-paint-brush-line"></i>
              <h3><a href="#services">
                <?php
                if (pll_current_language() == 'en') {
                  echo 'Buy and sell ships';
                } else {
                  echo 'Mua bán tàu';
                }
                ?>
              </a></h3>
            </div>
          </div>
          <div class="col-xl-2 col-md-4">
            <div class="icon-box">
              <i class="ri-database-2-line"></i>
              <h3><a href="#services">
                <?php
                if (pll_current_language() == 'en') {
                  echo 'Crew management and supply';
                } else {
                  echo 'Quản lý và cung ứng thuyền viên';
                }
                ?>
              </a></h3>
            </div>
          </div>
        </div>
        <div class="text-center mt-5 d-sm-block d-md-none">
          <a href="#services" class="btn btn-main">
            <?php
            if (pll_current_language() == 'en') {
              echo 'Crew management and supply';
            } else {
              echo 'Dịch vụ của chúng tôi';
            }
            ?>
          </a>
        </div>
      <?php endif; ?>
		</div>
	</section><!-- End Hero -->