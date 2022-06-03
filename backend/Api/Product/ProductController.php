<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Products.php';

//ceate class ProductController
class ProductController extends Database{
    public $productClass;
    public $product;
    
    
    public function __construct($db){
    $this->product = new Products($db);
    }
    
    //create user
    public function Create(){
        
        $data = json_decode( file_get_contents("php://input"),true);
        // var_dump($data);
        // die();
        // create product
        if ($this->product->Create($data)){
            echo json_encode(array("message" => "product was created."));
        } else {
            echo json_encode(array("message" => "Unable to create product."));
        }
    }

    //update user
    public function Update(){
        $data = json_decode( file_get_contents("php://input"),true);
        // update product
        if ($this->product->Update($data)){
            echo json_encode(array("message" => "product was updated."));
        } else {
            echo json_encode(array("message" => "Unable to update product."));
        }
    }

    //delete user
    public function Delete(){
        $id = isset($_GET['id']) ? $_GET['id'] : die();
        // delete product
        if ($this->product->Delete($id)){
            echo json_encode(array("message" => "product was deleted."));
        } else {
            echo json_encode(array("message" => "Unable to delete product."));
        }
    }

    //read user
    public function Read(){
        $result = $this->product->Read();
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(array("message" => "Unable to read product."));
        }
    }

    //read user
    public function ReadOne(){
        $id = isset($_GET['id']) ? $_GET['id'] : die();
        $result = $this->product->Read_One($id);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(array("message" => "Unable to read product."));
        }
    }
    
}


$database = new Database();
$db = $database->dbConnection();
//initialize object
$productClass = new ProductController($db);


switch ($_SERVER['REQUEST_METHOD']) 
{
    case 'GET':
        if(isset($_GET['id'])){
            $productClass->ReadOne();
        }else{
            $productClass->Read();
        }
        break;
    case 'POST':
        $productClass->Create();
        break;
    case 'PUT':
        $productClass->Update();
        break;
    case 'DELETE':
        $productClass->Delete();
        break;
    default:
        echo json_encode(array("message" => "Request method not accepted."));
        break;
}