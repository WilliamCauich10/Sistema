<!DOCTYPE html>
<html>
<head>
	<title>Captura Avance</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/Sistema/css/style.php" media="screen">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
            <fieldset>
            	<legend class="text-center header">Detalle Materia</legend>
            	<?= form_open("/avanceprog/recibir2") ?>
<?php  
	$Id = array('name'=>'id','id'=>'id','style'=>'visibility:hidden');
	$Mate = array('name'=>'txtMate','id'=>'txtMate','class'=>'texto',' readonly'=>'readonly');
	$Grupo = array('name'=>'txtGrupo','id'=>'txtGrupo','class'=>'texto');
	$Carrera = array('name'=>'txtCarrera','id'=>'txtCarrera','class'=>'texto');
	$Tarjeta = array('name'=>'txtTarjeta','id'=>'txtTarjeta','class'=>'texto',' readonly'=>'readonly');
	$Jefe = array('name'=>'txtJefe','id'=>'txtJefe','class'=>'texto');
	$Fecha = array('name'=>'txtFecha','id'=>'txtFecha','type'=>'date','class'=>'texto','readonly'=>'readonly');
	$options2 = array(
        'Enero-Julio'         => 'Enero-Julio',
        'Agosto-Diciembre'           => 'Agosto-Diciembre',
);
?>	
<?php 
							foreach ($prueba-> result() as $prueba) {?>
				<label>Materia
				<br>	
					<?= form_input($Mate,$prueba->Materia)?>
				</label>
				<label>Fecha
					<br>
					<?= form_input($Fecha,$prueba->Fecha)?>
				</label>
				<br>
				<label>Grupo
					<br>
					<?= form_input($Grupo,$prueba->IDG) ?>
				</label>
				<label>Carrera
					<br>
				<?= form_input($Carrera,$prueba->Carrera) ?>
				</label>
				<br>
				<label>Numero de Tarjeta
					<br>
					<?= form_input($Tarjeta,$prueba->Num_Tarjeta) ?>
				</label>
				<label class="derecho">Jefe Departamento
					<?= form_input($Jefe,$prueba->NomJefeDto) ?>
				</label>
				<br>
				<center><label>Periodo
				<br>
					<select name="Periodo" class="materias">
						<option value="Enero-Julio" selected="selected">Enero-Julio</option>
						<option value="Agosto-Diciembre">Agosto-Diciembre</option>
					</select>
				</label>
				</center>
				<?= form_input($Id,$IDA) ?>
<?php }
						?>
            </fieldset>
            </div>
        </div>
    </div>
</div>
<center>
	<a ><button type="button" class="btn btn-danger" onclick="history.back(-1)">Cancelar</button></a>
	<button  type="submit"  class="btn btn-success">Siguiente</button>
</center>
<?= form_close() ?>
</body>
</html>