<?php 
require_once "../modelos/Funcionario.php";

$funcionario=new Funcionario();

$idarea=isset($_POST["idarea"])? limpiarCadena($_POST["idarea"]):"";
$idfuncionario=isset($_POST["idfuncionario"])? limpiarCadena($_POST["idfuncionario"]):"";
$nomfuncionario=isset($_POST["nomfuncionario"])? limpiarCadena($_POST["nomfuncionario"]):"";
$cargo=isset($_POST["cargo"])? limpiarCadena($_POST["cargo"]):"";

switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idfuncionario)) {
		$rspta=$funcionario->insertar($idarea,$nomfuncionario,$cargo);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
         $rspta=$funcionario->editar($idfuncionario,$idarea,$nomfuncionario,$cargo);
		echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
	}
		break;
	

	case 'desactivar':
		$rspta=$funcionario->desactivar($idfuncionario);
		echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
		break;
	case 'activar':
		$rspta=$funcionario->activar($idfuncionario);
		echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
		break;
	
	case 'mostrar':
		$rspta=$funcionario->mostrar($idfuncionario);
		echo json_encode($rspta);
		break;

    case 'listar':
		$rspta=$funcionario->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
			"0"=>'<h2><a><i class="fas fa-user-tag"></i> '.$reg->nomfuncionario.'<span>'.$reg->cargo.'</span><a></h2>',
			"1"=>$reg->area,
            "2"=>($reg->condicion)?'<a class="btn btn-sm bg-success-light mr-2">Activado</a>':'<a class="btn btn-sm bg-danger-light mr-2">Desactivado</a>',
			"3"=>($reg->condicion)?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idfuncionario.')"><i class="fas fa-edit"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="desactivar('.$reg->idfuncionario.')"><i class="fas fa-times"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idfuncionario.')"><i class="fas fa-edit"></i></button>'.' '.'<button class="btn btn-primary btn-xs" onclick="activar('.$reg->idfuncionario.')"><i class="fas fa-check-circle"></i></button>'
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