<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Products.php';




//ceate class ProductController
class StockController extends Database{
    public $productClass;
    public $product;
    
    
    public function __construct($db){
    $this->product = new Products($db);
    }
    

    //Add quantity to product
    public function AddQuantity(){
        $data = json_decode( file_get_contents("php://input"),true);
        // update product
        if ($this->product->AddQuantity($data)){
            echo json_encode(array("message" => "product was updated."));
        } else {
            echo json_encode(array("message" => "Unable to update product."));
        }
    }
}


$database = new Database();
$db = $database->dbConnection();
//initialize object
$quatity = new StockController($db);


if ($_SERVER['REQUEST_METHOD'] == 'PUT') 
{
    $quatity->AddQuantity();
}