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

				#Verifica se a var esta vazia..
				if(empty($_POST["nome"])){	
					$nomeErro = "*Obrigatório";	
				}else{

					#Antes, de guardar filtra
					$nome  = filtro($_POST["nome"]);	

					# Valida o nome da Pessoa
					if(!preg_match("/^[a-zA-Z ]*$/", $nome)){
						$nomeErro = "Nome Invalido!";
					}
				}

				#Verifica se a var esta vazia..
				if(empty($_POST["email"])){	
					$emailErro = "*Obrigatório";
				}else{

					#Antes, de guardar filtra
					$email = filtro($_POST["email"]);

					#verifica se é realmente um e-mail
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
						$emailErro = "E-mail, Invalido!";
					}
				}
				
				#Verifica se a var esta vazia..
				if(empty($_POST["site"])){	
					$siteErro = "";
				}else{

					#Antes, de guardar filtra
					$site  = filtro($_POST["site"]);

					# Valida URL:
					if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
						$siteErro = "URL Invalido!";
					}	
				}
				
				#Verifica se a var esta vazia..
				if(empty($_POST["texto"])){	
					$obsErro = "";
				}else{

					#Antes, de guardar filtra
					$obs   = filtro($_POST["texto"]);	
				}
				
				#Verifica se a var esta vazia..
				if(empty($_POST["sexo"])){	
					$sexoErro = "*Obrigatório";
				}else{

					#Antes, de guardar filtra
					$sexo  = filtro($_POST["sexo"]);	
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
			Nome: <input type="text" name="nome"/><!-- Se quiser manter os dados, value="<?php /*echo*/ $nome;?>" -->
			<span class="error"><?php echo $nomeErro; ?></span><!-- Se ñ preencher aparece mensagem se for obrigatório -->
			<br/><br/>
			E-mail: <input type="email" name="email"/><!-- Se quiser manter os dados, value="<?php /*echo*/ $email;?>" -->
			<span class="error"><?php echo $emailErro; ?></span><!-- Se ñ preencher aparece mensagem se for obrigatório -->
			<br/><br/>
			site: <input type="text" name="site"/><!-- Se quiser manter os dados, value="<?php /*echo*/ $site;?>" -->
			<span class="error"><?php echo $siteErro; ?></span><!-- Se ñ preencher aparece mensagem se for obrigatório -->
			<br/><br/>
			Obs: <textarea name="texto" rows="5" cols="40"/></textarea><!-- Se quiser manter os dados, value="<?php /*echo*/ $obs;?>" -->
			<span class="error"><?php echo $obsErro; ?></span><!-- Se ñ preencher aparece mensagem se for obrigatório -->
			<br/><br/>
			sexo: 
			<input type="radio" name="sexo" value="f">Feminino
			<input type="radio" name="sexo" value="m">Masculino
			<input type="radio" name="sexo" value="o">Outro(as)
			<span class="error"><?php echo $sexoErro; ?></span><!-- Se ñ preencher aparece mensagem se for obrigatório -->
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

