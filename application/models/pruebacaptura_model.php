<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pruebacaptura_model extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> database();
	}
	function crearAvance($data){
		$this-> db-> insert(
			'avanceprogramatico',array(
			'IDA'=>'',
			'Materia'=> $data['city'],
			'IDG'=> $data['txtGrupo'],
			'Num_Tarjeta'=>$data['txtTarjeta'],
			'NomJefeDto' => $data['txtJefe'],
			'Fecha'=>$data['txtFecha'],
			'Carrera'=>$data['txtCarrera'],
			'Periodo'=> $data['Periodo']
			)); 
	}
	function crearDetallleAvance($data){
		$this-> db-> insert(
			'detalleavance',array(
			'ID_DetalleA'=>'',
			'IDA'=>$data['txtAvance'],
			'IDM'=> $data['txtIDM'],
			'Periodo'=> $data['txtFechaIni'],
			'PeriodoFin'=>$data['txtFechaFin'],
			'Evaluacion'=>$data['txtFechaEva'],
			'Unidad'=>$data['txtUnidad']
			)); 
	}
	function obtenerMateria(){
		$query = $this-> db->get('materias');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function detalleMateria($id){
			$this->db->select('m.IDM,m.Materia,m.Unidades,d.Unidad,d.NombreTema,d.Subtemas');
            $this->db->from('materias m');
            $this->db->join('detallemateria d','m.IDM = d.IDM');
            $this->db->where('Materia',$id);
		//$query = $this-> db->where('Materia',$id);
		//$query = $this-> db->get('materias');
            $query = $this-> db->get();
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function detalleMateriaID($id){
			$this->db->select('m.IDM,m.Materia,m.Unidades,d.Unidad,d.NombreTema,d.Subtemas');
            $this->db->from('materias m');
            $this->db->join('detallemateria d','m.IDM = d.IDM');
            $this->db->where('IDM',$id);
            $query = $this-> db->get();
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function buscaFechas($id,$unida){
		$query = $this-> db->where('IDA',$id);
		$query = $this-> db->where('Unidad',$unida);
		$query = $this-> db->get('detalleavance');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}

	function IDavance($id,$ma){
		$query = $this-> db->where('Num_Tarjeta',$id);
		$query = $this-> db->where('Materia',$ma);
		$query = $this-> db->get('avanceprogramatico');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function Avance($id){
		$query = $this-> db->where('IDA',$id);
		$query = $this-> db->get('avanceprogramatico');
		if ($query -> num_rows()>0) return $query;
		else return false; 
	}
	function ActualizaCapos1($datas,$id){
		$data = array(
               'IDG' => $datas['txtGrupo'],
               'NomJefeDto' => $datas['txtJefe'],
               'Carrera' => $datas['txtCarrera'],
               'Periodo' => $datas['Periodo']
            );

		$query =$this->db->where('IDA', $id);
		$query =$this->db->update('avanceprogramatico', $data);
	}

	function ActualizaCapos2($datas,$id,$uni){
		$data = array(
               'Periodo' => $datas['txtFechaIni'],
               'PeriodoFin' => $datas['txtFechaFin'],
               'Evaluacion' => $datas['txtFechaEva']
            );
		$query =$this->db->where('IDA', $id);
		$query =$this->db->where('Unidad', $uni);
		$query =$this->db->update('detalleavance', $data);
	}
	function BorradoAvance($id){
		$query =$this->db->where('IDA', $id);
		$query =$this->db->delete('avanceprogramatico'); 
	}
	function BorradoDetalle($id){
		$query2 =$this->db->where('IDA', $id);
		$query2 =$this->db->delete('detalleavance'); 
	}
}
?>