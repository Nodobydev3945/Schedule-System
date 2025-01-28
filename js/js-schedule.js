$(document).ready(function(){
    $('.flagFavoritoContato').click(function(){
        const idContato = $(this).prop("id");
        const titulo = $(this).prop("title");

        if(titulo === "Favorito") {
            $(this).html('<i class="bi bi-star"></i>').prop("title","Não Favorito");
            $.getJSON('./pages/contatos/atualizaFavoritoContato.php?idContato=' + idContato + '&flagFavoritoContato=' + (titulo === "Favorito" ? 1 : 0));
        } else {
            $(this).html('<i class="bi bi-star-fill"></i>').prop("title","Favorito");
            $.getJSON('./pages/contatos/atualizaFavoritoContato.php?idContato=' + idContato + '&flagFavoritoContato=' + (titulo === "Favorito" ? 0 : 1));
        }
    })
})