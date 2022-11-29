<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Area{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nomarea){
	$sql="INSERT INTO area (nomarea,condicion) VALUES ('$nomarea','1')";
	return ejecutarConsulta($sql);
}

public function editar($idarea,$nomarea){
	$sql="UPDATE area SET nomarea='$nomarea' 
	WHERE idarea='$idarea'";
	return ejecutarConsulta($sql);
}
public function desactivar($idarea){
	$sql="UPDATE area SET condicion='0' WHERE idarea='$idarea'";
	return ejecutarConsulta($sql);
}
public function activar($idarea){
	$sql="UPDATE area SET condicion='1' WHERE idarea='$idarea'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idarea){
	$sql="SELECT * FROM area WHERE idarea='$idarea'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM area";
	return ejecutarConsulta($sql);
}
//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM area WHERE condicion=1";
	return ejecutarConsulta($sql);
}
}

 ?>