// DROP DOWN NAV BAR 

export function navDropDown()
{
    const navSubTopicos = document.querySelector(".sub-topicos");

    if (navSubTopicos.style.display == "none" || navSubTopicos.style.display === "")
    {
        navSubTopicos.style.display = "flex" ;
        navSubTopicos.style.flexDirection = "column";
    }
    else
    {
        navSubTopicos.style.display = "none";
    } 
}
document.querySelector("#nav-seta-sub-topicos").addEventListener("click", navDropDown);



