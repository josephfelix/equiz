<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Quiz - Admin</title>

  <link href="<?=BASE_URL_ADMIN?>assets/admin/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?=BASE_URL_ADMIN?>assets/admin/js/html5shiv.js"></script>
  <script src="<?=BASE_URL_ADMIN?>assets/admin/js/respond.min.js"></script>
  <![endif]-->
</head>
<body class="signin">
<section>
    <div class="signinpanel">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3 align="center"><strong>Sistema de quiz - Login</strong></h5>
                <div class="mb20"></div>
                <form method="post" action="<?=BASE_URL_ADMIN?>editor/login">
                    <h4 class="nomargin">Entrar</h4>
                    <p class="mt5 mb20">Fa&ccedil;a login para acessar este painel</p>
                
                    <input type="text" class="form-control uname" placeholder="Login" name="login" />
                    <input type="password" class="form-control pword" placeholder="Senha" name="senha" />
					<?php
						if ( $error )
						{
					?>
						<p class="text-danger">Erro: <?=$error?></p>
					<?php
						}
					?>
                    <button class="btn btn-success btn-block">Entrar</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
    </div><!-- signin -->
  
</section>
</body>
</html>