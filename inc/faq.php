<?php

function faq_customize_register($wp_customize) {
    // Add Section
    $wp_customize->add_section('faq_section', [
        'title'    => __('FAQ', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'faq_enabled',
        true,
        'Enable faq section',
        'checkbox',
        'faq_section',
        'faq_section',
        'wp_validate_boolean',
        '.faq-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'faq_sub_title',
        TKNFC_DEMO_DATA['faq_sub_title'],
        'Sub Title',
        'text',
        'faq_section',
        'faq_section',
        'sanitize_text_field',
        '.faq-subtitle',
    );
    add_customizer_setting(
        $wp_customize,
        'faq_title',
        TKNFC_DEMO_DATA['faq_title'],
        'Title',
        'text',
        'faq_section',
        'faq_section',
        'sanitize_text_field',
        '.faq-title',
    );
    add_customizer_setting(
        $wp_customize,
        'faq_description',
        TKNFC_DEMO_DATA['faq_description'],
        'Description',
        'textarea',
        'faq_section',
        'faq_section',
        'sanitize_text_field',
        '.faq-description',
    );
    
    add_customizer_setting(
        $wp_customize,
        'faq_image_1',
        TKNFC_DEMO_DATA['faq_image_1'],
        'FAQ Image 1',
        'image',
        'faq_section',
        'faq_section',
        'esc_url_raw',
        '.faq-image'
    );
    
    add_customizer_setting(
        $wp_customize,
        'faq_image_2',
        TKNFC_DEMO_DATA['faq_image_2'],
        'FAQ Float Image',
        'image',
        'faq_section',
        'faq_section',
        'esc_url_raw',
        '.faq-image'
    );


    // Add bg color setting and control
    add_customizer_setting(
        $wp_customize,
        'faq_bg_color',
        TKNFC_DEMO_DATA['faq_bg_color'],
        'Background Color',
        'color',
        'faq_section',
        'faq_section',
        'sanitize_hex_color',
        '.faq-sec',
    );

    // faq bg image
    add_customizer_setting(
        $wp_customize,
        'faq_bg_image',
        TKNFC_DEMO_DATA['faq_bg_image'],
        'Background Image',
        'image',
        'faq_section',
        'faq_section',
        'esc_url_raw',
        '.faq-sec',
    );

    // Add Dynamic Repeater Control

    $wp_customize->add_setting('faq_items', [
        'default' => (TKNFC_DEMO_DATA['faq_items']),
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);

    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'faq_items', [
        'label'       => __('Faq', 'meme-koin'),
        'description' => __('FAQs.', 'meme-koin'),
        'section'     => 'faq_section',
        'settings'    => 'faq_items',
        'fields'      => [
            ['id' => 'question', 'label' => 'Question', 'type' => 'text'],
            ['id' => 'answer', 'label' => 'Answer', 'type' => 'textarea'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('faq_items', [
        'selector' => '.faq-div',
        'render_callback' => function() {
            get_template_part('template-parts/faq');
        },
    ]);
}

add_action('customize_register', 'faq_customize_register');

