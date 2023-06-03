// GERAR CÓDIGO ALEATÓRIO
export function codAleatorio2()
{
    // VARIÁVEIS PARA O CÓDIGO 
    let num = '';
    let a = '';
    let b = '';
    let codigo = '';

    // GERANDO NÚMERO ALEATÓRIO
    num = Math.floor(Math.random() * 999) + 100;

    // GERANDO LETRA ALEATÓRIA
    a = Math.floor(Math.random() * 52) + 65; // entre 65 (A) e 90 (Z) ou entre 97 (a) e 122 (z)
    let letraUm = String.fromCharCode(a);

    // GERANDO LETRA ALEATÓRIA
    b = Math.floor(Math.random() * 52) + 65; // entre 65 (A) e 90 (Z) ou entre 97 (a) e 122 (z)
    let letraDois = String.fromCharCode(b);

    return codigo = letraUm + num + letraDois;
}


// CÓDIGO COMPLETO DA FUNÇÃO ACIMA
export let codigoCompleto2 = codAleatorio2();


// ABRIR E FECHAR MODAL
export const modalInteiro = document.querySelector(".modal");

export function abreModal()
{
    if(modalInteiro)
    {
        modalInteiro.style.display = "block";
    } 
}
document.addEventListener('DOMContentLoaded', function() 
{
    document.querySelector(".link-esqueceu-senha").addEventListener("click", abreModal);
});

export function fechaModal()
{
    modalInteiro.style.display = "none";
}
document.querySelectorAll(".btn-fechar").forEach(function(link)
{
    link.addEventListener("click", fechaModal);
});







// VERIFICAR EMAIL
export var email = document.getElementById("email");

export async function verificaEmail()
{  
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "verifica-email.php", true); // application/json
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
                    console.log(valores);
                    
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
        xhr.send('email=' + email.value);
    });
}
document.getElementById("verifica-email").addEventListener("click", verificaEmail);




//export const nomeEmail = pegaNome();
export const modalSessoa1 = document.querySelector(".modal-sessao-1");

export const modalForm = document.querySelector(".modal-form");

