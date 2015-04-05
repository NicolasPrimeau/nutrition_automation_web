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


  $cursor = $collection->find();
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

function getPlainConcerns(){
	$client = new MongoClient();

	$db = $client->selectDB('Nutrition_Automation');
	$collection = $db->selectCollection('plain_concerns');
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

/*function setContacts($newdata){

 	echo "afaf";

	$conn = new Mongo();
	
				
 	$db = $conn->Nutrition_Automation;


 	$collection = $db->contacts;
	
	$cursor = $collection->find();
	$collection->update($cursor, $newdata);
	//$newdata = array("name"=>$_POST['name'],"email"=>$_POST['email'],"phone"=>$_POST['phone']);

}*/
?>
