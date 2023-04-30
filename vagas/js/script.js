// DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
const botaoCausas = document.querySelector(".filtro-causas");
const botaoHabilidade = document.querySelector(".filtro-habilidade");
const boxCausas = document.querySelector(".box-causas");
const boxHabilidade = document.querySelector(".box-habilidade");
const dropCausas = document.querySelector('.clique-fora');

botaoCausas.addEventListener("click", function () {
    if (boxCausas.style.display == "none" || boxCausas.style.display === "") {
        boxCausas.style.display = "flex";
    }
    else {
        boxCausas.style.display = "none";
    }
});

document.addEventListener('click', function (event) {
    const target = event.target;
    if (!dropCausas.contains(target)) {
        boxCausas.style.display = "none";
    }
});





botaoHabilidade.addEventListener("click", function () {
    if (boxHabilidade.style.display == "none" || boxCausas.style.display === "") {
        boxHabilidade.style.display = "flex";
    }
    else {
        boxHabilidade.style.display = "none";
    }
});

document.addEventListener('click', function (event) {
    const target = event.target;
    if (!dropCausas.contains(target)) {
        boxHabilidade.style.display = "none";
    }
});

