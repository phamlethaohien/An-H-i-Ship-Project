<?php
global $AnHaiShipWebsite_options;

$nav_top_sticky   =   $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_nav_sticky'] ?? 1;
$AnHaiShipWebsite_opt_logo_image_id    =   $AnHaiShipWebsite_options['AnHaiShipWebsite_opt_logo_image']['id'];
?>

<nav id="site-navigation" class="main-navigation<?php echo esc_attr( $nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <div class="site-navbar navbar-expand-lg">
        <div class="container">
            <div class="site-navigation_warp d-flex justify-content-lg-end">
                <div class="site-logo d-flex align-items-center">
                    <a href="<?php echo esc_url( get_home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                            if ( !empty( $AnHaiShipWebsite_opt_logo_image_id ) ) :
                                echo wp_get_attachment_image( $AnHaiShipWebsite_opt_logo_image_id, 'full' );
                            else :
                                echo'<img class="logo-default" src="'.esc_url( get_theme_file_uri( '/assets/images/logo.png' ) ).'" alt="'.get_bloginfo('title').'" />';
                            endif;
                        ?>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#site-menu" aria-controls="site-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                </div>

                <div id="site-menu" class="site-menu collapse navbar-collapse d-lg-flex justify-content-lg-end">

                    <?php

                    if ( has_nav_menu('primary') ) :

                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav',
                            'container'      => false,
                        ) ) ;

                    else:

                    ?>

						<ul class="main-menu navbar-nav ms-auto">
							<li class="nav-item dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">About Us</a>
								<div class="sub-menu dropdown-menu">
									<a href="#" class="dropdown-item">Film</a>
									<a href="#" class="dropdown-item">Team</a>
								</div>
							</li>
							<!-- <li class="nav-item"><a class="nav-link" href="#about-us">About Us</a></li> -->
							<li class="nav-item"><a class="nav-link" href="#businesses">Businesses</a></li>
							<li class="nav-item"><a class="nav-link" href="#porfolio">Porfolio</a></li>
							<li class="nav-item"><a class="nav-link" href="#news">News</a></li>
							<li class="nav-item"><a class="nav-link" href="#english">English</a></li>
							<?php
							// TODO: If admin
							if ( has_nav_menu('primary') ) :

							?>
								<li>
									<a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
										<?php esc_html_e( 'ADD TO MENU','AnHaiShipWebsite' ); ?>
									</a>
								</li>
							<?php endif; ?>
                        </ul>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</nav>