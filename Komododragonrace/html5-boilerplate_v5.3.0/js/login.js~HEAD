$(document).ready(function(){
    $('#login-trigger').click(function() {
        $(this).parent().addClass('open');
        $(this).next('#login-content').slideToggle();
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $(this).find('span').html('&#x25B2;');
        }
        else{
            $(this).find('span').html('&#x25BC;');
        }

        var otherli = $(this).parent().siblings('li');
        for (var i in otherli ){
            $(this).parent().removeClass('open');
        }
    });
});
