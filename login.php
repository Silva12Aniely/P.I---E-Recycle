<!DOCTYPE html>
<html>
<head>
	<title>E-Recycle - Login</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="imagens/E-RecycleLogo1.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/script.js"></script>
</head>
<body>
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
	<div class="barFixed">
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
	<center>
		<div class="border_tittle">Login</div>
		<div class="cadastro_login">
			<div class="container" >
				<div class="row" style="margin-top: 130px;">
					<form action="" method="POST">
						<div class="form-row">
							<div class="form-group col-sm-5" style="border-right: 2px #000 solid;">
								<label>Usuário ou E-Mail: </label>
								<input type="text" name="user" class="form-control">
								<br>
								<label>Senha: </label>
								<input type="password" name="senha" class="form-control">
								<br>
								<?php 
									// Verificação do email e senha se foram digitados corretamente 
									include "include/conexao.php";
										if (isset($_POST["entrar"])) {
											$sql = "SELECT email, senha FROM usuarios 
												WHERE email = '". $_POST["user"] ."' AND senha ='". $_POST["senha"] . "'; ";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
												while ($row = $result->fetch_assoc()) {
													$_SESSION["user"] = $row["email"];
													$_SESSION["codColetor"] = $row["CODCOLETORES"];
													$_SESSION["codCliente"] = $row["CODCLIENTES"];
													header('location:home.php');
												}
											}
											else {
												echo "<h6 style='color: red;'>Email ou senha digitado  incorretamente.</h6><br>";
											}
										}
										$conn->close(); 
									?>
								<button class="btn btn-success" name="entrar"> Entrar </button>
								<br>
							</div>
						</div>	
					</form>
					<div class="logo col-sm-6">
						<img src="imagens/E-RecycleLogo.png" width="100%">
					</div>
				</div>
			</div>
		</div>
	</center>	

	<footer id="rodape" style="position: fixed;">
		&copy; 2019 Copyright - Todos os direitos reservados. Site by <i>E-Recycle</i>.
	</footer>
</body>
</html>