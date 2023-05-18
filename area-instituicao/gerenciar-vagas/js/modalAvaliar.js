const botaoAbrirModal = document.querySelector("#abrir-modal");
const botaoFecharModal = document.querySelector("fecha-modal");
const form = document.querySelector("#form");
const modal = document.querySelector("#modal");

const toggleModal = () => {
    [form,modal].forEach((el) => el.classList.toggle("hide"));
};
    
[botaoAbrirModal, botaoFecharModal, modal].forEach((el) => {
    el.addEventListener("click", () => toggleModal());
});