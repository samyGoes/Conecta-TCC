const circulo = document.querySelector('.circulo');
const botao = document.querySelector('.container-2-botao');
const cardTerceiroSetor = document.querySelector(".card");
const maos = document.querySelector(".img-maos");
const sombraCirculo = document.querySelector(".sombra-circulo");
const iconFechar = document.querySelector("#icon-fechar");   
const style = document.createElement("style");
const mundo = document.querySelector(".box-img");


let tamanho = 250; 

botao.addEventListener('click', function()
{
    maos.style.bottom = "-35rem";

    let intervalo = setInterval(function() 
    {
        tamanho -= 5; 
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



//let posicaoX = 4;
let velocidade = 0.5;
const coracoes = document.querySelector(".coracoes");
const max = 24;
const min = 4;


// CRIANDO CORAÇÃO
window.onload =  function adicionarCoracoes()
{
    setInterval(function() 
    {
        let posicaoY = 32;

        if(tamanho >= 250)
        {
            // CRIANDO OS CORAÇÕES
            const novoCoracao = document.createElement("div");
            novoCoracao.className = "box-img-coracao";
            novoCoracao.innerHTML = `<img src="img/coracao.png">`;

            coracoes.appendChild(novoCoracao);

            // GERANDO NÚMERO ALEATÓRIO PARA A POSIÇÃO DOS CORAÇÕES
            let posicaoX = Math.floor(Math.random() * (max - min + 1) + min)

            novoCoracao.style.marginLeft = `${posicaoX}rem`;

            // SUBINDO OS CORAÇÕES
            let intervalo = setInterval(function() 
            {           
                if(posicaoY <= -15)
                {
                    novoCoracao.remove();
                    clearInterval(intervalo);
                }
                else
                {      
                    novoCoracao.style.marginTop = `${posicaoY}rem`;     
                    posicaoY -= velocidade;              
                }              
            }, 35);   
        }

    }, 2000);
}




//const elementoAlvo = document.querySelector('.container-2');
// let intervalId;


// document.addEventListener("visibilitychange", function() 
// {
//     if (document.visibilityState === "hidden") 
//     {
//       // Guia não está ativa, então para a função
//       clearInterval(intervalId);
//     } 
//     else 
//     {
//       // Guia está ativa, então continua a função
//       intervalId = setInterval(adicionarCoracoes, 1000);
//     }
// });
