<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> helper('form');
		$this-> load-> model('ingresarlogin_model');
	}
	function index(){
		$this-> load-> view('login/login');
	}
	function ingresoDocente(){
		$datos ['id']= $this-> input-> post('txtNumTar');
		$datos ['pw']=$this -> input-> post('txtPWD');
		$datos['prueba']=$this-> ingresarlogin_model-> ingresaMaestro($datos['id'],$datos['pw']);
		// $data['prueba']= $this-> ingresarlogin_model-> ingresaMaestro();	
		$datos['myClass'] = $this;
		$this-> load-> view('Docente/comprobar',$datos);
	}
	function principalDocente($Numtar){
		$datos ['tarjeta']=$Numtar;
		// $datos['nombre']=$NombreDoc;
		$datos['prueba']=$this-> ingresarlogin_model-> datosMaestros($datos['tarjeta']);
		$datos['myClass'] = $this;
		$this-> load-> view('Docente/principal',$datos);			
	}
	function avances($Numtar){
		$datos['tarjeta']=$Numtar;
		$datos['prueba']=$this-> ingresarlogin_model-> mostrarAvanceMa($datos['tarjeta']);
		$datos['myClass'] = $this;
		$this-> load-> view('docente/mostraravances',$datos);			
	}
	function editar($Numtar){
		$datos['tarjeta']=$Numtar;
		$datos['prueba']=$this-> ingresarlogin_model-> mostrarAvanceMa($datos['tarjeta']);
		$datos['myClass'] = $this;
		$this-> load-> view('docente/editaravance',$datos);			
	}
}
?>