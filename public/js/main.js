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
/**
 * Función para indicar "Me gusta" o retirarlo sobre una tienda
 * @param {type} element
 * @returns {undefined}
 */
function like(element){
    let aUrl = window.location.href.split("/");
    let lastDirectory = aUrl[aUrl.length -1];
    let url = window.location.href.replace("/"+lastDirectory,"");
    
    if($(element).hasClass('like')){
        url += '/like/';
    }else{
        url += '/dislike/';
    }
    let idShop = $(element).attr("data-id");
    $.ajax({ 
        url: url+idShop,
        type: 'GET',
        success: function(response){
            if(response.like){
                location.reload();
            }else{
                console.log("Ocurrió un error inesperado.");
            }
        }
    });
}