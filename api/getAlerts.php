<?php
header('Content-Type: application/json');
require($_SERVER['DOCUMENT_ROOT'] . "/api/API_functions.php");

foreach(getAlerts() as $doc){
        var_dump($doc);
}


?>
