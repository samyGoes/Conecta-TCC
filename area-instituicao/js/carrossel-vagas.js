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



export function carrossel(e)
{
  let currentItem = 0;
  const items = document.querySelectorAll(".card-carrossel");
  const maxItems = items.length;

  const isLeft = e.target.classList.contains("arrow-left");

  if (isLeft) 
  {
    currentItem -= 1;
  } 
  else 
  {
    currentItem += 1;
  }

  let p = maxItems - 3;
  if (currentItem >= p) 
  {
    currentItem = 0;
  }

  if (currentItem < 0) 
  {
    currentItem = p - 1;
  }


  items[currentItem].scrollIntoView
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
      carrossel(e);
    });
});


