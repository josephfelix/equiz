function shareFB(url) {
    var popUp = window.open('http://www.facebook.com/sharer.php?u=' + url, 'popupwindow', 'scrollbars=yes,width=800,height=400');
    popUp.focus();
    return false;
}
function shareTW(url) {
    var popUp = window.open('http://twitter.com/home?status=' + url + ' @siteEquiz', 'popupwindow', 'scrollbars=yes,width=800,height=400');
    popUp.focus();
    return false;
}

function html_entity_decode(str) {
    var a = document.createElement('a');
    a.innerHTML = str;
    return a.text;
}

function shareWhatsapp(url) {
    var msg = '';
    var resposta_usuario = html_entity_decode(window.resposta_usuario);
    var titulo_quiz = html_entity_decode(window.titulo_quiz);
    if (resposta_usuario.length > 0) {
        msg = 'Eu tirei: ' + resposta_usuario + ' e você? ' + titulo_quiz + ' - ';
    } else {
        msg = titulo_quiz + ' | Faça o teste e descubra: ';
    }

    window.location.href = "whatsapp://send?text=" + encodeURIComponent(msg) + url;
}