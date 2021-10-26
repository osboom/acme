<?php
require_once $_SERVER['DOCUMENT_ROOT']."/acme/modelo/select.php";
$lookempl=new selects();
$regempl=$lookempl->get_all_personal();

?>