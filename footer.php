<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/core-img/pattern.png);">
    <div class="footer-content-area">
        <div class="container">
            <div class="row">
                <?php
                // Get the footer grid configuration from the Customizer
                $footer_grid = get_theme_mod('footer_grid', TKNFC_DEMO_DATA['footer_grid']); // Default: three equal columns (4+4+4 = 12)
                $grid_columns = explode(',', $footer_grid); // Convert the grid configuration into an array

                // Render dynamic widgetized areas based on the grid configuration
                foreach ($grid_columns as $index => $col_size) {
                    $widget_index = $index + 1; // Widget indexes are 1-based
                    ?>
                    <div class="col-12 col-lg-<?php echo esc_attr(trim($col_size)); ?> col-md-6">
                        <?php if (is_active_sidebar("footer-widget-$widget_index")) : ?>
                            <div class="footer-widget mt-x">
                                <?php dynamic_sidebar("footer-widget-$widget_index"); ?>
                            </div>
                        <?php else : ?>
                            <div class="footer-widget">
                                <h5><?php echo esc_html__("Footer Widget $widget_index", 'textdomain'); ?></h5>
                                <p><?php echo esc_html__("Add your content here via Appearance > Widgets > Footer Widget $widget_index.", 'textdomain'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php if (get_theme_mod('footer_copyright_enable', true)) : ?>
        <div class="footer-bottom text-center">
            <div class="container">
                <p class="copyright-text"><?php echo esc_html(get_theme_mod('footer_copyright_text', '© 2024 Your Company. All rights reserved.')); ?></p>
            </div>
        </div>
    <?php endif; ?>
</footer>
<!-- ##### Footer Area End ##### -->
<?php wp_footer(); ?>
</body>
</html>
