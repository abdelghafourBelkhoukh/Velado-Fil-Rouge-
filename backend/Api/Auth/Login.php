<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
header('Access-Control-Allow-Credentials: true');


// include database and object files
require_once '../../Models/Person.php';
require_once '../../Models/Database.php';

//instantiate database
$database = new Database();
$db = $database->dbConnection();

//initialize object
$person = new Person($db);

//get data from post request
$data = json_decode(file_get_contents("php://input"),true);


$newData = array(
    'email' => $data['email'],
    'password' => md5($data['password']),
    'role' => $data['role']
    );



//check if user exists

if($userData = $person->LoginCustomer($newData)){
    echo json_encode(array
    (
        "UserData" => $userData,
        "message" => "User found.",
        "success" => true
    ));
}else{
    echo json_encode(array("message" => "User not found.", "success" => false));
}




?>