//ENVIA O EMAIL OU PRINTA UM ERRO
export async function enviaEmail(event)
{
    event.preventDefault(); 
    const emailVerificado = await verificaEmail(); 
    //console.log(emailVerificado);
    
    if(emailVerificado.existe)
    {
        // const emailInput = document.querySelector("#email").value;
        const nome = emailVerificado.nome;
        emailjs.init('no7wF9bX2UIYjHvBT');
    
        var parametros = 
        {
            from_name: 'Conecta',
            to_name: nome,
            to_email: email.value,
            email_id: email.value,
            message: codigoCompleto2
        }
        emailjs.send("service_x1ydd2q", "template_5599faa", parametros).then(function()
        {
            //alert("Código de verificação enviado com sucesso!");

            // cria o elemento HTML do modal
            const modal = document.createElement("div");
            modal.id = "modal-aviso";
            modal.innerHTML = `
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
                integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />
                <div id="modal-content">
                    <i id="icone-fechar-modal" class="fa-solid fa-xmark"></i>
                    <p class="modal-titulo-cadastro">Código enviado com sucesso!<i class="fa-sharp fa-solid fa-circle-check"></i></p>
                    <p class="modal-frase-cadastro"> Entre no seu email para copiar o código enviado e colar no campo disponível. </p>
                </div>
                `;

            // adiciona o modal como filho do body (ou de outro elemento HTML)
            document.body.appendChild(modal);

            //adiciona a tag style do modal
            const style = document.createElement("style");
            const iconFechaModal = document.querySelector("#icone-fechar-modal");

            style.innerHTML = `
                #modal-aviso 
                {
                    position: fixed;
                    bottom: 20px;
                    right: -600px;
                    z-index: 9999;
                    transition: all 1s ease;
                    border: #4567a5 solid 1px;
                    border-radius: 0.5rem;
                    background-color: #fff;
                    padding: 1.3rem;
                    max-width: 24rem;
                }

                #modal-content 
                {
                    display: flex;
                    flex-direction: column;
                    gap: 0.4rem;
                    
                    position: relative;
                }

                #icone-fechar-modal
                {
                    position: absolute;
                    right: -9px;
                    top: -11px;
                    color: #525252;
                    cursor: pointer;
                    transition: all 0.5s ease;
                }

                #icone-fechar-modal:hover
                {
                    color: #green;
                }

                .modal-titulo-cadastro 
                {
                    font-family: Poppins, sans-serif;
                    font-size: 15px;
                    color: #000;
                    font-weight: 500;
                    display: flex;
                    gap: 0.4rem;
                }

                p>i 
                {
                    font-size: 1.2rem;
                    color: #1ea41e;
                }

                .modal-frase-cadastro
                {
                    font-family: Poppins, sans-serif;
                    font-size: 13px;
                    color: #2e2e2e;
                    font-weight: 400;
                }
                `;

            document.head.appendChild(style);

            document.addEventListener("DOMContentLoaded", function()
            {
                modal.style.right = "20px";
            });

            iconFechaModal.addEventListener("click", function()
            {
                modal.remove();
            });

            setTimeout(function()
            {
                modal.remove();
            }, 8000);
        });

        const modalSessao0 = document.querySelector(".modal-sessao-0");
        

        modalSessao0.style.display = "none";
        modalSessoa1.style.display = "flex";
        modalForm.style.height = "388px";
    }
    else
    {
        const avisoErro = document.querySelector(".aviso-erro");
    
        if(!avisoErro)
        {
            /* BROTANDO AVISO DE ERRO */
            const boxInput = document.querySelector(".modal-input-box-email");
            const avisoErro = document.createElement("span");

            /* ESTILIZANDO AVISO */
            avisoErro.classList.add("aviso-erro");
            avisoErro.textContent = "Email inválido";
            avisoErro.style.position = "absolute";
            avisoErro.style.top = "5rem";
            avisoErro.style.fontFamily = "poppins, sans-serif";
            avisoErro.style.fontSize = "12px";
            avisoErro.style.fontWeight = "400";
            avisoErro.style.color = "red";

            boxInput.append(avisoErro);

            email.style.borderColor = "red";
        }
   
        
    }
    //console.log(emailVerificado);
}
document.getElementById("verifica-email").addEventListener("click", enviaEmail);


//INPUT COM CÓDIGO DIGITADO

export const inputCod2 = document.querySelector("#codigo");

// VERIFICA SE O CÓDIGO QUE A PESSOA DIGITOU É O MESMO QUE O ENVIADO
export function verificarCod2()
{
    if(inputCod2.value === codigoCompleto2)
    {
        return true; 
    }
    else
    {
        return false;
    }
}


// MUDA O MODAL SE FOR IGUAL, SENÃO PRINTA UM ERRO
export function modalOuErro2(event)
{
    event.preventDefault();

    //const modalSessao2 = document.querySelector(".modal-sessao-2");

    //const btnFechar = document.querySelector("#btn-fechar");
    let aviso = null;
    let verificacao2 = verificarCod2();

    if(verificacao2 === true)
    {      
        window.location = "form-trocar-senha.php?verificacao=sucesso";
    }
    else
    {
        const aviso = document.querySelector(".aviso");

        if(!aviso)
        {
            const boxInput = document.querySelector(".modal-input-box");
            const aviso = document.createElement("span");
    
            // ESTILIZANDO SPAN
            aviso.classList.add("aviso");
            aviso.textContent = "Código de verificação inválido";
            aviso.style.position = "absolute";
            aviso.style.top = "5rem";
            aviso.style.fontFamily = "poppins, sans-serif";
            aviso.style.fontSize = "12px";
            aviso.style.fontWeight = "400";
            aviso.style.color = "red";
    
            inputCod2.style.borderColor = "red";
    
            boxInput.appendChild(aviso);
        }
     
    }
}
    
document.querySelector(".modal-btn-confirmar").addEventListener("click", modalOuErro2);



// export function fechaModalT()
// {
//     modalInteiro.style.display = "none";
// }
// document.querySelector("#btn-fechar").addEventListener("click", fechaModalT);
