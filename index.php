<?php include('templates/header.php')?>

<div class="container">
	<div class="row">
		<div class="col s6 md3">
			<div class="card z-depth-0">
				<div class="container-center">
					<img src="img/college.png" class="center" 
					style=" width:3em; height:3em;" />
				</div>

				<ul>
					<li>
						
						<a href="add.php">
							<img src="img/agenda.png" class="center" 
					             style=" width:1em; height:1em;" />
							<strong>Crear</strong>
						</a> - agregar alumno
					</li>
					<li>
						<a href="read.php">
							<img src="img/college_1.png" class="center" 
						         style=" width:1em; height:1em;" />
							<strong>Leer</strong></a>- buscar alumno(a)
					</li> 
					<li>
						<a href="update.php">
							<img src="img/pencil.png" class="center" 
								 style=" width:1em; height:1em;" />
							<strong>Editar</strong></a>- editar alumno(a)
					</li> 
					<li>
						<a href="delete.php">
							<img src="img/eraser.png" class="center" 
					style=" width:1em; height:1em;" />
							<strong>Borrar</strong></a>- borrar alumno(a)
					</li> 
				</ul>
			</div>
		</div>
	</div>
</div>


<?php include('templates/footer.php')?>

