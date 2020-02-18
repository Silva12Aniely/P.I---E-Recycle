<!DOCTYPE html>
<html>
<head>
	<title>E-Recycle - Coletores</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Allan|Just+Another+Hand|Patrick+Hand+SC&display=swap" rel="stylesheet"> 
	<link rel="icon" type="image/png" href="imagens/E-RecycleLogo1.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
				
				//sobre nós===================================================
  				$("#border").animate({
    				opacity: '1',
    				fontSize: '1.5em'
  				},2000);

  				

  				$("#border").animate({
    				opacity: '1',
    				fontSize: '1.9em'
  				},2000);

  				//============================================================	
				

				//video sobre o projeto ======================================
  				$("#border2").animate({
    				opacity: '1',
    				fontSize: '1.5em'
  				},2000);

  				

  				$("#border2").animate({
    				opacity: '1',
    				fontSize: '1.9em'
  				},2000);

  				//============================================================
  				$("#fadeTitulo").animate({
    				opacity: '1',
    				size: '30px'
  				},2000);

  				$("#fadeTitulo").animate({
    				opacity: '1',
    				size: '30px'
  				},2000);

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
					
				</div>
			</nav>
		</div>
	</div>
	</div>
		
	<div class=".banner"></div>
	<img src="imagens/bannert.jpg" width="100%">
		
	<div id="fadeTitulo" class="title">
		Coletores
	</div>
<div id="border" class="border_tittle">Informações dos Coletores</div>
	
	

	<div class="container">
		<form action="" method="POST">
			<center>
				<div style="width: 100%;background-color: white;padding: 10px;margin:2%;border-radius: 20px;">										
					<h3><b>Procurar por coletores mais próximos:</b></h3>
					<select name='cboZona' class="btn btn-primary" required>
						<option value='1'>
							ZONA SUL - Santo Amaro
						</option>
						<option value='2'>
							ZONA SUL - Socorro
						</option>
					</select>&nbsp;<button class="btn btn-primary" name="procurar"><span class="glyphicon glyphicon-search"></span>&nbsp;BUSCAR</button>
				</div>
			</center>
		</form>

		<center>
	 		<?php 
	 			include "include/conexao.php";

	 			if (isset($_POST["procurar"])) {
	 				$sql = "SELECT * FROM COLETORES WHERE CODREGIOES = ".$_POST["cboZona"].";";
		 			$result = $conn->query($sql);

		 			if ($result->num_rows > 0) {		
						while ($row = $result->fetch_assoc()) {
							echo "<center>
								<div class='col-sm-4'>
									<div class='flip-container' ontouchstart='this.classList.toggle('hover');'>
								 		<div class='flipper'>
								 			<div class='front'>
								 				<center>
								 					<img class='imgPer' src='imagens/jordan.jpg'>
								 				</center>
								 			</div>

								 			<div class='back'>
								 				<center>
								 					<h1 class='nome'><b>$row[NOME]</b></h1>
								 					<hr>
								 					<p class='numero'>$row[TELEFONE]</p>
								 					<h4><b><i> AVALIAÇÃO: </i></b></h4>
								 					<p class='rating'>
								 						<span>★</span>
								 						<span>★</span>
								 						<span>★</span>
								 						<span>★</span>
								 						<span>★</span>
								 					</p>
								 					<hr>
								 					<p class='email'>$row[EMAIL]</p>
								 				</center>
								 			</div>
								 		</div>		
								 	</div>
								 </div>
							</center>";
						}
					}
	 			}
	 			
	 		?>
	 	</center>


	</div>
</div>
<br><br>
<footer id="rodape" style="position: fixed;">
	&copy; 2019 Copyright - Todos os direitos reservados. Site by <i>E-Recycle</i>.
</footer>
</body>
</html>