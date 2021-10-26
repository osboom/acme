<?php
/**
 * @author osboom
 * @copyright 2021
 */
//datos DB Principal

// Datos DB Principal Empresa
define("drvdb_principal","mysql");
define("host_principal","localhost");
define("hostname","mysql:host=localhost;dbname=acme");
define("db_principal","acme");
define("user_principal","root");
define("clave_principal","");
define("charset_principal","utf8");


class Conectar {
public static function Conexion() {
	
			$server=drvdb_principal.":host=".host_principal.";dbname=".db_principal;
			$usuario=user_principal;
			$password=clave_principal;
			$charset=charset_principal;
			
        try {		
			//$server="mysql:host=localhost;dbname=sliosboom";
            $conexion = new PDO($server, $usuario, $password);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion->exec("SET CHARACTER SET ".$charset);
			 //echo "conectado";
        	}catch (PDOException $e) {
            	die("Error... ". $e->getMessage());
				echo "Linea de Error... ". $e->getLine();
        	}
		return $conexion;
    }
}
//Conectar::Conexion();

?>