var activeLeft = false;

$(function(){
    $(window).scroll(function(){
        console.info('scroll');
        var scroll = $('body').scrollTop();
        var leftDiv = document.getElementById('left');
        console.info(leftDiv.offsetHeight);
    });
});

$('#activeLeft').click(function(){
    if(!activeLeft){
        $('#leftBloc').css({ 'box-shadow': '0 0 20px black' });
        $('.leftDiv').css({ 'left': '0px' });
        $('#activeLeft').css({ 'left': '220px' });
        $('#activeLeft').html('<i class="fa fa-chevron-circle-left"></i>');
        $('footer').css({ 'left': '240px'});
    }else{
        $('#leftBloc').css({ 'box-shadow': '0 0 10px black' });
        $('.leftDiv').css({ 'left': '-200px' });
        $('#activeLeft').css({ 'left': '20px' });
        $('#activeLeft').html('<i class="fa fa-chevron-circle-right"></i>');
        $('footer').css({ 'left': '40px'});
    }
    activeLeft = !activeLeft;
});