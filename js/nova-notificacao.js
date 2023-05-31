const bolinhaNot = document.querySelector(".nova-notificacao-bolinha");

export function verificarClasseBolinha() 
{
    const classeArmazenada = localStorage.getItem("bolinha");

    if (classeArmazenada === "sem-bolinha") 
    {
        bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
    } 
    else 
    {
        bolinhaNot.classList.remove("sem-bolinha");
    }
}


export function cliqueNotT()
{  
    localStorage.setItem("bolinha", "sem-bolinha"); 
    bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
}
document.querySelector(".sub-topicos-sininho-linha-titulo").addEventListener("click", cliqueNotT);

export function cliqueNotF()
{ 
    localStorage.setItem("bolinha", "sem-bolinha");  
    bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
}
document.querySelector(".sub-topicos-sininho-linha-frase").addEventListener("click", cliqueNotF);
