<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Person.php';

//creation class clientController
class ClientController extends Database{
    public $client;
    public $person;
    

    public function __construct($db){
        $this->person=new Person($db);
    }
    
    //create user
    public function Create(){
        
        $data = json_decode( file_get_contents("php://input"),true);
        // create person
        if ($this->person->Create($data)){
            echo json_encode(array("message" => "Person was created."));
        } else {
            echo json_encode(array("message" => "Unable to create person."));
        }
    }

    //update user
    public function Update(){
        $data = json_decode( file_get_contents("php://input"),true);

        // update person
        if ($this->person->UpdateUser($data)){
            echo json_encode(array("message" => "Person was updated."));
        } else {
            echo json_encode(array("message" => "Unable to update person."));
        }
    }

    //delete user
    public function Delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : die();
        // delete person
        if ($this->person->DeleteUser($id)){
            echo json_encode(array("message" => "Person was deleted."));
        } else {
            echo json_encode(array("message" => "Unable to delete person."));
        }
    }

    //read user
    public function Read(){
        $result = $this->person->ReadUsers();
        if ($result) {
            echo json_encode(
                $result
            );
        } else {
            echo json_encode(
                array('message' => 'No users found')
            );
        }
    }
            
}

//instantiate database
$database = new Database();
$db = $database->dbConnection();
//instantiate person
$client = new ClientController($db);



switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $client->Read();
        break;
    case 'POST':
        $client->Create();
        break;
    case 'PUT':
        $client->Update();
        break;
    case 'DELETE':
        $client->Delete();
        break;
    default:
        echo json_encode(
            array('message' => 'Method not allowed')
        );
        break;
}



?>