var openModal = document.querySelector('.conteiner-botao-excluir');
var modal = document.querySelector('.container-modal');
var closeModal = document.querySelector('#cancelar');

openModal.onclick = function () {
    modal.style.display = "block";
}

closeModal.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}