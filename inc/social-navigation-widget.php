<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Social_Navigation_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'social_navigation_widget', // Base ID
            __('Social Media Navigation', 'textdomain'), // Name
            array('description' => __('Displays social media links with icons.', 'textdomain')) // Args
        );
    }

    public function widget($args, $instance) {
        echo $args['before_widget'];

        // Widget Title
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // Social Media Links
        $social_links = !empty($instance['social_links']) && is_array($instance['social_links']) ? $instance['social_links'] : [];
        ?>
        <div class="footer-social-info fadeInUp" data-wow-delay="0.4s">
            <?php
            if (!empty($social_links)) {
                foreach ($social_links as $link) {
                    if (!empty($link['url']) && !empty($link['icon'])) {
                        echo '<a href="' . esc_url($link['url']) . '" target="_blank">';
                        echo '<i class="fa ' . esc_attr($link['icon']) . '" aria-hidden="true"></i>';
                        echo '</a>';
                    }
                }
            } else {
                echo '<p>' . esc_html__('No social media links configured.', 'textdomain') . '</p>';
            }
            ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $social_links = !empty($instance['social_links']) && is_array($instance['social_links']) ? $instance['social_links'] : [['url' => '', 'icon' => '']];
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'textdomain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <label><?php esc_html_e('Social Links:', 'textdomain'); ?></label>
        <ul class="social-links-list">
            <?php foreach ($social_links as $key => $link): ?>
                <li>
                    <label><?php esc_html_e('URL:', 'textdomain'); ?></label>
                    <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('social_links') . "[$key][url]"); ?>" value="<?php echo esc_url($link['url']); ?>">
                    <label><?php esc_html_e('Icon Class (Font Awesome):', 'textdomain'); ?></label>
                    <input class="widefat" type="text" name="<?php echo esc_attr($this->get_field_name('social_links') . "[$key][icon]"); ?>" value="<?php echo esc_attr($link['icon']); ?>">
                    <button type="button" class="remove-social-link"><?php esc_html_e('Remove', 'textdomain'); ?></button>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="add-social-link button"><?php esc_html_e('Add New Social Link', 'textdomain'); ?></button>
        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '';
        $instance['social_links'] = isset($new_instance['social_links']) && is_array($new_instance['social_links'])
            ? array_map(function ($link) {
                return [
                    'url' => !empty($link['url']) ? esc_url_raw($link['url']) : '',
                    'icon' => !empty($link['icon']) ? sanitize_text_field($link['icon']) : '',
                ];
            }, $new_instance['social_links'])
            : [];
        return $instance;
    }
}

// Register the widget
function register_social_navigation_widget() {
    register_widget('Social_Navigation_Widget');
}
add_action('widgets_init', 'register_social_navigation_widget');

function admin_enqueue_scripts($hook) {
    if ('widgets.php' === $hook) {
        wp_enqueue_script('admin-social-widget', get_template_directory_uri() . '/assets/js/social-navigation-widget.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'admin_enqueue_scripts');
