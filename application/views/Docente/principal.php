<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Sistema/css/styledocentes.php" media="screen">

</head>
<body>

<div class="MenuPrincipal">
	<?php 
		if ($prueba) {
			foreach ($prueba-> result() as $prueba) {?>
			<ul>
				<li><a href="/Sistema/index.php/avanceprog/index/<?= $tarjeta ?>"><span class="glyphicon glyphicon-plus-sign"></span> Nuevo</a></li>
				<li><a href="/Sistema/index.php/login/editar/<?= $tarjeta ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
				<li><a href="/Sistema/index.php/login/avances/<?= $tarjeta ?>"><span class="glyphicon glyphicon-align-justify"></span> Avances</a></li>
				<div class="Perfil">
					<li><?=$prueba->Nombre ?> <span class="glyphicon glyphicon-user"></span></li>
					<li><a href="/Sistema/index.php/login/index"><span class="glyphicon glyphicon-log-out"></span> log out</a></li>
				</div>
			</ul>
			<br>
			<div class="alert alert-success" role="alert"><center><h1> Bienvenido <?=$prueba->Nombre ?> </h1> <br> <h2>En esta pagina podras crear, modificar e imprimir tus avances programaticos</h2></center></div>
			<?= form_open("login/descargar")?>
<?= form_close() ?>
<?php }
		}else{	
			echo "<p>gg</p>";
		} ?>
</div>
</body>
</html>