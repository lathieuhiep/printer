<?php
//Global variable redux
global $printer_options;

$multi_column     =   $printer_options ["printer_footer_multi_column"];
$multi_column_l   =   $printer_options ["printer_footer_multi_column_1"];
$multi_column_2   =   $printer_options ["printer_footer_multi_column_2"];
$multi_column_3   =   $printer_options ["printer_footer_multi_column_3"];
$multi_column_4   =   $printer_options ["printer_footer_multi_column_4"];

if( is_active_sidebar( 'printer-sidebar-footer-multi-column-1' ) || is_active_sidebar( 'printer-sidebar-footer-multi-column-2' ) || is_active_sidebar( 'printer-sidebar-footer-multi-column-3' ) || is_active_sidebar( 'printer-sidebar-footer-multi-column-4' ) ) :

?>

    <div class="site-footer__multi--column">
        <div class="container">
            <div class="row">
                <?php
                for( $i = 0; $i < $multi_column; $i++ ):

                    $j = $i +1;

                    if ( $i == 0 ) :
                        $printer_col = $multi_column_l;
                    elseif ( $i == 1 ) :
                        $printer_col = $multi_column_2;
                    elseif ( $i == 2 ) :
                        $printer_col = $multi_column_3;
                    else :
                        $printer_col = $multi_column_4;
                    endif;

                    if( is_active_sidebar( 'printer-sidebar-footer-multi-column-'.$j ) ):
                ?>

                    <div class="col-12 col-sm-6 col-md-4 col-lg-<?php echo esc_attr( $printer_col ); ?>">

                        <?php dynamic_sidebar( 'printer-sidebar-footer-multi-column-'.$j ); ?>

                    </div>

                <?php
                    endif;

                endfor;
                ?>
            </div>
        </div>
    </div>

<?php endif; ?>