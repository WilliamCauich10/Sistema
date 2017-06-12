<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingresarlogin_model extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> database();
	}
	function ingresaMaestro($id,$pw){
		$query = $this-> db->where('Num_Tarjeta',$id);
		$query = $this-> db->where('Contraseña',$pw);
		$query = $this-> db->get('empleados');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function ingresaJefe($id,$pw){
		$query = $this-> db->where('Num_Tarjeta',$id);
		$query = $this-> db->where('Contraseña',$pw);
		$query = $this-> db->where('Rol','JefeDto');
		$query = $this-> db->get('empleados');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function ingresoAlumnos($id,$pw){
		$query = $this-> db->where('Num_Control',$id);
		$query = $this-> db->where('Contraseña',$pw);
		$query = $this-> db->get('alumnos');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function datosMaestros($id){
		$query = $this-> db->where('Num_Tarjeta',$id);
		$query = $this-> db->get('empleados');
		if ($query -> num_rows()>0) return $query;
		else return false; 	
	}
	function datosAlumnos($id){
		$query = $this-> db->where('Num_Control',$id);
		$query = $this-> db->get('alumnos');
		if ($query -> num_rows()>0) return $query;
		else return false; 	
	}
	function mostrarAvanceMa($id){
		$query = $this-> db->where('Num_Tarjeta',$id);
		$query = $this-> db->get('avanceprogramatico');
		if ($query -> num_rows()>0) return $query;
		else return false; 		
	}
}
?>