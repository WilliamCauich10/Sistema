<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php  
	$Grupo = array('name'=>'txtGrupo','id'=>'txtGrupo','value'=> set_va $prueba->nombrePrueba);
?>
<label>Grupo
<?= form_input($Grupo) ?>
</label>


<?= form_open("/avanceprog/recibir") ?>
<select name="city">
<option value="none" selected="selected">------------Select City------------</option>
<?php 
if ($prueba) {
	foreach ($prueba-> result() as $prueba) {?>
	<!-- <ul>
		<li></li>
	</ul>	 -->

<option value='<?= $prueba-> nombrePrueba; ?>'><?= $prueba-> nombrePrueba; ?></option>


<?php }
}else{
	echo "<p>gg</p>";
	}
?>
</select>
<?= form_submit(array('id' => 'submit', 'value' => 'Submit')); ?>


<?= form_close() ?>
</body>
</html>