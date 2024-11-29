<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function memecoin_master_customize_register_404_banner($wp_customize) {
    // 404 Section Panel
    $wp_customize->add_section('404_section', array(
        'title'       => __('404 Section', 'meme-koin'),
        'priority'    => 30,
        'description' => __('Customize the 404 Section'),
    ));

    // 404 Title
    add_customizer_setting(
        $wp_customize,
        '404_title',
        TKNFC_DEMO_DATA['404_title'],
        '404 Title',
        'text',
        '404_section',
        '404_section',
        'sanitize_text_field',
        '.not-found-title',
    );

    // 404 background image
    add_customizer_setting(
        $wp_customize,
        '404_bg_image',
        TKNFC_DEMO_DATA['404_bg_image'],
        '404 Background Image',
        'image',
        '404_section',
        '404_section',
        'esc_url_raw',
        '.not-found-section',
    );

    // 404 Background Color
    add_customizer_setting(
        $wp_customize,
        '404_bg_color',
        TKNFC_DEMO_DATA['404_bg_color'],
        'Background Color',
        'color',
        '404_section',
        '404_section',
        'sanitize_hex_color',
        '.not-found-section',
    );

    // 404 Description
    add_customizer_setting(
        $wp_customize,
        '404_description',
        TKNFC_DEMO_DATA['404_description'],
        '404 Description',
        'textarea',
        '404_section',
        '404_section',
        'sanitize_text_field',
        '.not-found-description',
    );

    // 404 Image
    add_customizer_setting(
        $wp_customize,
        '404_image',
        TKNFC_DEMO_DATA['404_image'],
        '404 Image',
        'image',
        '404_section',
        '404_section',
        'esc_url_raw',
        '.not-found-image',
    );

    add_customizer_setting(
        $wp_customize,
        '404_cta_text',
        TKNFC_DEMO_DATA['404_cta_text'],
        'CTA Text',
        'text',
        '404_section',
        '404_section',
        'sanitize_text_field',
        '.not-found-cta'
    );
    add_customizer_setting(
        $wp_customize,
        '404_cta_link',
        '#',
        TKNFC_DEMO_DATA['404_cta_link'],
        'url',
        '404_section',
        '404_section',
        'sanitize_text_field',
        '.not-found-cta'
    );
}
add_action('customize_register', 'memecoin_master_customize_register_404_banner');

