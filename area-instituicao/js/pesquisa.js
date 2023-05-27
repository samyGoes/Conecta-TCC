function pesquisa() {
    var pesquisar = $("#pesquisar").val();
    var content = $("#content");
    $.ajax({
        url: "../gerenciar-vagas/tabela-voluntarios-instituicao.php",
        type: "POST",
        data: "pesquisar=" + pesquisar,
        dataType: "html"
    }).done(function(resposta) {
        console.log(resposta);
        content.html(resposta);
    }).fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    }).always(function() {
        console.log("completou");
    });
}
