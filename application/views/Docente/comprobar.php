<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
</head>

<?php 
	if ($prueba) {
		foreach ($prueba-> result() as $prueba) {
		$myClass->principalDocente($prueba->Num_Tarjeta);
	}
	}else{
		$myClass->index();
		print "<script type=\"text/javascript\">alert('Error de Numero de Tarjeta o Contraseña');</script>";
		
		}
?>
</body>
</html>