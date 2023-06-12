function modalAvaliacao(event)
{  
    event.preventDefault();

    var xhr = new XMLHttpRequest();

    xhr.open("GET", "tabela-vagas-voluntario.php", true); // application/json
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() 
    {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200)  
        {        
            let modal = document.querySelector("#modalAvaliar");

            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';

            var resposta = xhr.responseText;
            console.log("Resposta da requisição AJAX:", resposta);
                    
        }   
        else //if (xhr.readyState === XMLHttpRequest.DONE && xhr.status !== 200)  
        {
            console.log("aaa");
        }       
    }
    xhr.onerror = function()
    {
        console.log("aaa2");
    }
    xhr.send();
}
document.getElementById("btnModalAvaliar").addEventListener("click", modalAvaliacao);