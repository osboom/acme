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
	
	public function get_report(){
		try{
			$sql="SELECT vh.`id_vehiculo`, vh.`placa`, mr.`marca`, vh.`id_sub_conductor`,

				(SELECT concat(apellcond1,' ',apellcond2,' ',nomcond1,' ',nomcond2) from tbl_personal where `id_conductor`= vh.`id_sub_conductor`) as conductor,
				 `id_sub_propietario`,
				 (SELECT concat(apellcond1,' ',apellcond2,' ',nomcond1,' ',nomcond2) from tbl_personal where `id_conductor`= vh.`id_sub_propietario`) as Propietario

				FROM `tbl_vehiculo` as vh, `tbl_marca` as mr
				WHERE mr.`id_marca`= vh.`id_sub_marca`  
				ORDER BY `vh`.`placa` ASC";
			
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
		
}

//$area=new selects();
//$matrizarea=$area->get_all_personal();

?>