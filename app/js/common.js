document.addEventListener('wpcf7mailsent', function (event) {
    function func() {
        jQuery('.wpcf7-response-output').attr('uk-alert', '');
        jQuery('.wpcf7-response-output').addClass('uk-alert-success');
        jQuery('.wpcf7-response-output').prepend("<a class='uk-alert-close' uk-close></a>");
    }
    setTimeout(func, 1000);
});

