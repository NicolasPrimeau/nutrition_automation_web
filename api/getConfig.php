<?php
$client = new MongoClient();

$db = $client -> selectDB('Nutrition_Automation');
$collection = $db -> selectCollection($db, 'config');

$cursor = $collection -> find();

foreach($cursor as $doc){
        var_dump($doc);
}

$client -> close();

?>

