<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Sistema/css/styledetalle.php" media="screen">
</head>
<body>
<div class="MenuPrincipal">
<?php foreach ($prueba-> result() as $prueba) {?>
<div class="Perfil">
	<ul>
		<li><?=$prueba->Nombre ?> <span class="glyphicon glyphicon-user"></span></li>
		<li><a href="/Sistema/index.php/login/index"><span class="glyphicon glyphicon-log-out"></span> log out</a></li>
	</ul>
</div>
	
		<div class="alert alert-success" role="alert"><center><h1> Bienvenido <?=$prueba->Nombre ?> </h1> <br> <h2>En esta pagina podras ver e imprimir los avances programaticos de tus materias</h2></center></div>
	<?php } ?>
<table class="responstable">
	<tr>
		<th>Materia</th>
		<th>Grupo</th>
		<th>Docente</th>
		<th>Fecha</th>
		<th>Accion</th>
	</tr>
	<?php
		$ID=array('name'=>'txtIDA','id'=>'txtIDA','class'=>'texto','style'=>'visibility:hidden');
		$Tar=array('name'=>'txtTar','id'=>'txtTar','class'=>'texto','style'=>'visibility:hidden');
		

		//Obtengo la id al que pertenece el alumno
		$queryIDG = $this-> db->where('Num_Control',$control);
		$queryIDG = $this-> db->get('detallegrupo');
		foreach ($queryIDG-> result() as $queryIDG) {
			$idg=$queryIDG->IDG;
			$idm=$queryIDG->IDM;
			// funciona me da las id materias que tiene el alumno
		//
		$queryMateria = $this-> db->where('IDM',$idm);
		$queryMateria = $this-> db->get('materias');
		foreach ($queryMateria-> result() as $queryMateria) {
			$M=$queryMateria->Materia;
		}
		//
		$queryIDG1 = $this-> db->where('Num_Control',$control);
		$queryIDG1 = $this-> db->where('IDM',$idm);
		$queryIDG1 = $this-> db->get('detallegrupo');
		foreach ($queryIDG1-> result() as $queryIDG1) {
			$idg1=$queryIDG1->IDG;
		}
		//Obtengo la materia
		$queryAvance = $this-> db->where('IDG',$idg1);
		$queryAvance = $this-> db->where('Materia',$M);
		$queryAvance = $this-> db->get('avanceprogramatico');
		foreach ($queryAvance-> result() as $queryAvance) {
			$idtarjeta=$queryAvance->Num_Tarjeta
		?>
		<?= form_open("imprimir/descargar") ?>
		<tr>
		<td><?= $queryAvance->Materia ?>
			<?= form_input($ID,$queryAvance->IDA); ?>
		</td>
		<td><?= $queryAvance->IDG ?>
		<?= form_input($Tar,$idtarjeta) ?>
		</td>
		<!--  -->
		<?php 
		$queryEmpleado = $this-> db->where('Num_Tarjeta',$idtarjeta);
		$queryEmpleado = $this-> db->get('empleados');
		foreach ($queryEmpleado-> result() as $queryEmpleado) {?>
		<td><?= $queryEmpleado->Nombre ?></td>
		<?php }
		?>
		<!--  -->
		<td><?= $queryAvance->Fecha ?></td>
		<td><button  type="submit"  class="btn btn-success">Imprimir</button></td>
		</tr>
		<?= form_close() ?>
	<?php }
		}?>
</table>
</div>
</body>
</html>