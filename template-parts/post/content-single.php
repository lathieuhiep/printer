<?php

global $printer_options;

$printer_on_off_share_single = $printer_options['printer_on_off_share_single'];

?>

<div id="post-<?php the_ID() ?>" <?php post_class( 'site-post-single-item' ); ?>>
    <?php printer_post_formats(); ?>

    <div class="site-post-content">
        <h2 class="site-post-title">
            <?php the_title(); ?>
        </h2>

        <?php printer_post_meta(); ?>

        <div class="site-post-excerpt">
            <?php
            the_content();

            printer_link_page();
            ?>
        </div>

        <div class="site-post-cat-tag">

            <?php if( get_the_category() != false ): ?>

                <p class="site-post-category">
                    <?php
                    esc_html_e('Category: ','printer');
                    the_category( ' ' );
                    ?>
                </p>

            <?php

            endif;

            if( get_the_tags() != false ):

            ?>

                <p class="site-post-tag">
                    <?php
                    esc_html_e( 'Tag: ','printer' );
                    the_tags('',' ');
                    ?>
                </p>

            <?php endif; ?>

        </div>
    </div>

    <?php

    if ( $printer_on_off_share_single == 1 || $printer_on_off_share_single == null ) :

        printer_post_share();

    endif;

    ?>
</div>

<?php
printer_comment_form();

get_template_part( 'template-parts/post/inc','related-post' );




