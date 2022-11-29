<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Funcionario{


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
public function desactivar($idfuncionario){
	$sql="UPDATE funcionario SET condicion='0' WHERE idfuncionario='$idfuncionario'";
	return ejecutarConsulta($sql);
}
public function activar($idfuncionario){
	$sql="UPDATE funcionario SET condicion='1' WHERE idfuncionario='$idfuncionario'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idfuncionario){
	$sql="SELECT * FROM funcionario WHERE idfuncionario='$idfuncionario'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT f.idfuncionario,f.idarea,a.nomarea as area, f.nomfuncionario,f.cargo,f.condicion FROM funcionario f INNER JOIN Area a ON f.idarea=a.idarea";
	return ejecutarConsulta($sql);
}
//listar registros activos
public function listarActivos(){
	$sql="SELECT f.idfuncionario,f.idarea,a.nomarea as area,f.nomfuncionario, f.cargo,f.condicion FROM funcionario f INNER JOIN Area a ON f.idarea=a.idarea WHERE a.condicion='1'";
	return ejecutarConsulta($sql);
}


//listar y mostrar en selct
public function selectf(){
	$sql="SELECT * FROM funcionario WHERE condicion=1";
	return ejecutarConsulta($sql);
}

}


 ?>