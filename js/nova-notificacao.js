const bolinhaNot = document.querySelector(".nova-notificacao-bolinha");

export function cliqueNotT()
{
    bolinhaNot.id = "sem-bolinha";
    if(bolinhaNot.id == "sem-bolinha")
    {
        bolinhaNot.remove();
    }  
}
document.querySelector(".sub-topicos-sininho-linha-titulo").addEventListener("click", cliqueNotT);

export function cliqueNotF()
{
    bolinhaNot.id = "sem-bolinha";
    if(bolinhaNot.id == "sem-bolinha")
    {
        bolinhaNot.remove();
    }  
}
document.querySelector(".sub-topicos-sininho-linha-frase").addEventListener("click", cliqueNotF);
