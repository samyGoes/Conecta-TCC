function esqueciSenha()
{
    const modalInteiro = document.querySelector(".modal");

    modalInteiro.style.display = "block";
}

document.querySelector(".link-esqueceu-senha").addEventListener("click", esqueciSenha);

function verificaEmail(event)
{
    event.preventDefault(); // impede o comportamento padrão de envio do formulário
  
    var email = document.getElementById("email").value;
  
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
            //alert("funcionou");
            return true;
        } 
        else 
        {
            //alert("não funcionou :(");
            return false;
        }
      }
    };
    xhr.send("email=" + email);
  }

  document.getElementById("verifica-email").addEventListener("click", verificaEmail);


