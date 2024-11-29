<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function custom_footer_setup() {
    // Get the number of footer columns
    $footer_columns = get_theme_mod('footer_columns', TKNFC_DEMO_DATA['footer_columns']);

    // Register widgetized areas
    for ($i = 1; $i <= $footer_columns; $i++) {
        register_sidebar(array(
            'name'          => "Footer Widget $i",
            'id'            => "footer-widget-$i",
            'description'   => "Add widgets here to appear in Footer Column $i.",
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>',
        ));
    }
}
add_action('widgets_init', 'custom_footer_setup');

function custom_footer_customizer($wp_customize) {
    // Add Footer Customization Section
    $wp_customize->add_section('footer_settings', array(
        'title'    => __('Footer Settings', 'textdomain'),
        'priority' => 120,
    ));

    // Number of Columns
    add_customizer_setting(
        $wp_customize,
        'footer_columns',
        TKNFC_DEMO_DATA['footer_columns'],
        'Number of Footer Columns',
        'number',
        'footer_settings',
        'footer_settings',
        'absint',
        'footer'
    );

    // Footer Grid Configuration
    add_customizer_setting(
        $wp_customize,
        'footer_grid',
        TKNFC_DEMO_DATA['footer_grid'],
        'Footer Grid Layout',
        'text',
        'footer_settings',
        'footer_settings',
        'sanitize_text_field',
        'footer',
        'Specify grid sizes for columns (comma-separated, e.g., "4,4,4" for three equal columns). Must add up to 12.'
    );

    // Enable Copyright
    $wp_customize->add_setting('footer_copyright_enable', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('footer_copyright_enable', array(
        'type'    => 'checkbox',
        'section' => 'footer_settings',
        'label'   => __('Enable Copyright Line', 'textdomain'),
    ));

    // Copyright Text
    $wp_customize->add_setting('footer_copyright_text', array(
        'default'           => '© 2024 Your Company. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('footer_copyright_text', array(
        'type'    => 'text',
        'section' => 'footer_settings',
        'label'   => __('Copyright Text', 'textdomain'),
    ));
    $wp_customize->selective_refresh->add_partial('footer_copyright_text', [
        'selector' => '.copyright-text',
    ]);
}
add_action('customize_register', 'custom_footer_customizer');
