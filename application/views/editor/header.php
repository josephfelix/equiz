<?php
	$segment = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Equiz - Admin</title>
  <link href="<?=BASE_URL_ADMIN?>assets/admin/css/style.default.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?=BASE_URL_ADMIN?>assets/admin/js/html5shiv.js"></script>
  <script src="<?=BASE_URL_ADMIN?>assets/admin/js/respond.min.js"></script>
  <![endif]-->
  
	<script type="text/javascript">
		const BASE_URL = '<?=BASE_URL_ADMIN?>';
	</script>
	<script src="<?=BASE_URL_ADMIN?>assets/admin/js/angular.min.js"></script>
	<script src="<?=BASE_URL_ADMIN?>assets/admin/js/ui-bootstrap-tpls-0.13.0.min.js"></script>
	<script src="<?=BASE_URL_ADMIN?>assets/admin/js/ng-file-upload/ng-file-upload.js"></script>
	<script src="<?=BASE_URL_ADMIN?>assets/admin/js/ng-file-upload/ng-file-upload-shim.js"></script>
	<script src="<?=BASE_URL_ADMIN?>assets/admin/js/editor.js"></script>
</head>

<body ng-app="equiz">
<section>
  
  <div class="leftpanel">        
    <div class="leftpanelinner">      
      <h5 class="sidebartitle">Menu</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
        <li <?=($segment==''||$segment=='quiz')?'class="active"':''?>><a href="<?=BASE_URL_ADMIN?>editor/quiz"><i class="fa fa-plus"></i> <span>Novo quiz</span></a></li>
		
        <li <?=($segment=='listar')?'class="active"':''?>><a href="<?=BASE_URL_ADMIN?>editor/listar"><i class="fa fa-list"></i> <span>Listar quiz</span></a></li>
        <li><a href="<?=BASE_URL_ADMIN?>editor/logout" onclick="return confirm('Tem certeza que deseja sair do painel?')"><i class="fa fa-sign-out"></i> <span>Sair</span></a></li>
      </ul>      
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
    </div><!-- headerbar -->
    
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> Painel do Editor - testequizagora.com</h2>
    </div>