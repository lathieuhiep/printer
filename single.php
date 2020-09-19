<?php
get_header();

global $printer_options;

$printer_blog_sidebar_single = !empty( $printer_options['printer_blog_sidebar_single'] ) ? $printer_options['printer_blog_sidebar_single'] : 'right';

$printer_class_col_content = printer_col_use_sidebar( $printer_blog_sidebar_single, 'printer-sidebar-main' );

get_template_part( 'template-parts/breadcrumbs/inc', 'breadcrumbs' );
?>

<div class="site-container site-single">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr( $printer_class_col_content ); ?>">

                <?php
                if ( have_posts() ) : while (have_posts()) : the_post();

                    get_template_part( 'template-parts/post/content','single' );

                    endwhile;
                endif;
                ?>

            </div>

            <?php
            if ( $printer_blog_sidebar_single !== 'hide' ) :
	            get_sidebar();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

