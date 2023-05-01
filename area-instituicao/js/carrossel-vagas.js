
export const cards = document.querySelectorAll(".card-carrossel");
export const qtdCards = cards.length;
export const containerCarrossel = document.querySelector(".container-carrossel-servicos");
export let esquerdaDireita = 0;
export let qtdCliquesD = 0;

// RESPONSIVIDADE 
export let tela1 = window.matchMedia("(min-width: 774px)");
export let tela2 = window.matchMedia("(min-width: 591px)");
export let tela3 = window.matchMedia("(min-width: 10px)");

// SUMINDO COM SETAS E AJUSTANDO POSIÇÃO DOS CARDS
export function ajusteCarrossel()
{
  /* PARA ESTILIZAR */
  const setaEsquerdaS = document.querySelector(".arrow-left");
  const setaDireitaS = document.querySelector(".arrow-right");

  // PRIMEIRA TELA
  if (qtdCards < 3 && tela1.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "flex-start";
    containerCarrossel.style.marginLeft = "2rem";
  }
  else if(qtdCards == 3 && tela1.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "center";
    containerCarrossel.style.marginLeft = "0rem";
  }


  
  // SEGUNDA TELA
  else if (qtdCards < 2 && tela2.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "center";
    containerCarrossel.style.marginLeft = "0rem";
  }

  else if (qtdCards > 2 && tela2.matches)
  {
    setaDireitaS.style.display = "flex";
    setaEsquerdaS.style.display = "flex";

    // containerCarrossel.style.justifyContent = "center";
    // containerCarrossel.style.marginLeft = "0rem";
  }

  else if(qtdCards == 2 && tela2.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "center";
    containerCarrossel.style.marginLeft = "0rem";
  }



  // TERCEIRA TELA
  else if (qtdCards <= 1 && tela3.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "center";
    containerCarrossel.style.marginLeft = "0rem";
  }

  else if (qtdCards > 1 && tela3.matches)
  {
    setaDireitaS.style.display = "flex";
    setaEsquerdaS.style.display = "flex";

    containerCarrossel.style.justifyContent = "center";
    containerCarrossel.style.marginLeft = "0rem";
  }


}
tela1.addEventListener("change", ajusteCarrossel);
tela2.addEventListener("change", ajusteCarrossel);
tela3.addEventListener("change", ajusteCarrossel);



export function carrosselServicos(e)
{
  const setaEsquerda = e.target.classList.contains("arrow-left");
  const setaDireita = e.target.classList.contains("arrow-right");

  // TRÊS CARDS POR VIEW
  if(tela1.matches)
  {
    // DEFININDO A QUANTIDADE DE CLIQUES
    if (qtdCards == 4)
    {
      qtdCliquesD = 2;
    }
    else if (qtdCards == 5)
    {
      qtdCliquesD = 3;
    }
    else
    {
      qtdCliquesD = qtdCards - 2;
    }

    if (setaEsquerda) 
    {
      // FAZENDO A MOVIMENTAÇÃO PRA ESQUERDA
      esquerdaDireita -= 1;

      // LOOP
      if(esquerdaDireita <= -1)
      {
        esquerdaDireita = qtdCliquesD - 1;
      }
    } 
    else if (setaDireita) 
    {   
      // FAZENDO A MOVIMENTAÇÃO PRA DIREITA
      if (esquerdaDireita <= qtdCliquesD)
      {
        esquerdaDireita += 1;

        // LOOP 
        if (esquerdaDireita == qtdCliquesD)
        {
          esquerdaDireita = 0;
        }
      }
    }
  }

  // DOIS CARDS POR VIEW
  else if (tela2.matches)
  {
     // DEFININDO A QUANTIDADE DE CLIQUES
     if (qtdCards == 3)
     {
       qtdCliquesD = 2;
     }
     else
     {
       qtdCliquesD = qtdCards - 1;
     }
 
     if (setaEsquerda) 
     {
       // FAZENDO A MOVIMENTAÇÃO PRA ESQUERDA
       esquerdaDireita -= 1;
 
       // LOOP
       if(esquerdaDireita <= -1)
       {
         esquerdaDireita = qtdCliquesD - 1;
       }
     } 
     else if (setaDireita) 
     {   
       // FAZENDO A MOVIMENTAÇÃO PRA DIREITA
       if (esquerdaDireita <= qtdCliquesD)
       {
         esquerdaDireita += 1;
 
         // LOOP 
         if (esquerdaDireita == qtdCliquesD)
         {
           esquerdaDireita = 0;
         }
       }
     }
  }

  // UM CARD POR VIEW
  else 
  {
    // DEFININDO A QUANTIDADE DE CLIQUES
    if (qtdCards == 2)
    {
      qtdCliquesD = 2;
    }
    else
    {
      qtdCliquesD = qtdCards;
    }
   
    if (setaEsquerda) 
    {
      // FAZENDO A MOVIMENTAÇÃO PRA ESQUERDA
      esquerdaDireita -= 1;

      // LOOP
      if(esquerdaDireita <= -1)
      {
        esquerdaDireita = qtdCliquesD - 1;
      }
    } 
    else if (setaDireita) 
    {   
      // FAZENDO A MOVIMENTAÇÃO PRA DIREITA
      if (esquerdaDireita <= qtdCliquesD)
      {
        esquerdaDireita += 1;

        //LOOP 
        if (esquerdaDireita == qtdCliquesD)
        {
          esquerdaDireita = 0;
        }
      }
    }
  }
  
  console.log(esquerdaDireita);

  cards[esquerdaDireita].scrollIntoView
  ({
    behavior: "smooth",
    inline: "start",
    block: "nearest"
  });

}
document.querySelectorAll(".control").forEach(function(control)
{
    control.addEventListener("click", function (e) { carrosselServicos(e); });
    tela1.addEventListener("change", carrosselServicos);
    tela2.addEventListener("change", carrosselServicos);
});



