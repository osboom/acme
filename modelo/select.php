<?php

require_once $_SERVER['DOCUMENT_ROOT']."/acme/config/conex.php";
	
class selects{
	private $db;
	private $regconsultastbl=array();
	
	public function selects(){
		
		$this->db=Conectar::Conexion();
	}
	
	//*******************************************************************************
	//***********************Obtener Datos**************************
	//*******************************************************************************
	
	public function get_ciudad_personal(){
		try{
			$sql="SELECT id_ciudad, ciudad FROM tbl_ciudad ORDER BY tbl_ciudad.ciudad ASC";
			
			$consulta=$this->db->prepare($sql);
			$consulta->execute();
			if ($consulta->rowCount() > 0) {
				while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
					$this->regconsultastbl[]=$filas;
					 //echo $filas['id']." ".$filas['nombre']."<br>";
				}
				//print_r($this->regconsultastbl);
				return $this->regconsultastbl;
				$consulta->closeCursor();
			}else{
				//echo "error de Empresa <br>";
				return "false";
			}
			
			$consulta="";
			close(db);
		}catch(Exception $e){
			$msjerror="Error de Acceso ".";".$e->getCode().";".$e->getMessage().";".$e->getLine().";".$e->getFile();
			echo $msjerror;
		}
	}
	
	public function get_clasificacion_personal(){
		try{
			$sql="SELECT id_casspersonal, classpersonal FROM tbl_class_personal ORDER BY classpersonal ASC";
			
			$consulta=$this->db->prepare($sql);
			$consulta->execute();
			if ($consulta->rowCount() > 0) {
				while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
					$this->regconsultastbl[]=$filas;
					 //echo $filas['id']." ".$filas['nombre']."<br>";
				}
				//print_r($this->regconsultastbl);
				return $this->regconsultastbl;
				$consulta->closeCursor();
			}else{
				//echo "error de Empresa <br>";
				return "false";
			}
			
			$consulta="";
			close(db);
		}catch(Exception $e){
			$msjerror="Error de Acceso ".";".$e->getCode().";".$e->getMessage().";".$e->getLine().";".$e->getFile();
			echo $msjerror;
		}
	}
	
	public function get_all_personal(){
		try{
			$sql="SELECT pers.`id_conductor`, pers.`numcedula`, pers.`nomcond1`, pers.`nomcond2`, pers.`apellcond1`, pers.`apellcond2`, pers.`dircond`, pers.`telcond`, 
			ciud.`ciudad`,
			clas.`classpersonal`
			FROM `tbl_personal` as pers, `tbl_ciudad` as ciud, `tbl_class_personal` as clas 
			WHERE ciud.`id_ciudad` =pers.`id_sub_ciudad`
			and clas.`id_casspersonal`=pers.`id_sub_clasificacion`";
			
			$consulta=$this->db->prepare($sql);
			$consulta->execute();
			if ($consulta->rowCount() > 0) {
				while ($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
					$this->regconsultastbl[]=$filas;
					 //echo $filas['numcedula']." ".$filas['nomcond1']."<br>";
				}
				//print_r($this->regconsultastbl);
				return $this->regconsultastbl;
				$consulta->closeCursor();
			}else{
				//echo "error de Empresa <br>";
				return "false";
			}
			
			$consulta="";
			close(db);
		}catch(Exception $e){
			$msjerror="Error de Acceso ".";".$e->getCode().";".$e->getMessage().";".$e->getLine().";".$e->getFile();
			echo $msjerror;
		}
	}
	
}

//$area=new selects();
//$matrizarea=$area->get_all_personal();

?>