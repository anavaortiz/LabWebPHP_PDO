<?php 

	require('config.php');
	require('common.php');
	
	if(isset($_POST['submit'])){
		try{
			$connection = new PDO($dsn, $username, $password, $options);
			
			$strSQL = "SELECT * FROM Alumnos WHERE Ciudad = :ciudad";
			
			$ciudad = $_POST['ciudad'];
			
			$statement = $connection->prepare($strSQL);
			$statement->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
			$statement->execute();
			
			$result = $statement->fetchAll();
			
		} catch(PDOException $error) {
			echo $strSQL . "<br>" . $error->getMessage();
		}
	}

?>



<?php include('templates/header.php') ?>

<?php
	if(isset($_POST['submit'])) {
		if($result && $statement->rowCount() > 0) { ?>
			<h2>Resultados de la búsqueda</h2>
			<table>
				<thead>
					<tr>
						<th>Id. Alumno</th>
						<th>Nombre</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Email</th>
						<th>Edad</th>
						<th>Ciudad</th>
						<th>Fecha de registro</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($result as $row) { ?>
						<tr>
							<td><?php echo escape($row['idAlumno'])?></td>
							<td><?php echo escape($row['Nombre'])?></td>
							<td><?php echo escape($row['ApellidoPaterno'])?></td>
							<td><?php echo escape($row['ApellidoMaterno'])?></td>
							<td><?php echo escape($row['Email'])?></td>
							<td><?php echo escape($row['Edad'])?></td>
							<td><?php echo escape($row['Ciudad'])?></td>
							<td><?php echo escape($row['date'])?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else { ?>
			No se encontró registros para <?php echo escape($_POST['ciudad']); 
			?>
		<?php } 
	}
?>

<h2>
	<img src="img/student.png" class="center" 
		 style=" width:1em; height:1em;" />
	
	Búsqueda de estudiante en base a ciudad
		 
</h2>

<div class="container grey-text">
	<form class="center grey-text" method="POST">
		<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
		<label for="ciudad">Ciudad</label>
		<input type="text" name="ciudad" id=ciudad>
		<button type="submit" class="btn" 
		name="submit" value="resultados">Resultados</button>
	</form>
</div>

<?php include('templates/footer.php') ?>

<br />
<br />
<a href="index.php" class="btn brand z-depth-0">Regresar</a>
