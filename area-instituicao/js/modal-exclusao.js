// var openModal = document.querySelector('.conteiner-botao-excluir');
// var modal = document.querySelector('.container-modal');
// var closeModal = document.querySelector('#cancelar');
const modal = document.querySelector('.container-modal');
const btnExcluir = document.querySelector(".btn-excluir");
const foto = document.querySelector(".conteudo-foto");

for(var i = 1; i <= foto.length; i++)
{
    btnExcluir[i].addEventListener("click", function()
    {
        modal[i].style.display = "block";
    }) 
}



// function fecharModalExcluir()
// {
//     modal.style.display = "none";
// }
// document.querySelectorAll("#cancelar").forEach(function(btnCancelar)
// {
//     btnCancelar.addEventListener("click", fecharModalExcluir);
// }); 

