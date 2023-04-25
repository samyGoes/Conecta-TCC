const navLateral = document.querySelector(".nav-lateral");
const topicosNavLateral = document.querySelectorAll(".nav-lateral-topico");
const mainConteudo = document.querySelector(".main-conteudo");

// NAV LATERAL
export function sideBar()
{
 
    const tabela = document.querySelector(".table-responsive");


    /* RESPONSIVIDADE NAV LATERAL E CONTEUDO */
    let telaUm = window.matchMedia("(min-width: 1049px)");
    let telaDois = window.matchMedia("(max-width: 675px)");
    let telaTres = window.matchMedia("(max-width: 1203px)");
    let telaQuatro = window.matchMedia("(max-width: 1150px)");

    //navLateral.style.width = "17rem";

    if(navLateral.offsetWidth == 17 * parseFloat(getComputedStyle(navLateral).fontSize))
    {       
        // NAV SENDO FECHADA
        if(!telaDois.matches)
        {
            navLateral.style.width = "5rem";
            navLateral.style.paddingLeft = "1.5rem";
            mainConteudo.style.marginLeft = "5rem";

            // if(telaTres.matches)
            // {
            //     tabela.style.width = "861px"; 
            //     tabela.style.minWidth = "0";
            // }

            // if(telaQuatro)
            // {
            //     tabela.style.borderLeft = "1px solid #4567a5";
            //     tabela.style.borderRight = "1px solid #4567a5";
            //     tabela.style.borderRadius = "0.5rem";
            // }
        }
        else
        {
            navLateral.style.width = "4rem";
            navLateral.style.paddingLeft = "1.2rem";
        }
        
        // SUMINDO COM OS TÓPICOS QUANDO A NAV FOR FECHADA
        topicosNavLateral.forEach(function(topicoNavLateral)
        {
            topicoNavLateral.style.opacity = "0";
        });
    }
    else
    {
        // NAV SENDO ABERTA
        navLateral.style.width = "17rem";
        if(!telaDois.matches)
        {
            navLateral.style.paddingLeft = "2rem";
            // if(telaTres.matches)
            // {
            //     tabela.style.minWidth = "80%";
            //     tabela.style.width = "none"; 
            // }
            // if(telaQuatro)
            // {
            //     tabela.style.borderLeft = "none";
            //     tabela.style.borderRight = "none";
            //     tabela.style.borderRadius = "0";
            // }
        }
        else
        {
            navLateral.style.paddingLeft = "1.2rem";
        }

        if(telaUm.matches)
        {
            mainConteudo.style.marginLeft = "17rem";
        }

        // APARECENDO COM OS TÓPICOS QUANDO A NAV FOR ABERTA
        topicosNavLateral.forEach(function(topicoNavLateral) 
        {
            topicoNavLateral.style.opacity = "1";
        });
    }
} 
document.querySelector("#nav-lateral-icon-lista").addEventListener("click", sideBar);


