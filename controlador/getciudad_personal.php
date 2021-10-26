<?php
require_once $_SERVER['DOCUMENT_ROOT']."/acme/modelo/select.php";
$look=new selects();
$regciudad=$look->get_ciudad_personal();

?>