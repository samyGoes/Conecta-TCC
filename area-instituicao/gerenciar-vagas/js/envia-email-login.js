
async function verificaEmail()
{  
    var xhr = new XMLHttpRequest();

    // xhr.open("POST", "tabela-voluntarios-instituicao.php", true); // application/json
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    return new Promise((resolve, reject) => 
    {
        xhr.onreadystatechange = function() 
        {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)  
            {        
                try 
                {
                    var valores = JSON.parse(xhr.responseText);
                    console.log(xhr.responseText);
                    
                    if (valores.status === true) 
                    {
                        resolve({existe: true, nome: valores.nome});
                    } 
                    else 
                    {
                        resolve({existe: false, nome: ''});
                    }     
                }   
                catch(e) 
                {
                    console.error("Erro ao analisar resposta JSON: ", e);
                    reject(Error("Erro ao analisar resposta JSON"));
                }
                      
            }   
            else if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200)  
            {
                reject(Error(xhr.statusText));
            }       
        };
        xhr.onerror = function()
        {
            reject(Error("Erro ao realizar a requisição"));
        }
        xhr.send();
    });
}
//document.querySelector(".table-btn-recusar").addEventListener("click", verificaEmail);





//ENVIA O EMAIL OU PRINTA UM ERRO
 async function enviaEmail(event)
{
    event.preventDefault(); 
    const emailVerificado = await verificaEmail(); 
    //console.log(emailVerificado);
    
    if(emailVerificado.existe)
    {
        // const emailInput = document.querySelector("#email").value;
        const nome = emailVerificado.nome;
        const mensagem = "ola";
        emailjs.init('no7wF9bX2UIYjHvBT');
    
        var parametros = 
        {
            from_name: 'Conecta',
            to_name: nome,
            to_email: email.value,
            email_id: email.value,
            message: mensagem
        }
        emailjs.send("service_x1ydd2q", "template_5599faa", parametros).then(function()
        {
            alert("Código de verificação enviado com sucesso!");
        });

    }
    //console.log(emailVerificado);
}
document.querySelector(".table-btn-recusar").addEventListener("click", enviaEmail);




