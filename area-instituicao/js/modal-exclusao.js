const modal = document.querySelector('.container-modal');
const btnExcluir = document.querySelectorAll(".btn-excluir");
const btnFechar = document.querySelector(".btn-fechar");
const fotos = document.querySelectorAll(".conteudo-foto");

for(var i = 0; i < btnExcluir.length; i++)
{
    btnExcluir[i].addEventListener("click", function()
    {
        modal.style.display = "block";

        fotos.forEach(function(foto) 
        {
            foto.classList.add("sem-hover");
        });    
    });
}

btnFechar.addEventListener("click", function()
{ 
    modal.style.display = "none";   

    fotos.forEach(function(foto) 
    {
        foto.classList.remove("sem-hover");
    });   
});


