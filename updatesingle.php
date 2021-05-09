<?php
	require('config.php');
	require('common.php');
	
	if(isset($_POST['submit'])){
		try{
			$connection = new PDO($dsn, $username, $password, $options);
			
			$user = [
					"id" => $_POST['idAlumno'],
					"nombre" => $_POST['Nombre'],
					"appat" => $_POST['ApellidoPaterno'],
					"apmat" => $_POST['ApellidoMaterno'],
					"email" => $_POST['Email'],
					"edad" => $_POST['Edad'],
					"ciudad" => $_POST['Ciudad'],
					"date" => $_POST['date']
			];
			
			$strSQL = "UPDATE Alumnos
					   SET idAlumno = :id,
					        Nombre  = :nombre,
					        ApellidoPaterno = :appat,
					        ApellidoMaterno = :apmat,
					        email = :email,
					        edad = :edad,
					        ciudad = :ciudad,
					        date = :date
					    WHERE idAlumno = :id";
			
			$statement = $connection->prepare($strSQL);
			$statement->execute($user);
			
		} catch(PDOException $error) {
			echo $strSQL . "<br>" . $error->getMessage();
		}
	}
	
	if(isset($_GET['id'])){
		try{
			$connection = new PDO($dsn, $username, $password, $options);
			$id = $_GET['id'];
			
			$strSQL = "SELECT * FROM Alumnos WHERE idAlumno = :id";
			$statement = $connection->prepare($strSQL);
			$statement->bindValue(':id', $id);
			$statement->execute();
			
			$user = $statement->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $error) {
			echo $strSQL . "<br>" . $error->getMessage();
		}
	} else {
		echo "Hubo un error inesperado";
		exit;
	}

?>

<?php include('templates/header.php') ?>

<?php if(isset($_POST['submit']) && $statement): ?>
	<?php echo escape($_POST['Nombre']); ?> actualizado exitosamente.
<?php endif; ?>

<h2>
	<img src="img/student (1).png" class="center" 
		 style=" width:1em; height:1em;" />
	Editar alumno(a)
</h2>

<form method="POST">
	<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
	<?php foreach($user as $key => $value): ?>
		<label for="<?php echo $key; ?>">
			<?php echo ucfirst($key); ?>
		</label>
		<input type="text" 
		       name="<?php echo $key; ?>" 
		       id="<?php echo $key; ?>"
		       value="<?php echo escape($value); ?>"
		       <?php echo ($key == 'id' ? 'readonly' : null); ?> >
	<?php endforeach; ?>
	
	<button type="submit" class="btn" name="submit" id="submit">Aceptar</button>
</form>

<br />
<br />
<a href="update.php" class="btn brand z-depth-0">Regresar a actualizar</a>
<br />
<br />
<a href="index.php" class="btn brand z-depth-0">Regresar al principio</a>
<?php include('templates/footer.php') ?>
