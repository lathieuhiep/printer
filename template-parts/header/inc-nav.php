<div class="header-right-bottom">
    <nav id="site-navigation" class="main-navigation">
        <div class="site-navbar navbar-expand-lg">
            <div class="site-navigation_warp">
                <div class="site-menu collapse navbar-collapse d-flex">
                    <?php
                    if ( has_nav_menu('primary') ) :
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'navbar-nav flex-grow-1 d-lg-flex justify-content-lg-end',
                            'container'      => false,
                        ) ) ;
                    else:
                    ?>
                        <ul class="main-menu flex-grow-1 d-lg-flex justify-content-lg-end">
                            <li>
                                <a href="<?php echo get_admin_url().'/nav-menus.php'; ?>">
                                    <?php esc_html_e( 'ADD TO MENU','printer' ); ?>
                                </a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <a href="#" class="nav-panel-close d-lg-none">
        <i class="fas fa-times"></i>
    </a>
</div>