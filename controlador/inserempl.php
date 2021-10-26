<?php

require_once $_SERVER['DOCUMENT_ROOT']."/acme/modelo/insert.php";

$ins=new insert();



$numcedula="11111";
$nomcond1="rrrr";
$nomcond2="qqqq";
$apellcond1="ttt";
$apellcond2="yyyy";
$dircond="cccccc";
$telcond="333333";
$id_sub_ciudad="1";
$id_sub_clasificacion="1";

/*
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$sexo=$_POST['sexo'];
$area_id=$_POST['area_id'];
$boletin=$_POST['boletin'];
$descripcion=$_POST['descripcion'];
*/
$regempl=$ins->addempleado($nombre, $email, $sexo, $area_id, $boletin, $descripcion);

echo "procesado";

?>