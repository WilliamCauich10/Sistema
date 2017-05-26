<!DOCTYPE html>
<html>
<head>
	<title>Avances</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/Sistema/css/styledetalle.php" media="screen">
</head>
<body>
<center>
<legend class="text-center header">Editar tus Avances</legend>
<table class="responstable" style="width: 1300px;">
<tr>
	<th style="width: 200px;">Nombre</th>
	<th style="width: 80px;">Grupo</th>
	<th style="width: 100px;">Fecha</th>
	<th style="width: 200px;">Carrera</th>
	<th style="width: 60px;" >Accion</th>
</tr>
<?php 
	$ID=array('name'=>'txtIDA','id'=>'txtIDA','class'=>'texto','style'=>'visibility:hidden');
	$Tar=array('name'=>'txtTar','id'=>'txtTar','class'=>'texto','style'=>'visibility:hidden');

	if ($prueba) {
		foreach ($prueba-> result() as $prueba) {?>
		<?= form_open("avanceprog/editaravan") ?>
		<tr>
			<td><?= $prueba->Materia; ?></td>
			<td><?= $prueba->IDG;?>
				<?= form_input($ID,$prueba->IDA); ?>
				<?= form_input($Tar,$tarjeta) ?>
			</td>
			<td><?= $prueba->Fecha; ?></td>
			<td><?= $prueba->Carrera; ?></th>
			<td>
				<button  type="submit"  class="btn btn-success">Editar</button>
				<a href="/Sistema/index.php/avanceprog/borrar/<?= $tarjeta ?>/<?= $prueba->IDA ?>"><button type="button" class="btn btn-danger">Borrar</button></a>
			</td>
		</tr>
		<?= form_close() ?>
	<?php }
	}else{
		echo "<p>No cuentas con Avances Programaticos</p>";
		}
	?>
</table>		
<!-- <center> -->
	<a href="/Sistema/index.php/login/principalDocente/<?= $tarjeta ?>"><button type="button" class="btn btn-primary" >Terminar</button></a>
</center>				
</body>
</html>
