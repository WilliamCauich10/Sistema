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
		// $datos['myClass'] = $this;
		// $this-> load-> view('Docente/comprobar',$datos);
		if ($datos['prueba']) {
			return $this-> principalDocente($datos['id']);
		}else{
			$this-> load-> view('login/comprobar');		
		}
	}
	function ingresoAlumno(){
		$datos ['id']= $this-> input-> post('txtNumC');
		$datos ['pw']=$this -> input-> post('txtPWA');
		$datos['prueba']=$this-> ingresarlogin_model-> ingresoAlumnos($datos['id'],$datos['pw']);
		if ($datos['prueba']) {
			return $this->principalAlumno($datos['id']);
		}else{
			$this-> load-> view('login/comprobar');		
		}
	}
	function ingresoJefe(){
		$datos ['id']= $this-> input-> post('txtNumTarJ');
		$datos ['pw']=$this -> input-> post('txtPWDJ');
		$datos['prueba']=$this-> ingresarlogin_model-> ingresaJefe($datos['id'],$datos['pw']);
		if ($datos['prueba']) {
			return $this->principalJefe($datos['id']);
		}else{
			$this-> load-> view('login/comprobar');		
		}
	}
	function principalJefe($Numtar){
		$datos ['tarjeta']=$Numtar;
		$datos['prueba']=$this-> ingresarlogin_model-> datosMaestros($datos['tarjeta']);
		$datos['myClass'] = $this;
		$this-> load-> view('Docente/principaljefe',$datos);			
	}
	function principalDocente($Numtar){
		$datos ['tarjeta']=$Numtar;
		$datos['prueba']=$this-> ingresarlogin_model-> datosMaestros($datos['tarjeta']);
		$datos['myClass'] = $this;
		$this-> load-> view('Docente/principal',$datos);			
	}
	function principalAlumno($NumCont){
		$datos ['control']=$NumCont;
		$datos['prueba']=$this-> ingresarlogin_model-> datosAlumnos($datos['control']);
		$this-> load-> view('alumno/principal',$datos);
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