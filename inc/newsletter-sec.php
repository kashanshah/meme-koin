<?php

function newsletter_customize_register($wp_customize) {
    // Add Section
    $wp_customize->add_section('newsletter_section', [
        'title'    => __('Newsletter', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'newsletter_enabled',
        true,
        'Enable newsletter section',
        'checkbox',
        'newsletter_section',
        'newsletter_section',
        'wp_validate_boolean',
        '.newsletter-sec'
    );
    add_customizer_setting(
        $wp_customize,
        'newsletter_title',
        TKNFC_DEMO_DATA['newsletter_title'],
        'Title',
        'text',
        'newsletter_section',
        'newsletter_section',
        'sanitize_text_field',
        '.newsletter-title',
    );
    add_customizer_setting(
        $wp_customize,
        'newsletter_description',
        TKNFC_DEMO_DATA['newsletter_description'],
        'Description',
        'textarea',
        'newsletter_section',
        'newsletter_section',
        'sanitize_text_field',
        '.newsletter-description',
    );
    add_customizer_setting(
        $wp_customize,
        'newsletter_shortcode',
        TKNFC_DEMO_DATA['newsletter_shortcode'],
        'Form Shortcode',
        'rich-text',
        'newsletter_section',
        'newsletter_section',
        'wp_kses_post',
        '.newsletter-form',
    );
    
    add_customizer_setting(
        $wp_customize,
        'newsletter_bg_image',
        TKNFC_DEMO_DATA['newsletter_bg_image'],
        'Background Image',
        'image',
        'newsletter_section',
        'newsletter_section',
        'esc_url_raw',
        '.newsletter-sec'
    );


    // Add BG color setting and control
    add_customizer_setting(
        $wp_customize,
        'newsletter_bg_color',
        TKNFC_DEMO_DATA['newsletter_bg_color'],
        'Background Color',
        'color',
        'newsletter_section',
        'newsletter_section',
        'sanitize_hex_color',
        '.newsletter-sec'
    );
}

add_action('customize_register', 'newsletter_customize_register');

