<?php
/**
 * Dynamic Repeater Control for WordPress Customizer
 */

// Custom Dynamic Repeater Control Class
if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Dynamic_Repeater_Control extends WP_Customize_Control
    {
        public $type = 'dynamic_repeater';
        public $fields = [];

        public function enqueue()
        {
            wp_enqueue_script('dynamic-repeater-customizer', get_template_directory_uri() . '/assets/js/customizer-repeater.js', ['jquery', 'customize-controls'], null, true);
            wp_enqueue_style('dynamic-repeater-customizer-css', get_template_directory_uri() . '/assets/css/customizer-repeater.css');
        }

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                <ul class="repeater-items" data-fields="<?php echo esc_attr(json_encode($this->fields)); ?>">
                    <?php
                    $values = json_decode($this->value(), true);
                    if (!empty($values)) {
                        foreach ($values as $item) {
                            ?>
                            <li class="repeater-item">
                                <?php foreach ($this->fields as $field) { ?>
                                    <div class="repeater-field">
                                        <label><?php echo esc_html($field['label']); ?></label>
                                        <?php if ($field['type'] === 'image') { ?>
                                            <div class="image-selector">
                                                <input type="hidden"
                                                       class="repeater-item-<?php echo esc_attr($field['id']); ?>"
                                                       data-field-key="<?php echo esc_attr($field['id']); ?>"
                                                       value="<?php echo esc_url($item[$field['id']] ?? ''); ?>">
                                                <button class="select-image-button button">Select Image</button>
                                                <img class="image-preview"
                                                     src="<?php echo esc_url($item[$field['id']] ?? ''); ?>"
                                                     style="<?php echo empty($item[$field['id']]) ? 'display:none;' : ''; ?> max-width:100px; margin-top:10px;">
                                            </div>
                                        <?php } else if ($field['type'] === 'textarea') { ?>
                                            <textarea
                                                    class="repeater-item-<?php echo esc_attr($field['id']); ?>"
                                                    data-field-key="<?php echo esc_attr($field['id']); ?>"
                                                    placeholder="<?php echo esc_attr($field['label']); ?>"
                                            ><?php echo esc_attr($item[$field['id']] ?? ''); ?></textarea>
                                        <?php } else { ?>
                                            <input type="<?php echo esc_attr($field['type']); ?>"
                                                   class="repeater-item-<?php echo esc_attr($field['id']); ?>"
                                                   data-field-key="<?php echo esc_attr($field['id']); ?>"
                                                   placeholder="<?php echo esc_attr($field['label']); ?>"
                                                   value="<?php echo esc_attr($item[$field['id']] ?? ''); ?>">
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <button class="repeater-item-remove">Remove</button>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <button class="repeater-add-item">Add Item</button>
                <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>"
                       class="repeater-value">
            </label>
            <?php
        }
    }
}

// Register Dynamic Sections and Controls
// Sanitize Repeater Data
function tknfc_sanitize_repeater($input)
{
    $decoded = json_decode($input, true);
    if (is_array($decoded)) {
        foreach ($decoded as $key => $item) {
            foreach ($item as $field_key => $field_value) {
                $decoded[$key][$field_key] = sanitize_text_field($field_value);
            }
        }
        return json_encode($decoded);
    }
    return json_encode([]);
}
