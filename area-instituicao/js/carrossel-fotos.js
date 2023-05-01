
export const cardsD = document.querySelectorAll(".card-carrossel-dois");
export const qtdCardsD = cardsD.length;
export const containerCarrosselD = document.querySelector(".container-carrossel");
export let esquerdaDireitaD = 0;
export let qtdCliquesDD = 0;

// RESPONSIVIDADE 
export let tela1D = window.matchMedia("(min-width: 774px)");
export let tela2D = window.matchMedia("(min-width: 591px)");
export let tela3D = window.matchMedia("(min-width: 10px)");

// SUMINDO COM SETAS E AJUSTANDO POSIÇÃO DOS CARDS
export function ajusteCarrosselDois()
{
  /* PARA ESTILIZAR */
  const setaEsquerdaSD = document.querySelector(".arrow-left-dois");
  const setaDireitaSD = document.querySelector(".arrow-right-dois");

  // PRIMEIRA TELA
  if (qtdCardsD < 3 && tela1D.matches)
  {
    setaDireitaSD.style.display = "none";
    setaEsquerdaSD.style.display = "none";

    containerCarrosselD.style.justifyContent = "flex-start";
    containerCarrosselD.style.marginLeft = "2rem";
  }
  else if(qtdCardsD == 3 && tela1D.matches)
  {
    setaDireitaSD.style.display = "none";
    setaEsquerdaSD.style.display = "none";

    containerCarrosselD.style.justifyContent = "center";
    containerCarrosselD.style.marginLeft = "0rem";
  }


  
  // SEGUNDA TELA
  else if (qtdCardsD < 2 && tela2D.matches)
  {
    setaDireitaSD.style.display = "none";
    setaEsquerdaSD.style.display = "none";

    containerCarrosselD.style.justifyContent = "center";
    containerCarrosselD.style.marginLeft = "0rem";
  }

  else if (qtdCardsD > 2 && tela2D.matches)
  {
    setaDireitaSD.style.display = "flex";
    setaEsquerdaSD.style.display = "flex";

    containerCarrosselD.style.justifyContent = "center";
    containerCarrosselD.style.marginLeft = "0rem";
  }

  else if(qtdCardsD == 2 && tela2D.matches)
  {
    setaDireitaSD.style.display = "none";
    setaEsquerdaSD.style.display = "none";

    containerCarrosselD.style.justifyContent = "center";
    containerCarrosselD.style.marginLeft = "0rem";
  }



  // TERCEIRA TELA
  else if (qtdCardsD <= 1 && tela3D.matches)
  {
    setaDireitaSD.style.display = "none";
    setaEsquerdaSD.style.display = "none";

    containerCarrosselD.style.justifyContent = "center";
    containerCarrosselD.style.marginLeft = "0rem";
  }

  else if (qtdCardsD > 1 && tela3D.matches)
  {
    setaDireitaSD.style.display = "flex";
    setaEsquerdaSD.style.display = "flex";

    containerCarrosselD.style.justifyContent = "center";
    containerCarrosselD.style.marginLeft = "0rem";
  }


}
tela1D.addEventListener("change", ajusteCarrosselDois);
tela2D.addEventListener("change", ajusteCarrosselDois);
tela3D.addEventListener("change", ajusteCarrosselDois);



export function carrosselDois(e)
{
  const setaEsquerdaD = e.target.classList.contains("arrow-left-dois");
  const setaDireitaD = e.target.classList.contains("arrow-right-dois");

  // TRÊS CARDS POR VIEW
  if(tela1D.matches)
  {
    // DEFININDO A QUANTIDADE DE CLIQUES
    if (qtdCardsD == 4)
    {
      qtdCliquesDD = 2;
    }
    else if (qtdCardsD == 5)
    {
      qtdCliquesDD = 3;
    }
    else
    {
      qtdCliquesDD = qtdCardsD - 2;
    }

    if (setaEsquerdaD) 
    {
      // FAZENDO A MOVIMENTAÇÃO PRA ESQUERDA
      esquerdaDireitaD -= 1;

      // LOOP
      if(esquerdaDireitaD <= -1)
      {
        esquerdaDireitaD = qtdCliquesDD - 1;
      }
    } 
    else if (setaDireitaD) 
    {   
      // FAZENDO A MOVIMENTAÇÃO PRA DIREITA
      if (esquerdaDireitaD <= qtdCliquesDD)
      {
        esquerdaDireitaD += 1;

        // LOOP 
        if (esquerdaDireitaD == qtdCliquesDD)
        {
          esquerdaDireitaD = 0;
        }
      }
    }
  }

  // DOIS CARDS POR VIEW
  else if (tela2D.matches)
  {
     // DEFININDO A QUANTIDADE DE CLIQUES
     if (qtdCardsD == 3)
     {
       qtdCliquesDD = 2;
     }
     else
     {
       qtdCliquesDD = qtdCardsD - 1;
     }
 
     if (setaEsquerdaD) 
     {
       // FAZENDO A MOVIMENTAÇÃO PRA ESQUERDA
       esquerdaDireitaD -= 1;
 
       // LOOP
       if(esquerdaDireitaD <= -1)
       {
         esquerdaDireitaD = qtdCliquesDD - 1;
       }
     } 
     else if (setaDireitaD) 
     {   
       // FAZENDO A MOVIMENTAÇÃO PRA DIREITA
       if (esquerdaDireitaD <= qtdCliquesDD)
       {
         esquerdaDireitaD += 1;
 
         // LOOP 
         if (esquerdaDireitaD == qtdCliquesDD)
         {
           esquerdaDireitaD = 0;
         }
       }
     }
  }

  // UM CARD POR VIEW
  else 
  {
    // DEFININDO A QUANTIDADE DE CLIQUES
    if (qtdCardsD == 2)
    {
      qtdCliquesDD = 2;
    }
    else
    {
      qtdCliquesDD = qtdCardsD;
    }
   
    if (setaEsquerdaD) 
    {
      // FAZENDO A MOVIMENTAÇÃO PRA ESQUERDA
      esquerdaDireitaD -= 1;

      // LOOP
      if(esquerdaDireitaD <= -1)
      {
        esquerdaDireitaD = qtdCliquesDD - 1;
      }
    } 
    else if (setaDireitaD) 
    {   
      // FAZENDO A MOVIMENTAÇÃO PRA DIREITA
      if (esquerdaDireitaD <= qtdCliquesDD)
      {
        esquerdaDireitaD += 1;

        //LOOP 
        if (esquerdaDireitaD == qtdCliquesDD)
        {
          esquerdaDireitaD = 0;
        }
      }
    }
  }
  
  console.log(esquerdaDireitaD);

  cardsD[esquerdaDireitaD].scrollIntoView
  ({
    behavior: "smooth",
    inline: "start",
    block: "nearest"
  });

}
document.querySelectorAll(".control-dois").forEach(function(controlD)
{
    controlD.addEventListener("click", function (e) { carrosselDois(e); });
    tela1D.addEventListener("change", carrosselDois);
    tela2D.addEventListener("change", carrosselDois);
});



