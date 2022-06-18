<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
header('Access-Control-Allow-Credentials: true');


// include database and object files
require_once '../../Models/Person.php';
require_once '../../Models/Database.php';


// instantiate database
$database = new Database();
$db = $database->dbConnection();

// initialize Object
$person = new Person($db);


$data = json_decode( file_get_contents("php://input"),true);

$newData = array (
    'firstName' => $data['firstName'],
    'lastName' => $data['lastName'],
    'email' => $data['email'],
    'password' => md5($data['password']),
    'city' => $data['city'],
    'country' => $data['country'],
    'address' => $data['address'],
    'zip' => $data['zip'],
    'type' => $data['type']
);
// create person
if ($person->Register($newData)) {
    
    echo json_encode(array("message" => "Person was created."));
} else {
    echo json_encode(array("message" => "Unable to create person."));
}




?>