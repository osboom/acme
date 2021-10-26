<?php
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/modelo/select.php";
$lookempl=new selects();
$regempl=$lookempl->get_all_empleados();

?>