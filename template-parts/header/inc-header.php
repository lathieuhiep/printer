<?php
global $printer_options;

$printer_nav_top_sticky   =   $printer_options['printer_nav_top_sticky'];
?>

<header class="site-header<?php echo esc_attr( $printer_nav_top_sticky == 1 ? ' active-sticky-nav' : '' ); ?>">
    <div class="container d-flex">
        <div class="header-left flex-grow-0">
            <?php get_template_part('template-parts/header/inc','logo'); ?>
        </div>

        <div class="header-right flex-grow-1">
            <?php
            get_template_part( 'template-parts/header/inc', 'information' );

            get_template_part('template-parts/header/inc','nav');
            ?>
        </div>
    </div>
</header>