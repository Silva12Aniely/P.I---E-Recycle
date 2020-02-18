<!DOCTYPE html>
<html>
<head>
	<title>Sla</title>
</head>
<body>
	<?php 
		include "include/conexao.php";	

		$msg = false;


		if (isset($_FILES['arquivo'])) {

			$extensão = strtolower(substr($_FILES['arquivo']['name'], -4));
			$novo_nome = md5(time()) . $extensão;
			$diretorio = "upload/";

			move_uploaded_file($_FILES["arquivo"]["tmp_name"], $diretorio.$novo_nome);

			$sql = "INSERT INTO teste (codigo, imagem, data) VALUES (null,LOAD_FILE('$novo_nome'), NOW());";

			if ($conn->query($sql) === TRUE) {
				$last_id = $conn->insert_id;
				$msg = "Arquivo enviado com sucesso";
			}else{
				$msg = "Falha ao enviar";
			}
		}

		/*$sql = "SELECT * FROM TESTE";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {		
			while ($row = $result->fetch_assoc()) {
				echo "<img src='upload/$row[IMAGEM]'>";
			}
		}*/
	?>
	<?php if ($msg != false) {
		echo "<p>$msg</p>";
	} ?>
	<form action="teste.php" method="POST" enctype="multipart/form-data">
		
		<input type="file" name="arquivo">

		<input type="submit" name="enviar">

	</form>

	
</body>
</html>