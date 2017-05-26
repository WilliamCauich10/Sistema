<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?= form_open("/prueba/recibir") ?>
<?php  
	$nombre = array('name' => 'Nombre','placeholder' => 'Escribe tu nombre' );
	$video = array('name' => 'Video','placeholder' => 'Cantidad de videos' );
?>
<?= form_label('Ingrese el nombre','Nombre') ?>
<?= form_input($nombre) ?>
<br>
<label>Videos
<?= form_input($video) ?>
</label>
<br>
<?= form_submit('','Enviar') ?>
<?= form_close() ?>
</body>

</html>