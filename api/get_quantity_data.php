<?php
//Get bin script

$client = new MongoClient();

$db = $client->selectDB('Nutrition_Automation');
$collection = $db->selectCollection('food_data');
$query = array();

if($_GET['bin'] != NULL){
  $query['bin'] = (int)$_GET['bin'];
}

$cursor = $collection->find($query);

foreach($cursor as $doc){
  var_dump($doc);
}


$client->close()

?>
