<!DOCTYPE html>
<html>
<head>
	<title>E-Recycle - Artigos</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Allan|Just+Another+Hand|Patrick+Hand+SC&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="imagens/E-RecycleLogo1.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style_PerfilUsu.css">
	<script src="js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
				$("#border").animate({
    				opacity: '1',
    				fontSize: '3em'
  				},2000);

  				$("#border").animate({
    				opacity: '0.1',
    				fontSize: '3em'
  				},3000);

  				$("#border").animate({
    				opacity: '1',
    				fontSize: '1.5em'
  				},2000);


  				$("#fadeTitulo").animate({
    				opacity: '1',
    				size: '30px'
  				},2000);

  				$("#fadeTitulo").animate({
    				opacity: '1',
    				size: '30px'
  				},2000);
			



			$("#show").mouseenter(function(){
				$("#show").hide(2000);
			});
			$("#show2").mouseleave(function(){
				$("#show").show(1000);
			});

		});
	
	</script>
</head>
<body>
	<div class="barFixed">
	<?php 
		session_start();
		if ($_SESSION["user"] == "NULL") {
			echo "<div class='border codrops-top'>
					<span class='right' ><a class='codrops-icon codrops-icon-drop' href='cadastro.php'><span class='glyphicon glyphicon-user'></span> Cadastro</a></span>
					<span class='right' id='login'><a class='codrops-icon codrops-icon-drop' href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></span>
				</div>";
		}else {
			echo "<div class='border codrops-top'>
					<span class='right' id='login'><a class='codrops-icon codrops-icon-drop' href='PerfilUsu.php'><span class='glyphicon glyphicon-user'></span> ". $_SESSION["user"] ." </a></span>
					<span class='right' id='login'><a class='codrops-icon codrops-icon-drop' href='sair.php'><span class='glyphicon glyphicon-log-out'></span> Sair </a></span>
				</div>";
		}
	?>

	
	<div class="backgd container-fluid">
		<div class="rows">
			<nav class="navbar">
				<div class="navbar-header columns">
					<button class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div>
						<a href="home.php"><img src="imagens/E-RecycleLogo.png" width="150"></a>
					</div>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="home.php">Home</a></li>
						<li><a href="coletores.php">Coletores</a></li>
						<li><a href="tutoriais.php">Tutoriais</a></li>
						<li><a href="artigos.php">Artigos</a></li>
						<li><a href="sobre.php">Sobre nós</a></li>
					</ul>
					<a href="#" class="float">
						<span style="margin-top: 38%;" class="glyphicon glyphicon-menu-up"></span>
					</a>
				</div>
			</nav>
		</div>
	</div>
</div>
		<img src="imagens/bannerUsu.jpg" width="100%">
	<div id="fadeTitulo" class="title">
		Área do Usuário
	</div>	
	<div id="border" class="border_tittle">Atualize suas Informações:</div>

<div class="block">
	<div style="margin-top: 10px;">
		
			<div class="FotoCircle Foto">
				<center><img id="show" src="imagens/fotoPerfil.png" ></center>
				<center><a href="#"><img style="width: 100%;" id="show2" src="imagens/addFoto.png"></center></a>
			</div>
		
	</div>

		<div id="MudacorBloco" class="blocoUsu">
			
			<label>Nome:</label>
			<input id="nome" type="text" name="">
			<br><br>
			<label>CPF:</label>
			<input id="cpf" type="text" name="">
			<label>Telefone:</label>
			<input id="telefone" type="text" name="">
			<hr>
			<label>E-mail:</label>
			<input id="email" type="text" name="">
			<label>Confirmar E-mail:</label>
			<input id="email" type="text" name="">
			<br><br>
			<label>Senha:</label>
			<input id="senha"type="text" name="">
			<label>Confirmar Senha:</label>
			<input id="senha" type="text" name="">



		</div>
<br>
		<div id="MudacorBloco" class="blocoUsu">
			
			<label>Rua:</label>
			<input id="rua" type="text" name="">
			<br><br>
			<label>Bairro:</label>
			<input id="bairro" type="text" name="">
			<label>Número:</label>
			<input id="numero" type="text" name="">
			<label>CEP:</label>
			<input id="cep" type="text" name="">
			<label>Complemento:</label>
			<input id="Complemento" type="text" name="">
			<hr>
			<label>Cidade:</label>
			<input id="cidade" type="text" name="">
			<br><br>
			<label>Estado:</label>
			<input id="estado" type="text" name="">

		</div>

		<div class="botaoUsu">
			<button>Atualizar informações</button>
		</div>
		
</div>






































	<footer id="rodape">
		&copy; 2019 Copyright - Todos os direitos reservados. Site by <i>E-Recycle</i>.
	</footer>
</body>
</html>