<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prueba extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> helper('form');
		$this-> load-> model('pruebacaptura_model');
	}
	function index(){
		$this-> load-> view('captura/bienvenido');
	}
	function nuevo(){
		$this-> load-> view('captura/captura');
	}
	function recibir(){
		$data = array(
			'Nombre' => $this -> input-> post('Nombre'),
			'Video' => $this -> input-> post('Video')
			);
	// $this-> pruebacaptura_model-> crearPrueba($data);
	$this-> load-> view('captura/bienvenido');
	}
}
?>