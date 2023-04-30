// DROP DOWN NAV BAR 
export const navSubTopicos = document.querySelector(".sub-topicos");

export function navDropDown()
{
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


// export function cliqueForaNav(event)
// {
//     //const target = event.target;

//     if (!navSubTopicos.contains(event.target)) 
//     {
//         navSubTopicos.style.display = "none";
//     }
// }
// .addEventListener('click', cliqueForaNav);
