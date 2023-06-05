var conn = new WebSocket('ws://localhost:3000');

conn.onopen = function (e) {
    //console.log("Connection established!");
};

conn.onmessage = function (e) {
    //console.log(e.data);
    showMessages('area-voluntario', e.data);
};

//conn.send('Hello World!');
///////////////////////////////////////////////
var inp_message = document.getElementById('enviar-mensagem');
var btn_env = document.getElementById('btn1');
var area_content = document.getElementById('mensagens');
var scroll = document.getElementById("scroll-chat");

btn_env.addEventListener('click', function () {
    if (inp_message.value != '') {
        var msg = {
            'msg': inp_message.value
        };
        msg = JSON.stringify(msg);

        conn.send(msg);

        showMessages('me', msg);

        inp_message.value = '';

        scroll.scrollTop = scroll.scrollHeight; // Rolar a barra de rolagem para baixo
    }
});



function showMessages(papelRemetente, data) {
    data = JSON.parse(data);

    console.log(data);

    var srcFotoRemetente, srcFotoDestinatario, containerClass;
    var mensagemClass, fotoClass;
    if (papelRemetente === 'me') {
        srcFotoRemetente = "<?php ?>../img-instituicao/9.jpg";
        srcFotoDestinatario = "../img-instituicao/6.jpg";
        containerClass = 'area-instituicao me';
        mensagemClass = 'mensagem-instituicao';
        fotoClass = 'foto-instituicao';
    } else if (papelRemetente === 'area-voluntario') {
        srcFotoRemetente = "../img-instituicao/6.jpg";
        srcFotoDestinatario = "../img-instituicao/9.jpg";
        containerClass = 'area-voluntario';
        mensagemClass = 'mensagem-voluntario';
        fotoClass = 'foto-voluntario';
    }

    var div = document.createElement('div');
    div.setAttribute('class', containerClass);

    var divInstituicao = document.createElement('div');
    divInstituicao.setAttribute('class', 'instituicao');

    var divMensagem = document.createElement('div');
    divMensagem.setAttribute('class', mensagemClass);

    var divConteudo = document.createElement('div');
    divConteudo.setAttribute('class', 'conteudo-mensagem');

    var p = document.createElement('p');
    p.textContent = data.msg;

    divConteudo.appendChild(p);

    divMensagem.appendChild(divConteudo);
    divInstituicao.appendChild(divMensagem);

    var divFoto = document.createElement('div');
    divFoto.setAttribute('class', fotoClass);

    var img = document.createElement('img');
    if (papelRemetente === 'me') {
        img.setAttribute('src', srcFotoRemetente);
    } else {
        img.setAttribute('src', srcFotoDestinatario);
    }
    img.setAttribute('alt', 'foto');

    divFoto.appendChild(img);

    div.appendChild(divInstituicao);
    div.appendChild(divFoto);

    if (papelRemetente === 'area-voluntario') {
        var divAreaVoluntario = document.createElement('div');
        divAreaVoluntario.setAttribute('class', 'area-voluntario-style');
        divAreaVoluntario.appendChild(div);
        area_content.appendChild(divAreaVoluntario);
    } else {
        area_content.appendChild(div);
    }

    scroll.scrollTop = scroll.scrollHeight; // Rolar a barra de rolagem para baixo
}