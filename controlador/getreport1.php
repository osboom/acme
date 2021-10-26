<?php
require_once $_SERVER['DOCUMENT_ROOT']."/acme/modelo/reportvehiculo.php";
$lookveh=new selects();
$regveh=$lookveh->get_report();

?>