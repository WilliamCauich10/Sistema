<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="/Sistema/css/stylelogin.php" media="screen">
</head> 
<body>
<?php 
	$Num = array('name'=>'txtNumC','id'=>'txtNumC','class'=>'texto');
	$PWA = array('name'=>'txtPWA','id'=>'txtPWA','class'=>'texto','type'=>'password');
	$NumTA = array('name'=>'txtNumTar','id'=>'txtNumTar','class'=>'texto');
	$PWD = array('name'=>'txtPWD','id'=>'txtPWD','class'=>'texto','type'=>'password');
 ?>
 	<body>
  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Alumnos</a></li>
        <li class="tab"><a href="#login">Maestros</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Alumnos</h1>
          
          <?= form_open("login/ingresoAlumno") ?>
            <div class="field-wrap">
              <label>
                Numero de control <span class="req">*</span>
              </label>
              <!-- <input type="text" required autocomplete="off" /> -->
              <?= form_input($Num) ?>
            </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <?= form_input($PWA) ?>
          </div>
          
          <!-- <button type="submit" class="button button-block"/>Get Started</button> -->
          <button class="button button-block"/>Log In</button>
          <?= form_close() ?>

        </div>
        
        <div id="login">   
          <h1>Maestros</h1>
          <?= form_open("login/ingresoDocente") ?>
          
            <div class="field-wrap">
            <label>
              Nunero de Tarjeta<span class="req">*</span>
            </label>
            <?= form_input($NumTA) ?>
          </div>
          
          <div class="field-wrap">
            <label>
              Contraseña<span class="req">*</span>
            </label>
            <?= form_input($PWD) ?>
          </div>
          
          <!-- <p class="forgot"><a href="#">Forgot Password?</a></p> -->
          <button class="button button-block"/>Log In</button>
          
          <?= form_close() ?>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="/Sistema/js/index.js"></script>

</body>
</html>