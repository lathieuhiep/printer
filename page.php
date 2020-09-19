<?php
get_header();

$printer_check_elementor =   get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

$printer_class_elementor =   '';

if ( $printer_check_elementor ) :
    $printer_class_elementor =   ' site-container-elementor';
endif;

?>

    <main class="site-container<?php echo esc_attr( $printer_class_elementor ); ?>">

        <?php
        if ( $printer_check_elementor ) :
            get_template_part('template-parts/page/content','page-elementor');
        else:
            get_template_part('template-parts/page/content','page');
        endif;
        ?>

    </main>

<?php 

get_footer();