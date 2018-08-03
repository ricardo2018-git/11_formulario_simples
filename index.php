<!DOCTYPE HTML>
<html>
	<head>
		
	</head>
	<body>
		<?php 
			# Declara as variáveis e define seu valor de vazio..
			$nome = $email = $site = $obs = $sexo = "";

			# Declara as variáveis que vai ser campos obrigatórios..
			$nomeErro = $emailErro = $siteErro = $obsErro = $sexoErro = "";

			# Verifica se os dados foi enviado via POST..
			if($_SERVER["REQUEST_METHOD"] == "POST"){
				
				if(empty($_POST["nome"])){	#Verifica se a var esta vazia..
					$nomeErro = "*Obrigatório";	
				}else{
					$nome  = filtro($_POST["nome"]);	#Antes, de guardar filtra
				}
				
				if(empty($_POST["email"])){	#Verifica se a var esta vazia..
					$emailErro = "*Obrigatório";
				}else{
					$email = filtro($_POST["email"]);	#Antes, de guardar filtra
				}
				
				if(empty($_POST["site"])){	#Verifica se a var esta vazia..
					$siteErro = "";
				}else{
					$site  = filtro($_POST["site"]);	#Antes, de guardar filtra
				}
				
				if(empty($_POST["texto"])){	#Verifica se a var esta vazia..
					$obsErro = "";
				}else{
					$obs   = filtro($_POST["texto"]);	#Antes, de guardar filtra
				}
				
				if(empty($_POST["sexo"])){	#Verifica se a var esta vazia..
					$sexoErro = "*Obrigatório";
				}else{
					$sexo  = filtro($_POST["sexo"]);	#Antes, de guardar filtra
				}
				
			}

			# Filtra a variável e executa umas funções antes de armazenala..
			function filtro($data){
				$data = trim($data);				# Remove espaço da string..
				$data = stripslashes($data);		# Remove barras invertidas de uma string..
				$data = htmlspecialchars($data);	# Converte caracteres HTML, contra invasão..
				return $data;						# retorna a string limpa de ataque..
			}
		?>

		<!-- Envia p/ mesma pagina "PHP_SELF" retorna o nome da pg atual -->
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<h1>Formulario</h1>
			Nome: <input type="text" name="nome"/>
			<span class="error"><?php echo $nomeErro; ?></span>
			<br/><br/>
			E-mail: <input type="email" name="email"/>
			<span class="error"><?php echo $emailErro; ?></span>
			<br/><br/>
			site: <input type="text" name="site"/>
			<span class="error"><?php echo $siteErro; ?></span>
			<br/><br/>
			Obs: <textarea name="texto" rows="5" cols="40"/></textarea>
			<span class="error"><?php echo $obsErro; ?></span>
			<br/><br/>
			sexo: 
			<input type="radio" name="sexo" value="f">Feminino
			<input type="radio" name="sexo" value="m">Masculino
			<input type="radio" name="sexo" value="o">Outro(as)
			<span class="error"><?php echo $sexoErro; ?></span>
			<br/><br/>
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

