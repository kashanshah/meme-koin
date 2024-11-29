<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function memecoin_master_customize_register_hero_banner($wp_customize) {
    // Hero Section Panel
    add_customizer_setting(
        $wp_customize,
        'hero_enabled',
        true,
        'Enable/disable hero section',
        'checkbox',
        'hero_section',
        'hero_section',
        'wp_validate_boolean',
        '.hero-section'
    );
    $wp_customize->add_section('hero_section', array(
        'title'       => __('Hero Section', 'meme-koin'),
        'priority'    => 30,
        'description' => __('Customize the Hero Section'),
    ));

    // Hero Title
    add_customizer_setting(
        $wp_customize,
        'hero_title',
        TKNFC_DEMO_DATA['hero_title'],
        'Hero Title',
        'text',
        'hero_section',
        'hero_section',
        'sanitize_text_field',
        '.hero-title',
    );

    // hero background image
    add_customizer_setting(
        $wp_customize,
        'hero_bg_image',
        TKNFC_DEMO_DATA['hero_bg_image'],
        'Background Image',
        'image',
        'hero_section',
        'hero_section',
        'esc_url',
        '.hero-section',
    );

    // Hero Background Color
    add_customizer_setting(
        $wp_customize,
        'hero_bg_color',
        TKNFC_DEMO_DATA['hero_bg_color'],
        'Background Color',
        'color',
        'hero_section',
        'hero_section',
        'sanitize_hex_color',
        '.hero-section',
    );

    // Hero Description
    add_customizer_setting(
        $wp_customize,
        'hero_description',
        TKNFC_DEMO_DATA['hero_description'],
        'Hero Description',
        'textarea',
        'hero_section',
        'hero_section',
        'sanitize_text_field',
        '.hero-description',
    );

    // Hero Image
    add_customizer_setting(
        $wp_customize,
        'hero_image',
        TKNFC_DEMO_DATA['hero_image'],
        'Hero Image',
        'image',
        'hero_section',
        'hero_section',
        'esc_url_raw',
        '.hero-image',
    );
}
add_action('customize_register', 'memecoin_master_customize_register_hero_banner');

