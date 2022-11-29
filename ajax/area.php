<?php 
require_once "../modelos/Area.php";

$area=new Area();

$idarea=isset($_POST["idarea"])? limpiarCadena($_POST["idarea"]):"";
$nomarea=isset($_POST["nomarea"])? limpiarCadena($_POST["nomarea"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idarea)) {
		$rspta=$area->insertar($nomarea);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$area->editar($idarea,$nomarea);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$area->desactivar($idarea);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$area->activar($idarea);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$area->mostrar($idarea);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$area->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>$reg->nomarea,
            "1"=>($reg->condicion)?'<a class="btn btn-sm bg-success-light mr-2">Activado</a>':'<a class="btn btn-sm bg-danger-light mr-2">Desactivado</a>',
			"2"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idarea.')"><i class="fas fa-edit"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idarea.')"><i class="fas fa-times"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idarea.')"><i class="fas fa-edit"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idarea.')"><i class="fas fa-check-circle"></i></button>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;
}
 ?>