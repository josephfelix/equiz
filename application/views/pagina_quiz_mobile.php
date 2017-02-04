<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=320 user-scalable=0, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="mobile-web-app-capable" content="yes">
<title>TesteQuizAgora | Quiz e Testes de Personalidade</title>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>
<link href="<?=base_url()?>assets/css/mob.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<meta http-equiv="Cache-control" content="public">
<?php
	if ( !$meta_tags )
	{
?>
<meta name="description" content="<?=$quiz->descricao?>" />
<link rel="canonical" href="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>/<?=$resposta ? htmlentities($resposta):''?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?=$quiz->titulo?>" />
<meta property="og:url" content="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>" />
<?php
	list($quiz_width, $quiz_height) = getimagesize('static/' . $quiz->capa);
?>
<meta property="og:image" content="<?=base_url()?>static/<?=$quiz->capa?>" />
<meta property="og:image:width" content="<?=$quiz_width?>" />
<meta property="og:image:height" content="<?=$quiz_height?>" />
<meta property="og:description" content="<?=$quiz->descricao?>" />
<meta property="og:site_name" content="TesteQuizAgora" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@siteEquiz" />
<meta name="twitter:title" content="<?=$quiz->titulo?>" />
<meta name="twitter:description" content="<?=$quiz->descricao?>" />
<meta name="twitter:image" content="<?=base_url()?>static/<?=$quiz->capa?>" />
<meta itemprop="name" content="<?=$quiz->titulo?>" />
<meta itemprop="description" content="<?=$quiz->descricao?>" />
<meta itemprop="image" content="<?=base_url()?>static/<?=$quiz->capa?>" />
<?php
	} else
	{
?>
<meta name="description" content="<?=$meta_tags->descricao?>" />
<link rel="canonical" href="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>/<?=$resposta ? htmlentities($resposta):''?>" />
<meta property="og:type" content="article"/>
<meta property="og:title" content="Eu tirei: <?=$meta_tags->titulo?>! E você? <?=$meta_tags->titulo_quiz?>" />
<meta property="og:url" content="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>" />
<?php
	list($quiz_width, $quiz_height) = getimagesize('static/' . $meta_tags->capa);
?>
<meta property="og:image" content="<?=base_url()?>static/<?=$meta_tags->capa?>" />
<meta property="og:image:width" content="<?=$quiz_width?>" />
<meta property="og:image:height" content="<?=$quiz_height?>" />
<meta property="og:description" content="<?=$meta_tags->descricao?>" />
<meta property="og:site_name" content="TesteQuizAgora" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@siteEquiz" />
<meta name="twitter:title" content="<?=$meta_tags->titulo?>" />
<meta name="twitter:description" content="<?=$meta_tags->descricao?>" />
<meta name="twitter:image" content="<?=base_url()?>static/<?=$meta_tags->capa?>" />
<meta itemprop="name" content="<?=$meta_tags->titulo?>" />
<meta itemprop="description" content="<?=$meta_tags->descricao?>" />
<meta itemprop="image" content="<?=base_url()?>static/<?=$meta_tags->capa?>" />
<?php
	}
?>
<script type="text/javascript">
	const BASE_URL = '<?=base_url()?>';
	const ID_QUIZ = <?=$quiz->id?>;
	const GUID_QUIZ = '<?=$quiz->guid?>';
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-65341771-1', 'auto');
  ga('send', 'pageview');
</script>
</head>
<body class="single-quiz">
<a id="back" href="<?=base_url()?>"><i class="fa fa-home"></i>Ver todos os testes e quizes</a>
<div class="content">
<!-- Mobile 320 -->
	<ins class="adsbygoogle"
		 style="display:inline-block;width:320px;height:50px"
		 data-ad-client="ca-pub-9971217859444592"
		 data-ad-slot="5045957267"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
<div class="wrapper">
<div id="content">
<div id="quiz" class="unselectable">
<div class="quiz-cover step">
<h1 align="center"><?=$quiz->titulo?></h1>
<div class="cover" align="center">
	<img src="<?=base_url()?>static/<?=$quiz->capa?>" width="310" height="232">
