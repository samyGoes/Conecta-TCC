// GERAR CÓDIGO ALEATÓRIO
let num = '';
let a = '';
let b = '';
let codigo = '';

function codAleatorio()
{
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


// ENVIAR EMAIL
const btnEnviaEmail = document.querySelector("#envia-email");
const emailLogado = document.querySelector(".email-logado");
const nomeLogado = document.querySelector(".nome-logado");
let codigoCompleto = codAleatorio();

btnEnviaEmail.addEventListener("click", function(event)
{
    // impede que a página seja recarregada
    event.preventDefault();
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
});


// VERIFICANDO SE O CÓDIGO QUE A PESSOA COLOU É O MESMO QUE O ENVIADO
const inputCod = document.querySelector("#senha");

function verificarCod()
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

const modal = document.querySelector(".modal");
const modalSessoa1 = document.querySelector(".modal-sessao-1");
const modalSessao2 = document.querySelector(".modal-sessao-2");
const form = document.querySelector(".form");
const btnConfirmar = document.querySelector(".modal-btn-confirmar");
const btnFechar = document.querySelector("#btn-fechar");
let aviso = null;


btnConfirmar.addEventListener("click", function(event)
{
    event.preventDefault();
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
});



// senha: 1Conecta2?
