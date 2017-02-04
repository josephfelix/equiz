var RIGHT=1;var WRONG=2;var currentStepNum=0;var isTrivia=$('#quiz').hasClass('trivia');var data={};data.values={};$(document).ready(function(){$('#quiz .redo').click(function(e){location.reload();});$('#quiz .quiz-cover .big-button').click(function(e){e.preventDefault();$('#quiz .quiz-cover').fadeOut(200,function(){$('#quiz .quiz-questions').fadeIn(200);$('html, body').animate({scrollTop:$("ul.steps").offset().top},300);});nextStep();});$('#quiz .single .alternatives li').click(function(e){e.preventDefault();if(isTrivia){if(!($(this).parent().hasClass('right')||$(this).parent().hasClass('wrong'))){if(typeof data.correct===typeof undefined)data.correct=0;var correctLi;if($(this).attr('data-correct')==RIGHT){correctLi=$(this);data.correct++;$(this).parent().addClass('right');}else{correctLi=$(this).parent().find('[data-correct='+RIGHT+']');$(this).css('background-color','#BF0F0F');$(this).css('color','#FFF');$(this).parent().addClass('wrong');}
correctLi.css('background-color','#228E04');correctLi.css('color','#FFF');nextStep();}}else{if($(this).parent().attr('data-qid')=='-1'){data.text=$('#username').val();}else{data.values[$(this).parent().attr('data-qid')]=$(this).attr('data-aid');}
nextStep();}});});if(isTrivia){$('#quiz').on('click','ul.steps li.marked, ul.steps li.current',function(e){var newStepNum=$(this).attr('data-step')*1;var newStep=$('#quiz .questions .single[data-step='+(newStepNum)+']');$('html, body').animate({scrollTop:newStep.offset().top- 40},300);});}else{$('#quiz').on('click','ul.steps li.marked',function(e){var newStepNum=$(this).attr('data-step')*1;var currentStep=$('#quiz .questions .single[data-step='+currentStepNum+']');var newStep=$('#quiz .questions .single[data-step='+(newStepNum)+']');currentStep.fadeOut(200,function(){newStep.fadeIn(200,function(){var tallest=0;$('.alternatives span').each(function(){if(tallest<$(this).height())tallest=$(this).height();});$('.alternatives span:visible').attr('style','height:'+tallest+'px');$('.alternatives li').css('height','auto');});});$('ul.steps li.marked').each(function(){if(newStepNum<=$(this).attr('data-step')*1)$(this).removeClass('marked');});currentStepNum=newStepNum;$("ul.steps li.current").removeClass('current');$("ul.steps li[data-step="+currentStepNum+"]").addClass('current');});}
function spanHeight(){var tallest=0;$('.alternatives span').each(function(){if(tallest<$(this).height())tallest=$(this).height();});$('.alternatives span:visible').attr('style','height:'+tallest+'px');$('.alternatives li').css('height','auto');}
function nextStep(){var currentStep=$('#quiz .questions .single[data-step='+currentStepNum+']');var nextStep=$('#quiz .questions .single[data-step='+(currentStepNum+1)+']');if(nextStep.length===1){if(currentStepNum===0){nextStep.fadeIn(200,function(){spanHeight();});}else{if(isTrivia){nextStep.fadeIn(400,function(){spanHeight();$('html, body').animate({scrollTop:nextStep.offset().top- 40},300);});}else{currentStep.fadeOut(200,function(){nextStep.fadeIn(200,function(){spanHeight();});});}}
if(!isTrivia){$('html, body').animate({scrollTop:$("ul.steps").offset().top},300);}else{if(currentStep.children('.alternatives.right').length){$("ul.steps li[data-step="+currentStepNum+"]").addClass('right');}else{$("ul.steps li[data-step="+currentStepNum+"]").addClass('wrong');}}
$("ul.steps li[data-step="+currentStepNum+"]").addClass('marked');currentStepNum++;$("ul.steps li.current").removeClass('current');$("ul.steps li[data-step="+currentStepNum+"]").addClass('current');}else{if(!isTrivia){getResults();}else{setTimeout(function(){getResults();},500);}}}


function getResults(){
data.id_quiz = ID_QUIZ;
$.ajax({url:BASE_URL+"quiz/resultado/"+ID_QUIZ+'/?cache='+Math.floor(Math.random()*99999),type:'POST',data:encodeURIComponent(JSON.stringify(data)),dataType:'json',contentType:"application/json; charset=utf-8",beforeSend:function(){$('#quiz #loading').show();$('#quiz .quiz-questions').fadeOut(200,function(){$('#quiz .quiz-result').fadeIn(200);});$('html, body').animate({scrollTop:$("#quiz").offset().top},300);},success:function(msg){

$('#quiz #loading').fadeOut(200);
$('#bottomshare').hide();
if ( msg.status == 'OK' )
{
	window.resposta = msg.resposta;
	window.resposta_usuario = msg.titulo;
	$('#descricao-resultado').html(msg.descricao);
	$('#quiz .quiz-result > h1').html(msg.titulo+'<div class="fb-like" data-href="https://www.facebook.com/siteEquiz" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>');
	$('#quiz .quiz-result div.image').css('background-image',' url("'+BASE_URL+'static/'+msg.capa+'")');	
} else
{
	window.location.reload();
}

/* $('#quiz .quiz-result p.text').html('<div class="fb-like" data-href="https://www.facebook.com/siteEquiz" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div> '+msg.description);FB.XFBML.parse(document.getElementById('quiz')); */

},});}