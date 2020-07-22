jQuery(function($){
    $('body').on('click', '.john_meta_box_imagefield_button', function(e){
        e.preventDefault();
  
        var button = $(this),
        aw_uploader = wp.media({
            title: 'Custom image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('#john_meta_box_imagefield').val(attachment.url);
        })
        .open();
    });

    $('body').on('click', '.john_meta_box_imagefield_button1', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Custom image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('#john_meta_box_imagefield1').val(attachment.url);
        })
        .open();
    });
    $('body').on('click', '.john_meta_box_imagefield_button2', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Custom image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('#john_meta_box_imagefield2').val(attachment.url);
        })
        .open();
    });
    $('body').on('click', '.john_meta_box_imagefield_button3', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Custom image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('#john_meta_box_imagefield3').val(attachment.url);
        })
        .open();
    });
    $('body').on('click', '.john_meta_box_imagefield_button4', function(e){
        e.preventDefault();

        var button = $(this),
        aw_uploader = wp.media({
            title: 'Custom image',
            library : {
                uploadedTo : wp.media.view.settings.post.id,
                type : 'image'
            },
            button: {
                text: 'Use this image'
            },
            multiple: false
        }).on('select', function() {
            var attachment = aw_uploader.state().get('selection').first().toJSON();
            $('#john_meta_box_imagefield4').val(attachment.url);
        })
        .open();
    });
});