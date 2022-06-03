<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Person.php';

//creation class DelivererController
class DelivererController extends Database{
    public $person;

    public function __construct($db){
        $this->person=new Person($db);
    }

    //create Deliverer
    public function Create(){

        $data = json_decode( file_get_contents("php://input"),true);
        // create person
        if ($this->person->RegisterDeliverer($data)){
            echo json_encode(array("message" => "deliverer was created."));
        } else {
            echo json_encode(array("message" => "Unable to create deliverer."));
        }
    }

    //update Deliverer
    public function Update(){
        $data = json_decode( file_get_contents("php://input"),true);

        // update person
        if ($this->person->UpdateDeliverer($data)){
            echo json_encode(array("message" => "deliverer was updated."));
        } else {
            echo json_encode(array("message" => "Unable to update deliverer."));
        }
    }

    //delete Deliverer
    public function Delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : die();
        if ($this->person->DeleteDeliverer($id)){
            echo json_encode(array("message" => "deliverer was deleted."));
        } else {
            echo json_encode(array("message" => "Unable to delete deliverer."));
        }
    }

    //read Deliverer
    public function Read(){
        $result = $this->person->ReadDeliverers();
        if ($result) {
            echo json_encode(
                array($result)
            );
        } else {
            echo json_encode(
                array('message' => 'No deliverers found')
            );
        }
    }
}


//instantiate database
$database = new Database();
$db = $database->dbConnection();
//instantiate person
$deliverer = new DelivererController($db);


//switch case for methods
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $deliverer->Read();
        break;
    case 'POST':
        $deliverer->Create();
        break;
    case 'PUT':
        $deliverer->Update();
        break;
    case 'DELETE':
        $deliverer->Delete();
        break;
    default:
        echo json_encode(
            array('message' => 'Method not allowed')
        );
        break;
}
