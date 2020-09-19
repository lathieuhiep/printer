<?php
get_header();

global $printer_options;

$printer_title = $printer_options['printer_404_title'];
$printer_content = $printer_options['printer_404_editor'];
$printer_background = $printer_options['printer_404_background']['id'];

?>

<div class="site-error text-center">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <figure class="site-error__image404">
                    <?php
                    if( !empty( $printer_background ) ):
                        echo wp_get_attachment_image( $printer_background, 'full' );
                    else:
                        echo'<img src="'.esc_url( get_theme_file_uri( '/images/404.jpg' ) ).'" alt="'.get_bloginfo('title').'" />';
                    endif;
                    ?>
                </figure>
            </div>

            <div class="col-md-6">
                <h1 class="site-title-404">
                    <?php
                    if ( $printer_title != '' ):
                        echo esc_html( $printer_title );
                    else:
                        esc_html_e( 'Awww...Do Not Cry', 'printer' );
                    endif;
                    ?>
                </h1>

                <div id="site-error-content">
                    <?php
                    if ( $printer_content != '' ) :
                        echo wp_kses_post( $printer_content );
                    else:
                    ?>
                        <p>
                            <?php esc_html_e( 'It is just a 404 Error!', 'printer' ); ?>
                            <br />
                            <?php esc_html_e( 'What you are looking for may have been misplaced', 'printer' ); ?>
                            <br />
                            <?php esc_html_e( 'in Long Term Memory.', 'printer' ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div id="site-error-back-home">
                    <a href="<?php echo esc_url( get_home_url('/') ); ?>" title="<?php echo esc_html__('Go to the Home Page', 'printer'); ?>">
                        <?php esc_html_e('Go to the Home Page', 'printer'); ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>