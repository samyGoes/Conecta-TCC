// const controls = document.querySelectorAll(".control");
// let currentItem = 0;
// const items = document.querySelectorAll(".card-carrossel");
// const maxItems = items.length;

// controls.forEach((control) => 
// {
//   control.addEventListener("click", (e) => 
//   {
//     isLeft = e.target.classList.contains("arrow-left");

//     if (isLeft) 
//     {
//       currentItem -= 1;
//     } 
//     else 
//     {
//       currentItem += 1;
//     }
    
//     // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 
//     // p = maxItems - 3;
//     // if (currentItem >= p) 
//     // {
//     //   currentItem = 0;
//     // }

//     // if (currentItem < 0) 
//     // {
//     //   currentItem = p - 1;
//     // }

    
//     // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 681px
//     // let tela2 = window.matchMedia("(max-width: 681px)");
//     // if (tela2)
//     // {
//     //   l = maxItems - 2;
//     //   if (currentItem >= l) 
//     //   {
//     //     currentItem = 0;
//     //   }
  
//     //   if (currentItem< 0) 
//     //   {
//     //     currentItem = l - 1;
//     //   }
//     // }

//     // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 681px
//     // let tela3 = window.matchMedia("(max-width: 375px)");
//     // if (tela3)
//     // {
//     //   if (currentItem >= maxItems) 
//     //   {
//     //     currentItem = 0;
//     //   }
  
//     //   if (currentItem< 0) 
//     //   {
//     //     currentItem = maxItems - 1;
//     //   }
//     // }


//     // items.forEach((item) => item.classList.remove("current-item"));

//     items[currentItem].scrollIntoView({
//       behavior: "smooth",
//       inline: "start",
//       block: "nearest"
//     });

//     // items[currentItem].classList.add("current-item");
//   }); 
// });

export const cards = document.querySelectorAll(".card-carrossel");
export const maxCards = cards.length;
export const containerCarrossel = document.querySelector(".container-carrossel-servicos");

export function carrosselServicos(e)
{
  let esquerda = 0;
  let direita = 0;

  const setaEsquerda = e.target.classList.contains("arrow-left");
  const setaDireita = e.target.classList.contains("arrow-right");

  if (setaEsquerda) 
  {
    esquerda -= 1;
  } 
  else if (setaDireita) 
  {
    direita += 1;
  }


  // let p = maxCards - 3;
  // if (currentItem >= p) 
  // {
  //   currentItem = 0;
  // }

  // if (currentItem < 0) 
  // {
  //   currentItem = p - 1;
  // }


  cards[esquerda, direita].scrollIntoView
  ({
    behavior: "smooth",
    inline: "start",
    block: "nearest"
  });

}
document.querySelectorAll(".control").forEach(function(control)
{
    control.addEventListener("click", function (e)
    {
      carrosselServicos(e);
    });
});


export function ajusteCarrossel()
{
  /* PARA ESTILIZAR */
  const setaEsquerdaS = document.querySelector(".arrow-left");
  const setaDireitaS = document.querySelector(".arrow-right");

  let tela1 = window.matchMedia("(min-width: 772px)");
  let tela2 = window.matchMedia("(max-width: 773px)");

  if (maxCards < 3 && tela1.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "flex-start";
    containerCarrossel.style.marginLeft = "2rem";
  }
  else if(maxCards == 3 && tela1.matches)
  {
    setaDireitaS.style.display = "none";
    setaEsquerdaS.style.display = "none";

    containerCarrossel.style.justifyContent = "center";
    containerCarrossel.style.marginLeft = "0rem";
  }
}