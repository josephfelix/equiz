<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<title>TesteQuizAgora | Quiz e Testes de Personalidade</title>
		<link href="<?=base_url()?>assets/css/quiz.css" media="screen" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>
		<meta name="description" content="No TesteQuizAgora você pode encontrar os mais divertidos quizzes da internet."/>
		<meta property="og:type" content="article"/>
		<meta property="og:title" content="TesteQuizAgora - Sua fonte de quizzes divertidos"/>
		<meta property="og:url" content="<?=base_url()?>tag/<?=$categoria?>"/>
		<meta property="og:image" content="<?=base_url()?>assets/img/share_logo.png"/>
		<meta property="og:image:width" content="600"/>
		<meta property="og:image:height" content="315"/>
		<meta property="og:description" content="No TesteQuizAgora você pode encontrar os mais divertidos quizzes da internet."/>
		<meta property="og:site_name" content="TesteQuizAgora"/>
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@siteEquiz">
		<meta name="twitter:title" content="Sua fonte de quizzes divertidos">
		<meta name="twitter:description" content="No TesteQuizAgora você pode encontrar os mais divertidos quizzes da internet.">
		<meta name="twitter:image" content="<?=base_url()?>assets/img/share_logo.png">
		<meta itemprop="name" content="Sua fonte de quizzes divertidos">
		<meta itemprop="description" content="o TesteQuizAgora você pode encontrar os mais divertidos quizzes da internet.">
		<meta itemprop="image" content="<?=base_url()?>assets/img/share_logo.png">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-65341771-1', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>
	<body class="index">
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=247725688664364";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<div class="content">
			<div id="topbar">
				<div class="wrapper">
					<h1><a href="<?=base_url()?>" title="TesteQuizAgora, sua fonte de testes e quizzes divertidos"><span class="name">TesteQuizAgora</span></a></h1>
					<ul id="menu">
						<li>
							<a href="#">Pop</a>
							<ul>
								<li><a href="<?=base_url()?>tag/famosos" title="Famosos">Famosos</a></li>
								<li><a href="<?=base_url()?>tag/tv" title="Tv">Tv</a></li>
								<li><a href="<?=base_url()?>tag/filmes" title="Filmes">Filmes</a></li>
								<li><a href="<?=base_url()?>tag/musicas" title="Músicas">Músicas</a></li>
								<li><a href="<?=base_url()?>tag/seriados" title="Seriados">Seriados</a></li>
							</ul>
						</li>
						
						<li>
							<a href="#">Divertido</a>
							<ul>
								<li><a href="<?=base_url()?>tag/fofo" title="Fofo">Fofo</a></li>
								<li><a href="<?=base_url()?>tag/engracado" title="Engraçado">Engraçado</a></li>
								<li><a href="<?=base_url()?>tag/retro" title="Retrô">Retrô</a></li>
								<li><a href="<?=base_url()?>tag/comida" title="Comida">Comida</a></li>
								<li><a href="<?=base_url()?>tag/amor" title="Amor">Amor</a></li>
								<li><a href="<?=base_url()?>tag/animais" title="Animais">Animais</a></li>
							</ul>
						</li>
					
						<li>
							<a href="#">Estilo</a>
							<ul>
								<li><a href="<?=base_url()?>tag/moda" title="Moda">Moda</a></li>
								<li><a href="<?=base_url()?>tag/saude" title="Saúde">Saúde</a></li>
								<li><a href="<?=base_url()?>tag/fitness" title="Fitness">Fitness</a></li>
								<li><a href="<?=base_url()?>tag/beleza" title="Beleza">Beleza</a></li>
							</ul>
						</li>
					
						<li>
							<a href="#">Geral</a>
							<ul>
								<li><a href="<?=base_url()?>tag/artes" title="Artes">Artes</a></li>
								<li><a href="<?=base_url()?>tag/livros" title="Livros">Livros</a></li>
								<li><a href="<?=base_url()?>tag/jogos" title="Jogos">Jogos</a></li>
								<li><a href="<?=base_url()?>tag/tecnologia" title="Tecnologia">Tecnologia</a></li>
								<li><a href="<?=base_url()?>tag/esportes" title="Esportes">Esportes</a></li>
								<li><a href="<?=base_url()?>tag/mundo" title="Mundo">Mundo</a></li>
								<li><a href="<?=base_url()?>tag/politica" title="Política">Política</a></li>
								<li><a href="<?=base_url()?>tag/anime" title="Anime">Anime</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="wrapper">
				<div id="content">
					<h2 class="tagtitle"><?=ucfirst($categoria)?></h2>
					<div id="top-content">
						<?php
							if ( $quiz_mais_visitado )
							{
						?>
						<!-- Quiz mais visitado -->
						<a href="<?=base_url()?>quiz/<?=$quiz_mais_visitado->categoria?>/<?=$quiz_mais_visitado->guid?>" class="big-square" title="<?=$quiz_mais_visitado->titulo?>" style="background-image:url('<?=base_url()?>static/<?=$quiz_mais_visitado->capa?>');"><span class="title"><?=$quiz_mais_visitado->titulo?></span></a>
						<!-- Fim quiz mais visitado -->
						<?php
							}
						?>
						
						<div class="sidebox ads social" style="float:right;width: 300px;">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- Sidebar 300x600 -->
                            <ins class="adsbygoogle"
                                 style="display:inline-block;width:300px;height:250px"
                                 data-ad-client="ca-pub-3626138419406207"
                                 data-ad-slot="7235813975"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
						
						
						<?php
							if ( is_array( $quizes ) )
							{
								$len = sizeof( $quizes );
								for ( $count = 0; $count < $len; $count += 6 )
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
							<a href="<?=base_url()?>quiz/<?=$quiz1->categoria?>/<?=$quiz1->guid?>" class="square left" title="<?=$quiz1->titulo?>"><img src="<?=base_url()?>static/<?=$quiz1->capa?>" width="300" height="170" alt="<?=$quiz1->titulo?>"/><span class="title"><?=$quiz1->titulo?></span></a>
						<?php
									}
										
									if ( $quiz2 )
									{
						?>
							<a href="<?=base_url()?>quiz/<?=$quiz2->categoria?>/<?=$quiz2->guid?>" class="square" title="<?=$quiz2->titulo?>"><img src="<?=base_url()?>static/<?=$quiz2->capa?>" width="300" height="170" alt="<?=$quiz2->titulo?>"/><span class="title"><?=$quiz2->titulo?></span></a>
						<?php
									}
										
									if ( $quiz3 )
									{
						?>
							<a href="<?=base_url()?>quiz/<?=$quiz3->categoria?>/<?=$quiz3->guid?>" class="square" title="<?=$quiz3->titulo?>"><img src="<?=base_url()?>static/<?=$quiz3->capa?>" width="300" height="170" alt="<?=$quiz3->titulo?>"/><span class="title"><?=$quiz3->titulo?></span></a>
						<?php
									}
										
									if ( $quiz4 )
									{
						?>
							<a href="<?=base_url()?>quiz/<?=$quiz4->categoria?>/<?=$quiz4->guid?>" class="big-square" title="<?=$quiz4->titulo?>" style="background-image:url('<?=base_url()?>static/<?=$quiz4->capa?>');"><span class="title"><?=$quiz4->titulo?></span></a>
						<?php
									}
										
									if ( $quiz5 )
									{
						?>
							<a href="<?=base_url()?>quiz/<?=$quiz5->categoria?>/<?=$quiz5->guid?>" class="smallsquare" title="<?=$quiz5->titulo?>" style="background-image:url(<?=base_url()?>static/<?=$quiz5->capa?>);"><span class="title"><?=$quiz5->titulo?></span></a>
						<?php
									}
										
									if ( $quiz6 )
									{
						?>
							<a href="<?=base_url()?>quiz/<?=$quiz6->categoria?>/<?=$quiz6->guid?>" class="smallsquare" title="<?=$quiz6->titulo?>" style="background-image:url(<?=base_url()?>static/<?=$quiz6->capa?>);"><span class="title"><?=$quiz6->titulo?></span></a>
						<?php
									}
								}
							}
						?>
						<div style="clear:both;"></div>
					</div>
					<div id="main-loader"><img src="<?=base_url()?>assets/img/img-loader.gif"></div>
				</div>
			</div>
		</div>
	</body>
</html>