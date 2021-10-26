<?php
require_once $_SERVER['DOCUMENT_ROOT']."/acme/modelo/select.php";
$look=new selects();
$regclasificacion=$look->get_clasificacion_personal();

?>