// INFO CARD
const boxInfo = document.querySelector(".box-info");
const botaoCard = document.querySelector("#icon-card");

const info = document.createElement("span");

info.textContent = "Card";
boxInfo.appendChild(info);
info.style.display = "none";

botaoCard.addEventListener("mouseover", function()
{
    boxInfo.style.display = "flex";
    info.style.display = "block";
    /* ESTILIZANDO FONT */
    info.style.fontFamily = "poppins, sans-serif";
    info.style.fontWeight = "400";
    info.style.fontSize = "14px";
    info.style.color = "#000";
});

botaoCard.addEventListener("mouseout", function()
{
    boxInfo.style.display = "none";
    info.style.display = "none";
});





// INFO TABELA
const boxInfoT = document.querySelector(".box-icon-tabela");
const botaoTabela = document.querySelector("#icon-table");

const infoT = document.createElement("span");

infoT.textContent = "Tabela";
boxInfo.appendChild(infoT);
infoT.style.display = "none";

botaoTabela.addEventListener("mouseover", function()
{
    boxInfo.style.display = "flex";
    infoT.style.display = "block";
    /* ESTILIZANDO FONT */
    infoT.style.fontFamily = "poppins, sans-serif";
    infoT.style.fontWeight = "400";
    infoT.style.fontSize = "14px";
    infoT.style.color = "#000";
});

botaoTabela.addEventListener("mouseout", function()
{
    boxInfo.style.display = "none";
    infoT.style.display = "none";
});