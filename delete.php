<?php
	require('config.php');
	require('common.php');
	
	# ... borra un registro de la tabla alumnos ...
	if(isset($_GET['id'])){
		try{
			$connection = new PDO($dsn, $username, $password, $options);
			$id = $_GET['id'];
			
			$strSQL = "DELETE FROM Alumnos WHERE idAlumno = :id";
			$statement = $connection->prepare($strSQL);
			$statement->bindValue(':id', $id);
			$statement->execute();
			
			$success = "Alumno borrado satisfactoriamente";
			
		} catch (PDOException $error) {
			echo $strSQL . "<br>" . $error->getMessage();
		}
	} 
	
	
	# ... Lista todos los registros de la tabla Alumnos ...
	try{
		$connection = new PDO($dsn, $username, $password, $options);
		$id = $_GET['id'];
			
		$strSQL = "SELECT * FROM Alumnos";
		$statement = $connection->prepare($strSQL);
		$statement->execute();
		
		$result = $statement->fetchAll();
			
		
	} catch (PDOException $error) {
		echo $strSQL . "<br>" . $error->getMessage();
	}
	
	
?>


<?php include('templates/header.php') ?>



<h2>
	<img src="img/eraser (1).png" class="center" 
		 style=" width:1em; height:1em;" />
	Borrar alumno(a)s
</h2>

<?php if(success) echo $success; ?>


<form class="center" method="POST">
	<input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
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
			<?php foreach($result as $row): ?>
				<tr>
					<td><?php echo escape($row['idAlumno'])?></td>
					<td><?php echo escape($row['Nombre'])?></td>
					<td><?php echo escape($row['ApellidoPaterno'])?></td>
					<td><?php echo escape($row['ApellidoMaterno'])?></td>
					<td><?php echo escape($row['Email'])?></td>
					<td><?php echo escape($row['Edad'])?></td>
					<td><?php echo escape($row['Ciudad'])?></td>
					<td><?php echo escape($row['date'])?></td>
					<td><a 
					href="delete.php?id=<?php echo escape($row['idAlumno']); ?>"
					>Borrar</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</form>

<br />
<br />
<a href="index.php" class="btn brand z-depth-0">Regresar</a>

<?php include('templates/footer.php') ?>
