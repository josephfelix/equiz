function conversionPixel(pixelUrl){var image=new Image(1,1);image.src=pixelUrl;}
function shareFB(url){var popUp=window.open('http://www.facebook.com/sharer.php?u='+url,'popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false;}
function shareTW(url){var popUp=window.open('http://twitter.com/home?status='+url+' @siteEquiz','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false;}
var quiz_url = BASE_URL + 'quiz/' + CATEGORIA_QUIZ + '/' + GUID_QUIZ;
$(document).ready(function()
{
	$('.facebook-button').click(function(e){
		e.preventDefault();
		var shareUrl = quiz_url+'/'+window.id_resposta;
		shareFB(encodeURIComponent(shareUrl));
	});
	$('.twitter-button').click(function(e){
		e.preventDefault();
		var shareUrl = quiz_url+'/'+window.id_resposta;
		shareTW(encodeURIComponent(shareUrl));
	});
});