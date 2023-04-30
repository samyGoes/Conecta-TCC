// DROP DOWN DO BOTÃO DAS CAUSAS/HABILIDADE + MUDANDO BOTÃO DE COR
 const botaoCausas = document.querySelector(".filtro-causas");
 const botaoHabilidade = document.querySelector(".filtro-habilidade");
 const boxCausas = document.querySelector(".box-causas");
 const boxHabilidade = document.querySelector(".box-habilidade");
 const dropCausas = document.querySelector('.clique-fora');

 botaoCausas.addEventListener("click", function() 
 {
     if (boxCausas.style.display == "none" || boxCausas.style.display === "") 
     {
        boxCausas.style.display = "flex";
        botaoCausas.style.backgroundColor = "#cf8a3f";
        botaoCausas.style.color = "#fff";
        botaoCausas.style.borderColor = "#cf8a3f";
     } 
     else 
     {
        boxCausas.style.display = "none";
        botaoCausas.style.backgroundColor = "#fbf7c7";
        botaoCausas.style.color = "#000";
        botaoCausas.style.borderColor = "#000";
     }
 });

 document.addEventListener('click', function(event) 
 {
     const target = event.target;
     if (!dropCausas.contains(target)) 
     {
         boxCausas.style.display = "none";
         botaoCausas.style.backgroundColor = "#fbf7c7";
         botaoCausas.style.color = "#000";
         botaoCausas.style.borderColor = "#000";
     }
 });





botaoHabilidade.addEventListener("click", function() 
 {
     if (boxHabilidade.style.display == "none" || boxCausas.style.display === "") 
     {
        boxHabilidade.style.display = "flex";
        botaoHabilidade.style.backgroundColor = "#cf8a3f";
        botaoHabilidade.style.color = "#fff";
        botaoHabilidade.style.borderColor = "#cf8a3f";
     } 
     else 
     {
        boxHabilidade.style.display = "none";
        botaoHabilidade.style.backgroundColor = "#fbf7c7";
        botaoHabilidade.style.color = "#000";
        botaoHabilidade.style.borderColor = "#000";
     }
 });

 document.addEventListener('click', function(event) 
 {
     const target = event.target;
     if (!dropCausas.contains(target)) 
     {
        boxHabilidade.style.display = "none";
        botaoHabilidade.style.backgroundColor = "#fbf7c7";
        botaoHabilidade.style.color = "#000";
        botaoHabilidade.style.borderColor = "#000";
     }
 });

