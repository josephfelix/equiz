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
function shareWhatsapp(url) {
    var msg = '';
    if (window.resposta_usuario.length > 0) {
        msg = 'Eu tirei: ' + window.resposta_usuario + ' e você? ' + window.titulo_quiz + ' - ' + url;
    } else {
        msg = window.titulo_quiz + ' | Faça o teste e descubra: ' + url;
    }

    window.location.href = "whatsapp://send?text=" + encodeURIComponent(msg);
}