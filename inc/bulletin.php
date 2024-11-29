<?php

function bulletin_customize_register($wp_customize)
{
    // Add Section
    $wp_customize->add_section('bulletin_section', [
        'title' => __('Bullettin', 'meme-koin'),
        'priority' => 30,
    ]);

    // Add Setting
    add_customizer_setting(
        $wp_customize,
        'bulletin_enabled',
        true,
        'Enable Bulletin Section',
        'checkbox',
        'bulletin_section',
        'bulletin_section',
        'wp_validate_boolean',
        '.bulletin-sec'
    );

    // Add primary color setting and control
    add_customizer_setting(
        $wp_customize,
        'bulletin_bg_color',
        TKNFC_DEMO_DATA['bulletin_bg_color'],
        'Background Color',
        'color',
        'bulletin_section',
        'bulletin_section',
        'sanitize_hex_color',
        '.bulletin-sec'
    );

    add_customizer_setting(
        $wp_customize,
        'bulletin_text_color',
        TKNFC_DEMO_DATA['bulletin_text_color'],
        'Text Color',
        'color',
        'bulletin_section',
        'bulletin_section',
        'sanitize_hex_color',
        '.bulletin-sec'
    );

    // add bulletin icon image
    add_customizer_setting(
        $wp_customize,
        'bulletin_icon',
        TKNFC_DEMO_DATA['bulletin_icon'],
        'Icon',
        'image',
        'bulletin_section',
        'bulletin_section',
        'sanitize_text_field',
        '.bulletin-sec'
    );


    $wp_customize->add_setting('bulletin_items', [
        'default' => TKNFC_DEMO_DATA['bulletin_items'],
        'sanitize_callback' => 'tknfc_sanitize_repeater',
    ]);
    // Add Dynamic Repeater Control
    $wp_customize->add_control(new WP_Customize_Dynamic_Repeater_Control($wp_customize, 'bulletin_items', [
        'label' => __('Text', 'meme-koin'),
        'description' => __('Text', 'meme-koin'),
        'section' => 'bulletin_section',
        'settings' => 'bulletin_items',
        'fields' => [
            ['id' => 'text', 'label' => 'Bulletin Text', 'type' => 'text'],
        ],
    ]));

    $wp_customize->selective_refresh->add_partial('bulletin_items', [
        'selector' => '.bulletin-items',
        'render_callback' => function () {
            get_template_part('template-parts/bulletin');
        },
    ]);

}

add_action('customize_register', 'bulletin_customize_register');

