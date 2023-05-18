// INFO CARD
export const boxInfo = document.querySelector(".box-info");
export const botaoCard = document.querySelector("#icon-card");
export const info = document.createElement("span");

export function boxInfoOver()
{
    info.textContent = "Card";
    boxInfo.appendChild(info);
    info.style.display = "none";

    boxInfo.style.display = "flex";
    info.style.display = "block";
    /* ESTILIZANDO FONT */
    info.style.fontFamily = "poppins, sans-serif";
    info.style.fontWeight = "400";
    info.style.fontSize = "14px";
    info.style.color = "#000";
}
botaoCard.addEventListener("mouseover", boxInfoOver);


export function boxInfoOut()
{
    boxInfo.style.display = "none";
    info.style.display = "none";
}
botaoCard.addEventListener("mouseout", boxInfoOut);





// INFO TABELA
export const boxInfoT = document.querySelector(".box-info-t");
export const botaoTabela = document.querySelector("#icon-table");
export const infoT = document.createElement("span");

export function boxInfoTOver()
{
    infoT.textContent = "Tabela";
    boxInfoT.appendChild(infoT);
    infoT.style.display = "none";

    boxInfoT.style.display = "flex";
    infoT.style.display = "block";
    /* ESTILIZANDO FONT */
    infoT.style.fontFamily = "poppins, sans-serif";
    infoT.style.fontWeight = "400";
    infoT.style.fontSize = "14px";
    infoT.style.color = "#000";
}
botaoTabela.addEventListener("mouseover", boxInfoTOver);

export function boxInfoTOut()
{
    boxInfoT.style.display = "none";
    infoT.style.display = "none";
}
botaoTabela.addEventListener("mouseout", boxInfoTOut);


