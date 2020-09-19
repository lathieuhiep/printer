<?php
global $printer_options;

$printer_information_show_hide = $printer_options['printer_information_show_hide'] == '' ? 1 : $printer_options['printer_information_show_hide'];

if ( $printer_information_show_hide == 1 ) :

$printer_information_address   =   $printer_options['printer_information_address'];
$printer_information_mail      =   $printer_options['printer_information_mail'];
$printer_information_phone     =   $printer_options['printer_information_phone'];

?>

<div class="information">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-7">
                <?php if ( $printer_information_address != '' ) : ?>

                    <span>
                        <i class="fas fa-map-marker" aria-hidden="true"></i>
                        <?php echo esc_html( $printer_information_address ); ?>
                    </span>

                <?php
                endif;

                if ( $printer_information_mail != '' ) :
                ?>

                    <span>
                        <i class="fas fa-envelope"></i>
                        <?php echo esc_html( $printer_information_mail ); ?>
                    </span>

                <?php
                endif;

                if ( $printer_information_phone != '' ) :
                ?>

                    <span>
                        <i class="fas fa-mobile-alt"></i>
                        <?php echo esc_html( $printer_information_phone ); ?>
                    </span>

                <?php endif; ?>
            </div>

            <div class="col-12 col-md-12 col-lg-5 d-none d-lg-block">
                <div class="information__social-network social-network-toTopFromBottom d-lg-flex justify-content-lg-end">
                    <?php printer_get_social_url(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

endif;