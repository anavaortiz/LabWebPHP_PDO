<?php

require('config.php');
require('common.php');

if(isset($_POST['submit'])){
	
	
	try{
		$connection = new PDO($dsn, $username, $password, $options);
		
		$nuevo_alumno = array(
						"nombre"          => $_POST['nombre'],
						"apellidopaterno" => $_POST['apellidopaterno'],
						"apellidomaterno" => $_POST['apellidomaterno'],
						"email"           => $_POST['email'],
						"edad"            => $_POST['edad'],
						"ciudad"          => $_POST['ciudad']
						);
		
		
		$strSQL = sprintf("INSERT INTO %s (%s) values (%s)",
					"Alumnos ", implode(", ", array_keys($nuevo_alumno)),
					":" . implode(", :", array_keys($nuevo_alumno))
				  );
		
		
		/**
		INSERT INTO Alumnos (Nombre, ApellidoPaterno, ApellidoMaterno,
		Email, Edad, Ciudad) Values (:Nombre, :ApellidoPaterno, :ApellidoMaterno,
		:Email, :Edad, :Ciudad)
		* 
		**/
		
		$statement = $connection->prepare($strSQL);
		$statement->execute($nuevo_alumno);
		
		
	} catch (PDOException $error) {
		echo $strSQL . "<br>" . $error->getMessage();
	}
}


?>


<?php include('templates/header.php')?>

<?php if(isset($_POST['submit']) && $statement) {?>
	<blockquote>
		<?php echo escape($_POST['nombre']); ?> agregado exitosamente.
	</blockquote>
<?php } ?>

<h2>
	<img src="img/elearning.png" class="center" 
					style=" width:1em; height:1em;" />
	Registro Alumnos
</h2>

<div class="container grey-text">
	<form method="POST">
		<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre">
		<label for="apellidopaterno">Apellido Paterno:</label>
		<input type="text" name="apellidopaterno" id="apellidopaterno">
		<label for="apellidomaterno">Apellido Materno:</label>
		<input type="text" name="apellidomaterno" id="apellidomaterno">
		<label for="email">Email:</label>
		<input type="text" name="email" id="email">
		<label for="edad">Edad:</label>
		<input type="text" name="edad" id="edad">
		<label for="ciudad">Ciudad:</label>
		<input type="text" name="ciudad" id="ciudad">
		
		<button type="submit" class="btn btn-primary" name="submit" id="submit">
			Aceptar
		</button>
	</form>
</div>

<br />
<br />

<a href="index.php" class="btn brand z-depth-0">Regresar
</a>

<?php include('templates/footer.php')?>
