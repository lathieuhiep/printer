<?php

global $printer_options;

$printer_show_loading = $printer_options['printer_general_show_loading'] == '' ? '0' : $printer_options['printer_general_show_loading'];

if(  $printer_show_loading == 1 ) :

    $printer_loading_url  = $printer_options['printer_general_image_loading']['url'];
?>

    <div id="site-loadding" class="d-flex align-items-center justify-content-center">

        <?php  if( $printer_loading_url !='' ): ?>

            <img class="loading_img" src="<?php echo esc_url( $printer_loading_url ); ?>" alt="<?php esc_attr_e('loading...','printer') ?>"  >

        <?php else: ?>

            <img class="loading_img" src="<?php echo esc_url(get_theme_file_uri( '/images/loading.gif' )); ?>" alt="<?php esc_attr_e('loading...','printer') ?>">

        <?php endif; ?>

    </div>

<?php endif; ?>