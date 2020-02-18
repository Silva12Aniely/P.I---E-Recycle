<!DOCTYPE html>
<html>
<head>
	<title>E-Recycle - Cadastro</title>
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

	<div class="border_tittle">Cadastro</div>
	<div class="cadastro_login">
		<div class="container" >
			<div class="row">
				<div class="form-row">
					<div class="form-group col-sm-12">
						<center>
							<form action="" method="POST">
								<legend>Qual seu tipo de usuário?</legend>
								<label>Coletor</label>&nbsp;<input type="radio" name="check" value="coletor" required>
								&nbsp;<label>Cliente</label>&nbsp;<input type="radio" name="check" value="cliente" required> 
								<br>
								<button class='btn btn-success' name='btnContinuar'> Continuar </button>
								<br>
							</form>
						</center>
						<form action="#" method="POST">		
							<?php 
								// Verificando o tipo de usuário antes de fazer o cadastro.
								// English version: Verifying the type of user before registering.
								if (isset($_POST["btnContinuar"])) {
									$_SESSION["cliente"] = false;
									$_SESSION["coletor"] = false;
									if ($_POST["check"] == "cliente") {
										$_SESSION["cliente"] = true;
										include "include/cadastroCli.php";
									}else{
										$_SESSION["coletor"] = true;
										include "include/cadastroCol.php";
									}
								}
																			 
								// Cadatrando usuário no banco.
								// English version: Created user in the bank.

								if (isset($_POST["btnCadastrar"])) {
									include "include/conexao.php";
									if (($_POST["txtEmail"] == $_POST["txtCemail"]) AND ($_POST["txtSenha"] === $_POST["txtCsenha"])) {
										if ($_SESSION["cliente"] == true) {

											// Cadastrando clientes.
											$sql = "INSERT INTO CLIENTES (NOME, EMAIL, TELEFONE, CPF)
												VALUES ('$_POST[txtUser]','$_POST[txtEmail]','$_POST[txtTel]', '$_POST[txtCpf]')";

											if ($conn->query($sql) === TRUE) {
												$last_id = $conn->insert_id;
											} 

											$sql = "SELECT * FROM clientes WHERE EMAIL = '$_POST[txtEmail]'";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {		
												while ($row = $result->fetch_assoc()) {
													$cod = $row["CODCLIENTES"];
												}
											}

											// Inserindo o cliente na tabela usuário.
											$sql = "INSERT INTO USUARIOS (CODCLIENTES, EMAIL, SENHA, CODTIPO)
											VALUES ($cod,'$_POST[txtEmail]','$_POST[txtSenha]', 2)";

											if ($conn->query($sql) === TRUE) {
												$last_id = $conn->insert_id;
											}

											header('location:login.php');
										}
										if ($_SESSION["coletor"] == true) {

											// Cadastrando coletores.
											$sql = "INSERT INTO COLETORES (NOME, EMAIL, TELEFONE, CPF, CODREGIOES, AVALIACAO)
												VALUES ('$_POST[txtUser]','$_POST[txtEmail]','$_POST[txtTel]', '$_POST[txtCpf]', '$_POST[cboZona]', 0.0)";

											if ($conn->query($sql) === TRUE) {
												$last_id = $conn->insert_id;
											}

											$sql = "SELECT * FROM COLETORES WHERE EMAIL = '$_POST[txtEmail]'";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {		
												while ($row = $result->fetch_assoc()) {
													$cod = $row["CODCOLETORES"];
												}
											}

											// Inserindo o cliente na tabela usuário.
											$sql = "INSERT INTO USUARIOS (CODCOLETORES, EMAIL, SENHA,CODTIPO) 
											VALUES ($cod,'$_POST[txtEmail]','$_POST[txtSenha]', 3)";

											if ($conn->query($sql) === TRUE) {
												$last_id = $conn->insert_id;
											}

											header('location:login.php');
										}
									}else{
										echo "<h6 style='color: red;'>E-Mail ou senha não correspondentes, Tente Novamente.</h6>";						
										if ($_SESSION["cliente"] == true) {
											echo "<form action='cadastro.php' method='POST'>";
											echo include "include/cadastroCli.php";
										}else{
											echo "<form action='cadastro.php' method='POST'>";
											echo include "include/cadastroCol.php";
										}

									}														
									$conn->close();
								}
							?>
						</form>
					</div>			
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
	<footer id="rodape" style="position: fixed;">
		&copy; 2019 Copyright - Todos os direitos reservados. Site by <i>E-Recycle</i>.
	</footer>
</body>
</html>