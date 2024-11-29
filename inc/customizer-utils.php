<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function add_customizer_setting($wp_customize, $id, $default = '', $label = '', $type = 'text', $section = 'global_options_section', $settings = '', $sanitize_callback = 'sanitize_text_field', $selector = '', $description = '') {
    $wp_customize->add_setting($id, array(
        'default'           => $default,
        'sanitize_callback' => $sanitize_callback,
    ));
    $control_args = [
        'label'       => $label,
        'section'     => $section,
        'settings'    => $id,
        'type'        => $type === 'rich-text' ? 'textarea' : $type,
        'description'       => $description,
        'input_attrs' => [
            'class' => $type == 'rich-text' ? 'richtext-textarea' : '',
            'data-setting-id' => $id,
        ],
    ];
    if ($type === 'image') {
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $id, $control_args));
    } else if ($type === 'textarea') {
        $wp_customize->add_control($id, array_merge($control_args, ['transport'         => 'postMessage']));
    } else {
        $wp_customize->add_control($id, $control_args);
    }
    // Add selective refresh if selector is provided
    if (!empty($selector) && isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial($id, [
            'selector'        => $selector,
        ]);
    }
}

function mytheme_enqueue_customizer_scripts() {
    wp_enqueue_script('my-customizer-tinymce', get_template_directory_uri() . '/assets/js/customizer-tinymce.js', array('jquery'), null, true);
    wp_enqueue_editor(); // Loads WordPress's TinyMCE scripts
}
add_action('customize_controls_enqueue_scripts', 'mytheme_enqueue_customizer_scripts');

