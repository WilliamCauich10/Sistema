<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this-> load-> helper('form');
		$this-> load-> model('imprimir_model');
	}

		public function descargar(){
		$datos ['ID']= $this-> input-> post('txtIDA');
		$datos ['Tar']= $this-> input-> post('txtTar');
		$data = [];
		$hoy = date("dmyhis");
		$fecha =date("d-F-y");
		//Avance
		$datos['pruebac']=$this-> imprimir_model-> Avance($datos['ID']);
		foreach ($datos['pruebac']-> result() as $datos['pruebac']) { 
			$Mat=$datos['pruebac']->Materia;
			$Grup=$datos['pruebac']->IDG;
			$Carr=$datos['pruebac']->Carrera;
			$JefeDto=$datos['pruebac']->NomJefeDto;	
			$FechaAvance=$datos['pruebac']->Fecha;
		}
		$Per['Per']=$datos['pruebac']->Periodo;	
		$FechaAvance=date("d-F-y",strtotime($FechaAvance));
		$Grup1['Grup1']=$datos['pruebac']->IDG;	
		$Mat1['Mat']=$datos['pruebac']->Materia;
		//Periodos
		$datos7['pruebac7']=$this-> imprimir_model-> FechaPe($Per['Per']);
		foreach ($datos7['pruebac7']-> result() as $datos7['pruebac7']) { 
			$PerFecha=$datos7['pruebac7']->Fecha=date("d-F-y",strtotime($datos7['pruebac7']->Fecha));
			$Per1=$datos7['pruebac7']->Periodo1;
			$Per2=$datos7['pruebac7']->Periodo2;
			$Per3=$datos7['pruebac7']->Periodo3;
			$Per4=$datos7['pruebac7']->Periodo4;
		}	
		//Materia
		$datos1['pruebac1']=$this-> imprimir_model-> Materia($Mat1['Mat']);
		foreach ($datos1['pruebac1']-> result() as $datos1['pruebac1']) { 
			$Cre=$datos1['pruebac1']->Creditos;
			$HP=$datos1['pruebac1']->HP;
			$HT=$datos1['pruebac1']->HT;
			$Uni=$datos1['pruebac1']->Unidades;
		}	
		$IDmateria['IDm']=$datos1['pruebac1']->IDM;
		//Grupo
		$datos2['pruebac2']=$this-> imprimir_model-> Grupo($Grup1['Grup1']);
		foreach ($datos2['pruebac2']-> result() as $datos2['pruebac2']) { 
			$Au['Au']=$datos2['pruebac2']->IDAula;
		}	
		//Aula
		$datos3['pruebac3']=$this-> imprimir_model-> Aula($Au['Au']);
		foreach ($datos3['pruebac3']-> result() as $datos3['pruebac3']) { 
			$Aula=$datos3['pruebac3']->Nombre;
		}
		//Maestro
		$datos4['pruebac4']=$this-> imprimir_model-> datosMaestros($datos['Tar']);
		foreach ($datos4['pruebac4']-> result() as $datos4['pruebac4']) { 
			$Nom=$datos4['pruebac4']->Nombre;
			$Ap=$datos4['pruebac4']->Apellido;
		}
		$Maes=$Nom." ".$Ap;
		//
		$datos5['pruebac5']=$this-> imprimir_model-> DetalleMateria($IDmateria['IDm']);
		//margin-bottom: 0.5cm;
			    // margin-left: 0.5cm;
			    // margin-right: 0.5cm;
		//PDF
		$html ="<style>@page {
				margin-top: 4cm;
			    header: html_MyCustomHeader;
				footer: html_MyCustomFooter;
				}
		</style>";
        $html .="<htmlpageheader name=\"MyCustomHeader\">
	<table border=\"1\" style=\" border-collapse: collapse; \">
		<tbody>
				<tr>
				<th rowspan=\"3\" style=\"width: 200px;\"><img src=\"/Sistema/imagenes/LogoITChe.jpg\" align=center border=1 height=\"90\" width=\"80\" >
		</th>
				<th rowspan=\"2\" style=\"width: 500px;\">Nombre del Formato: Formato para la Planeación del Curso y Avance Programatico</th>
				<th style=\"width: 350px;\">$FechaAvance</th>
			</tr>
			<tr>
				<th>Revision</th>
			</tr>
			<tr>
				<th>referencias</th>
				<th>Página {PAGENO} de {nbpg}</th>
			</tr>
		</tbody>
	</table>
