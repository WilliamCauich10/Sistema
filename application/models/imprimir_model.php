<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir_model extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> database();
	}
	function Avance($id){
		$query = $this-> db->where('IDA',$id);
		$query = $this-> db->get('avanceprogramatico');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function Materia($Nombre){
		$query = $this-> db->where('Materia',$Nombre);
		$query = $this-> db->get('materias');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function Grupo($id){
		$query = $this-> db->where('IDG',$id);
		$query = $this-> db->get('grupo');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function Aula($id){
		$query = $this-> db->where('IDAula',$id);
		$query = $this-> db->get('aula');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function datosMaestros($id){
		$query = $this-> db->where('Num_Tarjeta',$id);
		$query = $this-> db->get('empleados');
		if ($query -> num_rows()>0) return $query;
		else return false; 	
	}
	function DetalleMateria($Id){
		// $this->db->select('d.Unidad,d.NombreTema,d.Subtemas,m.Periodo,m.PeriodoFin,m.Evaluacion');
  //       $this->db->from('detallemateria d');
  //       $this->db->join('detalleavance m','m.IDM = d.IDM');
        $this->db->where('IDM',$Id);
        $query = $this-> db->get("detallemateria");
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function DetalleAvance($IdA,$Id,$Uni){
        $this->db->where('IDA',$IdA);
        $this->db->where('IDM',$Id);
        $this->db->where('Unidad',$Uni);
        $query = $this-> db->get("detalleavance");
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function FechaPe($Per){
		$query = $this-> db->where('Periodo',$Per);
		$query = $this-> db->get('fechasestipuladas');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
}
?>