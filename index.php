<html>
	<head>
		
	</head>
	<body>
		<form action="index.php" method="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			Nome: <input type="text" name="nome"/><br/>
			E-mail: <input type="email" name="email"/><br/>
			site: <input type="text" name="site"/><br/>
			Obs: <textarea name="texto" rows="5" cols="40"/></textarea><br/>
			sexo: <br/>
			<input type="radio" name="sexo" value="f"/>Feminino
			<input type="radio" name="sexo" value="m"/>Masculino
			<input type="radio" name="sexo" value="o"/>Outro(as)
			<input type="submit">
		</form>
	</body>
</html>

