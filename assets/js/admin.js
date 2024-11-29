jQuery(document).ready(function ($) {
    $(document).on('click', '.add-social-link', function (e) {
        e.preventDefault();
        var $list = $(this).siblings('.social-links-list');
        var index = $list.children('li').length;
        var newField = `
            <li>
                <label>URL:</label>
                <input class="widefat" type="text" name="${$list.data('name')}[${index}][url]" value="">
                <label>Icon Class (Font Awesome):</label>
                <input class="widefat" type="text" name="${$list.data('name')}[${index}][icon]" value="">
                <small>e.g. fa-facebook</small>
                <button type="button" class="remove-social-link">Remove</button>
            </li>
        `;
        $list.append(newField);
    });

    $(document).on('click', '.remove-social-link', function (e) {
        e.preventDefault();
        $(this).closest('li').remove();
    });
});
