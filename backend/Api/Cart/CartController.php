<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Cart.php';
//start session
session_start();

class CartController
{
    // database connection and table name
    private $conn;
    public $cart;

    // object propertie
    public function __construct($db)
    {
        $this->cart = new Cart($db);
    }

    public function AddToCart()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        try {

            if ($this->cart->AddToCart($data)) {
                echo json_encode(array("message" =>"success", "status" => 200));
                return;
                echo json_encode(array("message" => "error", "status" => 400));
            }
        } catch (Exception $e) {
            //  check if exception is a pdo duplicate entry exception and return the keys that caused the error
            if ($e->errorInfo[1] == 1062) {
                $duplicateKeys = array();
                foreach ($e->errorInfo as $key => $value) {
                    if ($key > 1) {
                        preg_match("/key '(\w+)'/", $value, $matches);
                        $duplicateKeys[] = $matches[1];
                    }
                }
                echo json_encode(array("message" => "warning", "keys" => $duplicateKeys, "status" => 400, ));
                return;
            }
        }
    }

    public function GetCart()
    {
        //get id from url
        $id = $_GET['id']; 
        $data = array("userID" => $id);
        if ($cartData = $this->cart->GetCart($data)) {
            echo json_encode(array($cartData));
        } else {
            echo json_encode(array("message" => "Cart not found."));
        }
    }

    public function DeleteFromCart()
    {
        $id = $_GET['id']; 
            if ($this->cart->DeleteFromCart($id)) {
                echo json_encode(array("message" => "successDelete", "status" => 200));
                return;
            }
        
    }

    public function UpdateQuantity(){
        $data = json_decode(file_get_contents("php://input"), true);
        if($this->cart->UpdateQuantity($data)){
            echo json_encode(array("message" => "successUpdate", "status" => 200));
            return;
        }
        
    }
}


$database = new Database();
$db = $database->dbConnection();
$cart = new CartController($db);


//switch case for the request method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $cart->AddToCart();
        break;
    case 'GET':
        $cart->GetCart();
        break;
    case 'DELETE':
        $cart->DeleteFromCart();
        break;
    case 'PUT':
        $cart->UpdateQuantity();
        break;
    default:
        echo json_encode(array("message" => "Invalid request method."));
        break;
}
