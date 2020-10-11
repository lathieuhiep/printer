<?php
global $printer_options;

$printer_information_show_hide = $printer_options['printer_information_show_hide'] == '' ? 1 : $printer_options['printer_information_show_hide'];

if ( $printer_information_show_hide == 1 ) :

$printer_information_contact   =   $printer_options['printer_information_contact'];
$printer_information_mail      =   $printer_options['printer_information_mail'];
$printer_information_phone     =   $printer_options['printer_information_phone'];

?>

<div class="header-right-top d-flex align-items-center justify-content-end">
    <ul class="header-contact">
        <li>
            <a href="<?php echo esc_url( $printer_information_contact ); ?>">
                <i class="fas fa-angle-right"></i>
                <?php esc_html_e( 'Contact us', 'printer' ); ?>
            </a>
        </li>
        <li>
            <a href="tel:<?php echo esc_attr( $printer_information_phone ) ?>">
                <i class="fas fa-phone-alt"></i>
                <?php echo esc_html( $printer_information_phone ); ?>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fas fa-angle-right"></i>
                <?php esc_html_e( 'Login', 'printer' ); ?>
            </a>
        </li>
    </ul>
    <div class="header-search">
        <a href="#" class="search-toggle">
            <i class="fa fa-search"></i>
        </a>
        <?php get_search_form(); ?>
    </div>
    <button class="navbar-toggler">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
</div>

<?php

endif;