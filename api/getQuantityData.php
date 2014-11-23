<?php
//Get bin script
header('Content-Type: application/json');
require($_SERVER['DOCUMENT_ROOT'] . "/api/API_functions.php");

foreach(getQuantityData() as $doc){
  var_dump($doc);
}


?>
