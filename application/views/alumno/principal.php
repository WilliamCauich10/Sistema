<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<h1>holi </h1>
	<?php foreach ($prueba-> result() as $prueba) {?>
		<div class="alert alert-success" role="alert"><center><h1> Bienvenido <?=$prueba->Nombre ?> </h1> <br> <h2>En esta pagina podras ver e imprimir los avances programaticos de tus materias</h2></center></div>
	<?php } ?>
</body>
</html>