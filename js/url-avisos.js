// if (performance.navigation.type === performance.navigation.TYPE_RELOAD) 
// {
//     console.log('Página atualizada');
//   }
// window.addEventListener('beforeunload', function(event) 
// {
//     localStorage.setItem('pageRefreshed', 'true');
// });
  
// document.addEventListener('DOMContentLoaded', function() 
// {
//     var pageRefreshed = localStorage.getItem('pageRefreshed');

//     if (pageRefreshed) 
//     {
//         var url = window.location.href;
//         var inicioUrl = url.split('?')[0];
//         console.log(inicioUrl); // "../vagas/vagas.php"
//         window.location.replace(inicioUrl);

//         localStorage.removeItem('pageRefreshed');
//     } 
//     else
//     {
//         localStorage.setItem('pageRefreshed', 'false');
//     }
// });

var isReloaded = false;

window.addEventListener('unload', function() 
{
    isReloaded = true;
});

window.addEventListener('load', function() 
{
    if (isReloaded) 
    {
    console.log('Página atualizada');
    } 
    else
    {
    console.log('Página não atualizada');
    }
});



//   var url = window.location.href;

//   var inicioUrl = url.split('?')[0];
//   console.log(inicioUrl); // "../vagas/vagas.php"
//   window.location.href = inicioUrl;