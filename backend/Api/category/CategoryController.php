<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Category.php';


//class categoryController
class CategoryController extends Database{
    public $category;

    public function __construct($db){
        $this->category=new Category($db);
    }

    //create category
    public function Create(){

        $data = json_decode( file_get_contents("php://input"),true);
        // create category
        if ($this->category->Create($data)){
            echo json_encode(array("message" => "category was created."));
        } else {
            echo json_encode(array("message" => "Unable to create category."));
        }
    }

    //update category
    public function Update(){
        $data = json_decode( file_get_contents("php://input"),true);

        // update category
        if ($this->category->Update($data)){
            echo json_encode(array("message" => "category was updated."));
        } else {
            echo json_encode(array("message" => "Unable to update category."));
        }
    }

    //delete category
    public function Delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : die();
        if ($this->category->Delete($id)){
            echo json_encode(array("message" => "category was deleted."));
        } else {
            echo json_encode(array("message" => "Unable to delete category."));
        }
    }

    //read category
    public function Read(){
        $result = $this->category->Read();
        if ($result) {
            echo json_encode(
                array($result)
            );
        } else {
            echo json_encode(
                array("message" => "No category found.")
            );
        }
    }
}


// instantiate database and category object
$database = new Database();
$db = $database->dbConnection();
$categoryController = new CategoryController($db);

//chick method with switch  case
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        $categoryController->Read();
        break;
    case 'POST':
        $categoryController->Create();
        break;
    case 'PUT':
        $categoryController->Update();
        break;
    case 'DELETE':
        $categoryController->Delete();
        break;
    default:
        echo json_encode(
            array("message" => "Method not allowed.")
        );
        break;
}