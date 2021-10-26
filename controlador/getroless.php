<?php
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/modelo/select.php";
$lookrol=new selects();
$regroles=$lookrol->get_roles();

?>