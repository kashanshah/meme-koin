<?php

function contact_customize_register($wp_customize) {
    // Add Section
    $wp_customize->add_section('contact_section', [
        'title'    => __('Contact', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'contact_enabled',
        true,
        'Enable contact section',
        'checkbox',
        'contact_section',
        'contact_section',
        'wp_validate_boolean',
        '.contact-sec'
    );
    add_customizer_setting(
        $wp_customize,
        'contact_sub_title',
        TKNFC_DEMO_DATA['contact_sub_title'],
        'Sub Title',
        'text',
        'contact_section',
        'contact_section',
        'sanitize_text_field',
        '.contact-subtitle',
    );
    add_customizer_setting(
        $wp_customize,
        'contact_title',
        TKNFC_DEMO_DATA['contact_title'],
        'Title',
        'text',
        'contact_section',
        'contact_section',
        'sanitize_text_field',
        '.contact-title',
    );
    add_customizer_setting(
        $wp_customize,
        'contact_description',
        TKNFC_DEMO_DATA['contact_description'],
        'Content',
        'textarea',
        'contact_section',
        'contact_section',
        'sanitize_text_field',
        '.contact-description',
    );

    add_customizer_setting(
        $wp_customize,
        'contact_shortcode',
        TKNFC_DEMO_DATA['contact_shortcode'],
        'Form Shortcode',
        'rich-text',
        'contact_section',
        'contact_section',
        'wp_kses_post',
        '.contact-form',
    );

    add_customizer_setting(
        $wp_customize,
        'contact_bg_image',
        TKNFC_DEMO_DATA['contact_bg_image'],
        'Background Image',
        'image',
        'contact_section',
        'contact_section',
        'esc_url_raw',
        '.contact-sec'
    );


    add_customizer_setting(
        $wp_customize,
        'contact_bg_color',
        TKNFC_DEMO_DATA['contact_bg_color'],
        'Background Color',
        'color',
        'contact_section',
        'contact_section',
        'sanitize_hex_color',
        '.contact-sec'
    );
}

add_action('customize_register', 'contact_customize_register');

