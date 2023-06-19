// var openModal = document.querySelector('.conteiner-botao-excluir');
// var modal = document.querySelector('.container-modal');
// var closeModal = document.querySelector('#cancelar');
var modal = document.querySelector('.container-modal');

function abrirModalExcluir()
{
    modal.style.display = "block";
}
document.querySelector(".conteiner-botao-excluir").addEventListener("click", abrirModalExcluir);

function fecharModalExcluir()
{
    modal.style.display = "none";
}
document.querySelector("#cancelar").addEventListener("click", fecharModalExcluir);
