<?php 
require_once "../modelos/Visita.php";

$visita=new Visita();
$idvisita=isset($_POST["idvisita"])? limpiarCadena($_POST["idivisita"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$visitante=isset($_POST["visitante"])? limpiarCadena($_POST["visitante"]):"";
$dni=isset($_POST["dni"])? limpiarCadena($_POST["dni"]):"";
$motivo=isset($_POST["motivo"])? limpiarCadena($_POST["motivo"]):"";
$hora_entrada=isset($_POST["hora_entrada"])? limpiarCadena($_POST["hora_entrada"]):"";
$hora_salida=isset($_POST["hora_salida"])? limpiarCadena($_POST["hora_salida"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idarea=isset($_POST["idarea"])? limpiarCadena($_POST["idarea"]):"";
$idfuncionario=isset($_POST["idfuncionario"])? limpiarCadena($_POST["idfuncionario"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idvisita)) {
		$rspta=$visita->insertar($fecha,$visitante,$_POST['idsuario'],$dni,$motivo,$hora_entrada,$hora_salida,$_POST['idarea'],$_POST['idfuncionario']);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$visita->editar($idvisita,$fecha,$visitante,$dni,$motivo,$hora_entrada,$hora_salida,$_POST['idarea'],$_POST['idfuncionario']);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	
	case 'mostrar':
		$rspta=$visita->mostrar($idvisita);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$visita->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
			"0"=>$reg->fecha,
			"1"=>$reg->visitante,
			"2"=>$reg->dni,
			"3"=>$reg->vigilante,
			"4"=>$reg->idarea,
			"5"=>$reg->idfuncionario,
			"6"=>$reg->motivo,
			"7"=>$reg->hora_entrada,
			"8"=>$reg->$hora_salida,
			
			
		);
        
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		case 'selectArea':
			require_once "../modelos/Area.php";
			$area=new Area();

			$rspta=$area->select();

			while ($reg=$rspta->fetch_object()) {
				echo '<option value=' . $reg->idarea.'>'.$reg->nomarea.'</option>';
			}
			break;
		
			
}
 ?>