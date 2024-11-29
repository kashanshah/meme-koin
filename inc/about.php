<?php

function about_customize_register($wp_customize) {
    // Add Section for About Us
    $wp_customize->add_section('about_section', [
        'title'    => __('About Us Section', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Customizer Settings using add_customizer_setting
    add_customizer_setting(
        $wp_customize,
        'about_enabled',
        true,
        'Enable/disable about us section',
        'checkbox',
        'about_section',
        'about_section',
        'wp_validate_boolean',
        '.about-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'about_sub_title',
        TKNFC_DEMO_DATA['about_sub_title'],
        'Sub Title',
        'text',
        'about_section',
        'about_section',
        'sanitize_text_field',
        '.about-sub_title'
    );

    add_customizer_setting(
        $wp_customize,
        'about_title',
        TKNFC_DEMO_DATA['about_title'],
        'Title',
        'text',
        'about_section',
        'about_section',
        'sanitize_text_field',
        '.about-title'
    );

    add_customizer_setting(
        $wp_customize,
        'about_description',
        TKNFC_DEMO_DATA['about_description'],
        'Description',
        'rich-text',
        'about_section',
        'about_section',
        'wp_kses_post',
        '.about-description'
    );

    add_customizer_setting(
        $wp_customize,
        'about_image',
        TKNFC_DEMO_DATA['about_image'],
        'About Image',
        'image',
        'about_section',
        'about_section',
        'esc_url_raw',
        '.about-image'
    );

    add_customizer_setting(
        $wp_customize,
        'about_bg_color',
        TKNFC_DEMO_DATA['about_bg_color'],
        'Background Color',
        'color',
        'about_section',
        'about_section',
        'sanitize_hex_color',
        '.about-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'about_background_image',
        TKNFC_DEMO_DATA['about_background_image'],
        'Background Image',
        'image',
        'about_section',
        'about_section',
        'esc_url_raw',
        '.about-sec'
    );

    // Add CTA Text
    add_customizer_setting(
        $wp_customize,
        'about_cta_text',
        TKNFC_DEMO_DATA['about_cta_text'],
        'CTA Text',
        'text',
        'about_section',
        'about_section',
        'sanitize_text_field',
        '.about-sec-cta'
    );
    add_customizer_setting(
        $wp_customize,
        'about_cta_link',
        '#',
        TKNFC_DEMO_DATA['about_cta_link'],
        'url',
        'about_section',
        'about_section',
        'sanitize_text_field',
        '.cta-link'
    );

}

add_action('customize_register', 'about_customize_register');
