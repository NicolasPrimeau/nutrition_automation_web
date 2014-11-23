<?php

function returnArray($cursor){
  $temp = array();
  foreach($cursor as $item){
    array_push($temp,$item);
  }
  return $temp;
}

function getQuantityData(){
  $client = new MongoClient();

  $db = $client->selectDB('Nutrition_Automation');
  $collection = $db->selectCollection('food_data');
  $query = array();

  if($_GET['bin'] != NULL){
    $query['bin'] = (int)$_GET['bin'];
  }

  $cursor = $collection->find($query);
  $cursor = returnArray($cursor);
  $client->close();
  return $cursor;
}



function getAlerts(){
  $client = new MongoClient();
  $db = $client->selectDB('Nutrition_Automation');
  $collection = $db->selectCollection('alerts');

  $cursor = $collection->find();
  $cursor = returnArray($cursor);
  $client->close();

  return $cursor;
}

function getConcerns(){

  $client = new MongoClient();

  $db = $client->selectDB('Nutrition_Automation');
  $collection = $db->selectCollection('concerns');
  $query = array();

  $cursor = $collection->find($query);
  $cursor = returnArray($cursor);
  $client->close();
  return $cursor;
}

function getConfig(){
  $client = new MongoClient();
  $db = $client->selectDB('Nutrition_Automation');
  $collection = $db->selectCollection('config');

  $cursor = $collection->find();
  $cursor = returnArray($cursor);
  $client->close();
  return $cursor;

}

function getContacts(){
  $client = new MongoClient();

  $db = $client->selectDB('Nutrition_Automation');
  $collection = $db->selectCollection('contacts');

  $cursor = $collection->find();
  $cursor = returnArray($cursor);
  $client->close();
  return $cursor;
}


?>
