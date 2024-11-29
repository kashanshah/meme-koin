jQuery(document).ready(function ($) {
    $('.richtext-textarea').each(function() {
        var textarea = $(this);
        if (textarea.length) {
            wp.editor.initialize(textarea.attr('id'), {
                tinymce: {
                    wpautop: false,
                    forced_root_block: false,
                    toolbar1: 'bold italic underline | bullist numlist | link unlink',
                    menubar: false,
                },
                quicktags: true,
            });

            // Trigger Customizer updates on TinyMCE content change
            var editorId = textarea.attr('id');
            if (typeof tinymce !== 'undefined' && tinymce.get(editorId)) {
                tinymce.get(editorId).on('change', function () {
                    // Update the Customizer setting value
                    wp.customize(textarea.data('setting-id')).set(this.getContent());
                });
            }
        }
    })
});
