jQuery(document).ready(function ($) {
    $(document).on('click', '.upload-logo-button', function (e) {
        e.preventDefault();

        var $button = $(this);
        var $preview = $button.siblings('.preview-logo');
        var $input = $button.siblings('.logo-url');

        // Open WordPress Media Uploader
        var mediaUploader = wp.media({
            title: 'Select or Upload Logo',
            button: {
                text: 'Use this logo'
            },
            multiple: false
        });

        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $input.val(attachment.url);
            $preview.attr('src', attachment.url).show();
        });

        mediaUploader.open();
    });
});
