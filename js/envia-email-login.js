//import { codAleatorio, codigoCompleto } from "../area-voluntario/js/envia-email.js";

const modalInteiro = document.querySelector(".modal");

function abreModal()
{
    modalInteiro.style.display = "block";
}
document.querySelector(".link-esqueceu-senha").addEventListener("click", abreModal);

function fechaModal()
{
    modalInteiro.style.display = "none";
}
document.querySelector(".voltar-login").addEventListener("click", fechaModal);



var email = document.getElementById("email");

function verificaEmail(event)
{
    event.preventDefault(); // impede o comportamento padrão de envio do formulário
  
    var xhr = new XMLHttpRequest();

    xhr.open("POST", "verifica-email.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() 
    {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) 
      {
        var resposta = xhr.responseText;
        if (resposta === "true") 
        {
            //enviaEmail();
            return true;
        } 
        else 
        {
            return false;
        }
      }
    };
    xhr.send("email=" + email.value);
}
document.getElementById("verifica-email").addEventListener("click", verificaEmail);



function enviaEmail()
{
    if(emailVerificado)
    {
        const emailInput = document.querySelector("#email").value;

        emailjs.init('no7wF9bX2UIYjHvBT');
    
        var parametros = 
        {
            from_name: 'Conecta',
            to_name: 'aaaa',
            to_email: emailInput,
            email_id: emailInput,
            message: codigoCompleto
        }
        emailjs.send("service_x1ydd2q", "template_5599faa", parametros).then(function()
        {
            alert("Código de verificação enviado com sucesso!");
        });
    }
    else
    {
        /* BROTANDO AVISO DE ERRO */
        const boxInput = document.querySelector(".modal-input-box-email");
        avisoErro = document.createElement("span");

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




