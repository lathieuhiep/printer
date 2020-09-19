
<?php if( is_active_sidebar( 'printer-sidebar-main' ) ): ?>

    <aside class="<?php echo esc_attr( printer_col_sidebar() ); ?> site-sidebar order-1">
        <?php dynamic_sidebar( 'printer-sidebar-main' ); ?>
    </aside>

<?php endif; ?>