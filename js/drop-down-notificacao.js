// DROP DOWN NAV BAR 
export const navSubTopicosSininho = document.querySelector(".sub-topicos-sininho");
export const boxDropDownS = document.querySelector(".topicos-sessao-login-linha");

export function navDropDownS()
{
    if (navSubTopicosSininho.style.display == "none" || navSubTopicosSininho.style.display === "")
    {
        navSubTopicosSininho.style.display = "flex" ;
        navSubTopicosSininho.style.flexDirection = "column";
    }
    else
    {
        navSubTopicosSininho.style.display = "none";
    }
}
document.querySelector("#nav-sininho-sub-topicos").addEventListener("click", navDropDownS);



export function cliqueForaNavS(event)
{
    const target = event.target;

    if (!navSubTopicosSininho.contains(target) && !boxDropDownS.contains(target)) 
    {
        navSubTopicosSininho.style.display = "none";
    }
}
document.addEventListener('click', function(event)
{
    cliqueForaNavS(event);
}) 


