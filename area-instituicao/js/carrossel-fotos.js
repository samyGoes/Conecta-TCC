const controlsDois = document.querySelectorAll(".control-dois");
let currentItemDois = 0;
const itemsDois = document.querySelectorAll(".card-carrossel-dois");
const maxItemsDois = itemsDois.length;

controlsDois.forEach((controlDois) => 
{
  controlDois.addEventListener("click", (e) => 
  {
    isLeftDois = e.target.classList.contains("arrow-left-dois");

    // MOVIMENTO ESQUERDA E DIREITA
    if (isLeftDois) 
    {
      currentItemDois -= 1;
    } 
    else 
    {
      currentItemDois += 1;
    }

    // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 
      j = maxItemsDois - 3;
      if (currentItemDois >= j) 
      {
        currentItemDois = 0;
      }
  
      if (currentItemDois< 0) 
      {
        currentItemDois = j - 1;
      }

      // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 681px
      let telaDois = window.matchMedia("(max-width: 681px)");
      if (telaDois)
      {
        k = maxItemsDois - 2;
        if (currentItemDois >= j) 
        {
          currentItemDois = 0;
        }
    
        if (currentItemDois< 0) 
        {
          currentItemDois = j - 1;
        }
      }

      // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 681px
      let telaTres = window.matchMedia("(max-width: 375px)");
      if (telaTres)
      {
        if (currentItemDois >= maxItemsDois) 
        {
          currentItemDois = 0;
        }
    
        if (currentItemDois< 0) 
        {
          currentItemDois = maxItemsDois - 1;
        }
      }
  

    // items.forEach((item) => item.classList.remove("current-item"));

    itemsDois[currentItemDois].scrollIntoView({
      behavior: "smooth",
      inline: "start",
      block: "nearest"
    });

    // items[currentItem].classList.add("current-item");
  });
});
