<?php

	require('config.php');
	require('common.php');

	try{
		$connection = new PDO($dsn, $username, $password, $options);
		
		$strSQL = "SELECT * FROM Alumnos";
		
		$ciudad = $_POST['ciudad'];
		
		$statement = $connection->prepare($strSQL);
		$statement->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
		$statement->execute();
		
		$result = $statement->fetchAll();
	} catch(PDOException $error) {
			echo $strSQL . "<br>" . $error->getMessage();
	}

?>



<?php include('templates/header.php') ?>

<h2>
	<img src="img/elearning (1).png" class="center" 
		 style=" width:1em; height:1em;" />
	Actualizar alumno(a)
</h2>

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
				<td><a href="updatesingle.php?id=<?php echo escape($row['idAlumno']); ?>">Editar</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<br />
<br />

<a href="index.php" class="btn brand z-depth-0">Regresar</a>


<?php include('templates/footer.php') ?>
