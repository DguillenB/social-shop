window.addEventListener("load", function(){
    // Botón de like
    $('.like').click(function(){
        if($(this).hasClass('dislike')){
            $(this).addClass('like').removeClass('dislike');
        }else{
            $(this).addClass('dislike').removeClass('like');
        }
    });
});