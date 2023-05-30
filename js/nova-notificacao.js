const bolinhaNot = document.querySelector(".nova-notificacao-bolinha");

export function cliqueNotT()
{
    bolinhaNot.className = "sem-bolinha";
    if(bolinhaNot.className == "sem-bolinha")
    {
        bolinhaNot.remove();
    }  
}
document.querySelector(".sub-topicos-sininho-linha-titulo").addEventListener("click", cliqueNotT);

export function cliqueNotF()
{
    bolinhaNot.className = "sem-bolinha";
    if(bolinhaNot.className == "sem-bolinha")
    {
        bolinhaNot.remove();
    }  
}
document.querySelector(".sub-topicos-sininho-linha-frase").addEventListener("click", cliqueNotF);
