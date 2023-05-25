// if (performance.navigation.type === performance.navigation.TYPE_RELOAD) 
// {
//     console.log('Página atualizada');
//   }
window.addEventListener('beforeunload', function(event) 
{
    localStorage.setItem('pageRefreshed', 'true');
});
  
document.addEventListener('load', function() 
{
    //localStorage.setItem('pageRefreshed', 'true');
    var pageRefreshed = localStorage.getItem('pageRefreshed');

    if (pageRefreshed) 
    {
        var url = window.location.href;
        var inicioUrl = url.split('?')[0];
        console.log(inicioUrl); // "../vagas/vagas.php"
        window.location.replace(inicioUrl);

        localStorage.removeItem('pageRefreshed');
        console.log("Página atualizada");
    } 
    else
    {
        localStorage.setItem('pageRefreshed', 'false');
        console.log("oooh");
    }
});

// var isReloaded = false;

// window.addEventListener('unload', function() 
// {
//     isReloaded = true;
// });

// window.addEventListener('load', function() 
// {
//     if (isReloaded) 
//     {
//     console.log('Página atualizada');
//     } 
//     else
//     {
//     console.log('Página não atualizada');
//     }
// });

// Ao carregar a página

// var tempoCarregamento = Date.now();

// // Evento disparado antes de atualizar ou fechar a página
// window.addEventListener('beforeunload', function(event) 
// {
//     // Calcular a diferença de tempo entre o carregamento e o evento 'beforeunload'
//     var tempoDecorrido = Date.now() - tempoCarregamento;

//     // Verificar se o tempo decorrido é maior que um determinado limite (por exemplo, 1 segundo)
//     if (tempoDecorrido > 1000) 
//     {
//         console.log('A página foi atualizada!');
//     } 
//     else 
//     {
//         console.log('A página não foi atualizada :(');
//     }
// });


//   var url = window.location.href;

//   var inicioUrl = url.split('?')[0];
//   console.log(inicioUrl); // "../vagas/vagas.php"
//   window.location.href = inicioUrl;