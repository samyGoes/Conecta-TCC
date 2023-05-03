const circulo = document.querySelector('.circulo');
const botao = document.querySelector('.container-2-botao');
const cardTerceiroSetor = document.querySelector(".card");
const maos = document.querySelector(".img-maos");
const sombraCirculo = document.querySelector(".sombra-circulo");
const iconFechar = document.querySelector("#icon-fechar");
const boxCoracoes = document.querySelector(".box-img-coracao");   
const style = document.createElement("style");
const mundo = document.querySelector(".box-img");
const coracoes = document.querySelector(".coracoes");

//boxCoracoes.innerHTML = ` <img src="img/coracao.png"> `  
//coracoes.innerHTML = ` <div class="box-img-coracao"><img src="img/coracao.png"></div> `  


let tamanho = 250; // tamanho inicial do círculo

botao.addEventListener('click', function()
{
    maos.style.bottom = "-35rem";

    let intervalo = setInterval(function() 
    {
        tamanho -= 5; // diminui o tamanho do círculo em 5 pixels
        circulo.style.backgroundImage = `radial-gradient(rgba(255, 255, 0, 0)0 ${tamanho}px, #beeaf1 ${tamanho}px 100%)`;

        if (tamanho <= 0) 
        {
            clearInterval(intervalo); // para a animação quando o círculo tiver tamanho zero
            cardTerceiroSetor.style.opacity = "1";
            cardTerceiroSetor.style.marginTop = "8rem";
        }
        
    }, 10);
});

iconFechar.addEventListener("click", function()
{
    cardTerceiroSetor.style.opacity = "0";
    maos.style.bottom = "-12rem";
    let intervalo = setInterval(function() 
    {
        tamanho += 5; // diminui o tamanho do círculo em 5 pixels
        circulo.style.backgroundImage = `radial-gradient(rgba(255, 255, 0, 0)0 ${tamanho}px, #beeaf1 ${tamanho}px 100%)`;

        if (tamanho >= 250) 
        {
            clearInterval(intervalo); // para a animação quando o círculo tiver tamanho zero
            cardTerceiroSetor.style.marginTop = "0rem";
            cardTerceiroSetor.style.opacity = "0";                     
        }
        
    }, 10);
});


if(tamanho >= 250)
{
    let posicao = 3;
    // CRIANDO CORAÇÃO
    for(let i = 1; i <= 5; i++)
    {
        coracoes.innerHTML = ` <div class="box-img-coracao"><img src="img/coracao.png"></div> `  
        boxCoracoes.style.marginLeft = `${posicao}rem`;
        posicao = posicao + 3;
    }

    let intervalo = setInterval(function() 
    {
        boxCoracoes.style.marginBottom = "40rem";
    }, 10);
    
}