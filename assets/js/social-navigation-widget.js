jQuery(document).ready(function ($) {
    $(document).on('click', '.add-social-link', function () {
        const $list = $(this).siblings('.social-links-list'); // Find the current list
        const index = $list.children('li').length; // Get the current number of items
        const widgetBaseId = $list.closest('div.widget').find('input[name="id_base"]').val();
        const widgetNumber = $list.closest('div.widget').find('input[name="widget_number"]').val();
        const newLinkHtml = `
            <li>
                <label>URL:</label>
                <input class="widefat" type="text" name="widget-${widgetBaseId}[${widgetNumber}][social_links][${index}][url]" value="">
                <label>Icon Class (Font Awesome):</label>
                <input class="widefat" type="text" name="widget-${widgetBaseId}[${widgetNumber}][social_links][${index}][icon]" value="">
                <button type="button" class="remove-social-link">Remove</button>
            </li>`;
        $list.append(newLinkHtml); // Append the new field
    });

    $(document).on('click', '.remove-social-link', function () {
        $(this).closest('li').remove(); // Remove the list item
    });
});
