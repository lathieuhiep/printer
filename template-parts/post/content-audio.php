<?php

    $printer_audio = get_post_meta(  get_the_ID() , '_format_audio_embed', true );
    if( $printer_audio != '' ):

?>
        <div class="site-post-audio">

            <?php if( wp_oembed_get( $printer_audio ) ) : ?>

                <?php echo wp_oembed_get( $printer_audio ); ?>

            <?php else : ?>

                <?php echo balanceTags( $printer_audio ); ?>

            <?php endif; ?>

        </div>

<?php endif;?>