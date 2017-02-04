<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
	<head>
		<meta charset="UTF-8">
		<title>TesteQuizAgora | Quiz e Testes de Personalidade</title>
		<link href="<?=base_url()?>assets/css/quiz.css" media="screen" rel="stylesheet" type="text/css">
		<link href="<?=base_url()?>assets/css/grid.css" media="screen" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>
		<meta http-equiv="Cache-control" content="public">
		<?php
			if ( !$meta_tags )
			{
		?>
		<meta name="description" content="<?=$quiz->descricao?>" />
		<link rel="canonical" href="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>" />
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
		<meta property="og:url" content="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>/<?=$resposta ? htmlentities($resposta):''?>" />
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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script type="text/javascript">
			const BASE_URL = '<?=base_url()?>';
			const ID_QUIZ = <?=$quiz->id?>;
			const GUID_QUIZ = '<?=$quiz->guid?>';
			const CATEGORIA_QUIZ = '<?=$quiz->categoria?>';
			window.id_resposta = '<?=$resposta ? htmlentities($resposta):''?>';
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
	<body class="index">
		<div id="fb-root"></div>
		
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.4&appId=1487328804892979";
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
					<div id="top-content">
						<div class="row">
							<div class="side1">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 align="center" id="titulo"><strong><?=$quiz->titulo?></strong></h3>
									</div>
									<div class="panel-body panel-quiz" align="center" id="quiz">
										<div class="quiz-cover step">
											<div class="cover">
												<img src="<?=base_url()?>static/<?=$quiz->capa?>" width="100%" height="435" />
											</div>
											<p class="description"><?=$quiz->descricao?></p>
											<button type="button" id="iniciar-quiz" class="btn btn-success btn-block btn-iniciar-quiz">
												INICIAR O QUIZ
											</button>
										</div>
										
										
										<div class="quiz-questions step">
											<!--<span class="by">Criado em 10/07/2015</span>-->
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
															<p class="text">
																<?=$questao->titulo?>
															</p>
														</div>
														<ul class="alternatives text-only small" data-qid="<?=$questao->titulo?>">
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
											<h1></h1>
											<div class="innerquiz">
												<div class="result">
													<div class="image">
														<span class="redo"><i class="fa fa-refresh"></i>Refazer o Quiz</span>
													</div>
													<div id="share-bar">
													<a href="#" class="facebook-button" title="Compartilhar no facebook"><img src="<?=base_url()?>assets/img/32-facebook.png"><span>Compartilhar no Facebook</span></a>
													<a href="#" class="twitter-button" title="Compartilhar no twitter"><img src="<?=base_url()?>assets/img/32-twitter.png"><span>Compartilhar no Twitter</span></a>
													</div>
											
													<p class="text" id="descricao-resultado"></p>
													<div class="fb-like" data-href="https://www.facebook.com/siteEquiz" data-layout="button" data-action="like" data-show-faces="false" data-share="false"></div><div class="comments">
														<!--<div class="fb-comments fb_iframe_widget" data-width="620" data-href="<?=base_url()?>quiz/<?=$quiz->categoria?>/<?=$quiz->guid?>" data-numposts="5" data-colorscheme="light" fb-xfbml-state="rendered"></div>-->
													</div>
												</div>
												<div id="loading">
													<img src="<?=base_url()?>assets/img/big-loader.gif">
													<h1>Calculando resultado...</h1>
												</div>
											</div>
										</div>
										
										<div class="bottomshare" id="bottomshare">
										<p>Gostou desse Quiz? Compartilhe com seus amigos!</p>
										<div id="share-bar">
										<a href="#" class="facebook-button" title="Compartilhar no facebook"><img src="<?=base_url()?>assets/img/32-facebook.png"/><span>Compartilhar no Facebook</span></a>
										<a href="#" class="twitter-button" title="Compartilhar no twitter"><img src="<?=base_url()?>assets/img/32-twitter.png"/><span>Compartilhar no Twitter</span></a>
										</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="side2">
								<div class="sidebox ads social" style="float:right;width: 300px;">
									<div class="fb-page" data-href="https://www.facebook.com/siteEquiz" data-width="300" data-height="50" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/siteEquiz"><a href="https://www.facebook.com/siteEquiz">Facebook</a></blockquote></div></div>
									<hr>
									<h3>Nossas redes sociais</h3>
									<a href="https://www.facebook.com/siteEquiz" target="_blank" class="button fbpage">Siga Nosso Facebook</a><a href="https://twitter.com/twitter" target="_blank" class="button twpage">Siga Nosso Twitter</a>
									
									<hr />
									<br />
									<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Sidebar 300x600 -->
									<ins class="adsbygoogle"
										 style="display:inline-block;width:300px;height:600px"
										 data-ad-client="ca-pub-9971217859444592"
										 data-ad-slot="8250102469"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
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
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?=base_url()?>assets/js/equiz.js"></script>
		<script type="text/javascript" src="<?=base_url()?>assets/js/share.js"></script>
	</body>
</html>