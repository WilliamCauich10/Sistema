<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avanceprog extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> helper('form');
		$this-> load-> model('pruebacaptura_model');
	}
	function index($id){
		$data['tarjeta']=$id;
		$data['prueba']= $this-> pruebacaptura_model-> obtenerMateria();	
		$this-> load-> view('captura/captura',$data);
	}
	function IdAvance($id,$nom,$unidad,$idm){
		//$data['tarjeta'] = $this-> input->post('tarj');
		$data['nomM']=$nom;
		$data['tarjeta']=$id;
		$data['unidad']=$unidad;
		$data['idm']=$idm;
		$data['prueba']=$this-> pruebacaptura_model-> IDAvance($data['tarjeta'],$data['nomM']);
		$this-> load-> view('captura/fechasnuevo',$data);
	}
	function fechas(){
		$datos ['string']= $this-> input-> post('nombre');
		$datos['tarjeta'] = $this-> input->post('tarj');
		$datos['pruebac']=$this-> pruebacaptura_model-> IDAvance($datos['tarjeta'],$datos['string']);
		foreach ($datos['pruebac']-> result() as $datos['pruebac']) { 
			$datos['ida']=$datos['pruebac']->IDA;
		}
		$datos ['id']= $this-> input-> post('id');
		$datos['unidad']= $this-> input-> post('unidad');
		//$datos['tarj']=$this ->input->post('tarj');
		$datos['prueba']=$this-> pruebacaptura_model-> buscaFechas($datos['ida'],$datos['unidad']);
		$datos['myClass'] = $this;
		$this-> load-> view('captura/fechascaptura',$datos);
		
	}
	function nuevo(){
		$this-> load-> view('captura/captura');
	}
	function recibir(){
		 $datos ['string']= $this-> input-> post('city');
		 $datos ['Per']= $this-> input-> post('Periodo');
		 $datos ['tarjeta']=$this -> input-> post('txtTarjeta');
		 // $datos ['id']=$this -> input-> post('id');
		 $materia= $this-> input-> post('city');
		 $grupo = $this -> input-> post('txtGrupo');
		 $carrera = $this -> input-> post('txtCarrera');
		 $profesor = $this -> input-> post('txtTarjeta');
		 $jefe = $this -> input-> post('txtJefe');
		 $fecha= $this -> input-> post('txtFecha');//Periodo
		//if ($materia =='none' || $grupo==null || $carrera==null || $profesor==null || $jefe==null) {
		//	return $this->index();
		//}else{
			$data2 =array(
				'city' => $this -> input-> post('city'),
				'txtGrupo' => '50',);
		$data = array(
			'city' => $this -> input-> post('city'),
			'txtGrupo' => $this -> input-> post('txtGrupo'),
			'txtTarjeta' => $this -> input-> post('txtTarjeta'),
			'txtJefe' => $this -> input-> post('txtJefe'),
			'txtFecha' => $this -> input-> post('txtFecha'),
			'txtCarrera' => $this -> input-> post('txtCarrera'),
			'Periodo' => $this -> input-> post('Periodo'),
			);
		$this-> pruebacaptura_model-> crearAvance($data);//listo data
		$datos['prueba']=$this-> pruebacaptura_model-> detalleMateria($datos['string']);
		
			$this-> load-> view('captura/detalleCaptura',$datos);
		//}


	}
	function crearDetalle(){
		$datos ['string']= $this -> input-> post('nombre');
		$datos ['tarjeta']= $this -> input-> post('tarj');
		$datos ['txtAvancee']=$this -> input -> post('txtAvance');
		$datos['unidad']=$this -> input -> post('txtUnidad');
		$data = array(
			'txtAvance' => $this -> input-> post('txtAvance'),
			'txtIDM' => $this -> input-> post('txtIDM'),
			'txtFechaIni' => $this -> input-> post('txtFechaIni'),
			'txtFechaFin'=> $this -> input-> post('txtFechaFin'),
			'txtFechaEva'=> $this -> input-> post('txtFechaEva'),
			'txtUnidad' => $this -> input-> post('txtUnidad'),
			);
		$this-> pruebacaptura_model-> crearDetallleAvance($data);
		$datos['prueba']=$this-> pruebacaptura_model-> detalleMateria($datos['string']);
		$this-> load-> view('captura/detalleCaptura',$datos);
	}
	function actualizaFechas(){
		$datos ['string']= $this -> input-> post('nombre');
		$datos ['tarjeta']= $this -> input-> post('tarj');
		$datos['id']=$this -> input-> post('txtAvance');
		$datos['unidad']=$this -> input-> post('txtUnidad');
		$datas = array(
			'txtFechaIni' => $this -> input-> post('txtFechaIni'),
			'txtFechaFin'=> $this -> input-> post('txtFechaFin'),
			'txtFechaEva'=> $this -> input-> post('txtFechaEva'),
			);
		$data['prueba']=$this-> pruebacaptura_model-> IDAvance($datos['tarjeta'],$datos['string']);
		foreach ($data['prueba']-> result() as $data['prueba']) { 
			$id=$data['prueba']->IDA;
		}
		$this-> pruebacaptura_model-> ActualizaCapos2($datas,$id,$datos['unidad']);
		$datos['prueba']=$this-> pruebacaptura_model-> detalleMateria($datos['string']);
		$this-> load-> view('captura/detalleCaptura',$datos);	
	}
	function recibirdetalle(){
		$materia ['prueba']= $this-> input-> post('txtFechaP1');
		$materia ['prueba2']= $this-> input-> post('txtFechaP2');
		$this-> load-> view('captura/bienvenido',$materia);
	}
	function editaravan(){
		$data['tarjeta']=$this-> input-> post('txtTar');
		$data['IDA']=$this-> input-> post('txtIDA');
		$data['prueba']=$this-> pruebacaptura_model-> Avance($data['IDA']);
		$this-> load-> view('captura/editaravancecap1',$data);
	}
	function borrar($ID,$IDA){
		$this-> pruebacaptura_model-> BorradoAvance($IDA);
		$this-> pruebacaptura_model-> BorradoDetalle($IDA);
		header('Location: /Sistema/index.php/login/editar/'.$ID);  
	}
	function recibir2(){
		//5datos
		 $datos ['string']= $this-> input-> post('txtMate');
		 $datos ['Per']= $this-> input-> post('Periodo');
		 $datos ['tarjeta']=$this -> input-> post('txtTarjeta');
		 $datos ['id']=$this -> input-> post('id');
		$datas = array(
			'txtGrupo' => $this -> input-> post('txtGrupo'),
			'txtJefe' => $this -> input-> post('txtJefe'),
			'txtCarrera' => $this -> input-> post('txtCarrera'),
			'Periodo' => $this -> input-> post('Periodo'),
			);
		$this-> pruebacaptura_model-> ActualizaCapos1($datas,$datos['id']);//Editar 
		$datos['prueba']=$this-> pruebacaptura_model-> detalleMateria($datos['string']);
		
			$this-> load-> view('captura/detalleCaptura',$datos);
	}
}
?>