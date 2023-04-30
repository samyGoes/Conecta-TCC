const controlsV = document.querySelectorAll(".control");
let currentItemV = 0;
const itemsV = document.querySelectorAll(".card-carrossel");
const maxItemsV = itemsV.length;

controlsV.forEach((controlV) => 
{
  controlV.addEventListener("click", (e) => 
  {
    isLeftV = e.target.classList.contains("arrow-left");

    if (isLeftV) 
    {
      currentItemV -= 1;
    } 
    else 
    {
      currentItemV += 1;
    }
    
    // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 
    pV = maxItemsV - 3;
    if (currentItemV >= pV) 
    {
      currentItemV = 0;
    }

    if (currentItemV < 0) 
    {
      currentItemV = pV - 1;
    }

    
    // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 681px
    let tela2V = window.matchMedia("(max-width: 681px)");
    if (tela2V)
    {
      lV = maxItemsV - 2;
      if (currentItemV >= lV) 
      {
        currentItemV = 0;
      }
  
      if (currentItemV < 0) 
      {
        currentItemV = lV - 1;
      }
    }

    // AJUSTANDO A MOVIMENTAÇÃO PRA TELA 681px
    let tela3V = window.matchMedia("(max-width: 375px)");
    if (tela3V)
    {
      if (currentItemV >= maxItemsV) 
      {
        currentItemV = 0;
      }
  
      if (currentItemV < 0) 
      {
        currentItemV = maxItemsV - 1;
      }
    }


    // items.forEach((item) => item.classList.remove("current-item"));

    itemsV[currentItemV].scrollIntoView({
      behavior: "smooth",
      inline: "start",
      block: "nearest"
    });

    // items[currentItem].classList.add("current-item");
  }); 
});




