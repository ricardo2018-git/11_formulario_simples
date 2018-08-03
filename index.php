<!DOCTYPE HTML>
<html>
	<head>
		
	</head>
	<body>
		<?php 
			#Declara as variáveis e define seu valor de vazio..
			$nome = $email = $site = $obs = $sexo = "";

			if($_SERVER["REQUEST_METHOD"] == "POST"){
				
				$nome  = filtro($_POST["nome"]);
				$email = filtro($_POST["email"]);
				$site  = filtro($_POST["site"]);
				$obs   = filtro($_POST["texto"]);
				$sexo  = filtro($_POST["sexo"]);
			}

			function filtro($data){
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			Nome: <input type="text" name="nome"/><br/>
			E-mail: <input type="email" name="email"/><br/>
			site: <input type="text" name="site"/><br/>
			Obs: <textarea name="texto" rows="5" cols="40"/></textarea><br/>
			sexo: <br/>
			<input type="radio" name="sexo" value="f">Feminino
			<input type="radio" name="sexo" value="m">Masculino
			<input type="radio" name="sexo" value="o">Outro(as)
			<br/>
			<input type="submit" name="submit" value="Enviar">
		</form>

		<?php
			echo "<h2>O seus dados</h2>";
			echo $nome;
			echo "<br/>";
			echo $email;
			echo "<br/>";
			echo $site;
			echo "<br/>";
			echo $obs;
			echo "<br/>";
			echo $sexo;
		?>
	</body>
</html>

