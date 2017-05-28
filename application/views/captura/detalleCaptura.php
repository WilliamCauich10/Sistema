<!DOCTYPE html>
<html>
<head>
	<title>Captura Avance</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/Sistema/css/styledetalle.php" media="screen">
</head>
<body>
<center>
<legend class="text-center header"><?= $string ?></legend>
<table class="responstable" style="width: 90%;">
<tr>
	<th style="width: 6%;">Id</th>
	<th style="width: 3%;">Unidad</th>
	<th style="width: 23%;">Tema</th>
	<th style="width: 50%;">Subtema</th>
	<th style="width: 20%;">Fecha Periodo</th>
</tr>
<?php 
	$IdMateria = array('name'=>'txtIDM','id'=>'txtIDM','type'=>'text','class'=> 'texto','style'=>'visibility:hidden');
	$Id = array('name'=>'id','id'=>'id','style'=>'visibility:hidden');
	$Unidad1 = array('name'=>'txtUnidad','id'=>'txtUnidad','style'=>'visibility:hidden');
	$Unidad = array('name'=>'txtUnidad','id'=>'txtUnidad','style'=>'visibility:hidden');
	$nom = array('name'=>'nombre','id'=>'nombre','style'=>'visibility:hidden');
	$tarj = array('name'=> 'tarj', 'id'=>'tarj', 'style'=>'visibility:hidden');
	$FechaInicio = array('name'=>'txtFechaIni','id'=>'txtFechaIni','type'=>'date','class'=> 'texto');
	$FechaFin = array('name'=>'txtFechaFin','id'=>'txtFechaFin','type'=>'date','class'=>'texto');
	$FechEvaluacion = array('name'=>'txtFechaEva','id'=>'txtFechaEva','type'=>'date','class'=>'texto');
	$IdAvan = array('name'=>'txtAvance','id'=>'txtAvance','class'=>'texto','style'=>'visibility:hidden');

			foreach ($prueba-> result() as $prueba) {
				?>
				
			<tr>
				
				<td value="<?= $prueba->IDM; ?>"> <?= $prueba->IDM; ?>
				<?= form_input($Id,$prueba-> IDM) ?>
				<?= form_input($nom,$string); ?>	
				</td>
				<td value="<?= $prueba->Unidad; ?>"><?= $prueba-> Unidad; ?>
				<?= form_input($Unidad1,$prueba-> Unidad) ?>
				<?= form_input($tarj,$tarjeta) ?>
				</td>
				<td value="<?= $prueba->NombreTema; ?>"> <?= $prueba-> NombreTema; ?></td>
				<td value="<?= $prueba->Subtemas; ?>"> <?= $prueba-> Subtemas; ?></td>
				<!-- <td><button  type="submit"  class="btn btn-success">Agregar Fecha</button></td> -->
				<td>
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?= $prueba->Unidad; ?>">Agregar Fecha</button>

			  <!-- Modal -->
			  <div class="modal fade" id="myModal<?= $prueba->Unidad; ?>" role="dialog">
			    <div class="modal-dialog">
			    
			      <!-- Modal content-->
			      <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Fechas por Unidad</h4>
			        </div>
			        <div class="modal-body">
						<?php
						$queryID = $this-> db->where('Num_Tarjeta',$tarjeta);
						$queryID = $this-> db->where('Materia',$string);
						$queryID = $this-> db->get('avanceprogramatico');
						foreach ($queryID-> result() as $queryID) {
						  // $queryID->IDA;  
					 }

							$query =$this-> db->where('IDA',$queryID->IDA );
							$query =$this-> db->where('Unidad',$prueba->Unidad);
							$query =$this-> db->get('detalleavance');
						if ($query -> num_rows()>0){?>
							<?= form_open("/avanceprog/actualizaFechas") ?>
						<?php foreach ($query-> result() as $query) {?>
						
								<label>Fecha Inicio de Unidad
						 			<br>
						 			<?= form_input($FechaInicio,$query->Periodo) ?>
						 		</label>
						 	<br>
								 <label>Fecha Fin de Unidad
								 	<br>
								 	<?= form_input($FechaFin,$query->PeriodoFin) ?>
								 </label>
								 <br>
								 <label>Fecha Evalacion de Unidad
								 	<br>
								 	<?= form_input($FechEvaluacion,$query->Evaluacion) ?>
								 </label>
								 <?= form_input($nom,$string) ?>
								 <?= form_input($Unidad,$prueba->Unidad) ?>
								 <?= form_input($tarj,$tarjeta) ?>
								<center>
								 	<button  type="submit"  class="btn btn-success">Guardar</button>
								</center>
							<?= form_close() ?>
					<?php }
						}else{?>
							<?= form_open("/avanceprog/crearDetalle") ?>
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
		 						  <?= form_input($tarj,$tarjeta) ?>
								 <?= form_input($Unidad,$prueba->Unidad) ?>
								 <?= form_input($IdMateria,$prueba-> IDM) ?>
								<?= form_input($IdAvan,$queryID->IDA) ?>	
								<center>
								 	<button  type="submit"  class="btn btn-success">Guardar</button>
								</center>
							<?= form_close() ?>
					<?php }
						?>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			      </div>
			      
			    </div>
			  </div>
				</td>
				<!-- <td><a href="fechas"><button  type="button"  class="btn btn-success">Agregar Fecha</button> </a></td> -->
			</tr>		
<!-- close form borrado -->
		<?php }

		?>
</table>

</center>
<br>
<center>
<!-- <a href="/"><button type="button" class="btn btn-danger" onclick="history.back(-1)">Cancelar</button></a>
 -->

 <a href="/Sistema/index.php/login/principalDocente/<?= $tarjeta ?>"><button type="button" class="btn btn-primary" >Terminar</button></a>
 </center>
</body>
</html>