</htmlpageheader>".
        "<div class=\"cuerpo\" style=\"position:relative; margin-collapse:500;\">

        <p style=\"text-align: center;  \">INSTITUTO TECNOLÓGICO DE CHETUMAL <br> SUBDIRECCIÓN ACADEMICA <br> DEPARTAMENTO DE SISTEMAS Y COMPUTACIÓN</p>
		<p style=\"text-align: center;\">PLANEACIÓN DEL CURSO Y AVNCE PROGRAMÁTICO DEL PERIODO</p>".
		"<table style=\"margin-top: 15cm;\">
			<tr>
				<td style=\"width: 25px;\"></td>
				<td>MATERIA: </td>
				<td style=\"width:450px; border-bottom: 1px solid;\" >$Mat</td>
				<td> HT</td>
				<td style=\"width: 40px; border-bottom: 1px solid;\">$HT</td>
				<td>HP</td>
				<td style=\"width: 40px; border-bottom: 1px solid;\">$HP</td>
				<td>CR</td>
				<td style=\"width: 70px; border-bottom: 1px solid;\">$Cre</td>
				<td>No. DE UNIDADES</td>
				<td style=\"width: 50px; border-bottom: 1px solid;\">$Uni</td>
			</tr>
			</table>";
			$html .="
			<table>
				<tr>
					<td style=\"border: 1px solid; width: 1000px;\">OBJETIVO DE LA MATERIA: </td>
				</tr>
			</table>
			<table>
				<tr>
					<td style=\"width: 25px;\"></td>
					<td>GRUPO:</td>
					<td style=\"width: 100px; border-bottom: 1px solid;\">$Grup</td>
					<td>CARRERA:</td>
					<td style=\"width: 720px; border-bottom: 1px solid;\">$Carr</td>
				</tr>
			</table>
			<table>
				<tr>
					<td style=\"width: 200px;\"></td>
					<td>AULA:</td>
					<td style=\"width: 100px; border-bottom: 1px solid;\">$Aula</td>
					<td>PROFESOR(A):</td>
					<td style=\"width: 530px; border-bottom: 1px solid;\">$Maes</td>
				</tr>
			</table>
		<br> 

			<table border=\"1\" style=\" border-collapse: collapse; \">
			<tr>
				<th rowspan=\"3\" style=\"width: 110px;height: 70px;\">Unidad Temática</th>
				<th rowspan=\"3\" style=\"width: 200px;\" >Subtemas</th>
				<th colspan=\"2\">Fechas (Periodo)</th>
				<th colspan=\"2\" style=\"width: 90px;\">Evaluación</th>
				<th rowspan=\"3\" style=\"width: 90px;\">Porcentaje de aprobación</th>
				<th rowspan=\"3\" style=\"width: 90px;\">Firma del Docente</th>
				<th rowspan=\"3\" style=\"width: 90px;\">Firma del Jefe(a) Académico</th>
				<th rowspan=\"3\" style=\"width: 200px;\">Observaciones</th>
			
			</tr>
			<tr  colspan=\"2\">
				<th rowspan=\"2\">Progra <br>mado</th>
				<th rowspan=\"2\">Real</th>
				<th rowspan=\"2\">Progra <br>mado</th>
				<th rowspan=\"2\">Real</th>
				
			</tr>
			<tr>
				<td style=\"width: 1px;\"></td>
			</tr>
		"; 
		//
		 //$html ="tablas";
        foreach ($datos5['pruebac5']-> result() as $datos5['pruebac5']) { 
        	$UniDetalles['NumUnidad']=$datos5['pruebac5']->Unidad;
        	$datos6['pruebac6']=$this-> imprimir_model-> DetalleAvance($datos['ID'],$IDmateria['IDm'],$UniDetalles['NumUnidad']);
        	$html .="
        	<tr>
				<td>" .$datos5['pruebac5']->Unidad."<br>".$datos5['pruebac5']->NombreTema."</td>
				<td>".$datos5['pruebac5']->Subtemas."</td>";
		foreach ($datos6['pruebac6']-> result() as $datos6['pruebac6']) { 
				$html .="
				<td>".$datos6['pruebac6']->Periodo=date("d/m",strtotime($datos6['pruebac6']->Periodo))." al <br>".$datos6['pruebac6']->PeriodoFin=date("d/m",strtotime($datos6['pruebac6']->PeriodoFin))."</td>
				<td> </td>
				<td>".$datos6['pruebac6']->Evaluacion=date("d/m",strtotime($datos6['pruebac6']->Evaluacion))."</td>
				<td> </td>
				";
		}
			$html .="
				<td> </td>
				<td></td>
				<td> </td>
				<td> </td>
			</tr>";
		 }
		$html .="
		<tr>
			<th colspan=\"2\">Fecha de entrega de programación </th>
			<th colspan=\"8\">Periodo Programado para 1er, 2do , 3er. y 4to Seguimiento </th>
		</tr>
		<tr>
			<th colspan=\"2\">$PerFecha </th>
			<th colspan=\"2\">$Per1</th>
			<th colspan=\"2\">$Per2</th>
			<th colspan=\"2\">$Per3</th>
			<th colspan=\"2\">$Per4</th>
		</tr>
		</table></div><br>";
		$html .=
		"<table>
			<tr>
				<th>Vo.Bo. del Jefe(a) de Departament </th>
				<th style=\"width:450px; border-bottom: 1px solid; text-align: center;\" > $JefeDto</th>
			</tr>
		</table>
			<htmlpagefooter name=\"MyCustomFooter\">
			<p style=\"text-align: center;\"><b>Toda copia en PAPEL es un “Documento No Controlado” </b></p>
	
</htmlpagefooter>
		";
 // header(string)
        $pdfFilePath = "avance".$hoy.".pdf";
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L');  
       // $mpdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
		// $mpdf->SetFooter("Toda copia en PAPEL es un “Documento No Controlado” ");
 		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");
	}
}
?>