// DROP DOWN NAV BAR 
const navSetaDrop = document.querySelector("#nav-seta-sub-topicos");
const navSubTopicos = document.querySelector(".sub-topicos");

navSetaDrop.addEventListener("click", function dropDown()
{
    if (navSubTopicos.style.display == "none")
    {
        navSubTopicos.style.display = "flex";
        navSubTopicos.style.flexDirection = "column";
    }
    else
    {
        navSubTopicos.style.display = "none";
    }
});




