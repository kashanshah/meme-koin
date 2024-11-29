<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
function memecoin_master_customize_register_preloader($wp_customize) {
    // Add a Section for Preloader Settings
    $wp_customize->add_section('preloader_section', array(
        'title'    => __('Preloader Settings', 'memecoin-master'),
        'priority' => 30,
    ));

    // Add Setting for Enabling/Disabling Preloader
    $wp_customize->add_setting('enable_preloader', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    // Add Control to Enable/Disable Preloader
    $wp_customize->add_control('enable_preloader_control', array(
        'label'    => __('Enable Preloader', 'memecoin-master'),
        'section'  => 'preloader_section',
        'settings' => 'enable_preloader',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'memecoin_master_customize_register_preloader');

