<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
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

	<?php 
		$queryCarrera = $this-> db->where('Num_Control',$prueba->Num_Tarjeta);
		$queryCarrera = $this-> db->get('dto');
		foreach ($queryCarrera-> result() as $queryCarrera) {
			$queryCarrera ->IDC;
		}
	?>
	<h1><?= $queryCarrera ->IDC; ?></h1>
</div>
</body>
</html>