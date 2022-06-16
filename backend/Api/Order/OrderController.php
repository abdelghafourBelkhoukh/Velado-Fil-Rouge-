<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include database and object files
require_once '../../Models/Database.php';
require_once '../../Models/Order.php';

class OrderController {
    // database connection and order object
    private $conn;
    private $order;

    public function __construct($db) {
        $this->order = new Order($db);
    }

    // get all orders
    public function getAllOrders() {
        $result = $this->order->getAllOrders();
        echo json_encode(array($result));
    }

    // add order
    public function addOrder() { 
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->userID)) {
            if($this->order->addOrder($data)){
                $this->order->UpdateStatus($data);
                echo json_encode(array("message" => "Order added successfully."));
            }
        } else {
            echo json_encode(array("message" => "Order not added."));
        }
    }

    // update order
    public function updateOrder() {
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($data->id)) {
            if($this->order->updateOrder($data)){
                echo json_encode(array("message" => "Order updated successfully."));
            }
        } else {
            echo json_encode(array("message" => "Order not updated."));
        }
    }

    // delete order
    public function deleteOrder($id) {
    }

    // get all orders by user id
    public function getAllOrdersByUserId($id) {
    }

}

//instantiate database
$database = new Database();
$db = $database->dbConnection();
//instantiate order object
$orderController = new OrderController($db);   


//switch case to determine which method http request it is
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $orderController->getAllOrders();
        break;
    case 'POST':
        $orderController->addOrder();
        break;
    case 'PUT':
        $orderController->updateOrder();
        break;
    case 'DELETE':
        $orderController->deleteOrder($_GET['id']);
        break;
    default:
        echo 'Invalid Request Method';
        break;
}


