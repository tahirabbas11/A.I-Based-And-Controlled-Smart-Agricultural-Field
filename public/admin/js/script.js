loaderHide = () => {
    $('#ajaxloader').removeClass('show')
}
loaderShow = () => {
    $('#ajaxloader').addClass('show')
}


removeAllErrors = () => {
    $('.error-control').each(function () {
        $(this).removeClass('error-control')
    })
    $('.error-span').each(function () {
        $(this).addClass('d-none')
    })
}

toastrShow = (heading, text, icon, position = 'top-right') => {

    $.toast({
        heading: heading,
        text: text,
        position: position,
        loaderBg: '#ff6849',
        icon: icon,
        hideAfter: 3000,
        stack: 6
    });
}
