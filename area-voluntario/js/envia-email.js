// GERAR CÓDIGO ALEATÓRIO
export function codAleatorio()
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
export let codigoCompleto = codAleatorio();

// ENVIAR EMAIL
export function enviaEmail(event)
{
    event.preventDefault();
    
    const emailLogado = document.querySelector(".email-logado");
    const nomeLogado = document.querySelector(".nome-logado");

    emailjs.init('no7wF9bX2UIYjHvBT');

    var parametros = 
    {
        from_name: 'Conecta',
        to_name: nomeLogado.textContent.trim(),
        to_email: emailLogado.textContent.trim(),
        email_id: emailLogado.textContent.trim(),
        message: codigoCompleto
    }
    emailjs.send("service_x1ydd2q", "template_5599faa", parametros).then(function()
    {
        alert("Código de verificação enviado com sucesso!");
    });
}

// EVENTO DE CLICAR NO LINK ASSOCIADO A FUNÇÃO ACIMA
document.getElementById("envia-email").addEventListener("click", enviaEmail);


// INPUT COM CÓDIGO DIGITADO
export const inputCod = document.querySelector("#senha");

// VERIFICA SE O CÓDIGO QUE A PESSOA DIGITOU É O MESMO QUE O ENVIADO
export function verificarCod()
{
    if(inputCod.value === codigoCompleto)
    {
        return true; 
    }
    else
    {
        return false;
    }
}

export const modal = document.querySelector(".modal");

// MUDA O MODAL SE FOR IGUAL, SENÃO PRINTA UM ERRO
export function modalOuErro(event)
{
    event.preventDefault();

    
    const modalSessoa1 = document.querySelector(".modal-sessao-1");
    const modalSessao2 = document.querySelector(".modal-sessao-2");
    const form = document.querySelector(".form");

    const btnFechar = document.querySelector("#btn-fechar");
    let aviso = null;
    let verificacao = verificarCod();

    if(verificacao === true)
    {      
        modalSessoa1.style.display = "none";
        modalSessao2.style.display = "flex";
        form.style.height = "259px";

        btnFechar.addEventListener("click", function()
        {
            modal.style.display = "none";
        });
    }
    else
    {
        if(aviso) // verifica se o elemento já foi criado
        {   
            aviso.remove(); // remove o elemento existente
        }

        aviso = document.createElement("span");
        const boxInput = document.querySelector(".modal-input-box");

        // ESTILIZANDO SPAN
        aviso.textContent = "Código de verificação inválido";
        aviso.style.position = "absolute";
        aviso.style.top = "5rem";
        aviso.style.fontFamily = "poppins, sans-serif";
        aviso.style.fontSize = "12px";
        aviso.style.fontWeight = "400";
        aviso.style.color = "red";

        inputCod.style.borderColor = "red";

        boxInput.appendChild(aviso);
    }
}
    
document.querySelector(".modal-btn-confirmar").addEventListener("click", modalOuErro);

// VOLTA PRA PÁGINA ANTERIOR
export function voltaPagina()
{
    history.back();
    // usado para evitar que o link execute sua ação padrão (ou seja, navegar para uma nova página)
    return false;
}

document.querySelector(".voltar-anterior").addEventListener("click", voltaPagina);


// IMPEDINDO QUE O USUÁRIO POSSA DE ALGUMA FORMA REMOVER O MODAL ATRAVÉS DO F12
export function modalSeguro(e)
{
    while(modal.style.display == "block")
    {
        if (e.keyCode === 123) 
        {
            e.preventDefault();
        }
    } 
}

window.addEventListener('keydown', modalSeguro), false; 

export function modalSeguro2(e)
{
    e.preventDefault();
}

modal.addEventListener('contextmenu', modalSeguro2), false;


// senha: 1Conecta2?
