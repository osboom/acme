<?php

require_once $_SERVER['DOCUMENT_ROOT']."/acme/modelo/insert.php";

$ins=new insert();



$numcedula=$_POST['cedula'];;
$nomcond1=$_POST['nombre1'];;
$nomcond2=$_POST['nombre2'];;
$apellcond1=$_POST['apellido1'];;
$apellcond2=$_POST['apellido2'];;
$dircond=$_POST['direccion'];;
$telcond=$_POST['movil'];;
$id_sub_ciudad=$_POST['ciudad'];;
$id_sub_clasificacion=$_POST['clasificacion'];;


$regpersonal=$ins->addpersonal($numcedula, $nomcond1, $nomcond2, $apellcond1, $apellcond2, $dircond, $telcond, $id_sub_ciudad, $id_sub_clasificacion);


echo "procesado";

?>