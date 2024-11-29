<?php

class Footer_Intro_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'footer_intro_widget', // Base ID
            __('Footer Intro', 'textdomain'), // Name
            array('description' => __('Displays a footer intro section with a logo and text.', 'textdomain')) // Args
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Logo
        $logo = !empty($instance['logo']) ? $instance['logo'] : '';
        // Text
        $text = !empty($instance['text']) ? $instance['text'] : '';

        ?>
        <div class="footer-copywrite-info">
            <div class="copywrite_text fadeInUp" data-wow-delay="0.2s">
                <?php if (!empty($logo)) : ?>
                    <div class="footer-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img draggable="false" src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr_e('Footer Logo', 'textdomain'); ?>">
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($text)) : ?>
                    <p><?php echo wp_kses_post($text); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php

        echo $args['after_widget'];
    }

    public function form($instance) {
        // Logo
        $logo = !empty($instance['logo']) ? $instance['logo'] : '';
        // Text
        $text = !empty($instance['text']) ? $instance['text'] : '';

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo')); ?>"><?php esc_attr_e('Logo Image:', 'textdomain'); ?></label>
            <input class="widefat logo-url" id="<?php echo esc_attr($this->get_field_id('logo')); ?>" name="<?php echo esc_attr($this->get_field_name('logo')); ?>" type="hidden" value="<?php echo esc_url($logo); ?>">
            <button type="button" class="button upload-logo-button"><?php esc_html_e('Upload Logo', 'textdomain'); ?></button>
            <img src="<?php echo esc_url($logo); ?>" class="preview-logo" style="max-width:100%; margin-top:10px; display:<?php echo esc_url($logo) ? 'block' : 'none'; ?>;">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_attr_e('Intro Text:', 'textdomain'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" rows="5"><?php echo esc_textarea($text); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['logo'] = (!empty($new_instance['logo'])) ? esc_url_raw($new_instance['logo']) : '';
        $instance['text'] = (!empty($new_instance['text'])) ? sanitize_textarea_field($new_instance['text']) : '';
        return $instance;
    }
}

// Register the widget
function register_footer_intro_widget() {
    register_widget('Footer_Intro_Widget');
}
add_action('widgets_init', 'register_footer_intro_widget');

function footer_intro_widget_admin_scripts($hook) {
    if ('widgets.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('footer-intro-widget', get_template_directory_uri() . '/assets/js/footer-intro-widget.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'footer_intro_widget_admin_scripts');
