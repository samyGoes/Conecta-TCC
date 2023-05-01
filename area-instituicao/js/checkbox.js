// SELECIONAR TODOS OS CHECKBOX 

// const selecionarTodos = document.querySelector("#selecionar-todos");
// const checkBox = document.querySelectorAll("#checkbox");

// for (let i = 0; i < checkBox.length; i++)
// {
//     selecionarTodos.addEventListener("click", function()
//     {
//         if (selecionarTodos.checked)
//         {
//             checkBox[i].checked = selecionarTodos.checked;
//         }   
//         else
//         {
//             checkBox[i].checked = selecionarTodos.false;
//         }
//     });
// }
export const selecionarTodos = document.querySelector("#selecionar-todos")
export const checkBox = document.querySelectorAll("#checkbox");

export function checkTodos(i)
{
    if (selecionarTodos.checked)
    {
        checkBox[i].checked = selecionarTodos.checked;
    }   
    else
    {
        checkBox[i].checked = selecionarTodos.false;
    }
}
for (let i = 0; i < checkBox.length; i++) 
{
    selecionarTodos.addEventListener("click", function()
    {
        checkTodos(i);
    });
}