</div>
<p class="description"><?=$quiz->descricao?></p>
<span class="big-button">Iniciar o Quiz</span>
</div>
<div class="quiz-questions step">
<h1 align="center"><?=$quiz->titulo?></h1>
	<div class="innerquiz">
		<ul class="steps">
			<?php
				for ( $passo = 1; $passo <= $quiz->passos; $passo++ )
				{
			?>
				<li data-step="<?=$passo?>"><?=$passo?></li>
			<?php
				}
			?>
		</ul>
		<div class="questions">
			<?php
				$cont = 1;
				foreach ( $questoes as $questao )
				{
			?>
			<div class="single" data-step="<?=$cont++?>">
				<div class="question" style="background-image: url('<?=base_url()?>static/<?=$questao->capa?>');">
					<p class="text"><?=$questao->titulo?></p>
				</div>
				<ul class="alternatives text-only big" data-qid="<?=$questao->titulo?>">
					<?php
						foreach ( $questao->opcoes as $opcao )
						{
					?>
						<li data-aid="<?=$opcao->opcao?>"><?=$opcao->opcao?></li>
					<?php
						}
					?>
				</ul>
			</div>
			<?php
				}
			?>
			
			
		</div>
	</div>
</div>
<div class="quiz-result step">
<h1 align="center"></h1>
<div class="innerquiz">
<div class="result">
<div class="image"><span class="redo"><i class="fa fa-refresh"></i>Refazer o Quiz</span></div>
<div id="share-bar">
<a href="#" class="facebook-button" title="Compartilhar no facebook"><i class="fa fa-facebook"></i><span>Compartilhar</span></a>
<a href="#" class="whatsapp-button" title="Compartilhar no whatsapp" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i><span>Compartilhar</span></a>
</div>
<p class="text" id="descricao-resultado"></p>
<div class="fb-like" data-href="https://www.facebook.com/siteEquiz" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div>
<!--<div class="comments"><div class="fb-comments" data-width="100%" data-href="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>" data-numposts="5" data-colorscheme="light"></div></div> !--->
</div>
<div id="loading">
<img src="<?=base_url()?>assets/img/big-loader.gif">
<h1>Calculando resultado...</h1>
</div>
</div>
</div>
<br />
<div class="bottomshare" id="bottomshare">
	<p>Gostou desse Quiz? Compartilhe com seus amigos!</p>
	<br />
	<div id="share-bar">
		<a href="#" class="facebook-button" title="Compartilhar no facebook"><img src="<?=base_url()?>assets/img/32-facebook.png"><span>Compartilhar</span></a>
		<a href="#" class="whatsapp-button" title="Compartilhar no Whatsapp" data-action="share/whatsapp/share"><img src="<?=base_url()?>assets/img/32-whatsapp.png"><span>Compartilhar</span></a>
	</div>
</div>
</div>
<div id="bottom-content"> 

	<?php
	if ( is_array( $quizes ) )
	{
		$len = sizeof( $quizes );
		for ( $count = 0; $count < $len; $count += 5 )
		{
			$quiz1 = isset($quizes[$count]) ? $quizes[$count] : false;
			$quiz2 = isset($quizes[$count+1]) ? $quizes[$count+1] : false;
			$quiz3 = isset($quizes[$count+2]) ? $quizes[$count+2] : false;
			$quiz4 = isset($quizes[$count+3]) ? $quizes[$count+3] : false;
			$quiz5 = isset($quizes[$count+4]) ? $quizes[$count+4] : false;
			$quiz6 = isset($quizes[$count+5]) ? $quizes[$count+5] : false;
			
			if ( $quiz1 )
			{
	?>
	<a href="<?=base_url()?>quiz/<?=$quiz1->categoria?>/<?=$quiz1->guid?>" class="square" title="<?=$quiz1->titulo?>"><img src="<?=base_url()?>static/<?=$quiz1->capa?>" width="100%" height="225" alt="<?=$quiz1->titulo?>"/><span><?=$quiz1->titulo?></span></a>

	<?php
			}
			
			if ( $quiz2 )
			{
	?>
	<a href="<?=base_url()?>quiz/<?=$quiz2->categoria?>/<?=$quiz2->guid?>" class="small-square left" title="<?=$quiz2->titulo?>"><img src="<?=base_url()?>static/<?=$quiz2->capa?>" width="145" height="85" alt="<?=$quiz2->titulo?>"/><span><?=$quiz2->titulo?></span></a>
	<?php
			}
			
			if ( $quiz3 )
			{
	?>
	<a href="<?=base_url()?>quiz/<?=$quiz3->categoria?>/<?=$quiz3->guid?>" class="small-square" title="<?=$quiz3->titulo?>"><img src="<?=base_url()?>static/<?=$quiz3->capa?>" width="145" height="85" alt="<?=$quiz3->titulo?>"/><span><?=$quiz3->titulo?></span></a>
	<?php
			}
	?>
	
	<div align="center">
		<!-- Adsense -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- 300x250 -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:300px;height:250px"
			 data-ad-client="ca-pub-9971217859444592"
			 data-ad-slot="7859822861"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	
	<?php
			if ( $quiz4 )
			{
	?>
	<a href="<?=base_url()?>quiz/<?=$quiz4->categoria?>/<?=$quiz4->guid?>" class="square" title="<?=$quiz4->titulo?>"><img src="<?=base_url()?>static/<?=$quiz4->capa?>" width="300" height="225" alt="<?=$quiz4->titulo?>"/><span><?=$quiz4->titulo?></span></a>
	<?php
			}
			
			if ( $quiz5 )
			{
	?>
	<a href="<?=base_url()?>quiz/<?=$quiz5->categoria?>/<?=$quiz5->guid?>" class="small-square left" title="<?=$quiz5->titulo?>"><img src="<?=base_url()?>static/<?=$quiz5->capa?>" width="145" height="85" alt="<?=$quiz5->titulo?>"/><span><?=$quiz5->titulo?></span></a>
	<?php
			}
			
			if ( $quiz6 )
			{
	?>
	<a href="<?=base_url()?>quiz/<?=$quiz6->categoria?>/<?=$quiz6->guid?>" class="small-square" title="<?=$quiz6->titulo?>"><img src="<?=base_url()?>static/<?=$quiz6->capa?>" width="145" height="85" alt="<?=$quiz6->titulo?>"/><span><?=$quiz6->titulo?></span></a>
	<?php
			}
		}
	}
	?>

	<div align="center">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- 300x250 -->
		<ins class="adsbygoogle"
			 style="display:inline-block;width:300px;height:250px"
			 data-ad-client="ca-pub-9971217859444592"
			 data-ad-slot="7859822861"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>

	<div id="main-loader"><img src="<?=base_url()?>assets/img/big-loader.gif"></div>
