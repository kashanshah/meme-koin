(function ($) {
    window.startDemoImport = function (demo = 1) {
        if (confirm("Are you sure you want to import demo data? This will overwrite your current settings.")) {
            $.ajax({
                url: demoImportAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'import_demo_data',
                    nonce: demoImportAjax.nonce,
                    demo: demo,
                },
                success: function (response) {
                    if(response.data) {
                        alert(response.data.message);
                    }
                    if (response.success) {
                        location.reload();
                    }
                },
                error: function () {
                    alert('An error occurred during the demo import.');
                },
            });
        }
    };
})(jQuery);
