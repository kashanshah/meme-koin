(function ($) {
    $(document).ready(function () {
        // Add new repeater item
        $('.repeater-add-item').on('click', function (e) {
            e.preventDefault();

            const $list = $(this).siblings('.repeater-items');
            const fields = $list.data('fields');
            let newItem = `<li class="repeater-item">`;

            fields.forEach(field => {
                newItem += `<div class="repeater-field"><label>${field.label}</label>`;
                if (field.type === 'image') {
                    newItem += `<div class="image-selector">
                                    <input type="hidden" 
                                           class="repeater-item-${field.id}" 
                                           data-field-key="${field.id}" 
                                           value="">
                                    <button class="select-image-button button">Select Image</button>
                                    <img class="image-preview" 
                                         src="" 
                                         style="display:none; max-width:100px; margin-top:10px;">
                                </div>`;
                }
                else if (field.type === 'textarea') {
                    newItem += `<textarea 
                                      class="repeater-item-${field.id}" 
                                      data-field-key="${field.id}" 
                                      placeholder="${field.label}" 
                                      ></textarea>`;
                } else {
                    newItem += `<input type="${field.type}" 
                                      class="repeater-item-${field.id}" 
                                      data-field-key="${field.id}" 
                                      placeholder="${field.label}" 
                                      value="">`;
                }
                newItem += `</div>`;
            });

            newItem += `<button class="repeater-item-remove">Remove</button></li>`;
            $list.append(newItem);
        });

        // Remove repeater item
        $(document).on('click', '.repeater-item-remove', function (e) {
            e.preventDefault();
            $(this).closest('.repeater-item').remove();
            updateRepeaterValue($(this).closest('label'));
        });

        $(document).on('click', '.select-image-button', function (e) {
            e.preventDefault();

            const $button = $(this);
            const $input = $button.closest('.repeater-field').find('input');
            const $preview = $button.closest('.repeater-field').find('.image-preview');

            // Create a new mediaUploader instance for each click
            const mediaUploader = wp.media({
                title: 'Select Image',
                button: { text: 'Use Image' },
                multiple: false,
            });

            mediaUploader.on('select', function () {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                $input.val(attachment.url);
                $preview.attr('src', attachment.url).show();
                updateRepeaterValue($button.closest('label'));
            });

            mediaUploader.open();
        });

        // Update repeater value
        $(document).on('input change', '.repeater-item input, .repeater-item textarea', function () {
            updateRepeaterValue($(this).closest('label'));
        });

        function updateRepeaterValue($repeater) {
            const items = [];
            $repeater.find('.repeater-item').each(function () {
                const item = {};
                $(this).find('input, textarea').each(function () {
                    console.log('this: ', $(this));
                    const key = $(this).data('field-key');
                    const value = $(this).val();
                    item[key] = value;
                    console.log('key: ' + key + ' value: ' + value);
                });
                items.push(item);
            });

            const jsonValue = JSON.stringify(items);
            $repeater.find('.repeater-value').val(jsonValue).trigger('change');
        }
    });
})(jQuery);
