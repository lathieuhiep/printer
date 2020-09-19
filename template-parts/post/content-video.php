<?php

$printer_video_post = get_post_meta(  get_the_ID() , 'printer_video_post', true );

if ( !empty( $printer_video_post ) ):

?>

    <div class="site-post-video">
        <?php echo wp_oembed_get( $printer_video_post ); ?>
    </div>

<?php endif;?>