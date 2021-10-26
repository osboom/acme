<?php
require_once $_SERVER['DOCUMENT_ROOT']."/acme/config/conex.php";


class insert{
	private $db;
	private $regconsultastbl=array();
	
	public function insert(){
		
		$this->db=Conectar::Conexion();
	}
	
	//*******************************************************************************
	//***********************Insertar Personal**************************
	//*****
		
public function addpersonal($numcedula, $nomcond1, $nomcond2, $apellcond1, $apellcond2, $dircond, $telcond, $id_sub_ciudad, $id_sub_clasificacion){
	try{
			
			$sqladdpasarela = "INSERT INTO tbl_personal(numcedula, nomcond1, nomcond2, apellcond1, apellcond2, dircond, telcond, id_sub_ciudad, id_sub_clasificacion) VALUES (:cedula, :nomb1, :nomb2, :apell1, :apell2, :dir, :movil, :ciudad, :clasif)";
			$sentenciaaddpasarela=$this->db->prepare($sqladdpasarela);
			$sentenciaaddpasarela->execute(array(':cedula'=>$numcedula, ':nomb1'=>$nomcond1, ':nomb2'=>$nomcond2, ':apell1'=>$apellcond1, ':apell2'=>$apellcond2, ':dir'=>$dircond, ':movil'=>$telcond, ':ciudad'=>$id_sub_ciudad, ':clasif'=>$id_sub_clasificacion));
			//echo "ok";
		}
		catch(Exception $e){
			$resultado="Error de Datos compra ".";".$e->getCode().";".$e->getMessage().";".$e->getLine().";".$e->getFile();
			$sentenciaaddpasarela=null;
			//echo $resultado;
		}
	}	
}




//$sel=new insert();
//$sel->addpersonal("11111", "rrrr", "qqqq", "ttt", "yyyy", "cccccc", "333333", "1", "1");
?>