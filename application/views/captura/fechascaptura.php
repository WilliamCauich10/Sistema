<!DOCTYPE html>
<html>
<head>
	<title>Fechas</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Sistema/css/stylefechas.php" media="screen">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
            <fieldset>
            	<legend class="text-center header">Detalle Materia</legend>
<?php
	$nom = array('name'=>'nombre','id'=>'nombre','style'=>'visibility:hidden');
	$tar = array('name'=>'tarj','id'=>'tarj','style'=>'visibility:hidden');
	$IdMateria = array('name'=>'txtIDM','id'=>'txtIDM','type'=>'text','class'=> 'texto','style'=>'visibility:hidden');
	$Uni = array('name'=>'txtUnidad','id'=>'txtUnidad','type'=>'text','class'=> 'texto','style'=>'visibility:hidden');
	$FechaInicio = array('name'=>'txtFechaIni','id'=>'txtFechaIni','type'=>'date','class'=> 'texto');
	$FechaFin = array('name'=>'txtFechaFin','id'=>'txtFechaFin','type'=>'date','class'=>'texto');
	$FechEvaluacion = array('name'=>'txtFechaEva','id'=>'txtFechaEva','type'=>'date','class'=>'texto');
	$Observaciones = array('name'=>'txtObser','id'=>'txtObser','class'=>'texto');
	if ($prueba) {?>
		<?= form_open("/avanceprog/actualizaFechas") ?>
		<?php
		foreach ($prueba-> result() as $prueba) { ?>
		<label>Fecha Inicio de Unidad
		 	<br>
		 	<?= form_input($FechaInicio,$prueba->Periodo) ?>
		 </label>
		 <br>
		 <label>Fecha Fin de Unidad
		 	<br>
		 	<?= form_input($FechaFin,$prueba->PeriodoFin) ?>
		 </label>
		 <br>
		 <label>Fecha Evalacion de Unidad
		 	<br>
		 	<?= form_input($FechEvaluacion,$prueba->Evaluacion) ?>
		 </label>
	<?php }?>
	<center>
		<?= form_input($nom,$string) ?>
		<?= form_input($Uni,$unidad) ?>
		<?= form_input($tar,$tarjeta) ?>
	<br>
		<a ><button type="button" class="btn btn-danger" onclick="history.back(-1)">Cancelar</button></a>
		<button  type="submit"  class="btn btn-success">Guardar</button>
	</center>
	<?= form_close() ?>
	<?php }
	else{
		$myClass->IdAvance($tarjeta,$string,$unidad,$id);
		 }
	?>
           	</fieldset>
           	</div>
        </div>
    </div>
</div>
</body>
</html>