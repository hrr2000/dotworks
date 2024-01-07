$(function(){

    //loader
    $(window).on('load',function(){
        $('#loader').animate({
            top:'-1000px',
            opacity:0
        },500)
    })

    // to up button events
    let upBtn = $('#up-btn');
    tmp=200;
    // padding of top navbar
    let p = $('#top-nav').css("padding");
    let t = $('#top-nav').css("top");
    $(window).scroll(function(){
        let checker = $(this).scrollTop();
        // to up scrolling
        checker > 500 ? upBtn.fadeIn(400) : upBtn.fadeOut(400);

        if(checker > tmp){
            $('#top-nav').css({
                position:'absolute'
            });
            $('#sb').fadeOut();
            tmp = checker;
        }else if(checker == 0){
            $('#top-nav').css({
                top:t,
                position:'absolute',
                background:'transparent',
                padding:p
            });
            $('#top-nav .navbar-brand img').css({
                width:'unset'
            });
        }else{
            $('#top-nav').css({
                top:0,
                position:'fixed',
                background:'rgb(29, 38, 45)',
                padding:'10px'
            });
            $('#top-nav .navbar-brand img').css({
                width:'100px'
            });
            $('#sb').fadeIn();
            tmp = checker;
        }
    });

    // on to up button clicked
    upBtn.click(function(){
        $('html').animate(
            {scrollTop:0}
        ,500);
    });



    // banner slider points
    $('#banner-slider').on('slide.bs.carousel', function () {

    });

    // heart hover coloring
    $(".far.fa-heart").get().forEach(function(heart,i){
        $(heart).mouseenter(function(){
            $(heart).attr("class","fa fa-heart").css("color","#ef4d4d");
        }).mouseleave(function(){
            $(heart).attr("class","far fa-heart").css("color","black");
        });
    });

   $(".level").get().forEach(function(level,i){
        $(level).mouseenter(function(){
            $(this).attr("class","level active");
            $(this).find('span.level-txt').show();
        }).mouseleave(function(){
            $(this).attr("class","level");
            $(this).find('span.level-txt').hide();
        });
   });

});

// enabling bootstrap tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
