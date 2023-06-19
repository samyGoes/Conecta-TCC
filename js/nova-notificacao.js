export async function notificacao()
{
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "notificacao.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    return new Promise((resolve, reject) =>
    {
        xhr.onreadystatechange = function()
        {
            if(xhr.readyState === XMLHttpRequest.DONE)
            {
                if(xhr.status === 200)
                {
                    //console.log(xhr.responseText);
                    var resposta = JSON.parse(xhr.responseText);
                    try
                    {
                        if(resposta.length > 0)
                        {
                            var qtd = resposta.length;
                            resolve({existe: true, qtd: qtd});
                        }
                        else
                        {
                            resolve({existe: false, qtd: ''});
                            console.log("Não tem notificação :(");
                        }
                    }
                    catch(e)
                    {
                        console.error("Oooh deu erro :(", e);
                        reject(e);
                    }
                }
                else
                {
                    reject(new Error("Erro na requisição AJAX. Status: " + xhr.status));
                }
            }
        }
        xhr.send();
    });
}

export const divs = document.querySelectorAll(".sub-topicos-sininho-linha");
export const linkT = document.querySelectorAll(".sub-topicos-sininho-linha-titulo");
export const linkF = document.querySelectorAll(".sub-topicos-sininho-linha-frase");

export async function verificaNotificacao()
{
    const retornoNotificacao = await notificacao();

    if(retornoNotificacao.existe)
    {
        divs.forEach((div) =>
        {
            const linkTitulo = div.querySelector(".sub-topicos-sininho-linha-titulo");
            const linkFrase = div.querySelector(".sub-topicos-sininho-linha-frase");

            // TÍTULO DA NOTIFICAÇÃO
            linkTitulo.addEventListener("click", function(event)
            {
                event.preventDefault();
                if(div.id != "clicada")
                {
                    //localStorage.setItem("notificacao", "clicada");
                    div.id = "clicada";
                }
                //verificarTodasClicadas();
                //todasClicadas();
                var clicada = localStorage.getItem("notificacao");
                console.log(clicada);
            });

            // FRASE DA NOTIFICAÇÃO
            linkFrase.addEventListener("click", function(event)
            {
                event.preventDefault();
                if(div.id != "clicada")
                {
                    //localStorage.setItem("notificacao", "clicada");
                    div.id = "clicada";
                }
                //verificarTodasClicadas();
                //todasClicadas();
                var clicada = localStorage.getItem("notificacao");
                console.log(clicada);
            });
        });
    }
}



export async function verificarTodasClicadas()
{
    for(let i = 0; i < divs.length; i++)
    {
        const noti = divs[i];

        if(noti.id != "clicada")
        {
            return false;
        }
    }
    localStorage.setItem("notificacao", "clicada");
    return true;
}

export async function todasClicadas()
{
    var todosLinksClicados = verificarTodasClicadas();
    if(todosLinksClicados)
    {
        semBolinha();
        console.log("todas foram clicadas");
    }
    else
    {
        comBolinha();
        console.log("n são todas q foram clicadas");
    }
}




const bolinhaNot = document.querySelector(".nova-notificacao-bolinha");
export function verificarClasseBolinha()
{
    const classeArmazenada = localStorage.getItem("bolinha");
    //const notificacaoLo = localStorage.getItem("notificacao");

    if(classeArmazenada === "sem-bolinha")
    {
        bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
        console.log(classeArmazenada);
    }
    else if(classeArmazenada === "com-bolinha")
    {
        bolinhaNot.classList.replace('sem-bolinha', 'nova-notificacao-bolinha');
    }
}



function semBolinha()
{
    localStorage.setItem("bolinha", "sem-bolinha");
    bolinhaNot.classList.replace('nova-notificacao-bolinha', 'sem-bolinha');
}

function comBolinha()
{
    localStorage.setItem("bolinha", "com-bolinha");
    bolinhaNot.classList.replace('sem-bolinha', 'nova-notificacao-bolinha');
}