</div>
<div style="clear:both;"></div>
</div>
</div>
<script>
var quiz_id				= <?=$quiz->id?>;
var quiz_url    		= "http:\/\/testequizagora.com\/quiz\/<?=$quiz->categoria?>\/<?=$quiz->guid?>";
window.resposta         = '<?=$resposta ? htmlentities($resposta):''?>';
window.resposta_usuario = '';
window.titulo_quiz      = '<?=addslashes($quiz->titulo)?>';

$(window).scroll(function(){
    if ($('.trivia .innerquiz').length){
		if ($(window).scrollTop() > $('.trivia .innerquiz').offset().top){
			$('.trivia .innerquiz').addClass('sticky');
		} else {
			$('.trivia .innerquiz').removeClass('sticky');
		}
	}
});

$('.whatsapp-button').click(function(e){
	e.preventDefault();
	shareWhatsapp(encodeURIComponent(quiz_url+'/'+window.resposta));
});
$('.facebook-button').click(function(e){
    e.preventDefault();
	shareFB(encodeURIComponent(quiz_url+'/'+window.resposta));
});
$('.twitter-button').click(function(e){
    e.preventDefault();
	shareTW(encodeURIComponent(quiz_url+'/'+window.resposta));
});
$('#quiz.list .img-wrapper .facebook').click(function(e){
    e.preventDefault();
    shareFB(quiz_url+'/'+window.resposta);
});
$('#quiz.list .img-wrapper .twitter').click(function(e){
    e.preventDefault();
    shareTW(quiz_url+'/'+window.resposta);
});

</script>
<script src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="<?=base_url()?>assets/js/play.js"></script>
<script>
/* var scrollPage = 2;
var scrollTmp = true;
$(document).ready(function(){
	$(window).scroll(function(){
		if ($(window).scrollTop() > $(document).height() - $(window).height() - 800){
			if(scrollTmp){
				scrollTmp = false;
				loadMore();
			}
		}
	});
});
function loadMore() {
	$('#main-loader').show();
	$.ajax({
		type 	: "POST",
		url		: "/a/load-more",
		data 	: {page:scrollPage, offset:6},
		dataType: 'json',
		success : function(response){
			if(response.value!=''){
				scrollTmp = true;
				scrollPage++;
				$('#main-loader').before(response.value);
			}
			$('#main-loader').hide();
		}
	});
} */
</script> </div>
<script type='application/javascript' src='<?=base_url()?>assets/js/fc.min.js'></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/mob.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=1487328804892979";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Mobile 320 -->
<ins class="adsbygoogle"
	 style="display:none;width:320px;height:50px"
	 data-reactive-ad-format="1"
	 data-ad-client="ca-pub-9971217859444592"
	 data-ad-slot="5045957267"
	 data-ad-channel="GoogleAnchorAd"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</body>
</html>