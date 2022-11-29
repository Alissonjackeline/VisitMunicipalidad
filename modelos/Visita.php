<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Visita{


	//constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idarea,$nomfuncionario,$cargo){
	$sql="INSERT INTO funcionario (idarea,nomfuncionario,cargo,condicion)
	 VALUES ('$idarea','$nomfuncionario','$cargo','1')";
	return ejecutarConsulta($sql);
}



public function editar($idfuncionario,$idarea,$nomfuncionario,$cargo){
	$sql="UPDATE funcionario SET idarea='$idarea',nomfuncionario='$nomfuncionario',cargo='$cargo'
	WHERE idfuncionario='$idfuncionario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idvisita){
	$sql="SELECT * FROM visita WHERE idvisita='$idvisita'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT * FROM visita";
	return ejecutarConsulta($sql);
}



}
 ?>