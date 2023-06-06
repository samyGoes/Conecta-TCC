const containerModal = document.querySelector(".container-modal-foto");
const modalFt = document.querySelector(".modal-foto");

export function modalFoto()
{
    containerModal.style.display = "block";
    modalFt.style.display = "flex";
}
document.querySelector(".btn-adiciona-foto").addEventListener("click", modalFoto);

export function fecharModalFoto()
{
    containerModal.style.display = "none";
    modalFt.style.display = "none";
}
document.querySelector("#icone-fechar-modal").addEventListener("click", fecharModalFoto);