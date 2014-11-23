<?php
//Get bin script
header('Content-Type: application/json');
require($_SERVER['DOCUMENT_ROOT'] . "/api/API_functions.php");

foreach(getConcerns() as $doc){
  var_dump($doc);
}



?>
