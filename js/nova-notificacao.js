const bolinhaNot = document.querySelector(".nova-notificacao-bolinha");

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
                    console.log(xhr.responseText);
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

export async function verificaNotificacao()
{
    const retornoNotificacao = await notificacao();

    if(retornoNotificacao.existe)
    {
        var qtdNotificacao = retornoNotificacao.qtd;

        console.log(qtdNotificacao);
        return qtdNotificacao;
    }
    return false;
}


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
 