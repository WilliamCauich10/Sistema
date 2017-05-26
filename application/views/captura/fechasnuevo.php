<!DOCTYPE html>
<html>
<head>
	<title>Fechas</title>
</head>
<body>

<?= form_open("/avanceprog/crearDetalle") ?>
<?php 
	$tarjet = array('name'=>'tarje','id'=>'tarje','style'=>'visibility:hidden');
	$nom = array('name'=>'nombre','id'=>'nombre','style'=>'visibility:hidden');
	$IdMateria = array('name'=>'txtIDM','id'=>'txtIDM','type'=>'text','class'=> 'texto','style'=>'visibility:hidden');
	$Uni = array('name'=>'txtUnidad','id'=>'txtUnidad','type'=>'text','class'=> 'texto','style'=>'visibility:hidden');
	$FechaInicio = array('name'=>'txtFechaIni','id'=>'txtFechaIni','type'=>'date','class'=> 'texto');
	$FechaFin = array('name'=>'txtFechaFin','id'=>'txtFechaFin','type'=>'date','class'=>'texto');
	$FechEvaluacion = array('name'=>'txtFechaEva','id'=>'txtFechaEva','type'=>'date','class'=>'texto');
	$Observaciones = array('name'=>'txtObser','id'=>'txtObser','class'=>'texto');
	$IdAvan = array('name'=>'txtAvance','id'=>'txtAvance','class'=>'texto','style'=>'visibility:hidden');

						if ($prueba) {
							foreach ($prueba-> result() as $prueba) {?>
				
						<?php }
						}else{
							echo "<p>gg</p>";
							}
						?>
		<label>Fecha Inicio de Unidad
		 	<br>
		 	<?= form_input($FechaInicio) ?>
		 </label>
		 <br>
		 <label>Fecha Fin de Unidad
		 	<br>
		 	<?= form_input($FechaFin) ?>
		 </label>
		 <br>
		 <label>Fecha Evalacion de Unidad
		 	<br>
		 	<?= form_input($FechEvaluacion) ?>
		 </label>
		 <?= form_input($nom,$string) ?>
		 <?= form_input($tarjet,$tarjeta) ?>
		 <?= form_input($Uni,$unidad) ?>
		 <?= form_input($IdMateria,$idm) ?>
		<?= form_input($IdAvan,$prueba->IDA) ?>	
	<center>
	<a ><button type="button" class="btn btn-danger" onclick="history.back(-1)">Cancelar</button></a>
	<button  type="submit"  class="btn btn-success">Guardar</button>
</center>
<?= form_close() ?>

</body>
</html>