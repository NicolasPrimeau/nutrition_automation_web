<?php
$client = new MongoClient();


$db = $client->selectDB('Nutrition_Automation');
$collection = $db->selectCollection('food_data');

echo $_GET['bin'];
$cursor = $collection->find();

foreach($cursor as $doc){
  var_dump($doc);
}


$client->close()

?>
