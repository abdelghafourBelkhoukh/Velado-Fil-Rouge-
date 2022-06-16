<?php
require_once '../../Models/Database.php';


class Cart extends Database{
    public $id;
    public $user_id;
    public $product_id;

    public function __construct($db){
        $this->conn = $db;
    }

    public function AddToCart($data){
        if(!isset($data['quantity'])){
            $sql = "INSERT INTO cart (customerID, productID) VALUES (:user_id, :product_id)";
            $stmt = $this->conn->prepare($sql);
        }else{
            $sql = "INSERT INTO cart (customerID, productID, qty) VALUES (:user_id, :product_id, :qty)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':qty', $data['quantity']);
        }

        //bind
        $stmt->bindParam(':user_id', $data['userID']);
        $stmt->bindParam(':product_id', $data['productID']);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function GetCart($data){
        $sql = "SELECT p.name, p.category, p.price, p.quantity, P.image, c.qty, c.productID FROM products p INNER JOIN cart c WHERE p.id = c.productID AND c.customerID = :user_id AND c.status = 'cart' ORDER BY c.added_at DESC" ;
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':user_id', $data['userID']);
        if ($stmt->execute()) {
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;
        } else {
            return false;
        }
    }

    public function DeleteFromCart($data){
        $sql = "DELETE FROM cart WHERE productID = :product_id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':product_id', $data);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function UpdateQuantity($data){
        $sql = "UPDATE cart SET qty = :qty WHERE productID = :product_id";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':qty', $data['qty']);
        $stmt->bindParam(':product_id', $data['productID']);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


}