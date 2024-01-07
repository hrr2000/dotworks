

$(function(){
    let before=0;
    $(window).scroll(function(){
        let checker = $(this).scrollTop();
        // statistics counters durated increasing 
        for(let i=0;i<4;i++){
            if(checker >= $('.stats').offset().top-300 && before===0) {
                statsNumber($('.stats-n')[i]);
                if(i===3) before=1;
            }
        }


        // function of increasing numbers
        function statsNumber(obj){
            var c=0;
            var limit =parseInt(obj.innerHTML);
            var x = setInterval(function() {
            obj.innerHTML = c;
            c+=321;
            if(c+321 > limit+1){
                c += limit-c;
            }
            if(c == limit+1){
                clearInterval(x);
            }
            },50);
        }
    });
});